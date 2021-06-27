<?php

function skola_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

}
add_action('after_setup_theme', 'skola_theme_support');

function skola_theme_styles() {
    wp_enqueue_style('owl_carousel_css', get_template_directory_uri() . '/css/owl.carousel.min.css');
    wp_enqueue_style('owl_theme_default_css', get_template_directory_uri() . '/css/owl.theme.default.min.css');
    wp_enqueue_style('style_css', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'skola_theme_styles');

function skola_theme_js() {
    wp_enqueue_script('owl_carousel_js', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '', true);
    wp_enqueue_script('main_js', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'skola_theme_js');

function widgeti() {
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'before_widget' => '<div class="widget shadow-lg">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => 'Footer 1',
        'id' => 'footer-1',
        'before_widget' => '<div class="col-md-3">',
        'after_widget' => '</div>'

    ));

    register_sidebar(array(
        'name' => 'Footer 2',
        'id' => 'footer-2',
        'before_widget' => '<div class="col-md-3">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'

    ));

    
    register_sidebar(array(
        'name' => 'Footer 3',
        'id' => 'footer-3',
        'before_widget' => '<div class="col-md-3">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'

    ));

    register_sidebar(array(
        'name' => 'Footer 4',
        'id' => 'footer-4',
        'before_widget' => '<div class="col-md-3">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'

    ));

    register_sidebar(array(
        'name' => 'Footer 5',
        'id' => 'footer-5',
        'before_widget' => '<article class="container pt-5 text-center">',
        'after_widget' => '</article>',

    ));
}
add_action('widgets_init', 'widgeti');