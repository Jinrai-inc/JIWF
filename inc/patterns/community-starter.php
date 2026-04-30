<?php
/**
 * Community page — starter layout.
 */
return <<<'HTML'
<!-- wp:group {"tagName":"section","className":"page-hero","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","bottom":"var:preset|spacing|80","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"ivory-warm","layout":{"type":"constrained"}} -->
<section class="wp-block-group page-hero has-ivory-warm-background-color has-background" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--50)">
<!-- wp:paragraph {"align":"center","fontSize":"xs","style":{"typography":{"letterSpacing":"0.3em","textTransform":"uppercase"}},"textColor":"gold"} --><p class="has-text-align-center has-gold-color has-text-color has-xs-font-size" style="letter-spacing:0.3em;text-transform:uppercase">Community</p><!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","level":1,"fontSize":"4xl"} --><h1 class="wp-block-heading has-text-align-center has-4xl-font-size">Walking together.</h1><!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"lg","textColor":"text-muted"} --><p class="has-text-align-center has-text-muted-color has-text-color has-lg-font-size">A worldwide circle of partners and sponsors who walk with JIWF Academy.</p><!-- /wp:paragraph -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"section section--ivory-warm","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","bottom":"var:preset|spacing|90"}}},"backgroundColor":"ivory-warm","layout":{"type":"constrained","contentSize":"1200px"}} -->
<section class="wp-block-group section section--ivory-warm has-ivory-warm-background-color has-background" style="padding-top:var(--wp--preset--spacing--90);padding-bottom:var(--wp--preset--spacing--90)">

<!-- wp:heading {"textAlign":"center","fontSize":"3xl","style":{"typography":{"fontStyle":"italic","fontWeight":"400"}}} --><h2 class="wp-block-heading has-text-align-center has-3xl-font-size" style="font-style:italic;font-weight:400">Partnership Types</h2><!-- /wp:heading -->

<!-- wp:columns {"className":"card-grid card-grid--3"} -->
<div class="wp-block-columns card-grid card-grid--3">
<!-- wp:column {"className":"card"} --><div class="wp-block-column card">
<!-- wp:heading {"level":3,"className":"card__title"} --><h3 class="wp-block-heading card__title">Founding Partner</h3><!-- /wp:heading -->
<!-- wp:paragraph {"className":"card__excerpt","textColor":"text-muted"} --><p class="card__excerpt has-text-muted-color has-text-color">Those who deeply resonate with JIWF Academy's vision and help build the foundation from the very beginning.</p><!-- /wp:paragraph -->
</div><!-- /wp:column -->
<!-- wp:column {"className":"card"} --><div class="wp-block-column card">
<!-- wp:heading {"level":3,"className":"card__title"} --><h3 class="wp-block-heading card__title">Educational Partner</h3><!-- /wp:heading -->
<!-- wp:paragraph {"className":"card__excerpt","textColor":"text-muted"} --><p class="card__excerpt has-text-muted-color has-text-color">Universities, research institutions, and educational organisations co-creating knowledge across borders.</p><!-- /wp:paragraph -->
</div><!-- /wp:column -->
<!-- wp:column {"className":"card"} --><div class="wp-block-column card">
<!-- wp:heading {"level":3,"className":"card__title"} --><h3 class="wp-block-heading card__title">Corporate Sponsor</h3><!-- /wp:heading -->
<!-- wp:paragraph {"className":"card__excerpt","textColor":"text-muted"} --><p class="card__excerpt has-text-muted-color has-text-color">Companies investing in the social value of nurturing women leaders.</p><!-- /wp:paragraph -->
</div><!-- /wp:column -->
</div>
<!-- /wp:columns -->

</section>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"jiwf/partners"} /-->

<!-- wp:pattern {"slug":"jiwf/closing-cta"} /-->
HTML;
