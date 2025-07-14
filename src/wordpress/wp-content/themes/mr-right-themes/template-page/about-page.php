<?php
    /**
     * Template Name: About Page
     */
?>
<?php
    get_header();
?>

<main id="page" class="container" role="main">
   <article class="sections about-page" id="sections" data-page-sections="619d075c18a84c2fd1b7974b">
      <section data-test="page-section" data-section-theme="bright" class="page-section layout-engine-section background-width--full-bleed section-height--medium content-width--narrow horizontal-alignment--center vertical-alignment--middle bright" 
         data-section-id="61a7e3cc9e05ec68e79373f5" data-controller="SectionWrapperController" data-current-styles="{
         &quot;imageOverlayOpacity&quot;: 0.15,
         &quot;backgroundWidth&quot;: &quot;background-width--full-bleed&quot;,
         &quot;sectionHeight&quot;: &quot;section-height--medium&quot;,
         &quot;horizontalAlignment&quot;: &quot;horizontal-alignment--center&quot;,
         &quot;verticalAlignment&quot;: &quot;vertical-alignment--middle&quot;,
         &quot;contentWidth&quot;: &quot;content-width--narrow&quot;,
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
         &quot;typeName&quot;: &quot;page&quot;
         }" data-animation="none" data-controllers-bound="SectionWrapperController" style="padding-top: 219.828px;" data-active="true">
         <div class="section-border">
            <div class="section-background"></div>
         </div>
         <div class="content-wrapper" style="">
            <div class="content">
               <div class="sqs-layout sqs-grid-12 columns-12" data-type="page-section" id="page-section-61a7e3cc9e05ec68e79373f5">
                  <div class="row sqs-row">
                     <?= the_content(); ?>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </article>
</main>

<?php get_footer(); ?>