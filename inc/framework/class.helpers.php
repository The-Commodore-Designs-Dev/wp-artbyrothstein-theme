<?php


/**
* Curly Helpers
*/
class ArteHelpers {

  function __construct(){
	add_filter( 'vc_inner_shortcode', array( $this, 'shortcode_sanitizer') );
    add_filter( 'arte_menu_name' , array( $this, 'menu_name' ), 1 );
    add_filter( 'body_class' , array( $this, 'body_class' ) );
    add_action( 'admin_enqueue_scripts', array( $this, 'load_admin_assets' ) );
  	add_filter( 'embed_handler_html', array( $this, 'custom_instagram_settings' ) );
  	add_filter( 'embed_oembed_html', array( $this, 'custom_instagram_settings' ) );
    add_filter( 'wp_generate_tag_cloud_data', array( $this, 'tag_cloud_data' ), 10, 1 );
  }

  function tag_cloud_data( $tags_data ) {
      foreach ( $tags_data as $key => $tag ) {
          $count = $tag [ 'real_count' ];
          if ( $count > 20 ) {
              $tags_data [ $key ] [ 'class' ] .= ' tag x-large';
          } elseif ( $count > 15 ) {
              $tags_data [ $key ] [ 'class' ] .= ' tag large';
          } elseif ( $count > 7 ) {
              $tags_data [ $key ] [ 'class' ] .= ' tag medium';
          } elseif ( $count > 1 ) {
              $tags_data [ $key ] [ 'class' ] .= ' tag small';
          } else {
              $tags_data [ $key ] [ 'class' ] .= ' tag x-small ';
          }
      }
      return $tags_data;
  }

  function custom_instagram_settings( $code ){
    if( strpos( $code, 'youtu.be' ) !== false || strpos( $code, 'youtube.com' ) !== false ){
        $code = str_replace( '?feature=oembed', '?feature=oembed&modestbranding=1&showinfo=0&rel=0', $code );
    }
    if( strpos( $code, 'youtu.be' ) !== false || strpos( $code, 'youtube.com' ) !== false || strpos( $code, 'vimeo.com' ) !== false ){
      $code = str_replace( '<i'.'frame', '<i'.'frame class="embed-responsive-item"', $code );
      $code =  "<div class='embed-responsive embed-responsive-16by9 xtd-shadow--large-light'>$code</div>";
    }
    $code = str_replace( array(
      'frameborder="0"',
      "frameborder='0'",
      'mozallowfullscreen',
      'webkitallowfullscreen'
    ), '', $code );
    return $code;
  }

  function load_admin_assets(){
    wp_enqueue_style(
		'arte-admin',
		get_template_directory_uri() . '/assets/admin/css/admin.css',
		null,
		rand(),
		'all'
	);
  }


  function body_class( $classes ) {

    global $post;

    $options = apply_filters( 'arte_theme_mods', array() );

    $layout       = esc_attr( get_theme_mod( 'layout', $options['layout']['default'] ) );
    $navigation_alignment = esc_attr( get_theme_mod( 'navigation_alignment', $options['navigation_alignment']['default'] ) );
    $navigation_mode = esc_attr( get_theme_mod( 'navigation_floating', $options['navigation_floating']['default'] ) );
    $layout_mode  = esc_attr( get_theme_mod( 'layout_fixed', $options['layout_fixed']['default'] ) );
    $header_img   = ArteHelpers::header_image();

    $classes[] = wp_validate_boolean( $layout ) ? 'ct-layout--boxed' : 'ct-layout--full';
    $classes[] = wp_validate_boolean( $layout_mode ) ? 'ct-layout--fluid' : 'ct-layout--fixed';
    $classes[] = ArteHelpers::header_slider() ? 'ct-layout--with-slider' : 'ct-layout--without-slider';
    $classes[] = $header_img  ? 'ct-hero--with-image' : 'ct-hero--without-image';
    $classes[] = 'ct-menu--align-' . $navigation_alignment;
    $classes[] = wp_validate_boolean( $navigation_mode ) ? 'ct-menu--floating' : 'ct-menu--fixed';
    $classes[] = wp_validate_boolean( get_post_meta( self::get_the_id(), '_xtender_navigation_inverted', true ) ) ? 'ct-menu--inverted' : 'ct-menu--normal';
    $classes[] = wp_validate_boolean( get_theme_mod( 'font_strong', false ) ) ? 'ct-layout--soft-strong' : '';

    if( ! ArteHelpers::header_slider() ){
      if( $header_img ){
        $classes[] = 'ct-hero-image--' . esc_attr( get_theme_mod( 'header_image_repeat', $options['header_image_repeat']['default'] ) );
        $classes[] = 'ct-hero-image--' . esc_attr( get_theme_mod( 'header_image_alignment', $options['header_image_alignment']['default'] ) ) . '-' . esc_attr( get_theme_mod( 'header_image_position', $options['header_image_position']['default'] ) );
        $classes[] = 'ct-hero-image--' . esc_attr( get_theme_mod( 'header_image_att', $options['header_image_att']['default'] ) );
        $classes[] = 'ct-hero-image--' . esc_attr( get_theme_mod( 'header_image_size', $options['header_image_size']['default'] ) );
      }
      $classes[] = 'ct-hero--' . esc_attr( get_theme_mod( 'heading_alignment', $options['heading_alignment']['default'] ) );
      $classes[] = 'ct-hero--' . esc_attr( get_theme_mod( 'heading_position', $options['heading_position']['default'] ) );
      $classes[] = 'ct-hero--text-' . esc_attr( get_theme_mod( 'heading_alignment_text', $options['heading_alignment_text']['default'] ) );
    }

    if( self::is_blog() ){
      $classes[] = self::get_sidebar( 'sidebar_blog' ) ? 'ct-blog--with-sidebar' : 'ct-blog--without-sidebar';
    }
    $classes[] = is_singular() && isset( $post->post_content ) && has_shortcode( $post->post_content, 'vc_row' ) ? 'ct-content-with-vc' : 'ct-content-without-vc';
    return $classes;
  }


