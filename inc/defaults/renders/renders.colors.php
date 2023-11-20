<?php

class ArteColorsCSS{

	private $_color_bg;
	private $_color_text;
	private $_color_primary;
	private $_color_links;

	private $_color_nav_text;
	private $_color_nav_active;
	private $_color_nav_bg;

	private $_color_nav_sticky_text;
	private $_color_nav_sticky_active;
	private $_color_nav_sticky_bg;

	private $_color_heading;
	private $_color_heading_bg;
	private $_color_heading_subtitle;

	private $_color_h1;
	private $_color_h2;
	private $_color_h3;
	private $_color_h4;
	private $_color_h5;
	private $_color_h6;

	private $_color_footer_bg;
	private $_color_footer_text;
	private $_color_footer_links;
	private $_color_footer_titles;

	private $_svg_dropdown;

	public function __construct(){

		/** Render Typography */
		add_action( 'wp_enqueue_scripts', array( $this, 'render_colors' ) );

	}

	/** Render Typography */
	function render_colors(){

		$options = apply_filters( 'arte_theme_mods', array() );

		$this->_color_bg 			= new ArteColor( esc_attr( get_theme_mod( 'color_bg', $options['color_bg']['default'] ) ) );
		$this->_color_text 		= new ArteColor( esc_attr( get_theme_mod( 'color_text', $options['color_text']['default'] ) ) );
		$this->_color_primary = new ArteColor( esc_attr( get_theme_mod( 'color_primary', $options['color_primary']['default'] ) ) );
		$this->_color_links 	= new ArteColor( esc_attr( get_theme_mod( 'color_links', $options['color_links']['default'] ) ) );

		$this->_color_h1 			= new ArteColor( esc_attr( get_theme_mod( 'color_h1', $this->_color_text ) ), $this->_color_text );
		$this->_color_h2 			= new ArteColor( esc_attr( get_theme_mod( 'color_h2', $this->_color_text ) ), $this->_color_text );
		$this->_color_h3 			= new ArteColor( esc_attr( get_theme_mod( 'color_h3', $this->_color_primary ) ), $this->_color_primary );
		$this->_color_h4 			= new ArteColor( esc_attr( get_theme_mod( 'color_h4', $this->_color_primary ) ), $this->_color_primary );
		$this->_color_h5 			= new ArteColor( esc_attr( get_theme_mod( 'color_h5', $this->_color_links ) ), $this->_color_links );
		$this->_color_h6 			= new ArteColor( esc_attr( get_theme_mod( 'color_h6', $this->_color_links ) ), $this->_color_links );

		$this->_color_heading 			= new ArteColor( esc_attr( get_theme_mod( 'color_page_heading', $options['color_page_heading']['default'] ) ), $this->_color_h1 );
		$this->_color_heading_bg 		= new ArteColor( esc_attr( get_theme_mod( 'color_page_heading_bg', $options['color_page_heading_bg']['default'] ) ) );
		$this->_color_heading_subtitle	= new ArteColor( esc_attr( get_theme_mod( 'color_page_subtitle', $options['color_page_subtitle']['default'] ) ), $this->_color_primary );

		$this->_color_nav_text 		= new ArteColor( esc_attr( get_theme_mod( 'color_navigation', $options['color_navigation']['default'] ) ), $this->_color_text );
		$this->_color_nav_active 	= new ArteColor( esc_attr( get_theme_mod( 'color_navigation_active', $options['color_navigation_active']['default'] ) ), $this->_color_primary );
		$this->_color_nav_bg 			= new ArteColor( esc_attr( get_theme_mod( 'color_navigation_bg', $this->_color_bg->opacity(0) ) ), $this->_color_bg->opacity(0) );

		$this->_color_footer_bg 		= new ArteColor( esc_attr( get_theme_mod( 'color_footer_bg', $options['color_footer_bg']['default'] ) ) );
		$this->_color_footer_text 	= new ArteColor( esc_attr( get_theme_mod( 'color_footer', $options['color_footer']['default'] ) ) );
		$this->_color_footer_titles = new ArteColor( esc_attr( get_theme_mod( 'color_footer_titles', $options['color_footer_titles']['default'] ) ) );
		$this->_color_footer_links 	= new ArteColor( esc_attr( get_theme_mod( 'color_footer_links', $options['color_footer_links']['default'] ) ) );

		$this->_svg_dropdown = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>
				<svg width="40px" height="15px" viewBox="0 0 40 15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
				    <defs></defs>
				    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
				        <path d="M20,15 L0,15 L10,0 L20,15 Z" id="Triangle-1" fill="'.$this->_color_primary.'" sketch:type="MSShapeGroup" transform="translate(10.000000, 7.500000) rotate(-180.000000) translate(-10.000000, -7.500000) "></path>
				    </g>
				</svg>';

		/** Basic Colors */
		$css = "
			body{
				background-color: $this->_color_bg;
				color: $this->_color_text;
			}
			h1, .h1{ color: $this->_color_h1 }
			h2, .h2{ color: $this->_color_h2 }
			h3, .h3{ color: $this->_color_h3 }
			h4, .h4{ color: $this->_color_h4 }
			h5, .h5{ color: $this->_color_h5 }
			h6, .h6{ color: $this->_color_h6 }
			a{
				color: $this->_color_links;
			}
			a:hover{
				color: {$this->_color_links->opacity(0.75)};
			}
			.ct-content{
				border-color: {$this->_color_text->opacity(0.15)}
			}
			input[type=text],
			input[type=search],
			input[type=password],
			input[type=email],
			input[type=number],
			input[type=url],
			input[type=date],
			input[type=tel],
			select,
			textarea,
			.form-control{
				border: 1px solid {$this->_color_text->opacity(0.25)};
				background-color: {$this->_color_bg};
				color: {$this->_color_text}
			}
			input[type=text]:focus,
			input[type=search]:focus,
			input[type=password]:focus,
			input[type=email]:focus,
			input[type=number]:focus,
			input[type=url]:focus,
			input[type=date]:focus,
			input[type=tel]:focus,
			select:focus,
			textarea:focus,
			.form-control:focus{
				color: {$this->_color_text};
				border-color: {$this->_color_text->opacity(0.4)};
				background-color: {$this->_color_text->opacity(0.05)};
			}
			select{
				background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+CgkJCQk8c3ZnIHdpZHRoPSI0MHB4IiBoZWlnaHQ9IjE1cHgiIHZpZXdCb3g9IjAgMCA0MCAxNSIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4bWxuczpza2V0Y2g9Imh0dHA6Ly93d3cuYm9oZW1pYW5jb2RpbmcuY29tL3NrZXRjaC9ucyI+CgkJCQkgICAgPGRlZnM+PC9kZWZzPgoJCQkJICAgIDxnIGlkPSJQYWdlLTEiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIHNrZXRjaDp0eXBlPSJNU1BhZ2UiPgoJCQkJICAgICAgICA8cGF0aCBkPSJNMjAsMTUgTDAsMTUgTDEwLDAgTDIwLDE1IFoiIGlkPSJUcmlhbmdsZS0xIiBmaWxsPSIjNjY2NjY2IiBza2V0Y2g6dHlwZT0iTVNTaGFwZUdyb3VwIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgxMC4wMDAwMDAsIDcuNTAwMDAwKSByb3RhdGUoLTE4MC4wMDAwMDApIHRyYW5zbGF0ZSgtMTAuMDAwMDAwLCAtNy41MDAwMDApICI+PC9wYXRoPgoJCQkJICAgIDwvZz4KCQkJCTwvc3ZnPg==) !important;
			}
			::-webkit-input-placeholder {
				color: {$this->_color_text->opacity(0.6)} !important;
			}
			::-moz-placeholder {
				color: {$this->_color_text->opacity(0.6)} !important;
			}
			:-ms-input-placeholder {
				color: {$this->_color_text->opacity(0.6)} !important;
			}
			:-moz-placeholder {
				color: {$this->_color_text->opacity(0.6)} !important;
			}
			::placeholder{
				color: {$this->_color_text->opacity(0.6)} !important;
			}
			pre{
				color: {$this->_color_text}
			}
		";

