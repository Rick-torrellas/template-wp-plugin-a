<?php namespace includes\base;

/**
* @package xample
*/
use includes\Globals;
class SettingLinks
{
    protected $plugin_name;
    protected $admin_page;
    function __construct()
    {
        $this->plugin_name = Globals::plugin_name();
        $this->admin_page = Globals::admin_page();
    }
    function register() {
    add_filter("plugin_action_links_$this->plugin_name",[$this,'setting_links']);
}
function setting_links($links) {
    $href = "admin.php?page=$this->admin_page";
    $settings_link = "<a href='$href'>Configuracion</a>";
    array_push($links,$settings_link);
    return $links;
}
}