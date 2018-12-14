<?php 

require_once('functions/scripts.php');
require_once('functions/menus.php');
require_once('functions/post-types.php');

// To remove admin bar, just uncomment line below
//show_admin_bar(false);

if (function_exists('add_theme_support'))
{
  // Add Menu Support
  add_theme_support('menus');

  // Add Thumbnail Theme Support
  add_theme_support('post-thumbnails');
  add_theme_support( 'custom-logo' );
  add_image_size('large', 700, '', true); 
  add_image_size('medium', 250, '', true); 
  add_image_size('small', 120, '', true); 
  add_image_size('custom-size', 700, 200, true); // Your Custom Thumbnail Size
}

// Allows you to upload your logo via admin panel, if nothing is uploaded, it will load image from /img/custom-logo.png path
function show_custom_logo() {
  if ( $custom_logo_id = get_theme_mod( 'custom_logo' ) ) {
    $attachment_array = wp_get_attachment_image_src( $custom_logo_id, 'medium' );
    $logo_url         = $attachment_array[0];
  } else {
    $logo_url = get_stylesheet_directory_uri() . '/img/custom-logo.png';
  }
  $logo_image = '<img src="' . $logo_url . '" class="header__navbar-brand-logo" itemprop="siteLogo" alt="' . get_bloginfo( 'name' ) . '">';
  $html       = sprintf( '<a href="%1$s" class="header__navbar-brand" rel="home" title="%2$s" itemscope>%3$s</a>', esc_url( home_url( '/' ) ), get_bloginfo( 'name' ), $logo_image );
  echo apply_filters( 'get_custom_logo', $html );
}

// SVG support
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter('upload_mimes', 'cc_mime_types');

// Put logo to /img/site-login-logo.png to display it on the login page
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/site-login-logo.png);
		height:65px;
		width:320px;
		background-size: contain;
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );