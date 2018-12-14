<?php
function main_nav() 
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

function register_menus()
{
  register_nav_menus(array( 
    'header-menu' => __('Header Menu', 'wp_starter'), 
  ));
}

add_action('init', 'register_menus'); 

if (function_exists('register_sidebar'))
{
  register_sidebar(array(
    'name' => __('Left site footer', 'wp_starter'),
    'description' => __('Please drag and drop some widget', 'wp_starter'),
    'id' => 'footer_left',
    'before_widget' => '<div id="%1$s" class="%2$s footer__widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="footer__heading t-heading">',
    'after_title' => '</h3>'
  ));

  register_sidebar(array(
    'name' => __('Right site footer', 'wp_starter'),
    'description' => __('Please drag and drop some widget', 'wp_starter'),
    'id' => 'footer_right',
    'before_widget' => '<div id="%1$s" class="%2$s footer__widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="footer__heading t-heading">',
    'after_title' => '</h3>'
  ));
}

// Adds menu and widgets to global context
add_filter( 'timber/context', 'add_to_context' );

function add_to_context( $context ) {
  $context['menu'] = new \Timber\Menu( 'header-menu' );
  $context['footer_left'] = Timber::get_widgets('footer_left');
  $context['footer_right'] = Timber::get_widgets('footer_right');
  return $context;
}