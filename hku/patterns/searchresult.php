<?php
/**
 * Title: Search Result
 * Slug: hku/searchresult
 * Categories: header
 *
 */

global $query_string;

wp_parse_str( $query_string, $search_query );
$search_query = array_merge($search_query);

$search = new WP_Query( $search_query );
$getAcademicPerson = new \HKU\Theme\GetAcademicPersonal();
$academicPersons = $getAcademicPerson->searchByName( get_query_var('s') );

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

$posts = [
    \HKU\Theme\PostTypeActivity::POST_TYPE => [],
    \HKU\Theme\PostTypeNews::POST_TYPE => [],
    'post' => [],
    'page' => []
];
foreach ($search->posts as $post) {
    $posts[$post->post_type][] = $post;
}
$emptyMessage = __('Bulunumadı', 'hku');
?>

<div class="search-result has-global-padding">
    <ul class="search-types">
        <h2 class="title"><?php _e('Etkinlikler', 'hku'); ?></h2>
        <?php
            if (count($posts[\HKU\Theme\PostTypeActivity::POST_TYPE]) == 0) {
                echo "<span>" . $emptyMessage . "</span>";
            }

            foreach ($posts[\HKU\Theme\PostTypeActivity::POST_TYPE] as $post) :?>
            <li>
                <a href="<?php echo get_the_permalink($post) ?>"><?php echo $post->post_title; ?></a>
                <span><?php echo highlight_results(wp_strip_all_tags( $post->post_content)); ?></span>
            </li>
        <?php endforeach; ?>

        <h2 class="title"><?php _e('Haberler', 'hku'); ?></h2>
        <?php
            if (count($posts[\HKU\Theme\PostTypeActivity::POST_TYPE]) == 0) {
                echo "<span>" . $emptyMessage . "</span>";
            }
            foreach ($posts[\HKU\Theme\PostTypeNews::POST_TYPE] as $post) :?>
            <li>
                <a href="<?php echo get_the_permalink($post) ?>"><?php echo $post->post_title; ?></a>
                <span><?php echo highlight_results(wp_strip_all_tags( $post->post_content)); ?></span>
            </li>
        <?php endforeach; ?>

        <h2 class="title"><?php _e('Sayfalar', 'hku'); ?></h2>
        <?php
            if (count($posts[\HKU\Theme\PostTypeActivity::POST_TYPE]) == 0) {
                echo "<span>" . $emptyMessage . "</span>";
            }
            foreach ($posts['page'] as $post) :?>
            <li>
                <a href="<?php echo get_the_permalink($post) ?>"><?php echo $post->post_title; ?></a>
                <span><?php echo highlight_results(wp_strip_all_tags( $post->post_content)); ?></span>
            </li>
        <?php endforeach; ?>

        <h2 class="title"><?php _e('Akademik Personeller', 'hku'); ?></h2>
        <?php
            if (count($academicPersons) == 0) {
                echo "<span>" . $emptyMessage . "</span>";
            }
        ?>
        <?php foreach ($academicPersons as $academicPerson) : ?>
            <li>
                <a class="academic" href="<?php echo $academicPerson['url'] ?>">
                    <img class="picture" src="<?php echo $academicPerson['picture'] ?>" alt="<?php echo $academicPerson['name']; ?>">
                    <div class="details">
                        <b><?php echo $academicPerson['name']; ?></b>
                        <span><?php echo $academicPerson['department'] ?></span>
                    </div>
                </a>

            </li>
        <?php endforeach; ?>
    </ul>
</div>
