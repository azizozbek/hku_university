<?php

if ( ! defined( 'WP_ALLOW_MULTISITE' ) ) {
    wp_trigger_error('', 'Multisite is now enabled. Contant Webmaster azizozbek.ch');
}

use HKU\Theme\AddFacultyOption;
use HKU\Theme\HKU_Integrations;
use HKU\Theme\PostTypeActivity;
use HKU\Theme\PostTypeNews;
use HKU\Theme\PostTypeSlider;

require_once get_template_directory() . '/class-tgm-plugin-activation.php';
require_once(get_template_directory() . '/autoloader.php');
require_once get_template_directory() . '/src/custom-logo.php';
require_once get_template_directory() . '/src/register_required_plugins.php';
require_once get_template_directory() . '/src/hku_crons.php';


add_action( 'after_setup_theme', 'hku_post_format_setup' );
function hku_post_format_setup() {
    add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
    add_theme_support( 'menus' );
}


add_action( 'wp_enqueue_scripts', 'hku_enqueue_styles' );
function hku_enqueue_styles() {
    wp_enqueue_style(
        'hku-style',
        get_parent_theme_file_uri( 'style.css' ),
        array(),
        2.7
    );
    wp_enqueue_style( 'dashicons' );
    wp_enqueue_script( 'hkuscripts', get_parent_theme_file_uri() . '/assets/js/scripts.js', array( 'jquery' ) );

    if (is_front_page()) {
        wp_enqueue_script( 'hku-embla', get_parent_theme_file_uri() . '/assets/js/embla-carousel.umd.js');
        wp_enqueue_script( 'hku-slider-lazy-load', get_parent_theme_file_uri() . '/assets/js/slide-lazy-load.js', [], '1.0', true );
        wp_enqueue_script( 'hku-slider-dots', get_parent_theme_file_uri() . '/assets/js/slider-dots.js', [], '1.0', true );
        if (get_current_blog_id() === 1) {
            wp_enqueue_script( 'hku-home-slider', get_parent_theme_file_uri() . '/assets/js/home-slider.js', [], '1.0', true );
        }
        wp_enqueue_script( 'hku-activity-slider', get_parent_theme_file_uri() . '/assets/js/activity-slider.js', [], '1.1', true );
    }
}

$news = new PostTypeNews();
$activity = new PostTypeActivity();
$slider = new PostTypeSlider();
$facultyOption = new AddFacultyOption();
//register custom wp import
HKU_Integrations::instance();


/*
 *
 function register_my_menus() {
    register_nav_menus(
        array(
            'header' => __( 'Main Header Menu' )
        )
    );
}
add_action( 'init', 'register_my_menus' );

function custom_repo_rewrite_rule() {
    add_rewrite_rule('^repo/([^/]+)/?', 'index.php?custom_repo=$matches[1]', 'top');
}
add_action('init', 'custom_repo_rewrite_rule');

function custom_repo_query_vars($query_vars) {
    $query_vars[] = 'custom_repo';
    return $query_vars;
}
add_filter('query_vars', 'custom_repo_query_vars');

///////////////

function custom_repo_template_include($template) {
    if (get_query_var('custom_repo')) {
        return get_template_directory() . '/repo-template.php';
    }
    return $template;
}
add_filter('template_include', 'custom_repo_template_include');

*/