<?php

function artbyrothstein_theme_support(){
    // Adds a dynamic title from Wordpress
    add_theme_support('title-tag');
    // Adds the ability to customize the logo on the backend admin area
    add_theme_support('custom-logo');
    // Adds the ability to add thumbnails to each post "Featured Image Section" (on tghe backend admin area)
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'artbyrothstein_theme_support');

function artbyrothstein_menus(){
    $locations = array(
        'primary' => "Primary Top Header",
        'footer' => "Footer Menu Items"
    );
    register_nav_menus($locations);
}

add_action('init', 'artbyrothstein_menus');

function artbyrothstein_register_styles(){
    $version = wp_get_theme() -> get( 'Version' );
    wp_enqueue_style('artbyrothstein-fonts-themify', get_template_directory_uri() . '/assets/css/fonts/themify-icons.css', array('artbyrothstein-style'), $version, 'all');
    wp_enqueue_style('artbyrothstein-media-queries', get_template_directory_uri() . '/assets/css/media.css', array('artbyrothstein-style'), $version, 'all');
    wp_enqueue_style('artbyrothstein-footer', get_template_directory_uri() . '/assets/css/footer.css', array('artbyrothstein-style'), $version, 'all');
    wp_enqueue_style('artbyrothstein-component-social', get_template_directory_uri() . '/assets/css/components/social.css', array('artbyrothstein-style'), $version, 'all');
    wp_enqueue_style('artbyrothstein-component-button', get_template_directory_uri() . '/assets/css/components/button.css', array('artbyrothstein-style'), $version, 'all');
    wp_enqueue_style('artbyrothstein-blog-nav', get_template_directory_uri() . '/assets/css/blog/nav.css', array('artbyrothstein-style'), $version, 'all');
    wp_enqueue_style('artbyrothstein-blog-meta', get_template_directory_uri() . '/assets/css/blog/meta.css', array('artbyrothstein-style'), $version, 'all');
    wp_enqueue_style('artbyrothstein-blog-comments', get_template_directory_uri() . '/assets/css/blog/comments.css', array('artbyrothstein-style'), $version, 'all');
    wp_enqueue_style('artbyrothstein-content', get_template_directory_uri() . '/assets/css/content.css', array('artbyrothstein-style'), $version, 'all');
    wp_enqueue_style('artbyrothstein-main', get_template_directory_uri() . '/assets/css/main.css', array('artbyrothstein-style'), $version, 'all');
    wp_enqueue_style('artbyrothstein-header', get_template_directory_uri() . '/assets/css/header.css', array('artbyrothstein-style'), $version, 'all');
    wp_enqueue_style('artbyrothstein-style', get_template_directory_uri() . "/style.css", array('artbyrothstein-bootstrap'), $version, 'all');
    wp_enqueue_style('artbyrothstein-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('artbyrothstein-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
}

add_action('wp_enqueue_scripts', 'artbyrothstein_register_styles');

function artbyrothstein_register_scripts(){
    $version = wp_get_theme() -> get( 'Version' );
    wp_enqueue_script('artbyrothstein-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', true);
    wp_enqueue_script('artbyrothstein-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.16.0', true);
    wp_enqueue_script('artbyrothstein-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), '4.4.1', true);
    wp_enqueue_script('artbyrothstein-script', get_template_directory_uri() . "/assets/js/main.js", $version, array('artbyrothstein-jquery', 'artbyrothstein-popper', 'artbyrothstein-bootstrap'), true);
}

add_action('wp_enqueue_scripts', 'artbyrothstein_register_scripts');

function artbyrothstein_widget_areas(){
    register_sidebar(
        array(
            'before_title' => '<h2>',
            'after_title' => '</h2>',
            'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
            'after_widget' => '</ul>',
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'desription' => 'Sidebar Widget Area'
        )
    );

    register_sidebar(
        array(
            'before_title' => '<h2>',
            'after_title' => '</h2>',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Footer Area',
            'id' => 'footer-1',
            'desription' => 'Footer Widget Area'
        )
    );

    register_sidebar(
        array(
            'before_title' => '<h2>',
            'after_title' => '</h2>',
            'before_widget' => '<div class="textwidget">',
            'after_widget' => '</div>',
            'name' => 'Footer Info Area',
            'id' => 'footer-2',
            'desription' => 'Footer Info Widget Area'
        )
    );

    register_sidebar(
        array(
            'before_title' => '<h2>',
            'after_title' => '</h2>',
            'before_widget' => '<div class="textwidget">',
            'after_widget' => '</div>',
            'name' => 'Footer Address Area',
            'id' => 'footer-3',
            'desription' => 'Footer Address Widget Area'
        )
    );

    register_sidebar(
        array(
            'before_title' => '<h2>',
            'after_title' => '</h2>',
            'before_widget' => '<div class="textwidget">',
            'after_widget' => '</div>',
            'name' => 'Footer Legal Links Area',
            'id' => 'footer-4',
            'desription' => 'Footer Legal Links Widget Area'
        )
    );
}

add_action('widgets_init', 'artbyrothstein_widget_areas');
?>