<?php

namespace HKU\Theme;

use DateTime;

class PostTypeActivity
{
    public const string POST_TYPE = "hku_activity";

    public function __construct() {
        add_action( 'init', array( $this, 'register' ) );
        add_action( 'acf/include_fields', array( $this, 'generateFields' ) );
        add_filter('acf/validate_value/key=field_68ffdc8a6c155', array($this, 'customValidation'), 10, 4);
        add_filter('query_vars', array( $this, 'add_activity_vars' ));
        add_action('pll_init', array( $this, 'registerPolyLang' ) );
    }

    public function registerPolyLang()
    {
        pll_register_post_type(PostTypeActivity::POST_TYPE);
    }

    public function register() {
        $labels = array(
            'name' => __( 'Activity', 'hku' ),
            'singular_name' => __( 'Activity', 'hku' ),
            'add_new' => __( 'New Activity', 'hku' ),
            'add_new_item' => __( 'Add New Activity', 'hku' ),
            'edit_item' => __( 'Edit Activity', 'hku' ),
            'new_item' => __( 'New Activity', 'hku' ),
            'view_item' => __( 'View Activity', 'hku' ),
            'search_items' => __( 'Search Activity', 'hku' ),
            'not_found' =>  __( 'No Activity Found', 'hku' ),
            'not_found_in_trash' => __( 'No Activity found in Trash', 'hku' ),
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
            'rewrite'   => array( 'slug' => 'activity' ),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-megaphone',
            'map_meta_cap' => true,
            'capability_type' => 'activity-editor',
            'capabilities' => [
                'create_posts' => 'create_activity',
                'delete_others_posts' => 'delete_others_activity',
                'delete_posts' => 'delete_activity',
                'delete_private_posts' => 'delete_private_activity',
                'delete_published_posts' => 'delete_published_activity',
                'edit_posts' => 'edit_activity',
                'edit_others_posts' => 'edit_others_activity',
                'edit_private_posts' => 'edit_private_activity',
                'edit_published_posts' => 'edit_published_activity',
                'publish_posts' => 'publish_activity',
                'read_private_posts' => 'read_private_activity',
                'read' => 'read_activity',
            ],
        );

        register_post_type( \HKU\Theme\PostTypeActivity::POST_TYPE, $args );
    }

    public function generateFields()
    {
        if ( ! function_exists( 'acf_add_local_field_group' ) ) {
            return;
        }

        acf_add_local_field_group( array(
            'key' => 'group_68fa8b1fe2ced',
            'title' => 'Detaylar',
            'fields' => array(
                array(
                    'key' => 'field_68fa8b203ee6c',
                    'label' => 'Başlangıç',
                    'name' => 'hku_activity_start',
                    'aria-label' => '',
                    'type' => 'date_time_picker',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'display_format' => 'F j, Y g:i a',
                    'return_format' => 'Y-m-d H:i:s',
                    'first_day' => 1,
                    'default_to_current_date' => 0,
                    'allow_in_bindings' => 0,
                ),
                array(
                    'key' => 'field_68ffdc8a6c155',
                    'label' => 'Bitiş',
                    'name' => 'hku_activity_end',
                    'aria-label' => '',
                    'type' => 'date_time_picker',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'display_format' => 'F j, Y g:i a',
                    'return_format' => 'Y-m-d H:i:s',
                    'first_day' => 1,
                    'default_to_current_date' => 0,
                    'allow_in_bindings' => 0,
                ),
                array(
                    'key' => 'field_68ffdc15dd71a',
                    'label' => 'Katılım Şekli',
                    'name' => 'hku_activity_form',
                    'aria-label' => '',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => ActivityFormsEnum::getAsArray(),
                    'default_value' => 'facetoface',
                    'return_format' => 'value',
                    'multiple' => 0,
                    'allow_null' => 0,
                    'allow_in_bindings' => 0,
                    'ui' => 0,
                    'ajax' => 0,
                    'placeholder' => '',
                    'create_options' => 0,
                    'save_options' => 0,
                ),
                array(
                    'key' => 'field_68ffdc15dd70f',
                    'label' => 'Etkinlik Türü',
                    'name' => 'hku_activity_type',
                    'aria-label' => '',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => ActivityTypesEnum::getAsArray(),
                    'default_value' => 'seminar',
                    'return_format' => 'value',
                    'multiple' => 0,
                    'allow_null' => 0,
                    'allow_in_bindings' => 0,
                    'ui' => 0,
                    'ajax' => 0,
                    'placeholder' => '',
                    'create_options' => 0,
                    'save_options' => 0,
                ),
                array(
                    'key' => 'field_68fa8b8e3ee6d',
                    'label' => 'Konum',
                    'name' => 'hku_activity_place',
                    'aria-label' => '',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'maxlength' => '',
                    'allow_in_bindings' => 0,
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'hku_activity',
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
            'show_in_rest' => 1,
            'display_title' => '',
        ) );

    }


    public function customValidation($valid, $value, $field, $input_name)
    {

        if( $valid !== true ) {
            return $valid;
        }

        if ($value == '') {

            return $valid;
        }

        $start = new DateTime($_POST['acf']["field_68fa8b203ee6c"]);
        $end = new DateTime($value);

        if ($start > $end) {

            return __( 'Bitis Tarihi Baslangic Tarihinden önce olamaz', 'hku' );
        }

        return $valid;
    }

    public function add_activity_vars($public_query_vars) {
        $public_query_vars[] = 'from';

        return $public_query_vars;
    }

}