<?php

class ArteRendersGeneral{

  private $_header_image;

  function __construct(){

    add_action( 'wp_enqueue_scripts', array( $this, 'render_general' ) );

  }

  function render_general(){

    $this->_header_image = ArteHelpers::header_image();

    $css = '';

    if( ! ArteHelpers::header_slider() && $this->_header_image ){

      $css .= "
        .ct-header__hero::before{
          background-image: url({$this->_header_image});
        }
      ";

    }

		wp_add_inline_style( 'arte-style', apply_filters( 'arte_minify_css', wp_specialchars_decode( $css ) ) );

  }

}

$arte_renders_general= new ArteRendersGeneral();

?>
