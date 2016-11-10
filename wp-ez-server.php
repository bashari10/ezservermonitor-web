<?php
/*
Plugin URI:  
Description: 
Version:     0.1
Author:      
Author URI:  
Text Domain: wp-ez-server
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'admin_menu', 'wp_ez_server_menu' );
function wp_ez_server_menu() {
	add_options_page( 'WP EZ Server Dashboard', 'WP EZ Server', 'manage_options', 'wp-ez-server', 'wp_ez_server_options' );
}

function wp_ez_server_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	
	define( 'WP_EZ_SERVER_DIR', plugin_dir_path( __FILE__ ) . '/' );
	
	require_once( WP_EZ_SERVER_DIR . 'ez.php' );
}