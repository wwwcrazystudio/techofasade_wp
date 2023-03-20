<?php


use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action('carbon_fields_register_fields', 'fasade_metafields');

function fasade_metafields()
{
    Container::make('post_meta', 'Первый экран главной')
        ->where('post_id', '=', get_option('page_on_front'))
        ->add_fields(array(
            Field::make('text', 'hero_heading', 'Заголовок'),
            Field::make('textarea', 'hero_desc', 'Описание'),
            Field::make('media_gallery', 'hero_slider', 'Изображения')
                ->set_type(array('image'))
        ));

    Container::make('post_meta', 'Преимущества')
        ->where('post_id', '=', get_option('page_on_front'))
        ->add_fields(array(
            Field::make('complex', 'advantages', 'Преимущества')
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('text', 'heading', 'Заголовок'),
                    Field::make('textarea', 'text', 'Текст'),
                    Field::make('image', 'img', 'Изображение'),
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
            Field::make('text', 'variations_heading', 'Заголовок'),
            Field::make('textarea', 'variations_desc', 'Описание'),
            Field::make('media_gallery', 'variations_slider', 'Изображения')
                ->set_type(array('image'))
        ));

    Container::make('post_meta', 'Монтаж')
        ->where('post_id', '=', get_option('page_on_front'))
        ->add_fields(array(
            Field::make('text', 'montage_heading', 'Заголовок'),
            Field::make('textarea', 'montage_desc', 'Описание'),
            Field::make('text', 'montage_video', 'Ссылка на видео')
        ));

    Container::make('post_meta', 'О компании')
        ->where('post_id', '=', get_option('page_on_front'))
        ->add_fields(array(
            Field::make('text', 'about_heading', 'Заголовок'),
            Field::make('textarea', 'about_desc', 'Описание'),
            Field::make('complex', 'about_advantages', 'Преимущества')
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('text', 'heading', 'Заголовок'),
                    Field::make('textarea', 'text', 'Текст'),
                ))
                ->set_header_template('
                    <% if (heading) { %>
                        <%- heading %>
                    <% } %>
                ')
        ));

    Container::make('post_meta', 'Данные продукта')
        ->where('post_type', '=', 'production')
        ->add_fields(array(
            Field::make('media_gallery', 'product_slider', 'Изображения')
                ->set_type(array('image')),
            Field::make('complex', 'features', 'Характеристики')
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('text', 'heading', 'Заголовок'),
                    Field::make('checkbox', 'optional', 'Опционально'),
                    Field::make('complex', 'values', 'Значения')
                        ->set_layout('tabbed-horizontal')
                        ->add_fields(array(
                            Field::make('text', 'title', 'Название'),
                            Field::make('image', 'img', 'Изображение'),
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
            ')
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

        Block::make( 'block_slider', __( 'Слайдер изображений' )  )
        ->set_keywords( [ __( 'block' ), __( 'image' ), __( 'content' ) ] )
        ->add_fields(array(
            Field::make('complex', 'block_slider', 'Слайдер изображений')
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('text', 'caption', 'Подпись'),
                    Field::make('image', 'img', 'Изображение'),
                ))
        ))
        ->set_render_callback(function ($fields) {
?>

<div data-carousel class="single-news-page__article-carousel">
            <button class="single-news-page__article-carousel-control single-news-page__article-carousel-control--prev" data-prev>
                <svg width="48" height="67" viewBox="0 0 48 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M33 33.5L0 67L21.5 33.5L0 0L33 33.5Z" fill="#CB9274" />
                    <path d="M48 33.5L23 58L38.5 33.5L23 9L48 33.5Z" fill="#CB9274" />
                </svg>
            </button>
            <div class="single-news-page__article-carousel-wrap swiper">
                <div class="single-news-page__article-carousel-wrap swiper-wrapper">
                    <?php foreach ($fields['block_slider'] as $slide) : ?>
                        <div class="single-news-page__article-carousel-item swiper-slide">
                            <figure>
                                <img src="<?= wp_get_attachment_image_url($slide['img'], 'full'); ?>" alt="<?= get_post_meta($slide['img'], '_wp_attachment_image_alt', true); ?>">
                                <?php if ($slide['caption']) : ?>
                                    <figcaption>
                                        <?= $slide['caption']; ?>
                                    </figcaption>
                                <?php endif; ?>
                            </figure>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <button class="single-news-page__article-carousel-control single-news-page__article-carousel-control--next" data-next>
                <svg width="48" height="67" viewBox="0 0 48 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M33 33.5L0 67L21.5 33.5L0 0L33 33.5Z" fill="#CB9274" />
                    <path d="M48 33.5L23 58L38.5 33.5L23 9L48 33.5Z" fill="#CB9274" />
                </svg>
            </button>
        </div>
<?php });
}
