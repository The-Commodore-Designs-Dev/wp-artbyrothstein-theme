<?php

/** Set Content Width */
if (!isset($content_width)) {
    $content_width = 660;
}

/** WP Actions */
add_action('wp_enqueue_scripts', 'arte_register_assets');
add_action('after_setup_theme', 'arte_menu_setup');
add_action('after_setup_theme', 'arte_theme_support');
add_action('after_setup_theme', 'arte_theme_localization');
add_action('widgets_init', 'arte_sidebars');
add_action('init', 'arte_add_excerpts_to_pages');
add_action('admin_init', 'arte_add_editor_styles');

/** WP Filters */
add_filter('excerpt_length', 'arte_excerpt_length', 999);
add_filter('the_content_more_link', 'arte_modify_read_more_link');

/** Curly Actions */
add_action('arte_toolbar', 'arte_get_toolbar_text');

/* if (!function_exists('setup')) :
    function setup()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_image_size('team', 400, 400, array('center', 'center'));
    }
endif; */

/* function boilerplate_load_assets()
{
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', '3.7.1', true);
    wp_enqueue_script('vcgrid', get_theme_file_uri('/assets/js/vc_grid.min.js'), '1.0', true);
    wp_enqueue_script('jscomposer', get_theme_file_uri('/assets/js/js_composer_front.min.js'), '1.0', true);
    wp_enqueue_script('waypointsjs', get_theme_file_uri('/assets/js/waypoints.min.js'), '1.0', true);
    wp_enqueue_script('jqueryprettyphotojs', get_theme_file_uri('/assets/js/jquery.prettyPhoto.min.js'), '1.0', true);
    wp_enqueue_script('jquerythemepunchrevolutionjs', get_theme_file_uri('/assets/js/jquery.themepunch.revolution.min.js'), '1.0', true);
    wp_enqueue_script('jquerythemepunchtoolsjs', get_theme_file_uri('/assets/js/jquery.themepunch.tools.min.js'), '1.0', true);
    wp_enqueue_script('owlcarouselminjs', get_theme_file_uri('/assets/js/owl.carousel.min.js'), '1.0', true);
    wp_enqueue_script('scriptsminjs', get_theme_file_uri('/assets/js/scripts-min.js'), '1.0', true);
    wp_enqueue_script('ourmainjs', get_theme_file_uri('/frontend/build/index.js'), array('wp-element'), '1.0', true);
    wp_enqueue_style('themify', 'https://db.onlinewebfonts.com/c/f93da376ceb535ea82334cf2854fc62f?family=themify', '1.0', true);
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.15.4/css/all.css', '5.15.4', true);
    wp_enqueue_style('prettyphotostyles', get_theme_file_uri('/assets/css/prettyPhoto.min.css'));
    wp_enqueue_style('jscomposerstyles', get_theme_file_uri('/assets/css/js_composer.min.css'));
    wp_enqueue_style('revsliderstyles', get_theme_file_uri('/assets/css/revslider/settings.css'));
    wp_enqueue_style('animatestyles', get_theme_file_uri('/assets/css/animate.min.css'));
    wp_enqueue_style('owlcarouselstyles', get_theme_file_uri('/assets/css/owl.carousel.min.css'));
    wp_enqueue_style('owlstyles', get_theme_file_uri('/assets/css/owl.min.css'));
    wp_enqueue_style('otherstyles', get_theme_file_uri('/assets/css/style.css'));
    wp_enqueue_style('ourmaincss', get_theme_file_uri('/frontend/build/index.css'));
} */

function scripts_header()
{
    //wp_enqueue_style('init', get_stylesheet_uri());
}

function scripts_footer()
{
    //wp_enqueue_script('init', get_template_directory_uri().'/js/init.js', array('jquery'), '1.0.0', true);
}

//add_action('after_setup_theme', 'setup');
//add_action('wp_enqueue_scripts', 'scripts_header');
//add_action('wp_enqueue_scripts', 'boilerplate_load_assets');
//add_action('wp_footer', 'scripts_footer');

function arte_add_editor_styles()
{
    add_editor_style('editor-style.css');
}


function arte_add_excerpts_to_pages()
{
    add_post_type_support('page', 'excerpt');
}

function arte_modify_read_more_link()
{
    return sprintf('<a href="$s" title="$s" class="btn btn-sm btn-link more-link">$s</a>', get_the_permalink(), get_the_title(), esc_html__('Read More', 'arte'));
}


function arte_get_toolbar_text()
{
    if (function_exists('icl_get_languages') && !wp_validate_boolean(esc_attr(get_theme_mod('wpml')))) {
        return;
    }
    $toolbar_text = wp_kses_post(get_theme_mod('toolbar'));
    if (!empty($toolbar_text)) {
        echo do_shortcode($toolbar_text);
    }
}
function arte_theme_localization()
{
    load_theme_textdomain('arte', get_template_directory() . '/languages');
}

function arte_excerpt_length()
{
    return 60;
}

