<?php

add_filter( 'arte_theme_mods', 'arte_mods_colors', 10, 1 );

function arte_mods_colors( $options ){

  $options[] = array(
  	'label'    	=> esc_html__( 'Colors', 'arte' ),
  	'type'		=> 'panel',
  	'id'   		=> 'panel_colors',
  	'priority'	=> 40
  );
  $options['color_bg'] = array(
  	'label'     => esc_html__( 'Background Color', 'arte' ),
  	'type'		=> 'coloor',
  	'id'   		=> 'color_bg',
  	'section'	=> 'colors',
  	'default'	=> '#ffffff',
  	'desc'		=> esc_html__( 'This color is used as background color', 'arte' ),
    'transport' => 'refresh'
  );
  $options['color_text'] = array(
  	'label'     => esc_html__( 'Text Color', 'arte' ),
  	'type'		=> 'coloor',
  	'id'   		=> 'color_text',
  	'section'	=> 'colors',
  	'default'	=> '#000000',
  	'desc'		=> esc_html__( 'This color is used for general text', 'arte' ),
    'transport' => 'refresh'
  );
  $options['color_primary'] = array(
  	'label'     => esc_html__( 'Primary Color', 'arte' ),
  	'type'		=> 'coloor',
  	'id'   		=> 'color_primary',
  	'section'	=> 'colors',
  	'default'	=> '#B89D4F',
  	'desc'		=> esc_html__( 'This color is used for buttons, links and other visual elements', 'arte' ),
    'transport' => 'refresh'
  );
  $options['color_links'] = array(
  	'label'     => esc_html__( 'Links Color', 'arte' ),
  	'type'		=> 'coloor',
  	'id'   		=> 'color_links',
  	'section'	=> 'colors',
  	'default'	=> '#333333',
  	'desc'		=> esc_html__( 'This color is used for text links', 'arte' ),
    'transport' => 'refresh'
  );
  $options[] = array(
  	'label'    	=> esc_html__( 'Page Heading', 'arte' ),
  	'type'		=> 'section',
  	'id'   		=> 'section_colors_page_heading',
  	'panel'		=> 'panel_colors',
  	'priority'	=> 15
  );
  $options['color_page_heading'] = array(
  	'label'     => esc_html__( 'Page Heading Color', 'arte' ),
  	'type'		=> 'coloor',
  	'id'   		=> 'color_page_heading',
  	'section'	=> 'section_colors_page_heading',
  	'default'	=> '',
  	'desc'		=> esc_html__( 'This color is used for the page heading', 'arte' ),
    'transport' => 'refresh'
  );
  $options['color_page_subtitle'] = array(
  	'label'     => esc_html__( 'Page Subtitle Color', 'arte' ),
  	'type'		=> 'coloor',
  	'id'   		=> 'color_page_subtitle',
  	'section'	=> 'section_colors_page_heading',
  	'default'	=> '',
  	'desc'		=> esc_html__( 'This color is used for the page subtitle & excerpt', 'arte' ),
    'transport' => 'refresh'
  );
  $options['color_page_heading_bg'] = array(
  	'label'     => esc_html__( 'Page Heading Background Color', 'arte' ),
  	'type'		=> 'coloor',
  	'id'   		=> 'color_page_heading_bg',
  	'section'	=> 'section_colors_page_heading',
  	'default'	=> '#F6F6F6',
  	'desc'		=> esc_html__( 'This color is used for the page heading background', 'arte' ),
    'transport' => 'refresh'
  );
  $options[] = array(
  	'label'    	=> esc_html__( 'Headings', 'arte' ),
  	'type'		=> 'section',
  	'id'   		=> 'section_colors_headings',
  	'panel'		=> 'panel_colors',
  	'priority'	=> 15
  );
  $options['color_h1'] = array(
  	'label'     => esc_html__( 'H1 Heading Color', 'arte' ),
  	'type'		=> 'coloor',
  	'id'   		=> 'color_h1',
  	'section'	=> 'section_colors_headings',
  	'default'	=> '',
  	'desc'		=> esc_html__( 'This color is used for H1 text. Leave empty to inherit the links colors.', 'arte' ),
    'transport' => 'refresh'
  );
  $options['color_h2'] = array(
  	'label'     => esc_html__( 'H2 Heading Color', 'arte' ),
  	'type'		=> 'coloor',
  	'id'   		=> 'color_h2',
  	'section'	=> 'section_colors_headings',
  	'default'	=> '',
  	'desc'		=> esc_html__( 'This color is used for H2 text. Leave empty to inherit the links colors.', 'arte' ),
    'transport' => 'refresh'
  );
  $options['color_h3'] = array(
  	'label'     => esc_html__( 'H3 Heading Color', 'arte' ),
  	'type'		=> 'coloor',
  	'id'   		=> 'color_h3',
  	'section'	=> 'section_colors_headings',
  	'default'	=> '',
  	'desc'		=> esc_html__( 'This color is used for H3 text. Leave empty to inherit the links colors.', 'arte' ),
    'transport' => 'refresh'
  );
  $options['color_h4'] = array(
  	'label'     => esc_html__( 'H4 Heading Color', 'arte' ),
  	'type'		=> 'coloor',
  	'id'   		=> 'color_h4',
  	'section'	=> 'section_colors_headings',
  	'default'	=> '',
  	'desc'		=> esc_html__( 'This color is used for H4 text. Leave empty to inherit the links colors.', 'arte' ),
    'transport' => 'refresh'
  );
  $options['color_h5'] = array(
  	'label'     => esc_html__( 'H5 Heading Color', 'arte' ),
  	'type'		=> 'coloor',
  	'id'   		=> 'color_h5',
  	'section'	=> 'section_colors_headings',
  	'default'	=> '',
  	'desc'		=> esc_html__( 'This color is used for H5 text. Leave empty to inherit the links colors.', 'arte' ),
    'transport' => 'refresh'
  );
  $options['color_h6'] = array(
  	'label'     => esc_html__( 'H6 Heading Color', 'arte' ),
  	'type'		=> 'coloor',
  	'id'   		=> 'color_h6',
  	'section'	=> 'section_colors_headings',
  	'default'	=> '',
  	'desc'		=> esc_html__( 'This color is used for H6 text. Leave empty to inherit the links colors.', 'arte' ),
    'transport' => 'refresh'
  );
  /*
  $options[] = array(
  	'label'    	=> esc_html__( 'Header', 'arte' ),
  	'type'		=> 'section',
  	'id'   		=> 'section_colors_header',
  	'panel'		=> 'panel_colors',
  	'priority'	=> 10
  );
  $options[] = array(
  	'label'     => esc_html__( 'Background Color', 'arte' ),
  	'type'		=> 'coloor',
  	'id'   		=> 'color_header_bg',
  	'section'	=> 'section_colors_header',
  	'default'	=> '',
  	'desc'		=> esc_html__( 'This color is used for the header background', 'arte' )
  );
  $options[] = array(
  	'label'     => esc_html__( 'Text Color', 'arte' ),
  	'type'		=> 'coloor',
  	'id'   		=> 'color_header',
  	'section'	=> 'section_colors_header',
  	'default'	=> '',
  	'desc'		=> esc_html__( 'This color is used for the header text', 'arte' )
  );
  */
  $options[] = array(
  	'label'    	=> esc_html__( 'Navigation', 'arte' ),
  	'type'		=> 'section',
  	'id'   		=> 'section_colors_navigation',
  	'panel'		=> 'panel_colors',
  	'priority'	=> 10
  );
  $options['color_navigation'] = array(
  	'label'     => esc_html__( 'Text Color', 'arte' ),
  	'type'		=> 'coloor',
  	'id'   		=> 'color_navigation',
  	'section'	=> 'section_colors_navigation',
  	'default'	=> '',
  	'desc'		=> esc_html__( 'This color is used for general text in the menu', 'arte' ),
    'transport' => 'refresh'
  );
  $options['color_navigation_active'] = array(
  	'label'     => esc_html__( 'Active Color', 'arte' ),
  	'type'		=> 'coloor',
  	'id'   		=> 'color_navigation_active',
  	'section'	=> 'section_colors_navigation',
  	'default'	=> '',
  	'desc'		=> esc_html__( 'This color is used for the active menu element', 'arte' ),
    'transport' => 'refresh'
  );
  $options['color_navigation_bg'] = array(
  	'label'     => esc_html__( 'Background Color', 'arte' ),
  	'type'		=> 'coloor',
  	'id'   		=> 'color_navigation_bg',
  	'section'	=> 'section_colors_navigation',
  	'default'	=> '',
  	'desc'		=> esc_html__( 'This color is used for menu background', 'arte' ),
    'transport' => 'refresh'
  );
  $options[] = array(
  	'label'    	=> esc_html__( 'Footer', 'arte' ),
  	'type'		=> 'section',
  	'id'   		=> 'section_colors_footer',
  	'panel'		=> 'panel_colors',
  	'priority'	=> 20
  );
  $options['color_footer_bg'] = array(
  	'label'     => esc_html__( 'Background Color', 'arte' ),
  	'type'		=> 'coloor',
  	'id'   		=> 'color_footer_bg',
  	'section'	=> 'section_colors_footer',
  	'default'	=> '#010100',
  	'desc'		=> esc_html__( 'This color is used for footer background', 'arte' )
  );
  $options['color_footer'] = array(
  	'label'     => esc_html__( 'Text Color', 'arte' ),
  	'type'		=> 'coloor',
  	'id'   		=> 'color_footer',
  	'section'	=> 'section_colors_footer',
  	'default'	=> '#a7a7a7',
  	'desc'		=> esc_html__( 'This color is used for general text in the footer', 'arte' )
  );
  $options['color_footer_links'] = array(
  	'label'     => esc_html__( 'Links Color', 'arte' ),
  	'type'		=> 'coloor',
  	'id'   		=> 'color_footer_links',
  	'section'	=> 'section_colors_footer',
  	'default'	=> '#ffffff',
  	'desc'		=> esc_html__( 'This color is used for links in the footer', 'arte' )
  );
  $options['color_footer_titles'] = array(
  	'label'     => esc_html__( 'Titles Color', 'arte' ),
  	'type'		=> 'coloor',
  	'id'   		=> 'color_footer_titles',
  	'section'	=> 'section_colors_footer',
  	'default'	=> '#ffffff',
  	'desc'		=> esc_html__( 'This color is used for footer titles', 'arte' )
  );

  return $options;

}
