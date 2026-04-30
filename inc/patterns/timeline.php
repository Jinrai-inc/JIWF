<?php
/**
 * Timeline — vertical list of year + title + description rows.
 */
return <<<'HTML'
<!-- wp:group {"tagName":"section","className":"section section--ivory","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","bottom":"var:preset|spacing|90"}}},"backgroundColor":"ivory","layout":{"type":"constrained","contentSize":"720px"}} -->
<section class="wp-block-group section section--ivory has-ivory-background-color has-background" style="padding-top:var(--wp--preset--spacing--90);padding-bottom:var(--wp--preset--spacing--90)">

<!-- wp:group {"className":"section__head","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group section__head" style="margin-bottom:var(--wp--preset--spacing--70)">
<!-- wp:paragraph {"align":"center","className":"eyebrow","fontSize":"xs","style":{"typography":{"letterSpacing":"0.25em","textTransform":"uppercase","fontWeight":"500"}},"textColor":"gold"} -->
<p class="has-text-align-center eyebrow has-gold-color has-text-color has-xs-font-size" style="font-weight:500;letter-spacing:0.25em;text-transform:uppercase">Founding Story</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","fontFamily":"jp-serif","fontSize":"3xl","style":{"typography":{"fontWeight":"500"}}} -->
<h2 class="wp-block-heading has-text-align-center has-jp-serif-font-family has-3xl-font-size" style="font-weight:500">私たちの歩み</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->

<!-- wp:html -->
<ol class="timeline">
	<li class="timeline__item">
		<div class="timeline__year">2026</div>
		<h3 class="timeline__title">GITA Japan Summit 開催</h3>
		<p class="timeline__text">日本で開かれた GITA Summit を契機に、JIWF Academy の構想が始まる。</p>
	</li>
	<li class="timeline__item">
		<div class="timeline__year">2026</div>
		<h3 class="timeline__title">JIWF Academy 設立</h3>
		<p class="timeline__text">日本とインドを結ぶ、女性のためのデジタルキャンパスとして始動。</p>
	</li>
	<li class="timeline__item">
		<div class="timeline__year">→</div>
		<h3 class="timeline__title">未来へ</h3>
		<p class="timeline__text">プログラム、リトリート、そして智慧を生きる女性たちの世界的な輪へ。</p>
	</li>
</ol>
<!-- /wp:html -->

</section>
<!-- /wp:group -->
HTML;
