<?php
/**
 * Created by PhpStorm.
 * User: Qh
 * Date: 2018/4/11
 * Time: 上午11:43
 */

namespace Libs;


use Noodlehaus\Config;

class Conf
{
  public static function all() {
    $conf = new Config(CONF_PATH);
    return $conf->all();
  }

  public static function get($key) {
    $conf = new Config(CONF_PATH);
    return $conf->get($key);
  }
}
