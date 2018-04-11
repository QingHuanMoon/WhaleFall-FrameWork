<?php
/**
 * Created by PhpStorm.
 * User: Qh
 * Date: 2018/4/11
 * Time: 上午11:25
 */

namespace App\Controller\Back\View;


use App\Models\Hello;
use Core\BaseController;
use Libs\Request;

class IndexController extends BaseController
{
  public function showIndex() {
      $path = SPA_PATH . 'app.js';
      $this->assign('path',$path);
    $this->display('index.php');
  }
}
