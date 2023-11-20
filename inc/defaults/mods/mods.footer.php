<?php

add_filter( 'arte_theme_mods', 'arte_mods_footer', 10, 1 );

function arte_mods_footer( $options ){

  $options[] = array(
  	'label'    	=> esc_html__( 'Footer', 'arte' ),
  	'type'		=> 'section',
  	'id'   		=> 'section_footer',
  	'priority'	=> 130
  );

  $options[] = array(
  	'label'    	=> esc_html__( 'Footer Logo', 'arte' ),
  	'type'		=> 'image',
  	'section'   => 'section_footer',
  	'id' 		=> 'footer_logo',
  	'desc'		=> esc_html__( 'This image will be used as the logo in the footer', 'arte' ),
    'transport' => 'refresh'
  );

  $options[] = array(
  	'label'    	=> esc_html__( 'Footer Retina Logo @2x', 'arte' ),
  	'type'		=> 'image',
  	'section'   => 'section_footer',
  	'id' 		=> 'footer_logo_retina',
  	'desc'		=> esc_html__( 'This image will be used as the retina logo in the footer', 'arte' ),
    'active_cb' => 'arte_ccb_has_footer_logo',
    'transport' => 'refresh'
  );

  $options[] = array(
  	'label'   => esc_html__( 'Back to top label', 'arte' ),
  	'type'		=> 'text',
  	'section' => 'section_footer',
  	'id' 		  => 'footer_top',
    'default' => esc_html__( 'Back to top of the page', 'arte' ),
    'desc'		=> esc_html__( 'Leave empty to disable this button.', 'arte' ),
    'active_cb' => 'arte_ccb_has_footer_menu'
  );

  return $options;

}

function arte_ccb_has_footer_logo( $control  ){
  $value = $control->manager->get_setting('footer_logo')->value();
  return empty( $value ) ? false : true;
}

function arte_ccb_has_footer_menu( $control  ){
  return intval( $control->manager->get_setting('nav_menu_locations[footer_navigation]')->value() ) === 0 ? false : true;
}

?>
