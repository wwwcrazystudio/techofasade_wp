<?php

use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action('carbon_fields_register_fields', 'fasade_gutenberg');

function fasade_gutenberg()
{
    Block::make('block_slider', __('Слайдер изображений'))
        ->set_keywords([__('block'), __('image'), __('content')])
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

        <div data-carousel class="content-block-carousel">
            <button class="content-block-carousel__control content-block-carousel__control--prev" data-prev>
                <svg width="48" height="67" viewBox="0 0 48 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M33 33.5L0 67L21.5 33.5L0 0L33 33.5Z" fill="#CB9274" />
                    <path d="M48 33.5L23 58L38.5 33.5L23 9L48 33.5Z" fill="#CB9274" />
                </svg>
            </button>
            <div class="content-block-carousel__wrap swiper">
                <div class="content-block-carousel__content swiper-wrapper">
                    <?php foreach ($fields['block_slider'] as $slide) : ?>
                        <div class="content-block-carousel__item swiper-slide">
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
            <button class="content-block-carousel__control content-block-carousel__control--next" data-next>
                <svg width="48" height="67" viewBox="0 0 48 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M33 33.5L0 67L21.5 33.5L0 0L33 33.5Z" fill="#CB9274" />
                    <path d="M48 33.5L23 58L38.5 33.5L23 9L48 33.5Z" fill="#CB9274" />
                </svg>
            </button>
        </div>
    <?php });

    Block::make('block_slider_cert', __('Слайдер сертификатов'))
        ->set_keywords([__('block'), __('image'), __('content')])
        ->add_fields(array(
            Field::make('text', 'content_block_cert_heading', 'Заголовок'),
            Field::make('text', 'content_block_cert_index', 'Индекс'),
        ))
        ->set_render_callback(function ($fields) {
    ?>

        <section class="content-block">
            <?php if (!empty($fields['content_block_cert_heading'])) : ?>
                <div class="content-block__head <?= !empty($fields['content_block_cert_index']) ? 'content-block__head--has-index' : null; ?>" <?= !empty($fields['content_block_cert_index']) ? 'data-index="' . $fields['content_block_cert_index'] . '"' : null; ?>>
                    <h2 class="content-block__heading">
                        <?= $fields['content_block_cert_heading']; ?>
                    </h2>
                </div>
            <?php endif; ?>
            <div class="content-block__body">
                <div data-carousel class="content-block-carousel">
                    <button class="content-block-carousel__control content-block-carousel__control--prev" data-prev>
                        <svg width="48" height="67" viewBox="0 0 48 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M33 33.5L0 67L21.5 33.5L0 0L33 33.5Z" fill="#CB9274" />
                            <path d="M48 33.5L23 58L38.5 33.5L23 9L48 33.5Z" fill="#CB9274" />
                        </svg>
                    </button>
                    <div class="content-block-carousel__wrap swiper">
                        <div class="content-block-carousel__content swiper-wrapper">
                            <?php
                            $args = array(
                                'posts_per_page' => 10,
                                'post_type' => 'certificates',
                            );

                            $query = new WP_Query($args);
                            while ($query->have_posts()) :
                                $query->the_post(); ?>
                                <div class="content-block-carousel__item swiper-slide">
                                    <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                                </div>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                    <button class="content-block-carousel__control content-block-carousel__control--next" data-next>
                        <svg width="48" height="67" viewBox="0 0 48 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M33 33.5L0 67L21.5 33.5L0 0L33 33.5Z" fill="#CB9274" />
                            <path d="M48 33.5L23 58L38.5 33.5L23 9L48 33.5Z" fill="#CB9274" />
                        </svg>
                    </button>
                </div>
                <a href="<?= get_post_type_archive_link('certificate'); ?>" class="content-block__link" data-animate-link>
                    показать все
                </a>
            </div>
        </section>

    <?php });

    Block::make('content-block', __('Контентный блок'))
        ->set_keywords([__('block'), __('image'), __('content')])
        ->add_fields(array(
            Field::make('text', 'content_block_heading', 'Заголовок'),
            Field::make('text', 'content_block_index', 'Индекс'),
        ))
        ->set_inner_blocks(true)
        ->set_inner_blocks_position('below')
        ->set_render_callback(function ($fields, $atts, $inner_blocks_content) {
    ?>
        <section class="content-block">
            <?php if (!empty($fields['content_block_heading'])) : ?>
                <div class="content-block__head <?= !empty($fields['content_block_index']) ? 'content-block__head--has-index' : null; ?>" <?= !empty($fields['content_block_index']) ? 'data-index="' . $fields['content_block_index'] . '"' : null; ?>>
                    <h2 class="content-block__heading">
                        <?= $fields['content_block_heading']; ?>
                    </h2>
                </div>
            <?php endif; ?>
            <div class="content-block__body">
                <?= $inner_blocks_content; ?>
            </div>
        </section>
    <?php });

    Block::make('content-block-products', __('Контентный блок c продуктами'))
        ->set_keywords([__('block'), __('image'), __('content')])
        ->add_fields(array(
            Field::make('text', 'content_block_heading', 'Заголовок'),
            Field::make('text', 'content_block_index', 'Индекс'),
        ))
        ->set_render_callback(function ($fields) {
    ?>
        <section class="content-block">
            <?php if (!empty($fields['content_block_heading'])) : ?>
                <div class="content-block__head <?= !empty($fields['content_block_index']) ? 'content-block__head--has-index' : null; ?>" <?= !empty($fields['content_block_index']) ? 'data-index="' . $fields['content_block_index'] . '"' : null; ?>>
                    <h2 class="content-block__heading">
                        <?= $fields['content_block_heading']; ?>
                    </h2>
                </div>
            <?php endif; ?>
            <div class="content-block__products products">
                <ul class="products__list">
                    <?php
                    $args = array(
                        'posts_per_page' => -1,
                        'post_type' => 'production',
                    );

                    $products_query = new WP_Query($args);
                    while ($products_query->have_posts()) :
                        $products_query->the_post();
                        $slider = carbon_get_the_post_meta('product_slider');
                    ?>
                        <li class="products__product-item product-item product-item--simple">
                            <div class="product-item__wrap">
                                <div class="product-item__head">
                                    <a href="<?php the_permalink(); ?>" class="product-item__title">
                                        <?php the_title(); ?>
                                    </a>
                                    <div class="product-item__desc">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                                <div class="product-item__img">
                                    <picture>
                                        <source srcset="<?= wp_get_attachment_image_url($slider[0], 'large'); ?>.webp" type="image/webp">
                                        <img src="<?= wp_get_attachment_image_url($slider[0], 'large'); ?>" alt='<?= get_post_meta($slider[0], '_wp_attachment_image_alt', true); ?>'>
                                    </picture>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="product-item__link" data-animate-link>
                                    Подробнее о продукции
                                </a>
                            </div>
                        </li>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </ul>
            </div>
        </section>
    <?php });

    Block::make('content-block-advantages', __('Контентный блок c преимуществами'))
        ->set_keywords([__('block'), __('image'), __('content')])
        ->add_fields(array(
            Field::make('text', 'content_block_heading', 'Заголовок'),
            Field::make('text', 'content_block_index', 'Индекс'),
            Field::make('complex', 'content_block_advantages', 'Преимущества')
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
        ))
        ->set_render_callback(function ($fields) {
    ?>
        <section class="content-block">
            <?php if (!empty($fields['content_block_heading'])) : ?>
                <div class="content-block__head <?= !empty($fields['content_block_index']) ? 'content-block__head--has-index' : null; ?>" <?= !empty($fields['content_block_index']) ? 'data-index="' . $fields['content_block_index'] . '"' : null; ?>>
                    <h2 class="content-block__heading">
                        <?= $fields['content_block_heading']; ?>
                    </h2>
                </div>
            <?php endif; ?>
            <div class="content-block__advantages advantages">
                <ul class="advantages__list">
                    <?php foreach ($fields['content_block_advantages'] as $item) : ?>
                        <li class="advantages__advantage-item advantage-item">
                            <div class="advantage-item__wrap">
                                <picture class="advantage-item__img">
                                    <source srcset="<?= wp_get_attachment_image_url($item['img'], 'large'); ?>.webp" type="image/webp">
                                    <img src="<?= wp_get_attachment_image_url($item['img'], 'large'); ?>" alt="<?= get_post_meta($item['img'], '_wp_attachment_image_alt', true); ?>">
                                </picture>
                                <div class="advantage-item__title">
                                    <?= $item['heading']; ?>
                                </div>
                                <div class="advantage-item__desc">
                                    <?= $item['text']; ?>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>
    <?php });

    Block::make('content-block-portfolio', __('Контентный блок c портфолио'))
        ->set_keywords([__('block'), __('image'), __('content')])
        ->add_fields(array(
            Field::make('text', 'content_block_heading', 'Заголовок'),
            Field::make('text', 'content_block_index', 'Индекс'),
        ))
        ->set_render_callback(function ($fields) {
    ?>
        <section class="content-block">
            <?php if (!empty($fields['content_block_heading'])) : ?>
                <div class="content-block__head <?= !empty($fields['content_block_index']) ? 'content-block__head--has-index' : null; ?>" <?= !empty($fields['content_block_index']) ? 'data-index="' . $fields['content_block_index'] . '"' : null; ?>>
                    <h2 class="content-block__heading">
                        <?= $fields['content_block_heading']; ?>
                    </h2>
                </div>
            <?php endif; ?>
            <div class="content-block__gallery gallery">
                <ul class="gallery__list">
                    <?php
                    $args = array(
                        'posts_per_page' => 4,
                        'post_type' => 'portfolio',
                    );

                    $portfolio_query = new WP_Query($args);
                    while ($portfolio_query->have_posts()) :
                        $portfolio_query->the_post(); ?>
                        <li class="gallery__item">
                            <a href="<?php the_post_thumbnail_url('full'); ?>" class="gallery__item-link" data-gallery="portfolio">
                                <picture class="gallery__item-img">
                                    <source srcset="<?php the_post_thumbnail_url('large'); ?>.webp" type="image/webp">
                                    <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                                </picture>
                            </a>
                        </li>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </ul>
                <a href="<?= get_post_type_archive_link('portfolio'); ?>" class="gallery__link" data-animate-link>Все работы</a>
            </div>
        </section>
    <?php });


    Block::make('company-advantages-block', __('Преимущества компании'))
        ->set_keywords([__('block'), __('image'), __('content')])
        ->add_fields(array(
            Field::make('text', 'heading', 'Заголовок блока')->set_required(true),
            Field::make('text', 'heading_1', 'Заголовок преимущества 1')->set_required(true),
            Field::make('textarea', 'text_1', 'Текст преимущества 1')->set_required(true),
            Field::make('text', 'heading_2', 'Заголовок преимущества 2')->set_required(true),
            Field::make('textarea', 'text_2', 'Текст преимущества 2')->set_required(true),
            Field::make('text', 'heading_3', 'Заголовок преимущества 3')->set_required(true),
            Field::make('textarea', 'text_3', 'Текст преимущества 3')->set_required(true),
            Field::make('image', 'img', 'Изображение')->set_required(true),
            Field::make('textarea', 'bottom_text', 'Текст снизу')->set_required(true),
        ))
        ->set_render_callback(function ($fields) {
    ?>

        <div class="company-advantages">
            <h2 class="company-advantages__heading">
                <?= $fields['heading']; ?>
            </h2>

            <ul class="company-advantages__list">
                <li class="company-advantages__col">
                    <div class="company-advantages__item">
                        <div class="company-advantages__item-title">
                            <?= $fields['heading_1']; ?>
                        </div>
                        <div class="company-advantages__item-text">
                            <?= $fields['text_1']; ?>
                        </div>
                    </div>
                </li>
                <li class="company-advantages__col">
                    <div class="company-advantages__item">
                        <div class="company-advantages__item-title">
                            <?= $fields['heading_2']; ?>
                        </div>
                        <div class="company-advantages__item-text">
                            <?= $fields['text_2']; ?>
                        </div>
                    </div>
                </li>
                <li class="company-advantages__col">
                    <div class="company-advantages__item">
                        <div class="company-advantages__item-title">
                            <?= $fields['heading_3']; ?>
                        </div>
                        <div class="company-advantages__item-text">
                            <?= $fields['text_3']; ?>
                        </div>
                    </div>

                    <div class="company-advantages__text">
                        <svg width="90" height="90" viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M22.6214 22.925C10.1379 35.5803 -0.0417497 46.0218 0.000128753 46.1285C0.0420072 46.2352 10.0719 56.1499 22.2886 68.1613L44.5011 90L47.7501 86.7617L50.9989 83.5231L43.4651 76.0661C39.3214 71.9648 30.8582 63.5845 24.6582 57.4437L13.3854 46.2785L19.8342 39.8322L26.2829 33.386L40.716 47.614L55.1491 61.8421L58.5912 58.4131L62.0332 54.9844L57.5873 50.6181C39.6966 33.0479 33.2329 26.5085 33.426 26.1728C33.5416 25.9712 36.3297 23.0669 39.622 19.7185L45.6077 13.6301L64.1475 32.1614C74.3444 42.3534 82.8179 50.6924 82.9776 50.6924C83.2822 50.6924 90 44.0729 90 43.773C90 43.5772 45.865 0.130906 45.5334 0.000158175C45.4156 -0.0465786 35.1051 10.2699 22.6214 22.925ZM41.1824 22.6646L38.1296 25.8903L52.6619 40.4418L67.1943 54.9936L61.2648 60.9208L55.335 66.8484L40.7567 52.4767L26.1784 38.1053L22.6635 41.5999C20.7305 43.5221 19.1816 45.1674 19.2215 45.2563C19.471 45.8108 54.2903 79.6514 54.5293 79.5717C54.6919 79.5175 60.4118 73.7924 67.2405 66.8487L79.6563 54.2243L62.0499 36.8316C52.3665 27.2658 44.3967 19.4389 44.3393 19.4389C44.2823 19.4389 42.8615 20.8906 41.1824 22.6646Z" fill="#CB8246" />
                        </svg>

                        <?= $fields['bottom_text']; ?>
                    </div>
                </li>
                <li class="company-advantages__col">
                    <picture class="company-advantages__img">
                        <source srcset="<?= wp_get_attachment_image_url($fields['img'], 'large'); ?>.webp" type="image/webp">
                        <img src="<?= wp_get_attachment_image_url($fields['img'], 'large'); ?>" alt="<?= get_post_meta($fields['img'], '_wp_attachment_image_alt', true); ?>">
                    </picture>
                </li>
            </ul>
        </div>

<?php });
}
