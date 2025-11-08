<?php

namespace HKU\Theme;

class PostTypeSlider
{
    public const string POST_TYPE = "hku_slider";
    public function __construct() {
        add_action( 'init', array( $this, 'register' ) );
        add_action( 'acf/include_fields', array( $this, 'generateFields' ) );

    }

    public function register() {
        $labels = array(
            'name' => __( 'Slider', 'hku' ),
            'singular_name' => __( 'Slider', 'hku' ),
            'add_new' => __( 'New Slider', 'hku' ),
            'add_new_item' => __( 'Add New Slider', 'hku' ),
            'edit_item' => __( 'Edit Slider', 'hku' ),
            'new_item' => __( 'New Slider', 'hku' ),
            'view_item' => __( 'View Slider', 'hku' ),
            'search_items' => __( 'Search Slider', 'hku' ),
            'not_found' =>  __( 'No Slider Found', 'hku' ),
            'not_found_in_trash' => __( 'No Slider found in Trash', 'hku' ),
        );

        $args = array(
            'labels' => $labels,
            'has_archive' => true,
            'public' => true,
            'hierarchical' => false,
            'supports' => array(
                'title',
                'custom-fields',
                'thumbnail'
            ),
            'rewrite'   => array( 'slug' => 'slider' ),
            'show_in_rest' => false,
            'menu_icon' => 'dashicons-slides',
            'map_meta_cap' => true,
            'capability_type' => 'slider-editor',
            'capabilities' => [
                'create_posts' => 'create_slider',
                'delete_others_posts' => 'delete_others_slider',
                'delete_posts' => 'delete_slider',
                'delete_private_posts' => 'delete_private_slider',
                'delete_published_posts' => 'delete_published_slider',
                'edit_posts' => 'edit_slider',
                'edit_others_posts' => 'edit_others_slider',
                'edit_private_posts' => 'edit_private_slider',
                'edit_published_posts' => 'edit_published_slider',
                'publish_posts' => 'publish_slider',
                'read_private_posts' => 'read_private_slider',
                'read' => 'read_slider',
            ],
        );

        register_post_type( \HKU\Theme\PostTypeSlider::POST_TYPE, $args );
    }

    public function generateFields() {
        if ( ! function_exists( 'acf_add_local_field_group' ) ) {
            return;
        }

        acf_add_local_field_group( array(
            'key' => 'group_68ffd6e586a12',
            'title' => 'Slider',
            'fields' => array(
                array(
                    'key' => 'field_68ffd6e5c9e96',
                    'label' => 'URL',
                    'name' => 'url',
                    'aria-label' => '',
                    'type' => 'url',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'allow_in_bindings' => 0,
                    'placeholder' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => PostTypeSlider::POST_TYPE,
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
            'show_in_rest' => 0,
            'display_title' => '',
        ) );
    }

}