<?php
/**
 * Contact page — secondary text column (sits beside the form block).
 */
return <<<'HTML'
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
<!-- wp:heading {"fontSize":"3xl","style":{"typography":{"fontStyle":"italic","fontWeight":"400"}}} -->
<h2 class="wp-block-heading has-3xl-font-size" style="font-style:italic;font-weight:400">One letter at a time.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"lg","textColor":"text-muted"} -->
<p class="has-text-muted-color has-text-color has-lg-font-size">We read every letter with care. Responses may take a few days.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Insert a Contact Form 7 shortcode in the next column, e.g. <code>[contact-form-7 id="123" title="Contact"]</code>.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
HTML;
