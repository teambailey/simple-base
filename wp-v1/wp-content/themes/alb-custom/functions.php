<?php

function alb_theme_styles() {

    wp_enqueue_style( 'normalize_css', get_template_directory_uri() . '/css/normalize.css' );
    wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'alb_theme_styles' );


function alb_theme_js() {

    wp_enqueue_script( 'modernizer_js', get_template_directory_uri() . '/js/modernizer.js', '', '', false );
    wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/app.js', array('jquery'), '', true );

}
add_action( 'wp_enqueue_scripts', 'alb_theme_js' );

?>