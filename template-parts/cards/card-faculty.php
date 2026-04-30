<?php
/**
 * Faculty card.
 *
 * @package jiwf-academy
 */
$portrait_id = (int) jiwf_field( 'portrait_id' );
$role        = jiwf_field( 'role_title' );
$name_jp     = jiwf_field( 'name_jp' );
?>
<article class="card-faculty fade-up">
	<a href="<?php the_permalink(); ?>" class="card-faculty__portrait">
		<?php
		if ( $portrait_id ) {
			echo wp_get_attachment_image( $portrait_id, 'jiwf-portrait', false, array( 'loading' => 'lazy', 'alt' => get_the_title() ) );
		} elseif ( has_post_thumbnail() ) {
			the_post_thumbnail( 'jiwf-portrait', array( 'loading' => 'lazy' ) );
		}
		?>
	</a>
	<?php if ( $role ) : ?>
		<span class="card-faculty__role"><?php echo esc_html( $role ); ?></span>
	<?php endif; ?>
	<h3 class="card-faculty__name">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		<?php if ( $name_jp ) : ?>
			<small style="display:block; font-size: var(--text-sm); color: var(--jiwf-text-muted); font-family: var(--font-jp-serif); letter-spacing: 0.1em;"><?php echo esc_html( $name_jp ); ?></small>
		<?php endif; ?>
	</h3>
</article>
