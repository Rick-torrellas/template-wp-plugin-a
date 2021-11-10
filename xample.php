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
$external = dirname(__FILE__) . '/Globals.php';
if ( file_exists($autoload)) {
    require_once $autoload;
}
if (file_exists($external)) {
    require_once $external;
}
use includes\Init;
use includes\base\ActivatePlugin;
use includes\base\DeactivatePlugin;
function xample_activate_plugin() {
    if (class_exists('includes\\base\\ActivatePlugin')) {
        ActivatePlugin::activate();
    }
}
function xample_deactivate_plugin() {
    if (class_exists('includes\\base\\DeactivatePlugin')) {
        DeactivatePlugin::deactivate();
    }
}
register_activation_hook(__FILE__,'xample_activate_plugin');
register_deactivation_hook(__FILE__,'xample_deactivate_plugin');
if (class_exists('includes\\Init')) {
    Init::register_services();
}