<?php namespace includes;

/**
* @package xample
*/
// namespace includes;
defined('ABSPATH') or die('Hey, you can\t access this file, you silly human!');

if ( ! function_exists('add_action')) {
    echo 'Hey, you can\t access this file, you silly human!';
    die;
}
if ( !class_exists('Globals')) {
class Globals {
    public static function plugin_path() {
        return plugin_dir_path(dirname(__FILE__,1));
    }
    public static function admin_page() {
       return 'xample_plugin'; 
    }
    public static function plugin_url() {
        return plugin_dir_url(dirname(__FILE__,1));
    }
    public static function plugin_file_name() {
        return 'xample.php';
    }
    public static function plugin_name() {
        return plugin_basename(dirname(__FILE__,2)) . '/'. self::plugin_file_name();
    }
    
    public static function customfields_xample() {
        return [
            "option_group" => "xample_options_group",
            "option_name" => "xample_example",
            "id" => "xample_admin_index",
            "page" => self::admin_page()
        ];
    }
    public static function plugin_info() {
        //TODO: mostrar todas los valores de todas las funciones, no se si usar un string, o un array, creo que tiene mas logica un string.
    }
}
}