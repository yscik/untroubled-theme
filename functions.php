<?php
/**
 * Untroubled theme functions and definitions
 *
 * @package Untroubled_Theme
 * @since 1.0
 */

namespace Untroubled_Theme;

/**
 * Set up theme supports.
 */
function untroubled_support() {

	// Enqueue editor styles.
	add_editor_style( 'style.css' );

	// Make theme available for translation.
	load_theme_textdomain( 'untroubled' );
}

/**
 * Enqueue styles.
 */
function untroubled_styles() {

	wp_register_style(
		'untroubled-theme-style',
		get_stylesheet_directory_uri() . '/style.css',
		array(),
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_style( 'untroubled-theme-style' );

}

const MENU_ICON = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5 5.01869C7.41125 5.01869 9.8254 5.16961 12.2376 5.16961C13.0513 5.16961 13.8721 5.20245 14.6836 5.13188C15.3662 5.07253 16.0608 5.02422 16.7461 5.01869C17.2061 5.01498 17.6841 5.05982 18.142 5.01031C18.4151 4.98079 18.6917 5.00275 18.9595 4.94324" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
<path d="M18.9218 11.9607C18.5357 11.9256 18.1475 11.8441 17.7606 11.8014C16.7196 11.6866 15.6872 11.5913 14.6396 11.5645C13.5175 11.5359 12.3975 11.548 11.2755 11.575C10.4048 11.596 9.55209 11.7275 8.6848 11.7679C7.45834 11.8249 6.2295 11.8098 5 11.8098" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
<path d="M4 18.1272C6.72703 18.354 9.60046 18.449 12.709 18.3326C13.8716 18.3872 15.8252 18.1468 16.985 18.2446C17.3173 18.2726 17.6385 18.2991 17.9723 18.2991C18.119 18.2991 18.4882 18.3659 18.5927 18.2614" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
';

/**
 * Replace Navigation block menu icon.
 */
function untroubled_render_block_navigation( $content, $block ) {
	return preg_replace( '/<button(.*)><svg.*><\/button>/', '<button$1>' . MENU_ICON . '</button>', $content, 1 );
}

add_action( 'after_setup_theme', __NAMESPACE__ . '\untroubled_support' );
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\untroubled_styles' );
add_filter( 'render_block_core/navigation', __NAMESPACE__ . '\untroubled_render_block_navigation', 10, 2 );
