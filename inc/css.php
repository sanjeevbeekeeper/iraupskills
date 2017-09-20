<?php
// Beekeeper Design Studio
// inc/css.php
// 2017-08-23

function enqueue_theme_css() {
    wp_enqueue_style(
        'default',
        get_template_directory_uri() . '/lib/styles/main.min.css'
        );
    }
add_action( 'wp_enqueue_scripts', 'enqueue_theme_css' );
 ?>
