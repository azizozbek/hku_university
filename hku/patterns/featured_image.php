<?php
/**
 * Title: Get the featured image with title text
 * Slug: hku/featured_image
 * Categories: query
 * Block Types: core/query
 *
 */
    echo '<!-- wp:html --><figure class="wp-block-post-featured-image">';
        the_post_thumbnail(size: 'full', attr: ['title' => get_the_title(), 'alt' => get_the_title(), 'style' => 'width:100%;height:100%;object-fit:cover;']);
    echo '</figure><!-- /wp:html -->';
?>