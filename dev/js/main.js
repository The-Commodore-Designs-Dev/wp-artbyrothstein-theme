(function ($) {
    "use strict";

    /** Define Mobile Enviroment */
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };

    $('body').on('click', 'a.ct-social-box__link--popup', function(e){
      window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=no,height=600,width=600');
      return false;
    });

    $(function() {
        // Check if touch is supported
        if (!('ontouchstart' in window)) {
            return;
        }


        var openedSubMenus = [];

        $('.menu-item-has-children > a').on('touchstart', function(event) {
            var $parent = $(this).parent();
            var index = $parent.index();

            if (!openedSubMenus.includes(index)) {
                event.preventDefault();

                // Record this menu as "opened"
                openedSubMenus.push(index);

                // Close other submenus
                $('.menu-item-has-children').each(function(i) {
                    if (!openedSubMenus.includes(i)) {
                        $(this).removeClass('sub-menu-open');
                    }
                });

                $parent.addClass('sub-menu-open');
            } else {
                // The menu is already opened and can be navigated
                openedSubMenus = openedSubMenus.filter(function(i) {
                    return i !== index;
                });
            }
        });
    });

    $(function () {
      $(".ct-main-navigation .menu-item, .ct-main-navigation  .page_item").on('mouseenter mouseleave', function (e) {

          if ( $('.sub-menu', this).length ) {
              var elm = $('.sub-menu:first', this);
              var off = elm.offset();
              var l = off.left;
              var w = elm.width();
              var docH = $(".ct-header").height();
              var docW = $(".ct-header").width();

              var isEntirelyVisible = (l + w <= docW);

              if (!isEntirelyVisible) {
                  $(this).addClass('edge');
              } else {
                  $(this).removeClass('edge');
              }
          }
      });

    });

    if( $('#ct-header__hero-navigator').length > 0 ){

      var waypoint = new Waypoint({
        element: $("#ct-header__hero"),
        handler: function(direction) {
          if( direction === 'down' ) {
            $('#ct-header__hero-navigator').addClass('is_stuck');
          } else {
            $('#ct-header__hero-navigator').removeClass('is_stuck');
          }
        },
        offset: 'bottom-in-view'
      });

    }

    var waypoint_navigator = new Waypoint({
      element: $(".ct-footer"),
      handler: function(direction) {

        if( direction === 'down' ) {
          $('.bullets-container').removeClass('fadeIn').addClass('fadeOut');
        } else {
          $('.bullets-container').removeClass('fadeOut').addClass('fadeIn');
        }


      },
      offset: function(){
        return screen.height - parseInt( $(".ct-footer").outerHeight() );
      }
    });


    if ( ! isMobile.any() && arte_theme_data.menu.sticky === false ) {

      var offset = $('.ct-header__toolbar').outerHeight();
      var sticky =  new Waypoint.Sticky({
				element: $('.ct-header__wrapper'),
				offset: -offset,
				wrapper: '<div class="ct-header__logo-nav--sticky" />',
				stuckClass: 'ct-header__wrapper--stuck'
			});

      var hero_elem = $('#ct-header__hero').length > 0 ? $("#ct-header__hero") : $(".ct-content");
      var sticky_navigator = new Waypoint({
        element: hero_elem,
        handler: function(direction) {
        },
        offset: $('.ct-header__logo-nav').outerHeight()
      });

    }


  $('body').on( 'click', 'a.ct-lightbox', function(e){

    e.preventDefault();

    $.magnificPopup.open({
      items:
        {
          src: $(this).attr('href'),
          type: 'image'
        }
    });

  });

	$( document ).ready(function() {

    $('a.ct-lightbox').magnificPopup({
      type: 'image',
      closeBtnInside: false
    });

    $('.woocommerce-product-gallery__image a').magnificPopup({
      type: 'image',
      closeBtnInside: false
    });

    $('a.ct-lightbox-video').magnificPopup({
      type: 'iframe',
      closeBtnInside: false
    });

    $('.gallery-item a[href*=jpg], .gallery-item a[href*=jpeg], .gallery-item a[href*=png], .gallery-item a[href*=gif], .gallery-item a[href*=gif]').magnificPopup({
      type: 'image',
      closeBtnInside: false
    });

    $('a.xtd-ninja-modal-btn').magnificPopup({
      type: 'inline',
  		preloader: false,
    });


    if( jQuery().masonry && $('.ct-posts').length > 0 ){

      var container = $('.ct-posts');
      var $grid = $('.ct-posts').masonry({
        itemSelector: '.ct-post',
        percentPosition: true,
        resizable: true,
        masonry: {
          columnWidth: '.ct-post'
        }
      });

      imagesLoaded( container, function(){

        $grid.imagesLoaded().progress( function() {
          $grid.masonry('layout');
        });

        $('.ct-posts > .ct-post iframe').on('load', function(){
          $grid.delay(2000).masonry('layout');
        });
      });



    }

    if(typeof window.twttr !== 'undefined' && typeof $grid !== 'undefined' ){
      twttr.ready(function (twttr) {
          twttr.events.bind('loaded', function (event) {
              $grid.masonry('layout');
          });
      });
    }

    $('.ct-gallery--carousel').each(function(){

        var container = $(this);

        imagesLoaded( container, function(){

          container.owlCarousel({
            items				  : 1,
            nav					  : false,
            navText				: ['',''],
            dots				  : true,
            loop 				  : true,
            dotsSpeed     : 700,
            autoplay 			: true,
            autoplayTimeout		: 3000,
            autoplayHoverPause	: true,
            autoHeight    : false,
            onInitialized  : function(){
              $grid.masonry('layout');
            }
          });

        });

    });


     if( ! isMobile.any() && $('.parallax-image').length > 0 ){
	  		$.stellar({
	  			horizontalScrolling: false,
	  			parallaxBackgrounds: false,
	  			hideDistantElements: false
	  		});
	  	}

	    /** Sticky */
	    if ( ! isMobile.any() ) {

	    }

  	});
    if( ! isMobile.any() && $('.summary.entry-summary').length > 0 ){

        $(".gallery-summary .summary.entry-summary").stick_in_parent({
            offset_top: ! isMobile.any() && arte_theme_data.menu.sticky === false ? $('.ct-header__wrapper').outerHeight() + 40 : 40
        });
        $(".gallery-summary .summary.entry-summary").on('sticky_kit:bottom', function(e) {
            $(this).parent().css('height', 'auto');
        });
    }

    if( ! isMobile.any() && $('.woocommerce-checkout .order-review').length > 0 ){
      $(".woocommerce-checkout .order-review").stick_in_parent({
            offset_top: ! isMobile.any() && arte_theme_data.menu.sticky === false ? $('.ct-header__wrapper').outerHeight() + 40 : 40
      });
    }


})(jQuery);
