<?php

/**
 * Plugin Name:       Cookie Blocker
 * Description:       Users must accept or deny cookies
 * Version:           1.0.3
 * Author:            Ront車 Zolt芍n
 * Author URI:        simahero.github.io
 * Text Domain:       cookie-blocker
 */

/* 
  01001001 00100000 01001100 01001111
  01010110 01000101 00100000 01011001
  01001111 01010101 00100000 01001100
  01001111 01010100 01010100 01001001
  00100000 00111100 00110011 00000000
*/

add_action('admin_init', 'child_plugin_has_parent_plugin');
function child_plugin_has_parent_plugin()
{
  if (is_admin() && current_user_can('activate_plugins') &&  !is_plugin_active('gdpr-cookie-compliance/moove-gdpr.php')) {
    add_action('admin_notices', 'child_plugin_notice');

    deactivate_plugins(plugin_basename(__FILE__));

    if (isset($_GET['activate'])) {
      unset($_GET['activate']);
    }
  }
}

function child_plugin_notice()
{
?><div class="error">
    <p>Sorry, but this plugin requires the <a href="https://wordpress.org/plugins/gdpr-cookie-compliance/" target="_blank">GDPR Cookie Compliance</a> plugin to be installed and active.</p>
  </div>
<?php
}

add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('cookie-blocker-style', plugin_dir_url(__FILE__) . 'src/css/styles.css');
  wp_enqueue_script('cookie-blocker-script', plugin_dir_url(__FILE__) . 'src/js/function.js', array('jquery'), '1.0.1', false);
});
