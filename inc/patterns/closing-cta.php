<?php
/**
 * Closing CTA — gradient backdrop with three buttons.
 */
return <<<'HTML'
<!-- wp:group {"tagName":"section","className":"closing-cta","style":{"spacing":{"padding":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<section class="wp-block-group closing-cta" style="padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--50)">

<!-- wp:heading {"textAlign":"center","fontSize":"4xl","style":{"typography":{"fontStyle":"italic","fontWeight":"400"}}} -->
<h2 class="wp-block-heading has-text-align-center has-4xl-font-size" style="font-style:italic;font-weight:400">Women rising — reshaping themselves, reshaping the world.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"lg"} -->
<p class="has-text-align-center has-lg-font-size">The future belongs to those who act with wisdom, compassion, and purpose.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"className":"is-style-outline btn btn--outline btn--on-dark"} --><div class="wp-block-button is-style-outline btn btn--outline btn--on-dark"><a class="wp-block-button__link wp-element-button" href="/contact/">Contact</a></div><!-- /wp:button -->
<!-- wp:button {"className":"is-style-outline btn btn--outline btn--on-dark"} --><div class="wp-block-button is-style-outline btn btn--outline btn--on-dark"><a class="wp-block-button__link wp-element-button" href="/contact/?topic=newsletter">Newsletter</a></div><!-- /wp:button -->
<!-- wp:button {"className":"is-style-outline btn btn--outline btn--on-dark"} --><div class="wp-block-button is-style-outline btn btn--outline btn--on-dark"><a class="wp-block-button__link wp-element-button" href="/contact/?topic=partnership">Partner with us</a></div><!-- /wp:button -->
</div>
<!-- /wp:buttons -->

</section>
<!-- /wp:group -->
HTML;
