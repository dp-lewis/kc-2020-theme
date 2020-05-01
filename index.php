<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8" />
	 <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?> KC 2020</title>
	<?php wp_head(); ?>
</head>
<body>
<?php
$latestPost = get_posts( array(
    'posts_per_page' => 5
) );

if ( $latestPost ) {
    foreach ( $latestPost as $post ) {
        setup_postdata( $post ); 
        the_title(); 
        the_excerpt(); 
    }
    wp_reset_postdata();
}
?>
 </div>
	<?php wp_footer(); ?>
</body>
</html>