  public static function get_sidebar( $default ) {

	if( is_null( $default ) || empty( $default ) ){
		return false;
	}
	$sidebar = false;
	if( class_exists( 'XtenderSidebars' ) ){
	  $sidebar = is_singular() ? esc_attr( get_post_meta( get_the_id(), 'xtender_dynamic_sidebar', true ) ) : false;
	  $sidebar = ! $sidebar || empty( $sidebar ) ? false : $sidebar;
	}
	$sidebar = ! $sidebar ? $default : $sidebar;
	$sidebar = is_active_sidebar( $sidebar ) ? $sidebar : false;
	return $sidebar;
  }



  public function menu_name( $location ) {
    if( empty( $location ) ){
	    return;
    }
    $locations = get_nav_menu_locations();

    if( ! isset( $locations[$location] ) ){
	    return;
    }
    $menu_obj = get_term( $locations[$location], 'nav_menu' );
    return isset( $menu_obj->name ) ? esc_attr( $menu_obj->name ) : esc_html__( 'Menu', 'arte' );

  }

  public static function get_the_id(){
	  if( function_exists('is_woocommerce') && is_woocommerce() ){
		  $id = get_option( 'woocommerce_shop_page_id' );
	  }
	  elseif( is_singular() ){
		  global $post;
		  $id = $post->ID;
	  }
	  elseif( get_option( 'show_on_front' ) === 'page' && self::is_blog() ){
		  $id = get_option( 'page_for_posts' );
	  }
	  else{
		  $id = get_queried_object_id();
	  }
	  return $id;

  }


	public static function header_image(){
		$header_img = false;
		if( ! self::header_slider() ){
			$header_img = esc_url_raw( get_post_meta( self::get_the_id(), '_xtender_header_image', true ) );
			$header_img = empty( $header_img ) ? get_header_image() : $header_img;
			$header_img = empty( $header_img ) ? false : esc_url_raw( $header_img );
		}
		return $header_img;
	}


	public static function get_first_url() {
		if ( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) ){
			return false;
		}
		return esc_url_raw( $matches[1] );
	}


	public static function header_slider(){
		if( ! function_exists( 'putRevSlider' ) ){
		  return false;
		}
		$id = self::get_the_id();
		$header_slider  = esc_attr( get_post_meta( $id, '_xtender_header_slider', true ) );
		$slider = ! empty( $header_slider ) && $header_slider !== 'disable-header-slider' ? $header_slider : false;
		if( ! $slider && $header_slider !== 'disable-header-slider' ){
			$slider = esc_attr( get_theme_mod( 'header_slider' ) );
			$slider = is_null( $slider ) || empty( $slider ) || $slider === 0 ? false : $slider;
		}
		return $slider;

	}

	public static function has_background_image(){
		$bg_image = esc_url_raw( get_theme_mod( 'background_image' ) );
		$bg_image = empty( $bg_image ) ? false : $bg_image;
		return $bg_image;
	}

	public static function webfonts_method(){
		$loader = esc_attr( get_theme_mod( 'font_loader' ) );
		return wp_validate_boolean( $loader );
	}

	public static function get_sliders_array( $default = null, $default_2 = null ){
		$default = is_null( $default ) ? esc_html__( 'Inherit Global Slider', 'arte' ) : $default;
		$revsliders = array(0);
		if( class_exists( 'RevSlider' ) ){
			$slider = new RevSlider();
			$arrSliders = $slider->getArrSliders();
			$revsliders[0] = $default;
			if( ! is_null( $default_2 ) ){
				$revsliders[strtolower( sanitize_file_name( $default_2 ) )] = $default_2;
			}
			if( $arrSliders ) {
				foreach( $arrSliders as $value ) {
					$revsliders[$value->getAlias()] = $value->getTitle();
				}
			}
		}
		return $revsliders;
	}

	public static function is_blog(){
		global  $post;
		$post_type = get_post_type( $post );
		$is_blog = ( ( is_archive() ) || ( is_author() ) || ( is_category() ) || (is_home() ) || ( is_single() ) || ( is_tag() ) ) && ( $post_type == 'post' ) ? 1 : 0;
		return wp_validate_boolean( $is_blog );
	}
}

$arte_helpers = new ArteHelpers();
