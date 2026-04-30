<?php
/**
 * Partners — type label + horizontal logo row.
 */
return <<<'HTML'
<!-- wp:group {"tagName":"section","className":"section section--ivory","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","bottom":"var:preset|spacing|90"}}},"backgroundColor":"ivory","layout":{"type":"constrained","contentSize":"1200px"}} -->
<section class="wp-block-group section section--ivory has-ivory-background-color has-background" style="padding-top:var(--wp--preset--spacing--90);padding-bottom:var(--wp--preset--spacing--90)">

<!-- wp:paragraph {"align":"center","className":"eyebrow","fontSize":"xs","style":{"typography":{"letterSpacing":"0.25em","textTransform":"uppercase","fontWeight":"500"}},"textColor":"gold"} -->
<p class="has-text-align-center eyebrow has-gold-color has-text-color has-xs-font-size" style="font-weight:500;letter-spacing:0.25em;text-transform:uppercase">創設パートナー</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<div class="partner-row">
	<span class="partner-row__city"><em>Tokyo</em></span>
	<span class="partner-row__city"><em>Mumbai</em></span>
	<span class="partner-row__city"><em>New Delhi</em></span>
	<span class="partner-row__city"><em>Yokohama</em></span>
	<span class="partner-row__city"><em>Kyoto</em></span>
</div>
<!-- /wp:html -->

<!-- wp:spacer {"height":"var:preset|spacing|70"} --><div style="height:var(--wp--preset--spacing--70)" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->

<!-- wp:paragraph {"align":"center","className":"eyebrow","fontSize":"xs","style":{"typography":{"letterSpacing":"0.25em","textTransform":"uppercase","fontWeight":"500"}},"textColor":"gold"} -->
<p class="has-text-align-center eyebrow has-gold-color has-text-color has-xs-font-size" style="font-weight:500;letter-spacing:0.25em;text-transform:uppercase">教育パートナー</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<div class="partner-row">
	<span class="partner-row__city"><em>こちらにロゴまたはパートナー名を追加</em></span>
</div>
<!-- /wp:html -->

</section>
<!-- /wp:group -->
HTML;
