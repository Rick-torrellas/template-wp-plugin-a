<?php

/**
* @package xample
*/

defined('ABSPATH') or die('Hey, you can\t access this file, you silly human!');

if ( ! function_exists('add_action')) {
    echo 'Hey, you can\t access this file, you silly human!';
    die;
}
if ( !class_exists('XamplePlugin')) {
class XampleExternal {
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
}
}