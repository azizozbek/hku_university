<?php

/**
 * NOT IN USE YET
 * sync patterns across the multi network
 *
 */

add_action( 'publish_wp_block', 'hku_sync_reusable_blocks', 25, 2 );
function hku_sync_reusable_blocks( $post_id, $post ) {

    // for unsynced patterns
    $sync_status = get_post_meta( $post_id, 'wp_pattern_sync_status', true );

    $site_ids = get_sites(
        array(
            'fields' => 'ids',
            'site__not_in' => get_current_blog_id(),
            // also good to mention
            'archived' => 0,
            'deleted' => 0,
            'spam' => 0,
        )
    );
    // or you can just hardcode some specific site IDs like this
    // $site_ids = array( 22 );

    remove_action( 'publish_wp_block', __FUNCTION__, 25, 2 );

    foreach( $site_ids as $site_id ) {
        switch_to_blog( $site_id );

        $crossposted_block = get_page_by_title( $post->post_title, OBJECT, 'wp_block' );
        $query = new WP_Query([
            'post_title' => $post->post_title,
            'post_type' => 'wp_block',
            ]);

        if( $crossposted_block ) {
            $crossposted_block_id = wp_update_post(
                array(
                    'ID' => $crossposted_block->ID,
                    'post_content' => $post->post_content,
                )
            );
        } else {
            $crossposted_block_id = wp_insert_post(
                array(
                    'post_type' => 'wp_block',
                    'post_content' => $post->post_content,
                    'post_title' => $post->post_title,
                    'comment_status' => 'closed',
                    'ping_status' => 'closed',
                    'post_status' => 'publish',
                )
            );
        }

        if (!is_wp_error( $crossposted_block_id )) {
            if( 'unsynced' === $sync_status ) {
                update_post_meta( $crossposted_block_id, 'wp_pattern_sync_status', 'unsynced' );
            }
        }

        restore_current_blog();
    }

    add_action( 'publish_wp_block', __FUNCTION__, 25, 2 );

}