		$css .= "
		input[type=submit],
		input[type=button],
		button,
		.btn-primary,
		.vc_general.vc_btn3.vc_btn3.vc_btn3-style-btn-primary{
			background-color: $this->_color_primary;
			color: {$this->_color_bg};
			border-color: $this->_color_primary;
		}
		input[type=submit]:hover,
		input[type=submit]:active,
		input[type=button]:hover,
		input[type=button]:active,
		button:hover,
		button:active,
		.btn-primary:hover,
		.btn-primary:active,
		.btn-primary:active:hover,
		.vc_btn3.vc_btn3.vc_btn3-style-btn-primary:hover,
		.vc_general.vc_btn3.vc_btn3.vc_btn3-style-btn-outline-primary:hover{
			background-color: {$this->_color_primary->darken()};
			border-color: {$this->_color_primary->darken()};
		}
		.btn-link,
		.vc_general.vc_btn3.vc_btn3-style-btn-link{
			color: {$this->_color_primary};
		}
		.btn-link:hover,
		.vc_general.vc_btn3.vc_btn3-style-btn-link:hover{
			color: {$this->_color_primary->darken()};
		}
		.btn-link::after,
		.vc_general.vc_btn3.vc_btn3-style-btn-link::after{
			background-color: {$this->_color_primary};
			color: {$this->_color_bg};
		}
		.btn-link:hover::after{
			background-color: {$this->_color_primary->darken()};
		}
		.btn-outline-primary,
		.vc_general.vc_btn3.vc_btn3.vc_btn3-style-btn-outline-primary{
			border-color: $this->_color_primary;
			color: $this->_color_primary;
		}
		.btn-outline-primary:active,
		.btn-outline-primary:hover,
		.btn-outline-primary:hover:active,
		.btn-outline-primary:focus,
		.btn-outline-primary:disabled,
		.btn-outline-primary:disabled:hover,
		.vc_general.vc_btn3.vc_btn3.vc_btn3-style-btn-outline-primary:hover{
			border-color: {$this->_color_primary};
			background-color: {$this->_color_primary};
			color: {$this->_color_bg};
		}
		.color-primary,
		.color--primary{
			color: $this->_color_primary;
		}
		.color-primary-inverted,
		.color--primary-inverted{
			color: {$this->_color_primary->contrast()};
		}
		.color-primary--hover{
			color: {$this->_color_primary->darken()};
		}
		.color-text,
		.color--text{
			color: {$this->_color_text};
		}
		.color-text-inverted,
		.color--text-inverted{
			color: {$this->_color_text->contrast()}
		}
		.color-bg,
		.vc_single_image-wrapper.ct-lightbox-video,
		.color--bg{
			color: {$this->_color_bg}
		}
		.color-bg-inverted,
		.color--bg-inverted{
			color: {$this->_color_bg->contrast()}
		}
		.color--h1{
			color: {$this->_color_h1}
		}
		.color--h2{
			color: {$this->_color_h2}
		}
		.color--h3{
			color: {$this->_color_h3}
		}
		.color--h4{
			color: {$this->_color_h4}
		}
		.color-bg-bg,
		.bg-color--bg{
			background-color: {$this->_color_bg}
		}
		.color-bg-bg--75,
		.bg-color--bg-75{
			background-color: {$this->_color_bg->opacity(0.75)}
		}
		.color-bg-primary,
		.bg-color--primary{
			background-color: {$this->_color_primary}
		}
		.color-bg-text,
		.bg-color--test{
			background-color: {$this->_color_text}
		}


