<?php
/**
 * Title: Side Menu
 * Slug: hku/sidemenu
 * Categories: header
 * Description: Sidebar Menu for the sub pages
 *
 */
global $post;

function sidemenu($post) {

    if ($post->post_parent == 0 && is_front_page()) {
        $menu = 'faculty_'.pll_current_language();
        return wp_nav_menu([
            'menu' => $menu,
            'container' => 'ul',
            'echo' => 0,
            'depth' => 1,
        ]);
    }

    return wp_list_pages(array(
        'child_of' => $post->post_parent,
        'post_type' => $post->post_type,
        'post_status' => 'publish',
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'title_li' => null,
        'echo' => 0,
        'depth' => 2,
    ));
}

$parent = get_blog_option(1, 'blogname') ;
$parent_url = get_blogaddress_by_id(1);

$facultyId = get_option(\HKU\Theme\AddFacultyOption::OPTION_NAME);

if ($facultyId != 0) {
    $parent = get_blog_option($facultyId, 'blogname') ;
    $parent_url = get_blogaddress_by_id($facultyId);
}

if ($post->post_parent != 0) {
    $parent = get_the_title($post->post_parent);
    $parent_url = get_permalink($post->post_parent);
}

$siblings = sidemenu($post);

?>
<aside id="aside" tabindex="-1">
    <nav id="nav-sub" aria-label="<?php _e('Yan Menü', 'hku'); ?>" role="menu">
        <div class="navigation-panel">
            <header>
                <div class="parent-header">
                    <a href="<?php echo $parent_url ?>" target="" role="menuitem">
                        <svg class="header-back-icon" width="12" height="12" viewBox="0 0 532 532"><path d="M176.34 520.646c-13.793 13.805-36.208 13.805-50.001 0-13.785-13.804-13.785-36.238 0-50.034L330.78 266 126.34 61.391c-13.785-13.805-13.785-36.239 0-50.044 13.793-13.796 36.208-13.796 50.002 0 22.928 22.947 206.395 206.507 229.332 229.454a35.065 35.065 0 0 1 10.326 25.126c0 9.2-3.393 18.26-10.326 25.2-45.865 45.901-206.404 206.564-229.332 229.52Z"></path></svg>
                        <?php echo $parent ?>
                    </a>
                    <svg class="open-sidemenu-icon" width="12" height="12" viewBox="0 0 532 532"><path d="M176.34 520.646c-13.793 13.805-36.208 13.805-50.001 0-13.785-13.804-13.785-36.238 0-50.034L330.78 266 126.34 61.391c-13.785-13.805-13.785-36.239 0-50.044 13.793-13.796 36.208-13.796 50.002 0 22.928 22.947 206.395 206.507 229.332 229.454a35.065 35.065 0 0 1 10.326 25.126c0 9.2-3.393 18.26-10.326 25.2-45.865 45.901-206.404 206.564-229.332 229.52Z"></path></svg>

                </div>
            </header>
            <ul>
               <?php
                echo $siblings;
               ?>
            </ul>
        </div>
    </nav>
</aside>