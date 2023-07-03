<?php

function artbyrothstein_theme_support(){
    // Adds a dynamic title from Wordpress
    add_theme_support('title-tag');
}

add_action('after_theme_setup', 'artbyrothstein_theme_support');

function artbyrothstein_menus(){
    $locations = array(
        'primary' => "Desktop Primary Top Header",
        'footer' => "Footer Menu Items"
    );
    rester_nav_menus($locations);
}

add_action('init', 'artbyrothstein_menus');

function artbyrothstein_register_styles(){
    $version = wp_get_theme() -> get( 'Version' );
    wp_enqueue_style('artbyrothstein-style', get_template_directory_uri()."/style.css", array('artbyrothstein-bootstrap'), $version, 'all');
    wp_enqueue_style('artbyrothstein-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('artbyrothstein-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
}

add_action('wp_enqueue_scripts', 'artbyrothstein_register_styles');

function artbyrothstein_register_scripts(){
    $version = wp_get_theme() -> get( 'Version' );
    wp_enqueue_script('artbyrothstein-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', true);
    wp_enqueue_script('artbyrothstein-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.16.0', true);
    wp_enqueue_script('artbyrothstein-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), '4.4.1', true);
    wp_enqueue_script('artbyrothstein-script', get_template_directory_uri()."/assets/js/main.js", $version, true);
}

add_action('wp_enqueue_scripts', 'artbyrothstein_register_scripts');
?>