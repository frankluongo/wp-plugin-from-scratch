<?php
/**
 * @package frankluongoplugin
 */

 class FrankluongoPluginDeactivate {
   public static function deactivate() {
     flush_rewrite_rules();
   }
 }
