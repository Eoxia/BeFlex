# Beflex - WordPress Theme

Beflex is a block based WordPress theme.
All the sections are editable from WordPress Dashboard > Appearance > Editor.

## Requirements

- WordPress 6.6 or later
- PHP 7.4 or later

## Instructions to Get Started

1. Clone this repository or upload a zip of the theme into your site’s themes directory.
2. Activate the theme from within `Appearance` > `Themes`.
3. Customize templates, template parts and styles from `Appearance` > `Editor`.

## Fonts

The theme does not ship font files. It uses **Lato** (headings) and **Open Sans** (body text) from the WordPress Font Library:

1. Go to `Appearance` > `Editor` > `Styles` > `Typography` and click **Manage fonts**.
2. In **Install fonts**, choose the Google Fonts collection (allow access when asked).
3. Install **Lato** and **Open Sans** with every variant.

WordPress copies the files to `wp-content/uploads/fonts` and serves them from your site: visitors never connect to Google. Until the fonts are installed, a system sans-serif font is used.

## Development

Requirements: Node.js 22.13+ and Composer.

```bash
npm install       # Install the CSS build tools
npm run build     # Compile assets/scss into assets/css/style.css and style.min.css
npm start         # Same, then rebuild on every SCSS change

composer install  # Install PHP_CodeSniffer, WordPress Coding Standards and PHPCompatibility
composer lint     # Check the PHP code
composer lint:fix # Fix what can be fixed automatically
```

Translations live in `languages/` (`beflex.pot` template, `fr_FR` translation).
