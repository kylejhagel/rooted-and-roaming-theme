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

/**
 * Disable automatic paragraph formatting for
 * Contact Form 7 frontend forms only.
 *
 * Preserve automatic formatting for email content.
 */
add_filter(
    'wpcf7_autop_or_not',
    function ( $autop, $options ) {
        if (
            isset( $options['for'] ) &&
            'form' === $options['for']
        ) {
            return false;
        }

        return $autop;
    },
    10,
    2
);
