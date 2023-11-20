<?php

class ArteWooCommerce {

	function __construct() {

		/** Remove WooCommerce Styles */
		add_filter( 'woocommerce_enqueue_styles', '__return_false' );
		add_filter( 'woocommerce_show_page_title', '__return_false' );

		/** Register WooCommerce Sidebar */
		if ( function_exists('register_sidebar'))
			register_sidebar(array(
			'name'					=> esc_html__( 'Shop Widgets Area', 'arte' ),
			'id'						=> 'sidebar_shop',
			'description' 	=> esc_html__( 'This sidebar is visible on the right side of the screen, on all WooCommerces pages.', 'arte' ),
			'before_widget'	=> '<aside id="%1$s" class="sidebar-widget %2$s">',
			'after_widget' 	=> '</aside>',
			'before_title'	=> '<h4 class="widget-title">',
			'after_title'	 	=> '</h4>',
		));

		/** Remove Breadcrumbs  */
		remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20);

		/** Add WooCommerce Breadcrubms */
		add_filter( 'woocommerce_breadcrumb_defaults', array($this, 'woocommerce_breadcrumbs') );

		/** Add Styles */
		add_action( 'wp_enqueue_scripts', array ($this, 'load_scripts' ), 100 );

		/** Remove Loop Rating */
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

		/** Limit Products Listing */
		add_filter( 'loop_shop_per_page', array( $this, 'default_loop_limit' ), 20 );

		add_filter( 'loop_shop_per_page', function($nr){
			if( is_single() ) return 4;
			return 10;
		}, 20 );

		add_action( 'woocommerce_before_main_content', function(){
			if( is_singular() ) return;
			echo '<div class="woocommerce-loop-before">';
		});
		add_action( 'woocommerce_before_shop_loop', function(){
			if( is_singular() ) return;
			echo '</div>';
		}, 99);

