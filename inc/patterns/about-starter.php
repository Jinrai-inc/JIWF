<?php
/**
 * About page — full starter layout (Japanese, brand voice).
 */
return <<<'HTML'
<!-- wp:group {"tagName":"section","className":"page-hero","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","bottom":"var:preset|spacing|80","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"ivory-warm","layout":{"type":"constrained"}} -->
<section class="wp-block-group page-hero has-ivory-warm-background-color has-background" style="padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--50)">
<!-- wp:paragraph {"align":"center","fontSize":"xs","style":{"typography":{"letterSpacing":"0.3em","textTransform":"uppercase"}},"textColor":"gold"} --><p class="has-text-align-center has-gold-color has-text-color has-xs-font-size" style="letter-spacing:0.3em;text-transform:uppercase">About JIWF Academy</p><!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","level":1,"fontFamily":"jp-serif","fontSize":"4xl","style":{"typography":{"fontWeight":"500","lineHeight":"1.5"}}} --><h1 class="wp-block-heading has-text-align-center has-jp-serif-font-family has-4xl-font-size" style="font-weight:500;line-height:1.5">新しい文明のための、新しい教育</h1><!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","fontSize":"lg","style":{"typography":{"lineHeight":"2"}},"textColor":"text-muted"} --><p class="has-text-align-center has-text-muted-color has-text-color has-lg-font-size" style="line-height:2">JIWF Academyは、単なる教育機関ではありません。<br>それは、未来を創るムーブメントです。</p><!-- /wp:paragraph -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"section section--lg section--ivory","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","bottom":"var:preset|spacing|90"}}},"backgroundColor":"ivory","layout":{"type":"constrained","contentSize":"720px"}} -->
<section class="wp-block-group section section--lg section--ivory has-ivory-background-color has-background" style="padding-top:var(--wp--preset--spacing--90);padding-bottom:var(--wp--preset--spacing--90)">
<!-- wp:html --><div class="jiwf-divider" aria-hidden="true"><span class="jiwf-divider__line"></span><span class="jiwf-divider__symbol">✦</span><span class="jiwf-divider__line"></span></div><!-- /wp:html -->

<!-- wp:paragraph {"align":"center","fontFamily":"jp-serif","fontSize":"2xl","style":{"typography":{"fontWeight":"500","lineHeight":"1.9"}},"textColor":"navy"} --><p class="has-text-align-center has-navy-color has-text-color has-jp-serif-font-family has-2xl-font-size" style="font-weight:500;line-height:1.9">21世紀、そして22世紀に向けて、<br>リーダーシップ、教育、人間の可能性を再定義する挑戦です。</p><!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"2"},"spacing":{"margin":{"top":"var:preset|spacing|60"}}},"textColor":"text-muted"} --><p class="has-text-align-center has-text-muted-color has-text-color" style="margin-top:var(--wp--preset--spacing--60);line-height:2">バガヴァッド・ギーターの智慧、<br>ホリスティックなウェルビーイング、<br>そして変革を生むリーダーシップ教育を通じて、<br>女性が自らの使命を見出し、内なる力を育み、世界に価値ある変化を生み出すことを支援します。</p><!-- /wp:paragraph -->

<!-- wp:html --><div class="jiwf-divider" aria-hidden="true"><span class="jiwf-divider__line"></span><span class="jiwf-divider__symbol">✦</span><span class="jiwf-divider__line"></span></div><!-- /wp:html -->
</section>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"jiwf/mvv"} /-->

<!-- wp:pattern {"slug":"jiwf/timeline"} /-->

<!-- wp:pattern {"slug":"jiwf/philosophy"} /-->

<!-- wp:pattern {"slug":"jiwf/closing-cta"} /-->
HTML;
