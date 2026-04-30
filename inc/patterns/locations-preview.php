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
<!-- wp:heading {"textAlign":"center","fontFamily":"jp-serif","fontSize":"3xl","style":{"typography":{"fontWeight":"500"}}} --><h2 class="wp-block-heading has-text-align-center has-jp-serif-font-family has-3xl-font-size" style="font-weight:500">ふたつの聖地から</h2><!-- /wp:heading -->
</div>
<!-- /wp:group -->

<!-- wp:columns {"className":"locations-preview"} -->
<div class="wp-block-columns locations-preview">

<!-- wp:column {"className":"locations-preview__card"} -->
<div class="wp-block-column locations-preview__card">
<!-- wp:image {"className":"locations-preview__image","sizeSlug":"large"} --><figure class="wp-block-image size-large locations-preview__image"><img alt="富士山"/></figure><!-- /wp:image -->
<!-- wp:heading {"level":3,"className":"locations-preview__country","fontFamily":"jp-serif","fontSize":"2xl","style":{"typography":{"fontWeight":"500"}}} --><h3 class="wp-block-heading locations-preview__country has-jp-serif-font-family has-2xl-font-size" style="font-weight:500">富士（日本）<small>Fuji, Japan</small></h3><!-- /wp:heading -->
<!-- wp:paragraph {"className":"locations-preview__caption","textColor":"text-muted"} --><p class="locations-preview__caption has-text-muted-color has-text-color">富士の麓での学びとリトリート。</p><!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column {"className":"locations-preview__card"} -->
<div class="wp-block-column locations-preview__card">
<!-- wp:image {"className":"locations-preview__image","sizeSlug":"large"} --><figure class="wp-block-image size-large locations-preview__image"><img alt="ヒマラヤ"/></figure><!-- /wp:image -->
<!-- wp:heading {"level":3,"className":"locations-preview__country","fontFamily":"jp-serif","fontSize":"2xl","style":{"typography":{"fontWeight":"500"}}} --><h3 class="wp-block-heading locations-preview__country has-jp-serif-font-family has-2xl-font-size" style="font-weight:500">ヒマラヤ（インド）<small>Himalayas, India</small></h3><!-- /wp:heading -->
<!-- wp:paragraph {"className":"locations-preview__caption","textColor":"text-muted"} --><p class="locations-preview__caption has-text-muted-color has-text-color">ヒマラヤの聖地での内観と探求。</p><!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

</section>
<!-- /wp:group -->
HTML;
