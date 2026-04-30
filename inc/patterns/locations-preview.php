<?php
/**
 * Locations preview — two clickable cards (Fuji + Himalaya).
 */
return <<<'HTML'
<!-- wp:group {"tagName":"section","className":"section section--ivory","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","bottom":"var:preset|spacing|90"}}},"backgroundColor":"ivory","layout":{"type":"constrained","contentSize":"1200px"}} -->
<section class="wp-block-group section section--ivory has-ivory-background-color has-background" style="padding-top:var(--wp--preset--spacing--90);padding-bottom:var(--wp--preset--spacing--90)">

<!-- wp:group {"className":"section__head","layout":{"type":"constrained"}} -->
<div class="wp-block-group section__head">
<!-- wp:paragraph {"align":"center","className":"eyebrow","fontSize":"xs","style":{"typography":{"letterSpacing":"0.25em","textTransform":"uppercase","fontWeight":"500"}},"textColor":"gold"} --><p class="has-text-align-center eyebrow has-gold-color has-text-color has-xs-font-size" style="font-weight:500;letter-spacing:0.25em;text-transform:uppercase">Our Locations</p><!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","fontSize":"3xl","style":{"typography":{"fontStyle":"italic","fontWeight":"400"}}} --><h2 class="wp-block-heading has-text-align-center has-3xl-font-size" style="font-style:italic;font-weight:400">From two sacred lands</h2><!-- /wp:heading -->
</div>
<!-- /wp:group -->

<!-- wp:columns {"className":"locations-preview"} -->
<div class="wp-block-columns locations-preview">

<!-- wp:column {"className":"locations-preview__card"} -->
<div class="wp-block-column locations-preview__card">
<!-- wp:image {"className":"locations-preview__image","sizeSlug":"large"} --><figure class="wp-block-image size-large locations-preview__image"><img alt="Mt. Fuji"/></figure><!-- /wp:image -->
<!-- wp:heading {"level":3,"className":"locations-preview__country","fontFamily":"display","fontSize":"2xl","style":{"typography":{"fontStyle":"italic","fontWeight":"400"}}} --><h3 class="wp-block-heading locations-preview__country has-display-font-family has-2xl-font-size" style="font-style:italic;font-weight:400"><em>Fuji (Japan)</em><small> 富士</small></h3><!-- /wp:heading -->
<!-- wp:paragraph {"className":"locations-preview__caption","textColor":"text-muted"} --><p class="locations-preview__caption has-text-muted-color has-text-color">Learning and retreat at the foot of Mount Fuji.</p><!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column {"className":"locations-preview__card"} -->
<div class="wp-block-column locations-preview__card">
<!-- wp:image {"className":"locations-preview__image","sizeSlug":"large"} --><figure class="wp-block-image size-large locations-preview__image"><img alt="Himalayas"/></figure><!-- /wp:image -->
<!-- wp:heading {"level":3,"className":"locations-preview__country","fontFamily":"display","fontSize":"2xl","style":{"typography":{"fontStyle":"italic","fontWeight":"400"}}} --><h3 class="wp-block-heading locations-preview__country has-display-font-family has-2xl-font-size" style="font-style:italic;font-weight:400"><em>Himalayas (India)</em><small> ヒマラヤ</small></h3><!-- /wp:heading -->
<!-- wp:paragraph {"className":"locations-preview__caption","textColor":"text-muted"} --><p class="locations-preview__caption has-text-muted-color has-text-color">Inner inquiry within the embrace of the Himalayas.</p><!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

</section>
<!-- /wp:group -->
HTML;
