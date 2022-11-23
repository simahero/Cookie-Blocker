<?php

/**
 * Plugin Name:       Cookie Blocker
 * Description:       Users must accept or deny cookies
 * Version:           1.0.2
 * Author:            Ront車 Zolt芍n
 * Author URI:        simahero.github.io
 * Text Domain:       cookie-blocker
 */

/* 
  01001001 00100000 01001100 01001111 
  01010110 01000101 00100000 01011001 
  01001111 01010101 00100000 01010000 
  01000001 01010100 01010010 01001001 
  01000011 01001001 01000001 00000000
*/

add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('cookie-blocker-style', plugin_dir_url(__FILE__) . 'src/css/styles.css');
  wp_enqueue_script('cookie-blocker-script', plugin_dir_url(__FILE__) . 'src/js/function.js', array('jquery'), '1.0.1', false);
});
