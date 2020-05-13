<?php
namespace Kc2020;

class SiteSetup extends \Timber\Site
{
    public function __construct()
    {
        add_action('after_setup_theme', array($this, 'themeSupports'));
        add_filter('timber/context', array($this, 'addToContext'));
        add_action('init', array($this, 'registerPostTypes'));
        add_action('init', array($this, 'registerTaxonomies'));
        add_action('wp_enqueue_scripts', array($this, 'enqueueStyles'));

        parent::__construct();
    }

    public function enqueueStyles()
    {
        wp_enqueue_style('font', 'https://fonts.googleapis.com/css2?family=Raleway:ital@0;1&display=swap');
        wp_enqueue_style('main-styles', get_template_directory_uri() . '/build/main.css');
    }

    public function registerPostTypes()
    {
        register_post_type(
            'locations',
            array(
                'labels' => array(
                    'name' => __('Locations'),
                    'singular_name' => __('Location')
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'locations'),
                'show_in_rest' => true,
                'supports' => array( 'title', 'editor', 'custom-fields' ),
            )
        );

        register_post_type(
            'testimonials',
            array(
                'labels' => array(
                    'name' => __('Testimonials'),
                    'singular_name' => __('Testimonial')
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'testimonial'),
                'show_in_rest' => true,
                'supports' => array( 'title', 'editor', 'custom-fields' ),
            )
        );
    }

    public function registerTaxonomies()
    {
    }

    public function addToContext($context)
    {
        $context['menu']  = new \Timber\Menu('Site Navigation');
        var_dump($context['menu']->items);
        return $context;
    }

    public function themeSupports()
    {
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
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

        add_theme_support('menus');
    }
}
