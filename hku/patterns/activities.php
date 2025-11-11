<?php
/**
 * Title: Get the latest activities
 * Slug: hku/activities
 * Categories: query
 * Block Types: core/query
 *
 */

$args = array(
    'post_type' => \HKU\Theme\PostTypeActivity::POST_TYPE,
    'post_status' => 'publish',
    'posts_per_page'    => 8,
    'meta_query' => array(
        'relation' => 'OR',
        'hku_activity_start' => array(
            'key' => 'hku_activity_start',
            'value' => date('Y-m-d H:i:s'),
            'type' => 'date',
            'compare' => '>=',
        ),
        'hku_activity_end' => array(
            'key' => 'hku_activity_end',
            'value' => date('Y-m-d H:i:s'),
            'type' => 'date',
            'compare' => '>=',
        ),
    ),
    'orderby' => array(
        'hku_activity_start' => 'ASC',
        'hku_activity_end' => 'ASC',
    )
);

$query = new WP_Query( $args );

?>
<div class="embla activity is-layout-constrained has-global-padding">
    <!-- wp:heading -->
    <h2 class="activity-header font-regular"><?php _e('Aktiviteler', 'hku') ?></h2>
    <!-- /wp:heading -->
    <div class="embla__viewport">
        <div class="embla__container">
            <?php
            // The Loop
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    $start = new \DateTimeImmutable(get_field('hku_activity_start'));
                    ?>
                    <div class="embla__slide">
                        <div class="embla__lazy-load activity-card rounded-border">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <span class="embla__lazy-load__spinner"></span>
                            <?php endif; ?>
                            <?php the_post_thumbnail(attr: ['class' => 'full-width embla__slide__img embla__lazy-load__img', 'title' => get_the_title(), 'data-src' => "https://www.hku.edu.tr/wp-content/uploads/2018/12/hku-logo-colorful-tr.webp"]); ?>
                            <a class="details" href="<?php echo get_the_permalink() ?>">
                                <h4 class="title font-regular"><?php echo the_title() ?></h4>
                                <div class="info">
                                    <div class="date">
                                        <span><?php echo wp_date('d F Y', $start->getTimestamp()); ?></span>
                                    </div>
                                    <div class="time">
                                        <span><?php echo \HKU\Theme\ActivityFormsEnum::tryFrom(get_field('hku_activity_form'))->getTranslatedValue(); ?></span>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                    <?php
                }
            }
            /* Restore original Post Data */
            wp_reset_postdata();
            ?>
        </div>
    </div>
    <div class="embla__controls">
        <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--40)"><!-- wp:button -->
            <div class="wp-block-button">
                <a class="wp-block-button__link wp-element-button hover-white is-layout-flex is-vertically-aligned-center gap-20" href="<?php echo get_post_type_archive_link(\HKU\Theme\PostTypeActivity::POST_TYPE); ?>">
                    <?php esc_html_e( 'Tüm Aktiviteler', 'hku' ); ?>
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


