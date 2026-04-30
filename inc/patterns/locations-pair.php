<?php
/**
 * Locations — Japan + India full split (image + body), alternating sides.
 */
return <<<'HTML'
<!-- wp:group {"tagName":"section","className":"section section--ivory","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","bottom":"var:preset|spacing|90"}}},"backgroundColor":"ivory","layout":{"type":"constrained","contentSize":"1200px"}} -->
<section class="wp-block-group section section--ivory has-ivory-background-color has-background" style="padding-top:var(--wp--preset--spacing--90);padding-bottom:var(--wp--preset--spacing--90)">

<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|80","left":"var:preset|spacing|80"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center">
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:image {"sizeSlug":"large","className":"image-frame"} --><figure class="wp-block-image size-large image-frame"><img alt="Japan — Mt. Fuji"/></figure><!-- /wp:image -->
</div>
<!-- /wp:column -->
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:paragraph {"className":"eyebrow","fontSize":"xs","style":{"typography":{"letterSpacing":"0.3em","textTransform":"uppercase","fontWeight":"500"}},"textColor":"gold"} --><p class="eyebrow has-gold-color has-text-color has-xs-font-size" style="font-weight:500;letter-spacing:0.3em;text-transform:uppercase">Japan</p><!-- /wp:paragraph -->
<!-- wp:heading {"fontSize":"3xl","style":{"typography":{"fontStyle":"italic","fontWeight":"400"}}} --><h2 class="wp-block-heading has-3xl-font-size" style="font-style:italic;font-weight:400">At the foot of Mount Fuji</h2><!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"lg","textColor":"text-muted"} --><p class="has-text-muted-color has-text-color has-lg-font-size">A place of stillness and study. Seasonal retreats, in-person workshops, and community gatherings — held within sight of the sacred peak.</p><!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"var:preset|spacing|80"} --><div style="height:var(--wp--preset--spacing--80)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|80","left":"var:preset|spacing|80"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center">
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:paragraph {"className":"eyebrow","fontSize":"xs","style":{"typography":{"letterSpacing":"0.3em","textTransform":"uppercase","fontWeight":"500"}},"textColor":"gold"} --><p class="eyebrow has-gold-color has-text-color has-xs-font-size" style="font-weight:500;letter-spacing:0.3em;text-transform:uppercase">India</p><!-- /wp:paragraph -->
<!-- wp:heading {"fontSize":"3xl","style":{"typography":{"fontStyle":"italic","fontWeight":"400"}}} --><h2 class="wp-block-heading has-3xl-font-size" style="font-style:italic;font-weight:400">Within the embrace of the Himalayas</h2><!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"lg","textColor":"text-muted"} --><p class="has-text-muted-color has-text-color has-lg-font-size">A place to touch the source. International retreats, dialogues with local faculty, and pilgrimages to the lands where the wisdom was first heard.</p><!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:image {"sizeSlug":"large","className":"image-frame"} --><figure class="wp-block-image size-large image-frame"><img alt="India — Himalayas"/></figure><!-- /wp:image -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

</section>
<!-- /wp:group -->
HTML;
