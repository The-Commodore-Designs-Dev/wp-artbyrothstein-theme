<?php

add_filter( 'arte_theme_mods', 'arte_mods_developer', 10, 1 );

function arte_mods_developer( $options ){

  $options[] = array(
  	'label'    	=> esc_html__( 'Developer Tools', 'arte' ),
  	'type'		=> 'panel',
  	'id'   		=> 'panel_dev',
  	'desc'		=> 'asda',
  	'priority'	=> 140
  );

  return $options;

}


?>
