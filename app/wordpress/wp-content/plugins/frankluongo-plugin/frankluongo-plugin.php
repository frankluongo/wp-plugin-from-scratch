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

  // Static
  // A static methods allows you to use it without initializing the class

  function __construct() {
    $this->create_post_type();
  }

  protected function create_post_type() {
    add_action('init', array($this, 'custom_post_type'));
  }

  public static function register() {
    // add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    add_action('wp_enqueue_scripts', array('FrankluongoPlugin', 'enqueue'));
  }

  function activate() {
    $this->custom_post_type();
    flush_rewrite_rules();
  }

  function deactivate() {
    flush_rewrite_rules();
  }

  function custom_post_type() {
    register_post_type( 'book', [
      'public' => true,
      'label' => 'Books'
    ]);
  }

  public static function enqueue() {
    // Enqeue All Our Scripts & Styles
    wp_enqueue_style('frankluongo-plugin', plugins_url('/assets/frankluongo-plugin.css', __FILE__));
    wp_enqueue_script('frankluongo-plugin', plugins_url('/assets/frankluongo-plugin.js', __FILE__));
  }
}

// THIRD: Make sure Class exists, and if it does, call it
if (class_exists( 'FrankluongoPlugin' ) ) {
  // $frankluongoPlugin = new FrankluongoPlugin();
  // $frankluongoPlugin->register();
  FrankluongoPlugin::register();
}

// register_activation_hook(__FILE__, array($frankluongoPlugin, 'activate'));
// register_deactivation_hook(__FILE__, array($frankluongoPlugin, 'deactivate'));
