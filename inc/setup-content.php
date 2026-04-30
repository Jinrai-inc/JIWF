<?php
/**
 * One-shot content scaffolding.
 *
 * On theme activation this seeds the standard JIWF Academy pages
 * (About / Locations / Community / Contact / Privacy / Terms), builds a
 * Primary navigation menu pointing at them plus the program & event
 * archives, and assigns the menu to the `primary` location.
 *
 * The work is idempotent: every step skips entities that already exist,
 * so editors can safely tweak titles/slugs after the first run.
 *
 * @package jiwf-academy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'after_switch_theme', 'jiwf_install_starter_content' );
function jiwf_install_starter_content() {
	$pages = jiwf_seed_pages();
	jiwf_seed_programs();
	jiwf_seed_events();
	jiwf_seed_primary_menu( $pages );
	update_option( 'jiwf_content_seeded', JIWF_THEME_VERSION );
	// Defer the rewrite flush until CPTs are registered on the next init.
	update_option( 'jiwf_needs_rewrite_flush', '1' );
}

/**
 * Flush rewrite rules once after CPTs are registered, then clear the flag.
 * Without this the /programs/ and /events/ archive URLs return 404 on a
 * fresh activation.
 */
add_action( 'init', 'jiwf_maybe_flush_rewrites', 99 );
function jiwf_maybe_flush_rewrites() {
	if ( get_option( 'jiwf_needs_rewrite_flush' ) !== '1' ) return;
	flush_rewrite_rules( false );
	delete_option( 'jiwf_needs_rewrite_flush' );
}

/**
 * Re-run the seed manually by visiting /wp-admin/?jiwf_seed=1
 * (useful if the theme was activated before this code shipped).
 */
add_action( 'admin_init', 'jiwf_maybe_reseed' );
function jiwf_maybe_reseed() {
	if ( ! current_user_can( 'manage_options' ) ) return;
	if ( empty( $_GET['jiwf_seed'] ) ) return;
	jiwf_install_starter_content();
	add_action( 'admin_notices', function () {
		echo '<div class="notice notice-success is-dismissible"><p><strong>JIWF Academy:</strong> Sample pages and primary menu seeded.</p></div>';
	} );
}

/**
 * Read a block pattern's raw markup off disk.
 */
function jiwf_pattern_markup( $slug ) {
	$file = JIWF_THEME_DIR . '/inc/patterns/' . $slug . '.php';
	if ( ! file_exists( $file ) ) return '';
	return (string) ( include $file );
}

/**
 * Privacy / Terms placeholder body — flagged with a clear TODO so it
 * never reaches production unreviewed.
 */
function jiwf_legal_placeholder( $kind ) {
	$intro = $kind === 'privacy'
		? '<p><strong>TODO：</strong>公開前に、弁護士・法務担当者によるレビュー済みのプライバシーポリシー本文に差し替えてください。</p>'
		: '<p><strong>TODO：</strong>公開前に、弁護士・法務担当者によるレビュー済みの利用規約本文に差し替えてください。</p>';

	$body = $kind === 'privacy'
		? '<p>JIWF Academy は、お問い合わせ対応、ニュースレター配信、各種プログラム運営に必要な範囲でのみ個人情報を取得します。サイト運営に必要な業務委託先を除き、第三者への提供・販売は行いません。</p>'
		: '<p>当サイトのコンテンツをご利用いただくにあたり、誠実にお取り扱いいただくことに同意いただいたものとみなします。掲載情報は教育・参考目的のものです。</p>';

	return <<<HTML
<!-- wp:paragraph -->
{$intro}
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">概要</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
{$body}
<!-- /wp:paragraph -->
HTML;
}

/**
 * Seed standard pages. Returns slug => post_id.
 */
function jiwf_seed_pages() {
	$pattern = function ( ...$slugs ) {
		$out = '';
		foreach ( $slugs as $s ) {
			$markup = jiwf_pattern_markup( $s );
			if ( $markup ) $out .= $markup . "\n\n";
		}
		return rtrim( $out );
	};

	$contact_form_placeholder = <<<HTML
<!-- wp:paragraph -->
<p><em>ヒント：無料プラグイン Contact Form 7 をインストールしフォームを作成、ショートコードをここに貼り付けてください。例：<code>[contact-form-7 id="123" title="お問い合わせ"]</code></em></p>
<!-- /wp:paragraph -->
HTML;

	$pages = array(
		'about' => array(
			'title'    => '私たちについて',
			'template' => 'page-about.php',
			'content'  => $pattern( 'about-starter' ),
		),
		'campus' => array(
			'title'    => '拠点',
			'template' => 'page-locations.php',
			'content'  => $pattern( 'page-hero', 'locations-pair', 'closing-cta' ),
		),
		'community' => array(
			'title'    => 'コミュニティ',
			'template' => 'page-community.php',
			'content'  => $pattern( 'community-starter' ),
		),
		'contact' => array(
			'title'    => 'お問い合わせ',
			'template' => 'page-contact.php',
			'content'  => $pattern( 'page-hero', 'contact-meta' ) . "\n\n" . $contact_form_placeholder,
		),
		'privacy' => array(
			'title'   => 'プライバシーポリシー',
			'content' => jiwf_legal_placeholder( 'privacy' ),
		),
		'terms' => array(
			'title'   => '利用規約',
			'content' => jiwf_legal_placeholder( 'terms' ),
		),
	);

	$created = array();
	foreach ( $pages as $slug => $data ) {
		$existing = get_page_by_path( $slug, OBJECT, 'page' );
		if ( $existing instanceof WP_Post ) {
			$created[ $slug ] = (int) $existing->ID;
			continue;
		}

		$post_id = wp_insert_post( array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_title'   => $data['title'],
			'post_name'    => $slug,
			'post_content' => $data['content'] ?? '',
		) );

		if ( is_wp_error( $post_id ) || ! $post_id ) continue;

		if ( ! empty( $data['template'] ) ) {
			update_post_meta( $post_id, '_wp_page_template', $data['template'] );
		}
		$created[ $slug ] = (int) $post_id;
	}

	return $created;
}

