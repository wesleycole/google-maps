<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Public Views class
 *
 * @author      Wes Cole
 * @category    Class
 * @package     ObjectivGoogleMaps/Classes
 * @since       1.0
 */
class Obj_Gmaps_Public {

    public function __construct( $file, $version ) {

        $this->file = $file;
        $this->version = $version;

        add_action( 'init', array( $this, 'add_map_shortcode' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_js' ) );

    }

    /**
     * Add map shortcode
     *
     * @since 1.0
     */
    public function add_map_shortcode() {

        add_shortcode( 'objectiv_google_maps', array( $this, 'map_shortcode_markup' ) );

    }

    /**
     * Create Map Shortcode Markup
     *
     * @since 1.0
     */
    public function map_shortcode_markup() {

        ob_start();

        echo '<div id="obj-google-maps"></div>';

        return ob_get_clean();

    }

    /**
     * Enqueue JS
     *
     * @since 1.0
     */
    public function enqueue_js() {

        if ( obj_has_shortcode( 'objectiv_google_maps' ) ) {
            wp_enqueue_script( 'obj-google-maps', plugins_url( '/assets/js/build/main.js', $this->file ), array(), $this->version, true );
        }

    }

}