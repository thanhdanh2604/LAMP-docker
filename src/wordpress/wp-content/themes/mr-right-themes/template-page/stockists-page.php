<?php
    /**
     * Template Name: Stockists Page
     */
?>
<?php get_header(); ?>
<main id="page" class="container" role="main">
    <article class="sections stockists-page page-section full-bleed-section layout-engine-section background-width--full-bleed section-height--custom content-width--wide horizontal-alignment--center vertical-alignment--middle" id="sections" data-page-sections="67696df2a7dfa22610c59ca5">
        <section class="stockists-section">
            <div class="stockists-container">
                <div class="stockists-text">
                    <div class="stockists-block">
                        <?= the_content(); ?>
                    </div>
                </div>
                <div class="stockists-image">
                    <img src="<?= get_the_post_thumbnail_url(); ?>" alt="Stockists Image">
                </div>
            </div>
        </section>

        <!-- <section data-test="page-section" data-section-theme="" class="page-section full-bleed-section layout-engine-section background-width--full-bleed section-height--custom content-width--wide horizontal-alignment--center vertical-alignment--middle" 
            data-section-id="67696e57288ad26096a7f77a" data-controller="SectionWrapperController" data-current-styles="{
            &quot;imageOverlayOpacity&quot;: 0.15,
            &quot;backgroundWidth&quot;: &quot;background-width--full-bleed&quot;,
            &quot;sectionHeight&quot;: &quot;section-height--custom&quot;,
            &quot;customSectionHeight&quot;: 0,
            &quot;horizontalAlignment&quot;: &quot;horizontal-alignment--center&quot;,
            &quot;verticalAlignment&quot;: &quot;vertical-alignment--middle&quot;,
            &quot;contentWidth&quot;: &quot;content-width--wide&quot;,
            &quot;customContentWidth&quot;: 50,
            &quot;backgroundColor&quot;: &quot;&quot;,
            &quot;sectionTheme&quot;: &quot;&quot;,
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
            }" data-animation="none" data-fluid-engine-section="" data-controllers-bound="SectionWrapperController" style="padding-top: 219.828px;" id="yui_3_17_2_1_1751005554247_78" data-active="true">
            <div class="section-border">
                <div class="section-background"></div>
            </div>
            <div class="content-wrapper" style="padding-top: calc(0vmax / 10); padding-bottom: calc(0vmax / 10);" id="yui_3_17_2_1_1751005554247_77">
                <div class="content" id="yui_3_17_2_1_1751005554247_76">
                    <div data-fluid-engine="true" id="yui_3_17_2_1_1751005554247_75">
                        <style>
                            .fe-67696e57288ad26096a7f779 {
                            --grid-gutter: calc(var(--sqs-mobile-site-gutter, 6vw) - 11.0px);
                            --cell-max-width: calc( ( var(--sqs-site-max-width, 1500px) - (11.0px * (8 - 1)) ) / 8 );
                            display: grid;
                            position: relative;
                            grid-area: 1/1/-1/-1;
                            grid-template-rows: repeat(39,minmax(24px, auto));
                            grid-template-columns:
                            minmax(var(--grid-gutter), 1fr)
                            repeat(8, minmax(0, var(--cell-max-width)))
                            minmax(var(--grid-gutter), 1fr);
                            row-gap: 11.0px;
                            column-gap: 11.0px;
                            }
                            @media (min-width: 768px) {
                            .background-width--inset .fe-67696e57288ad26096a7f779 {
                            --inset-padding: calc(var(--sqs-site-gutter) * 2);
                            }
                            .fe-67696e57288ad26096a7f779 {
                            --grid-gutter: calc(var(--sqs-site-gutter, 4vw) - 11.0px);
                            --cell-max-width: calc( ( var(--sqs-site-max-width, 1500px) - (11.0px * (24 - 1)) ) / 24 );
                            --inset-padding: 0vw;
                            --row-height-scaling-factor: 0.0215;
                            --container-width: min(var(--sqs-site-max-width, 1500px), calc(100vw - var(--sqs-site-gutter, 4vw) * 2 - var(--inset-padding) ));
                            grid-template-rows: repeat(22,minmax(calc(var(--container-width) * var(--row-height-scaling-factor)), auto));
                            grid-template-columns:
                            minmax(var(--grid-gutter), 1fr)
                            repeat(24, minmax(0, var(--cell-max-width)))
                            minmax(var(--grid-gutter), 1fr);
                            }
                            }
                            .fe-block-yui_3_17_2_1_1734962222867_5218 {
                            grid-area: 1/2/12/10;
                            z-index: 3;
                            @media (max-width: 767px) {
                            }
                            }
                            .fe-block-yui_3_17_2_1_1734962222867_5218 .sqs-block {
                            justify-content: flex-start;
                            }
                            .fe-block-yui_3_17_2_1_1734962222867_5218 .sqs-block-alignment-wrapper {
                            align-items: flex-start;
                            }
                            @media (min-width: 768px) {
                            .fe-block-yui_3_17_2_1_1734962222867_5218 {
                            grid-area: 3/3/13/14;
                            z-index: 3;
                            }
                            .fe-block-yui_3_17_2_1_1734962222867_5218 .sqs-block {
                            justify-content: flex-start;
                            }
                            .fe-block-yui_3_17_2_1_1734962222867_5218 .sqs-block-alignment-wrapper {
                            align-items: flex-start;
                            }
                            }
                            .fe-block-0777fa60763fce61d683 {
                            grid-area: 20/2/38/10;
                            z-index: 2;
                            @media (max-width: 767px) {
                            }
                            }
                            .fe-block-0777fa60763fce61d683 .sqs-block {
                            justify-content: center;
                            }
                            .fe-block-0777fa60763fce61d683 .sqs-block-alignment-wrapper {
                            align-items: center;
                            }
                            @media (min-width: 768px) {
                            .fe-block-0777fa60763fce61d683 {
                            grid-area: 2/15/23/25;
                            z-index: 2;
                            }
                            .fe-block-0777fa60763fce61d683 .sqs-block {
                            justify-content: center;
                            }
                            .fe-block-0777fa60763fce61d683 .sqs-block-alignment-wrapper {
                            align-items: center;
                            }
                            }
                            .fe-block-yui_3_17_2_1_1734962222867_15228 {
                            grid-area: 12/2/22/10;
                            z-index: 4;
                            @media (max-width: 767px) {
                            }
                            }
                            .fe-block-yui_3_17_2_1_1734962222867_15228 .sqs-block {
                            justify-content: flex-start;
                            }
                            .fe-block-yui_3_17_2_1_1734962222867_15228 .sqs-block-alignment-wrapper {
                            align-items: flex-start;
                            }
                            @media (min-width: 768px) {
                            .fe-block-yui_3_17_2_1_1734962222867_15228 {
                            grid-area: 13/3/23/14;
                            z-index: 4;
                            }
                            .fe-block-yui_3_17_2_1_1734962222867_15228 .sqs-block {
                            justify-content: flex-start;
                            }
                            .fe-block-yui_3_17_2_1_1734962222867_15228 .sqs-block-alignment-wrapper {
                            align-items: flex-start;
                            }
                            }
                        </style>
                        <div class="fluid-engine fe-67696e57288ad26096a7f779" id="yui_3_17_2_1_1751005554247_74">
                            <div class="fe-block fe-block-yui_3_17_2_1_1734962222867_5218" style="mix-blend-mode: normal;">
                                <div class="sqs-block html-block sqs-block-html" data-blend-mode="NORMAL" data-block-type="2" data-border-radii="{&quot;topLeft&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;value&quot;:0.0},&quot;topRight&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;value&quot;:0.0},&quot;bottomLeft&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;value&quot;:0.0},&quot;bottomRight&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;value&quot;:0.0}}" id="block-yui_3_17_2_1_1734962222867_5218">
                                <div class="sqs-block-content">
                                    <div class="sqs-html-content">
                                        <h3 style="text-align:right;white-space:pre-wrap;"><strong>Europe</strong></h3>
                                        <p class="sqsrte-small" style="white-space:pre-wrap;">A bespoke, one-on-one journey with the designer at our exclusive Bridal Atelier</p>
                                        <p style="text-align:center;white-space:pre-wrap;" class="sqsrte-small" data-rte-preserve-empty="true"></p>
                                        <p style="text-align:center;white-space:pre-wrap;" class="sqsrte-small">Email: atelier@blanc-wear.com</p>
                                        <p style="text-align:center;white-space:pre-wrap;" class="">Amsterdam, The Netherlands</p>
                                        <p class="" data-rte-preserve-empty="true" style="white-space:pre-wrap;"></p>
                                        <p style="text-align:center;white-space:pre-wrap;" class="" data-rte-preserve-empty="true"></p>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="fe-block fe-block-0777fa60763fce61d683" id="yui_3_17_2_1_1751005554247_73">
                                <div class="sqs-block image-block sqs-block-image sqs-stretched sqs-text-ready" data-aspect-ratio="109.69469737546866" data-block-type="5" id="block-0777fa60763fce61d683">
                                <div class="sqs-block-content" id="yui_3_17_2_1_1751005554247_72" style="height: 100%; width: 100%;">
                                    <div class="image-block-outer-wrapper layout-caption-below design-layout-fluid image-position-center combination-animation-site-default individual-animation-site-default animation-loaded" data-test="image-block-fluid-outer-wrapper" id="yui_3_17_2_1_1751005554247_71">
                                        <div class="fluid-image-animation-wrapper sqs-image sqs-block-alignment-wrapper" data-animation-role="image" id="yui_3_17_2_1_1751005554247_70">
                                            <div class="fluid-image-container sqs-image-content" style="overflow: hidden;-webkit-mask-image: -webkit-radial-gradient(white, black);position: relative;width: 100%;height: 100%;" id="yui_3_17_2_1_1751005554247_69">
                                                <div class="content-fill" id="yui_3_17_2_1_1751005554247_65">
                                                    <img data-stretch="true" data-image-dimensions="4480x6720" data-image-focal-point="0.5,0.5" alt="" data-load="false" elementtiming="system-image-block" src="<?= get_the_post_thumbnail_url(); ?>" width="4480" height="6720" sizes="100vw" style="display:block;object-fit: cover; object-position: 50% 50%"  loading="lazy" decoding="async" data-loader="sqs">
                                                    <div class="fluidImageOverlay"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <style>
                                        .sqs-block-image .sqs-block-content {
                                        height: 100%;
                                        width: 100%;
                                        }
                                        .fe-block-0777fa60763fce61d683 .fluidImageOverlay {
                                        position: absolute;
                                        top: 0;
                                        left: 0;
                                        width: 100%;
                                        height: 100%;
                                        mix-blend-mode: normal;
                                        opacity: 0;
                                        }
                                    </style>
                                </div>
                                </div>
                            </div>
                            <div class="fe-block fe-block-yui_3_17_2_1_1734962222867_15228" style="mix-blend-mode: normal;">
                                <div class="sqs-block html-block sqs-block-html" data-blend-mode="NORMAL" data-block-type="2" data-border-radii="{&quot;topLeft&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;value&quot;:0.0},&quot;topRight&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;value&quot;:0.0},&quot;bottomLeft&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;value&quot;:0.0},&quot;bottomRight&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;value&quot;:0.0}}" id="block-yui_3_17_2_1_1734962222867_15228">
                                    <div class="sqs-block-content">
                                        <div class="sqs-html-content">
                                            <h3 style="text-align:right;white-space:pre-wrap;"><strong>Australia</strong></h3>
                                            <h4 style="text-align:center;white-space:pre-wrap;"><a href="https://www.sundayevebridal.com.au/" target="_blank"><em>Sunday Eve Bridal</em></a></h4>
                                            <p style="text-align:center;white-space:pre-wrap;" class="sqsrte-small">1/160 Flinders Street</p>
                                            <p style="text-align:center;white-space:pre-wrap;" class="sqsrte-small">Paddington NSW 2021</p>
                                            <p style="text-align:center;white-space:pre-wrap;" class="sqsrte-small">Email: hello@sundayevebridal.com.au</p>
                                            <p class="sqsrte-small" data-rte-preserve-empty="true" style="white-space:pre-wrap;"></p>
                                            <p style="text-align:center;white-space:pre-wrap;" class="" data-rte-preserve-empty="true"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
    </article>
</main>
<?php get_footer(); ?>