/**
 * Seed the five Five-Pillars programs as published `program` posts.
 * Idempotent — skips programs whose slug already exists.
 */
function jiwf_seed_programs() {
	$programs = array(
		'gita-wisdom' => array(
			'title'      => 'ギーターの智慧',
			'subtitle'   => 'Universal Wisdom for Daily Life',
			'menu_order' => 1,
			'excerpt'    => 'バガヴァッド・ギーターの普遍の智慧を、現代の人生に活かす12週間。',
			'icon'       => 'lotus',
			'tone'       => 'rose',
			'body'       => '<p>バガヴァッド・ギーターは、5,000年以上にわたり人類の道しるべとなってきた古代インドの聖典です。本プログラムでは、その智慧を現代日本に生きる女性のリーダーシップに統合します。</p><p>毎週のリーディング、対話、瞑想を通じて、人生の目的、倫理的行動、内なる明晰さを育みます。</p>',
		),
		'yoga-wellbeing' => array(
			'title'      => 'ヨガとウェルビーイング',
			'subtitle'   => 'Harmony of Body, Mind, and Spirit',
			'menu_order' => 2,
			'excerpt'    => '身体・心・精神を整え、活力としなやかさ、調和を育む8週間。',
			'icon'       => 'feather',
			'tone'       => 'gold',
			'body'       => '<p>ヨガ・呼吸法・アーユルヴェーダの智慧を通じて、心身のバランスを取り戻します。</p><p>朝のプラクティス、瞑想、食と生活のセルフケアを段階的に身につけ、忙しい日常の中でも自分の中心に戻れる力を養います。</p>',
		),
		'leadership' => array(
			'title'      => 'リーダーシップ開発',
			'subtitle'   => 'Lead with Wisdom and Compassion',
			'menu_order' => 3,
			'excerpt'    => '智慧と慈愛に根ざしたリーダーシップを学ぶ16週間。',
			'icon'       => 'heart',
			'tone'       => 'rose',
			'body'       => '<p>権力ではなく、智慧と慈愛に根ざしたリーダーシップ。意思決定、コミュニケーション、コンフリクト・マネジメント、ビジョン構築。</p><p>月1回のコーチング、対面リトリート2回を含む集中プログラムです。</p>',
		),
		'global-collaboration' => array(
			'title'      => 'グローバル共創',
			'subtitle'   => 'Bridging East and West',
			'menu_order' => 4,
			'excerpt'    => '国境・文化・宗教を越えて共創する力を養う12週間。',
			'icon'       => 'globe',
			'tone'       => 'sky',
			'body'       => '<p>日本とインド、そして世界をつなぐネットワークの中で、文化的感受性、英語コミュニケーション、異文化共創のスキルを育みます。</p><p>国際リトリート1回を含むハイブリッド型プログラム。</p>',
		),
		'social-impact' => array(
			'title'      => 'ソーシャル・インパクトと起業',
			'subtitle'   => 'From Vision to Action',
			'menu_order' => 5,
			'excerpt'    => '社会課題を解決し、持続可能な未来を創る20週間。',
			'icon'       => 'sun',
			'tone'       => 'navy',
			'body'       => '<p>個人の使命を、具体的な事業・プロジェクトの形にしていくプログラム。事業設計、資金調達、インパクト測定までを包括的に学びます。</p><p>修了時には自身のプロトタイプを発表します。</p>',
		),
	);

	foreach ( $programs as $slug => $data ) {
		$existing = get_page_by_path( $slug, OBJECT, 'program' );
		if ( $existing instanceof WP_Post ) continue;

		$content = '<!-- wp:paragraph -->' . $data['body'] . '<!-- /wp:paragraph -->';

		$post_id = wp_insert_post( array(
			'post_type'    => 'program',
			'post_status'  => 'publish',
			'post_title'   => $data['title'],
			'post_name'    => $slug,
			'post_excerpt' => $data['excerpt'],
			'post_content' => $content,
			'menu_order'   => $data['menu_order'],
		) );
		if ( is_wp_error( $post_id ) || ! $post_id ) continue;

		update_post_meta( $post_id, 'subtitle', $data['subtitle'] );
	}
}

