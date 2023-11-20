<?php

add_filter( 'xtender_ips_array', 'arte_ips_background', 20, 1 );

function arte_ips_background( $options ){

  $options[] = array(
  	'id'	=> 'bg_tab',
  	'type'	=> 'tab',
  	'name'	=> esc_html__( 'Background', 'arte' )
  );
  $options[] = array(
  	'id'	=> 'color_bg',
  	'type'	=> 'color',
  	'tab'	=> 'bg_tab',
  	'name'	=> esc_html__( 'Background Color', 'arte' )
  );
  $options[] = array(
  	'id'	=> 'background_image',
  	'type'	=> 'image',
  	'tab'	=> 'bg_tab',
  	'name'	=> esc_html__( 'Background Image', 'arte' )
  );
  $options[] = array(
  	'id'	=> 'background_position_x',
  	'type'	=> 'radio',
  	'tab'	=> 'bg_tab',
  	'name'	=> esc_html__( 'Background Position', 'arte' ),
  	'choices' 	=> array(
          'inherit'	=> esc_html__( 'Inherit', 'arte' ),
  		'left'	=> esc_html__( 'Left', 'arte' ),
  		'center' => esc_html__( 'Center', 'arte' ),
  		'right'	=> esc_html__( 'Right', 'arte' )
  	),
      'default' => 'inherit'
  );
  $options[] = array(
  	'id'	=> 'background_repeat',
  	'type'	=> 'radio',
  	'tab'	=> 'bg_tab',
  	'name'	=> esc_html__( 'Background Repeat', 'arte' ),
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
  	'id'	=> 'background_size',
  	'type'	=> 'radio',
  	'tab'	=> 'bg_tab',
  	'name'	=> esc_html__( 'Background Size', 'arte' ),
  	'choices' 	=> array(
          'inherit'	=> esc_html__( 'Inherit', 'arte' ),
  		'auto'	=> esc_html__( 'Auto', 'arte' ),
  		'cover'	=> esc_html__( 'Cover', 'arte' )

  	),
      'default' => 'inherit'
  );
  $options[] = array(
  	'id'	=> 'background_attachment',
  	'type'	=> 'radio',
  	'tab'	=> 'bg_tab',
  	'name'	=> esc_html__( 'Background Attachment', 'arte' ),
  	'choices' 	=> array(
          'inherit'	=> esc_html__( 'Inherit', 'arte' ),
          'scroll'	=> esc_html__( 'Scroll', 'arte' ),
          'fixed'	=> esc_html__( 'Fixed', 'arte' )
  	),
      'default' => 'inherit'
  );

  return $options;

}

?>
