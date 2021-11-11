<?php
$Globals = plugin_dir_path(dirname(__FILE__)).'/includes/Globals.php';
if (file_exists($Globals)) {
    require_once $Globals;
}
use includes\Globals;
$cf_xample = Globals::customfields_xample();
?>
<div class="warp">
    <h3>dashboard.php</h3>
    <?php settings_errors();?>
    <form action="options.php" method="post" >
        <?php
        settings_fields($cf_xample["option_group"]);
        do_settings_sections($cf_xample["page"]);
        submit_button();
        ?>  
    </form>
</div>
