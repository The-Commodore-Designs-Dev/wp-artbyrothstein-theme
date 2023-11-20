<?php

add_filter( 'arte_theme_mods', 'arte_mods_identity', 10, 1 );

function arte_mods_identity( $options ){

  $options[] = array(
		'label'     => esc_html__( 'Logo', 'arte' ),
		'type'		=> 'image',
		'id'   		=> 'logo',
		'section'	=> 'title_tagline',
		'desc' => esc_html__('The logo will appear in your header.','arte')
	);
	$options[] = array(
		'label'     => esc_html__( 'Retina Logo @2x', 'arte' ),
		'type'		=> 'image',
		'id'   		=> 'logo_retina',
		'section'	=> 'title_tagline',
		'desc' => esc_html__('Your retina logo must be exactly 2X times bigger than your logo.','arte'),
    'active_cb'	=> 'arte_ccb_retina_logo'
	);

  $options[] = array(
		'label'     => esc_html__( 'Inverted Logo', 'arte' ),
		'type'		=> 'image',
		'id'   		=> 'logo_inverted',
		'section'	=> 'title_tagline',
		'desc' => esc_html__('The logo will appear in your header.','arte'),
    'active_cb'	=> 'arte_ccb_inverted_logo'
	);
	$options[] = array(
		'label'     => esc_html__( 'Inverted Retina Logo @2x', 'arte' ),
		'type'		=> 'image',
		'id'   		=> 'logo_inverted_retina',
		'section'	=> 'title_tagline',
		'desc' => esc_html__('Your retina logo must be exactly 2X times bigger than your logo.','arte'),
    'active_cb'	=> 'arte_ccb_inverted_retina_logo'
	);

  $options[] = array(
		'label'     => esc_html__( 'Sticky Logo', 'arte' ),
		'type'		=> 'image',
		'id'   		=> 'logo_sticky',
		'section'	=> 'title_tagline',
		'desc' => esc_html__('The logo will appear in your header.','arte'),
    'active_cb'	=> 'arte_ccb_sticky_logo'
	);
	$options[] = array(
		'label'     => esc_html__( 'Sticky Retina Logo @2x', 'arte' ),
		'type'		=> 'image',
		'id'   		=> 'logo_sticky_retina',
		'section'	=> 'title_tagline',
		'desc' => esc_html__('Your retina logo must be exactly 2X times bigger than your logo.','arte'),
    'active_cb'	=> 'arte_ccb_sticky_retina_logo'
	);

  return $options;

}

function arte_ccb_inverted_logo( $control ){
  $value = $control->manager->get_setting('logo')->value();
  return empty( $value ) ? false : true;
}

function arte_ccb_inverted_retina_logo( $control ){
  $value = $control->manager->get_setting('logo')->value();
  $value_inverted = $control->manager->get_setting('logo_inverted')->value();
  return empty( $value ) || empty( $value_inverted ) ? false : true;
}

function arte_ccb_sticky_logo( $control ){
  $value = $control->manager->get_setting('logo')->value();
  $sticky = $control->manager->get_setting('navigation_sticky')->value();
  return empty( $value ) || wp_validate_boolean( $sticky ) ? false : true;
}

function arte_ccb_sticky_retina_logo( $control ){
  $value = $control->manager->get_setting('logo')->value();
  $value_sticky = $control->manager->get_setting('logo_sticky')->value();
  $sticky = $control->manager->get_setting('navigation_sticky')->value();
  return empty( $value ) || empty( $value_sticky ) || wp_validate_boolean( $sticky) ? false : true;
}

function arte_ccb_retina_logo( $control ){
  $value = $control->manager->get_setting('logo')->value();
  return empty( $value ) ? false : true;
}


?>
