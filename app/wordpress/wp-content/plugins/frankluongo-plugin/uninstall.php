<?php
/**
 * @package frankluongoplugin
 */


// Trigger on uninstall

if (!defined('WP_UNINSTALL_PLUGIN')) {
  die;
}

// Clear Database Stored Data

// Option 1: Good for simple deletions
/*
  $books = get_posts(array(
    'post_type' => 'book',
    'numberposts' => -1
  ));
  foreach($books as $book ) {
    // wp_delete_post(post ID, force delete?)
    wp_delete_post($book->ID, true);
  }
*/

// Option 2: Access the Database via SQL
  global $wpdb;
  // Delete all the posts with an type of book
  $wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'book'" );
  // Delete all the meta data where the post ID does not exist in the wp_posts table -- AKA the posts don't exist
  $wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)" );
  // Same as the query above
  $wpdb->query( "DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)" );
