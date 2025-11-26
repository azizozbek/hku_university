<?php
/**
 * Title: Get the latest news
 * Slug: hku/news
 * Categories: query
 * Block Types: core/query
 *
 */

$query = new WP_Query( array(
    'post_type'      => \HKU\Theme\PostTypeNews::POST_TYPE,
    'post_status' => 'publish',
    'posts_per_page' => 3,
) );

?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group <?php if(get_current_blog_id() === 1) { echo 'faded-bg'; } ?> " style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:heading -->
    <h2 class="news-header font-regular"><?php _e('Haberler', 'hku') ?></h2>
    <!-- /wp:heading -->

    <!-- wp:columns -->
    <div class="wp-block-columns">
        <?php
        // The Loop
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
                ?>

                <!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"default"}} -->
                <div class="wp-block-column hover-shadow rounded-border has-base-background-color" style="padding-top:0;padding-bottom:0">
                    <!-- wp:image {"id":127,"sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
                    <?php if(get_the_post_thumbnail_url()) : ?>
                        <figure class="wp-block-image size-full is-style-default">
                            <?php the_post_thumbnail(attr: ['class' => 'full-width news-image', 'title' => get_the_title()]); ?>
                        </figure>
                    <?php else: ?>
                        <figure class="wp-block-image size-large is-resized">
                            <img src="<?php echo get_parent_theme_file_uri() . DIRECTORY_SEPARATOR . 'assets/images/news-default-min.jpg'; ?>" class="full-width" title="Hasan Kalyoncu University Default News Image" alt="Hasan Kalyoncu University Default News Image"/>
                        </figure>
                    <?php endif; ?>
                    <!-- /wp:image -->

                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"wrap"}} -->
                    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:heading {"level":4} -->
                        <h4 class="wp-block-heading font-regular"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                        <!-- /wp:heading -->
                        <!-- wp:columns -->
                        <div class="wp-block-columns is-not-stacked-on-mobile"><!-- wp:column -->
                            <div class="wp-block-column align-end"><!-- wp:paragraph {"fontSize":"small","textColor":"dark-red"} -->
                                <p class="news_date has-small-font-size has-dark-red-color"><?php echo wp_date('d F Y', get_post_time()); ?></p>
                                <!-- /wp:paragraph --></div>
                            <!-- /wp:column -->
                        </div>
                        <!-- /wp:columns -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->
                <?php
            }
        }
        /* Restore original Post Data */
        wp_reset_postdata();
        ?>

    </div>
    <!-- /wp:columns -->

    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--40)"><!-- wp:button -->
        <div class="wp-block-button">
            <a class="wp-block-button__link wp-element-button hover-white is-layout-flex is-vertically-aligned-center is-vertically-aligned-center gap-20" href="<?php echo get_post_type_archive_link(\HKU\Theme\PostTypeNews::POST_TYPE); ?>">
                <?php esc_html_e( 'Tüm Haberler', 'hku' ); ?>
                <svg width="20" height="12" viewBox="0 0 12 6" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.67329 2.33334H0.666626V3.66668H8.67329V5.66668L11.3333 3.00001L8.67329 0.333344V2.33334Z"/>
                </svg>
            </a>
        </div>
        <!-- /wp:button --></div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->