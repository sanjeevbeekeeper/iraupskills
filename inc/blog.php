<?php

/* ================================================
	Custom excerpt
    20 mar 2017
=================================================== */
	function BeekeeperDesignStudio_excerpt($more) {
	    global $post;
	    	return '<div><a class="btn-readme btn btn-default" href=" '. get_permalink($post->ID) . '"> Read more </a></div>';
		}
	add_filter('excerpt_more', 'BeekeeperDesignStudio_excerpt');

/* =================================================
    Activate: Featured image
    20 mar 2017
==================================================== */
	add_theme_support( 'post-thumbnails' );

/* =================================================
    Search Query: Search only on the Blog
    20 mar 2017
==================================================== */
	function customsearchFilter($query) {
		if ($query->is_search) {
			$query->set('post_type', 'post');
			}
		return $query;
		}
	add_filter('pre_get_posts','customsearchFilter');
