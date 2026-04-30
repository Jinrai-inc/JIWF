<?php
/**
 * Four-value pillar strip (Inner Growth / Compassion & Harmony /
 * Global Collaboration / Purpose & Action).
 *
 * @package jiwf-academy
 */
$lang = jiwf_current_lang();

$values = array(
	array( 'lotus',  'Inner Growth',           '内なる成長' ),
	array( 'heart',  'Compassion & Harmony',   '思いやりと調和' ),
	array( 'globe',  'Global Collaboration',   '国際性と共創' ),
	array( 'sun',    'Purpose & Action',       '使命と行動' ),
);
?>
<section class="section section--ivory">
	<div class="container">
		<ul class="value-strip">
			<?php foreach ( $values as $v ) :
				list( $icon, $en, $jp ) = $v;
				?>
				<li class="value-strip__item fade-up">
					<span class="value-strip__icon" data-icon="<?php echo esc_attr( $icon ); ?>" aria-hidden="true">
						<?php echo jiwf_value_icon_svg( $icon ); ?>
					</span>
					<span class="value-strip__label">
						<em><?php echo esc_html( $en ); ?></em>
						<small><?php echo esc_html( $jp ); ?></small>
					</span>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
