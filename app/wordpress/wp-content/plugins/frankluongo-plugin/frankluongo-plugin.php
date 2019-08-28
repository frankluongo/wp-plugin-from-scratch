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

  // Public -- Everyone
  // Method that can be accessed everywhere -- This is the default

  // Protected -- Class and Extended Classes
  // Method that can only be accessed within the class itself -- The Class (or an extended class of it) has to call the method, nothing else can

  // Private -- Only This Class
  // Method that can only be accessed with the clas itself and nothing else

  public $var1 = 1;

  protected $array1 = array();

  function __construct() {
    $this->test();
    $this->create_post_type();
  }

  protected function create_post_type() {
    // Initialize the new post type on WP Init
    add_action('init', array($this, 'custom_post_type'));
  }

  public function register() {
    // Initialize CSS in the Admin
    // add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    // Initialize CSS in the Frontend
    add_action('wp_enqueue_scripts', array($this, 'enqueue'));
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

  private function test() {
    echo 'hi!';
  }

  function uninstall() {

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
}

class SecondClass extends FrankluongoPlugin() {
  function register_post_type() {
    $this->create_post_type();
  }
}

// THIRD: Make sure Class exists, and if it does, call it
if (class_exists( 'FrankluongoPlugin' ) ) {
  $frankluongoPlugin = new FrankluongoPlugin();
  $frankluongoPlugin->register();
}

register_activation_hook(__FILE__, array($frankluongoPlugin, 'activate'));
register_deactivation_hook(__FILE__, array($frankluongoPlugin, 'deactivate'));
