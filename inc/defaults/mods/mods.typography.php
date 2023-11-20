<?php

add_filter( 'arte_theme_mods', 'arte_mods_typography', 20, 1 );

function arte_mods_typography( $options ){

  $options[] = array(
  	'label'    	=> esc_html__( 'Typography', 'arte' ),
  	'type'		=> 'panel',
  	'id'   		=> 'panel_typo',
  	'priority'	=> 30
  );
  $options[] = array(
  	'label'    	=> esc_html__('Global Typography','arte'),
  	'type'		=> 'section',
  	'id'   		=> 'typo_global',
  	'panel'		=> 'panel_typo'
  );
  $options['font'] = array(
  	'label'       => esc_html__( 'Main Font Family', 'arte' ),
  	'type'		    => 'typo',
  	'id'   		    => 'font',
  	'section'	    => 'typo_global',
  	'default'	    => array( 'Droid Serif', 'regular', 14 ),
    'input_attr'   => array( 'min' => 10, 'max' => 24, 'step' => 1, 'suffix' => 'px' ),
  	'desc'		    => esc_html__( 'This is the general font of your site. It is used for general text, headings, buttons and other text elements.', 'arte' ),
  	'transport'	  => 'refresh'
  );
  $options[] = array(
  	'label'     => esc_html__( 'Font Subset', 'arte' ),
  	'type'		=> 'select',
  	'id'   		=> 'font_subset',
  	'section'	=> 'typo_global',
  	'default'	=> 0,
  	'choices'	=> array(
  		0 => 'No Subset - Standard Latin',
  		1 => 'Cyrillic Extended (cyrillic-ext)',
  		2 => 'Greek Extended (greek-ext)',
  		3 => 'Greek (greek)',
  		4 => 'Vietnamese (vietnamese)' ,
  		5 => 'Latin Extended (latin-ext)' ,
  		6 => 'Cyrillic (cyrillic)'),
  	'desc'		=> esc_html__( 'Make sure the fonts you use on the website support these special characters.', 'arte' )
  );
  $options[] = array(
  	'label'    	=> esc_html__( 'Web Font Loader', 'arte' ),
  	'type'		=> 'checkbox',
  	'section'	=> 'typo_global',
  	'id' 		=> 'font_loader',
  	'desc'		=> esc_html__( 'Check this to activate Web Font Loader. This will increase your page speed, but the fonts will be loaded after the other elements.', 'arte')
  );
  $options[] = array(
  	'label'    	=> esc_html__( 'Use Soft Bold', 'arte' ),
  	'type'		=> 'checkbox',
  	'section'	=> 'typo_global',
  	'id' 		=> 'font_strong',
  	'desc'		=> esc_html__( 'Check this use normal font weight for the <strong> tag.', 'arte')
  );
  $options[] = array(
  	'label'    	=> esc_html__('Main Menu','arte'),
  	'type'		=> 'section',
  	'id'   		=> 'menu_section',
  	'panel'		=> 'panel_typo'
  );
  $options['font_menu'] = array(
  	'label'       => esc_html__( 'Main Menu Font', 'arte' ),
  	'type'		    => 'typo',
  	'id'   		    => 'font_menu',
  	'section'	    => 'menu_section',
  	'default'	    => array( 'Poppins', '400', 12, 'uppercase', 8 ),
    'input_attr'   => array( 'min' => 10, 'max' => 18, 'step' => 1, 'suffix' => 'px' ),
  	'desc'		    => esc_html__( 'This is the general font of your navigation.', 'arte' ),
  	'transport'	  => 'refresh'
  );
  $options[] = array(
  	'label'    	=> esc_html__('H1 Heading','arte'),
  	'type'		=> 'section',
  	'id'   		=> 'h1_section',
  	'panel'		=> 'panel_typo'
  );
  $options['font_h1'] = array(
  	'label'       => esc_html__( 'H1 Headings Font', 'arte' ),
  	'type'		    => 'typo',
  	'id'   		    => 'font_h1',
  	'section'	    => 'h1_section',
  	'default'	    => array( 'Playfair Display', 'regular', 66, '300', -5 ),
    'input_attr'   => array( 'min' => 30, 'max' => 72, 'step' => 1, 'suffix' => 'px' ),
  	'desc'		    => esc_html__( 'This is the general font of your H1 headings.', 'arte' ),
  	'transport'	  => 'refresh'
  );

  $options[] = array(
  	'label'    	=> esc_html__('H2 Heading','arte'),
  	'type'		=> 'section',
  	'id'   		=> 'h2_section',
  	'panel'		=> 'panel_typo'
  );
  $options['font_h2'] = array(
  	'label'       => esc_html__( 'H2 Headings Font', 'arte' ),
  	'type'		    => 'typo',
  	'id'   		    => 'font_h2',
  	'section'	    => 'h2_section',
  	'default'	    => array( 'Playfair Display', 'regular', 52, 'normal', -4 ),
    'input_attr'   => array( 'min' => 20, 'max' => 62, 'step' => 1, 'suffix' => 'px' ),
  	'desc'		    => esc_html__( 'This is the general font of your H2 headings.', 'arte' ),
  	'transport'	  => 'refresh'
  );

  $options[] = array(
  	'label'    	=> esc_html__('H3 Heading','arte'),
  	'type'		=> 'section',
  	'id'   		=> 'h3_section',
  	'panel'		=> 'panel_typo'
  );
  $options['font_h3'] = array(
  	'label'       => esc_html__( 'H3 Headings Font', 'arte' ),
  	'type'		    => 'typo',
  	'id'   		    => 'font_h3',
  	'section'	    => 'h3_section',
  	'default'	    => array( 'Poppins', '200', 30, 'uppercase', 0 ),
    'input_attr'   => array( 'min' => 18, 'max' => 42, 'step' => 1, 'suffix' => 'px' ),
  	'desc'		    => esc_html__( 'This is the general font of your H3 headings.', 'arte' ),
  	'transport'	  => 'refresh'
  );
  $options[] = array(
  	'label'    	=> esc_html__('H4 Heading','arte'),
  	'type'		=> 'section',
  	'id'   		=> 'h4_section',
  	'panel'		=> 'panel_typo'
  );
  $options['font_h4'] = array(
  	'label'       => esc_html__( 'H4 Headings Font', 'arte' ),
  	'type'		    => 'typo',
  	'id'   		    => 'font_h4',
  	'section'	    => 'h4_section',
  	'default'	    => array( 'Poppins', '300', 20, 'uppercase', 15 ),
    'input_attr'   => array( 'min' => 12, 'max' => 24, 'step' => 1, 'suffix' => 'px' ),
  	'desc'		    => esc_html__( 'This is the general font of your H4 headings.', 'arte' ),
  	'transport'	  => 'refresh'
  );
  $options[] = array(
  	'label'    	=> esc_html__('H5 Heading','arte'),
  	'type'		=> 'section',
  	'id'   		=> 'h5_section',
  	'panel'		=> 'panel_typo'
  );
  $options['font_h5'] = array(
  	'label'       => esc_html__( 'H5 Headings Font', 'arte' ),
  	'type'		    => 'typo',
  	'id'   		    => 'font_h5',
  	'section'	    => 'h5_section',
  	'default'	    => array( 'Playfair Display', 'regular', 20, 'capitalize', 0 ),
    'input_attr'   => array( 'min' => 12, 'max' => 24, 'step' => 1, 'suffix' => 'px' ),
  	'desc'		    => esc_html__( 'This is the general font of your H5 headings.', 'arte' ),
  	'transport'	  => 'refresh'
  );
  $options[] = array(
  	'label'    	=> esc_html__('H6 Heading','arte'),
  	'type'		=> 'section',
  	'id'   		=> 'h6_section',
  	'panel'		=> 'panel_typo'
  );
  $options['font_h6'] = array(
  	'label'       => esc_html__( 'H6 Headings Font', 'arte' ),
  	'type'		    => 'typo',
  	'id'   		    => 'font_h6',
  	'section'	    => 'h6_section',
  	'default'	    => array( 'Playfair Display', 'regular', 16, 'normal', 0 ),
    'input_attr'   => array( 'min' => 10, 'max' => 18, 'step' => 1, 'suffix' => 'px' ),
  	'desc'		    => esc_html__( 'This is the general font of your H6 headings.', 'arte' ),
  	'transport'	  => 'refresh'
  );
  $options[] = array(
  	'label'    	=> esc_html__('Blockquote','arte'),
  	'type'		=> 'section',
  	'id'   		=> 'blockquote_section',
  	'panel'		=> 'panel_typo'
  );
  $options['font_blockquote'] = array(
  	'label'       => esc_html__( 'Blockquote Font', 'arte' ),
  	'type'		    => 'typo',
  	'id'   		    => 'font_blockquote',
  	'section'	    => 'blockquote_section',
  	'default'	    => array( 'Playfair Display', 'italic', 23, 'normal', 0 ),
    'input_attr'  => array( 'min' => 14, 'max' => 32, 'step' => 1, 'suffix' => 'px' ),
  	'desc'		    => esc_html__( 'This is the general font of your blockquotes.', 'arte' ),
  	'transport'	  => 'refresh'
  );

  return $options;

}

?>
