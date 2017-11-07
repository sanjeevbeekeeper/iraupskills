<?php

// remove-querystring.php
// This will remove the Remove query strings from static resources
// Beekeeper Design Studio
// 20 Sep 2017

function _remove_script_version( $src ){
    $parts = explode( '?', $src );
    return $parts[0];
    }
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );
?>
