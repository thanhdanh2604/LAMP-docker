<?php
    /**
     * Template Name: Collection Page
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
        <article class="sections collection-page" id="sections" data-page-sections="619d07630fa2d502df3adf03">
            <section data-test="page-section" data-section-theme="bright" class="page-section gallery-section full-bleed-section background-width--full-bleed section-height--medium content-width--wide horizontal-alignment--center vertical-alignment--middle bright" 
                data-section-id="619d0a95bceeb900b65792a3" data-controller="SectionWrapperController" data-current-styles="{
                &quot;backgroundWidth&quot;: &quot;background-width--full-bleed&quot;,
                &quot;imageOverlayOpacity&quot;: 0.15,
                &quot;sectionHeight&quot;: &quot;section-height--medium&quot;,
                &quot;horizontalAlignment&quot;: &quot;horizontal-alignment--center&quot;,
                &quot;verticalAlignment&quot;: &quot;vertical-alignment--middle&quot;,
                &quot;contentWidth&quot;: &quot;content-width--wide&quot;,
                &quot;sectionAnimation&quot;: &quot;none&quot;,
                &quot;backgroundMode&quot;: &quot;image&quot;,
                &quot;sectionTheme&quot;: &quot;bright&quot;,
                &quot;backgroundImage&quot;: null
                }" data-current-context="{
                &quot;video&quot;: {
                &quot;playbackSpeed&quot;: 0.5,
                &quot;filter&quot;: 1,
                &quot;filterStrength&quot;: 0,
                &quot;zoom&quot;: 0
                },
                &quot;backgroundImageId&quot;: null,
                &quot;backgroundMediaEffect&quot;: null,
                &quot;divider&quot;: {
                &quot;enabled&quot;: false
                },
                &quot;typeName&quot;: &quot;page&quot;
                }" data-animation="none" data-json-schema-section="" data-controllers-bound="SectionWrapperController" style="padding-top: 219.828px;" data-active="true">
                <div class="section-border">
                    <div class="section-background"></div>
                </div>
                <div class="content-wrapper" style="">
                    <div class="content">
                        <div class="gallery gallery-section-wrapper" style="min-height: 100px;">
                            <div class="gallery" style="min-height: 100px;">
                                <!-- Gallery Grid -->
                                <div class="gallery-grid gallery-grid--layout-grid" data-controller="GalleryGrid" data-section-id="619d0a95bceeb900b65792a3" data-animation="site-default" data-lightbox="false" data-width="full-bleed" data-aspect-ratio="three-four-vertical" data-columns="3" data-gutter="0" data-props="{
                                    &quot;aspectRatio&quot;: &quot;three-four-vertical&quot;,
                                    &quot;scrollAnimation&quot;: &quot;site-default&quot;,
                                    &quot;gutter&quot;: 0,
                                    &quot;numColumns&quot;: 3,
                                    &quot;width&quot;: &quot;full-bleed&quot;,
                                    &quot;lightboxEnabled&quot;: false
                                    }" 
                                    data-show-captions="false" data-test="gallery-grid-simple" data-controllers-bound="GalleryGrid">
                                    <div class="gallery-grid-wrapper" style="grid-template-columns: repeat(3, 1fr); grid-column-gap: 0vw; grid-row-gap: 0vw; padding: 0vw 0vw; width: auto">

                                        <?php
                                            $content = get_the_content();

                                            $gallery = get_post_gallery( get_the_ID(), false );
                                            
                                            if ( $gallery && !empty($gallery['ids']) ) {
                                                $image_ids = explode(',', $gallery['ids']);
                                            
                                                foreach ( $image_ids as $image_id ) {
                                                    $image_url = wp_get_attachment_url( $image_id );
                                                    echo '<figure class="gallery-grid-item" data-show="true" data-loaded="true">';
                                                    echo '<div class="gallery-grid-item-wrapper" data-animation-role="image">';
                                                    echo '<img src="' . esc_url($image_url) . '" alt="" />';
                                                    echo '</div>';
                                                    echo '</figure>';
                                                }
                                            }
                                        ?>
                                        <?php 
                                            if($query->have_posts()):
                                                while($query->have_posts()): $query->the_post();
                                                    ?>
                                                        <figure class="gallery-grid-item has-clickthrough" data-show="true" data-loaded="true">
                                                             <a href="<?= get_the_permalink(); ?>" target="_blank">
                                                                <div class="gallery-grid-item-wrapper" data-animation-role="image">
                                                                    <img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= get_the_title(); ?>">
                                                                </div>
                                                            </a>
                                                        </figure>
                                                    <?php
                                                endwhile;
                                                wp_reset_query();
                                                wp_reset_postdata();
                                            ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </article>
    </main>
<?php get_footer(); ?>