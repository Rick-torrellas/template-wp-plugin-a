<?php

/**
 * @package xample
 * Trigger this file on plugin uninstall
 */

if (! defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

$books = get_posts(['post_type' => 'book','numberposts'=>-1]);

foreach ($books as $book) {
    wp_delete_post( $book->ID, true );
}