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

// Make sure class doesn't exist already
if (!class_exists( 'FrankluongoPlugin' ) ) {

  // Create your Plugin Class
  class FrankluongoPlugin {

    // Static
    // A static methods allows you to use it without initializing the class

    function __construct() {
      $this->create_post_type();
    }

    protected function create_post_type() {
      add_action('init', array($this, 'custom_post_type'));
    }

    function register() {
      // add_action('admin_enqueue_scripts', array($this, 'enqueue'));
      add_action('wp_enqueue_scripts', array($this, 'enqueue'));
    }

    function custom_post_type() {
      register_post_type( 'book', [
        'public' => true,
        'label' => 'Books'
      ]);
    }

    function enqueue() {
      // Enqeue All Our Scripts & Styles
      wp_enqueue_style('frankluongo-plugin', plugins_url('/assets/frankluongo-plugin.css', __FILE__));
      wp_enqueue_script('frankluongo-plugin', plugins_url('/assets/frankluongo-plugin.js', __FILE__));
    }

    function activate() {
      require_once plugin_dir_path(__FILE__) . 'includes/frankluongo-plugin-activate.php';
      FrankluongoPluginActivate::activate();
    }
  }


  $frankluongoPlugin = new FrankluongoPlugin();
  $frankluongoPlugin->register();
}


register_activation_hook(__FILE__, array($frankluongoPlugin, 'activate'));

require_once plugin_dir_path(__FILE__) . 'includes/frankluongo-plugin-deactivate.php';
register_deactivation_hook(__FILE__, array('FrankluongoPluginDeactivate', 'deactivate'));
