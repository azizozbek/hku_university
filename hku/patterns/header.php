<?php
/**
 * Title: Header
 * Slug: hku/header
 * Categories: header
 * Description: Site header with site title and navigation.
 *
 */

use HKU\Theme\Navigation;
$navigation = new Navigation();
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"backgroundColor":"dark-red","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-dark-red-background-color has-background topHeader" style="padding-top:0;padding-bottom:0">
    <!-- wp:columns {"className":"is-not-stacked-on-mobile has-link-color","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"0","right":"0"}}},"backgroundColor":"dark-red","textColor":"base"} -->
    <div class="wp-block-columns is-not-stacked-on-mobile has-link-color has-base-color has-dark-red-background-color has-text-color has-background relative" style="padding-top:var(--wp--preset--spacing--10); padding-bottom:var(--wp--preset--spacing--10); padding-left:0;padding-right:0">
        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:paragraph {"fontSize":"small"} -->
            <p class="has-small-font-size">444 6 458</p><!-- /wp:paragraph -->
        </div><!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center top-menu">
            <?php if (count($navigation->mainMenu) > 0) { ?>
                <!-- wp:list -->
                <ul class="top-navigation-list hidden">
                    <?php foreach ($navigation->topMenu as $item) {
                        $title = $item->title ?: $item->post_title; ?>
                        <!-- wp:list-item -->
                        <li>
                            <a href="<?php echo $item->url ?>"><?php echo $title ?></a>
                        </li><!-- /wp:list-item -->
                    <?php } ?>
                </ul><!-- /wp:list -->
            <?php } ?>
        </div><!-- /wp:column -->
        <a href="#" class="alignright top-burger-button is-layout-flex">
            <svg width="18" height="18" viewBox="0 0 18 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="alignright">
                <path d="M0 12H18V10H0V12ZM0 7H18V5H0V7ZM0 0V2H18V0H0Z"/>
            </svg>
        </a>
        <ul class="language-switcher alignright">
            <?php pll_the_languages(); ?>
        </ul>

    </div><!-- /wp:columns -->

</div><!-- /wp:group -->

<!-- wp:group {"style":{"shadow":"var:preset|shadow|boxshadow"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="box-shadow:var(--wp--preset--shadow--boxshadow)">
    <!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
        <!-- wp:columns {"className":"is-not-stacked-on-mobile","verticalAlignment":null,"style":{"layout":{"selfStretch":"fill","flexSize":null}}} -->
        <div class="wp-block-columns is-not-stacked-on-mobile" id="mainHeader">
            <!-- wp:column {"verticalAlignment":"center"} -->
            <div class="wp-block-column is-vertically-aligned-center logo">
                <!-- wp:html -->
                <?php echo get_custom_logo( 1 ); ?>
                <!-- /wp:html -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":"65%"} -->
            <div class="wp-block-column is-vertically-aligned-center desktopMenu" style="flex-basis:65%">
                <?php if (count($navigation->mainMenu) > 0) { ?>
                <!-- wp:list -->
                <ul class="main-navigation-list">
                <?php foreach ($navigation->mainMenu as $item) {
                    $title = $item->title ?: $item->post_title;
                    $children = $navigation->get_children_of_menu($item->ID);
                ?>
                    <!-- wp:list-item -->
                    <li>
                        <a <?php if($navigation->has_children($item->ID)) { ?> class="has-children <?php if ($navigation->isActive($item->object_id)) { echo 'dark-red'; } }?>" href="<?php echo $item->url ?>">
                            <?php echo $title ?>
                            <?php if($navigation->has_children($item->ID)) { ?>
                            <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.59 0.294996L6 4.875L1.41 0.294998L2.46532e-07 1.705L6 7.705L12 1.705L10.59 0.294996Z" fill="black"/>
                            </svg>
                            <?php } ?>
                        </a>
                        <?php if ($navigation->has_children($item->ID)) { ?>
                        <nav class="nav-layout overlay hidden">
                            <?php
                                foreach ($navigation->get_children_of_menu($item->ID) as $child) {
                                    $childTitle = $child->title ?: $child->post_title;
                                ?>
                                <div>
                                    <a href="<?php echo $child->url; ?>" class="<?php if ($navigation->isActive($child->object_id)) { echo 'dark-red'; } ?>"><strong><?php echo $childTitle; ?></strong></a>
                                    <?php
                                        if ($navigation->has_children($child->ID)) { ?>
                                        <ul>
                                            <?php
                                            foreach ($navigation->get_children_of_menu($child->ID) as $subChild) {
                                                $subChildTitle = $subChild->title ?: $subChild->post_title;
                                                ?>
                                                <li><a href="<?php echo $subChild->url; ?>" class="<?php if ($navigation->isActive($subChild->object_id)) { echo 'dark-red'; } ?>"><?php echo $subChildTitle; ?>
                                                        <svg width="9" height="10" viewBox="0 0 21 22" fill="black" xmlns="http://www.w3.org/2000/svg" class="alignright"><path d="M1.62502 0.708313V3.87498H15.2259L0.041687 19.0591L2.27419 21.2916L17.4584 6.10748V19.7083H20.625V0.708313H1.62502Z"></path></svg>
                                                    </a></li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </nav>
                        <?php } ?>
                    </li>
                    <!-- /wp:list-item -->
                <?php } ?>
                </ul>
                <!-- /wp:list -->
                <?php } ?>
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","layout":{"type":"default","justifyContent":"right"}} -->
            <div class="wp-block-column is-vertically-aligned-center search-burger">
                <!-- wp:html {"align":"right"} -->
                <div class="header-icons alignright is-layout-flex is-not-stacked-on-mobile">
                    <a href="#" class="alignright search-button is-layout-flex">
                        <svg width="20" height="20" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="alignright">
                            <path d="M12.755 11.255H11.965L11.685 10.985C12.665 9.845 13.255 8.365 13.255 6.755C13.255 3.165 10.345 0.255005 6.755 0.255005C3.165 0.255005 0.255005 3.165 0.255005 6.755C0.255005 10.345 3.165 13.255 6.755 13.255C8.365 13.255 9.845 12.665 10.985 11.685L11.255 11.965V12.755L16.255 17.745L17.745 16.255L12.755 11.255ZM6.755 11.255C4.26501 11.255 2.255 9.245 2.255 6.755C2.255 4.26501 4.26501 2.255 6.755 2.255C9.245 2.255 11.255 4.26501 11.255 6.755C11.255 9.245 9.245 11.255 6.755 11.255Z" fill="#AB0A30"/>
                        </svg>
                    </a>
                    <a href="#" class="alignright burger-button is-layout-flex">
                        <svg width="24" height="20" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="alignright">
                            <path d="M0 12H18V10H0V12ZM0 7H18V5H0V7ZM0 0V2H18V0H0Z" fill="#AB0A30"/>
                        </svg>
                    </a>
                </div>
                <div class="search-layout overlay hidden">
                    <div>
                        <h2><?php echo __("Ara", "hku") ?></h2>
                        <form method="get">
                            <input type="text" name="s" alt="<?php _e("Ara", "hku"); ?>" placeholder="<?php _e("Bişeyler yaz...", "hku"); ?>">
                        </form>
                    </div>
                </div>
                <!-- /wp:html -->
            </div>
            <!-- /wp:column --></div>
        <!-- /wp:columns --></div>
    <!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"hku/mobileheader"} /-->