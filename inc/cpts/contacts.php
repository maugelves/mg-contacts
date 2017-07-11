<?php

namespace MGContacts\cpts;

/**
 * Class Contacts
 *
 * @author  Mauricio Gelves <mg@maugelves.com>
 * @since   1.0.1
 */
class Contacts
{
	/**
	 * Personal constructor.
	 */
	public function __construct() {

		add_action( 'init', array( $this, 'create_cpt_contact' ), 10 );

		add_filter( 'enter_title_here', array( $this, 'change_title_placeholder' ) );

		add_filter( 'post_updated_messages', array($this, 'updated_messages_cb' ) );


		// Custom columns filters
		add_filter('manage_contact_posts_columns', array( $this, 'create_archive_columns' ) );
		add_action('manage_contact_posts_custom_column', array( $this, 'populate_archive_columns' ), 10, 2);

	}


	/**
	 *  Change the Post Title placeholder
	 *  @param $title
	 *
	 *  @return string
	 */
	public function change_title_placeholder( $title ) {
		$screen = get_current_screen();

		if  ( 'contact' == $screen->post_type )
			$title = __('Introduce el nombre completo', 'mgcontacts' );


		return $title;
	}



	/**
	 * This function creates the CPT Contact
	 */
	public function create_cpt_contact() {

		$args = array(
			'label'                 => __( 'Contactos', 'mgcontactsmgcontacts' ),
			'labels'                => array (

				// Labels values
				'name'                  => __( 'Contactos', 'mgcontactsmgcontacts' ),
				'singular'              => __( 'Contacto', 'mgcontactsmgcontacts' ),
				'add_new'               => __( 'Agregar un contacto', 'mgcontactsmgcontacts' ),
				'add_new_item'          => __( 'Agregar un contacto', 'mgcontactsmgcontacts' ),
				'edit_item'             => __( 'Editar contacto', 'mgcontactsmgcontacts' ),
				'new_item'              => __( 'Nuevo contacto', 'mgcontactsmgcontacts' ),
				'view_item'             => __( 'Ver contacto', 'mgcontactsmgcontacts' ),
				'view_items'            => __( 'Ver contacto', 'mgcontactsmgcontacts' ),
				'search_items'          => __( 'Buscar contacto', 'mgcontactsmgcontacts' ),
				'not_found'             => __( 'No se encontraron contactos', 'mgcontactsmgcontacts' ),
				'not_found_in_trash'    => __( 'No hay registros eliminados', 'mgcontactsmgcontacts' ),
				'all_items'             => __( 'Todos los contactos', 'mgcontactsmgcontacts' ),
				'archives'              => __( 'Contactos', 'mgcontactsmgcontacts' ),
				'featured_image'        => __( 'Foto', 'mgcontactsmgcontacts' ),
				'set_featured_image'    => __( 'Establecer la foto', 'mgcontactsmgcontacts' ),
				'remove_featured_image' => __( 'Quitar la foto', 'mgcontactsmgcontacts' ),
				'use_featured_image'    => __( 'Usar esta foto como principal', 'mgcontacts' )
			),
			'public'                => true,
			'exclude_from_search'   => true,
			'show_ui'               => true,
			'menu_position'         => 29,
			'menu_icon'             => MGCONT_URL . '/assets/img/contacts-admin-icon.png',
			'supports'              => array( 'title', 'thumbnail' ),
			'has_archive'           => true
		);


		register_post_type( 'contact', $args );

	}




	/**
	 * Creates, remove or modify the columns array for the Admin Archive
	 *
	 * @param $defaults
	 *
	 * @return mixed
	 */
	public function create_archive_columns( $defaults ) {
		unset( $defaults['date'] );
		$defaults['featured'] = '';
		$defaults['title'] = __('Nombre', 'mgcontacts');
		$defaults['email'] = __('Correo electrónico', 'mgcontacts');
		$defaults['date'] = 'Fecha de alta';
		return $defaults;
	}


	/**
	 * Fill the columns for the Admin Archive
	 *
	 * @param $column_name
	 * @param $post_ID
	 */
	public function populate_archive_columns( $column_name, $post_ID ){

		switch ( $column_name ):
			case 'featured':
				$args = array(100, 'auto');
				the_post_thumbnail( $args );
				break;
		endswitch;

	}



	/**
	 * Customized messages for Sponsor Custom Post Type
	 *
	 * @param   array $messages Default messages.
	 * @return  array 			Returns an array with the new messages
	 */
	public function updated_messages_cb( $messages ) {

		$messages['employee'] = array(
			0  => '', // Unused. Messages start at index 1.
			1 => __( 'Empleado actualizado.', 'mgcontacts' ),
			4 => __( 'Empleado actualizado.', 'mgcontacts' ),
			/* translators: %s: date and time of the revision */
			5 => isset( $_GET['revision']) ? sprintf( __( 'Empleado recuperado de la revisión %s.', 'mgcontacts' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6 => __( 'Empleado publicado.', 'mgcontacts' ),
			7 => __( 'Empleado guardado.', 'mgcontacts' ),
			9 => __('Empleado programador', 'mgcontacts' ),
			10 => __( 'Borrador de empleado actualizado.', 'mgcontacts' ),
		);

		return $messages;
	}

}
$contacts = new Contacts();