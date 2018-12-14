<?php

function add_new_post_type($name, $slug, $domain = 'wp_starter') {
  register_post_type($name, 
    array(
    'labels' => array(
        'name' => __($name, $domain), 
        'singular_name' => __($name, $domain),
        'add_new' => __('Add', $domain),
        'add_new_item' => __('Add new', $domain),
        'edit' => __('Edit', $domain),
        'edit_item' => __('Edit item', $domain),
        'new_item' => __('Add new', $domain),
        'view' => __('View', $domain),
        'view_item' => __('View Item', $domain),
        'search_items' => __('Search', $domain),
        'not_found' => __('Not found', $domain),
        'not_found_in_trash' => __('Not found in trash', $domain)
    ),
   // 'publicly_queryable' => false,
    'public' => true,
    'hierarchical' => true, 
    'has_archive' => false,
    'supports' => array(
        'title',
        'editor',
        'excerpt',
        'thumbnail'
    ), 
    'can_export' => true, 
    'rewrite' => array( 'slug' => $slug ),
  ));
}

add_new_post_type('Example Post', 'myslug');

function wpdev_nav_classes( $classes, $item ) {
  if(is_singular('examplepost')) {
    $classes = array_diff( $classes, array( 'current_page_parent' ) );
  }
  return $classes;
}
add_filter( 'nav_menu_css_class', 'wpdev_nav_classes', 10, 2 );