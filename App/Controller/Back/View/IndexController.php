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
use Philo\Blade\Blade;

class IndexController extends BaseController
{
  public function showIndex(Request $request) {
      $id = $request->get('id');
      $card = $request->get('card');
      $name = $request->get('name');
      $msg = 'hello blade';
      $data = [
          'id' => $id,
          'card'=> $card,
          'name' => $name,
          'msg' => $msg
      ];
      return $this->display('Home',$data);
  }
}
