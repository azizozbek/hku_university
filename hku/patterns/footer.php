<?php
/**
 * Title: Footer
 * Slug: hku/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: Footer columns with logo, title, tagline and links.
 *
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"},"margin":{"top":"0"}},"border":{"top":{"color":"#cccccc","width":"1px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-top-color:#cccccc;border-top-width:1px;margin-top:0;padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide"><!-- wp:group {"align":"full","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
        <div class="wp-block-group alignfull"><!-- wp:columns -->
            <div class="wp-block-columns"><!-- wp:column {"width":""} -->
                <div class="wp-block-column"><!-- wp:spacer {"height":"var:preset|spacing|40","width":"0px"} -->
                    <div style="height:var(--wp--preset--spacing--40);width:0px" aria-hidden="true" class="wp-block-spacer"></div>
                    <!-- /wp:spacer --></div>
                <!-- /wp:column --></div>
            <!-- /wp:columns -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|80"},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"top","justifyContent":"space-between","orientation":"horizontal"}} -->
            <div class="wp-block-group"><!-- wp:group {"style":{"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
                <div class="wp-block-group"><!-- wp:site-logo {"width":200,"shouldSyncIcon":true} /-->

                    <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                    <div class="wp-block-group">
                        <figure class="wp-block-image size-large is-resized"><img src="<?php echo get_parent_theme_file_uri() . DIRECTORY_SEPARATOR . 'assets/images/google-play-app.webp'; ?>" alt="" style="width:100px"/></figure>

                        <figure class="wp-block-image size-large is-resized"><img src="<?php echo get_parent_theme_file_uri() . DIRECTORY_SEPARATOR . 'assets/images/app-store-logo.webp'; ?>" alt="" style="width:100px"/></figure>
                        </div>
                    <!-- /wp:group --></div>
                <!-- /wp:group -->

                <!-- wp:group {"fontSize":"regular","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"top"}} -->
                <div class="wp-block-group has-regular-font-size"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                    <div class="wp-block-group"><!-- wp:outermost/icon-block {"iconName":"wordpress-mapMarker","width":"24px"} -->
                        <div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:24px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 9c-.8 0-1.5.7-1.5 1.5S11.2 12 12 12s1.5-.7 1.5-1.5S12.8 9 12 9zm0-5c-3.6 0-6.5 2.8-6.5 6.2 0 .8.3 1.8.9 3.1.5 1.1 1.2 2.3 2 3.6.7 1 3 3.8 3.2 3.9l.4.5.4-.5c.2-.2 2.6-2.9 3.2-3.9.8-1.2 1.5-2.5 2-3.6.6-1.3.9-2.3.9-3.1C18.5 6.8 15.6 4 12 4zm4.3 8.7c-.5 1-1.1 2.2-1.9 3.4-.5.7-1.7 2.2-2.4 3-.7-.8-1.9-2.3-2.4-3-.8-1.2-1.4-2.3-1.9-3.3-.6-1.4-.7-2.2-.7-2.5 0-2.6 2.2-4.7 5-4.7s5 2.1 5 4.7c0 .2-.1 1-.7 2.4z"></path></svg></div></div>
                        <!-- /wp:outermost/icon-block -->

                        <!-- wp:paragraph -->
                        <p>Havaalanı Yolu Üzeri 8. Km<br>27010 Şahinbey/Gaziantep</p>
                        <!-- /wp:paragraph --></div>
                    <!-- /wp:group -->

                    <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                    <div class="wp-block-group"><!-- wp:outermost/icon-block {"iconName":"","width":"24px"} -->
                        <div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:24px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.06 5.99999L11.85 5.79999C11.33 5.25999 11.42 5.00999 11.93 4.49999L14.65 1.74999C15.46 0.929987 15.61 0.539987 16.38 1.26999L16.59 1.46999L12.06 5.99999ZM12.59 6.44999L16.99 2.04999C17.69 2.98999 19.33 5.51999 18.52 7.38999C17.79 9.05999 17.43 9.13999 16.52 10.39C14.67 12.5 12.34 14.76 10.52 16.46C9.25998 17.37 9.20997 17.79 7.51997 18.46C5.71997 19.17 3.11997 17.57 2.13997 16.9L6.53997 12.5L7.71997 14.12C8.05997 14.58 8.91998 14.06 9.51998 13.46C10.56 12.41 12.7 10.28 13.52 9.38999C14.11 8.79999 14.64 7.93999 14.18 7.58999L12.59 6.44999ZM1.56997 16.5L1.35997 16.29C0.679975 15.55 1.06997 15.39 1.87997 14.59L4.61997 11.87C5.12997 11.38 5.36997 11.27 5.88997 11.76L6.08997 11.97L1.56997 16.5Z" fill="#312A41"></path></svg></div></div>
                        <!-- /wp:outermost/icon-block -->

                        <!-- wp:paragraph -->
                        <p>444 6 458</p>
                        <!-- /wp:paragraph --></div>
                    <!-- /wp:group -->

                    <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                    <div class="wp-block-group"><!-- wp:outermost/icon-block {"iconName":"wordpress-mail","width":"24px"} -->
                        <div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:24px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"><path d="M20,4H4C2.895,4,2,4.895,2,6v12c0,1.105,0.895,2,2,2h16c1.105,0,2-0.895,2-2V6C22,4.895,21.105,4,20,4z M20,8.236l-8,4.882 L4,8.236V6h16V8.236z"></path></svg></div></div>
                        <!-- /wp:outermost/icon-block -->

                        <!-- wp:paragraph -->
                        <p>info@hku.edu.tr</p>
                        <!-- /wp:paragraph --></div>
                    <!-- /wp:group --></div>
                <!-- /wp:group -->

                <!-- wp:list {"style":{"layout":{"selfStretch":"fill","flexSize":null}}} -->
                <ul class="wp-block-list"><!-- wp:list-item -->
                    <li><a href="https://engelsiz.hku.edu.tr/" target="_blank" rel="noreferrer noopener">EngelsizHKÜ</a></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><a href="https://radyo.hku.edu.tr/" target="_blank" rel="noreferrer noopener">Radyo HKÜ</a></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><a href="https://www.hku.edu.tr/dergilerimiz/" target="_blank" rel="noreferrer noopener">HKÜLTÜR</a></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><a href="https://kariyer.hku.edu.tr/" target="_blank" rel="noreferrer noopener">Mezunlar</a></li>
                    <!-- /wp:list-item --></ul>
                <!-- /wp:list -->

                <!-- wp:list {"style":{"layout":{"selfStretch":"fill","flexSize":null}}} -->
                <ul class="wp-block-list"><!-- wp:list-item -->
                    <li><a href="https://personel.hku.edu.tr/category/ilanlar/" target="_blank" rel="noreferrer noopener">Akademik İş İlanları</a></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><a href="https://www.hku.edu.tr/uygulama-ve-arastirma-merkezleri/" target="_blank" rel="noreferrer noopener">Araştırma Merkezleri</a></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><a href="https://www.hku.edu.tr/category/ilanlar/ihaleler/" target="_blank" rel="noreferrer noopener">İhaleler</a></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><a href="https://www.hku.edu.tr/mevzuatlar/">Mevzuatlar</a></li>
                    <!-- /wp:list-item -->

                    <!-- wp:list-item -->
                    <li><a href="https://www.hku.edu.tr/ulasim/" target="_blank" rel="noreferrer noopener">Ulaşım</a></li>
                    <!-- /wp:list-item --></ul>
                <!-- /wp:list --></div>
            <!-- /wp:group --></div>
        <!-- /wp:group -->

        <!-- wp:spacer {"height":"var:preset|spacing|70"} -->
        <div style="height:var(--wp--preset--spacing--70)" aria-hidden="true" class="wp-block-spacer"></div>
        <!-- /wp:spacer -->

        <!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
        <div class="wp-block-group alignfull"><!-- wp:paragraph {"fontSize":"small"} -->
            <p class="has-small-font-size">Hasan Kalyoncu University ©️ 2025</p>
            <!-- /wp:paragraph -->

            <!-- wp:social-links {"openInNewTab":true,"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
            <ul class="wp-block-social-links is-style-logos-only"><!-- wp:social-link {"url":"https://www.instagram.com/hkunv/?hl=tr","service":"instagram"} /-->

                <!-- wp:social-link {"url":"https://www.facebook.com/hkunv","service":"facebook"} /-->

                <!-- wp:social-link {"url":"https://twitter.com/hkunv","service":"x"} /-->

                <!-- wp:social-link {"url":"https://www.youtube.com/hkunv","service":"youtube"} /-->

                <!-- wp:social-link {"url":"https://tr.linkedin.com/school/hkunv/","service":"linkedin"} /--></ul>
            <!-- /wp:social-links -->

            <!-- wp:paragraph {"fontSize":"small"} -->
            <p class="has-small-font-size">Gizlilik Politikası&nbsp;|&nbsp;Site Haritası&nbsp;|&nbsp;İletişim&nbsp;|&nbsp;A-Z İndex</p>
            <!-- /wp:paragraph --></div>
        <!-- /wp:group --></div>
    <!-- /wp:group --></div>
<!-- /wp:group -->