<?php

/**
* @package xample
*/
namespace includes\base;
class DeactivatePlugin {
    public static function deactivate() {
        flush_rewrite_rules();
    }
}