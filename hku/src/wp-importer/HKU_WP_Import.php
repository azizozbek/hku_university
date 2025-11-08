<?php

namespace HKU\Theme;

use WP_Import;

class HKU_WP_Import extends WP_Import {
	/**
	 * Stores post_translations terms.
	 *
	 * @var array
	 */
	public $post_translations = array();

	/**
	 * Overrides WP_Import::process_terms to remap terms translations.
	 *
	 * @since 1.2
	 */
	public function process_terms() {
	}

	/**
	 * Overrides WP_Import::process_post to remap posts translations
	 * Also merges strings translations from the WXR file to the existing ones
	 *
	 * @since 1.2
	 */
	public function process_posts() {
        $activityPosts = array();

        $i = 0;
        foreach ( $this->posts as $post ) {
            if ( 'stm_event' == $post['post_type'] ) {
                $activityPosts[] = $post;
                $this->posts[$i]['post_type'] = PostTypeActivity::POST_TYPE;
            }
            $i++;
        }

        parent::process_posts();

        foreach ( $activityPosts as $post ) {
            $metaStartDate = null;
            $metaStartTime = null;
            $metaEndDate = null;
            $metaEndTime = null;
            $place = null;

            foreach ( $post['postmeta'] as $meta ) {
                switch ( $meta['key'] ) {
                    case 'stm_event_date_start' :
                        $metaStartDate = date('Y-m-d', $meta['value']);
                        delete_post_meta($post['post_id'], $meta['key']);
                        break;
                    case 'stm_event_date_end' :
                        $metaEndDate = date('Y-m-d', $meta['value']);
                        delete_post_meta($post['post_id'], $meta['key']);
                        break;
                    case 'stm_event_time_start' :
                        $metaStartTime = $meta['value'];
                        delete_post_meta($post['post_id'], $meta['key']);
                        break;
                    case 'stm_event_time_end' :
                        $metaEndTime = $meta['value'];
                        delete_post_meta($post['post_id'], $meta['key']);
                        break;
                    case 'stm_event_venue' :
                        $place = $meta['value'];
                        delete_post_meta($post['post_id'], $meta['key']);
                        break;
                }
            }

            $start = $metaStartDate . ' ' . $metaStartTime;
            $end = $metaEndDate . ' ' . $metaEndTime;

            add_post_meta($post['post_id'], 'hku_activity_start', $start);
            add_post_meta($post['post_id'], 'hku_activity_end', $end);
            add_post_meta($post['post_id'], 'hku_activity_place', $place);
            add_post_meta($post['post_id'], 'hku_activity_form', \HKU\Theme\ActivityFormsEnum::hybrid->value);
            add_post_meta($post['post_id'], 'hku_activity_type', \HKU\Theme\ActivityTypesEnum::seminar->value);
        }

    }

}
