<?php

/* Template name: Новости/Статьи */

get_header();

$args = array(
    'posts_per_page' => 1,
    'paged' => get_query_var('page'),
    'post_type' => 'post',
);

$query = new WP_Query($args); ?>

<div class="news-page">
    <main class="news-page__wrap">
        <div class="container">
            <?php the_breadcrumbs('news-page'); ?>
            <h1 class="news-page__heading">
                <?= is_post_type_archive() ? post_type_archive_title() : get_the_title(get_queried_object_id()); ?>
            </h1>

            <?php if ($query->have_posts()) : ?>
                <div class="news-page__content">
                    <ul class="news-page__list">
                        <?php while ($query->have_posts()) :
                            $query->the_post(); ?>
                            <li class="news__news-item news-item" data-aos="fade-right" data-aos-delay="<?= $query->current_post * 150; ?>">
                                <?php get_template_part('template-parts/content', 'news-item'); ?>
                            </li>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </ul>

                    <?php if ($query->max_num_pages > 1) : ?>
                        <button class="news-page__load-more">
                            Показать еще
                        </button>
                        <?php the_pagination('news-page', $query); ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>


        </div>
    </main>
</div>

<?php
get_footer();
