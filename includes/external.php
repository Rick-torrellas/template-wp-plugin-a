<?php

/**
* @package xample
*/
namespace includes;
defined('ABSPATH') or die('Hey, you can\t access this file, you silly human!');

if ( ! function_exists('add_action')) {
    echo 'Hey, you can\t access this file, you silly human!';
    die;
}
if ( !class_exists('XamplePlugin')) {
class External {
    static $includes = 'includes';
    static $templates = 'templates';
    /* 
    * INCLUDES
    */
    static function includes_activate_plugin() {
        return self::$includes . '/activate-plugin.php';
    }
    static function includes_deactivate_plugin() {
        return self::$includes . '/deactivate-plugin.php';
    }
    /* 
    * TEMPLATES
    */
    static function templates_admin() {
        return self::$templates . '/admin.php';
    }
}
}