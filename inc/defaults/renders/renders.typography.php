<?php

class ArteTypographyCSS{

	private $_font;
	private $_font_h1;
	private $_font_h2;
	private $_font_h3;
	private $_font_h4;
	private $_font_h5;
	private $_font_h6;
	private $_font_menu;
	private $_font_blockquote;

	public function __construct(){

		/** Render Typography */
		add_action( 'wp_enqueue_scripts', array( $this, 'render_typography' ) );

	}


	/** Render Typography */
	function render_typography(){

		$this->_font 		= apply_filters( 'arte_pre_fonts_array', 'font' );
		$this->_font_h1 = apply_filters( 'arte_pre_fonts_array', 'font_h1' );
		$this->_font_h2 = apply_filters( 'arte_pre_fonts_array', 'font_h2' );
		$this->_font_h3 = apply_filters( 'arte_pre_fonts_array', 'font_h3' );
		$this->_font_h4 = apply_filters( 'arte_pre_fonts_array', 'font_h4' );
		$this->_font_h5 = apply_filters( 'arte_pre_fonts_array', 'font_h5' );
		$this->_font_h6	= apply_filters( 'arte_pre_fonts_array', 'font_h6' );
		$this->_font_menu					= apply_filters( 'arte_pre_fonts_array', 'font_menu' );
		$this->_font_blockquote		= apply_filters( 'arte_pre_fonts_array', 'font_blockquote' );

		$fonts = array();
		$fonts = apply_filters( 'arte_fonts_array', $fonts, $this->_font );
		$fonts = apply_filters( 'arte_fonts_array', $fonts, $this->_font_h1 );
		$fonts = apply_filters( 'arte_fonts_array', $fonts, $this->_font_h2 );
		$fonts = apply_filters( 'arte_fonts_array', $fonts, $this->_font_h3 );
		$fonts = apply_filters( 'arte_fonts_array', $fonts, $this->_font_h4 );
		$fonts = apply_filters( 'arte_fonts_array', $fonts, $this->_font_h5 );
		$fonts = apply_filters( 'arte_fonts_array', $fonts, $this->_font_h6 );
		$fonts = apply_filters( 'arte_fonts_array', $fonts, $this->_font_menu );
		$fonts = apply_filters( 'arte_fonts_array', $fonts, $this->_font_blockquote );

		if( ArteHelpers::webfonts_method() ){

			$fonts = ArteLoadFonts::web_fonts( $fonts );

		} else{

			$fonts = ArteLoadFonts::fonts( $fonts );
		}

		if( ArteHelpers::webfonts_method() ){

			wp_localize_script( 'arte-scripts', 'arte_fonts', $fonts );

		} else {

			wp_enqueue_style( 'arte-google-fonts', $fonts, array( 'arte-style' ), null, 'all' );

		}

		$font_body   = new ArteFont( $this->_font );
		$font_h1     = new ArteFont( $this->_font_h1 );
		$font_h2     = new ArteFont( $this->_font_h2 );
		$font_h3     = new ArteFont( $this->_font_h3 );
		$font_h4     = new ArteFont( $this->_font_h4 );
		$font_h5     = new ArteFont( $this->_font_h5 );
		$font_h6     = new ArteFont( $this->_font_h6 );
		$font_menu   = new ArteFont( $this->_font_menu );
		$font_quote  = new ArteFont( $this->_font_blockquote );

		$css = "
			body{
				$font_body->_family
				$font_body->_style
				$font_body->_variant
				$font_body->_rem
			}
			h1,
			.h1{
				$font_h1->_family
				$font_h1->_style
				$font_h1->_variant
				font-size: " . ( $font_h1->_size * 0.75 / 16 ) ."rem;
				$font_h1->_spacing
			}
			@media(min-width: 768px){
				h1,
				.h1{
					$font_h1->_rem
				}
			}
			h2,
			.h2,
			.woocommerce.single .product[id] .product_title{
				$font_h2->_family
				$font_h2->_style
				$font_h2->_variant
				$font_h2->_rem
				$font_h2->_spacing
			}
			h3,
			.h3{
				$font_h3->_family
				$font_h3->_style
				$font_h3->_variant
				$font_h3->_rem
				$font_h3->_spacing
			}
			h4,
			.h4{
				$font_h4->_family
				$font_h4->_style
				$font_h4->_variant
				$font_h4->_rem
				$font_h4->_spacing
			}
			h5,
			.h5,
			body.woocommerce h2.woocommerce-loop-product__title.woocommerce-loop-product__title,
			.woocommerce-tabs .tabs > li > a{
				$font_h5->_family
				$font_h5->_style
				$font_h5->_variant
				$font_h5->_rem
				$font_h5->_spacing
			}
			h6,
			.h6{
				$font_h6->_family
				$font_h6->_style
				$font_h6->_variant
				$font_h6->_rem
			}
			blockquote,
			blockquote p,
			.pullquote,
			.blockquote,
			.text-blockquote{
				$font_quote->_family
				$font_quote->_style
				$font_quote->_variant
				$font_quote->_rem
			}
			blockquote cite{
				$font_body->_family
			}

			.ct-main-navigation,
			input[type=text],
			input[type=email],
			input[type=name],
			textarea,
			select,
			.product_meta{
				$font_menu->_family
				$font_menu->_style
				$font_menu->_variant
				$font_menu->_rem
				$font_menu->_spacing
			}
			input[type=submit],
			button{
				$font_menu->_family
			}
			h1 small, h2 small, h3 small, h4 small{
				$font_menu->_family
			}

			.font-family--h1{
				$font_h1->_family
			},
			.font-family--h2{
				$font_h2->_family
			},
			.font-family--h3{
				$font_h3->_family
			}
			#reviews .comment-text .star-rating,
			#reviews .comment-reply-title{
				$font_h4->_family
			}
		";


		$css .= "
			.xtd-recent-posts__post__title{
				$font_h6->_family
				$font_h6->_style
				$font_h6->_variant
				$font_h6->_rem
				$font_h6->_spacing
			}
			.sub-menu a,
			.children a{
				$font_body->_family
				$font_body->_style
			}
			#footer .widget-title{
				$font_menu->_family
				$font_menu->_style
				$font_menu->_variant
			}
		";

		$css .= "
			table thead th{
				$font_h5->_family
				$font_h5->_style
				$font_h5->_variant
			}

			.btn,
			.wcs-more.wcs-btn--action,
			.vc_general.vc_btn3.vc_btn3,
			.button{
				$font_menu->_family
				$font_menu->_style
				$font_menu->_variant
			}

			.ct-header__main-heading small,
			.special-title em:first-child,
			.wcs-timetable--carousel .wcs-class__timestamp .date-day{
				$font_quote->_family
				$font_quote->_style
			}
		";

		/** Components */
		$css .= "
			.ct-vc-text-separator{
				$font_h1->_family
				$font_h1->_style
			}
			.wcs-timetable--week .wcs-class__title,
			.wcs-timetable--agenda .wcs-class__title{
				$font_h3->_family
			}
			.xtd-gmap-info{
				$font_body->_family
				$font_body->_style
				$font_body->_variant
				$font_body->_rem
			}
			.xtd-timeline__item::before{
				$font_h4->_family
				$font_h4->_style
				$font_h4->_variant
				$font_h4->_rem
				$font_h4->_spacing
			}
		";

		wp_add_inline_style( 'arte-style', apply_filters( 'minify_css', wp_specialchars_decode( $css ) ) );

	}

}

$arte_renders_typography = new ArteTypographyCSS();

?>
