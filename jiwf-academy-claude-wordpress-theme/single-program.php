<?php
/**
 * Single Program.
 *
 * @package jiwf-academy
 */

get_header();
$lang = jiwf_current_lang();

while ( have_posts() ) :
	the_post();
	$subtitle  = function_exists( 'get_field' ) ? get_field( 'subtitle' )           : '';
	$duration  = function_exists( 'get_field' ) ? get_field( 'duration' )           : '';
	$format    = function_exists( 'get_field' ) ? get_field( 'format' )             : '';
	$modules   = function_exists( 'get_field' ) ? get_field( 'curriculum_modules' ) : array();
	$audience  = function_exists( 'get_field' ) ? get_field( 'target_audience' )    : '';
	$after     = function_exists( 'get_field' ) ? get_field( 'after_program' )      : '';
	$faculty   = function_exists( 'get_field' ) ? get_field( 'faculty_relation' )   : array();
	$hero_image = function_exists( 'get_field' ) ? get_field( 'hero_image' )         : null;
	?>

	<section class="page-hero" style="<?php echo $hero_image ? 'background-image: linear-gradient(180deg, rgba(20,33,61,0.4) 0%, rgba(20,33,61,0.7) 100%), url(' . esc_url( $hero_image['url'] ) . '); background-size: cover; background-position: center; color: var(--jiwf-ivory);' : ''; ?>">
		<div class="container">
			<span class="page-hero__eyebrow" style="<?php echo $hero_image ? 'color: var(--jiwf-gold-light);' : ''; ?>">
				<?php esc_html_e( 'Program', 'jiwf-academy' ); ?>
			</span>
			<h1 class="page-hero__title" style="<?php echo $hero_image ? 'color: var(--jiwf-ivory);' : ''; ?>"><?php the_title(); ?></h1>
			<?php if ( $subtitle ) : ?>
				<p class="page-hero__lead" style="<?php echo $hero_image ? 'color: rgba(250,247,240,0.85);' : ''; ?>">
					<?php echo esc_html( $subtitle ); ?>
				</p>
			<?php endif; ?>
		</div>
	</section>

	<section class="section section--ivory">
		<div class="container container--narrow entry-content fade-up">
			<?php the_content(); ?>
		</div>
	</section>

	<?php if ( $modules ) : ?>
	<section class="section section--ivory-warm">
		<div class="container">
			<div class="section__head fade-up">
				<span class="eyebrow"><?php esc_html_e( 'Curriculum', 'jiwf-academy' ); ?></span>
				<h2><?php echo $lang === 'ja' ? 'カリキュラム' : '<em>What you will learn</em>'; ?></h2>
			</div>
			<div class="container container--narrow">
				<?php foreach ( $modules as $i => $m ) : ?>
					<article class="card fade-up" style="border-top: 1px solid var(--jiwf-line);">
						<span class="card__chapter"><?php echo esc_html( jiwf_roman( $i + 1 ) ); ?></span>
						<h3 class="card__title"><?php echo esc_html( $m['module_title'] ?? '' ); ?></h3>
						<?php if ( ! empty( $m['module_duration'] ) ) : ?>
							<p class="card__meta"><?php echo esc_html( $m['module_duration'] ); ?></p>
						<?php endif; ?>
						<p class="card__excerpt"><?php echo esc_html( $m['module_description'] ?? '' ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( $audience || $after ) : ?>
	<section class="section section--ivory">
		<div class="container">
			<div class="split">
				<?php if ( $audience ) : ?>
					<div class="fade-up">
						<span class="eyebrow"><?php esc_html_e( 'Who is this for', 'jiwf-academy' ); ?></span>
						<h3 style="margin-top: var(--space-md);"><?php echo $lang === 'ja' ? '受講対象' : '<em>For You If</em>'; ?></h3>
						<p class="lead"><?php echo nl2br( esc_html( $audience ) ); ?></p>
					</div>
				<?php endif; ?>
				<?php if ( $after ) : ?>
					<div class="fade-up">
						<span class="eyebrow"><?php esc_html_e( 'After This Program', 'jiwf-academy' ); ?></span>
						<h3 style="margin-top: var(--space-md);"><?php echo $lang === 'ja' ? '修了後の世界' : '<em>What Awaits</em>'; ?></h3>
						<p class="lead"><?php echo nl2br( esc_html( $after ) ); ?></p>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( $faculty && is_array( $faculty ) ) : ?>
	<section class="section section--ivory-warm">
		<div class="container">
			<div class="section__head fade-up">
				<span class="eyebrow"><?php esc_html_e( 'Faculty', 'jiwf-academy' ); ?></span>
				<h2><?php echo $lang === 'ja' ? '講師' : '<em>Your Teachers</em>'; ?></h2>
			</div>
			<div class="card-grid card-grid--3">
				<?php foreach ( $faculty as $fid ) :
					$post = get_post( $fid );
					if ( ! $post ) continue;
					setup_postdata( $post );
					get_template_part( 'template-parts/cards/card-faculty' );
				endforeach; wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<section class="section section--navy">
		<div class="container container--narrow" style="text-align:center;">
			<h2 style="color: var(--jiwf-ivory); margin-bottom: var(--space-md);">
				<?php echo $lang === 'ja' ? '<em>このプログラムについて</em>' : '<em>Take the next step</em>'; ?>
			</h2>
			<p class="lead" style="color: rgba(250,247,240,0.8); margin-bottom: var(--space-xl);">
				<?php
				echo $lang === 'ja'
					? 'お申込み・ご質問は、お問い合わせフォームよりお気軽にどうぞ。'
					: 'For applications and enquiries, please reach out through our contact form.';
				?>
			</p>
			<?php jiwf_cta_button( $lang === 'ja' ? 'お問い合わせ' : 'Contact Us', jiwf_contact_url(), 'btn--on-dark' ); ?>
		</div>
	</section>

	<?php
endwhile;

get_footer();
