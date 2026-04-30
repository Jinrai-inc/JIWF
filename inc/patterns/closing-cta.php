<?php
/**
 * Closing CTA — gradient backdrop with three buttons.
 */
return <<<'HTML'
<!-- wp:group {"tagName":"section","className":"closing-cta","style":{"spacing":{"padding":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
<section class="wp-block-group closing-cta" style="padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--100);padding-left:var(--wp--preset--spacing--50)">

<!-- wp:heading {"textAlign":"center","fontFamily":"jp-serif","fontSize":"4xl","style":{"typography":{"fontWeight":"500","lineHeight":"1.6"}}} -->
<h2 class="wp-block-heading has-text-align-center has-jp-serif-font-family has-4xl-font-size" style="font-weight:500;line-height:1.6">女性が自らを変え、世界を変える</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"lg"} -->
<p class="has-text-align-center has-lg-font-size">未来は、智慧と慈愛、そして使命を持って行動する人のものです。</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"className":"is-style-outline btn btn--outline btn--on-dark"} --><div class="wp-block-button is-style-outline btn btn--outline btn--on-dark"><a class="wp-block-button__link wp-element-button" href="/contact/">お問い合わせ</a></div><!-- /wp:button -->
<!-- wp:button {"className":"is-style-outline btn btn--outline btn--on-dark"} --><div class="wp-block-button is-style-outline btn btn--outline btn--on-dark"><a class="wp-block-button__link wp-element-button" href="/contact/?topic=newsletter">ニュースレター登録</a></div><!-- /wp:button -->
<!-- wp:button {"className":"is-style-outline btn btn--outline btn--on-dark"} --><div class="wp-block-button is-style-outline btn btn--outline btn--on-dark"><a class="wp-block-button__link wp-element-button" href="/contact/?inquiry=partnership">パートナーとして連携</a></div><!-- /wp:button -->
</div>
<!-- /wp:buttons -->

</section>
<!-- /wp:group -->
HTML;