		.special-title::after{
			border-color: {$this->_color_primary}
		}


		";

		/** Navigation */
		$css .= "
			.ct-header{
				color: $this->_color_nav_text;
				background-color: {$this->_color_nav_bg->opacity(0.95)};
			}
			@media(min-width: 576px){
				.ct-header{
					background-color: {$this->_color_nav_bg};
				}
			}
			.ct-header__logo-nav a{
				color: $this->_color_nav_text;
			}
			.ct-header__logo-nav a:hover{
				color: {$this->_color_nav_text->opacity(0.65)};
			}
			.ct-menu--inverted .ct-header__wrapper:not(.ct-header__wrapper--stuck) .ct-header__logo-nav ul:not(.sub-menu) > li > a{
				color: {$this->_color_nav_text->contrast()};
			}
			.ct-menu--inverted .ct-header__wrapper:not(.ct-header__wrapper--stuck) .ct-header__logo-nav ul:not(.sub-menu) > li > a:hover{
				color: {$this->_color_nav_text->contrast(0.85)};
			}
			.ct-header__logo-nav .current-menu-ancestor > a,
		  .ct-header__logo-nav .current-menu-parent > a,
		  .ct-header__logo-nav .current-menu-item > a,
		  .ct-header__logo-nav .current-page-parent > a,
		  .ct-header__logo-nav .current_page_parent > a,
		  .ct-header__logo-nav .current_page_ancestor > a,
			.ct-header__logo-nav .current-page-ancestor > a,
		  .ct-header__logo-nav .current_page_item > a{
				color: $this->_color_nav_active;
			}

