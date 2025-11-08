<?php
/**
 * Title: Mobile Header
 * Slug: hku/mobileheader
 * Categories: header
 * Description: Mobile header with site title and navigation.
 * viewportWidth: 768px
 */

use HKU\Theme\Navigation;
$navigation = new Navigation();

?>
<!-- wp:group {"className":"mobile-header","backgroundColor":"dark-red","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group has-dark-red-background-color has-background mobile-header hidden full-fixed mobile-overlay gap-40"><!-- wp:columns {"verticalAlignment":null,"isStackedOnMobile":false} -->
    <div class="wp-block-columns is-not-stacked-on-mobile ">
        <!-- wp:column {"verticalAlignment":"center","layout":{"type":"constrained","justifyContent":"left"}} -->
        <div class="wp-block-column is-vertically-aligned-center vertical-padding-10 no-horizontal-padding">
            <!-- wp:list -->
            <ul class="language-switcher alignleft has-base-color">
                <?php pll_the_languages(); ?>
            </ul>
            <!-- /wp:list --></div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center is-layout-flex justify-end"><!-- wp:html -->
            <button class="close-button simple-button">
                <svg width="20" height="20" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 1.81286L16.1871 0L9 7.18714L1.81286 0L0 1.81286L7.18714 9L0 16.1871L1.81286 18L9 10.8129L16.1871 18L18 16.1871L10.8129 9L18 1.81286Z" />
                </svg>
            </button>
            <!-- /wp:html -->
        </div><!-- /wp:column -->
    </div><!-- /wp:columns -->

    <!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"left","flexWrap":"wrap"}} -->
    <div class="wp-block-group full-width gap-40">
        <!-- wp:list -->
        <ul class="no-horizontal-padding full-width has-base-color">
            <!-- wp:list-item --><li><strong>Quick Access:</strong></li><!-- /wp:list-item -->
            <?php foreach ($navigation->get_quick_access_menu() as $item) {
                $title = $item->title ?: $item->post_title;
                ?>
                <!-- wp:list-item -->
                <li>
                    <a class="is-layout-flex justify-between" href="<?php echo $item->url ?>">
                        <span><?php echo $title ?></span>
                    </a>
                </li>
                <!-- /wp:list-item -->
            <?php } ?>
        </ul>
        <!-- /wp:list -->
        <?php if (count($navigation->mainMenu) > 0) { ?>
            <!-- wp:list -->
            <ul class="mobile-navigation-list no-horizontal-padding full-width">
                <?php foreach ($navigation->mainMenu as $item) {
                    $title = $item->title ?: $item->post_title;
                    ?>
                    <!-- wp:list-item -->
                    <li>
                        <a class="is-layout-flex justify-between show-sub-mobile <?php if ($navigation->isActive($item->object_id)) { echo 'base-color'; } ?>" data-sub="<?php echo $item->ID; ?>" href="<?php echo $item->url ?>" >
                            <span><?php echo $title ?></span>
                            <svg width="18" height="14" viewBox="0 0 12 8" xmlns="http://www.w3.org/2000/svg" style="rotate: 270deg">
                                <path d="M10.59 0.294996L6 4.875L1.41 0.294998L2.46532e-07 1.705L6 7.705L12 1.705L10.59 0.294996Z" />
                            </svg>
                        </a>

                        <?php if ($navigation->has_children($item->ID)) { ?>
                            <nav class="sub-mobile-menu hidden full-fixed" id="submenu-<?php echo $item->ID; ?>">
                                <div class="gap-20 is-layout-flex flex-direction-column justify-start align-start horizontal-padding-20 vertical-padding-20">
                                    <span class="is-layout-flex justify-between full-width vertical-padding-10">
                                    <strong class="font-medium uppercase"><?php echo $title; ?></strong>
                                    <button class="close-sub simple-button no-mobile-padding" data-sub="<?php echo $item->ID; ?>">
                                        <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M18 1.81286L16.1871 0L9 7.18714L1.81286 0L0 1.81286L7.18714 9L0 16.1871L1.81286 18L9 10.8129L16.1871 18L18 16.1871L10.8129 9L18 1.81286Z"/>
                                        </svg>
                                    </button>
                                </span>
                                    <ul class="full-width">
                                        <?php
                                        foreach ($navigation->get_children_of_menu($item->ID) as $child) {
                                            $childTitle = $child->title ?: $child->post_title;
                                            ?>
                                            <li class="full-width vertical-padding-10">
                                                <a class="is-layout-flex justify-between full-width border-bottom <?php if ($navigation->isActive($child->object_id)) { echo 'dark-red'; } ?>" href="<?php echo $child->url ?>">
                                                    <span><strong class="font-medium"><?php echo $childTitle ?></strong></span>
                                                </a>

                                                <?php
                                                if ($navigation->has_children($child->ID)) { ?>
                                                    <ul>
                                                        <?php
                                                        foreach ($navigation->get_children_of_menu($child->ID) as $subChild) {
                                                            $subChildTitle = $subChild->title ?: $subChild->post_title;
                                                            ?>
                                                            <li class="padding-top-10">
                                                                <a class="is-layout-flex justify-between full-width <?php if ($navigation->isActive($subChild->object_id)) { echo 'dark-red'; } ?>" href="<?php echo $subChild->url ?>">
                                                                    <span><?php echo $subChildTitle ?></span>

                                                                    <svg width="18" height="14" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg" style="rotate: 270deg">
                                                                        <path d="M10.59 0.294996L6 4.875L1.41 0.294998L2.46532e-07 1.705L6 7.705L12 1.705L10.59 0.294996Z" fill="#AB0A30"/>
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>

                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </nav>
                        <?php } ?>
                    </li>
                    <!-- /wp:list-item -->
                <?php } ?>
            </ul>
            <!-- /wp:list -->
        <?php } ?>

    </div><!-- /wp:group -->

</div><!-- /wp:group -->