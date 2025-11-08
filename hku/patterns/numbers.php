<?php
/**
 * Title: Get the university numbers
 * Slug: hku/numbers
 * Categories: query
 * Block Types: core/query
 *
 */

$getRemoteNumbers = new \HKU\Theme\GetRemoteNumbers();
$numbers = $getRemoteNumbers->get_remote_data();
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"blockGap":"var:preset|spacing|20"},"color":{"gradient":"linear-gradient(135deg,rgba(0,80,146,0.1) 0%,rgba(171,10,48,0.1) 99%)"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background" style="background:linear-gradient(135deg,rgba(0,80,146,0.1) 0%,rgba(171,10,48,0.1) 99%);padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
    <!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}}} -->
    <h2 class="wp-block-heading" style="margin-bottom:var(--wp--preset--spacing--40)"><strong><?php _e('Rakamlarla Hasan Kalyoncu', 'hku');?></strong></h2>
    <!-- /wp:heading -->

    <!-- wp:columns {"className":"numbers","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
    <div class="wp-block-columns numbers"><!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"0"},"border":{"width":"0px","style":"none"}},"layout":{"type":"default"}} -->
        <div class="wp-block-column" style="border-style:none;border-width:0px;padding-top:0;padding-bottom:0"><!-- wp:group {"className":"hover-red","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"shadow":"var:preset|shadow|boxshadow","border":{"width":"0px","style":"none"}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"center"}} -->
            <div class="wp-block-group hover-red has-base-background-color has-background" style="border-style:none;border-width:0px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);box-shadow:var(--wp--preset--shadow--boxshadow)"><!-- wp:outermost/icon-block {"iconName":"","itemsJustification":"right","width":"24px"} -->
                <div class="wp-block-outermost-icon-block items-justified-right"><div class="icon-container" style="width:24px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 8L2.54 5.02L3 16H1L1.48 4.59L0 4L10 0L20 4L10 8ZM10 3C9.45 3 9 3.22 9 3.5C9 3.78 9.45 4 10 4C10.55 4 11 3.78 11 3.5C11 3.22 10.55 3 10 3ZM10 9L15.57 6.77C16.28 7.71 16.77 8.84 16.93 10.07C16.63 10.03 16.32 10 16 10C13.45 10 11.22 11.37 10 13.41C9.38075 12.3708 8.50224 11.5101 7.45048 10.9124C6.39872 10.3146 5.20976 10.0002 4 10C3.68 10 3.37 10.03 3.07 10.07C3.23 8.84 3.72 7.71 4.43 6.77L10 9Z" fill="#312A41"></path></svg></div></div>
                <!-- /wp:outermost/icon-block -->

                <!-- wp:paragraph {"className":"text-center","fontSize":"x-large"} -->
                <p class="text-center has-x-large-font-size"><strong><?php echo $numbers['students']; ?></strong></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"className":"text-center","fontSize":"medium"} -->
                <p class="text-center has-medium-font-size"><?php _e('Mezun', 'hku') ?></p>
                <!-- /wp:paragraph --></div>
            <!-- /wp:group --></div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"0"},"border":{"width":"0px","style":"none"}},"layout":{"type":"default"}} -->
        <div class="wp-block-column" style="border-style:none;border-width:0px;padding-top:0;padding-bottom:0"><!-- wp:group {"className":"hover-red","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"shadow":"var:preset|shadow|boxshadow","border":{"width":"0px","style":"none"}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"center"}} -->
            <div class="wp-block-group hover-red has-base-background-color has-background" style="border-style:none;border-width:0px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);box-shadow:var(--wp--preset--shadow--boxshadow)"><!-- wp:outermost/icon-block {"iconName":"","itemsJustification":"right","width":"24px"} -->
                <div class="wp-block-outermost-icon-block items-justified-right"><div class="icon-container" style="width:24px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16 16H0V0H16V16ZM6.05 5.53C6.18 5.46 6.29 5.38 6.38 5.29C6.47 5.19 6.55 5.08 6.62 4.95C6.69 4.81 6.75 4.69 6.79 4.58C6.83 4.47 6.86 4.36 6.89 4.24L6.95 4C6.95 3.96 6.96 3.93 6.96 3.91C7.01 3.59 6.99 3.3 6.92 3.01C6.84 2.73 6.69 2.49 6.46 2.29C6.23 2.1 5.95 2 5.6 2C5.4 2 5.21 2.04 5.04 2.11C4.87 2.19 4.73 2.29 4.63 2.41C4.52 2.54 4.43 2.68 4.36 2.85C4.29 3.01 4.25 3.18 4.24 3.36C4.23 3.54 4.24 3.72 4.25 3.91L4.27 4C4.28 4.06 4.3 4.15 4.33 4.25C4.36 4.35 4.39 4.46 4.43 4.58C4.47 4.7 4.53 4.83 4.6 4.95C4.68 5.07 4.76 5.18 4.85 5.28C4.94 5.38 5.05 5.47 5.19 5.53C5.32 5.59 5.47 5.62 5.62 5.62C5.77 5.62 5.92 5.59 6.05 5.53V5.53ZM14 3V2H9V3H14ZM14 5V4H9V5H14ZM5.62 6.83L4.24 5.95C3.83 5.95 3.45 6.06 3.1 6.27C2.75 6.49 2.48 6.77 2.29 7.12C2.1 7.46 2 7.82 2 8.19V9.44L2.2 9.49C2.33 9.53 2.51 9.58 2.75 9.63C2.99 9.69 3.26 9.75 3.55 9.8C3.84 9.86 4.17 9.9 4.55 9.94C4.92 9.98 5.28 10 5.62 10C5.96 10 6.31 9.98 6.69 9.94C7.07 9.9 7.39 9.85 7.67 9.8C7.94 9.75 8.21 9.7 8.49 9.63C8.76 9.57 8.94 9.52 9.03 9.5C9.12 9.47 9.19 9.45 9.24 9.44V8.19C9.24 7.83 9.14 7.47 8.93 7.12C8.72 6.77 8.44 6.48 8.09 6.26C7.74 6.04 7.37 5.93 6.98 5.93L5.62 6.83ZM14 7V6H11V7H14ZM14 9V8H11V9H14ZM14 12V11H2V12H14ZM14 14V13H2V14H14Z" fill="#312A41"></path></svg></div></div>
                <!-- /wp:outermost/icon-block -->

                <!-- wp:paragraph {"className":"text-center","fontSize":"x-large"} -->
                <p class="text-center has-x-large-font-size"><strong><?php echo $numbers['teachers']; ?></strong></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"className":"text-center","fontSize":"medium"} -->
                <p class="text-center has-medium-font-size"><?php _e('Öğrenci', 'hku') ?></p>
                <!-- /wp:paragraph --></div>
            <!-- /wp:group --></div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"0"},"border":{"width":"0px","style":"none"}},"layout":{"type":"default"}} -->
        <div class="wp-block-column" style="border-style:none;border-width:0px;padding-top:0;padding-bottom:0"><!-- wp:group {"className":"hover-red","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"shadow":"var:preset|shadow|boxshadow","border":{"width":"0px","style":"none"}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"center"}} -->
            <div class="wp-block-group hover-red has-base-background-color has-background" style="border-style:none;border-width:0px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);box-shadow:var(--wp--preset--shadow--boxshadow)"><!-- wp:outermost/icon-block {"iconName":"","itemsJustification":"right","width":"24px"} -->
                <div class="wp-block-outermost-icon-block items-justified-right"><div class="icon-container" style="width:24px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.24 7.25C4.97 7.25 4.51 3.81 4.51 3.81C4.24 2.02 5.06 0 7.21 0C9.37 0 10.19 2.02 9.92 3.81C9.92 3.81 9.51 7.25 7.24 7.25ZM7.24 9.82L9.96 8C12.35 8 14.48 10.33 14.48 12.53V15.02C14.48 15.02 10.83 16.15 7.24 16.15C3.59 16.15 0 15.02 0 15.02V12.53C0 10.28 1.94 8.05 4.47 8.05L7.24 9.82Z" fill="#312A41"></path></svg></div></div>
                <!-- /wp:outermost/icon-block -->

                <!-- wp:paragraph {"className":"text-center","fontSize":"x-large"} -->
                <p class="text-center has-x-large-font-size"><strong><?php echo $numbers['professors']; ?></strong></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"className":"text-center","fontSize":"medium"} -->
                <p class="text-center has-medium-font-size"><?php _e('Akademik Personel', 'hku') ?></p>
                <!-- /wp:paragraph --></div>
            <!-- /wp:group --></div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"0"},"border":{"width":"0px","style":"none"}},"layout":{"type":"default"}} -->
        <div class="wp-block-column" style="border-style:none;border-width:0px;padding-top:0;padding-bottom:0"><!-- wp:group {"className":"hover-red","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"shadow":"var:preset|shadow|boxshadow","border":{"width":"0px","style":"none"}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"center"}} -->
            <div class="wp-block-group hover-red has-base-background-color has-background" style="border-style:none;border-width:0px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);box-shadow:var(--wp--preset--shadow--boxshadow)"><!-- wp:outermost/icon-block {"iconName":"","itemsJustification":"right","width":"24px"} -->
                <div class="wp-block-outermost-icon-block items-justified-right"><div class="icon-container" style="width:24px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0H16V4H0V0ZM0 10V6H4V10H0ZM6 8V6H10V8H6ZM12 11V6H16V11H12ZM6 16V10H10V16H6ZM0 16V12H4V16H0ZM12 16V13H16V16H12Z" fill="#312A41"></path></svg></div></div>
                <!-- /wp:outermost/icon-block -->

                <!-- wp:paragraph {"className":"text-center","fontSize":"x-large"} -->
                <p class="text-center has-x-large-font-size"><strong><?php echo $numbers['faculty']; ?></strong></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"className":"text-center","fontSize":"medium"} -->
                <p class="text-center has-medium-font-size"><?php _e('Fakülte', 'hku') ?></p>
                <!-- /wp:paragraph --></div>
            <!-- /wp:group --></div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"0"},"border":{"width":"0px","style":"none"}},"layout":{"type":"default"}} -->
        <div class="wp-block-column" style="border-style:none;border-width:0px;padding-top:0;padding-bottom:0"><!-- wp:group {"className":"hover-red","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"shadow":"var:preset|shadow|boxshadow","border":{"width":"0px","style":"none"}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"center"}} -->
            <div class="wp-block-group hover-red has-base-background-color has-background" style="border-style:none;border-width:0px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);box-shadow:var(--wp--preset--shadow--boxshadow)"><!-- wp:outermost/icon-block {"iconName":"","itemsJustification":"right","width":"24px"} -->
                <div class="wp-block-outermost-icon-block items-justified-right"><div class="icon-container" style="width:24px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.12628 7.56386V6.46386C4.12628 5.96386 3.92628 5.76386 3.42628 5.66386C4.02628 5.56386 4.22628 5.36386 4.22628 4.76386V3.66386C4.22628 3.26386 4.32628 3.16386 4.92628 3.16386H5.22628V2.66386H4.62628C3.72628 2.66386 3.32628 2.86386 3.32628 3.66386C3.32628 4.16386 3.42628 4.46386 3.42628 4.86386C3.42628 5.06386 3.22628 5.36386 2.52628 5.36386V5.96386C3.22628 5.96386 3.42628 6.26386 3.42628 6.46386C3.42628 6.86386 3.32628 7.16386 3.32628 7.66386C3.32628 8.46386 3.72628 8.66386 4.62628 8.66386H5.12628V8.06386H4.82628C4.32628 8.06386 4.12628 7.96386 4.12628 7.56386ZM14.5263 11.9639C13.7263 11.1639 12.8263 10.5639 11.9263 9.96386C11.8263 9.86386 10.8263 8.86386 10.4263 8.56386C12.8263 4.56386 9.32628 -0.636144 4.72628 0.0638559C0.326282 0.763856 -1.57372 6.26386 1.52628 9.46386C3.22628 11.3639 6.12628 11.7639 8.42628 10.5639C9.02628 11.1639 9.52628 11.6639 10.0263 12.2639C10.7263 13.1639 11.2263 14.0639 12.1263 14.7639C12.7263 15.2639 13.5263 15.9639 14.4263 16.0639C15.5263 16.1639 16.1263 15.4639 16.1263 14.4639C16.0263 13.5639 15.1263 12.5639 14.5263 11.9639V11.9639ZM5.62628 9.66386C3.42628 9.66386 1.62628 7.86386 1.62628 5.66386C1.62628 3.46386 3.42628 1.66386 5.62628 1.66386C7.82628 1.66386 9.62628 3.46386 9.62628 5.66386C9.62628 7.86386 7.82628 9.66386 5.62628 9.66386ZM7.72628 4.86386C7.72628 4.46386 7.82628 4.16386 7.82628 3.66386C7.82628 2.86386 7.42628 2.66386 6.52628 2.66386H6.02628V3.16386H6.32628C6.82628 3.16386 7.02628 3.26386 7.02628 3.66386V4.76386C7.02628 5.26386 7.22628 5.46386 7.72628 5.56386C7.12628 5.76386 6.92628 5.96386 6.92628 6.46386V7.56386C7.02628 7.96386 6.82628 8.06386 6.32628 8.06386H6.02628V8.66386H6.52628C7.42628 8.66386 7.82628 8.46386 7.82628 7.66386C7.82628 7.16386 7.72628 6.86386 7.72628 6.46386C7.72628 6.26386 7.92628 5.96386 8.62628 5.96386V5.36386C7.92628 5.36386 7.72628 5.06386 7.72628 4.86386V4.86386Z" fill="#312A41"></path></svg></div></div>
                <!-- /wp:outermost/icon-block -->

                <!-- wp:paragraph {"className":"text-center","fontSize":"x-large"} -->
                <p class="text-center has-x-large-font-size"><strong><?php echo $numbers['research']; ?></strong></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"className":"text-center","fontSize":"medium"} -->
                <p class="text-center has-medium-font-size"><?php _e('Araştırma Merkezi', 'hku') ?></p>
                <!-- /wp:paragraph --></div>
            <!-- /wp:group --></div>
        <!-- /wp:column --></div>
    <!-- /wp:columns --></div>
<!-- /wp:group -->