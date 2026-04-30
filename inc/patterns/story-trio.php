<?php
/**
 * Story trio — three image columns (静謐 / 智慧 / 壮大).
 * Editors should drag image blocks into the placeholders.
 */
return <<<'HTML'
<!-- wp:group {"tagName":"section","className":"section section--ivory-warm","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","bottom":"var:preset|spacing|90"}}},"backgroundColor":"ivory-warm","layout":{"type":"constrained","contentSize":"1200px"}} -->
<section class="wp-block-group section section--ivory-warm has-ivory-warm-background-color has-background" style="padding-top:var(--wp--preset--spacing--90);padding-bottom:var(--wp--preset--spacing--90)">

<!-- wp:columns {"className":"story-trio"} -->
<div class="wp-block-columns story-trio">

<!-- wp:column {"className":"story-trio__item"} -->
<div class="wp-block-column story-trio__item">
<!-- wp:image {"className":"story-trio__image","sizeSlug":"large"} --><figure class="wp-block-image size-large story-trio__image"><img alt="静謐"/></figure><!-- /wp:image -->
<!-- wp:paragraph {"align":"center","className":"story-trio__label","fontFamily":"jp-serif","fontSize":"2xl","style":{"typography":{"fontWeight":"500"}}} --><p class="has-text-align-center story-trio__label has-jp-serif-font-family has-2xl-font-size" style="font-weight:500"><em>静謐</em><br><small>Stillness</small></p><!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column {"className":"story-trio__item"} -->
<div class="wp-block-column story-trio__item">
<!-- wp:image {"className":"story-trio__image","sizeSlug":"large"} --><figure class="wp-block-image size-large story-trio__image"><img alt="智慧"/></figure><!-- /wp:image -->
<!-- wp:paragraph {"align":"center","className":"story-trio__label","fontFamily":"jp-serif","fontSize":"2xl","style":{"typography":{"fontWeight":"500"}}} --><p class="has-text-align-center story-trio__label has-jp-serif-font-family has-2xl-font-size" style="font-weight:500"><em>智慧</em><br><small>Wisdom</small></p><!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column {"className":"story-trio__item"} -->
<div class="wp-block-column story-trio__item">
<!-- wp:image {"className":"story-trio__image","sizeSlug":"large"} --><figure class="wp-block-image size-large story-trio__image"><img alt="壮大"/></figure><!-- /wp:image -->
<!-- wp:paragraph {"align":"center","className":"story-trio__label","fontFamily":"jp-serif","fontSize":"2xl","style":{"typography":{"fontWeight":"500"}}} --><p class="has-text-align-center story-trio__label has-jp-serif-font-family has-2xl-font-size" style="font-weight:500"><em>壮大</em><br><small>Grandeur</small></p><!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

</section>
<!-- /wp:group -->
HTML;
