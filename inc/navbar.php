<?php

/* ================================================
	Navbar children menu
    20 mar 2017
=================================================== */
	// get top ancestor iD for the services children. 23 dec 2016
	function get_top_ancestor_id() {
		// make the variable available globally
		global $post;
		// return the id of the top ancestor page relative to the current page.
		if ($post->post_parent){
			$ancestors = array_reverse(get_post_ancestors($post->ID));
			// return only the first value [0]
			return $ancestors[0];
			}

		//	if the current page does not have a parent page, return the id.
		return $post->ID;
		}
