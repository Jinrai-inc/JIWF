<?php
/**
 * Search form.
 *
 * @package jiwf-academy
 */
?>
<form role="search" method="get" class="jiwf-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="jiwf-search-<?php echo esc_attr( wp_unique_id() ); ?>" class="screen-reader-text">
		<?php esc_html_e( 'Search', 'jiwf-academy' ); ?>
	</label>
	<input type="search" id="jiwf-search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e( 'Search the Academy…', 'jiwf-academy' ); ?>">
	<button class="btn btn--ghost" type="submit"><?php esc_html_e( 'Search', 'jiwf-academy' ); ?></button>
</form>
