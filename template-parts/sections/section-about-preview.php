<?php
/**
 * About preview (split image / text).
 *
 * @package jiwf-academy
 */
?>
<section class="section section--ivory">
	<div class="container">
		<div class="split">
			<div class="image-frame fade-up" style="aspect-ratio: 4/5;">
				<?php
				if ( jiwf_has_image( 'jiwf_home_about_image' ) ) {
					jiwf_image( 'jiwf_home_about_image', 'jiwf-card', array( 'alt' => '', 'loading' => 'lazy' ) );
				} else {
					echo '<div style="width:100%;height:100%;background:var(--jiwf-ivory-warm);"></div>';
				}
				?>
			</div>
			<div class="fade-up">
				<span class="eyebrow">About JIWF Academy</span>
				<h2 style="margin-top: var(--space-md); margin-bottom: var(--space-md); font-family: var(--font-jp-serif); font-weight: 500;">
					新しい文明のための、<br>新しい教育
				</h2>
				<p class="lead">
					JIWF Academyは、知性・共感・勇気を備え、未来を創造する女性リーダーを育む国際的な学びの共同体です。
				</p>
				<p class="lead" style="margin-top: var(--space-md); color: var(--jiwf-text-muted);">
					富士山の静謐さと、ヒマラヤの壮大な叡智。<br>
					その宇宙の叡智と古代の智慧と現代のリーダーシップを融合し、より良い世界を創造します。
				</p>
				<a class="btn btn--ghost" href="<?php echo esc_url( home_url( '/about/' ) ); ?>" style="margin-top: var(--space-md);">
					私たちについて
				</a>
			</div>
		</div>
	</div>
</section>
