<?php
$args = array(
    'posts_per_page' => 10,
    'post_type' => 'portfolio',
);

$query = new WP_Query($args);

if ($query->have_posts()) : ?>

    <div class="portfolio__wrap">
        <div class="container">
            <div class="portfolio__heading" data-aos="fade-up">
                <div class="portfolio__backtext">
                    Реализованные решения
                </div>
                <div class="portfolio__heading-content">
                    Примеры работ
                </div>
            </div>

            <div class="portfolio__carousel swiper" data-aos="fade-up">
                <ul class="portfolio__carousel-list swiper-wrapper">
                    <?php while ($query->have_posts()) :
                        $query->the_post(); ?>

                        <li class="portfolio__carousel-item swiper-slide">
                            <picture>
                                <source srcset="<?php the_post_thumbnail_url('large'); ?>.webp" type="image/webp">
                                <img loading="lazy" src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                            </picture>
                        </li>

                    <?php endwhile; wp_reset_postdata();?>
                </ul>

                <div class="portfolio__carousel-controls" data-animate-controls>
                    <button class="portfolio__carousel-control" data-control data-direction="next">
                        <svg width="48" height="67" viewBox="0 0 48 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M33 33.5L0 67L21.5 33.5L0 0L33 33.5Z" fill="white" />
                            <path d="M48 33.5L23 58L38.5 33.5L23 9L48 33.5Z" fill="white" />
                        </svg>
                    </button>
                </div>
            </div>

            <div data-aos="fade-up"><a href="<?= get_post_type_archive_link('portfolio'); ?>" class="portfolio__link" data-animate-link>Все проекты</a></div>
        </div>
    </div>

<?php endif; ?>