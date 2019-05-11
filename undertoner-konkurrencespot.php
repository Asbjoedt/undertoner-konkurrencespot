<?php

/**
 * Plugin Name: Undertoner konkurrencespot
 * Description: Tilføjer funktion til vis/skjul af konkurrencespot under "Indstillinger".
 * Version: 1.0
 * Author: Asbjørn Skødt
 * Author URI: https://youtu.be/boIKuEl6l0Y
 **/
 
// Laver menu i backend
add_action( 'admin_menu', 'undertoner_konkurrencespot_menu' );

function undertoner_konkurrencespot_menu(){
  $page_title = 'Undertoner konkurrencespot';
  $menu_title = 'Undertoner konkurrencespot';
  $capability = 'upload_files';
  $menu_slug  = 'undertoner-konkurrencespot';
  $function   = 'undertoner_konkurrencespot_backendside';
  $position   = 3;
  
  add_submenu_page( 'options-general.php', $page_title, $menu_title, $capability, $menu_slug, $function, $position );
  
  add_action( 'admin_init', 'undertoner_konkurrencespot_opdater_indstillinger' );
}

// Laver inputfelter til indstillinger i backend
function undertoner_konkurrencespot_backendside(){
?>  
  <h1>Konfigurer konkurrencespot</h1>
  <form method="post" action="options.php">
    <?php settings_fields( 'undertoner_konkurrencespot_indstillinger' ); ?>
    <?php do_settings_sections( 'undertoner_konkurrencespot_indstillinger' ); ?>
	<table class="form-table">
	<tr valign="top"><th scope="row">Vælg indstilling</th></tr>
	<?php $options = get_option( 'undertoner_konkurrencespot_radio' ); ?>
	<tr><td><label><input type="radio" name="undertoner_konkurrencespot_radio[konkurrencewidget]" value="Vis som standard sidebar" <?php checked( 'Vis som standard sidebar' == $options['konkurrencewidget'] ); ?> />Vis som standard sidebar</label></td></tr>
	<tr><td><label><input type="radio" name="undertoner_konkurrencespot_radio[konkurrencewidget]" value="Vis som sticky sidebar" <?php checked( 'Vis som sticky sidebar' == $options['konkurrencewidget'] ); ?> />Vis som sticky sidebar</label></td></tr>
	<tr><td><label><input type="radio" name="undertoner_konkurrencespot_radio[konkurrencewidget]" value="Skjul" <?php checked( 'Skjul' == $options['konkurrencewidget'] ); ?> />Skjul</label></td></tr>
    </table>
    <?php submit_button(); ?>
  </form>
<?php
}

function undertoner_konkurrencespot_opdater_indstillinger() {
  register_setting( 'undertoner_konkurrencespot_indstillinger', 'undertoner_konkurrencespot_radio[konkurrencewidget]' );
}

// Forbinder indstillinger til widget


?>