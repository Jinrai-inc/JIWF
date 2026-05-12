<?php
/**
 * Front page — JIWF Academy home.
 *
 * @package jiwf-academy
 */

get_header();

get_template_part( 'template-parts/hero/hero-home' );
get_template_part( 'template-parts/sections/section-statement' );
get_template_part( 'template-parts/sections/section-values' );
get_template_part( 'template-parts/sections/section-about-preview' );
get_template_part( 'template-parts/sections/section-programs', null, array( 'limit' => 3 ) );
get_template_part( 'template-parts/sections/section-philosophy' );
get_template_part( 'template-parts/sections/section-locations-preview' );
get_template_part( 'template-parts/sections/section-community' );
get_template_part( 'template-parts/sections/section-events' );
get_template_part( 'template-parts/sections/section-cta' );

get_footer();
