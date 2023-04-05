<?php

add_action( 'init', 'register_post_types' );

function register_post_types(){

	register_post_type( 'production', [
		'label'  => null,
		'labels' => [
			'name'               => 'Продукция', 
			'singular_name'      => 'Продукт', 
			'add_new'            => 'Добавить продукт', 
			'add_new_item'       => 'Добавление продукта', 
			'edit_item'          => 'Редактирование продукта',
			'new_item'           => 'Новый продукт', 
			'view_item'          => 'Смотреть продукт', 
			'search_items'       => 'Искать продукт',
			'not_found'          => 'Не найдено', 
			'not_found_in_trash' => 'Не найдено в корзине', 
			'parent_item_colon'  => '', 
			'menu_name'          => 'Продукция',
		],
		'description'            => '',
		'public'                 => true,
		'show_in_menu'           => null, 
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-layout',
    	'hierarchical'        => false,
		'supports'            => [ 'title', 'editor'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => [
			'with_front' => false
		],
		'query_var'           => true,
		'with_front' 		  => false
	] );

    register_post_type( 'portfolio', [
		'label'  => null,
		'labels' => [
			'name'               => 'Примеры работ', 
			'singular_name'      => 'Пример работ', 
			'add_new'            => 'Добавить пример работ', 
			'add_new_item'       => 'Добавление примера рабль', 
			'edit_item'          => 'Редактирование примера работ',
			'new_item'           => 'Новый пример', 
			'view_item'          => 'Смотреть пример', 
			'search_items'       => 'Искать пример',
			'not_found'          => 'Не найдено', 
			'not_found_in_trash' => 'Не найдено в корзине', 
			'parent_item_colon'  => '', 
			'menu_name'          => 'Примеры работ',
		],
		'description'            => '',
		'public'                 => true,
		'show_in_menu'           => null, 
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-images-alt2',
    	'hierarchical'        => false,
		'supports'            => [ 'title', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => true,
		'rewrite'             => [
			'with_front' => false
		],
		'query_var'           => true,
	] );

    register_post_type( 'testimonial', [
		'label'  => null,
		'labels' => [
			'name'               => 'Отзывы', 
			'singular_name'      => 'Отзыв', 
			'add_new'            => 'Добавить отзыв', 
			'add_new_item'       => 'Добавление отзыва', 
			'edit_item'          => 'Редактирование отзыва',
			'new_item'           => 'Новый отзыв', 
			'view_item'          => 'Смотреть отзыв', 
			'search_items'       => 'Искать отзыв',
			'not_found'          => 'Не найдено', 
			'not_found_in_trash' => 'Не найдено в корзине', 
			'parent_item_colon'  => '', 
			'menu_name'          => 'Отзывы',
		],
		'description'            => '',
		'public'                 => true,
		'show_in_menu'           => null, 
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-admin-comments',
    	'hierarchical'        => false,
		'supports'            => [ 'title', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => true,
		'rewrite'             => [
			'with_front' => false
		],
		'query_var'           => true,
	] );

	register_post_type( 'certificate', [
		'label'  => null,
		'labels' => [
			'name'               => 'Сертификаты и документация', 
			'singular_name'      => 'Сертификат и документация', 
			'add_new'            => 'Добавить', 
			'add_new_item'       => 'Добавление', 
			'edit_item'          => 'Редактирование',
			'new_item'           => 'Новый', 
			'view_item'          => 'Смотреть', 
			'search_items'       => 'Искать',
			'not_found'          => 'Не найдено', 
			'not_found_in_trash' => 'Не найдено в корзине', 
			'parent_item_colon'  => '', 
			'menu_name'          => 'Сертификаты и документация',
		],
		'description'            => '',
		'public'                 => true,
		'show_in_menu'           => null, 
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-media-document',
    	'hierarchical'        => false,
		'supports'            => [ 'title', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => true,
		'rewrite'             => [
			'with_front' => false
		],
		'query_var'           => true,
	] );

	register_post_type( 'dealer', [
		'label'  => null,
		'labels' => [
			'name'               => 'Дилеры', 
			'singular_name'      => 'Дилер', 
			'add_new'            => 'Добавить', 
			'add_new_item'       => 'Добавление', 
			'edit_item'          => 'Редактирование',
			'new_item'           => 'Новый', 
			'view_item'          => 'Смотреть', 
			'search_items'       => 'Искать',
			'not_found'          => 'Не найдено', 
			'not_found_in_trash' => 'Не найдено в корзине', 
			'parent_item_colon'  => '', 
			'menu_name'          => 'Дилеры',
		],
		'description'            => '',
		'public'                 => true,
		'show_in_menu'           => null, 
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-networking',
    	'hierarchical'        => false,
		'supports'            => [ 'title', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => [
			'with_front' => false
		],
		'query_var'           => true,
	] );

}