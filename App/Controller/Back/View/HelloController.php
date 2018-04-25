<?php
/**
 * Created by PhpStorm.
 * User: qhMo0n
 * Date: 2018/4/12
 * Time: 下午6:32
 */

namespace App\Controller\Back\View;


use Libs\Request;

class HelloController
{
    public function showArticle(Request $request) {
        return $request->get('id');
    }
}
