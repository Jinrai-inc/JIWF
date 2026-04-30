<?php
/**
 * Community page — starter layout (Japanese base).
 */
return <<<'HTML'
<!-- wp:group {"tagName":"section","className":"page-hero","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","bottom":"var:preset|spacing|80","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"ivory-warm","layout":{"type":"constrained"}} -->
<section class="wp-block-group page-hero has-ivory-warm-background-color has-background" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--50)">
<!-- wp:paragraph {"align":"center","fontSize":"xs","style":{"typography":{"letterSpacing":"0.3em","textTransform":"uppercase"}},"textColor":"gold"} --><p class="has-text-align-center has-gold-color has-text-color has-xs-font-size" style="letter-spacing:0.3em;text-transform:uppercase">Community</p><!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","level":1,"fontFamily":"jp-serif","fontSize":"4xl","style":{"typography":{"fontWeight":"500"}}} --><h1 class="wp-block-heading has-text-align-center has-jp-serif-font-family has-4xl-font-size" style="font-weight:500">共に歩むパートナーたち</h1><!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"lg","textColor":"text-muted"} --><p class="has-text-align-center has-text-muted-color has-text-color has-lg-font-size">JIWF Academy を支える、世界中のパートナー・スポンサー。</p><!-- /wp:paragraph -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"section section--ivory-warm","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","bottom":"var:preset|spacing|90"}}},"backgroundColor":"ivory-warm","layout":{"type":"constrained","contentSize":"1200px"}} -->
<section class="wp-block-group section section--ivory-warm has-ivory-warm-background-color has-background" style="padding-top:var(--wp--preset--spacing--90);padding-bottom:var(--wp--preset--spacing--90)">

<!-- wp:heading {"textAlign":"center","fontFamily":"jp-serif","fontSize":"3xl","style":{"typography":{"fontWeight":"500"}}} --><h2 class="wp-block-heading has-text-align-center has-jp-serif-font-family has-3xl-font-size" style="font-weight:500">パートナーシップの種類</h2><!-- /wp:heading -->

<!-- wp:columns {"className":"card-grid card-grid--3"} -->
<div class="wp-block-columns card-grid card-grid--3">
<!-- wp:column {"className":"card"} --><div class="wp-block-column card">
<!-- wp:heading {"level":3,"className":"card__title","fontFamily":"jp-serif"} --><h3 class="wp-block-heading card__title has-jp-serif-font-family">創設パートナー</h3><!-- /wp:heading -->
<!-- wp:paragraph {"className":"card__excerpt","textColor":"text-muted"} --><p class="card__excerpt has-text-muted-color has-text-color">JIWF Academy の理念に深く共鳴し、創設期から共に基盤を築いてくださる方々。</p><!-- /wp:paragraph -->
</div><!-- /wp:column -->
<!-- wp:column {"className":"card"} --><div class="wp-block-column card">
<!-- wp:heading {"level":3,"className":"card__title","fontFamily":"jp-serif"} --><h3 class="wp-block-heading card__title has-jp-serif-font-family">教育パートナー</h3><!-- /wp:heading -->
<!-- wp:paragraph {"className":"card__excerpt","textColor":"text-muted"} --><p class="card__excerpt has-text-muted-color has-text-color">大学・研究機関・教育団体として、知の共創と交流に参加してくださる組織。</p><!-- /wp:paragraph -->
</div><!-- /wp:column -->
<!-- wp:column {"className":"card"} --><div class="wp-block-column card">
<!-- wp:heading {"level":3,"className":"card__title","fontFamily":"jp-serif"} --><h3 class="wp-block-heading card__title has-jp-serif-font-family">法人スポンサー</h3><!-- /wp:heading -->
<!-- wp:paragraph {"className":"card__excerpt","textColor":"text-muted"} --><p class="card__excerpt has-text-muted-color has-text-color">企業として、女性リーダー育成という社会的価値の創出を共に担ってくださる方々。</p><!-- /wp:paragraph -->
</div><!-- /wp:column -->
</div>
<!-- /wp:columns -->

</section>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"jiwf/partners"} /-->

<!-- wp:pattern {"slug":"jiwf/closing-cta"} /-->
HTML;
