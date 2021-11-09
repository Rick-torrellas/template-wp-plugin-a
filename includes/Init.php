<?php

/**
* @package xample
*/
namespace includes;
final class Init
{   
    static function get_services() {
        return [
            pages\AdminPages::class,
            base\Enqueue::class,
            base\SettingLinks::class
        ];
    }
    static function register_services() {
        foreach ( self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }
    private static function instantiate($class) {
        $service = new $class;
        return $service;
    }
}
