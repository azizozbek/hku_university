<?php
/**
 * Title: List of posts, 1 column
 * Slug: hku/slider-query-loop
 * Categories: query
 * Block Types: core/query
 *
 */

$query = new WP_Query( array(
    'post_type'      => \HKU\Theme\PostTypeSlider::POST_TYPE,
    'posts_per_page' => 3,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'ASC',
) );
?>
<section class="embla home-slider is-layout-constrained">
    <div class="embla__viewport faded-border">
        <div class="embla__container">
            <?php
            // The Loop
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    ?>
                    <div class="embla__slide">
                        <div class="embla__lazy-load slider_image <?php if(get_field('url') != '') { echo 'has_link'; } ?>" data-url="<?php echo get_field('url') ?>">
                            <span class="embla__lazy-load__spinner"></span>
                            <?php the_post_thumbnail(attr: ['class' => 'full-width embla__slide__img embla__lazy-load__img', 'title' => get_the_title(), 'data-src' => "https://hku.edu.tr.ddev.site/wp-content/uploads/2025/10/hku-logo-colorful-tr.webp"]); ?>
                            <?php if (get_the_title() != "") : ?>
                                    <h3 class="slider_content no-vertical-margin "><?php the_title(); ?></h3>
                            <?php endif; ?>
                        </div>
                    </div>
            <?php
                    }
                }
                /* Restore original Post Data */
                wp_reset_postdata();
            ?>
        </div>
        <div class="home-slider embla__controls">
            <div class="embla__buttons">
                <button class="embla__button embla__button--prev" type="button">
                    <svg class="embla__button__svg" viewBox="0 0 532 532">
                        <path d="M355.66 11.354c13.793-13.805 36.208-13.805 50.001 0 13.785 13.804 13.785 36.238 0 50.034L201.22 266l204.442 204.61c13.785 13.805 13.785 36.239 0 50.044-13.793 13.796-36.208 13.796-50.002 0a5994246.277 5994246.277 0 0 0-229.332-229.454 35.065 35.065 0 0 1-10.326-25.126c0-9.2 3.393-18.26 10.326-25.2C172.192 194.973 332.731 34.31 355.66 11.354Z"></path>
                    </svg>
                </button>

                <button class="embla__button embla__button--next" type="button">
                    <svg class="embla__button__svg" viewBox="0 0 532 532">
                        <path d="M176.34 520.646c-13.793 13.805-36.208 13.805-50.001 0-13.785-13.804-13.785-36.238 0-50.034L330.78 266 126.34 61.391c-13.785-13.805-13.785-36.239 0-50.044 13.793-13.796 36.208-13.796 50.002 0 22.928 22.947 206.395 206.507 229.332 229.454a35.065 35.065 0 0 1 10.326 25.126c0 9.2-3.393 18.26-10.326 25.2-45.865 45.901-206.404 206.564-229.332 229.52Z"></path>
                    </svg>
                </button>
            </div>
            <!--<div class="embla__selected-snap-display">-</div>-->
        </div>
    </div>
</section>