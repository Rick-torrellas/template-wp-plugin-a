<?php namespace includes\pages;

/**
* @package xample
*/

use \includes\Globals;
use \includes\api\SettingsApi;
use \includes\api\callbacks\AdminCallBacks;
class AdminPages
{
    public $settings;
    public $pages = [];
    public $subPages = [];
    public $callbacks;
    public $cf_xample;
    public function __construct()
    {
        $this->cf_xample=Globals::customfields_xample();
    }
    public function register() {
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallBacks();
        $this->setPages();
        $this->setSubPages();
        $this->setSettings();
        $this->setSections();
        $this->setFields();
        //FIXME: el withSubPages no sirve deberia mostrar el Dashboard. en el primer elemento de los subPages, en vez de eso muestra el nombre del menu padre.
        $this->settings->addPages($this->pages)->withSubPages( 'Dashboard' )->addSubPages($this->subPages)->register();
    } 
    public function setPages() {
        $this->pages = [
            [
        'page_title' => 'Xample Plugin',
        'menu_title' => 'Xample',
        'capability' => 'manage_options',
        'menu_slug' => Globals::admin_page(),
        'callback' => [$this->callbacks,'adminDashboard'],
        'icon_url' => 'dashicons-superhero-alt',
        'position' => 110
            ]
            ];
    }
    public function setSubPages() {
        $this->subPages = [
            ['parent_slug'=> Globals::admin_page(),
            'page_title' => 'Custom Post Types',
            'menu_title' => 'CPT',
            'capability' => 'manage_options',
            'menu_slug' => 'xample_cpt',
            'callback' => [$this->callbacks,'adminPost']
        ],
        ['parent_slug'=> Globals::admin_page(),
        'page_title' => 'Custom Taxonomies',
        'menu_title' => 'Taxonomies',
        'capability' => 'manage_options',
        'menu_slug' => 'xample_taxonomies',
        'callback' => [$this->callbacks,'adminTaxonomies']
    ],
    ['parent_slug'=> Globals::admin_page(),
        'page_title' => 'Custom Widgets',
        'menu_title' => 'Widgets',
        'capability' => 'manage_options',
        'menu_slug' => 'xample_widgets',
        'callback' => [$this->callbacks,'adminWidgets']
    ],
        ];
    }
    public function setSettings() {
        $args = [
            [
                'option_group' => $this->cf_xample["option_group"],
                'option_name' => "",
                'callback' => [$this->callbacks,'xampleOptionsGroup']

            ]
        ];
        $this->settings->setSettings($args);
    }
    public function setSections() {
        $args = [
            [
                'id' => $this->cf_xample["id"],
                'title' => "Settings",
                'callback' => [$this->callbacks,'xampleAdminSection'],
                'page' =>$this->cf_xample["page"] 

            ]
        ];
        $this->settings->setSections($args);
    }
    public function setFields() {
        $args = [
            [
                'id' => $this->cf_xample["option_name"],
                'title' => "Settings",
                'callback' => [$this->callbacks,'xampleTextExample'],
                'page' =>$this->cf_xample["page"],
                'section' => $this->cf_xample["id"],
                'arg' => [
                    'label_for' => $this->cf_xample["option_name"],
                    'class' => 'example-class'
                ]
            ]
        ];
        $this->settings->setFields($args);
    }
}
