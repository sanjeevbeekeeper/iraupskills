<?php
// Boostrap Styles and Scripts. 22 dec 2016
function bootstrap_style_script() {

    // ===== Deregister WordPress Default jQuery Script and Add custom jQuery in the footer
    wp_deregister_script( 'jquery' );
    wp_enqueue_script(
        'jquery',
        'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js',
        array(),
        '3.1.1',
        true
        );

    // bootstrap js
    wp_enqueue_script(
        'bootstrap',
        get_template_directory_uri() . '/lib/vendor/bootstrap/js/bootstrap.min.js',
        array('jquery'),
        '3.3.4',
        true
        );

    // bootstrap css
    wp_enqueue_style(
        'bootstrap',
        get_stylesheet_directory_uri() . '/lib/vendor/bootstrap/css/bootstrap.min.css',
        array(),
        '1.0.0',
        'all'
        );

    // Studio css
    wp_enqueue_style(
        'studiocss',
        get_stylesheet_directory_uri() . '/lib/styles/main.css',
        array(),
        '1.0.0',
        'all'
        );

    // fontawesome
    wp_enqueue_style(
        'fontawesome',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'
        );

    //slideshow for font-page js (24 jan 2017)
    wp_enqueue_script(
        'slideshow-script',	get_template_directory_uri() . '/lib/script/slideshow.js', array('jquery'), '1.0.0', true);
    }

add_action( 'wp_enqueue_scripts', 'bootstrap_style_script' );
