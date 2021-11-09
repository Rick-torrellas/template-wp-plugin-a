<?php

/**
* @package xample
*/
namespace includes\base;
class ActivatePlugin {
    public static function activate() {
        flush_rewrite_rules();
    }
}