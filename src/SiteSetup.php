<?php
namespace Kc2020;

class SiteSetup extends \Timber\Site
{
    public function __construct()
    {
        parent::__construct();

        add_action('after_setup_theme', array($this, 'themeSupports'));
        add_filter('timber/context', array($this, 'addToContext'));
        add_action('init', array($this, 'registerPostTypes'));
        add_action('init', array($this, 'registerTaxonomies'));
        add_action('wp_enqueue_scripts', array($this, 'enqueueStyles'));
        add_action('wp_enqueue_scripts', array($this, 'deregisterScripts'));
        add_filter('timber/twig', array($this, 'addToTwig'));
        add_action('widgets_init', array($this, 'registerWidgetAreas'));

        // Disable FE assets
        define('NGG_SKIP_LOAD_SCRIPTS', true);
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        add_filter('jetpack_sharing_counts', '__return_false', 99);
        add_filter('jetpack_implode_frontend_css', '__return_false', 99);

        // remove_action( 'admin_print_styles', 'print_emoji_styles' );
        add_action('wp_footer', array($this, 'deregisterFooterScripts'));
    }

    public function deregisterScripts()
    {
        if (!is_admin() && !is_customize_preview()) {
            wp_deregister_script('jquery');
        }
    }


    public function deregisterFooterScripts()
    {
        wp_dequeue_script('wp-embed');
    }

    public function enqueueStyles()
    {
        $cssUrl = get_template_directory_uri() . '/build/main.css';
        $cssPath = get_stylesheet_directory() . '/build/main.css';
        $jsUrl = get_template_directory_uri() . '/build/app.js';
        $jsPath = get_stylesheet_directory() . '/build/app.js';
        wp_enqueue_style('font', 'https://fonts.googleapis.com/css2?family=Raleway:wght@300;400&display=swap');
        wp_enqueue_style('main-styles', $cssUrl, [], filemtime($cssPath));
        wp_enqueue_script('main-script', $jsUrl, [], filemtime($jsPath), true);
        wp_dequeue_style('wp-block-library');
    }

    public function registerPostTypes()
    {
        register_post_type(
            'location',
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
            'promotion',
            array(
                'labels' => array(
                    'name' => __('Promotions'),
                    'singular_name' => __('Promotion')
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'promotions'),
                'show_in_rest' => true,
                'supports' => array( 'title', 'thumbnail' ),
                'taxonomies'  => array( 'category' ),
            )
        );
    }

    public function registerTaxonomies()
    {
        register_taxonomy_for_object_type('category', 'jetpack-testimonial');
    }

    public function addToContext($context)
    {
        $context['menu']  = new \Timber\Menu('Site Navigation');
        $context['menufooter']  = new \Timber\Menu('Site Navigation Footer');
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

    public function addToTwig($twig)
    {
         $twig->addFilter(new \Timber\Twig_Filter('pipetolist', function ($text) {
             return \Kc2020\StringFormatting::convertPipeToList($text);
         }));
         
        return $twig;
    }

    public function registerWidgetAreas()
    {
        register_sidebar(array(
            'name' => 'Homepage Intro',
            'id'            => 'area-homepage-intro',
            'before_widget' => '<div class = "widgetizedArea">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
            ));
    }
}
