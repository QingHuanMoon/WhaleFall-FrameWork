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
    $this->template_dir = VIEW_PATH;
    $this->compile_dir = COMP_PATH;
    $this->caching = true;
    $this->cache_dir = CACHE;
  }
}
