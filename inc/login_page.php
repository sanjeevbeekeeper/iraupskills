<?php

/* ================================================
	CUSTOM LOGIN PAGE, 02 Sep 2017
=================================================== */

    // LOGIN: stylesheet link
    function my_custom_login() {
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/login_screen.min.css" />';
    }
    add_action('login_head', 'my_custom_login');

    // LOGIN: home url
    function my_login_logo_url() {
        return get_bloginfo( 'url' );
        }
    add_filter( 'login_headerurl', 'my_login_logo_url' );

    // LOGIN: title
    function my_login_logo_url_title() {
        return 'Ira-Upskills Ventures Login';
        }
    add_filter( 'login_headertitle', 'my_login_logo_url_title' );
 ?>
