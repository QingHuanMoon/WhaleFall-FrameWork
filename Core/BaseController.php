<?php
/**
 * Created by PhpStorm.
 * User: Qh
 * Date: 2018/4/11
 * Time: 下午5:17
 */

namespace Core;


class BaseController extends \Smarty
{

  public function __construct()
  {
    parent::__construct();
    $this->setTemplateDir(VIEW_PATH);
    $this->setCompileDir(COMP_PATH . '/' . PLATFORM . '/' . MODULE . '/' . CONTROLLER . '/');
    $this->setCacheDir(CACHE . '/' . PLATFORM . '/' . MODULE . '/' . CONTROLLER . '/');
    $this->caching = true;
  }


  public function display  ($template = null, $cache_id = null, $compile_id = null, $parent = null) {
      // 打開緩存
      ob_clean();
      ob_start();
      // 是否存在 HTML 緩存文件
      $filename = 'Tpl/' . PLATFORM . '/' . MODULE . '/' . CONTROLLER . '/'  . METHOD . '/' . $template;
      if(file_exists($filename)) {
          header("location:" . $filename);
      } else {
          // 調用父類方法,展示模版
          parent::display($template,$compile_id,$compile_id,$parent);
          // 獲取內存中的緩存字符串
          $content = ob_get_contents();
          // 獲取運行時目錄常亮
          $path = 'Tpl/' . PLATFORM . '/' . MODULE . '/' . CONTROLLER . '/' . METHOD . '/';
          if( !is_dir($path)) {
              mkdir($path,0744,true);
              if ( !file_exists($path . $template)) {
                  $fp = fopen($path .$template,'w');
                  fwrite($fp, $content);
                  fclose($fp);
              }
          } ;
      }
  }
}
