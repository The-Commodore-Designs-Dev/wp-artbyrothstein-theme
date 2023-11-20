<?php

add_filter( 'arte_theme_mods', 'arte_mods_navigation', 10, 1 );

function arte_mods_navigation( $options ){

  $options['navigation_alignment'] = array(
    'label'    	=> esc_html__( 'Navigation Position', 'arte' ),
    'type'		=> 'radio',
    'section'   => 'nav',
    'id' 		=> 'navigation_alignment',
    'default'	=> 'right',
    'choices'	=> array(
      'left'	=> esc_html__( 'Left Aligned', 'arte' ),
      'right'	=> esc_html__( 'Right Aligned', 'arte' )
    ),
    'desc'		=> esc_html__( 'Choose your navigation alignment', 'arte' ),
  );
  $options['navigation_margin_top'] = array(
    'label'     => esc_html__( 'Navigation Top Margin', 'arte' ),
    'type'		=> 'slider',
    'id'   		=> 'navigation_margin_top',
    'section'	=> 'nav',
    'default'	=> 20,
    'desc'		=> esc_html__( 'Choose your exact menu top margin', 'arte' ),
    'input_attr'=> array( 'min' => 0, 'max' => 150, 'step' => 1, 'suffix' => 'px' )
  );
  $options['navigation_margin_bot'] = array(
    'label'     => esc_html__( 'Navigation Bottom Margin', 'arte' ),
    'type'		=> 'slider',
    'id'   		=> 'navigation_margin_bot',
    'section'	=> 'nav',
    'default'	=> 20,
    'desc'		=> esc_html__( 'Choose your exact menu top margin', 'arte' ),
    'input_attr'=> array( 'min' => 0, 'max' => 150, 'step' => 1, 'suffix' => 'px' )
  );
  $options['navigation_sticky'] = array(
    'label'    	=> esc_html__( 'Disable Sticky Menu', 'arte' ),
    'type'		=> 'checkbox',
    'section'   => 'nav',
    'default' => false,
    'id' 		=> 'navigation_sticky'
  );
  $options['navigation_floating'] = array(
    'label'    	=> esc_html__( 'Float Navigation', 'arte' ),
    'type'		=> 'checkbox',
    'section'   => 'nav',
    'default' => false,
    'id' 		=> 'navigation_floating'
  );

  return $options;
}

?>
