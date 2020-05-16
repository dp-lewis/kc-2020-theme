<?php
require_once( __DIR__ . '/vendor/autoload.php' );
/*
    Timer is used to manage server side template rendering
*/
$timber = new Timber\Timber();
Timber::$dirname = array( 'src/templates' );
Timber::$autoescape = false;

new Kc2020\SiteSetup();
new Kc2020\AdminMenuSetup();



add_action('widgets_init', function () {
    register_widget('\Kc2020\Widgets\ItemHero');
    register_widget('\Kc2020\Widgets\ContentListing');
});