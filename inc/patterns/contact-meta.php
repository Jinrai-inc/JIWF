<?php
/**
 * Contact page — secondary text column (sits beside the form block).
 */
return <<<'HTML'
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
<!-- wp:heading {"fontFamily":"jp-serif","fontSize":"3xl","style":{"typography":{"fontWeight":"500"}}} -->
<h2 class="wp-block-heading has-jp-serif-font-family has-3xl-font-size" style="font-weight:500">一通ずつ、丁寧に。</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"lg","textColor":"text-muted"} -->
<p class="has-text-muted-color has-text-color has-lg-font-size">いただいたお手紙は、すべて拝読しています。お返事まで数日いただく場合があります。</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>右側のカラムに Contact Form 7 のショートコードを貼り付けてください。例: <code>[contact-form-7 id="123" title="Contact"]</code></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
HTML;
