<?php
/**
 * Created by PhpStorm.
 * User: Qh
 * Date: 2018/4/11
 * Time: 上午10:31
 */

namespace Bootstrap;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;
use Illuminate\Database\Capsule\Manager;
use Libs\Conf;
use Noodlehaus\ErrorException;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class App
{
  private static $parameters = [];
  private static $routerInfo;
  private static $htmlresult;
  public static function Run() {
    self::defDir();
    self::getUrl();
    self::setRunTimeConfig();
    self::whoops_error();
    self::startOrm();
    self::Route();
    self::send();
  }

  public static function defDir() {
    define('ROOT_PATH', dirname(__DIR__) . '/');
    define('CONF_PATH', ROOT_PATH . 'Conf/');
    define('VIEW_PATH', ROOT_PATH . 'View/');
    define('RESOURCE', ROOT_PATH . 'resource/');
    define('CACHE', ROOT_PATH . 'Caching/');
    define('SPA_PATH', 'SPA/');
    define('COMP_PATH',ROOT_PATH . 'RunTime/Compile/');
  }

  public static function getUrl(){
    $dispatcher = \FastRoute\simpleDispatcher(function (\FastRoute\RouteCollector $router) {
      include ROOT_PATH . 'Router/web.php';
    });
    /** 下面都是基础实现的方法 在fast-router有**/
    // 获取传输类型以及.com后的参数
    $httpMethod = $_SERVER['REQUEST_METHOD'];
    $uri = $_SERVER['REQUEST_URI'];
    // Strip query string (?foo=bar) and decode URI
    if (false !== $pos = strpos($uri, '?')) {
      $uri = substr($uri, 0, $pos);
    }
    $uri = rawurldecode($uri);
    $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
    switch ($routeInfo[0]) {
      case Dispatcher::NOT_FOUND:
          self::errorRouter($_SERVER['REQUEST_URI']);
          break;
      case Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
      case Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // ... call $handler with $vars
        break;
    }
    /** 上面都是基础实现的方法 在fast-router有**/
    //把对应的参数与控制器的关系放在静态变量方便分发
    self::$routerInfo = $routeInfo;
  }


  public static function setRunTimeConfig () {
      define('PLATFORM',explode('/',self::$routerInfo[1])[0]);
      define('MODULE',explode('/',self::$routerInfo[1])[1]);
      define('CONTROLLER',explode('@',explode('/',self::$routerInfo[1])[2])[0]);
      define('METHOD',explode('@',explode('/',self::$routerInfo[1])[2])[1]);
  }

  public static function whoops_error() {
    $bool = Conf::get('debug');
    if($bool) {
      $whoops = new Run();
      $errorTittle = '鲸落化身为了一座孤岛，正在一直往下掉';
      $option = new PrettyPageHandler();
      $option->setPageTitle($errorTittle);
      $whoops->pushHandler($option);
      $whoops->register();
      ini_set('display_error', 'On');
    } else {
      ini_set('display_error', 'Off');
    }
  }

  public static function Route()
  {
    if (self::$routerInfo[0] != 0) {
      $routerMessage = explode('@', self::$routerInfo[1]);
      $controller = 'App\\Controller\\' . $routerMessage[0];
      $controller = str_replace('/', '\\', $controller);
      $action = $routerMessage[1];
      $obj = new $controller;

      $reflection = new \ReflectionMethod($controller, $action);
      $actionParameters = $reflection->getParameters();
      if (!empty($actionParameters)) {
        foreach ($actionParameters as $actionP) {
          $parame = $actionP->getType()->getName();
          self::$parameters = new $parame;
        }
        self::$htmlresult = $obj->$action(...self::$parameters);
      } else {
        self::$htmlresult = $obj->$action();
      }
    } else {
      throw new ErrorException('导航出错，请检查路由设置是否正确!');
    }
  }

  public static function send() {
    $res = self::$htmlresult;
    if(!empty($res)) {
      if(gettype($res) == 'string') {
        echo $res;
      } else {
        echo json_encode($res);
      }
    }
  }

  public static function startOrm() {
    $capsule = new Manager();
    $capsule->addConnection(require '../Conf/database.php');
    $capsule->bootEloquent();
  }

  private static function errorRouter ($url) {
      $info = array_slice(explode('/',$url),2);
      list($platform,$module,$controller,$method,$filename) = $info;
      $classname = $platform . '/' .$module . '/' .$controller . '@' . $method;
      $routerInfo = [
          1,$classname,[]
      ];
      self::$routerInfo = $routerInfo;
      self::setRunTimeConfig();
      self::whoops_error();
      self::startOrm();
      self::Route();
      self::send();
      die;
  }

}
