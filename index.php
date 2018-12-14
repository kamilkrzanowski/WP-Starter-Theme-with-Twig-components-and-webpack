<?php
$context = Timber::get_context();
$post = new Timber\Post();
$context['post'] = $post;
$context['posts'] = new Timber\PostQuery();

$templates = array( 'index.twig' );
if ( is_home() ) {
	array_unshift( $templates, 'home.twig' );
} 
Timber::render( $templates, $context );