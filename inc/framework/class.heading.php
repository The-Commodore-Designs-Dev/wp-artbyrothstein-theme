<?php

class ArteHeading{

	public static function check() {
		$heading_temp = self::get_heading();
		$heading = wp_validate_boolean( esc_attr( get_post_meta( ArteHelpers::get_the_id(), '_xtender_heading', true ) ) ) ? false : true;
		$heading = ! ArteHelpers::header_slider() ? $heading : false;
		$heading = is_single() && ArteHelpers::is_blog() && $heading_temp === get_the_title() ? false : $heading;
		$heading = $heading && ! empty( $heading_temp ) ? true : false;
		return wp_validate_boolean( $heading );

	}

	public static function get_heading(){

		global $post;

		$heading_custom = is_singular() ? esc_attr( get_post_meta( $post->ID, '_xtender_header_title', true ) ) : false;

		switch( true ){
			case is_singular() && ! empty( $heading_custom ) : {
				$heading = $heading_custom;
			} break;
			case function_exists('is_woocommerce') && is_woocommerce() : {
				$heading = woocommerce_page_title( false );

			} break;
			case is_singular() : {
				if( get_post_type() === 'post' ){
					$heading = get_the_title( get_option( 'page_for_posts' ) );
				} else {
					$heading = get_the_title();
				}
			} break;
			case is_home() : {
				$blog_page = esc_attr( get_option( 'page_for_posts' ) );
				$custom_title = get_post_meta( $blog_page, '_xtender_header_title', true );
				$heading = ! empty( $blog_page ) ? get_the_title( $blog_page ) : esc_html__( 'Blog', 'arte' );
				$heading = ! empty( $custom_title ) ? $custom_title : $heading;
			} break;
			case is_category() || is_tax() : {
				$heading = single_cat_title('' , false);
			} break;
			case is_archive() : {
				$heading = get_the_archive_title();
			} break;
			case is_search() : {
				$heading = esc_html__( 'Search Results' , 'arte' );
			} break;
			case is_404() : {
				$heading = esc_html__('Page could not be found. 404 Error' , 'arte');
			} break;
			default : $heading = get_the_title();
		}
		$heading = apply_filters( 'arte_page_title', $heading );
		return $heading;
	}


	public static function the_heading( $before = null, $after = null ){
		if ( wp_validate_boolean( self::check() ) ){

			$html = self::get_heading();

			$subtitle = esc_attr( get_post_meta( ArteHelpers::get_the_id(), '_xtender_header_subtitle', true ) );
			$subtitle = ! empty( $subtitle ) ? '<small>' . $subtitle . '</small>' : null;

			$excerpt = wp_kses_post( get_post_meta( ArteHelpers::get_the_id(), '_xtender_header_excerpt', true ) );
			$excerpt = apply_filters( 'arte_page_excerpt', $excerpt );
			$excerpt = ! empty( $excerpt ) ? '<div class="ct-header__main-heading-excerpt">' . apply_filters( 'the_content', $excerpt ) . '</div>' : null;

			if( is_singular() && ! is_page() ){
				$before = '<div class="h1">';
				$after 	= '</div>';
			}
			echo wp_kses_post( $subtitle.$before.$html.$after.$excerpt );
		}
	}
}

