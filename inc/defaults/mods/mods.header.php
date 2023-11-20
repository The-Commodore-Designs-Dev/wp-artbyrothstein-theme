<?php

add_filter( 'arte_theme_mods', 'arte_mods_header', 10, 1 );

function arte_mods_header( $options ){

  $revsliders = ArteHelpers::get_sliders_array( esc_html__( '- Select Global Header -', 'arte' ) );

  $options[] = array(
  	'label'    	=> esc_html__( 'Header', 'arte' ),
  	'type'		=> 'panel',
  	'id'   		=> 'panel_header',
  	'priority'	=> 25
  );

  $options['header_height'] = array(
    'label'     => esc_html__( 'Header Height', 'arte' ),
    'type'		=> 'slider',
    'id'   		=> 'header_height',
    'section'	=> 'header_image',
    'default'	=> 540,
    'desc'		=> esc_html__( 'Choose your minimum header height', 'arte' ),
    'input_attr'  => array( 'min' => 0, 'max' => 1080, 'step' => 10, 'suffix' => 'px' )
  );
  $options['header_image_repeat'] = array(
  	'label'     => esc_html__( 'Image Repeat', 'arte' ),
  	'type'		=> 'radio',
  	'id'   		=> 'header_image_repeat',
  	'section'	=> 'header_image',
  	'default'	=> 'no-repeat',
  	'choices'	=> array(
  		'no-repeat' => esc_html__( 'No Repeat', 'arte' ),
  		'repeat' 	=> esc_html__( 'Tile', 'arte' ),
  		'repeat-x' 	=> esc_html__( 'Tile Horizontally', 'arte' ),
  		'repeat-y' 	=> esc_html__( 'Tile Vertically', 'arte' ),
  	),
  	'active_cb'	=> 'arte_ccb_has_header_image'
  );

  $options['header_image_alignment'] = array(
  	'label'     => esc_html__( 'Image Alignment', 'arte' ),
  	'type'		=> 'radio',
  	'id'   		=> 'header_image_alignment',
  	'section'	=> 'header_image',
  	'default'	=> 'center',
  	'choices'	=> array(
  		'left' => esc_html__( 'Left', 'arte' ),
  		'center' 	=> esc_html__( 'Center', 'arte' ),
  		'right' 	=> esc_html__( 'Right', 'arte' ),
  	),
  	'active_cb'	=> 'arte_ccb_has_header_image'
  );

  $options['header_image_position'] = array(
  	'label'     => esc_html__( 'Image Position', 'arte' ),
  	'type'		=> 'radio',
  	'id'   		=> 'header_image_position',
  	'section'	=> 'header_image',
  	'default'	=> 'top',
  	'choices'	=> array(
  		'top' => esc_html__( 'Top', 'arte' ),
  		'center' 	=> esc_html__( 'Center', 'arte' ),
  		'bottom' 	=> esc_html__( 'Bottom', 'arte' ),
  	),
  	'active_cb'	=> 'arte_ccb_has_header_image'
  );

  $options['header_image_att'] = array(
  	'label'     => esc_html__( 'Image Attachment', 'arte' ),
  	'type'		=> 'radio',
  	'id'   		=> 'header_image_att',
  	'section'	=> 'header_image',
  	'default'	=> 'fixed',
  	'choices'	=> array(
  		'scroll' => esc_html__( 'Scroll', 'arte' ),
  		'fixed' => esc_html__( 'Fixed', 'arte' )
  	),
  	'active_cb'	=> 'arte_ccb_has_header_image'
  );

  $options['header_image_size'] = array(
  	'label'     => esc_html__( 'Image Size', 'arte' ),
  	'type'		=> 'radio',
  	'id'   		=> 'header_image_size',
  	'section'	=> 'header_image',
  	'default'	=> 'cover',
  	'choices'	=> array(
  		'auto' => esc_html__( 'Auto', 'arte' ),
  		'cover' 	=> esc_html__( 'Cover', 'arte' )
  	),
  	'active_cb'	=> 'arte_ccb_has_header_image'
  );

  $options[] = array(
  	'label'    	=> esc_html__( 'Header Slider', 'arte' ),
  	'type'		=> 'section',
  	'id'   		=> 'header_slider_section',
  	'panel'		=> 'panel_header',
  	'desc' 		=> esc_html__( 'When adding a header slider, you have to keep in mind that the header height will increase to match the height of the slider. Minimum slider height should be 370px; also, please note that this is a global setting.', 'arte' ),
  	'priority'	=> 50,
  	'transport' => 'refresh'
  );
  $options['header_slider'] = array(
  	'label'    	=> esc_html__( 'Header Slider', 'arte' ),
  	'type'		=> 'select',
  	'section'   => 'header_slider_section',
  	'id' 		=> 'header_slider',
  	'choices'  	=> $revsliders,
  	'active_cb' => 'arte_ccb_has_rev_slider',
    'transport' => 'refresh'
  );

  $options[] = array(
  	'label'    	=> esc_html__( 'Page Heading', 'arte' ),
  	'type'		=> 'section',
  	'id'   		=> 'header_layout_section',
  	'panel'		=> 'panel_header',
  	'priority'	=> 50,
  	'transport' => 'refresh'
  );

  $options['header_heading_top'] = array(
    'label'     => esc_html__( 'Heading Top Margin', 'arte' ),
    'type'		=> 'slider',
    'id'   		=> 'header_heading_top',
    'section'	=> 'header_layout_section',
    'default'	=> 50,
    'desc'		=> esc_html__( 'Choose your heading top margin', 'arte' ),
    'input_attr'=> array( 'min' => 20, 'max' => 200, 'step' => 1, 'suffix' => 'px' ),
  );
  $options['header_heading_bot'] = array(
    'label'     => esc_html__( 'Heading Bottom Margin', 'arte' ),
    'type'		=> 'slider',
    'id'   		=> 'header_heading_bot',
    'section'	=> 'header_layout_section',
    'default'	=> 50,
    'desc'		=> esc_html__( 'Choose your heading bottom margin', 'arte' ),
    'input_attr'=> array( 'min' => 20, 'max' => 200, 'step' => 1, 'suffix' => 'px' ),
  );

  $options['heading_alignment'] = array(
  	'label'     => esc_html__( 'Heading Alignment', 'arte' ),
  	'type'		=> 'radio',
  	'id'   		=> 'heading_alignment',
  	'section'	=> 'header_layout_section',
  	'default'	=> 'center',
  	'choices'	=> array(
  		'left'    => esc_html__( 'Left', 'arte' ),
      'center'  => esc_html__( 'Center', 'arte' ),
  		'right' 	=> esc_html__( 'Right', 'arte' )
  	)
  );
  $options['heading_position'] = array(
  	'label'   => esc_html__( 'Heading Position', 'arte' ),
  	'type'		=> 'radio',
  	'id'   		=> 'heading_position',
  	'section'	=> 'header_layout_section',
  	'default'	=> 'middle',
  	'choices'	=> array(
      'top'  => esc_html__( 'Top', 'arte' ),
  		'middle'  => esc_html__( 'Middle', 'arte' ),
  		'bottom' 	=> esc_html__( 'Bottom', 'arte' )
  	)
  );
  $options['heading_alignment_text'] = array(
  	'label'     => esc_html__( 'Heading Text Alignment', 'arte' ),
  	'type'		=> 'radio',
  	'id'   		=> 'heading_alignment_text',
  	'section'	=> 'header_layout_section',
  	'default'	=> 'center',
  	'choices'	=> array(
  		'left' => esc_html__( 'Left', 'arte' ),
      'center' => esc_html__( 'Center', 'arte' ),
  		'right' 	=> esc_html__( 'Right', 'arte' )
  	)
  );

  $options[] = array(
  	'label'    	=> esc_html__( 'Toolbar', 'arte' ),
  	'type'		=> 'section',
  	'id'   		=> 'header_toolbar_section',
  	'panel'		=> 'panel_header',
  	'priority'	=> 60
  );

  $options['toolbar'] = array(
  	'label'    	=> esc_html__( 'Toolbar Text', 'arte' ),
  	'type'		  => 'text',
  	'section'   => 'header_toolbar_section',
  	'id' 		    => 'toolbar',
    'active_cb' => 'arte_ccb_wpml_not',
    'transport' => 'refresh'
  );

  $options['wpml'] = array(
  	'label'    	=> esc_html__( 'Disable WPML Language Selector', 'arte' ),
  	'type'		=> 'checkbox',
  	'section'	=> 'header_toolbar_section',
  	'id' 		  => 'wpml',
  	'default'	=> false,
  	'desc'		=> esc_html__( 'Check this in order to disable the WPML language selector from the toolbar', 'arte'),
  	'active_cb' => 'arte_ccb_wpml',
    'transport' => 'refresh'
  );

  return $options;

}

function arte_ccb_wpml_not( $control ){
  return ! has_action('icl_language_selector') || wp_validate_boolean( $control->manager->get_setting('wpml')->value() ) ? true : false;
}

function arte_ccb_wpml(){
  return has_action('icl_language_selector') ? true : false;
}

function arte_ccb_has_header_image( $control  ){
  $value = $control->manager->get_setting('header_image')->value();
  return $value === 'remove-header' || empty( $value ) ? false : true;
}

function arte_ccb_has_rev_slider(){
  return ! function_exists( 'putRevSlider' ) ? false : true;
}

?>
