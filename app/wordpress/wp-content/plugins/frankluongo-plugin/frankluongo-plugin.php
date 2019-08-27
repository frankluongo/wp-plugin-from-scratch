<?php
/**
 * @package frankluongoplugin
 */
/*
  Plugin Name: Frankluongo Plugin
  Plugin URI: https://frankluongo.com
  Description: My first Plugin
  Version: 1.0.0
  Author: Frank Luongo
  Author URI: https://frankluongo.com
  License: GPLv2 or later
  Text Domain: frankluongo-plugin
*/


// FIRST: Check to see that Wordpress is defined before doing anything
  defined('ABSPATH') or die('Wordpress is not active');

// SECOND: Create your Plugin Class
class FrankluongoPlugin {
  function __construct() {
    // Initialize the new post type on WP Init
    add_action('init', array($this, 'custom_post_type'));
  }

  function activate() {
    // Add the custom post type on activate as a fail safe for the construct action
    $this->custom_post_type();
    // When the post type is added, reset the permissions
    flush_rewrite_rules();
  }

  function deactivate() {
    flush_rewrite_rules();
  }

  function uninstall() {

  }

  function custom_post_type() {
    register_post_type( 'book', [
      'public' => true,
      'label' => 'Books'
    ]);
  }
}

// THIRD: Make sure Class exists, and if it does, call it
if (class_exists( 'FrankluongoPlugin' ) ) {
  $frankluongoPlugin = new FrankluongoPlugin();
}

register_activation_hook(__FILE__, array($frankluongoPlugin, 'activate'));
register_deactivation_hook(__FILE__, array($frankluongoPlugin, 'deactivate'));
