<?php
if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array (
		'key' => 'group_5964a38e3827a',
		'title' => 'Contactos',
		'fields' => array (
			array (
				'key' => 'field_5964a39152256',
				'label' => 'email',
				'name' => 'email',
				'type' => 'email',
				'instructions' => 'Indique el email del contacto',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'contact',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => array (
			0 => 'permalink',
			1 => 'the_content',
			2 => 'excerpt',
			3 => 'custom_fields',
			4 => 'discussion',
			5 => 'comments',
			6 => 'revisions',
			7 => 'slug',
			8 => 'author',
			9 => 'format',
			10 => 'page_attributes',
			11 => 'categories',
			12 => 'tags',
			13 => 'send-trackbacks',
		),
		'active' => 1,
		'description' => '',
	));

endif;