function arte_register_assets()
{

    wp_enqueue_script(
        'jquery-waypoints',
        get_template_directory_uri() . '/dev/libs/waypoints/jquery.waypoints.min.js',
        array('jquery'),
        '4.0.0',
        true
    );

    wp_enqueue_script(
        'jquery-waypoints-sticky',
        get_template_directory_uri() . '/dev/libs/waypoints/sticky.min.js',
        array('jquery', 'jquery-waypoints'),
        '4.0.0',
        true
    );

    wp_enqueue_script(
        'jquery-imagefill',
        get_template_directory_uri() . '/dev/libs/imagefill/jquery-imagefill.js',
        array('jquery'),
        '1.0',
        true
    );

    wp_enqueue_script(
        'jquery-magnific-popup',
        get_template_directory_uri() . '/dev/libs/magnific/jquery.magnific-popup.min.js',
        array('jquery'),
        '1.1.0',
        true
    );

    wp_enqueue_script(
        'owl-carousel',
        get_template_directory_uri() . '/dev/libs/owl-carousel/owl.carousel.min.js',
        array('jquery'),
        '2.1.6',
        true
    );

    wp_enqueue_script(
        'jquery-sticky-kit',
        get_template_directory_uri() . '/dev/libs/sticky-kit/jquery.sticky-kit.min.js',
        array('jquery', 'jquery-waypoints'),
        '1.1.2',
        true
    );


    wp_enqueue_script(
        'arte-scripts',
        get_template_directory_uri() . '/assets/front/js/scripts-min.js',
        array('jquery', 'jquery-masonry', 'jquery-waypoints', 'jquery-waypoints-sticky', 'jquery-imagefill', 'jquery-magnific-popup', 'owl-carousel'),
        wp_validate_boolean(WP_DEBUG) ? null : '1.2.7.5',
        true
    );

    wp_localize_script('arte-scripts', 'arte_theme_data', array(
        'menu' => array(
            'sticky' => wp_validate_boolean(esc_attr(get_theme_mod('navigation_sticky')))
        )
    ));

    if (is_singular()) {
        wp_enqueue_script("comment-reply");
    }


    wp_enqueue_style(
        'arte-style',
        get_stylesheet_uri(),
        null,
        wp_validate_boolean(WP_DEBUG) ? rand() : '1.2.7.6',
        'all'
    );
}

function arte_menu_setup()
{
    register_nav_menu('main_navigation',  esc_html__('Main Navigation', 'arte'));
    register_nav_menu('footer_navigation',  esc_html__('Footer Navigation', 'arte'));
}



function arte_sidebars()
{
    if (function_exists('register_sidebar')) {
        register_sidebar(array(
            'name'                      => esc_html__('Blog Widgets Area', 'arte'),
            'description'      => esc_html__('This sidebar is visible on the right side of the screen, on all blog pages of your website.', 'arte'),
            'id'                           => 'sidebar_blog',
            'before_widget'     => '<aside id="%1$s" class="sidebar-widget %2$s animated">',
            'after_widget'      => '</aside>',
            'before_title'     => '<h4 class="widget-title color-primary">',
            'after_title'          => '</h4>',
        ));
        register_sidebar(array(
            'name'                      => esc_html__('Pages Widget Area', 'arte'),
            'description'      => esc_html__('This sidebar is visible on the left or right side of the screen, on pages which use a page template with sidebar.', 'arte'),
            'id'                          => 'sidebar_page',
            'before_widget'     => '<aside id="%1$s" class="sidebar-widget %2$s">',
            'after_widget'      => '</aside>',
            'before_title'     => '<h4 class="widget-title color-primary">',
            'after_title'          => '</h4>',
        ));
        register_sidebar(array(
            'name'                      => esc_html__('Footer Widget Area', 'arte'),
            'description'      => esc_html__('This sidebar is visible on all pages of your website, in the footer area.', 'arte'),
            'id'                          => 'footer_widget_area',
            'before_widget'     => '<aside id="%1$s" class="col-sm-3 sidebar-widget %2$s">',
            'after_widget'      => '</aside>',
            'before_title'     => '<h5 class="widget-title color-primary">',
            'after_title'          => '</h5>',
        ));
    }
}


function arte_theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails', array('post', 'page'));
    add_theme_support('automatic-feed-links');
    add_theme_support('custom-background');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
    add_theme_support('post-formats', array('aside', 'gallery', 'chat', 'link', 'image', 'quote', 'status', 'video', 'audio'));
    add_theme_support('custom-header', array(
        'random-default'        => true,
        'width'             => 1920,
        'height'            => 1080,
        'flex-height'       => true,
        'flex-width'        => true,
        'header-text'       => true,
        'uploads'           => true
    ));
}

/* Framework */
require_once(trailingslashit(get_template_directory()) . 'inc/framework/class.helpers.php');
require_once(trailingslashit(get_template_directory()) . 'inc/framework/class.customizer.php');
require_once(trailingslashit(get_template_directory()) . 'inc/framework/class.typography.php');
require_once(trailingslashit(get_template_directory()) . 'inc/framework/class.color.php');
require_once(trailingslashit(get_template_directory()) . 'inc/framework/class.heading.php');
require_once(trailingslashit(get_template_directory()) . 'inc/framework/class.comments.php');
require_once(trailingslashit(get_template_directory()) . 'inc/framework/class.vc.extend.php');
require_once(trailingslashit(get_template_directory()) . 'inc/framework/class.woo.php');
require_once(trailingslashit(get_template_directory()) . 'inc/framework/class.wpml.php');
require_once(trailingslashit(get_template_directory()) . 'inc/framework/class.plugins.php');

/* Defaults */
require_once(trailingslashit(get_template_directory()) . 'inc/defaults/mods.php');
require_once(trailingslashit(get_template_directory()) . 'inc/defaults/ips.php');
require_once(trailingslashit(get_template_directory()) . 'inc/defaults/renders.php');

require_once(trailingslashit(get_template_directory()) . 'inc/extend.wcs.php');
