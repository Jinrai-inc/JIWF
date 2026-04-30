<?php
/**
 * 404 — page not found.
 *
 * @package jiwf-academy
 */

get_header();
$lang = jiwf_current_lang();
?>

<section class="page-404">
	<span class="num">IV·O·IV</span>
	<h1><?php echo $lang === 'ja' ? 'ページが見つかりません' : 'The page you sought is no longer here.'; ?></h1>
	<p style="color: var(--jiwf-text-muted); max-width: 480px;">
		<?php
		echo $lang === 'ja'
			? 'お探しのページは移動または削除された可能性があります。'
			: 'It may have moved, or perhaps it was never here. Let us walk back to the beginning.';
		?>
	</p>
	<a class="btn btn--outline" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php esc_html_e( 'Return Home', 'jiwf-academy' ); ?>
	</a>
</section>

<?php get_footer();
