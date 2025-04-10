<?php
// filepath: c:\laragon\www\nhatansteel\src\wp-content\themes\flatsome-child\functions.php

// Enqueue parent theme styles
function flatsome_child_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'flatsome_child_enqueue_styles');