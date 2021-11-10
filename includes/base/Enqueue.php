<?php namespace includes\base;

/**
* @package xample
*/
use \includes\Globals;
class Enqueue
{
    function register() {
        add_action('admin_enqueue_scripts',[$this,'enqueue']);
}
function enqueue() {
    wp_enqueue_style('estilos', Globals::plugin_url() . 'assets/styles.css');
    wp_enqueue_script('escript', Globals::plugin_url() . 'assets/scripts.js');
}
}