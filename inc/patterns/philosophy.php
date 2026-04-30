<?php
/**
 * Philosophy block — 4 principles on a navy background.
 */
return <<<'HTML'
<!-- wp:group {"tagName":"section","className":"section section--lg section--navy","style":{"spacing":{"padding":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"}}},"backgroundColor":"navy","textColor":"ivory","layout":{"type":"constrained","contentSize":"720px"}} -->
<section class="wp-block-group section section--lg section--navy has-ivory-color has-navy-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--100);padding-bottom:var(--wp--preset--spacing--100)">

<!-- wp:heading {"textAlign":"center","level":2,"fontFamily":"jp-serif","fontSize":"3xl","style":{"typography":{"fontWeight":"500"}},"textColor":"gold-light"} -->
<h2 class="wp-block-heading has-text-align-center has-gold-light-color has-text-color has-jp-serif-font-family has-3xl-font-size" style="font-weight:500">「How to Live」を学ぶ教育</h2>
<!-- /wp:heading -->

<!-- wp:html -->
<div class="jiwf-divider jiwf-divider--on-dark" aria-hidden="true"><span class="jiwf-divider__line"></span><span class="jiwf-divider__symbol">✦</span><span class="jiwf-divider__line"></span></div>
<!-- /wp:html -->

<!-- wp:list {"className":"philosophy__list","style":{"typography":{"fontFamily":"var:preset|font-family|jp-serif","fontSize":"var:preset|font-size|xl","letterSpacing":"0.08em","lineHeight":"1.9"},"spacing":{"blockGap":"var:preset|spacing|60"}},"textColor":"gold-light"} -->
<ul class="philosophy__list has-gold-light-color has-text-color" style="font-family:var(--wp--preset--font-family--jp-serif);font-size:var(--wp--preset--font-size--xl);letter-spacing:0.08em;line-height:1.9">
<!-- wp:list-item -->
<li>✦ &nbsp; 知識のためではなく、智慧のために</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>✦ &nbsp; 成功のためではなく、使命のために</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>✦ &nbsp; 競争のためではなく、調和と共創のために</li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li>✦ &nbsp; 自分のためだけでなく、社会への貢献のために</li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->

</section>
<!-- /wp:group -->
HTML;
