<?php
    /**
     * Template Name: Shop Page
    */

    $args = array(
        'post_type'   => 'product',
        'post_status' => 'publish',
    
        'order'               => 'DESC',
        'orderby'             => 'modified',
    
        'posts_per_page'         => get_option('posts_per_page'),
    
    
        'no_found_rows'          => false,
        'cache_results'          => true,
        'update_post_term_cache' => true,
        'update_post_meta_cache' => true,
    );
    
    $query = new WP_Query( $args );
    
?>
<?php get_header(); ?>

<main id="page" class="container" role="main">
    <?php 
        if($query->have_posts()):
            ?>
                <article class="sections" id="sections" data-page-sections="619e60cdfcec284b230b3190">
                    <section data-test="page-section" data-section-theme="bright" class="page-section content-collection full-bleed-section collection-type-portfolio-grid-basic background-width--full-bleed section-height--medium content-width--wide horizontal-alignment--center vertical-alignment--middle bright" 
                        data-section-id="619e60cdfcec284b230b3192" data-controller="SectionWrapperController" data-current-styles="{
                        &quot;imageOverlayOpacity&quot;: 0.15,
                        &quot;backgroundWidth&quot;: &quot;background-width--full-bleed&quot;,
                        &quot;sectionHeight&quot;: &quot;section-height--medium&quot;,
                        &quot;customSectionHeight&quot;: 10,
                        &quot;horizontalAlignment&quot;: &quot;horizontal-alignment--center&quot;,
                        &quot;verticalAlignment&quot;: &quot;vertical-alignment--middle&quot;,
                        &quot;contentWidth&quot;: &quot;content-width--wide&quot;,
                        &quot;customContentWidth&quot;: 50,
                        &quot;sectionTheme&quot;: &quot;bright&quot;,
                        &quot;sectionAnimation&quot;: &quot;none&quot;,
                        &quot;backgroundMode&quot;: &quot;image&quot;
                        }" data-current-context="{
                        &quot;video&quot;: {
                        &quot;playbackSpeed&quot;: 0.5,
                        &quot;filter&quot;: 1,
                        &quot;filterStrength&quot;: 0,
                        &quot;zoom&quot;: 0,
                        &quot;videoSourceProvider&quot;: &quot;none&quot;
                        },
                        &quot;backgroundImageId&quot;: null,
                        &quot;backgroundMediaEffect&quot;: null,
                        &quot;divider&quot;: null,
                        &quot;typeName&quot;: &quot;portfolio-grid-basic&quot;
                        }" data-animation="none" data-controllers-bound="SectionWrapperController" style="padding-top: 219.828px;" data-active="true">
                        <div class="section-border">
                            <div class="section-background"></div>
                        </div>
                        <div class="content-wrapper" style="">
                            <div class="content">
                                <div id="gridThumbs" class="portfolio-grid-basic grid-wrapper collection-content-wrapper" data-animation-role="section">
                                    <?php 
                                        while($query->have_posts()): $query->the_post();
                                            ?> 
                                                <a class="grid-item" href="<?= get_the_permalink(); ?>">
                                                    <div class="grid-image">
                                                        <div class="grid-image-inner-wrapper">
                                                            <img
                                                                data-src="<?= get_the_post_thumbnail_url(); ?>"
                                                                data-image="<?= get_the_post_thumbnail_url(); ?>"
                                                                data-image-dimensions="4480x6720" data-image-focal-point="0.5,0.5" alt="La première"
                                                                data-load="false" elementtiming="nbf-portfolio-grid-basic" src="shop/9X0A8339bwx.jpg"
                                                                width="4480" height="6720" sizes="(max-width: 767px) 100vw, 50vw"
                                                                style="display:block;object-position: 50% 50%"
                                                                srcset="<?= get_the_post_thumbnail_url(); ?>?format=100w 100w, <?= get_the_post_thumbnail_url(); ?>?format=300w 300w, <?= get_the_post_thumbnail_url(); ?>?format=500w 500w, <?= get_the_post_thumbnail_url(); ?>?format=750w 750w, <?= get_the_post_thumbnail_url(); ?>?format=1000w 1000w, <?= get_the_post_thumbnail_url(); ?>?format=1500w 1500w, <?= get_the_post_thumbnail_url(); ?>?format=2500w 2500w"
                                                                loading="lazy" decoding="async" data-loader="sqs">
                                                        </div>
                                                    </div>
                                                    <div class="portfolio-text">
                                                        <h3 class="portfolio-title"><?= get_the_title(); ?></h3>
                                                    </div>
                                                </a>
                                            <?php
                                        endwhile;
                                        wp_reset_query();
                                        wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </article>
                <?php mr_right_themes_custom_pagination($query); ?>
            <?php
        endif;
    ?>

</main>

<?php get_footer(); ?>