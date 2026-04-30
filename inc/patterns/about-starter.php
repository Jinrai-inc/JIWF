<?php
/**
 * About page — full starter layout. Insert once into a new "About" page
 * to scaffold every section; then edit the copy inline.
 */
return <<<'HTML'
<!-- wp:group {"tagName":"section","className":"page-hero","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","bottom":"var:preset|spacing|80","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"ivory-warm","layout":{"type":"constrained"}} -->
<section class="wp-block-group page-hero has-ivory-warm-background-color has-background" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--50)">
<!-- wp:paragraph {"align":"center","fontSize":"xs","style":{"typography":{"letterSpacing":"0.3em","textTransform":"uppercase"}},"textColor":"gold"} --><p class="has-text-align-center has-gold-color has-text-color has-xs-font-size" style="letter-spacing:0.3em;text-transform:uppercase">About JIWF Academy</p><!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","level":1,"fontSize":"4xl"} --><h1 class="wp-block-heading has-text-align-center has-4xl-font-size">A new education for a new civilization.</h1><!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"lg","textColor":"text-muted"} --><p class="has-text-align-center has-text-muted-color has-text-color has-lg-font-size">JIWF Academy is not merely an educational institution — it is a movement that reimagines leadership, learning, and human possibility for the 21st century and beyond.</p><!-- /wp:paragraph -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"section section--lg section--ivory","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","bottom":"var:preset|spacing|90"}}},"backgroundColor":"ivory","layout":{"type":"constrained","contentSize":"720px"}} -->
<section class="wp-block-group section section--lg section--ivory has-ivory-background-color has-background" style="padding-top:var(--wp--preset--spacing--90);padding-bottom:var(--wp--preset--spacing--90)">
<!-- wp:html --><div class="jiwf-divider" aria-hidden="true"><span class="jiwf-divider__line"></span><span class="jiwf-divider__symbol">✦</span><span class="jiwf-divider__line"></span></div><!-- /wp:html -->
<!-- wp:paragraph {"align":"center","fontFamily":"display","fontSize":"2xl","style":{"typography":{"lineHeight":"1.55"}},"textColor":"navy"} --><p class="has-text-align-center has-navy-color has-text-color has-display-font-family has-2xl-font-size" style="line-height:1.55">Through the wisdom of the Bhagavad Gita, holistic well-being, and transformative leadership education, we support women in finding their purpose, cultivating inner strength, and creating meaningful change in the world.</p><!-- /wp:paragraph -->
<!-- wp:html --><div class="jiwf-divider" aria-hidden="true"><span class="jiwf-divider__line"></span><span class="jiwf-divider__symbol">✦</span><span class="jiwf-divider__line"></span></div><!-- /wp:html -->
</section>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"jiwf/mvv"} /-->

<!-- wp:pattern {"slug":"jiwf/timeline"} /-->

<!-- wp:pattern {"slug":"jiwf/philosophy"} /-->

<!-- wp:pattern {"slug":"jiwf/closing-cta"} /-->
HTML;
