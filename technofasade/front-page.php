<?php get_header(); ?>

<main class="frontpage">

    <?php
    $hero_heading = carbon_get_the_post_meta('hero_heading');
    $hero_text = carbon_get_the_post_meta('hero_desc');
    $hero_slider = carbon_get_the_post_meta('hero_slider');
    ?>
    <section class="frontpage__hero hero">
        <div class="hero__wrap">
            <div class="container">
                <div class="hero__head">
                    <h1 class="hero__heading" data-aos="fade-right">
                        <?= $hero_heading; ?>
                    </h1>
                    <div class="hero__desc" data-aos="fade-left">
                        <?= $hero_text; ?>
                    </div>
                </div>
            </div>

            <?php if (!empty($hero_slider)) : ?>
                <div class="hero__hero-carousel hero-carousel" data-aos="fade-up">
                    <div class="hero-carousel__wrap swiper">
                        <ul class="hero-carousel__list swiper-wrapper">
                            <?php foreach ($hero_slider as $item) : ?>
                                <li class="hero-carousel__item swiper-slide">
                                    <picture>
                                        <source srcset="<?= wp_get_attachment_image_url($item, 'full'); ?>.webp" type="image/webp">
                                        <img src="<?= wp_get_attachment_image_url($item, 'full'); ?>" alt="<?= get_post_meta($item, '_wp_attachment_image_alt', true); ?>">
                                    </picture>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="hero-carousel__counter">
                            <span>01</span>/01
                        </div>

                        <div class="hero-carousel__controls" data-animate-controls>
                            <button class="hero-carousel__control" data-control data-direction="next">
                                <svg width="48" height="67" viewBox="0 0 48 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M33 33.5L0 67L21.5 33.5L0 0L33 33.5Z" fill="white" />
                                    <path d="M48 33.5L23 58L38.5 33.5L23 9L48 33.5Z" fill="white" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="frontpage__advantages advantages">
        <?php get_template_part('template-parts/content', 'advantages'); ?>
    </section>

    <section class="frontpage__products products" id="production">
        <?php get_template_part('template-parts/content', 'products'); ?>
    </section>

    <section class="frontpage__variations variations">
        <?php get_template_part('template-parts/content', 'variations'); ?>
    </section>

    <section class="frontpage__montage montage">
        <?php get_template_part('template-parts/content', 'montage'); ?>
    </section>

    <section class="frontpage__portfolio portfolio">
        <?php get_template_part('template-parts/content', 'portfolio'); ?>
    </section>

    <section class="frontpage__testimonials testimonials">
        <?php get_template_part('template-parts/content', 'testimonials'); ?>
    </section>

    <section class="frontpage__about-us about-us">
        <?php get_template_part('template-parts/content', 'about'); ?>
    </section>

    <section class="frontpage__news news">
        <?php get_template_part('template-parts/content', 'news'); ?>
    </section>

    <section class="frontpage__contacts contacts">
        <?php get_template_part('template-parts/content', 'contacts'); ?>
    </section>

</main>


<?php get_footer();
