<?php
/**
 * Educational philosophy (4 principles) — dark inverted section.
 *
 * @package jiwf-academy
 */
$lang = jiwf_current_lang();

$principles = $lang === 'ja'
	? array(
		'知識のためではなく、智慧のために',
		'成功のためではなく、使命のために',
		'競争のためではなく、調和と共創のために',
		'自分のためだけでなく、社会への貢献のために',
	)
	: array(
		'Not for knowledge alone — for wisdom',
		'Not for success alone — for purpose',
		'Not for competition — for harmony and co-creation',
		'Not for the self alone — for contribution to the world',
	);
?>
<section class="section section--lg section--navy">
	<div class="container">
		<div class="philosophy fade-up">
			<h2>
				<?php
				echo $lang === 'ja'
					? '「How to Live」を学ぶ教育'
					: '<em>An education in <span style="color: var(--jiwf-gold);">how to live</span>.</em>';
				?>
			</h2>
			<?php get_template_part( 'template-parts/components/divider-gold', null, array( 'on_dark' => true ) ); ?>
			<ul>
				<?php foreach ( $principles as $p ) : ?>
					<li class="fade-up"><?php echo esc_html( $p ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>
