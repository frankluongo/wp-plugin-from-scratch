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
  // function __construct() {
  // }

  function activate() {
    // ex. Generate a custom Post Type
    // ex. Flush Rewrite Rules
    echo 'The plugin was activated';
  }

  function deactivate() {
    // ex. Flush Rewrite Rules
    echo 'The plugin was deactivated';
  }

  function uninstall() {
    // ex. Delete Custom Post Type

  }
}

// THIRD: Make sure Class exists, and if it does, call it
if (class_exists( 'FrankluongoPlugin' ) ) {
  $frankluongoPlugin = new FrankluongoPlugin();
}

//  Wordpress has 3 built-in events that occur within a plugin lifecycle
  // Activation
  register_activation_hook(__FILE__, array($frankluongoPlugin, 'activate'));
  // Deactivation
  register_deactivation_hook(__FILE__, array($frankluongoPlugin, 'deactivate'));
  // Uninstallation
  // Coming later...

