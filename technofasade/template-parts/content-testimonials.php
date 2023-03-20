<?php
$args = array(
    'posts_per_page' => 10,
    'post_type' => 'testimonial',
    'meta_query'=>array(
        array(
            'key' => 'testimonial_type',
            'value' => 'text',
        ),
    ),
);

$query = new WP_Query($args);

if ($query->have_posts()) : ?>

    <div class="testimonials__wrap">
        <div class="container">
            <div class="testimonials__heading" data-aos="fade-up">
                <div class="testimonials__backtext">
                    Наши клиенты
                </div>
                <div class="testimonials__heading-content">
                    Отзывы
                </div>
            </div>

            <div class="testimonials__carousel swiper">
                <ul class="testimonials__carousel-list swiper-wrapper">
                    <?php while ($query->have_posts()) :
                        $query->the_post(); ?>
                        <li class="testimonials__testimonial-item testimonial-item swiper-slide" data-aos="fade-right" data-aos-delay="<?= $query->current_post * 150; ?>">
                            <?php get_template_part('template-parts/content', 'testimonial-item'); ?>
                        </li>
                    <?php endwhile; wp_reset_postdata(); ?>
                </ul>

                <button class="testimonials__carousel-control testimonials__carousel-control--prev">
                    <svg transform="rotate(180)" width="48" height="67" viewBox="0 0 48 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M33 33.5L0 67L21.5 33.5L0 0L33 33.5Z" fill="#CB9274" />
                        <path d="M48 33.5L23 58L38.5 33.5L23 9L48 33.5Z" fill="#CB9274" />
                    </svg>
                </button>

                <button class="testimonials__carousel-control testimonials__carousel-control--next">
                    <svg width="48" height="67" viewBox="0 0 48 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M33 33.5L0 67L21.5 33.5L0 0L33 33.5Z" fill="#CB9274" />
                        <path d="M48 33.5L23 58L38.5 33.5L23 9L48 33.5Z" fill="#CB9274" />
                    </svg>
                </button>
            </div>

            <div data-aos="fade-up">
                <a href="<?= get_post_type_archive_link('testimonial'); ?>" class="testimonials__link" data-animate-link> Все отзывы </a>
            </div>
        </div>
    </div>

<?php endif; ?>