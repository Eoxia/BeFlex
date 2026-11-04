=== Beflex FSE ===
Contributors: Eoxia
Requires at least: 6.6
Tested up to: 7.1
Requires PHP: 7.4
Stable tag: 4.2.0
License: AGPLv3
License URI: https://spdx.org/licenses/AGPL-3.0-or-later.html

Easy to use block theme designed for the WordPress Site Editor.

== Description ==

Beflex is a block based WordPress theme. Every part of the site (templates, headers, footers, styles) can be edited from Appearance > Editor.
Beflex is also easy to use for web developers.

== Installation ==

1. Upload the `beflex` folder to the `/wp-content/themes/` directory.
2. Activate the theme through the 'Appearance > Themes' menu in WordPress.
3. Customize it from 'Appearance > Editor'.

== Copyright ==

Beflex FSE, Copyright 2026 the Eoxia team.
Beflex FSE is distributed under the terms of the AGPLv3.

== Changelog ==

= 4.2.0 =
* Security: replace the outdated build toolchain (gulp, @wordpress/scripts 18) and fix every npm vulnerability reported by Dependabot.
* Fonts: Lato and Open Sans now come from the WordPress Font Library instead of Google Fonts. After updating, install them once from Appearance > Editor > Styles > Typography > Manage fonts > Install fonts (Google Fonts collection). Until then, a system sans-serif font is used.
* Removed: "Hide on" and "Animation in" block attributes, now provided by the EO Blocks plugin. The `hide-on-mobile` / `hide-on-desktop` classes are kept so existing content keeps working.
* Removed: jQuery dependency, the front-end script is now vanilla JavaScript loaded with `defer`.
* Updated: the child theme block generator (`inc/generateBlock.js`) creates vanilla JavaScript block scripts, with no jQuery dependency, loaded in the footer with `defer`.
* Updated: theme.json and style variations to version 3 (WordPress 6.6+).
* Updated: single post template uses the Comments block instead of the deprecated Post Comments block.
* Updated: query patterns use the Post Template grid layout.
* Updated: SCSS uses the Sass module system (`@use`) instead of the deprecated `@import`.
* Fixed: the Cover inner container and the full-width Media & Text block follow the content and wide sizes set in theme.json instead of hardcoded widths (#67).
* i18n: English source strings and French translation.
* Compatibility: tested on PHP 7.4 to 8.3 (PHPCompatibility checked for later versions) and WordPress 7.1, requires WordPress 6.6+.
* Coding standards: PHP code follows the WordPress Coding Standards (PHPCS configuration included).

= 4.0.0-beta =
* Compatibility with Gutenberg v11.3.0
* Theme redesign to work with WP Full site editing
