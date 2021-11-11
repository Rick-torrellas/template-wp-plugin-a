<?php namespace includes\api\callbacks;

/**
* @package xample
*/

use \includes\Globals;
use \includes\api\SettingsApi;
class AdminCallBacks 
{
    public function adminDashboard() {
       return require_once Globals::plugin_path() . 'templates/dashboard.php';
    }
    public function adminPost() {
        return require_once Globals::plugin_path() . 'templates/post.php';
     }
     public function adminTaxonomies() {
        return require_once Globals::plugin_path() . 'templates/taxonomies.php';
     }
     public function adminWidgets() {
        return require_once Globals::plugin_path() . 'templates/widgets.php';
     }
     public function xampleOptionsGroup($input ) {
      return $input;
     }
     public function xampleAdminSection() {
        echo "bla bla bla";
     } 
     public function xampleTextExample() {
      $cf_xample=Globals::customfields_xample();
      $value = esc_attr(get_option($cf_xample['option_name']));
        echo "<input type='text' class='regular-text' name=".$cf_xample['option_name']." placeholder='Write Someting Here' value=".$value.">";
     }
}