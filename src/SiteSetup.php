<?php
namespace Kc2020;

class SiteSetup extends \Timber\Site {
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
		add_filter( 'timber/context', array( $this, 'add_to_context' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		parent::__construct();
	}

	public function register_post_types() {
		register_post_type( 'locations',
			array(
				'labels' => array(
					'name' => __( 'Locations' ),
					'singular_name' => __( 'Location' )
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'locations'),
				'show_in_rest' => true,
				'supports' => array( 'title', 'editor', 'custom-fields' ),
			)
		);

		register_post_type( 'testimonials',
			array(
				'labels' => array(
					'name' => __( 'Testimonials' ),
					'singular_name' => __( 'Testimonial' )
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'testimonial'),
				'show_in_rest' => true,
				'supports' => array( 'title', 'editor', 'custom-fields' ),
			)
		);
	}

	public function register_taxonomies() {

	}

	public function add_to_context( $context ) {
		$context['menu']  = new \Timber\Menu('Main Menu');
		return $context;
	}

	public function theme_supports() {
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support( 'menus' );
	}
}