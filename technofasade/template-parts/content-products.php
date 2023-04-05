<?php
$args = array(
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'ASC',
    'post_type' => 'production',
);

$query = new WP_Query($args);

if ($query->have_posts()) : ?>

    <div class="products__wrap">
        <div class="container">
            <div class="products__heading" data-aos="fade-up">
                <div class="products__backtext">
                    Декоративные элементы для окон
                </div>
                <h2 class="products__heading-content">
                    Продукция
                </h2>
            </div>
        </div>
        <ul class="products__list">
            <?php while ($query->have_posts()) :
                $query->the_post();

                $slider = carbon_get_the_post_meta('product_slider');
                $features = carbon_get_the_post_meta('features');
            ?>
                <li class="products__product-item product-item">
                    <div class="product-item__wrap">
                        <div class="container">
                            <div class="product-item__head">
                                <a href="<?php the_permalink(); ?>" class="product-item__title" data-aos="fade-right">
                                    <?php the_title(); ?>
                                </a>
                                <div class="product-item__desc" data-aos="fade-left">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                            <div class="product-item__carousel swiper" data-aos="fade-up">
                                <ul class="product-item__carousel-wrap swiper-wrapper">
                                    <?php foreach ($slider as $item) : ?>
                                        <li class="product-item__carousel-item swiper-slide">
                                            <picture>
                                                <source srcset="<?= wp_get_attachment_image_url($item, 'full'); ?>.webp" type="image/webp">
                                                <img loading="lazy" src="<?= wp_get_attachment_image_url($item, 'full'); ?>" alt="<?= get_post_meta($item, '_wp_attachment_image_alt', true); ?>">
                                            </picture>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="product-item__carousel-controls" data-animate-controls>
                                    <button class="product-item__carousel-control" data-control data-direction="next">
                                        <svg width="48" height="67" viewBox="0 0 48 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M33 33.5L0 67L21.5 33.5L0 0L33 33.5Z" fill="white" />
                                            <path d="M48 33.5L23 58L38.5 33.5L23 9L48 33.5Z" fill="white" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="product-item__carousel-counter">
                                    <span>01</span>/01
                                </div>
                            </div>
                            <div class="product-item__product-features product-features" data-aos="fade-up">
                                <div class="product-features__heading">
                                    Характеристики
                                </div>
                                <ul class="product-features__list">
                                    <?php foreach ($features as $feature) :
                                        $content_class_modifier = count($feature['values']) > 4 ? 4 : count($feature['values']);
                                    ?>
                                        <li class="product-features__feature-item feature-item">
                                            <button class="feature-item__toggle <?= $feature['optional'] ? 'feature-item__toggle--optional' : null; ?>">
                                                <span class="feature-item__title">
                                                    <?= $feature['heading']; ?>

                                                    <?php if ($feature['optional']) : ?>
                                                        <span class="feature-item__notice">
                                                            * Опционально
                                                        </span>
                                                    <?php endif; ?>
                                                </span>
                                                <span class="feature-item__values">
                                                    <?php foreach ($feature['values'] as $value) : ?>
                                                        <span class="feature-item__value-item">
                                                            <?= $value['title']; ?>
                                                        </span>
                                                    <?php endforeach; ?>
                                                </span>
                                            </button>
                                            <div class="feature-item__content feature-item__content--<?= $content_class_modifier; ?>">
                                                <?php foreach ($feature['values'] as $value) : ?>
                                                    <figure class="feature-item__content-item">
                                                        <picture class="feature-item__content-item-img">
                                                            <source srcset="<?= wp_get_attachment_image_url($value['img'], 'full'); ?>.webp" type="image/webp">
                                                            <img loading="lazy" src="<?= wp_get_attachment_image_url($value['img'], 'full'); ?>" alt="<?= get_post_meta($value['img'], '_wp_attachment_image_alt', true); ?>">
                                                        </picture>
                                                        <figcaption>
                                                            <?= $value['title']; ?>
                                                        </figcaption>
                                                    </figure>
                                                <?php endforeach; ?>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div data-aos="fade-up">
                                <a href="<?php the_permalink(); ?>" class="product-item__link" data-animate-link>
                                    Подробнее о продукции
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </ul>
    </div>

<?php endif; ?>