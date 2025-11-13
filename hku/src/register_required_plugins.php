<?php

add_action( 'tgmpa_register', 'hku_register_required_plugins' );
function hku_register_required_plugins() {

    $plugins = array(
        array(
            'name'      => 'Polylang',
            'slug'      => 'polylang',
            'required'  => true,
        ),
        array(
            'name'      => 'Loco Translate',
            'slug'      => 'loco-translate',
            'required'  => true,
        ),
        array(
            'name'      => 'Members',
            'slug'      => 'members',
            'required'  => true,
        ),
        array(
            'name'      => 'ACF',
            'slug'      => 'advanced-custom-fields',
            'required'  => true,
        ),
        array(
            'name'      => 'Icon Block',
            'slug'      => 'icon-block',
            'required'  => true,
        ),
        array(
            'name'      => 'WordPress Importer',
            'slug'      => 'wordpress-importer',
            'required'  => true,
        ),
        array(
            'name'      => 'Duplicate Post',
            'slug'      => 'duplicate-post',
            'required'  => true,
        ),
    );

    $config = array(
        'id'           => 'hku',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );

    tgmpa( $plugins, $config );
}
