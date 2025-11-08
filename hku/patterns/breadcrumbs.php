<?php
/**
 * Title: Breadcrumbs
 * Slug: hku/breadcrumbs
 * Categories: query
 * Block Types: core/query
 *
 */


// faculty
$parent = get_blog_option(1, 'blogname') ;
$parent_url = get_blogaddress_by_id(1);

$facultyId = get_option(\HKU\Theme\AddFacultyOption::OPTION_NAME);

//department front
if ($facultyId != 0) {
    $parent = get_blog_option($facultyId, 'blogname') ;
    $parent_url = get_blogaddress_by_id($facultyId);
}

//department subpage
if ($facultyId != 0 && !is_front_page()) {
    $parent = get_blog_option(get_current_blog_id(), 'blogname') ;
    $parent_url = get_blogaddress_by_id(get_current_blog_id());
}


if (!is_null(get_post_parent())) {
    $parent = get_the_title(get_post_parent());
    $parent_url = get_permalink(get_post_parent());
}

$list = [
    $parent_url => $parent,
];


$title = '';
if (is_archive()) {
    $list[""] = get_the_archive_title();
}

if (is_single() || is_page()) {

    if ($parent = get_post_parent()) {
        $list[get_the_permalink($parent)] = cropTitle($parent->post_title);
    }

    if (get_post_type() === \HKU\Theme\PostTypeNews::POST_TYPE) {
        $list[get_post_type_archive_link(\HKU\Theme\PostTypeNews::POST_TYPE)] = __("News", "hku");
    }

    if (get_post_type() === \HKU\Theme\PostTypeActivity::POST_TYPE) {
        $list[get_post_type_archive_link(\HKU\Theme\PostTypeActivity::POST_TYPE)] = __("Activity", "hku");
    }

    $list[get_permalink()] = cropTitle(get_the_title());
}

function cropTitle($title)
{
    if (strlen($title) > 30) {
        return substr($title, 0, 40) . '...';
    }

    return $title;
}

/* Proceed with showing the breadcrumbs */
$breadcrumbs = '';
$icon = '<svg class="separator" width="12" height="12" viewBox="0 0 532 532"><path fill="currentColor" d="M176.34 520.646c-13.793 13.805-36.208 13.805-50.001 0-13.785-13.804-13.785-36.238 0-50.034L330.78 266 126.34 61.391c-13.785-13.805-13.785-36.239 0-50.044 13.793-13.796 36.208-13.796 50.002 0 22.928 22.947 206.395 206.507 229.332 229.454a35.065 35.065 0 0 1 10.326 25.126c0 9.2-3.393 18.26-10.326 25.2-45.865 45.901-206.404 206.564-229.332 229.52Z"></path></svg>';
$i = 1;
foreach ($list as $url => $title) {
    if ($i == count($list)) {
        $icon = "";
    }
 $breadcrumbs .= '<!-- wp:list-item --><li class="is-layout-flex is-vertically-aligned-center" itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a href="' . $url . '">' . $title . '</a>' . $icon . '</li><!-- /wp:list-item -->';
 $i++;
}

 ?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"fontSize":"small","layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group has-small-font-size scrollable faded-bg" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">
    <!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false} -->
    <div class="wp-block-columns is-not-stacked-on-mobile max-width">
        <!-- wp:column {"verticalAlignment":"center","width":"70%","layout":{"type":"constrained","justifyContent":"left"}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:75%"><!-- wp:list -->
            <ul class="wp-block-list breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList"><!-- wp:list-item -->
                <?php echo $breadcrumbs; ?>
            </ul>
            <!-- /wp:list -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","layout":{"type":"constrained","justifyContent":"right"}} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <ul class="wp-block-list breadcrumbs-icon"><!-- wp:list-item -->
                <!-- wp:list-item -->
                <li class="is-layout-flex is-vertically-aligned-center full-width">
                    <svg width="12" height="14" viewBox="0 0 12 14" fill="black" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 9.38667C9.49333 9.38667 9.04 9.58667 8.69333 9.9L3.94 7.13333C3.97333 6.98 4 6.82667 4 6.66667C4 6.50667 3.97333 6.35333 3.94 6.2L8.64 3.46C9 3.79333 9.47333 4 10 4C11.1067 4 12 3.10667 12 2C12 0.893333 11.1067 0 10 0C8.89333 0 8 0.893333 8 2C8 2.16 8.02667 2.31333 8.06 2.46667L3.36 5.20667C3 4.87333 2.52667 4.66667 2 4.66667C0.893333 4.66667 0 5.56 0 6.66667C0 7.77333 0.893333 8.66667 2 8.66667C2.52667 8.66667 3 8.46 3.36 8.12667L8.10667 10.9C8.07333 11.04 8.05333 11.1867 8.05333 11.3333C8.05333 12.4067 8.92667 13.28 10 13.28C11.0733 13.28 11.9467 12.4067 11.9467 11.3333C11.9467 10.26 11.0733 9.38667 10 9.38667ZM10 1.33333C10.3667 1.33333 10.6667 1.63333 10.6667 2C10.6667 2.36667 10.3667 2.66667 10 2.66667C9.63333 2.66667 9.33333 2.36667 9.33333 2C9.33333 1.63333 9.63333 1.33333 10 1.33333ZM2 7.33333C1.63333 7.33333 1.33333 7.03333 1.33333 6.66667C1.33333 6.3 1.63333 6 2 6C2.36667 6 2.66667 6.3 2.66667 6.66667C2.66667 7.03333 2.36667 7.33333 2 7.33333ZM10 12.0133C9.63333 12.0133 9.33333 11.7133 9.33333 11.3467C9.33333 10.98 9.63333 10.68 10 10.68C10.3667 10.68 10.6667 10.98 10.6667 11.3467C10.6667 11.7133 10.3667 12.0133 10 12.0133Z"/>
                    </svg>
                </li>
                <!-- /wp:list-item -->
                <!-- wp:list-item -->
                <li class="is-layout-flex is-vertically-aligned-center full-width">
                    <svg width="14" height="12" viewBox="0 0 14 12" fill="black" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.3333 3.33333H10.6667V0H2.66667V3.33333H2C0.893333 3.33333 0 4.22667 0 5.33333V9.33333H2.66667V12H10.6667V9.33333H13.3333V5.33333C13.3333 4.22667 12.44 3.33333 11.3333 3.33333ZM4 1.33333H9.33333V3.33333H4V1.33333ZM9.33333 10.6667H4V8H9.33333V10.6667ZM10.6667 8V6.66667H2.66667V8H1.33333V5.33333C1.33333 4.96667 1.63333 4.66667 2 4.66667H11.3333C11.7 4.66667 12 4.96667 12 5.33333V8H10.6667Z"/>
                        <path d="M10.6667 6.33333C11.0349 6.33333 11.3333 6.03486 11.3333 5.66667C11.3333 5.29848 11.0349 5 10.6667 5C10.2985 5 10 5.29848 10 5.66667C10 6.03486 10.2985 6.33333 10.6667 6.33333Z"/>
                    </svg>
                </li>

                <!-- /wp:list-item -->
            </ul><!-- /wp:list -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
