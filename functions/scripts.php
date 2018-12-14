<?php

// JS Files
function attach_header_scripts()
{
  if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
    wp_register_script('mainJsBundle', get_template_directory_uri() . '/src/bundle.js', array(), '1.0.0', TRUE); 
    wp_enqueue_script('mainJsBundle'); 
  }
}

// CSS files
function attach_styles()
{
  wp_register_style('mainStyles', get_template_directory_uri() . '/src/style.css', array(), '1.0', 'all');
  wp_enqueue_style('mainStyles'); 
}

add_action('init', 'attach_header_scripts'); 
add_action('wp_enqueue_scripts', 'attach_styles'); 