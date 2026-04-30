<?php
/**
 * Single Event.
 *
 * @package jiwf-academy
 */

get_header();
$lang = jiwf_current_lang();

while ( have_posts() ) :
	the_post();
	$start    = jiwf_field( 'event_date_start' );
	$end      = jiwf_field( 'event_date_end' );
	$loc      = jiwf_field( 'event_location' );
	$addr     = jiwf_field( 'event_address' );
	$schedule = jiwf_parse_rows( jiwf_field( 'timetable' ), array( 'time', 'title', 'description' ) );
	$method   = jiwf_field( 'application_method' ) ?: 'contact';
	$ext_url  = jiwf_field( 'external_url' );
	?>

	<?php get_template_part( 'template-parts/hero/hero-page', null, array(
		'eyebrow' => $start ? jiwf_format_event_date( $start, $end ) : __( 'Event', 'jiwf-academy' ),
		'title'   => get_the_title(),
		'lead'    => $loc ? esc_html( $loc ) : '',
	) ); ?>

	<section class="section section--ivory">
		<div class="container container--narrow entry-content fade-up">
			<?php the_content(); ?>
		</div>
	</section>

	<?php if ( $schedule ) : ?>
	<section class="section section--ivory-warm">
		<div class="container container--narrow">
			<div class="section__head fade-up">
				<span class="eyebrow"><?php esc_html_e( 'Programme', 'jiwf-academy' ); ?></span>
				<h2><?php echo $lang === 'ja' ? 'タイムテーブル' : '<em>Timetable</em>'; ?></h2>
			</div>
			<div class="timeline fade-up">
				<?php foreach ( $schedule as $row ) : ?>
					<div class="timeline__item">
						<div class="timeline__year"><?php echo esc_html( $row['time'] ?? '' ); ?></div>
						<h3 class="timeline__title"><?php echo esc_html( $row['title'] ?? '' ); ?></h3>
						<?php if ( ! empty( $row['description'] ) ) : ?>
							<p class="timeline__text"><?php echo esc_html( $row['description'] ); ?></p>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( $addr ) : ?>
	<section class="section section--ivory">
		<div class="container container--narrow fade-up">
			<span class="eyebrow"><?php esc_html_e( 'Location', 'jiwf-academy' ); ?></span>
			<h3 style="margin-top: var(--space-md);"><?php echo esc_html( $loc ); ?></h3>
			<p class="lead"><?php echo esc_html( $addr ); ?></p>
		</div>
	</section>
	<?php endif; ?>

	<section class="section section--navy">
		<div class="container container--narrow" style="text-align:center;">
			<h2 style="color: var(--jiwf-ivory); margin-bottom: var(--space-md);">
				<?php echo $lang === 'ja' ? '<em>ご参加にあたって</em>' : '<em>How to Join</em>'; ?>
			</h2>
			<p class="lead" style="color: rgba(250,247,240,0.8); margin-bottom: var(--space-xl);">
				<?php
				if ( $method === 'external' && $ext_url ) {
					echo $lang === 'ja' ? '外部の予約サイトよりお申込みいただけます。' : 'Reservations are handled by our partner platform.';
				} else {
					echo $lang === 'ja' ? 'お申込み・ご質問は、お問い合わせフォームよりお寄せください。' : 'Please reach out through our contact form for details and registration.';
				}
				?>
			</p>
			<?php
			if ( $method === 'external' && $ext_url ) {
				printf(
					'<a class="btn btn--outline btn--on-dark" href="%s" target="_blank" rel="noopener">%s</a>',
					esc_url( $ext_url ),
					esc_html( $lang === 'ja' ? '予約サイトへ' : 'Reserve' )
				);
			} else {
				jiwf_cta_button( $lang === 'ja' ? 'お問い合わせ' : 'Contact Us', jiwf_contact_url(), 'btn--on-dark' );
			}
			?>
		</div>
	</section>

	<?php
endwhile;

get_footer();
