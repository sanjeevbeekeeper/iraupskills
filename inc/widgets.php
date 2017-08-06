<?php
/* =================================================
    ACTIVATE: Sidebar
==================================================== */
function beekeeperstudio_sidebar() {
    // first sidebar
    register_sidebar( array(
        'name'            => __( 'Events Widget', 'iraupskillsevent' ),
        'id'		  => 'sidebar-top',
        'description'	  => 'Enter some description here.',
        'class'           => '',
        'before_widget'   => '<div>',
        'after_widget'    => '</div>',
        'before_title'    => '<h4>',
        'after_title'     => '</h4>',
        ));
    // first sidebar ends
    }
add_action( 'widgets_init', 'beekeeperstudio_sidebar' );
?>
