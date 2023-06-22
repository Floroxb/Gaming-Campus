<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.mojocom.fr
 * @since      1.0.0
 *
 * @package    Mojo_Chalets
 * @subpackage Mojo_Chalets/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Mojo_Chalets
 * @subpackage Mojo_Chalets/admin
 * @author     Flavien <technique@mojocom.fr>
 */
class Mojo_Chalets_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */


	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_action('init', [$this, 'register_posttype_chalets']);
		add_action('init', [$this, 'register_taxonomy_chalet']);

		// ACF
		add_filter('acf/settings/save_json', [$this, 'acf_json_save_point']);
		add_filter('acf/settings/load_json', [$this, 'acf_json_load_point']);

		// Columns
		add_filter('manage_chalets_posts_columns', [$this, 'posts_columns'], 5);
		add_action('manage_chalets_posts_custom_column', [$this, 'posts_custom_columns'], 5, 2);
		add_action('manage_edit-chalets_sortable_columns', [$this, 'posts_sortable_columns'], 5);
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mojo_Chalets_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mojo_Chalets_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/mojo-chalets-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mojo_Chalets_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mojo_Chalets_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/mojo-chalets-admin.js', array('jquery'), $this->version, false);
	}



	/**
	 * Custom post type :: Chalets
	 *
	 * @return void
	 */
	public function register_posttype_chalets()
	{
		$args = array(
			'label' => __('Chalet', 'mojochalets'),
			'description' => __('Réservation', 'mojochalets'),
			'labels' => __('chalet', 'chalets', false, 'mojochalets'),
			'menu_icon' => 'dashicons-admin-home',
			'taxonomies' => array(
				// 'kind',
				// 'service'
			),
			'supports' => ['title', 'editor', 'thumbnail', 'custom-fields'],
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 5,
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => true,
			'can_export' => true,
			// 'rewrite' => array('slug' => 'chalets/%kind%', 'with_front' => true),
			'rewrite' => array('slug' => 'chalets', 'with_front' => true),
			'has_archive' => __('chalets', 'mojochalets'),
			'hierarchical' => false,
			'exclude_from_search' => false,
			'show_in_rest' => true,
			'publicly_queryable' => true,
			'capability_type' => 'page'
		);
		register_post_type('chalets', $args);
	}

	/**
	 * permet d'ajouter une taxonomie pour les services proposés
	 *
	 * @return void
	 */
	public function register_taxonomy_chalet()
	{
		register_taxonomy('services_proposes', 'chalets', [
			'labels' => [
				'name' => __('Service', 'mojo-chalets'),
				'singular_name'     => __('Service', 'mojo-chalets'),
				'plural_name'       => __('services_proposes', 'mojo-chalets'),
				'search_items'      => __('Rechercher des services', 'mojo-chalets'),
				'all_items'         => __('Tous les services', 'mojo-chalets'),
				'edit_item'         => __('Éditer le service', 'mojo-chalets'),
				'update_item'       => __('Mettre à jour le service', 'mojo-chalets'),
				'add_new_item'      => __('Ajouter un nouveau service', 'mojo-chalets'),
				'new_item_name'     => __('Ajouter un nouveau service', 'mojo-chalets'),
				'menu_name'         => __('Service', 'mojo-chalets'),
			],
			'show_in_rest' => true,
			'hierarchical' => true
		]);
	}

	/**
	 * Charge les champs ACF
	 *
	 * @param  mixed $paths
	 * @return void
	 */
	public function acf_json_load_point($paths)
	{
		unset($paths[0]);
		$paths[] = MOJO_CHALETS_DIR_PATH . '/acf-json';
		return $paths;
	}

	/**
	 * Enregistre les champs ACF
	 *
	 * @param  mixed $path
	 * @return void
	 */
	public function acf_json_save_point($path)
	{
		$path = MOJO_CHALETS_DIR_PATH . '/acf-json';
		return $path;
	}

	public function wp_get_attachment( $attachment_id ) {

		$attachment = get_post( $attachment_id );
		return array(
			'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
			'caption' => $attachment->post_excerpt,
			'description' => $attachment->post_content,
			'href' => get_permalink( $attachment->ID ),
			'src' => $attachment->guid,
			'title' => $attachment->post_title
		);
	}


	/**
	 * posts_columns
	 *
	 * @param  mixed $defaults
	 * @return void
	 */
	public function posts_columns($defaults)
	{
		$defaults['services_proposes'] = __('Services proposés');
		$defaults['nombre_de_personne'] = __('Nombre de personnes');
		return $defaults;
	}

	/**
	 * posts_custom_columns
	 *
	 * @param  mixed $column_name
	 * @param  mixed $id
	 * @return void
	 */
	public function posts_custom_columns($column_name, $id)
	{
		if ($column_name === 'services_proposes') {
			$terms = get_the_term_list($id, 'services_proposes', '', ' / ');
			echo $terms;
		}
		if ($column_name === 'nombre_de_personne') {
			echo get_field('nombre_de_personne', $id);
		}
	}

	/**
	 * posts_sortable_columns
	 *
	 * @param  mixed $columns
	 * @return void
	 */
	public function posts_sortable_columns($columns)
	{
		$columns['nombre_de_personne'] = 'nombre_de_personne';

		return $columns;
	}
}
