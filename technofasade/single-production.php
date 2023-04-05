<?php get_header(); ?>

<div class="product-page">
    <div class="product-page__wrap">
        <main class="product-page__main-content">
            <div class="container">
                <?php the_breadcrumbs('product-page'); ?>
                <div class="product-page__head">
                    <div class="product-page__product-info">
                        <h1 class="product-page__heading">
                            <?php the_title(); ?>
                        </h1>
                        <div class="product-page__desc">
                            <?php the_content(); ?>
                        </div>
                        <button class="product-page__link" data-animate-link data-modal="contact-modal">
                            Отправить заявку
                        </button>
                    </div>
                    <div class="product-page__product-carousel product-carousel">
                        <div class="product-carousel__wrap swiper">
                            <ul class="product-carousel__list swiper-wrapper">
                                <?php $slider = carbon_get_the_post_meta('product_slider');
                                foreach ($slider as $item) : ?>
                                    <li class="product-carousel__item swiper-slide">
                                        <picture>
                                            <source srcset="<?= wp_get_attachment_image_url($item, 'full'); ?>.webp" type="image/webp">
                                            <img src="<?= wp_get_attachment_image_url($item, 'full'); ?>" alt="<?= get_post_meta($item, '_wp_attachment_image_alt', true); ?>">
                                        </picture>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <div class="product-carousel__counter">
                                <span>01</span>/01
                            </div>

                            <div class="product-carousel__controls" data-animate-controls>
                                <button class="product-carousel__control" data-control data-direction="next">
                                    <svg width="48" height="67" viewBox="0 0 48 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M33 33.5L0 67L21.5 33.5L0 0L33 33.5Z" fill="white" />
                                        <path d="M48 33.5L23 58L38.5 33.5L23 9L48 33.5Z" fill="white" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-page__configurator">
                <script>
                    <?php
                    $id = get_the_ID();
                    switch ($id):
                        case 21: ?>
                            window.type = 'жалюзи';
                        <?php break;
                        case 133: ?>
                            window.type = 'филенка';
                        <?php break;
                        case 132: ?>
                            window.type = 'горизонтальные';
                    <?php break;
                    endswitch;     ?>
                </script>
                <div id="configurator"></div>
            </div>

            <div class="product-page__attributes">
                <?php
                $attrs = carbon_get_the_post_meta('product_attrs');
                $videos = carbon_get_the_post_meta('product_videos');
                $imgs = carbon_get_the_post_meta('product_photos');
                ?>
                <div class="container">
                    <div class="product-attributes__tabs tabs">
                        <ul class="tabs__list">
                            <?php if (!empty($attrs)) : ?>
                                <li class="tabs__item">
                                    <button class="tabs__btn tabs__btn--active" data-tab="attr">Характеристики</button>
                                </li>
                            <?php endif; ?>
                            <?php if (!empty($videos)) : ?>
                                <li class="tabs__item">
                                    <button class="tabs__btn" data-tab="videos">Видео</button>
                                </li>
                            <?php endif; ?>
                            <?php if (!empty($imgs)) : ?>
                                <li class="tabs__item">
                                    <button class="tabs__btn" data-tab="photos">Фото</button>
                                </li>
                            <?php endif; ?>
                        </ul>

                        <?php if (!empty($attrs)) : ?>
                            <div class="tabs__content tabs__content--attr tabs__content--active" data-tab-content="attr">
                                <ul class="tabs__content-list">
                                    <?php foreach ($attrs as $item) : ?>
                                        <li class="tabs__content-item">
                                            <?= $item['attr_title']; ?> <span><?= $item['attr_value']; ?> </span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($videos)) : ?>
                            <div class="tabs__content" data-tab-content="videos">
                                <div class="tabs__carousel  <?= count($videos) > 2 ? 'tabs__carousel--infinite' : null; ?> swiper">
                                    <div class="tabs__carousel-wrap swiper-wrapper">
                                        <?php foreach ($videos as $vid) : ?>
                                            <div class="tabs__carousel-item swiper-slide">
                                                <iframe width="100" height="100" loading="lazy" src="<?= $vid['link']; ?>" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($imgs)) : ?>
                            <div class="tabs__content" data-tab-content="photos">
                                <div class="tabs__carousel <?= count($imgs) > 2 ? 'tabs__carousel--infinite' : null; ?> swiper">
                                    <div class="tabs__carousel-wrap swiper-wrapper">
                                        <?php foreach ($imgs as $img) : ?>
                                            <div class="tabs__carousel-item swiper-slide">
                                                <picture>
                                                    <source srcset="<?= wp_get_attachment_image_url($img, 'large'); ?>.webp" type="image/webp">
                                                    <img loading="lazy" src="<?= wp_get_attachment_image_url($img, 'large'); ?>" alt="<?= get_post_meta($img, '_wp_attachment_image_alt', true); ?>">
                                                </picture>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </main>
        <section class="product-page__advantages advantages">
            <?php get_template_part('template-parts/content', 'advantages', array('backtext' => 'Преимущества', 'no_heading' => true)); ?>
        </section>

        <?php


        $args = array(
            'posts_per_page' => 9,
            'paged' => get_query_var('paged'),
            'post_type' => 'dealer',
        );

        $query = new WP_Query($args); ?>


        <?php if ($query->have_posts()) : ?>
            <section class="product-page__dealers dealers">
                <div class="container">
                    <div class="dealers__heading">
                        Информацию о стоимости уточняйте у наших дилеров
                    </div>

                    <div class="dealers__content">
                        <ul class="dealers__list" data-container>
                            <?php while ($query->have_posts()) : $query->the_post();
                                $address = carbon_get_the_post_meta('dealer_address');
                                $address_url = carbon_get_the_post_meta('dealer_address_url');
                                $tel = carbon_get_the_post_meta('dealer_tel');
                            ?>
                                <li class="dealers__item">
                                    <div class="dealers__item-img">
                                        <img width="145" height="145" src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                                    </div>
                                    <div class="dealers__item-info">
                                        <div class="dealers__item-title">
                                            <?php the_title(); ?>
                                        </div>
                                        <a href="<?= $address_url; ?>" class="dealers__item-address">
                                            <?= $address; ?>
                                        </a>
                                        <a href="tel:<?= str_replace(array('(', ')', ' ', '-'), '', $tel); ?>" class="dealers__item-tel">
                                            <?= $tel; ?>
                                        </a>
                                    </div>
                                </li>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        </ul>

                        <?php if ($query->found_posts > 9) : ?>
                            <button class="dealers__load-more" data-animate-link data-load-more data-action="dealer_load_more" data-page="<?= get_query_var('paged'); ?>">
                                Показать еще
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>