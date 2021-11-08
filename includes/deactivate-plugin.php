<?php

/**
* @package xample
*/
namespace includes;
class DeactivatePlugin {
    public static function deactivate() {
        flush_rewrite_rules();
    }
}