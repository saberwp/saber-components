<?php

/*
 * Plugin Name: Saber Components
 * Version: 0.0.1
 */

namespace SaberComponents;

define( 'SABER_COMPONENTS_PATH', plugin_dir_path( __FILE__ ) );
define( 'SABER_COMPONENTS_URL', plugin_dir_url( __FILE__ ) );
define( 'SABER_COMPONENTS_VERSION', '0.0.1' );

class Plugin {

	public function __construct() {

		add_action('init', function() {

			// Load parsing class.
			require_once( SABER_COMPONENTS_PATH . '/inc/ComponentParser.php' );

			// Register post type.
			require_once( SABER_COMPONENTS_PATH . '/inc/ComponentPostType.php' );
			$cpt = new ComponentPostType;
			$cpt->register();

		});


		add_filter( 'single_template', [$this, 'set_single_template'] );
		add_filter( 'template_include', [$this, 'set_archive_template'] );

		add_action('init', function() {
			$this->process_classes_and_store_json();
		});

		/* Register block types. */
		add_action( 'init', function() {

			// Quote
			$result = register_block_type( SABER_COMPONENTS_PATH . '/blocks/quote' );

		});

		// Register fields for blocks.
		require_once SABER_COMPONENTS_PATH . '/blocks/quote/fields.php';


	}

	function process_classes_and_store_json() {
		$classes_component = $this->process_components_classes();
		$classes_template = $this->process_template_classes();

		$classes = array_merge( $classes_component, $classes_template );
		$classes = array_unique( $classes );

		$classesJson = json_encode( $classes );
		file_put_contents( SABER_COMPONENTS_PATH . '/tailwind.json', $classesJson );
	}

	function process_components_classes() {
	  $args = array(
	    'post_type' => 'acfg_component',
	    'posts_per_page' => -1
	  );
	  $components = get_posts( $args );

	  $classes = array();
	  foreach ( $components as $component ) {
	    $code = get_field( 'html', $component->ID );
	    preg_match_all( '/class="([^"]*)"/', $code, $matches );
	    $classes = array_merge( $classes, $matches[1] );
	  }

	  $classes = array_unique( $classes );
		return $classes;

	}


	public function set_single_template($single_template) {
		global $post;
		if ($post->post_type == 'acfg_component') {
			$single_template = plugin_dir_path( __FILE__ ) . '/templates/single-component.php';
		}
		return $single_template;
	}

	public function set_archive_template( $template ) {
		if ( is_page( 'components' ) ) {
			$template = plugin_dir_path( __FILE__ ) . '/templates/archive-component.php';
		}
		return $template;
	}

	function process_template_classes() {
	  $classes = array();

	  $template_directory = plugin_dir_path( __FILE__ ) . 'templates/';
	  $template_files = scandir( $template_directory );
	  foreach ( $template_files as $template_file ) {
	    if ( $template_file == '.' || $template_file == '..' ) {
	      continue;
	    }

	    $template = file_get_contents( $template_directory . $template_file );
	    preg_match_all( '/class="([^"]*)"/', $template, $matches );
	    $classes = array_merge( $classes, $matches[1] );
	  }

	  $classes = array_unique( $classes );

	  return $classes;
	}


}

new Plugin();
