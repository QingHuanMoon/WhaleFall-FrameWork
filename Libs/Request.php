<?php
/**
 * Created by PhpStorm.
 * User: Qh
 * Date: 2018/4/11
 * Time: 下午12:29
 */

namespace Libs;


class Request
{
    public static $params;

  public function get($getkey) {
      return self::$params[$getkey];
  }
}
