<?php

/**
* @package xample
*/
namespace includes;
class ActivatePlugin {
    public static function activate() {
        flush_rewrite_rules();
    }
}