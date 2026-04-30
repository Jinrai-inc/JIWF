# JIWF Academy — WordPress Theme (Phase 1)

A custom WordPress classic theme for **JIWF Academy** — an editorial brand site
expressing the world of *One Wisdom, One World*. Built by Jinrai Co., Ltd.

> **Phase 1 scope:** brand site + bilingual (JP / EN). No course sales, no
> membership, no on-site checkout. All such flows route to the contact page or
> external SaaS in Phase 2.

## Required plugins

| Purpose | Plugin |
| --- | --- |
| Multilingual (JP / EN) | **Polylang** |
| Custom fields | **Advanced Custom Fields** (free) |
| Forms | **Contact Form 7** + Flamingo |
| SMTP | **WP Mail SMTP** |
| SEO | **AIOSEO** |
| Cache | **WP Rocket** or LiteSpeed Cache |
| Image optimisation | **ShortPixel** or Imagify |
| Security | **Wordfence** |
| Backup | **UpdraftPlus** |
| Newsletter | **MailPoet** |

ACF is required for the editor experience; the theme degrades gracefully if it
is not active (placeholders render).

## Custom post types

`program`, `event`, `faculty`, `partner`, `testimonial`, `location`.

## Custom taxonomies

`program_pillar`, `event_type`, `event_region`, `partner_type`, `faculty_role`.

## Menu locations

`primary`, `footer`, `legal`.

## Recommended page setup

Create the following pages in WordPress and assign templates:

| Page | Template |
| --- | --- |
| Home | (set as front page; uses `front-page.php`) |
| About | **About** |
| Locations | **Locations** |
| Community | **Community** |
| Contact | **Contact** |
| Privacy | (default page template) |
| Terms | (default page template) |

## Site Settings (ACF Options page)

After ACF is active, an **JIWF Settings** menu appears with: brand statement,
newsletter embed, contact email, social links.

## Asset & content checklist

See section 7 of the implementation brief for the full asset list (Mt. Fuji /
Himalaya imagery, founder portraits, partner logos, etc.). Place hero photos
into the Media Library and bind them through ACF Site Settings.

## Phase 2 (out of scope)

Online courses, paid memberships, on-site reservations, donations — all to be
delegated to external SaaS (Teachable, Circle.so, Peatix, Stripe, Syncable).
