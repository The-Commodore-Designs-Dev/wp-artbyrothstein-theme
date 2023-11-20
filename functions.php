<?php

if (!function_exists('setup')) :
    function setup()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_image_size('team', 400, 400, array('center', 'center'));
    }
endif;

function boilerplate_load_assets()
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
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.15.4/css/all.css', '5.15.4', true);
    wp_enqueue_style('jscomposerstyles', get_theme_file_uri('/assets/css/js_composer.min.css'));
    wp_enqueue_style('revsliderstyles', get_theme_file_uri('/assets/css/revslider/settings.css'));
    wp_enqueue_style('animatestyles', get_theme_file_uri('/assets/css/animate.min.css'));
    wp_enqueue_style('owlcarouselstyles', get_theme_file_uri('/assets/css/owl.carousel.min.css'));
    wp_enqueue_style('owlstyles', get_theme_file_uri('/assets/css/owl.min.css'));
    wp_enqueue_style('otherstyles', get_theme_file_uri('/assets/css/style.css'));
    wp_enqueue_style('ourmaincss', get_theme_file_uri('/frontend/build/index.css'));
}

function scripts_header()
{
    wp_enqueue_style('init', get_stylesheet_uri());
}

function scripts_footer()
{
    //wp_enqueue_script('init', get_template_directory_uri().'/js/init.js', array('jquery'), '1.0.0', true);
}

add_action('after_setup_theme', 'setup');
add_action('wp_enqueue_scripts', 'scripts_header');
add_action('wp_enqueue_scripts', 'boilerplate_load_assets');
//add_action('wp_footer', 'scripts_footer');
