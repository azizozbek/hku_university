<?php
namespace HKU\Theme;

class Navigation
{
    public array $topMenu = [];
    public array $mainMenu = [];
    public array $childrenMenu = [];

    public function __construct()
    {
        $this->prepare_top_navigation_list();
        $this->prepare_main_navigation_list();
    }

    public function prepare_top_navigation_list(): void {

        switch_to_blog( 1 );
        $menuId = wp_get_nav_menu_object("top");

        if (!$menuId) {

            restore_current_blog();
            return;
        }

        $items = wp_get_nav_menu_items($menuId);
        restore_current_blog();

        if (!$items) {

            return;
        }

        $this->topMenu = $items;
    }

    public function prepare_main_navigation_list(): void {

        switch_to_blog( 1 );
        $menuId = wp_get_nav_menu_object("main");

        if (!$menuId) {

            restore_current_blog();
            return;
        }

        $items = wp_get_nav_menu_items($menuId);
        restore_current_blog();

        if (!$items) {

            return;
        }

        foreach ($items as $item) {
            if ($item->menu_item_parent == 0) {
                $this->mainMenu[$item->ID] = $item;

                continue;
            }

            $this->childrenMenu[$item->menu_item_parent][] = $item;
        }
    }

    public function get_children_of_menu(int $parent_id): array
    {
        if (!array_key_exists($parent_id, $this->childrenMenu)) {

            return [];
        }

        return $this->childrenMenu[$parent_id];
    }

    public function has_children(int $parent_id): bool
    {
        return array_key_exists($parent_id, $this->childrenMenu);
    }

    public function get_quick_access_menu(): array
    {
        switch_to_blog( 1 );

        $menuId = wp_get_nav_menu_object("quick_access");

        if (!$menuId) {

            restore_current_blog();
            return [];
        }

        $items = wp_get_nav_menu_items($menuId);
        restore_current_blog();

        return $items;
    }

    public function isActive($ID): bool
    {
        return ($ID == get_queried_object_id());
    }

}