/**
 * Seed a placeholder "Coming Soon" event so the /events/ archive has at
 * least one row to display. Skipped if the post type already has any
 * published event.
 */
function jiwf_seed_events() {
	$has_event = get_posts( array(
		'post_type'      => 'event',
		'post_status'    => 'publish',
		'posts_per_page' => 1,
		'fields'         => 'ids',
	) );
	if ( $has_event ) return;

	$start = date( 'Y-m-d\TH:i', strtotime( '+90 days 10:00' ) );
	$end   = date( 'Y-m-d\TH:i', strtotime( '+90 days 17:00' ) );

	$post_id = wp_insert_post( array(
		'post_type'    => 'event',
		'post_status'  => 'publish',
		'post_title'   => '近日公開：JIWF Academy 開校記念リトリート',
		'post_name'    => 'opening-retreat',
		'post_excerpt' => '富士の麓で開かれる、JIWF Academy の開校を祝うリトリート。詳細は近日中に公開いたします。',
		'post_content' => '<!-- wp:paragraph --><p>本イベントの詳細は、近日中にこちらに掲載いたします。最新情報をお見逃しなく。</p><!-- /wp:paragraph -->',
	) );
	if ( is_wp_error( $post_id ) || ! $post_id ) return;

	update_post_meta( $post_id, 'event_date_start',    $start );
	update_post_meta( $post_id, 'event_date_end',      $end );
	update_post_meta( $post_id, 'event_location',      '日本拠点（富士の麓）' );
	update_post_meta( $post_id, 'event_address',       '※詳細は決まり次第ご案内します' );
	update_post_meta( $post_id, 'application_method', 'contact' );
}

/**
 * Seed the Primary nav menu and assign it to the `primary` location.
 */
function jiwf_seed_primary_menu( array $pages ) {
	$menu_name = __( 'Primary', 'jiwf-academy' );
	$menu      = wp_get_nav_menu_object( $menu_name );

	if ( ! $menu ) {
		$menu_id = wp_create_nav_menu( $menu_name );
		if ( is_wp_error( $menu_id ) ) return;
	} else {
		$menu_id = (int) $menu->term_id;
	}

	$existing_items = wp_get_nav_menu_items( $menu_id );

	if ( empty( $existing_items ) ) {
		$items = array(
			array( 'type' => 'page',    'key' => 'about',      'title' => '私たちについて' ),
			array( 'type' => 'archive', 'object' => 'program', 'title' => 'プログラム' ),
			array( 'type' => 'page',    'key' => 'campus',     'title' => '拠点' ),
			array( 'type' => 'page',    'key' => 'community',  'title' => 'コミュニティ' ),
			array( 'type' => 'archive', 'object' => 'event',   'title' => 'イベント' ),
			array( 'type' => 'page',    'key' => 'contact',    'title' => 'お問い合わせ' ),
		);

		$position = 1;
		foreach ( $items as $item ) {
			$args = array(
				'menu-item-title'    => $item['title'],
				'menu-item-status'   => 'publish',
				'menu-item-position' => $position++,
			);
			if ( $item['type'] === 'page' ) {
				$page_id = $pages[ $item['key'] ] ?? 0;
				if ( ! $page_id ) continue;
				$args['menu-item-type']      = 'post_type';
				$args['menu-item-object']    = 'page';
				$args['menu-item-object-id'] = $page_id;
			} else {
				$args['menu-item-type']   = 'post_type_archive';
				$args['menu-item-object'] = $item['object'];
			}
			wp_update_nav_menu_item( $menu_id, 0, $args );
		}
	}

	$locations = get_theme_mod( 'nav_menu_locations', array() );
	if ( empty( $locations['primary'] ) ) {
		$locations['primary'] = $menu_id;
		set_theme_mod( 'nav_menu_locations', $locations );
	}

	// Footer / Legal as well, if they aren't already assigned.
	if ( empty( $locations['legal'] ) ) {
		$legal_name = __( 'Legal', 'jiwf-academy' );
		$legal      = wp_get_nav_menu_object( $legal_name );
		if ( ! $legal ) {
			$legal_id = wp_create_nav_menu( $legal_name );
		} else {
			$legal_id = (int) $legal->term_id;
		}
		if ( ! is_wp_error( $legal_id ) ) {
			$legal_existing = wp_get_nav_menu_items( $legal_id );
			if ( empty( $legal_existing ) ) {
				foreach ( array( 'privacy' => 'プライバシーポリシー', 'terms' => '利用規約' ) as $key => $label ) {
					$page_id = $pages[ $key ] ?? 0;
					if ( ! $page_id ) continue;
					wp_update_nav_menu_item( $legal_id, 0, array(
						'menu-item-title'       => $label,
						'menu-item-status'      => 'publish',
						'menu-item-type'        => 'post_type',
						'menu-item-object'      => 'page',
						'menu-item-object-id'   => $page_id,
					) );
				}
			}
			$locations['legal'] = $legal_id;
			set_theme_mod( 'nav_menu_locations', $locations );
		}
	}
}
