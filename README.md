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

## 自動セットアップ（テーマ有効化時に走ります）

テーマを有効化すると、以下が**自動的に作成**されます：

### 1. 固定ページ 6 件

| タイトル | スラッグ | テンプレート | 初期ブロック |
| --- | --- | --- | --- |
| About | `/about/` | About | About — starter パターン展開済み |
| Locations | `/campus/` | Locations | Page hero + Locations pair + Closing CTA |
| Community | `/community/` | Community | Community — starter パターン展開済み |
| Contact | `/contact/` | Contact | Page hero + Contact info + Contact Form 7 ヒント |
| Privacy Policy | `/privacy/` | （デフォルト） | TODO 注付きプレースホルダ |
| Terms of Use | `/terms/` | （デフォルト） | TODO 注付きプレースホルダ |

各ページの本文はすでにブロックで埋まっているので、編集画面を開いてテキストを差し替えればすぐ公開できます。

### 2. ナビゲーションメニュー 2 種

- **Primary** — About / Programs / Locations / Community / Events / Contact
- **Legal** — Privacy / Terms

両方とも `primary` / `legal` の表示位置に自動で割り当てられます。

### 既にテーマを有効化済みの場合

セットアップが走らなかった場合は、管理画面で **`/wp-admin/?jiwf_seed=1`** にアクセスすると再実行できます（管理者のみ）。既に存在するページ・メニューはスキップされ、足りないものだけ追加されます。

### メニュー未割り当てのときの保険

なんらかの理由でメニューが未設定でも、ヘッダー側で自動的に **公開済みの固定ページ + CPT アーカイブ** からナビを組み立てるので、リンクが 404 にならないようになっています。

## 編集者向けワークフロー

1. **外観 → カスタマイズ → JIWF Academy** … タグライン、ヒーロー画像、富士／ヒマラヤ写真、問合せメール、SNS、ニュースレター埋め込みを設定
2. **固定ページ（About / Locations / Community / Contact）** … 編集画面で `+` → **パターン → JIWF Academy** から下記パターンを差し込んで組み立て
3. **Programs / Events / Faculty / Partners / Locations CPT** … 各投稿の編集画面下部のメタボックスで構造化データを入力。本文は Gutenberg で自由に編集（パターンも使えます）
4. **ロゴ** … カスタマイザー → サイト基本情報 → ロゴ。`assets/images/logo.png` をフォールバック画像として同梱可

## ブロックパターン一覧

固定ページ編集中に **`+` ボタン → パターン → JIWF Academy** で挿入できます。

| パターン | 用途 |
| --- | --- |
| **About — starter** | About ページの全セクションを一括で挿入（編集してそのまま使えます） |
| **Community — starter** | Community ページの全セクションを一括挿入 |
| **Page hero** | 任意のページの上部ヒーロー（eyebrow + 大見出し + リード） |
| **Statement** | ✦ で挟んだ中央寄せのエディトリアルコピー |
| **Mission · Vision · Values** | I / II / III ローマ数字付きの3カードグリッド |
| **Timeline** | 創設ストーリー用の縦タイムライン |
| **Philosophy** | 4箇条のダーク反転ブロック |
| **Value strip** | 4本柱（Inner Growth など）の横並びストリップ |
| **Story trio** | 富士・学び・ヒマラヤの3画像コラム |
| **Locations preview** | 富士＋ヒマラヤの2カードプレビュー |
| **Locations — Japan & India split** | 各拠点の左右交互スプリット |
| **Partners — types + logos** | パートナータイプ別ロゴ列 |
| **Closing CTA** | 末尾の3ボタン CTA セクション |
| **Contact — secondary info column** | Contact ページのフォーム横テキスト列 |
| **Gold divider** | ✦ の単独区切り |

### パターンに含まれるリンク

`/contact/?topic=newsletter` `/contact/?inquiry=partnership` `/contact/?program=...`
`/contact/?inquiry=event&event=...` のようなクエリ付きリンクが既に組み込まれているので、Contact フォームに JS をフックすれば自動入力ができます（仕様書 §8-7 参照）。

## ロゴサイズの調整

**外観 → カスタマイズ → JIWF Academy → Header & Logo** にスライダーを2つ用意しています：

- **Logo height (px)** — デスクトップ時のロゴ高さ（推奨 40–80px、初期値 56px）
- **Logo height on mobile (px)** — モバイル時のロゴ高さ（初期値 40px）

ロゴが大きすぎる場合は、ここで好みの値に。CSS 変数（`--jiwf-logo-height` /
`--jiwf-logo-height-mobile`）として `<head>` に流し込まれるので、ライブプレビューで
即時確認できます。

## レスポンシブ・ナビゲーション

- 1024px 以下では **ハンバーガーメニュー** に自動切替
- 開いたメニューは画面幅いっぱいに展開、スクロール対応
- 480px 以下では `Get in Touch` ボタンも開いたメニュー内に格納

## 言語

サイト本文は日本語のみ。多言語化は **Google 翻訳ウィジェット** または
ブラウザの自動翻訳で対応する想定なので、JP/EN スイッチャーはバンドルしていません。
WordPress の `<html lang>` 属性は管理画面の **設定 → 一般 → サイトの言語** に従います。

## カラーとフォント（theme.json）

`theme.json` でブランドの全カラー（navy / gold / ivory / rose / sky 等）とフォントサイズ
（`xs` / `sm` / `base` / `lg` / `xl` / `2xl` / `3xl` / `4xl` / `hero`）を WordPress
コアに定義済み。Gutenberg のブロック設定からドロップダウンで選択できます。

## 画像アセット

`assets/images/` に下記を配置（カスタマイザーで上書き可）:

- `logo.png`（推奨 1200×1200, 透過 PNG）
- `hero-fuji-himalaya.jpg`（2400×1400）
- `fuji.jpg` / `himalaya.jpg` / `learning.jpg`（各 1600×1200）

詳細は `assets/images/README.md`。

## Phase 2（範囲外）

オンライン講座・会員制・予約・寄付は外部 SaaS（Teachable / Circle.so / Peatix /
Stripe / Syncable）に委ね、Phase 1 の CTA からリンクで繋ぎます。
