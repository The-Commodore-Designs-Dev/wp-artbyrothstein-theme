<?php

add_filter( 'xtender_ips_array', 'arte_ips_title', 20, 1 );

function arte_ips_title( $options ){

  $options[] = array(
  	'id'	=> 'title_tab',
  	'type'	=> 'tab',
  	'name'	=> esc_html__( 'Page Heading', 'arte' )
  );

  $options[] = array(
  	'id'	=> 'heading',
  	'type'	=> 'checkbox',
  	'tab'	=> 'title_tab',
  	'name'	=> esc_html__( 'Disable Page Title', 'arte' ),
  	'desc'	=> esc_html__( 'Check this to disable the page title.', 'arte' )
  );

  $options[] = array(
  	'id'	=> 'header_title',
  	'type'	=> 'text',
  	'tab'	=> 'title_tab',
  	'name'	=> esc_html__( 'Page Title', 'arte' ),
  	'desc'	=> esc_html__( 'Leave this empty to use the default title.', 'arte' )
  );

  $options[] = array(
  	'id'	=> 'header_subtitle',
  	'type'	=> 'text',
  	'tab'	=> 'title_tab',
  	'name'	=> esc_html__( 'Page Subtitle', 'arte' )
  );

  $options[] = array(
  	'id'	=> 'header_excerpt',
  	'type'	=> 'textarea',
  	'tab'	=> 'title_tab',
  	'name'	=> esc_html__( 'Page Description', 'arte' )
  );

  $options[] = array(
  	'id'	=> 'heading_alignment',
  	'type'	=> 'radio',
  	'tab'	=> 'title_tab',
  	'name'	=> esc_html__( 'Heading Alignment', 'arte' ),
  	'choices' 	=> array(
      'inherit'	=> esc_html__( 'Inherit', 'arte' ),
      'left'	  => esc_html__( 'Left', 'arte' ),
      'center'	=> esc_html__( 'Center', 'arte' ),
      'right'	  => esc_html__( 'Right', 'arte' )
  	),
      'default' => 'inherit'
  );

  $options[] = array(
  	'id'	=> 'heading_position',
  	'type'	=> 'radio',
  	'tab'	=> 'title_tab',
  	'name'	=> esc_html__( 'Heading Position', 'arte' ),
  	'choices' 	=> array(
      'inherit'	=> esc_html__( 'Inherit', 'arte' ),
      'top'	    => esc_html__( 'Top', 'arte' ),
      'middle'	=> esc_html__( 'Middle', 'arte' ),
      'bottom'	=> esc_html__( 'Bottom', 'arte' )
  	),
      'default' => 'inherit'
  );

  $options[] = array(
  	'id'	  => 'heading_alignment_text',
  	'type'	=> 'radio',
  	'tab'	  => 'title_tab',
  	'name'	=> esc_html__( 'Heading Text Alignment', 'arte' ),
  	'choices' 	=> array(
      'inherit'	=> esc_html__( 'Inherit', 'arte' ),
      'left'	  => esc_html__( 'Left', 'arte' ),
      'center'	=> esc_html__( 'Center', 'arte' ),
      'right'	  => esc_html__( 'Right', 'arte' )
  	),
      'default' => 'inherit'
  );


  $options[] = array(
  	'id'	=> 'color_page_heading',
  	'type'	=> 'color',
  	'tab'	=> 'title_tab',
  	'name'	=> esc_html__( 'Page Heading Color', 'arte' )
  );
  $options[] = array(
  	'id'	=> 'color_page_subtitle',
  	'type'	=> 'color',
  	'tab'	=> 'title_tab',
  	'name'	=> esc_html__( 'Page Subtitle Color', 'arte' )
  );
  $options[] = array(
  	'id'	=> 'color_page_heading_bg',
  	'type'	=> 'color',
  	'tab'	=> 'title_tab',
  	'name'	=> esc_html__( 'Page Heading Background Color', 'arte' )
  );

  $options[] = array(
  	'id'	  => 'header_scroller',
  	'type'	=> 'text',
  	'tab'	  => 'title_tab',
  	'name'	=> esc_html__( 'Scroll Down Text', 'arte' ),
  	'desc'	=> esc_html__( 'Leave this empty to disable the scroll down text for this section.', 'arte' )
  );
  $options[] = array(
  	'id'	  => 'sec_nav_title',
  	'type'	=> 'text',
  	'tab'	  => 'title_tab',
  	'name'	=> esc_html__( 'Section Title', 'arte' ),
  	'desc'	=> esc_html__( 'Leave this empty to disable the section navigator for the hero section.', 'arte' )
  );
  $options[] = array(
  	'id'	=> 'color_sec_nav',
  	'type'	=> 'color',
  	'tab'	=> 'title_tab',
  	'name'	=> esc_html__( 'Section Color', 'arte' )
  );


  return $options;

}

?>
