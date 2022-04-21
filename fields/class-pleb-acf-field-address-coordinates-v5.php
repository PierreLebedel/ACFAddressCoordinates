<?php

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('pleb_acf_field_address_coordinates') ) :


class pleb_acf_field_address_coordinates extends acf_field 
{
	
	/*
	*  __construct
	*
	*  This function will setup the field type data
	*
	*  @type	function
	*  @date	5/03/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function __construct( $settings ) 
	{
		
		/*
		*  name (string) Single word, no spaces. Underscores allowed
		*/
		
		$this->name = 'address_coordinates';
		
		
		/*
		*  label (string) Multiple words, can include spaces, visible when selecting a field type
		*/
		
		$this->label = __('Address with Coordinates ', 'pleb');
		
		
		/*
		*  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
		*/
		
		$this->category = 'basic';
		
		
		/*
		*  defaults (array) Array of default settings which are merged into the field object. These are used later in settings
		*/
		
		$this->defaults = array(
			//'display_country' => false
		);
		
		
		/*
		*  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
		*  var message = acf._e('address_coordinates', 'error');
		*/
		
		$this->l10n = array(
			//'error'	=> __('Error! Please enter a higher value', 'pleb'),
		);
		
		
		/*
		*  settings (array) Store plugin settings (url, path, version) as a reference for later use with assets
		*/
		
