<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'fasade_metafields');

function fasade_metafields()
{
    Container::make('post_meta', 'Первый экран главной')
        ->where('post_id', '=', get_option('page_on_front'))
        ->add_fields(array(
            Field::make('text', 'hero_heading', 'Заголовок')->set_required(true),
            Field::make('textarea', 'hero_desc', 'Описание')->set_required(true),
            Field::make('media_gallery', 'hero_slider', 'Изображения')
                ->set_type(array('image'))
        ));

    Container::make('post_meta', 'Преимущества')
        ->where('post_id', '=', get_option('page_on_front'))
        ->or_where('post_type', '=', 'production')
        ->add_fields(array(
            Field::make('complex', 'advantages', 'Преимущества')
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('text', 'heading', 'Заголовок')->set_required(true),
                    Field::make('textarea', 'text', 'Текст'),
                    Field::make('image', 'img', 'Изображение')->set_required(true),
                ))
                ->set_header_template('
                <% if (heading) { %>
                    <%- heading %>
                <% } %>
            ')
        ));


    Container::make('post_meta', 'Крепеж')
        ->where('post_id', '=', get_option('page_on_front'))
        ->add_fields(array(
            Field::make('text', 'variations_heading', 'Заголовок')->set_required(true),
            Field::make('textarea', 'variations_desc', 'Описание')->set_required(true),
            Field::make('media_gallery', 'variations_slider', 'Изображения')->set_required(true)
                ->set_type(array('image'))
        ));

    Container::make('post_meta', 'Монтаж')
        ->where('post_id', '=', get_option('page_on_front'))
        ->add_fields(array(
            Field::make('text', 'montage_heading', 'Заголовок')->set_required(true),
            Field::make('textarea', 'montage_desc', 'Описание')->set_required(true),
            Field::make('text', 'montage_video', 'Ссылка на видео')->set_required(true)
        ));

    Container::make('post_meta', 'О компании')
        ->where('post_id', '=', get_option('page_on_front'))
        ->add_fields(array(
            Field::make('text', 'about_heading', 'Заголовок')->set_required(true),
            Field::make('textarea', 'about_desc', 'Описание')->set_required(true),
            Field::make('complex', 'about_advantages', 'Преимущества')
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('text', 'heading', 'Заголовок')->set_required(true),
                    Field::make('textarea', 'text', 'Текст')->set_required(true),
                ))
                ->set_header_template('
                    <% if (heading) { %>
                        <%- heading %>
                    <% } %>
                ')
        ));

    Container::make('post_meta', 'Данные дилера')
        ->where('post_type', '=', 'dealer')
        ->add_fields(array(
            Field::make('text', 'dealer_address', 'Адрес'),
            Field::make('text', 'dealer_address_url', 'Ссылка адреса'),
            Field::make('text', 'dealer_tel', 'Телефон'),
        ));

    Container::make('post_meta', 'Данные продукта')
        ->where('post_type', '=', 'production')
        ->add_fields(array(
            Field::make('media_gallery', 'product_slider', 'Изображения')
                ->set_type(array('image')),
            Field::make('complex', 'features', 'Характеристики')
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('text', 'heading', 'Заголовок')->set_required(true),
                    Field::make('checkbox', 'optional', 'Опционально'),
                    Field::make('complex', 'values', 'Значения')->set_required(true)
                        ->set_layout('tabbed-horizontal')
                        ->add_fields(array(
                            Field::make('text', 'title', 'Название')->set_required(true),
                            Field::make('image', 'img', 'Изображение')->set_required(true),
                        ))
                        ->set_header_template('
                            <% if (title) { %>
                                <%- title %>
                            <% } %>
                        ')
                ))
                ->set_header_template('
                <% if (heading) { %>
                    <%- heading %>
                <% } %>
            '),

            Field::make('complex', 'product_attrs', 'Характеристики в блоке характеристик')
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('text', 'attr_title', 'Название характеристики')->set_required(true),
                    Field::make('text', 'attr_value', 'Значение характеристики')->set_required(true),
                )),

            Field::make('media_gallery', 'product_photos', 'Изображения в блоке характеристик')
                ->set_type(array('image')),

            Field::make('complex', 'product_videos', 'Видео в блоке характеристик')
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('text', 'link', 'Ссылка на видео')->set_required(true),
                ))
        ));

    Container::make('post_meta', 'Данные отзыва')
        ->where('post_type', '=', 'testimonial')
        ->add_fields(array(
            Field::make('text', 'testimonial_job', 'Должность'),
            Field::make('radio', 'testimonial_type', 'Тип контента')
                ->add_options(array(
                    'text' => 'Tекст',
                    'video' => 'Видео',
                    'img' => 'Изображение',
                )),
            Field::make('textarea', 'testimonial_text', 'Текст')
                ->set_conditional_logic(array(
                    [
                        'field' => 'testimonial_type',
                        'value' => 'text',
                        'compare' => '=',
                    ]
                )),
            Field::make('text', 'testimonial_video', 'Ссылка на видео')
                ->set_conditional_logic(array(
                    [
                        'field' => 'testimonial_type',
                        'value' => 'video',
                        'compare' => '=',
                    ]
                )),
            Field::make('image', 'testimonial_img', 'Изображение')
                ->set_conditional_logic(array(
                    [
                        'field' => 'testimonial_type',
                        'value' => 'img',
                        'compare' => '=',
                    ]
                )),
        ));

    Container::make('theme_options', __('Настройки темы'))
        ->add_tab(__('Общие данные'), array(
            Field::make('text', 'tel', 'Номер телефона'),
            Field::make('text', 'email', 'Email'),
            Field::make('text', 'address', 'Адрес'),
            Field::make('text', 'workhours', 'Часы работы'),
            Field::make('text', 'map', 'Карта'),
        ))
        ->add_tab(__('Соц.сети'), array(
            Field::make('complex', 'socials', 'Соц.сети')
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('text', 'title', 'Название')->set_required(true),
                    Field::make('text', 'link', 'Ссылка')->set_required(true),
                    Field::make('image', 'icon', 'Иконка')->set_required(true),
                ))
                ->set_header_template('
                    <% if (title) { %>
                        <%- title %>
                    <% } %>
                ')
        ))
        ->add_tab(__('Мессенджеры'), array(
            Field::make('text', 'wa', 'Whatsapp'),
            Field::make('text', 'tg', 'Telegram'),
        ));
}
