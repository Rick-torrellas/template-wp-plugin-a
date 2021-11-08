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
$autoload = dirname(__FILE__) . '/vendor/autoload.php';
if ( file_exists($autoload)) {
    require_once $autoload;
}
use includes\ActivatePlugin;
use includes\DeactivatePlugin;
use includes\External;
if ( !class_exists('XamplePlugin')) {
require_once plugin_dir_path(__FILE__) . './external.php';
class XamplePlugin {
    public $plugin_name;
    public $admin_page;
    function __construct() {
        $this->plugin_name = plugin_basename(__FILE__);
        $this->admin_page = 'xample_plugin';
    }
    public function register() {
        add_action('init', [ $this, 'custom_post_type']);
        add_action('admin_enqueue_scripts',[$this,'enqueue']);
        add_action('admin_menu',[$this,'add_admin_pages']);
        add_filter("plugin_action_links_$this->plugin_name",[$this,'setting_links']);
    }
    function setting_links($links) {
        $href = "admin.php?page=$this->admin_page";
        $settings_link = "<a href='$href'>Configuracion</a>";
        array_push($links,$settings_link);
        return $links;
    }
    function add_admin_pages() {
        $page_title = 'Xample Plugin';
        $menu_title = 'Xample';
        $capability = 'manage_options';
        $menu_slug = $this->admin_page;
        $function = [$this,'admin_index'];
        $icon_url = 'dashicons-superhero-alt';
        $position = 110;
        add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function , $icon_url, $position );
    }
    function admin_index() {
        require_once plugin_dir_path(__FILE__) . External::templates_admin();
    }
    function activate() {
        $this->custom_post_type();
        ActivatePlugin::activate();
    }
    function deactivate() {
        DeactivatePlugin::deactivate();
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

/**
* Activation
*/
register_activation_hook( __FILE__, [$xample_plugin, 'activate'] );
/**
* Deactivation
*/
register_deactivation_hook( __FILE__, [$xample_plugin, 'deactivate'] );
}