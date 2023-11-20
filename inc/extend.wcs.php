<?php

add_filter( 'wcs_view_css', 'arte_view_css_masonry_grid', 100, 3 );

add_filter( 'wcs_views', 'arte_views', 100 );

function arte_views( $views ){
	foreach( $views as $key => $view ){
		if( $view['value'] === 12 ){
			$views[$key]['prepend_filters'] = false;
		}
	}
	return $views;
}

function arte_view_css_masonry_grid( $css, $data, $schedule_id ){

	if(  ! isset( $data['view'] ) || intval( $data['view'] ) !== 7 )
		return $css;

	/** Basic */
	$color_special = isset( $data['color_special'] ) && ! empty( $data['color_special'] ) ? $data['color_special'] : '#BF392B';
	$color_grid_item_bg = isset( $data['color_grid_item_bg'] ) && ! empty( $data['color_grid_item_bg'] ) ? $data['color_grid_item_bg'] : '#ffffff';
	$grid_items_lg = isset( $data['grid_items_lg'] ) ? $data['grid_items_lg'] : 4;
	$grid_items_md = isset( $data['grid_items_md'] ) ? $data['grid_items_md'] : 3;
	$grid_items_xs = isset( $data['grid_items_xs'] ) ? $data['grid_items_xs'] : 1;
	$gutter_lg = ( 6 * ( $grid_items_lg - 1 ) ) / $grid_items_lg;
	$gutter_md = ( 6 * ( $grid_items_md - 1 ) ) / $grid_items_md;
	$gutter_xs = ( 6 * ( $grid_items_xs - 1 ) ) / $grid_items_xs;
	$item_width_lg = ( 100 / $grid_items_lg ) - $gutter_lg;
	$item_width_md = ( 100 / $grid_items_md ) - $gutter_md;
	$item_width_xs = ( 100 / $grid_items_xs ) - $gutter_xs;
	$item_width_lg_active = ( 6 * $item_width_lg ) + 6 > 100 ? 100 : ( 6 * $item_width_lg ) + 6;
	$item_width_md_active = ( 6 * $item_width_md ) + 6 > 100 ? 100 : ( 6 * $item_width_md ) + 6;
	$item_width_xs_active = ( 6 * $item_width_xs ) + 6 > 100 ? 100 : ( 6 * $item_width_xs ) + 6;
	$css .= "
    .wcs-timetable--$schedule_id .wcs-timetable__grid .ti-time,
    .wcs-timetable--$schedule_id .wcs-timetable__grid .wcs-class__title{
      color: $color_special;
    }
    .wcs-timetable--$schedule_id .wcs-timetable__grid .wcs-class{
      background-color: $color_grid_item_bg;
    }
    .wcs-class__minimize{
      background-color: " . CurlyWeeklyClassShortcodes::hex2rgb( $color_grid_item_bg, 0.85 ) . ";
    }
    .wcs-timetable--$schedule_id .wcs-isotope-item,
    .wcs-timetable--$schedule_id .wcs-class{
      width: {$item_width_xs}%;
    }
    .wcs-timetable--$schedule_id .wcs-class--active{
      width: {$item_width_xs_active}%;
    }
    @media (min-width: 600px) {
      .wcs-timetable--$schedule_id .wcs-isotope-item,
      .wcs-timetable--$schedule_id .wcs-class{
        width: {$item_width_md}%;
      }
      .wcs-timetable--$schedule_id .wcs-class--active{
        width: {$item_width_md_active}%;
      }
    }
    @media (min-width: 1000px) {
      .wcs-timetable--$schedule_id .wcs-isotope-item,
      .wcs-timetable--$schedule_id .wcs-class{
        width: {$item_width_lg}%;
      }
      .wcs-timetable--$schedule_id .wcs-class--active{
        width: {$item_width_lg_active}%;
      }
    }
  ";

	return $css;
}

add_filter( 'wcs_post_type_labels', 'arte_def_type_labels' );
function arte_def_type_labels( $labels ){
	$labels = array(
		'name'               => esc_html_x( 'Events', 'post type general name', 'arte' ),
		'singular_name'      => esc_html_x( 'Events', 'post type singular name', 'arte' ),
		'menu_name'          => esc_html_x( 'Events', 'admin menu', 'arte' ),
		'name_admin_bar'     => esc_html_x( 'Events', 'add new on admin bar', 'arte' ),
		'add_new'            => esc_html_x( 'Add New', 'class', 'arte' ),
		'add_new_item'       => esc_html__( 'Add New Events', 'arte' ),
		'new_item'           => esc_html__( 'New Events', 'arte' ),
		'edit_item'          => esc_html__( 'Edit Events', 'arte' ),
		'view_item'          => esc_html__( 'View Events', 'arte' ),
		'all_items'          => esc_html__( 'All Events', 'arte' ),
		'search_items'       => esc_html__( 'Search Events', 'arte' ),
		'parent_item_colon'  => esc_html__( 'Parent Events:', 'arte' ),
		'not_found'          => esc_html__( 'No events found.', 'arte' ),
		'not_found_in_trash' => esc_html__( 'No events found in Trash.', 'arte' )
	);
	return $labels;
}

add_filter( 'wcs_tax_labels', 'arte_def_taxes', 10, 2 );

function arte_def_taxes( $labels, $tax ){

	if( $tax === 'wcs-type' ){
		$labels = array(
			'name'              => esc_html_x( 'Event Types', 'taxonomy general name', 'arte' ),
			'singular_name'     => esc_html_x( 'Event Type', 'taxonomy singular name', 'arte' ),
			'search_items'      => esc_html__( 'Search Event Types', 'arte' ),
			'all_items'         => esc_html__( 'All Event Types', 'arte' ),
			'parent_item'       => esc_html__( 'Parent Event', 'arte' ),
			'parent_item_colon' => esc_html__( 'Parent Event:', 'arte' ),
			'edit_item'         => esc_html__( 'Edit Event', 'arte' ),
			'update_item'       => esc_html__( 'Update Event', 'arte' ),
			'add_new_item'      => esc_html__( 'Add New Event Type', 'arte' ),
			'new_item_name'     => esc_html__( 'New Event Type', 'arte' ),
			'menu_name'         => esc_html__( 'Event Types', 'arte' )
		);
	}

	if( $tax === 'wcs-instructor' ){
		$labels = array(
			'name'                       => esc_html_x( 'Artists', 'taxonomy general name', 'arte' ),
			'singular_name'              => esc_html_x( 'Artist', 'taxonomy singular name', 'arte' ),
			'search_items'               => esc_html__( 'Search  Artists', 'arte' ),
			'popular_items'              => esc_html__( 'Popular Artists', 'arte' ),
			'all_items'                  => esc_html__( 'All Artists', 'arte' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => esc_html__( 'Edit Artist', 'arte' ),
			'update_item'                => esc_html__( 'Update Artist', 'arte' ),
			'add_new_item'               => esc_html__( 'Add New Artist', 'arte' ),
			'new_item_name'              => esc_html__( 'New Artist Name', 'arte' ),
			'separate_items_with_commas' => esc_html__( 'Separate artists with commas', 'arte' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove artists', 'arte' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used artists', 'arte' ),
			'not_found'                  => esc_html__( 'No artists found.', 'arte' ),
			'menu_name'                  => esc_html__( 'Artists', 'arte' )
		);
	}

	return $labels;
}


?>