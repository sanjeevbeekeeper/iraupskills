<?php

/* =================================================
    Remove metatag 'generator' from the header
    30 aug 2017
==================================================== */

    // Remove metatag 'generator' from the header
    function temple_remove_metaversion(){
        return '';
        }
    add_filter('the_generator', 'temple_remove_metaversion');
