<?php
/**
 * Page hero — eyebrow + title + lead. Use as the first block on any page.
 */
return <<<'HTML'
<!-- wp:group {"tagName":"section","className":"page-hero","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","bottom":"var:preset|spacing|80","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"ivory-warm","layout":{"type":"constrained"}} -->
<section class="wp-block-group page-hero has-ivory-warm-background-color has-background" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--50)">

<!-- wp:paragraph {"align":"center","className":"page-hero__eyebrow","fontSize":"xs","style":{"typography":{"letterSpacing":"0.3em","textTransform":"uppercase"}},"textColor":"gold"} -->
<p class="has-text-align-center page-hero__eyebrow has-gold-color has-text-color has-xs-font-size" style="letter-spacing:0.3em;text-transform:uppercase">私たちについて</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":1,"className":"page-hero__title","fontSize":"4xl"} -->
<h1 class="wp-block-heading has-text-align-center page-hero__title has-4xl-font-size">新しい文明のための、新しい教育</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"page-hero__lead","fontSize":"lg","textColor":"text-muted"} -->
<p class="has-text-align-center page-hero__lead has-text-muted-color has-text-color has-lg-font-size">富士からヒマラヤへ。智慧を生き、未来を創る女性たちのデジタルキャンパス。</p>
<!-- /wp:paragraph -->

</section>
<!-- /wp:group -->
HTML;
