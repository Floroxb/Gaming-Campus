<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.mojocom.fr
 * @since      1.0.0
 *
 * @package    Mojo_Chalets
 * @subpackage Mojo_Chalets/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Mojo_Chalets
 * @subpackage Mojo_Chalets/public
 * @author     Flavien <technique@mojocom.fr>
 */
class Mojo_Chalets_Public
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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_filter('the_content', [$this, 'add_metas_after_content'], 1);


		add_filter('archive_template', [$this, 'use_custom_template']);
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/mojo-chalets-public.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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
		wp_enqueue_script($this->plugin_name . '-fb', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js', array('jquery'), null, false);
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/mojo-chalets-public.js', array('jquery'), $this->version, false);
	}


	/**
	 * Ajouter les metas apres le contenu en FRONT
	 *
	 * @param  mixed $content
	 * @return void
	 */
	public function add_metas_after_content($content)
	{

		if (is_singular('chalets') && in_the_loop() && is_main_query()) {

			$fields = get_fields();

			if (!empty($fields['nombre_de_personne'])) {
				printf(_n('%s personne', '%s personnes', $fields['nombre_de_personne'], 'mojochalets'), number_format_i18n($fields['nombre_de_personne']));
			}


			if (!empty($fields['plannings'])) {

				foreach ($fields['plannings'] as $saison) { ?>
					<h2>
						<?php echo $saison['nom_de_la_periode']; ?>
					</h2>

					<table class="mojochalets_table">

						<tr class="tarif__table__head">
							<th class="tarif__table__head__title">Début</th>
							<th class="tarif__table__head__title">Fin</th>
							<th class="tarif__table__head__title">Tarif</th>
							<th class="tarif_table_head_title">Disponibilité</th>
							<th class="tarif_table_head_title">Réservation</th>
						</tr>
						<?php
						foreach ($saison['periodes'] as $tarif) {
						?>
							<tr class="<?php echo $tarif['dispo'] ? 'dispo' : 'pasdispo'; ?>">
								<td><?php echo $tarif['debut']; ?></td>
								<td><?php echo $tarif['fin']; ?></td>
								<td><?php echo $tarif['prix']; ?></td>
								<td><?php echo $tarif['dispo'] ? 'disponible' : 'non dispo'; ?></td>
								<?php
								if ($tarif['dispo']) {
								?>
									<td><input class="reservation_button" type="button" value="Reservé"> </td>
								<?php
								} else {
								?>
									<td> Occuper</td>
								<?php
								}
								?>
							</tr>
						<?php
						}
						?>
					</table>

				<?php
				}
			}


			$images = $fields['images'];
			if ($images) : ?>
				<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

				<div class="gallery-container">
					<?php foreach ($images as $image) : ?>

						<a href="<?php echo esc_url($image['url']); ?>" data-fancybox="gallery" data-caption="<?php echo esc_html($image['caption']); ?>">
							<img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" />
						</a>

					<?php endforeach; ?>
				</div>
	<?php endif;
		}

		return $content;
	}
	
	/**
	 * use_custom_template
	 *
	 * @param  mixed $tpl
	 * @return void
	 */
	public function use_custom_template($tpl)
	{
		if (is_post_type_archive('chalets')) {
			$tpl = plugin_dir_path(__FILE__) . 'templates/chalets-archive.php';
		}
		return $tpl;
	}
}
