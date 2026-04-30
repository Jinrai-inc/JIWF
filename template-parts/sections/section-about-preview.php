<?php
/**
 * About preview (split image / text).
 *
 * @package jiwf-academy
 */
$lang = jiwf_current_lang();
$image_url = jiwf_setting( 'jiwf_home_about_image', '' );
?>
<section class="section section--ivory">
	<div class="container">
		<div class="split">
			<div class="image-frame fade-up" style="aspect-ratio: 4/5;">
				<?php
				if ( $image_url ) {
					printf( '<img src="%s" alt="" loading="lazy">', esc_url( $image_url ) );
				} else {
					echo '<div style="width:100%;height:100%;background:var(--jiwf-ivory-warm);"></div>';
				}
				?>
			</div>
			<div class="fade-up">
				<span class="eyebrow">About JIWF Academy</span>
				<h2 style="margin-top: var(--space-md); margin-bottom: var(--space-md);">
					<?php
					echo $lang === 'ja'
						? '新しい文明のための、<br>新しい教育'
						: '<em>A new education<br>for a new civilization.</em>';
					?>
				</h2>
				<p class="lead">
					<?php
					echo $lang === 'ja'
						? '富士からヒマラヤへ。日本とインドを結び、東洋の智慧と現代のリーダーシップを統合する女性たちのデジタルキャンパス。'
						: 'From Mount Fuji to the Himalayas — a digital campus that weaves Japan and India, ancient wisdom and modern leadership, into a place where women shape what comes next.';
					?>
				</p>
				<a class="btn btn--ghost" href="<?php echo esc_url( home_url( '/about/' ) ); ?>" style="margin-top: var(--space-md);">
					<?php esc_html_e( 'Read More', 'jiwf-academy' ); ?>
				</a>
			</div>
		</div>
	</div>
</section>
