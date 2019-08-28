<?php
/**
 * @package frankluongoplugin
 */

 class FrankluongoPluginActivate {
   public static function activate() {
     flush_rewrite_rules();
   }
 }
