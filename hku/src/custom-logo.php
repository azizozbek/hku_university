<?php
add_filter( 'get_custom_logo', 'hku_custom_logo');
// Filter the output of logo to fix Googles Error about itemprop logo
function hku_custom_logo() {
    switch_to_blog(1);
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    if ( ! $custom_logo_id ) {

        restore_current_blog();
        return '';
    }

    $image = wp_get_attachment_image( $custom_logo_id, 'full', false, [
        'class' =>  'custom-logo',
    ]);
    restore_current_blog();

    $url = esc_url( home_url( '/' ) );

    return sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
        $url,
        $image
    );
}