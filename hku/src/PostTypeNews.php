<?php

namespace HKU\Theme;

class PostTypeNews
{
    public const string POST_TYPE = "hku_news";
    public function __construct() {
        add_action( 'init', array( $this, 'register' ) );
        add_action('pll_init', array( $this, 'registerPolyLang' ) );

    }

    public function registerPolyLang()
    {
        pll_register_post_type(PostTypeNews::POST_TYPE);
    }

    public function register() {
        $labels = array(
            'name' => __( 'News', 'hku' ),
            'singular_name' => __( 'News', 'hku' ),
            'add_new' => __( 'New News', 'hku' ),
            'add_new_item' => __( 'Add New News', 'hku' ),
            'edit_item' => __( 'Edit News', 'hku' ),
            'new_item' => __( 'New News', 'hku' ),
            'view_item' => __( 'View News', 'hku' ),
            'search_items' => __( 'Search News', 'hku' ),
            'not_found' =>  __( 'No News Found', 'hku' ),
            'not_found_in_trash' => __( 'No News found in Trash', 'hku' ),
        );

        $args = array(
            'labels' => $labels,
            'has_archive' => true,
            'public' => true,
            'hierarchical' => false,
            'supports' => array(
                'title',
                'editor',
                'custom-fields',
                'thumbnail',
                'page-attributes'
            ),
            'taxonomies' => ['category', 'post_tag'],
            'rewrite'   => array( 'slug' => 'news' ),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-admin-site-alt3',
            'map_meta_cap' => true,
            'capability_type' => 'news-editor',
            'capabilities' => [
                'create_posts' => 'create_news',
                'delete_others_posts' => 'delete_others_news',
                'delete_posts' => 'delete_news',
                'delete_private_posts' => 'delete_private_news',
                'delete_published_posts' => 'delete_published_news',
                'edit_posts' => 'edit_news',
                'edit_others_posts' => 'edit_others_news',
                'edit_private_posts' => 'edit_private_news',
                'edit_published_posts' => 'edit_published_news',
                'publish_posts' => 'publish_news',
                'read_private_posts' => 'read_private_news',
                'read' => 'read_news',
            ],
        );

        register_post_type( \HKU\Theme\PostTypeNews::POST_TYPE, $args );
    }
}