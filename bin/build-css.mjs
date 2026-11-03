/**
 * Compile the theme SCSS into assets/css/style.css and assets/css/style.min.css.
 *
 * Usage:
 *   node bin/build-css.mjs          Build once.
 *   node bin/build-css.mjs --watch  Build, then rebuild on every SCSS change.
 */

import fs from 'node:fs';
import path from 'node:path';
import { fileURLToPath } from 'node:url';
import * as sass from 'sass';
import postcss from 'postcss';
import autoprefixer from 'autoprefixer';

const root = path.resolve( path.dirname( fileURLToPath( import.meta.url ) ), '..' );
const scssDir = path.join( root, 'assets/scss' );
const cssDir = path.join( root, 'assets/css' );
const entry = path.join( scssDir, 'style.scss' );

/**
 * Compile SCSS, add vendor prefixes and write the CSS file.
 *
 * @param {string} style    Sass output style: "expanded" or "compressed".
 * @param {string} fileName Output file name.
 */
async function compile( style, fileName ) {
	const { css } = sass.compile( entry, { style } );
	const result = await postcss( [ autoprefixer( { cascade: false } ) ] ).process( css, { from: undefined } );
	const output = 'expanded' === style ? result.css.replace( /\r?\n/g, '\r\n' ) : result.css;

	fs.writeFileSync( path.join( cssDir, fileName ), output );
}

async function build() {
	try {
		await compile( 'expanded', 'style.css' );
		await compile( 'compressed', 'style.min.css' );
		console.log( `[${ new Date().toLocaleTimeString() }] CSS built.` );
	} catch ( error ) {
		console.error( error.message );
		process.exitCode = 1;
	}
}

await build();

if ( process.argv.includes( '--watch' ) ) {
	let timer;
	console.log( 'Watching assets/scss for changes...' );
	fs.watch( scssDir, { recursive: true }, ( event, file ) => {
		if ( ! file || ! file.endsWith( '.scss' ) ) {
			return;
		}
		clearTimeout( timer );
		timer = setTimeout( build, 100 );
	} );
}
