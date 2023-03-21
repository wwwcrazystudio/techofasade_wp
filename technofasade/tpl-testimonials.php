<?php

/* Template name: Отзывы */

get_header();

$args = array(
    'posts_per_page' => 10,
    'paged' => get_query_var('page'),
    'post_type' => 'testimonial',
);

$query = new WP_Query($args); ?>

<main class="testimonials-page">
    <div class="testimonials-page__wrap">
        <div class="container">
            <?php the_breadcrumbs('testimonials-page'); ?>
            <h1 class="testimonials-page__heading">
                <?= is_post_type_archive() ? post_type_archive_title() : get_the_title(get_queried_object_id()); ?>
            </h1>
            <div class="testimonials-page__content" data-content>
                <?php if ($query->have_posts()) : ?>

                    <div class="testimonials-page__list-wrap" data-container>
                        <ul class="testimonials-page__list">
                            <?php $i = 1;
                            while ($query->have_posts()) :
                                $query->the_post();
                                if ($i < 6) : ?>
                                    <li class="testimonials-page__testimonial-item testimonial-item" id="testimonial_<?php the_ID(); ?>">
                                        <?php get_template_part('template-parts/content', 'testimonial-item'); ?>
                                    </li>
                            <?php endif;
                                $i++;
                            endwhile;
                            wp_reset_postdata(); ?>
                        </ul>
                        <ul class="testimonials-page__list">
                            <?php $i = 1;
                            while ($query->have_posts()) :
                                $query->the_post();
                                if ($i > 6) : ?>
                                    <li class="testimonials-page__testimonial-item testimonial-item" id="testimonial_<?php the_ID(); ?>">
                                        <?php get_template_part('template-parts/content', 'testimonial-item'); ?>
                                    </li>
                            <?php endif;
                                $i++;
                            endwhile;
                            wp_reset_postdata(); ?>
                        </ul>
                    </div>

                    <?php if ($query->max_num_pages > 1) : ?>
                        <button class="testimonials-page__load-more" data-load-more data-action="testimonial_load_more" data-page="<?=get_query_var('page');?>">
                            Показать еще
                        </button>
                        <?php the_pagination('testimonials-page', $query); ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>


<?php
get_footer();
