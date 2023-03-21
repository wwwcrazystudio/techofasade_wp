<?php

/* Template name: Сертификаты */

get_header();

$args = array(
    'posts_per_page' => 24,
    'paged' => get_query_var('page'),
    'post_type' => 'certificate',
);

$query = new WP_Query($args); ?>

<main class="certificates-page">
    <div class="certificates-page__wrap">
        <div class="container">
            <?php the_breadcrumbs('certificates-page'); ?>
            <h1 class="certificates-page__heading">
                <?= is_post_type_archive() ? post_type_archive_title() : get_the_title(get_queried_object_id()); ?>
            </h1>

            <?php if ($query->have_posts()) : ?>
                <div class="certificates-page__list-wrap">
                    <ul class="certificates-page__list" data-container>
                        <?php while ($query->have_posts()) :
                            $query->the_post(); ?>
                            <li class="certificates-page__certificate-item certificate-item">
                                <a href="<?php the_post_thumbnail_url('full'); ?>" class="certificate-item__link" data-gallery="certificates" data-caption="<?php the_title(); ?>">
                                    <figure class="certificate-item__img-wrap">
                                        <picture class="certificate__item-img">
                                            <source srcset="<?php the_post_thumbnail_url('large'); ?>.webp" type="image/webp">
                                            <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                                        </picture>
                                        <figcaption class="certificate-item__caption"><?php the_title(); ?></figcaption>
                                    </figure>
                                </a>
                            </li>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </ul>

                    <?php if ($query->max_num_pages > 1) : ?>
                        <button class="certificates-page__load-more"  data-load-more data-action="certificate_load_more" data-page="<?=get_query_var('page');?>">
                            Показать еще
                        </button>
                        <?php the_pagination('certificates-page', $query); ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php
get_footer();
