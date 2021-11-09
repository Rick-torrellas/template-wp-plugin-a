<?php

/**
* @package xample
*/
namespace includes\base;
class Enqueue
{
    function register() {
        add_action('admin_enqueue_scripts',[$this,'enqueue']);
}
function enqueue() {
    wp_enqueue_style('estilos', PLUGIN_URL . 'assets/styles.css');
    wp_enqueue_script('escript', PLUGIN_URL . 'assets/scripts.js');
}
}