<?php
function register_nav()
{
    register_nav_menus(
        array(
            'header' => __('Header', 'artbyrothstein')
        )
    );

    register_nav_menus(
        array(
            'footer' => __('Footer', 'artbyrothstein')
        )
    );

    register_nav_menus(
        array(
            '404' => __('404', 'artbyrothstein')
        )
    );
}

if (!function_exists('setup')):
    function setup()
    {
        register_nav();
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_image_size('team', 400, 400, array('center', 'center'));
    }
endif;

function boilerplate_load_assets()
{
    wp_enqueue_script('ourmainjs', get_theme_file_uri('/frontend/build/index.js'), array('wp-element'), '1.0', true);
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
