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
    'posts_per_page' => 6,
) );

$defaultImg = get_parent_theme_file_uri() . DIRECTORY_SEPARATOR . 'assets/images/news-default-min.jpg';

?>
<div class="embla news is-layout-constrained has-global-padding  <?php if(get_current_blog_id() === 1) { echo 'faded-bg'; } ?>">
    <!-- wp:heading -->
    <h2 class="news-header font-regular"><?php _e('Haberler', 'hku') ?></h2>
    <!-- /wp:heading -->
    <div class="embla__viewport">
        <div class="embla__container">
            <?php
            // The Loop
            if ( $query->have_posts() ) :
                while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="embla__slide">
                        <div class="embla__lazy-load slider-card rounded-border">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <span class="embla__lazy-load__spinner"></span>
                            <?php endif; ?>
                            <!-- wp:image {"id":127,"sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
                            <?php if(get_the_post_thumbnail_url()) : ?>
                                <figure class="wp-block-image size-full is-style-default">
                                    <?php the_post_thumbnail(attr: ['class' => 'full-width embla__slide__img embla__lazy-load__img', 'title' => get_the_title(), 'data-src' => $defaultImg]); ?>
                                </figure>
                            <?php else: ?>
                                <figure class="wp-block-image size-large is-resized">
                                    <img src="<?php echo $defaultImg; ?>" class="full-width" title="Hasan Kalyoncu University Default Activity Image" alt="Hasan Kalyoncu University Default Activity Image"/>
                                </figure>
                            <?php endif; ?>
                            <!-- /wp:image -->
                            <a class="details horizontal-padding-20" href="<?php echo get_the_permalink() ?>">
                                <h4 class="font-regular no-vertical-padding no-vertical-margin"><?php echo the_title() ?></h4>
                                <!-- wp:columns -->
                                <div class="wp-block-columns is-not-stacked-on-mobile">
                                    <!-- wp:column -->
                                    <div class="wp-block-column align-end"><!-- wp:paragraph {"fontSize":"small","textColor":"dark-red"} -->
                                        <p class="news_date has-small-font-size has-dark-red-color"><?php echo wp_date('d F Y', get_post_time()); ?></p>
                                        <!-- /wp:paragraph --></div>
                                    <!-- /wp:column -->
                                </div>
                                <!-- /wp:columns -->
                            </a>

                        </div>
                    </div>
                    <?php
                endwhile;
            endif;
            /* Restore original Post Data */
            wp_reset_postdata();
            ?>
        </div>
    </div>
    <div class="embla__controls">
        <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--40)"><!-- wp:button -->
            <div class="wp-block-button">
                <a class="wp-block-button__link wp-element-button hover-white is-layout-flex is-vertically-aligned-center gap-20" href="<?php echo get_post_type_archive_link(\HKU\Theme\PostTypeNews::POST_TYPE); ?>">
                    <?php esc_html_e( 'Tüm Haberler', 'hku' ); ?>
                    <svg width="20" height="12" viewBox="0 0 12 6" fill="white" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.67329 2.33334H0.666626V3.66668H8.67329V5.66668L11.3333 3.00001L8.67329 0.333344V2.33334Z"/>
                    </svg>
                </a>
            </div>
            <!-- /wp:button --></div>
        <!-- /wp:buttons -->
        <div class="embla__dots"></div>
    </div>
</div>