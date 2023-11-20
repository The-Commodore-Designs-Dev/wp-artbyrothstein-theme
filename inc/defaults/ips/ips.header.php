<?php

add_filter( 'xtender_ips_array', 'arte_ips_header', 10, 1 );

function arte_ips_header( $options ){

  $revsliders = ArteHelpers::get_sliders_array( esc_html__( 'Inherit Global Slider', 'arte' ), esc_html__( 'Disable Header Slider', 'arte' ) );

  $options[] = array(
  	'id'	=> 'header_image_tab',
  	'type'	=> 'tab',
  	'name'	=> esc_html__( 'Header Image', 'arte' )
  );

  $options[] = array(
  	'id'	=> 'header_image',
  	'type'	=> 'image',
  	'tab'	=> 'header_image_tab',
  	'name'	=> esc_html__( 'Header Image', 'arte' )
  );
  $options[] = array(
  	'id'	=> 'header_height',
  	'type'	=> 'slider',
  	'tab'	=> 'header_image_tab',
  	'name'	=> esc_html__( 'Header Height', 'arte' ),
  	'desc'	=> esc_html__( 'Set header height in vh (virtual height) units. For example, 30 vh will make your header stretch on 30% of the screen.', 'arte' ),
  	'atts'	=> array(
  		'step' => 10,
  		'min' => 0,
  		'max' => 1080,
  		'suf' => 'px'
  	),
  	'default' => esc_attr( get_theme_mod( 'header_height', 540 ) )
  );

  $options[] = array(
  	'id'	=> 'header_image_repeat',
  	'type'	=> 'radio',
  	'tab'	=> 'header_image_tab',
  	'name'	=> esc_html__( 'Image Repeat', 'arte' ),
  	'choices' 	=> array(
      'inherit'	=> esc_html__( 'Inherit', 'arte' ),
  		'repeat'	=> esc_html__( 'Tile', 'arte' ),
  		'no-repeat'	=> esc_html__( 'No Repeat', 'arte' ),
  		'repeat-y'	=> esc_html__( 'Tile Vertically', 'arte' ),
  		'repeat-x'	=> esc_html__( 'Tile Horizontally', 'arte' )
  	),
    'default' => 'inherit'
  );
  $options[] = array(
  	'id'	=> 'header_image_alignment',
  	'type'	=> 'radio',
  	'tab'	=> 'header_image_tab',
  	'name'	=> esc_html__( 'Image Alignment', 'arte' ),
  	'choices' 	=> array(
      'inherit'	=> esc_html__( 'Inherit', 'arte' ),
  		'left'	=> esc_html__( 'Left', 'arte' ),
  		'center' => esc_html__( 'Center', 'arte' ),
  		'right'	=> esc_html__( 'Right', 'arte' )
  	),
    'default' => 'inherit'
  );
  $options[] = array(
  	'id'	=> 'header_image_position',
  	'type'	=> 'radio',
  	'tab'	=> 'header_image_tab',
  	'name'	=> esc_html__( 'Image Position', 'arte' ),
  	'choices' 	=> array(
      'inherit'	=> esc_html__( 'Inherit', 'arte' ),
  		'top'	=> esc_html__( 'Top', 'arte' ),
  		'center' => esc_html__( 'Center', 'arte' ),
  		'bottom'	=> esc_html__( 'Bottom', 'arte' )
  	),
      'default' => 'inherit'
  );
  $options[] = array(
  	'id'	=> 'header_image_att',
  	'type'	=> 'radio',
  	'tab'	=> 'header_image_tab',
  	'name'	=> esc_html__( 'Image Attachment', 'arte' ),
  	'choices' 	=> array(
      'inherit'	=> esc_html__( 'Inherit', 'arte' ),
      'scroll'	=> esc_html__( 'Scroll', 'arte' ),
      'fixed'	=> esc_html__( 'Fixed', 'arte' )
  	),
      'default' => 'inherit'
  );
  $options[] = array(
  	'id'	=> 'header_image_size',
  	'type'	=> 'radio',
  	'tab'	=> 'header_image_tab',
  	'name'	=> esc_html__( 'Image Size', 'arte' ),
  	'choices' 	=> array(
          'inherit'	=> esc_html__( 'Inherit', 'arte' ),
  		'auto'	=> esc_html__( 'Auto', 'arte' ),
  		'cover'	=> esc_html__( 'Cover', 'arte' )

  	),
      'default' => 'inherit'
  );


  if( ! empty( $revsliders ) ){
    $options[] = array(
    	'id'	=> 'header_slider_tab',
    	'type'	=> 'tab',
    	'name'	=> esc_html__( 'Header Slider', 'arte' )
    );
  	$options[] = array(
  		'id'	=> 'header_slider',
  		'type'	=> 'select',
  		'tab'	=> 'header_slider_tab',
  		'name'	=> esc_html__( 'Header Slider', 'arte' ),
  		'choices' 	=> $revsliders
  	);
  }


  return $options;

}

?>
