<?php

/**
* @package xample
*/
namespace includes\pages;
class AdminPages
{
    function register() {
        add_action('admin_menu',[$this,'add_admin_pages']);
    } 
    function add_admin_pages() {
        $page_title = 'Xample Plugin';
        $menu_title = 'Xample';
        $capability = 'manage_options';
        $menu_slug = ADMIN_PAGE;
        $function = [$this,'admin_index'];
        $icon_url = 'dashicons-superhero-alt';
        $position = 110;
        add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function , $icon_url, $position );
    }
    function admin_index() {
        require_once PLUGIN_PATH . 'templates/admin.php';
    }
}