		$this->settings = $settings;
		
		
		// do not delete!
    	parent::__construct();
    	
	}
	
	
	/*
	*  render_field_settings()
	*
	*  Create extra settings for your field. These are visible when editing a field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	
	function render_field_settings( $field ) 
	{
		
		/*
		*  acf_render_field_setting
		*
		*  This function will create a setting for your field. Simply pass the $field parameter and an array of field settings.
		*  The array of settings does not require a `value` or `prefix`; These settings are found from the $field array.
		*
		*  More than one setting can be added by copy/paste the above code.
		*  Please note that you must also have a matching $defaults value for the field name (font_size)
		*/

		/*
		
		acf_render_field_setting( $field, array(
			'label'			=> __('Display country','pleb'),
			'instructions'	=> __('Display country name on template','pleb'),
			'type'			=> 'true_false',
			'name'			=> 'display_country',
			'ui'			=> 1,
		));

		*/

	}
	
	
	
	/*
	*  render_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field (array) the $field being rendered
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	
	function render_field( $field ) 
	{
		
		
		/*
		*  Review the data of $field.
		*  This will show what data is available
		*/
		
		//echo '<pre>'.print_r( $field, true ).'</pre>';

		$required = boolval($field['required']);

		?><table class="acf-table">
			<tbody>
				<tr class="acf-row">
								
					<td class="acf-fields -left acf-address-coordinates">
						
						<div class="acf-field acf-field-text">
							<div class="acf-label">
								<label for="<?php echo esc_attr($field['key']) ?>_street_1">
									<?php _e("Street address", 'pleb'); ?><?php if($required): ?><span class="acf-required">*</span><?php endif; ?>
								</label>
							</div>
							<div class="acf-input">
								<div class="acf-input-wrap" style="margin-bottom:10px;">
									<input type="text" id="<?php echo esc_attr($field['key']) ?>_street_1" name="<?php echo esc_attr($field['name']) ?>[street_1]" value="<?php echo esc_attr($field['value']['street_1'] ?? '') ?>" <?php if($required) echo 'required'; ?> placeholder="<?php esc_attr_e('Street address', 'pleb'); ?>">
								</div>
								<div class="acf-input-wrap">
									<input type="text" id="<?php echo esc_attr($field['key']) ?>_street_2" name="<?php echo esc_attr($field['name']) ?>[street_2]" value="<?php echo esc_attr($field['value']['street_2'] ?? '') ?>" placeholder="<?php esc_attr_e('Street address (additional)', 'pleb'); ?>">
								</div>
							</div>
						</div>

					</td>
				</tr>

				<tr class="acf-row">
						
					<td class="acf-fields -left acf-address-coordinates">
						
						<div class="acf-field acf-field-text">
							<div class="acf-label">
								<label for="<?php echo esc_attr($field['key']) ?>_post_code">
									<?php _e("Postal code", 'pleb'); ?><?php if($required): ?><span class="acf-required">*</span><?php endif; ?> / <?php _e("City", 'pleb'); ?><?php if($required): ?><span class="acf-required">*</span><?php endif; ?>
								</label>
							</div>
							<div class="acf-input">
								<ul class="acf-hl" data-cols="2_4-8">
									<li>
										<div class="acf-input-wrap">
											<input type="text" id="<?php echo esc_attr($field['key']) ?>_post_code" name="<?php echo esc_attr($field['name']) ?>[post_code]" value="<?php echo esc_attr($field['value']['post_code'] ?? '') ?>" <?php if($required) echo 'required'; ?> placeholder="<?php esc_attr_e('ZIP / Postal code', 'pleb'); ?>">
										</div>
									</li>
									<li>
										<div class="acf-input-wrap">
											<input type="text" id="<?php echo esc_attr($field['key']) ?>_city" name="<?php echo esc_attr($field['name']) ?>[city]" value="<?php echo esc_attr($field['value']['city'] ?? '') ?>" <?php if($required) echo 'required'; ?> placeholder="<?php esc_attr_e('City', 'pleb'); ?>">
										</div>
									</li>
								</ul>
							</div>

						</div>

					</td>
				</tr>
				<tr class="acf-row">
						
					<td class="acf-fields -left acf-address-coordinates">
						
						<div class="acf-field acf-field-text">
							<div class="acf-label">
								<label for="<?php echo esc_attr($field['key']) ?>_state">
									<?php _e("State", 'pleb'); ?> / <?php _e("Country", 'pleb'); ?><?php if($required): ?><span class="acf-required">*</span><?php endif; ?>
								</label>
							</div>
							<div class="acf-input">
								<ul class="acf-hl" data-cols="2">
									<li>
										<div class="acf-input-wrap">
											<input type="text" id="<?php echo esc_attr($field['key']) ?>_state" name="<?php echo esc_attr($field['name']) ?>[state]" value="<?php echo esc_attr($field['value']['state'] ?? '') ?>" placeholder="<?php esc_attr_e('State / Province', 'pleb'); ?>">
										</div>
									</li>
									<li>
										<div class="acf-input-wrap">
											<?php $countries = $this->get_countries_list();
											//echo '<pre>'.print_r( $countries, true ).'</pre>'; ?>

											<select id="<?php echo esc_attr($field['key']) ?>_country_code" name="<?php echo esc_attr($field['name']) ?>[country_code]" <?php if($required) echo 'required'; ?>>
												<option value="">-- <?php _e("Choose country", 'pleb'); ?> --</option>
												<?php foreach($countries as $k=>$v): ?>
												<option value="<?php echo $k; ?>" <?php if(mb_strtoupper($field['value']['country_code'])==$k) echo 'selected'; ?>><?php echo $v; ?></option>
												<?php endforeach; ?>
											</select></div>
										</div>
									</li>
								</ul>
								
							</div>

						</div>

					</td>
				</tr>
				<tr class="acf-row">
						
					<td class="acf-fields -left acf-address-coordinates">
						
						<div class="acf-field acf-field-text">
							<div class="acf-label">
								<label for="<?php echo esc_attr($field['key']) ?>_latitude">
									<?php _e("GPS Coordinates", 'pleb'); ?>
								</label>
								<p class="description"><?php _e("Geocoded on save", 'pleb'); ?></p>
							</div>
							<div class="acf-input">

								<?php if(
									isset($field['value']['street_1']) && !empty($field['value']['street_1']) &&
									isset($field['value']['post_code']) && !empty($field['value']['post_code']) &&
									isset($field['value']['city']) && !empty($field['value']['city']) &&
									isset($field['value']['country_code']) && !empty($field['value']['country_code']) &&
									empty($field['value']['latitude']) && empty($field['value']['longitude'])
								): ?>
								<div class="acf-notice -warning"><p><?php _e("GPS coordinates could not be geocoded. Please check address fields validity.", 'pleb'); ?></p></div>
								<?php endif; ?>

								<ul class="acf-hl" data-cols="2">
									<li>
										<div class="acf-input-wrap">
											<input type="text" id="<?php echo esc_attr($field['key']) ?>_latitude" name="<?php echo esc_attr($field['name']) ?>[latitude]" value="<?php echo esc_attr($field['value']['latitude'] ?? '') ?>" readonly>
										</div>
									</li>
									<li>
										<div class="acf-input-wrap">
											<input type="text" id="<?php echo esc_attr($field['key']) ?>_longitude" name="<?php echo esc_attr($field['name']) ?>[longitude]" value="<?php echo esc_attr($field['value']['longitude'] ?? '') ?>" readonly>
										</div>
									</li>
								</ul>
							</div>

						</div>

					</td>
				</tr>
			</tbody>
		</table><?php
	}
	

	/**
	 * Get associative array of countries code & name
	 *
	 * @return array
	 */
	private function get_countries_list()
	{
		$transient_key = 'acfaddcoord_countries';
		$transient_value = get_transient($transient_key);

		if( $transient_value){

			return $transient_value;

		}else{

			$countries = [];

			$url = 'https://countriesnow.space/api/v0.1/countries/iso';

			$WP_Http = new WP_Http();
			$httpquery = $WP_Http->get($url, []);
	
			if( !is_wp_error($httpquery) && isset($httpquery['body']) ){
	
				$results = json_decode($httpquery['body']);
	
				if (json_last_error() === JSON_ERROR_NONE) {
	
					if(isset($results->data) && is_array($results->data) && !empty($results->data)){
						foreach($results->data as $country){
							$countries[ $country->Iso2 ] = $country->name;
						}

						set_transient($transient_key, $countries, DAY_IN_SECONDS);

					}
	
				}
	
			}
	
			return $countries;

		}

		
	}
		
	/*
	*  input_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
	*  Use this action to add CSS + JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_enqueue_scripts)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	function input_admin_enqueue_scripts() 
	{
		
		// vars
		$url = $this->settings['url'];
		$version = $this->settings['version'];
		
		
		// register & include JS
		//wp_register_script('pleb', "{$url}assets/js/input.js", array('acf-input'), $version);
		//wp_enqueue_script('pleb');
		
		
		// register & include CSS
		wp_register_style('pleb', "{$url}assets/css/input.css", array('acf-input'), $version);
		wp_enqueue_style('pleb');
		
	}
	
	/*
	*  input_admin_head()
	*
	*  This action is called in the admin_head action on the edit screen where your field is created.
	*  Use this action to add CSS and JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_head)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
		
	function input_admin_head() 
	{
	}
	
	*/
	
	/*
   	*  input_form_data()
   	*
   	*  This function is called once on the 'input' page between the head and footer
   	*  There are 2 situations where ACF did not load during the 'acf/input_admin_enqueue_scripts' and 
   	*  'acf/input_admin_head' actions because ACF did not know it was going to be used. These situations are
   	*  seen on comments / user edit forms on the front end. This function will always be called, and includes
   	*  $args that related to the current screen such as $args['post_id']
   	*
   	*  @type	function
   	*  @date	6/03/2014
   	*  @since	5.0.0
   	*
   	*  @param	$args (array)
   	*  @return	n/a
   	*/
   	
   	/*
   	
   	function input_form_data( $args ) 
	   {
   	}
   	
   	*/
	
	/*
	*  input_admin_footer()
	*
	*  This action is called in the admin_footer action on the edit screen where your field is created.
	*  Use this action to add CSS and JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_footer)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
		
	function input_admin_footer() 
	{
	}
	
	*/
	
	/*
	*  field_group_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is edited.
	*  Use this action to add CSS + JavaScript to assist your render_field_options() action.
	*
	*  @type	action (admin_enqueue_scripts)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
	
	function field_group_admin_enqueue_scripts() 
	{
	}
	
	*/

	/*
	*  field_group_admin_head()
	*
	*  This action is called in the admin_head action on the edit screen where your field is edited.
	*  Use this action to add CSS and JavaScript to assist your render_field_options() action.
	*
	*  @type	action (admin_head)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
	
	function field_group_admin_head() 
	{
	}
	
	*/


	/*
	*  load_value()
	*
	*  This filter is applied to the $value after it is loaded from the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value found in the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*  @return	$value
	*/
	
	/*
	
	function load_value( $value, $post_id, $field ) {
		
		return $value;
		
	}
	
	*/
	
	
	/*
	*  update_value()
	*
	*  This filter is applied to the $value before it is saved in the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value found in the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*  @return	$value
	*/
	
	function update_value( $value, $post_id, $field ) {

		$coords = $this->get_coordinates($value);

		$value['latitude'] = $coords['latitude'];
		$value['longitude'] = $coords['longitude'];

		$value['country_name'] = $this->get_country_name($value);
		
		return $value;
	}

	/**
	 * Geocode address from form input values
	 * 
	 * @param array $value
	 * @return array
	 */

	private function get_coordinates( $value )
	{
		$coords = [
			'latitude' => null,
			'longitude' => null,
		];

		if( !empty($value['post_code']) && !empty($value['city']) && !empty($value['country_code']) ){

			$urlquery = http_build_query([
				'street'     => $value['street_1'] ?? '',
				'postalcode' => $value['post_code'] ?? '',
				'city'       => $value['city'] ?? '',
				'state'      => $value['state'] ?? '',
				'country'    => $value['country_code'] ?? '',
			]);

			$transient_key = 'acfaddcoord_'.base64_encode($urlquery); // mysql wp_options.option_name is varchar:191
			$transient_value = get_transient($transient_key);

			if( $transient_value){

				return $transient_value;

			}else{

				// Doc : https://nominatim.org/release-docs/latest/api/Search/
				$url = 'https://nominatim.openstreetmap.org/search?format=jsonv2&limit=1&addressdetails=0&accept-language='.get_bloginfo('language').'&'.$urlquery;
				//echo '<pre>'.print_r( $url, true ).'</pre>';

				$WP_Http = new WP_Http();
				$httpquery = $WP_Http->get($url, []);

				if( !is_wp_error($httpquery) && isset($httpquery['body']) ){

					$results = json_decode($httpquery['body']);

					if (json_last_error() === JSON_ERROR_NONE) {

						if( is_array($results) && !empty($results) ){
							$result = reset($results);

							if( isset($result->lat) && isset($result->lon) ){

								//echo '<pre>'.print_r( $result, true ).'</pre>';die;

								/**
								stdClass Object
								(
									[place_id] => XXXXXXXXX
									[licence] => Data © OpenStreetMap contributors, ODbL 1.0. https://osm.org/copyright
									[osm_type] => way
									[osm_id] => XXXXXXXXX
									[boundingbox] => Array
										(
											[0] => 47.XXXXXXX
											[1] => 47.XXXXXXX
											[2] => -2.XXXXXXX
											[3] => -2.XXXXXXX
										)

									[lat] => 47.XXXXXXX
									[lon] => -2.XXXXXXX
									[display_name] => Road, Hamlet, Town, County, State, Region, Postcode, Country
									[place_rank] => XX
									[category] => highway
									[type] => residential
									[importance] => 0.72
									[address] => stdClass Object
										(
											[road] => Road
											[hamlet] => Hamlet
											[town] => Town
											[municipality] => City
											[county] => County
											[state] => State
											[ISO3166-2-lvl4] => XX-XXX
											[region] => Region
											[postcode] => Postcode
											[country] => Country
											[country_code] => XX
										)
								)
								*/

								$coords['longitude'] = $result->lat;
								$coords['latitude'] = $result->lon;

								set_transient($transient_key, $coords);

							}
						}
					}
				}

			}
			
		}
		
		return $coords;
	}

	/**
	 * Find the selected country name by ISO code
	 * 
	 * @param array $value
	 * @return string
	 */

	private function get_country_name( $value )
	{
		if( isset($value['country_code']) && !empty($value['country_code']) ){

			$countries = $this->get_countries_list();

			if( array_key_exists($value['country_code'], $countries) ){
				return $countries[ $value['country_code'] ];
			}

		}
		
		return null;
	}
	
	
	/*
	*  format_value()
	*
	*  This filter is appied to the $value after it is loaded from the db and before it is returned to the template
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value which was loaded from the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*
	*  @return	$value (mixed) the modified value
	*/

	/*
	
	function format_value( $value, $post_id, $field ) 
	{
		
		// bail early if no value
		if( empty($value) ) {
		
			return $value;
			
		}
		
		// return
		return $value;
	}
	
	*/
	
	/*
	*  validate_value()
	*
	*  This filter is used to perform validation on the value prior to saving.
	*  All values are validated regardless of the field's required setting. This allows you to validate and return
	*  messages to the user if the value is not correct
	*
	*  @type	filter
	*  @date	11/02/2014
	*  @since	5.0.0
	*
	*  @param	$valid (boolean) validation status based on the value and the field's required setting
	*  @param	$value (mixed) the $_POST value
	*  @param	$field (array) the field array holding all the field options
	*  @param	$input (string) the corresponding input name for $_POST value
	*  @return	$valid
	*/

	/*
		
	function validate_value( $valid, $value, $field, $input )
	{		
		if( $field['required'] ){
			if( empty($value['street_1']) ){
				$valid = __('The street line 1 is required','pleb');
			}
			if( empty($value['post_code']) ){
				$valid = __('The post code is required','pleb');
			}
			if( empty($value['city']) ){
				$valid = __('The city is required','pleb');
			}
			if( empty($value['country_code']) ){
				$valid = __('The country is required','pleb');
			}
		}
		
		// return
		return $valid;
		
	}
	
	*/
	
	/*
	*  delete_value()
	*
	*  This action is fired after a value has been deleted from the db.
	*  Please note that saving a blank value is treated as an update, not a delete
	*
	*  @type	action
	*  @date	6/03/2014
	*  @since	5.0.0
	*
	*  @param	$post_id (mixed) the $post_id from which the value was deleted
	*  @param	$key (string) the $meta_key which the value was deleted
	*  @return	n/a
	*/
	
	/*
	
	function delete_value( $post_id, $key ) 
	{
	}
	
	*/

	/*
	*  load_field()
	*
	*  This filter is applied to the $field after it is loaded from the database
	*
	*  @type	filter
	*  @date	23/01/2013
	*  @since	3.6.0	
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	$field
	*/
	
	/*
	
	function load_field( $field ) 
	{
		return $field;
	}	
	
	*/
	
	/*
	*  update_field()
	*
	*  This filter is applied to the $field before it is saved to the database
	*
	*  @type	filter
	*  @date	23/01/2013
	*  @since	3.6.0
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	$field
	*/
	
	/*
	
	function update_field( $field ) 
	{
		return $field;
	}
	
	*/

	/*
	*  delete_field()
	*
	*  This action is fired after a field is deleted from the database
	*
	*  @type	action
	*  @date	11/02/2014
	*  @since	5.0.0
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	n/a
	*/
	
	/*
	
	function delete_field( $field ) 
	{
	}	
	
	*/
	
}


// initialize
new pleb_acf_field_address_coordinates( $this->settings );


// class_exists check
endif;

?>