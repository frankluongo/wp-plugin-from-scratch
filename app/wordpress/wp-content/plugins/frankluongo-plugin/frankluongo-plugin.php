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

/*
  FIRST: Check to see that Wordpress is defined before doing anything

  If Absolute Path is not defined, kill this plugin
  Abs Path is created by WP, so if it doesn't exist then someone is trying to indirectly access the site
  This can also be performed with add action
*/
// Option 1
if (!defined('ABSPATH')) {
  die;
}

// Option 2
defined('ABSPATH') or die('Wordpress is not active');

// Option 3
if (!function_exists('add_action')) {
  exit;
}
