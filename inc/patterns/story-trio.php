<?php
/**
 * Story trio — three image columns (Stillness / Wisdom / Grandeur).
 * Editors should drag image blocks into the placeholders.
 */
return <<<'HTML'
<!-- wp:group {"tagName":"section","className":"section section--ivory-warm","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","bottom":"var:preset|spacing|90"}}},"backgroundColor":"ivory-warm","layout":{"type":"constrained","contentSize":"1200px"}} -->
<section class="wp-block-group section section--ivory-warm has-ivory-warm-background-color has-background" style="padding-top:var(--wp--preset--spacing--90);padding-bottom:var(--wp--preset--spacing--90)">

<!-- wp:columns {"className":"story-trio"} -->
<div class="wp-block-columns story-trio">

<!-- wp:column {"className":"story-trio__item"} -->
<div class="wp-block-column story-trio__item">
<!-- wp:image {"className":"story-trio__image","sizeSlug":"large"} --><figure class="wp-block-image size-large story-trio__image"><img alt="Stillness"/></figure><!-- /wp:image -->
<!-- wp:paragraph {"align":"center","className":"story-trio__label","fontFamily":"display","fontSize":"2xl","style":{"typography":{"fontStyle":"italic"}}} --><p class="has-text-align-center story-trio__label has-display-font-family has-2xl-font-size" style="font-style:italic"><em>Stillness</em><br><small>静謐</small></p><!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column {"className":"story-trio__item"} -->
<div class="wp-block-column story-trio__item">
<!-- wp:image {"className":"story-trio__image","sizeSlug":"large"} --><figure class="wp-block-image size-large story-trio__image"><img alt="Wisdom"/></figure><!-- /wp:image -->
<!-- wp:paragraph {"align":"center","className":"story-trio__label","fontFamily":"display","fontSize":"2xl","style":{"typography":{"fontStyle":"italic"}}} --><p class="has-text-align-center story-trio__label has-display-font-family has-2xl-font-size" style="font-style:italic"><em>Wisdom</em><br><small>智慧</small></p><!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column {"className":"story-trio__item"} -->
<div class="wp-block-column story-trio__item">
<!-- wp:image {"className":"story-trio__image","sizeSlug":"large"} --><figure class="wp-block-image size-large story-trio__image"><img alt="Grandeur"/></figure><!-- /wp:image -->
<!-- wp:paragraph {"align":"center","className":"story-trio__label","fontFamily":"display","fontSize":"2xl","style":{"typography":{"fontStyle":"italic"}}} --><p class="has-text-align-center story-trio__label has-display-font-family has-2xl-font-size" style="font-style:italic"><em>Grandeur</em><br><small>壮大</small></p><!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

</section>
<!-- /wp:group -->
HTML;
