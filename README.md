# JIWF Academy — WordPress Theme (Phase 1)

Custom WordPress classic theme for **JIWF Academy** — an editorial brand site
for *One Wisdom, One World*. Built by Jinrai Co., Ltd.

> **このリポジトリのルート＝WordPressテーマです。** `style.css` と `functions.php`
> がリポジトリ直下にあります。

---

## インストール方法（3通り）

### A. GitHub Actions のビルド成果物（推奨）

1. GitHub の **Actions** タブ → 最新の "Build theme ZIP" ワークフロー
2. 下部 **Artifacts** から `jiwf-academy-theme` をダウンロード
3. 中の `jiwf-academy.zip` を WordPress 管理画面の **外観 → テーマ → 新規追加 → テーマのアップロード** にドラッグ

リリースタグ（例: `v1.0.0`）を打つと、Releases ページにも `jiwf-academy.zip` が自動添付されます。

### B. ローカルでビルドスクリプトを実行

```bash
bash build-theme.sh
```

→ `jiwf-academy.zip` が生成され、そのまま管理画面でアップロードできます。

### C. GitHub の "Download ZIP" を使う場合

1. リポジトリの緑 **Code** ボタン → "Download ZIP"
2. 解凍したフォルダ名（例: `JIWF-claude-jiwf-wordpress-theme-phase1-...`）を **`jiwf-academy`** にリネーム
3. `wp-content/themes/jiwf-academy/` に配置

A または B を使えばリネーム不要です。

---

## Phase 1 のスコープ

ブランドサイト + 多言語（JP / EN）。**講座販売・会員機能・サイト内決済は持たせません。** すべての CTA は問い合わせまたは外部 SaaS（Phase 2 で接続）に流します。

## 有料プラグインは不要

WordPress コアのみで動作します。ACF などの追加プラグインは入れていません。

| 領域 | 実装方法（プラグイン不要） |
| --- | --- |
| カスタムフィールド | `add_meta_box` + `get_post_meta`（`inc/meta-boxes.php`） |
| サイト全体の設定 | カスタマイザー（**外観 → カスタマイズ → JIWF Academy**） |
| 画像メタフィールド | WordPress 同梱の `wp.media` ピッカー |
| リピーター（カリキュラム・タイムテーブル・SNS） | 改行区切り＋ ` \| ` テキストエリア |

## 推奨（任意）プラグイン

すべて無料で、テーマ動作の必須条件ではありません：

- **Polylang** — 日英翻訳（自動検知。なければ静的な JP/EN 切替を表示）
- **Contact Form 7** — お問い合わせページ用
- **WP Mail SMTP** — Gmail 経由の送達向上
- **AIOSEO** — メタタグ／サイトマップ
- **MailPoet** — ニュースレター（または HTML 埋め込みコードをカスタマイザーに貼付）

## カスタム投稿タイプ

`program` / `event` / `faculty` / `partner` / `testimonial` / `location`

## カスタムタクソノミー

`program_pillar` / `event_type` / `event_region` / `partner_type` / `faculty_role`

## メニュー位置

`primary` / `footer` / `legal`

## 推奨ページ構成

| ページ | テンプレート |
| --- | --- |
| Home | （フロントページに設定。`front-page.php` が使われます） |
| About | **About** |
| Locations | **Locations** |
| Community | **Community** |
| Contact | **Contact** |
| Privacy / Terms | デフォルトページテンプレート |

## 編集者向けワークフロー

1. **外観 → カスタマイズ → JIWF Academy** … タグライン、ヒーロー画像、富士／ヒマラヤ写真、問合せメール、SNS、ニュースレター埋め込みを設定
2. **Programs / Events / Faculty / Partners / Locations** … 各投稿の編集画面下部のメタボックスに入力。リピーター項目は1行 = 1エントリ、フィールドは ` \| ` 区切り
3. **ロゴ** … カスタマイザー → サイト基本情報 → ロゴ。`assets/images/logo.png` をフォールバック画像として同梱可

## 画像アセット

`assets/images/` に下記を配置（カスタマイザーで上書き可）:

- `logo.png`（推奨 1200×1200, 透過 PNG）
- `hero-fuji-himalaya.jpg`（2400×1400）
- `fuji.jpg` / `himalaya.jpg` / `learning.jpg`（各 1600×1200）

詳細は `assets/images/README.md`。

## Phase 2（範囲外）

オンライン講座・会員制・予約・寄付は外部 SaaS（Teachable / Circle.so / Peatix /
Stripe / Syncable）に委ね、Phase 1 の CTA からリンクで繋ぎます。
