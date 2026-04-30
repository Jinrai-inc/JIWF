<?php
/**
 * Centered editorial statement.
 *
 * @package jiwf-academy
 */
$lang = jiwf_current_lang();
?>
<section class="section section--lg section--ivory" id="statement">
	<div class="container">
		<?php get_template_part( 'template-parts/components/divider-gold' ); ?>
		<div class="statement fade-up">
			<?php if ( $lang === 'ja' ) : ?>
				<p>新しい時代には、<br>新しいリーダーシップが必要です。</p>
				<p style="margin-top: var(--space-md); font-size: var(--text-lg); font-family: var(--font-jp-body); line-height: 2;">
					それは、知識だけではなく智慧に根ざしたもの。<br>
					成果だけではなく使命に導かれたもの。<br>
					野心だけではなく思いやりに支えられたものです。
				</p>
			<?php else : ?>
				<p><em>A new era calls for<br>a new kind of leadership.</em></p>
				<p style="margin-top: var(--space-md); font-size: var(--text-lg); font-family: var(--font-body); line-height: 1.85; color: var(--jiwf-text-muted);">
					Rooted in wisdom, not only knowledge.<br>
					Guided by purpose, not only outcomes.<br>
					Held by compassion, not only ambition.
				</p>
			<?php endif; ?>
		</div>
		<?php get_template_part( 'template-parts/components/divider-gold' ); ?>
	</div>
</section>
