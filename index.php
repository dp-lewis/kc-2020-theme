<?php 

$context = Timber::context();
$context['homepageintro'] = Timber::get_widgets( 'area-homepage-intro' );

$args = array(
    'post_type' => array('post'),
    'posts_per_page' => 5,
    'cat' => 9
);
$context['posts'] = new Timber\PostQuery($args);

Timber::render( array('index.twig'), $context );