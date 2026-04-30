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
<!-- wp:heading {"textAlign":"center","fontSize":"3xl","style":{"typography":{"fontStyle":"italic","fontWeight":"400"}}} -->
<h2 class="wp-block-heading has-text-align-center has-3xl-font-size" style="font-style:italic;font-weight:400">Our Story</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->

<!-- wp:html -->
<ol class="timeline">
	<li class="timeline__item">
		<div class="timeline__year">2026</div>
		<h3 class="timeline__title">GITA Japan Summit</h3>
		<p class="timeline__text">The GITA Japan Summit gives birth to the vision of JIWF Academy.</p>
	</li>
	<li class="timeline__item">
		<div class="timeline__year">2026</div>
		<h3 class="timeline__title">JIWF Academy founded</h3>
		<p class="timeline__text">A digital campus for women — bridging Japan and India.</p>
	</li>
	<li class="timeline__item">
		<div class="timeline__year">→</div>
		<h3 class="timeline__title">Toward the future</h3>
		<p class="timeline__text">Programs, retreats, and a global circle of women living the wisdom.</p>
	</li>
</ol>
<!-- /wp:html -->

</section>
<!-- /wp:group -->
HTML;
