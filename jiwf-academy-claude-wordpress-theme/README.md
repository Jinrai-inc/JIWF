# JIWF Academy — WordPress Theme (Phase 1)

Custom WordPress classic theme for **JIWF Academy** — an editorial brand site
for *One Wisdom, One World*. Built by Jinrai Co., Ltd.

> **Phase 1 scope:** brand site + bilingual (JP / EN). No course sales, no
> membership, no on-site checkout. All such flows route to the contact page or
> external SaaS in Phase 2.

## No paid plugins required

Everything is built on WordPress core only. No ACF, no premium add-ons.

| Concern | How it's solved (no plugin) |
| --- | --- |
| Custom post fields | Native `add_meta_box` + `get_post_meta` (see `inc/meta-boxes.php`) |
| Site-wide settings | Customizer (`Appearance → Customize → JIWF Academy`) |
| Hero / location images | Customizer image controls + bundled fallbacks in `assets/images/` |
| Repeaters (curriculum modules, timetable, social links) | Line-based textareas parsed by `jiwf_parse_pairs()` / `jiwf_parse_rows()` |
| Media uploader for image meta fields | Bundled `wp.media` + `assets/js/admin-meta.js` |

## Recommended (still optional) plugins

These remain free and only add convenience — they are **not** required for the
theme to work:

- **Polylang** — JP / EN translations (the theme detects it and uses its
  language switcher; falls back to a static JP/EN row if absent)
- **Contact Form 7** — to populate the Contact page
- **WP Mail SMTP** — for reliable Gmail delivery
- **AIOSEO** — meta tags / sitemap (theme already outputs Organization JSON-LD)
- **MailPoet** — newsletter form (or paste any embed snippet into the Customizer)

## Custom post types

`program`, `event`, `faculty`, `partner`, `testimonial`, `location`.

## Custom taxonomies

`program_pillar`, `event_type`, `event_region`, `partner_type`, `faculty_role`.

## Menu locations

`primary`, `footer`, `legal`.

## Recommended page setup

| Page | Template |
| --- | --- |
| Home | (set as front page; uses `front-page.php`) |
| About | **About** |
| Locations | **Locations** |
| Community | **Community** |
| Contact | **Contact** |
| Privacy / Terms | (default page template) |

## Editor workflow

1. **Appearance → Customize → JIWF Academy** — set tagline, hero image, Fuji /
   Himalaya photos, contact email, social links, newsletter embed.
2. **Programs / Events / Faculty / Partners / Locations** — each has a meta box
   below the editor with all custom fields. Repeater fields use line-based
   syntax (each line is one entry, fields separated by ` | `).
3. **Logo** — Customizer → Site Identity → Logo. The theme also looks for a
   bundled `assets/images/logo.png` as a fallback.

## Image assets

Drop the following into `assets/images/` (see `assets/images/README.md`):

- `logo.png` (recommended 1200×1200, transparent PNG)
- `hero-fuji-himalaya.jpg` (2400×1400)
- `fuji.jpg`, `himalaya.jpg`, `learning.jpg` (1600×1200)

Editors can later override any of them through the Customizer without touching
files.

## Phase 2 (out of scope)

Online courses, paid memberships, on-site reservations, donations — all to be
delegated to external SaaS (Teachable, Circle.so, Peatix, Stripe, Syncable) and
linked from the existing CTAs.
