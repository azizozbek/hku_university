<?php
/**
 * Title: Search Result
 * Slug: hku/searchresult
 * Categories: header
 *
 */

global $query_string;
$page = get_query_var('page');

wp_parse_str( $query_string, $search_query );
$search_query = array_merge($search_query, [
        'paged' => $page,
        'posts_per_page'    => 10,
    ]);

$search = new WP_Query( $search_query );

function highlight_results($text) {
    $sr = get_query_var('s');

    $keys = explode(' ', $sr);
    $keys = array_filter($keys);
    $text = preg_replace('/('.implode('|', $keys) .')/iu', '<span style="background-color: yellow">'.$sr.'</span>', $text);
    $pos = strpos($text, $sr);
    if ($pos !== false) {
        $start = (($pos-100) > 0) ? ($pos-100) : $pos-40;
        return '...' . substr($text, $start, strlen($sr)+100) . '...';
    }
    return false;
}

function renderTitle($key)
{
    switch ($key) {
        case \HKU\Theme\PostTypeActivity::POST_TYPE:
            _e('Etkinlikler', 'hku');
            break;
        case \HKU\Theme\PostTypeNews::POST_TYPE:
            _e('Haberler', 'hku');
            break;
        default:
            _e('Sayfalar', 'hku');
    }
}

$posts = [];
foreach ($search->posts as $post) {
    $posts[$post->post_type][] = $post;
}

?>

<div class="search-result has-global-padding">
    <ul class="search-types">
        <?php foreach ($posts as $key => $post) :?>
            <h2><?php renderTitle($key) ?></h2>
            <ul>
                <?php foreach ($post as $item) : ?>
                    <li>
                        <a href="<?php echo get_the_permalink($item) ?>"><?php echo $item->post_title; ?></a>
                        <span><?php echo highlight_results(wp_strip_all_tags( $item->post_content)); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endforeach; ?>
     </ul>
    <?php  ?>
    <div class="pagination">
        <?php
        echo paginate_links( array(
            'total'        => $search->max_num_pages,
            'current'      => max( 1, $page ),
            'format'       => '?page=%#%',
            'show_all'     => false,
            'type'         => 'plain',
            'end_size'     => 2,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer', 'hku' ) ),
            'next_text'    => sprintf( '%1$s <i></i>', __( 'Older', 'hku' ) ),
            'add_args'     => false,
            'add_fragment' => '',
        ) );
        ?>
    </div>
</div>
