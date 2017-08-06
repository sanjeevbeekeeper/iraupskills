<?php
// Image compression is set to 100% for blog images
// 28 mar 2017

add_filter('jpeg_quality', function($arg){return 100;});
