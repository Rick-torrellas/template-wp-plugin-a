<?php

/**
* @package xample
*/

class XampleDeactivatePlugin {
    public static function deactivate() {
        flush_rewrite_rules();
    }
}