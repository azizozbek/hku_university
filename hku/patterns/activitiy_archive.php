<?php
/**
 * Title: List all activities
 * Slug: hku/activity_archive
 * Categories: query
 * Block Types: core/query
 *
 */

$from = get_query_var('from');
$page = get_query_var('page');

$filter = array(
    'hku_activity_end' => array(
        'key' => 'hku_activity_end',
        'value' => date('Y-m-d H:i:s'),
        'type' => 'date',
        'compare' => '>=',
    ),
);

if ($from === 'past') {
    $filter = array(
        'relation' => 'AND',
        'hku_activity_start' => array(
            'key' => 'hku_activity_start',
            'value' => date('Y-m-d H:i:s'),
            'type' => 'date',
            'compare' => '<',
        ),
        'hku_activity_end' => array(
            'key' => 'hku_activity_end',
            'value' => date('Y-m-d H:i:s'),
            'type' => 'date',
            'compare' => '<',
        ),
    );
}

$args = array(
    'post_type' => \HKU\Theme\PostTypeActivity::POST_TYPE,
    'post_status' => 'publish',
    'posts_per_page'    => 10,
    'meta_query' => $filter,
    'orderby' => array(
        'hku_activity_start' => 'ASC',
        'hku_activity_end' => 'DESC'
    ),
    'paged' => $page,
);


$query = new WP_Query( $args );

?>

<div class="activities">
    <?php
    // The Loop
    if ( $query->have_posts() ) :
    while ( $query->have_posts() ) : $query->the_post();
        $start = new \DateTimeImmutable(get_field('hku_activity_start'));
        $form = \HKU\Theme\ActivityFormsEnum::tryFrom(get_field('hku_activity_form'))->getTranslatedValue();
    ?>
        <div class="activity_card <?php if(!has_post_thumbnail()) { echo 'top-gap'; } ?>">
            <?php the_post_thumbnail(attr: ['class' => 'image', 'title' => get_the_title()]); ?>
            <div class="activity_details">
                <span class="date">
                    <strong class="day"><?php echo $start->format('d'); ?></strong>
                    <span class="font-small"><?php echo $start->format('F'); ?></span>
                </span>
                <h4 class="font-regular text-center title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
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

