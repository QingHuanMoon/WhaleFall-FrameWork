<?php
/**
 * Created by PhpStorm.
 * User: Qh
 * Date: 2018/4/11
 * Time: 下午5:17
 */

namespace Core;


use Libs\Conf;
use Libs\Request;
use Philo\Blade\Blade;

class BaseController extends Blade
{

  public function __construct()
  {
    parent::__construct(VIEW_PATH, CACHE);
  }

    // 渲染并缓存模板
    public function display  ($template = null, $vars = null) {
        if ( Conf::get('autocache') ) {
            $params = Request::$params;
            // 是否存在 HTML 緩存文件
            $path = 'Tpl/' . PLATFORM . '/' . MODULE . '/' . CONTROLLER . '/'  . METHOD . '/';
            foreach ($params as $k => $v) {
                $path = $path . $k . '&' . $v . '/';
            }
            $filename = $path . $template . '.html';
            if(file_exists($filename)) {
                header("location:/" . $filename);
            } else {
                // 獲取內存中的緩存字符串
                $content = $this->view()->make($template)->with($vars)->__toString();
                // 獲取運行時目錄常亮
                if( !is_dir($path)) {
                    mkdir($path,0744,true);
                    if ( !file_exists($filename)) {
                        $fp = fopen($filename,'w');
                        fwrite($fp, $content);
                        fclose($fp);
                    }
                }
                // 調用父類方法,展示模版
                header("location:/" . $filename);
            }
        } else {
            return $this->view()->make($template)->with($vars)->render();
        }
    }

    // 是否存在缓存模板，存在则删除
}
