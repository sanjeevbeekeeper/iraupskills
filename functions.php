<?php

/* ================================================
	PLUGIN: bootstrap_navwalker.php - 22 dec 2016
=================================================== */
	// Register Custom Navigation Walker.
    require_once('wp_bootstrap_navwalker.php');
    // Register Nav Menu
    register_nav_menus( array(
        'primary-menu' => __( 'Primary Menu', 'studiowebsite' ),
        'footer-menu' => __( 'Footer Menu', 'studiowebsite' ),
	));

require get_template_directory() . '/inc/css.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/blog.php';
require get_template_directory() . '/inc/navbar.php';
require get_template_directory() . '/inc/imagecompression.php';
require get_template_directory() . '/inc/widgets.php';
require get_template_directory() . '/inc/theme_support.php';
require get_template_directory() . '/inc/hide_version.php';
require get_template_directory() . '/inc/remove_emoji.php';
require get_template_directory() . '/inc/remove_metagenerator.php';
require get_template_directory() . '/inc/remove_dashboard_menus.php';
require get_template_directory() . '/inc/login_page.php';
