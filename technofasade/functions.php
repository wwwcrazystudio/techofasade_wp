<?php

/**
 * Technofasade functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Technofasade
 */


define('_S_VERSION', '1.0.0');
define('THEME_PATH', get_template_directory_uri());

function techofasade_setup()
{
	load_theme_textdomain('techofasade', get_template_directory() . '/languages');

	add_theme_support('title-tag');

	add_theme_support('post-thumbnails');

	register_nav_menus(
		array(
			'main-menu-1' => esc_html__('Главное меню 1', 'techofasade'),
			'main-menu-2' => esc_html__('Главное меню 2', 'techofasade'),
			'footer-menu-1' => esc_html__('Футер меню 1', 'techofasade'),
			'footer-menu-2' => esc_html__('Футер меню 2', 'techofasade'),
		)
	);

	add_theme_support(
		'html5',
		array(
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action('after_setup_theme', 'techofasade_setup');

/**
 * Enqueue scripts and styles.
 */
function techofasade_scripts()
{
	wp_enqueue_style('app', THEME_PATH . '/assets/css/app.css', array(), _S_VERSION);
	wp_enqueue_style('techofasade-style', get_stylesheet_uri(), array(), _S_VERSION);

	wp_enqueue_script('app', THEME_PATH . '/assets/js/app.js', array(), _S_VERSION, true);
	wp_enqueue_script('ajax', THEME_PATH . '/assets/js/ajax.js', array(), _S_VERSION, true);

	wp_localize_script('ajax', 'ajax', array(
		'url' => admin_url('admin-ajax.php')
	));
}

add_action('wp_enqueue_scripts', 'techofasade_scripts');

add_action('after_setup_theme', 'crb_load');
function crb_load()
{
	require_once('vendor/autoload.php');
	\Carbon_Fields\Carbon_Fields::boot();
}

require_once('inc/cpt.php');
require_once('inc/metafields.php');
require_once('inc/utils.php');
require_once('inc/gutenberg_blocks.php');
require_once('inc/bem_walker.php');
require_once('inc/ajax.php');