<?php
/**
 * Created by PhpStorm.
 * User: Qh
 * Date: 2018/4/11
 * Time: 下午12:30
 */

namespace App\Controller\Back\View;


use App\Models\Test;
use Core\BaseController;

class TestController extends BaseController
{
  public function test(Test $test) {
      $res = $test->all();
      $this->assign('res',$res);
      $this->display('Test.html');
  }

  public function change(Test $test) {
      $id = $_POST['id'];
      $age = $_POST['age'];
      if($this->isCached('Test.html')) {
          $this->clearCache('Test.html');
      }
      $test->where('id',$id)->update(['age' => $age]);
      header('location:/test');
  }
}
