<?php

/*
Plugin Name: Advanced Custom Fields: Address with Coordinates 
Plugin URI: 
Description: Address fields with coordinates geocoding
Version: 1.1.0
Author: Pierre Lebedel
Author URI: https://www.pierrelebedel.fr
License: MIT
License URI: https://opensource.org/licenses/MIT
Text Domain: pleb
Domain Path: /lang
*/

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;

// check if class already exists
if( !class_exists('pleb_acf_plugin_address_coordinates') ) :

class pleb_acf_plugin_address_coordinates {
	
	// vars
	var $settings;
	
	
	/*
	*  __construct
	*
	*  This function will setup the class functionality
	*
	*  @type	function
	*  @date	17/02/2016
	*  @since	1.0.0
	*
	*  @param	void
	*  @return	void
	*/
	
	function __construct() {
		
		// settings
		// - these will be passed into the field class.
		$this->settings = array(
			'version'	=> '1.0.0',
			'url'		=> plugin_dir_url( __FILE__ ),
			'path'		=> plugin_dir_path( __FILE__ )
		);

		add_action('plugin_loaded', array($this, 'load_text_domain'));
		
		
		// include field
		add_action('acf/include_field_types', 	array($this, 'include_field')); // v5
	}
	
	public function load_text_domain()
	{
		load_plugin_textdomain('pleb', false, dirname(plugin_basename(__FILE__)).'/lang/'); 
	}
	
	/*
	*  include_field
	*
	*  This function will include the field type class
	*
	*  @type	function
	*  @date	17/02/2016
	*  @since	1.0.0
	*
	*  @param	$version (int) major ACF version. Defaults to false
	*  @return	void
	*/
	
	function include_field( $version = false ) {
		
		// support empty $version
		if( !$version ) $version = 4;

		if( $version != 5 ) return;
		
		// load textdomain
		load_plugin_textdomain( 'pleb', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' ); 
		
		// include
		include_once('fields/class-pleb-acf-field-address-coordinates-v' . $version . '.php');
	}
	
}


// initialize
new pleb_acf_plugin_address_coordinates();


// class_exists check
endif;
	
?>