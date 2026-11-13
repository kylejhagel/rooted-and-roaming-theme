<?php
/**
 * Rooted and Roaming child-theme assets.
 *
 * @package RootedAndRoaming
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'wp_enqueue_scripts', function () {
    $path = get_stylesheet_directory() . '/assets/css/theme.css';
    if ( ! file_exists( $path ) ) {
        return;
    }
    wp_enqueue_style(
        'rooted-and-roaming-components',
        get_stylesheet_directory_uri() . '/assets/css/theme.css',
        array(),
        (string) filemtime( $path )
    );
}, 30 );
