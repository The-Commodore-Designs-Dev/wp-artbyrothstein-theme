<?php

add_filter( 'xtender_ips_array', 'arte_ips_navigation', 20, 1 );

function arte_ips_navigation( $options ){

  $options[] = array(
  	'id'	=> 'navigation_tab',
  	'type'	=> 'tab',
  	'name'	=> esc_html__( 'Navigation', 'arte' )
  );

  $options[] = array(
  	'id'	=> 'navigation_floating',
  	'type'	=> 'checkbox',
  	'tab'	=> 'navigation_tab',
  	'name'	=> esc_html__( 'Float Navigation', 'arte' ),
  	'desc'	=> esc_html__( 'Check this to float the navigation over the header image or header slider', 'arte' )
  );

  $options[] = array(
  	'id'	=> 'navigation_inverted',
  	'type'	=> 'checkbox',
  	'tab'	=> 'navigation_tab',
  	'name'	=> esc_html__( 'Invert Navigation Color & Logo', 'arte' ),
  	'desc'	=> esc_html__( 'Check this invert the tone of your navigation colors and change the logo to inverted if assigned in Customizer > Site Identity > Inverted Logo', 'arte' )
  );


  return $options;

}

?>