		add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function(){
			return array( 'width' => 750, 'height' => 750, 'crop' => 0 );
		});

	}

	function default_loop_limit($cols){
		return 12;
	}

	/** WooCommerce Support */
	public static function woocommerce_support() {
	    add_theme_support( 'woocommerce' );
	}

	/** Load Scripts */
	function load_scripts() {

		global $post;

		$shortcodes = array(
		'product',
		'product_page',
		'product_category',
		'product_categories',
		'add_to_cart',
		'add_to_cart_url',
		'products',
		'recent_products',
		'sale_products',
		'best_selling_products',
		'top_rated_products',
		'featured_products',
		'product_attribute',
		'related_products',
		'shop_messages',
		'woocommerce_order_tracking',
		'woocommerce_cart',
		'woocommerce_checkout',
		'woocommerce_my_account'
		);

    $has_shortcode = false;

		if( is_singular() ){
			foreach( $shortcodes as $shortcode ){
				if( has_shortcode( $post->post_content, $shortcode ) && ! $has_shortcode ){
					$has_shortcode = true;
				}
			}
		}

		if ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() || $has_shortcode ) {

			$options = apply_filters( 'arte_theme_mods', array() );

			$color_text				= new ArteColor( get_theme_mod('color_text', $options['color_text']['default'] ) );
			$color_link 			= new ArteColor( get_theme_mod('color_links', $options['color_links']['default'] ) );
			$color_primary 		    = new ArteColor( get_theme_mod('color_primary', $options['color_primary']['default'] ) );
			$color_bg 				= new ArteColor( get_theme_mod('color_bg', $options['color_bg']['default'] ) );

			$css = "
				.woocommerce span.onsale{
					background-color: $color_primary;
					color: {$color_bg};
				}
				.woocommerce ul.products li.product .price,
				.products .product .price .amount,
				.products .product .price,
				.added_to_cart.wc-forward::before,
				.star-rating,
				.summary .price,
				#ship-to-different-address input:checked + label > i:before,
				#createaccount:checked + label > i::before,
				#review_form .comment-form-rating .stars a.active {
					color: $color_primary;
				}
				.woocommerce-pagination .page-numbers li a,
				.woocommerce-pagination .page-numbers li span,
				.woocommerce-pagination .page-numbers li:last-of-type a,
				.woocommerce-pagination .page-numbers li:last-of-type span{
					border-color: {$color_text->opacity(0.25)};
					color: $color_primary;
				}
				.woocommerce-pagination .page-numbers li:hover a,
				.woocommerce-pagination .page-numbers li:hover span{
					background-color: {$color_text->opacity(0.1)};
					color: $color_text
				}
				.woocommerce-pagination .page-numbers span.current{
					background-color: $color_primary;
					color: {$color_bg};
					border-color: $color_primary;
				}
				.woocommerce-message .button{
					color: $color_primary !important;
				}
				.woocommerce-message .button::after{
					background-color: $color_primary;
					color: {$color_bg};
				}
				.commentlist .comment-meta,
				.summary .title{
					border-bottom: 1px solid {$color_text->opacity(0.1)};
				}
				.quantity .minus,
				.quantity .plus{
					background-color: {$color_text->opacity(0.25)};
					color: $color_link
				}
				.quantity .minus:hover,
				.quantity .plus:hover{
					background-color: {$color_text->opacity(0.45)};
				}
				.shop_table .actions{
					background-color: {$color_text->opacity(0.05)};
					color: $color_link;
				}

				#payment-details{
					background-color: {$color_text->opacity(0.1)};
				}
				#payment-details .product-name, #payment-details .product-total{
					color: $color_link;
				}
				.widget_shopping_cart_content .product_list_widget{
					border-color: $color_primary
				}
				.product_list_widget li,
				.widget_layered_nav ul li,
				.shop_table> tbody > tr > td,
				.woocommerce-checkout .order_details,
				.woocommerce-checkout .order_details li{
					border-color: {$color_text->opacity(0.1)};
				}
				.widget_shopping_cart_content .button,
				.woocommerce-checkout .login input[type=submit]{
					background-color: $color_primary;
					color: {$color_primary->contrast(1)};
					border-color: $color_primary;
				}
				.widget_shopping_cart_content .button:hover,
				.woocommerce-checkout .login input[type=submit]:hover{
					background-color: {$color_primary->darken(20)};
					border-color: {$color_primary->darken(20)};
				}
				.widget_price_filter .ui-slider-horizontal{
					background-color: {$color_text->opacity(0.25)};
				}
				.widget_price_filter .ui-slider-horizontal .ui-slider-range{
					background-color: $color_primary;
				}
				.widget_price_filter .ui-slider-horizontal .ui-slider-handle{
					border-color: $color_primary;
					background-color: $color_bg;
				}
				.widget_price_filter .button{
					color: $color_link;
				}
				.shop_table>thead>tr>th{
					border-color: $color_primary;
				}
				.checkout .chosen-single,
				.checkout .chosen-drop,
				#review_form .comment-form-rating .stars a{
					border-color: {$color_text->opacity(0.25)};
				}
				.checkout .chosen-drop{
					background-color: $color_bg;
				}
				.checkout .highlighted,
				.demo_store{
					background-color: $color_primary;
					color: {$color_primary->contrast(1)};
				}

				.woocommerce div.product .woocommerce-tabs ul.tabs li.active{
					color: $color_primary;
				}
				.checkout-button.button{
					background-color: $color_primary;
					color: $color_bg;
					border-color: $color_primary;
				}
				.order-review{
					background-color: {$color_primary->opacity(0.1)}
				}

				.woocommerce .add_to_cart_button.button,
				#reviews .comment-reply-title{
					color: {$color_primary};
				}
				.woocommerce .add_to_cart_button.button:hover{
					color: {$color_primary->darken()};
				}
			";

			wp_add_inline_style( 'arte-style', apply_filters( 'arte_minify_css', wp_specialchars_decode( $css ) ) );
		}
	}

}

/** Add WooCommerce Theme Support */
add_action( 'after_setup_theme', array( 'ArteWooCommerce', 'woocommerce_support' ) );

/** Check if WooCommerce is active before initialization */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	new ArteWooCommerce();
}

?>
