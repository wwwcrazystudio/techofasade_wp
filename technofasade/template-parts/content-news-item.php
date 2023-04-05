<?php
$id = $args ? $args['id'] : get_queried_object_id(); ?>

<a href="<?= get_permalink($id); ?>" class="news-page__link">
    <picture class="news-item__img">
        <source srcset="<?= get_the_post_thumbnail_url($id, 'large'); ?>.webp" type="image/webp">
        <img loading="lazy" src="<?= get_the_post_thumbnail_url($id, 'large'); ?>" alt="<?= get_the_title($id); ?>">
    </picture>
</a>

<a href="<?= get_permalink($id); ?>" class="news-item__title"><?= get_the_title($id); ?></a>

<time datetime="<?= get_the_date('Y-m-d', $id); ?>" class="news-item__date"> <?= get_the_date('', $id); ?> </time>