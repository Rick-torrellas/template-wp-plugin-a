<?php

/**
* @package xample
* Plugin Name: xample
* Description: Plugin de ejemplo para aprender.
*/

/*

MIT License

Copyright (c) 2021 Ricardo Torrellas <ricardo.torrejas@gmail.com>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
*/

defined('ABSPATH') or die('Hey, you can\t access this file, you silly human!');

if ( ! function_exists('add_action')) {
    echo 'Hey, you can\t access this file, you silly human!';
    die;
}

class XamplePlugin {
    function __construct() {
        add_action('init', [ $this, 'custom_post_type']);
    }
    function register() {
        add_action('admin_enqueue_scripts',[$this,'enqueue']);
    }
    function activate() {
        $this->custom_post_type();
        flush_rewrite_rules( );
    }
    function desactivate() {
        flush_rewrite_rules();
    }
    function uninstall() {

    }
    // * Custom post type 
    function custom_post_type() {
        register_post_type('book', ['public' => true,'label' => 'Books']);
    }
    function enqueue() {
        // agregar css y js.
        wp_enqueue_style('estilos', plugins_url('/assets/styles.css', __FILE__));
        wp_enqueue_script('escript', plugins_url('/assets/scripts.js', __FILE__));
    }
}

if ( class_exists('XamplePlugin')) {
    $xample_plugin = new XamplePlugin();
    $xample_plugin->register();
}

register_activation_hook( __FILE__, [$xample_plugin, 'activate'] );
register_deactivation_hook( __FILE__, [$xample_plugin, 'desactivate'] );