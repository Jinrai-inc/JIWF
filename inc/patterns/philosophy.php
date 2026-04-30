<?php
/**
 * Philosophy block — 4 principles on a navy background.
 */
return <<<'HTML'
<!-- wp:group {"tagName":"section","className":"section section--lg section--navy","style":{"spacing":{"padding":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"}}},"backgroundColor":"navy","textColor":"ivory","layout":{"type":"constrained","contentSize":"720px"}} -->
<section class="wp-block-group section section--lg section--navy has-ivory-color has-navy-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--100);padding-bottom:var(--wp--preset--spacing--100)">

<!-- wp:heading {"textAlign":"center","level":2,"fontFamily":"display","fontSize":"3xl","style":{"typography":{"fontStyle":"italic","fontWeight":"400"}},"textColor":"gold-light"} -->
<h2 class="wp-block-heading has-text-align-center has-gold-light-color has-text-color has-display-font-family has-3xl-font-size" style="font-style:italic;font-weight:400">An education in <span style="color:var(--wp--preset--color--gold)">how to live</span>.</h2>
<!-- /wp:heading -->

<!-- wp:html -->
<div class="jiwf-divider jiwf-divider--on-dark" aria-hidden="true"><span class="jiwf-divider__line"></span><span class="jiwf-divider__symbol">✦</span><span class="jiwf-divider__line"></span></div>
<!-- /wp:html -->

<!-- wp:list {"className":"philosophy__list","style":{"typography":{"fontFamily":"var:preset|font-family|display","fontSize":"var:preset|font-size|xl","letterSpacing":"0.05em"},"spacing":{"blockGap":"var:preset|spacing|60"}},"textColor":"gold-light"} -->
<ul class="philosophy__list has-gold-light-color has-text-color" style="font-family:var(--wp--preset--font-family--display);font-size:var(--wp--preset--font-size--xl);letter-spacing:0.05em">
<!-- wp:list-item -->
<li>✦ &nbsp; Not for knowledge alone — for wisdom</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>✦ &nbsp; Not for success alone — for purpose</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>✦ &nbsp; Not for competition — for harmony and co-creation</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>✦ &nbsp; Not for the self alone — for contribution to the world</li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->

</section>
<!-- /wp:group -->
HTML;
