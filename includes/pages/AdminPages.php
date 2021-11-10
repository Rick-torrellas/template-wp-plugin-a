<?php

/**
* @package xample
*/
namespace includes\pages;
use \includes\Globals;
use \includes\api\SettingsApi;
class AdminPages
{
    public $settings;
    public $pages = [];
    public $subPages = [];
    public function __construct()
    {
        $this->pages = [
            [
        'page_title' => 'Xample Plugin',
        'menu_title' => 'Xample',
        'capability' => 'manage_options',
        'menu_slug' => Globals::admin_page(),
        'callback' => function() {require_once Globals::plugin_path() . 'templates/admin.php';},
        'icon_url' => 'dashicons-superhero-alt',
        'position' => 110
            ]
            ];
        $this->subPages = [
            ['parent_slug'=> Globals::admin_page(),
            'page_title' => 'Custom Post Types',
            'menu_title' => 'CPT',
            'capability' => 'manage_options',
            'menu_slug' => 'xample_cpt',
            'callback' => function() {require_once Globals::plugin_path() . 'templates/test.php';}
            ]
        ];
        $this->settings = new SettingsApi();
    }
    function register() {
        //FIXME: el withSubPages no sirve deberia mostrar el Dashboard. en el primer elemento de los subPages, en vez de eso muestra el nombre del menu padre.
        $this->settings->addPages($this->pages)->withSubPages( 'Dashboard' )->addSubPages($this->subPages)->register();
    } 
}
