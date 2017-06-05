<?php
/*
Plugin Name: Progressive Content Filter Form
Plugin URI:
Description: Progressive content filter with taxonomy-based questions to filter content per user input.
Version: 1.0
Author: Michael W. Delaney
Author URI:
License: MIT
*/
namespace MWD\ProgressiveContentFilterForm;
/**
 * Set up autoloader
 */
require __DIR__ . '/vendor/autoload.php';
/**
 * Define constants
 */
    define( 'PCFF_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
    define( 'PCFF_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * Require classes
 */
 add_action( 'after_setup_theme', '\\MWD\\ProgressiveContentFilterForm\\init_plugin' );

function init_plugin() {
	$pcff_init = new \MWD\ProgressiveContentFilterForm\Init();
	$pcff_shortcodes = new \MWD\ProgressiveContentFilterForm\Shortcodes();
}

 require_once( plugin_dir_path( __FILE__ ) . 'app/pageTemplate.php' );
 add_action( 'plugins_loaded', array( '\\MWD\\ProgressiveContentFilterForm\\PageTemplate', 'get_instance' ) );
