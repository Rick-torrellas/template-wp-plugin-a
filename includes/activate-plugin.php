<?php

/**
* @package xample
*/

class XampleActivatePlugin {
    public static function activate() {
        flush_rewrite_rules();
    }
}