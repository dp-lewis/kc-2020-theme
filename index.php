<?php 

$context = Timber::context();
$context['posts'] = new Timber\PostQuery();
$context['homepageintro'] = Timber::get_widgets( 'area-homepage-intro' );
$templates = array('index.twig');

Timber::render( $templates, $context );