<?php

	/**
	 * @package Region Halland ACF Options Page Site Message
	 */
	/*
	Plugin Name: Region Halland ACF Options Page Site Message
	Description: Skapa en subsida till theme.php för "viktigt meddelande"
	Version: 1.3.1
	Author: Roland Hydén
	License: GPL-3.0
	Text Domain: regionhalland
	*/

	// Anropa funktion om ACF är installerad & aktiverad
	add_action('acf/init', 'region_halland_acf_add_options_page_site_message');

	// Lägg till en sida för viktigt meddelande
	function region_halland_acf_add_options_page_site_message() {

		if( function_exists('acf_add_options_page') ) {
		
			$option_page = acf_add_options_page(array(
				'page_title' 	=> __('Viktigt meddelande', 'regionhalland'),
				'menu_title' 	=> __('Viktigt meddelande', 'regionhalland'),
				'menu_slug' 	=> 'theme-general-settings-viktigt-meddelande'
			));
			
		}
	
	}

	// Anropa funktion om ACF är installerad & aktiverad
	add_action('acf/init', 'my_acf_add_site_message_field_groups');

	// Lägg till ett formulär
	function my_acf_add_site_message_field_groups() {

		// Om funktionen existerar
		if (function_exists('acf_add_local_field_group')):

			// Lägg till formulär
			acf_add_local_field_group(array(
				'key' => 'group_1000070',
				'title' => 'Hantera text för viktigt meddelande',
				'fields' => array(
					array(
						'key' => 'field_1000071',
						'label' => 'Meddelande',
						'name' => 'name_1000072',
						'type' => 'tab',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'placement' => 'top',
						'endpoint' => 0,
					),
					array(
						'key' => 'field_1000073',
						'label' => '',
						'name' => 'name_1000074',
						'type' => 'group',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'layout' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_1000075',
								'label' => 'Rubrik',
								'name' => 'name_1000076',
								'type' => 'text',
								'instructions' => 'Skriv rubrik (max antal tecken = 50)',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'maxlength' => '50',
								'rows' => 3,
								'new_lines' => '',
							),
							array(
								'key' => 'field_1000077',
								'label' => 'Meddelande',
								'name' => 'name_1000078',
								'type' => 'textarea',
								'instructions' => 'Skriv meddelande (max antal tecken = 150)',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'maxlength' => '150',
								'rows' => 3,
								'new_lines' => '',
							),
							array(
				              'key' => 'field_1000079',
		            		  'label' => __('Länk', 'regionhalland'),
		            		  'name' => 'name_1000080',
		            		  'type' => 'link',
		            		  'instructions' => __('Länk till valfri sida. Kan vara en extern länk, en sida eller ett inlägg.', 'regionhalland'),
		            		  'required' => 0,
		            		  'conditional_logic' => 0,
		            		  'wrapper' => array(
		                		'width' => '',
		                		'class' => '',
		                		'id' => '',
		            		  ),
		            		  'return_format' => 'array',
			        		  ),
							  array(
					          	'key' => 'field_1000081',
					            'label' => __('Välj om detta meddelande ska synas eller inte', 'regionhalland'),
					            'name' => 'name_1000082',
					            'type' => 'checkbox',
					            'instructions' => '',
					            'required' => 0,
					            'conditional_logic' => 0,
					            'wrapper' => array(
					                'width' => '',
					                'class' => '',
					                'id' => '',
					            ),
					            'choices' => array(
					                'choice_1000083' => __('Visa meddelande', 'regionhalland'),
					            ),
					            'allow_custom' => 0,
					            'save_custom' => 0,
					            'default_value' => array(
					            ),
					            'layout' => 'vertical',
					            'toggle' => 0,
					            'return_format' => 'value',
					    	),
						),
					)
				),
				'location' => array(
					array(
						array(
							'param' => 'options_page',
							'operator' => '==',
							'value' => 'theme-general-settings-viktigt-meddelande',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => 1,
				'description' => '',
			));

		endif;

	}

	function get_region_halland_acf_site_message() {

		// Define array
		$myMessage = array();
		
		// Fill array with data
		$myMessage['rubrik'] 		= get_field('name_1000074_name_1000076', 'options');
		$myMessage['meddelande'] 	= get_field('name_1000074_name_1000078', 'options');
		$arrLink 					= get_field('name_1000074_name_1000080', 'options');
		
		if (is_array($arrLink)) {
			$myMessage['link_title'] = $arrLink['title'];
			$myMessage['link_url'] = $arrLink['url'];
			$myMessage['link_target'] = $arrLink['target'];
			$myMessage['has_link'] = 1;
		} else {
			$myMessage['link_title'] = "";
			$myMessage['link_url'] = "";
			$myMessage['link_target'] = "";
			$myMessage['has_link'] = 0;
		}

		$myMessage['show_message'] 	= is_array(get_field('name_1000074_name_1000082', 'options'));

		// Return array
		return $myMessage;

	}

	// Metod som anropas när pluginen aktiveras
	function region_halland_acf_options_page_site_message_activate() {
		// Ingenting just nu...
	}

	// Metod som anropas när pluginen av-aktiveras
	function region_halland_acf_options_page_site_message_deactivate() {
		// Ingenting just nu...
	}

	// Aktivera pluginen och anropa metod
	register_activation_hook( __FILE__, 'region_halland_acf_options_page_site_message_activate');

	// Av-aktivera pluginen och anropa metod
	register_deactivation_hook( __FILE__, 'region_halland_acf_options_page_site_message_deactivate');

?>