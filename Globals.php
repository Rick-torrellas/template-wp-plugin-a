<?php

/**
* @package xample
*/
namespace home;
defined('ABSPATH') or die('Hey, you can\t access this file, you silly human!');

if ( ! function_exists('add_action')) {
    echo 'Hey, you can\t access this file, you silly human!';
    die;
}
if ( !class_exists('XamplePlugin')) {
class Globals {
    static function register() {
        define('PLUGIN_PATH',plugin_dir_path(__FILE__));
        define('ADMIN_PAGE','xample_plugin');
        define('PLUGIN_URL', plugin_dir_url(__FILE__));
    }
}
}