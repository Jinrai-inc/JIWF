<?php
/**
 * Closing CTA — 女性が自らを変え、世界を変える.
 *
 * @package jiwf-academy
 */
$contact_url = jiwf_contact_url();
?>
<section class="closing-cta">
	<div class="container container--narrow fade-up" style="text-align:center;">

		<h2 style="font-family: var(--font-jp-serif); font-weight: 500; color: var(--jiwf-ivory); margin-bottom: var(--space-md); line-height: 1.6;">
			女性が自らを変え、世界を変える
		</h2>

		<p class="lead" style="color: rgba(250,247,240,0.9);">
			未来は、智慧と慈愛、そして使命を持って行動する人のものです。
		</p>

		<p style="color: rgba(250,247,240,0.8); margin-top: var(--space-md); line-height: 2;">
			JIWF Academyは、その未来を築いています。<br>
			一人ひとりの女性から、一つひとつのコミュニティへ、<br>
			そして次の世代へ。
		</p>

		<p style="color: var(--jiwf-gold-light); margin-top: var(--space-lg); font-family: var(--font-jp-serif); font-size: var(--text-lg); letter-spacing: 0.08em;">
			富士からヒマラヤへ。<br>
			内なる変容から、世界への貢献へ。
		</p>

		<div style="margin-top: var(--space-xl); border-top: 1px solid rgba(201,169,97,0.25); padding-top: var(--space-xl);">
			<p style="font-family: var(--font-jp-serif); font-size: var(--text-xl); color: var(--jiwf-ivory); margin-bottom: var(--space-md);">
				あなたの旅を、ここから
			</p>
			<p style="color: rgba(250,247,240,0.75); margin-bottom: var(--space-xl);">
				使命を見つける。<br>
				リーダーシップを広げる。<br>
				より良い世界を創る仲間になる。
			</p>
			<div class="closing-cta__actions">
				<a class="btn btn--outline btn--on-dark" href="<?php echo esc_url( $contact_url . '?inquiry=join' ); ?>">今すぐ参加する</a>
				<a class="btn btn--outline btn--on-dark" href="<?php echo esc_url( $contact_url . '?inquiry=community' ); ?>">コミュニティに参加する</a>
				<a class="btn btn--outline btn--on-dark" href="<?php echo esc_url( $contact_url . '?inquiry=partnership' ); ?>">パートナーとして連携する</a>
			</div>
		</div>

	</div>
</section>
