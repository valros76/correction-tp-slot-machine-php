<?php
namespace Utils;
class Autoloader
{

  public static function register()
  {
    spl_autoload_register(function ($class) {
      $class = ucfirst($class);
      $class = str_replace("\\", "/", $class);
      $type = null;
      $configFile = file_get_contents("config/config.json");
      $config = json_decode($configFile);

      foreach ($config->autoloadFolders as $dir) {
        if (str_contains($class, $dir)) {
          $type = lcfirst($dir);
          $class = str_replace("{$dir}/", "", $class);
        }
        if ($type && file_exists("{$type}/{$class}.php")) {
          require_once "{$type}/{$class}.php";
        }
      }
    });
  }
}
