<?php

/* Template name: Примеры работ */

get_header();

$args = array(
    'posts_per_page' => 1,
    'paged' => get_query_var('page'),
    'post_type' => 'portfolio',
);

$query = new WP_Query($args); ?>


<div class="portfolio-page">
    <main class="portfolio-page__wrap">
        <div class="container">
            <?php the_breadcrumbs('portfolio-page'); ?>
            <h1 class="portfolio-page__heading">
                <?= is_post_type_archive() ? post_type_archive_title() : get_the_title(get_queried_object_id()); ?>
            </h1>

            <?php if ($query->have_posts()) : ?>
                <div class="portfolio-page__gallery gallery">
                    <ul class="gallery__list">
                        <?php while ($query->have_posts()) :
                            $query->the_post(); ?>
                            <li class="gallery__item">
                                <a href="<?php the_post_thumbnail_url('full');?>" class="gallery__item-link" data-gallery="portfolio">
                                    <picture class="gallery__item-img">
                                        <source srcset="<?php the_post_thumbnail_url('large');?>.webp" type="image/webp">
                                        <img src="<?php the_post_thumbnail_url('large');?>" alt="<?php the_title();?>">
                                    </picture>
                                </a>
                            </li>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </ul>

                    <?php if ($query->max_num_pages > 1) : ?>
                        <button class="portfolio-page__load-more">
                            Показать еще
                        </button>
                        <?php the_pagination('portfolio-page', $query); ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>


        </div>
    </main>
</div>

<?php
get_footer();