			#ct-main-nav::before{
				background-color: {$this->_color_nav_bg->opacity(0.9)};
			}

			.ct-main-navigation .sub-menu,
			.ct-main-navigation .children{
				background-color: {$this->_color_nav_bg->opacity(1)}
			}

			.ct-main-navigation .sub-menu a,
			.ct-main-navigation .children a{
				color: {$this->_color_nav_text->opacity(1)}
			}
			.ct-main-navigation .sub-menu a:hover,
			.ct-main-navigation .children a:hover{
				color: {$this->_color_primary}
			}

			.ct-header__wrapper--stuck{
				background-color: {$this->_color_nav_bg->opacity(0.98)};
			}

			.color-primary,
			.wpml-switcher .active,
			#ct-header__hero-navigator > a,
			.section-bullets,
			.special-title small:last-child,
			#ct-scroll-top{
				color: $this->_color_nav_active;
			}

			.ct-layout--without-slider .ct-header__hero{
				color: $this->_color_nav_text;
			}

			.ct-hero--without-image .ct-header__hero::after{
				{$this->_color_heading_bg->rule( 'background-color: %s' )}
			}
			.ct-header__main-heading small,
			.ct-header__main-heading span,
			.ct-header__main-heading-excerpt{
				color: $this->_color_heading_subtitle;
			}

			.ct-header__main-heading-title h1,
			.ct-header__main-heading-title .h1{
				color: $this->_color_heading;
			}

			.img-frame-small,
			.img-frame-large{
				background-color: $this->_color_bg;
				border-color: $this->_color_bg;
			}

			h1 small, h2 small, h3 small, h4 small{
				color: $this->_color_primary;
			}

		";

		/** WordPress */
		$css .= "
			.ct-social-box .fa-boxed.fa-envelope{
				color: {$this->_color_primary->contrast()};
			}
			.ct-social-box .fa-boxed.fa-envelope::after{
				background-color: $this->_color_primary;
			}
			h4.media-heading{
				color: $this->_color_primary;
			}
			.comment-reply-link,
			.btn-outline-primary{
				color: $this->_color_primary;
				border-color: $this->_color_primary;
			}
			.comment-reply-link:hover,
			.btn-outline-primary:hover,
			.btn-outline-primary:hover:active,
			.btn-outline-primary:active{
				background-color: $this->_color_primary;
				color: $this->_color_bg;
				border-color: $this->_color_primary;
			}
			.media.comment{
				border-color: {$this->_color_text->opacity(0.125)};
			}
			.ct-posts .ct-post.format-quote .ct-post__content{
				background-color: $this->_color_primary;
			}
			.ct-posts .ct-post.format-quote blockquote,
			.ct-posts .ct-post.format-quote blockquote cite,
			.ct-posts .ct-post.format-quote blockquote cite::before{
				color: $this->_color_bg;
			}
			.ct-posts .ct-post.format-link{
				border-color: {$this->_color_text->opacity(0.125)};
			}
			.pagination .current{
				color: $this->_color_bg;
			}
			.pagination .nav-links .current::before{
				background-color: $this->_color_primary;
			}
			.pagination .current{
				color: $this->_color_bg;
			}
			.pagination a{
				color: {$this->_color_primary->darken()};
			}
			.pagination .nav-links .prev,
			.pagination .nav-links .next{
				border-color: $this->_color_primary
			}
			.ct-sidebar .widget_archive,
			.ct-sidebar .widget_categories{
				color: {$this->_color_text->opacity(0.35)};
			}
			.ct-sidebar ul li::before{
				color: {$this->_color_text}
			}
			.ct-sidebar .sidebar-widget .widget-title::after{
				border-color: {$this->_color_text};
			}
			.ct-sidebar .sidebar-widget .widget-title,
			.ct-sidebar .sidebar-widget .widget-title a{
				color: $this->_color_primary
			}
			.ct-sidebar .sidebar-widget.widget_tag_cloud .tag{
				color: $this->_color_bg;
			}
			.ct-sidebar .sidebar-widget.widget_tag_cloud .tag::before{
				background-color: {$this->_color_text}
			}
			.ct-sidebar .sidebar-widget.widget_tag_cloud .tag.x-large::before{
				background-color: {$this->_color_primary}
			}
			#wp-calendar thead th,
			#wp-calendar tbody td{
				border-color: {$this->_color_text->opacity(0.125)};
			}
		";

		/** Footer */
		$css .= "
			.ct-footer{
				background-color: $this->_color_footer_bg;
				color: $this->_color_footer_text;
			}
			.ct-footer a{
				color: {$this->_color_footer_links};
			}
			.ct-footer .widget-title{
				color: $this->_color_footer_titles;
			}
		";

		/** Bootstrap */
		$css .= "
			blockquote,
			blockquote cite::before,
			q,
			q cite::before{
				color: {$this->_color_primary}
			}
			blockquote cite,
			q site{
				color: {$this->_color_text}
			}
			table{
				border-color: {$this->_color_text->opacity(0.15)};
			}
			table thead th{
				color: {$this->_color_primary}
			}

		";


		/** xtender */
		$css .= "
			.ct-vc-recent-news-post{
				border-color: {$this->_color_text->opacity(0.125)};
			}
			.ct-vc-recent-news-post .ti-calendar{
				color: $this->_color_primary;
			}
			.ct-vc-services-carousel__item-title{
				color: $this->_color_primary;
			}
			.ct-vc-services-carousel__item{
				background-color: $this->_color_bg;
			}
			.wcs-timetable--week .wcs-class__title,
			.wcs-timetable--agenda .wcs-class__title,
			.wcs-timetable--compact-list .wcs-class__title{
				color: $this->_color_links
			}
			.wcs-timetable--carousel .wcs-class__title{
				color: $this->_color_links !important
			}
			.wcs-timetable__carousel .wcs-class__title::after,
			.wcs-timetable__carousel .owl-prev, .wcs-timetable__carousel .owl-next{
				border-color: $this->_color_primary;
				color: $this->_color_primary;
			}

			.wcs-timetable--carousel .wcs-class__title small{
				color: $this->_color_text;
			}
			body .wcs-timetable--carousel .wcs-btn--action{
				background-color: $this->_color_primary;
				color: $this->_color_bg;
			}
			body .wcs-timetable--carousel .wcs-btn--action:hover{
				background-color: {$this->_color_primary->darken()};
				color: $this->_color_bg;
			}

			.wcs-timetable__container .wcs-filters__filter-wrapper:hover{
				color: $this->_color_primary !important;
			}
			.wcs-timetable--compact-list .wcs-day__wrapper{
				background-color: {$this->_color_primary->opacity(0.8)};
				color: {$this->_color_bg}
			}

			.wcs-timetable__week,
			.wcs-timetable__week .wcs-day,
			.wcs-timetable__week .wcs-class,
			.wcs-timetable__week .wcs-day__title{
				border-color: {$this->_color_text->opacity(0.125)};
			}
			.wcs-timetable__week .wcs-class{
				background-color: $this->_color_bg;
			}
			.wcs-timetable__week .wcs-day__title,
			.wcs-timetable__week .wcs-class__instructors::before{
				color: $this->_color_primary !important;
			}
			.wcs-timetable__week .wcs-day__title::before{
				background-color: $this->_color_text;
			}

			.wcs-timetable__week .wcs-class__title::after{
				color: $this->_color_bg;
				background-color: $this->_color_primary;
			}
			.wcs-filters__title{
				color: $this->_color_primary !important;
			}

			.xtd-carousel-mini,
			.xtd-carousel-mini .owl-image-link:hover::after{
				color: $this->_color_primary !important;
			}
			.xtd-carousel-mini .onclick-video_link a::before{
				background-color: {$this->_color_primary->opacity(0.85)};
			}
			.xtd-carousel-mini .onclick-video_link a::after{
				color: $this->_color_bg;
			}
			.xtd-carousel-mini .onclick-video_link a:hover::after{
				background-color: {$this->_color_primary->opacity(0.98)};
			}

			.wcs-modal:not(.wcs-modal--large) .wcs-modal__title,
			.wcs-modal:not(.wcs-modal--large) .wcs-modal__close{
				color: $this->_color_bg;
			}
			.wcs-modal:not(.wcs-modal--large) .wcs-btn--action.wcs-btn--action{
				background-color: $this->_color_primary;
				color: $this->_color_bg;
			}
			.wcs-modal:not(.wcs-modal--large) .wcs-btn--action.wcs-btn--action:hover{
				background-color: {$this->_color_primary->darken()};
				color: $this->_color_bg;
			}
			.wcs-timetable--agenda .wcs-timetable__agenda-data .wcs-class__duration::after{
				border-color: {$this->_color_primary}
			}
			.wcs-timetable--agenda .wcs-timetable__agenda-data .wcs-class__time,
			.wcs-timetable--compact-list .wcs-class__time{
				color: {$this->_color_text->opacity(0.75)}
			}
			.wcs-modal:not(.wcs-modal--large),
			div.pp_overlay.pp_overlay{
				background-color: {$this->_color_primary->opacity(0.97)} !important;
			}
			.mfp-bg{
				background-color: {$this->_color_bg->opacity(0.95)} !important;
			}
			.owl-image-link::before{
				color: $this->_color_bg;
			}

			.owl-nav .owl-prev::before,
			.owl-nav .owl-next::after,
			.owl-dots {
				color: $this->_color_primary !important;
			}

			.xtd-ninja-modal-container{
				background-color: {$this->_color_bg};
			}


			.xtd-recent-posts__post__date::before{
				color: $this->_color_primary;
			}

			.xtd-gmap-info{
				background-color: $this->_color_bg;
				color: $this->_color_text;
			}

			.fa-boxed{
				background-color: $this->_color_primary;
				color: $this->_color_bg;
			}


			.xtd-timeline__item::before{
				color: $this->_color_h4;
			}
			.xtd-timeline__item::after{
				background-color: $this->_color_h4;
			}

			.xtd-offset-frame::before{
				color: {$this->_color_primary};
			}
			.xtd-timeline::before{
				border-color: {$this->_color_primary}
			}



		";


		wp_add_inline_style( 'arte-style', apply_filters( 'minify_css', wp_specialchars_decode( $css ) ) );


	}

}
$piroutte_renders_colors = new ArteColorsCSS();
?>
