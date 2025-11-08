<?php 
	 add_action( 'wp_enqueue_scripts', 'hku_faculty_enqueue_styles' );
	 function hku_faculty_enqueue_styles() {
 		  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
 		  }