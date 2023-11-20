<?php

add_filter( 'arte_theme_mods', 'arte_mods_layout', 10, 1 );

function arte_mods_layout( $options ){

  $options[] = array(
		'label'    	=> esc_html__( 'Navigation Layout', 'arte' ),
		'type'		=> 'section',
		'panel'   => 'nav_menus',
		'id' 		=> 'nav'
	);
  $options[] = array(
  	'label'    	=> esc_html__( 'Site Layout', 'arte' ),
  	'type'		  => 'section',
  	'id'   		  => 'section_layout',
  	'priority'	=> 20
  );
  $options['layout'] = array(
  	'label'   => esc_html__( 'Disable Full Width Layout', 'arte' ),
  	'type'		=> 'checkbox',
  	'section' => 'section_layout',
  	'id' 		  => 'layout',
    'default' => false,
  	'desc'		=> esc_html__( 'Checking this box will make your website layout boxed.', 'arte' )
  );
  $options['layout_box_width'] = array(
  	'label'     => esc_html__( 'Boxed Layout Width', 'arte' ),
  	'type'		=> 'slider',
  	'id'   		=> 'layout_box_width',
  	'section'	=> 'section_layout',
  	'default'	=> 1366,
  	'desc'		=> esc_html__( 'Choose your exact box width', 'arte' ),
  	'input_attr'=> array( 'min' => 640, 'max' => 1920, 'step' => 1, 'suffix' => 'px' ),
  	'active_cb'	=> 'arte_ccb_is_boxed'
  );
  $options['layout_fixed'] = array(
    'label'    	=> esc_html__( 'Disable Fixed Grid', 'arte' ),
    'type'		=> 'checkbox',
    'section'   => 'section_layout',
    'id' 		=> 'layout_fixed',
    'default' => false,
    'desc'		=> esc_html__( 'Checking this box will make your website fluid and fill as much horizontal screen space as possible.', 'arte' )
  );
  $options['layout_grid_width'] = array(
  	'label'     => esc_html__( 'Grid Width', 'arte' ),
  	'type'		=> 'slider',
  	'id'   		=> 'layout_grid_width',
  	'section'	=> 'section_layout',
  	'default'	=> 1366,
  	'desc'		=> esc_html__( 'Choose your exact content area width', 'arte' ),
  	'input_attr'=> array( 'min' => 640, 'max' => 1920, 'step' => 1, 'suffix' => 'px' ),
  	'active_cb'	=> 'arte_ccb_is_fixed'
  );

  /*
  $options[] = array(
  	'label'    	=> esc_html__( 'Header Height', 'arte' ),
  	'type'		=> 'slider',
  	'section'   => 'section_layout',
  	'id' 		=> 'header_height',
  	'input_attr'=> array( 'min' => get_theme_mod( 'navigation_height', 100 ) / 10, 'max' => 100, 'step' => 0.5, 'suffix' => 'vh' ),
      'desc'		=> esc_html__( 'Set header height in vh (virtual height) units. For example, 30 vh will make your header stretch on 30% of the screen.', 'arte' ),
  	'default'	=> 50,

  );
  */

  return $options;

}

function arte_ccb_is_boxed( $control ){
  return wp_validate_boolean( $control->manager->get_setting('layout')->value() ) ? true : false;
}

function arte_ccb_is_fixed( $control ){
  return wp_validate_boolean( $control->manager->get_setting('layout_fixed')->value() ) ? false : true;
}

?>
