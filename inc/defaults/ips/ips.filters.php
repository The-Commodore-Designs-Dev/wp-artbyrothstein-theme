<?php

add_action( 'init', 'arte_init_ips_filters', 10 );

function arte_init_ips_filters(){
  add_filter( 'xtender_ips_filters', 'arte_ips_filters', 10, 1 );
}

function arte_ips_filters( $options ){

  $options = array(
    'header_slider',
    //'header_image',
    'header_height',
    'header_image_position',
    'header_image_repeat',
    'header_image_alignment',
    'header_image_att',
    'header_image_size',
    'header_image_opacity',
    'color_header_bg',
    'background_image',
    'color_bg',
    'background_position_x',
    'background_repeat',
    'background_attachment',
    'background_size',
    'heading_alignment',
    'heading_position',
    'heading_alignment_text',
    'color_page_heading',
    'color_page_subtitle',
    'color_page_heading_bg',
    'navigation_floating',
    'navigation_inverted'
  );

  return $options;

}

?>
