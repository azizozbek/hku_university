<?php
/**
 * Title: List all news
 * Slug: hku/news_archive
 * Categories: query
 * Block Types: core/query
 *
 */

$page = get_query_var('page');


$args = array(
    'post_type' => \HKU\Theme\PostTypeNews::POST_TYPE,
    'post_status' => 'publish',
    'posts_per_page'    => 10,
    'orderby' => array(
        'date' => 'ASC',
    ),
    'paged' => $page,
);


$query = new WP_Query( $args );
$defaultImg = get_parent_theme_file_uri() . DIRECTORY_SEPARATOR . 'assets/images/news-default-min.jpg';;
?>

<div class="activities">
    <?php
    // The Loop
    if ( $query->have_posts() ) :
    while ( $query->have_posts() ) : $query->the_post();
    ?>
        <div class="activity_card">
            <?php if(get_the_post_thumbnail_url()) : ?>
                <?php the_post_thumbnail(attr: ['class' => 'image', 'title' => get_the_title()]); ?>
            <?php else: ?>
                <img src="<?php echo $defaultImg; ?>" class="image image wp-post-image" title="Hasan Kalyoncu University Default Activity Image" alt="Hasan Kalyoncu University Default Activity Image"/>
            <?php endif; ?>
            <div class="activity_details">
                <h4 class="font-regular title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                <span class="news_date has-small-font-size has-dark-red-color horizontal-padding-20 vertical-padding-20 is-layout-flex"><?php echo  get_the_date(); ?></span>
            </div>
        </div>

    <?php
    endwhile;
    endif;
    ?>
    <?php
        wp_reset_postdata();
    ?>

</div>
<div class="pagination">
    <?php
    echo paginate_links( array(
        'total'        => $query->max_num_pages,
        'current'      => max( 1, $page ),
        'format'       => '?page=%#%',
        'show_all'     => false,
        'type'         => 'plain',
        'end_size'     => 2,
        'mid_size'     => 1,
        'prev_next'    => true,
        'prev_text'    => sprintf( '<i></i> %1$s', __( 'Yeni', 'hku' ) ),
        'next_text'    => sprintf( '%1$s <i></i>', __( 'Eski', 'hku' ) ),
        'add_args'     => false,
        'add_fragment' => '',
    ) );
    ?>
</div>

