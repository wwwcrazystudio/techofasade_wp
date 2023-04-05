<?php
$testimonial_job = carbon_get_the_post_meta('testimonial_job');
$testimonial_type = carbon_get_the_post_meta('testimonial_type');
$testimonial_video = carbon_get_the_post_meta('testimonial_video');
$testimonial_text = carbon_get_the_post_meta('testimonial_text');
$testimonial_img = carbon_get_the_post_meta('testimonial_img');
$is_full = $args ? $args['full'] : false;
?>

<div class="testimonial-item__wrap">
    <picture class="testimonial-item__user-img">
        <source srcset="<?php the_post_thumbnail_url('medium'); ?>.webp" type="image/webp">
        <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
    </picture>

    <div class="testimonial-item__title">
        <?php the_title(); ?>
    </div>

    <?php if (!empty($testimonial_job)) : ?>
        <div class="testimonial-item__job">
            <?= $testimonial_job; ?>
        </div>
    <?php endif; ?>

    <div class="testimonial-item__body">

        <?php switch ($testimonial_type):
            case 'text': ?>
                <div class="testimonial-item__text">
                    <?php if (!$is_full) : ?>
                        <?= mb_substr($testimonial_text, 0, 200); ?>...
                    <?php else : ?>
                        <?=$testimonial_text;?>
                    <?php endif; ?>
                </div>
            <?php break;
            case 'video': ?>
                <div class="testimonial-item__body">
                    <div class="testimonial-item__video">
                        <iframe width="100" height="100" src=" <?= $testimonial_video; ?>" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
            <?php break;
            case 'img': ?>
                <div class="testimonial-item__img">
                    <picture>
                        <source srcset="<?= wp_get_attachment_image_url($testimonial_img, 'full'); ?>.webp" type="image/webp">
                        <img src="<?= wp_get_attachment_image_url($testimonial_img, 'full'); ?>" alt="<?= get_post_meta($testimonial_img, '_wp_attachment_image_alt', true); ?>">
                    </picture>
                </div>
        <?php break;
        endswitch; ?>
    </div>

    <div class="testimonial-item__foot">
        <time datetime="<?= get_the_date('Y-m-d'); ?>" class="testimonial-item__date">
            <?= get_the_date(); ?>
        </time>

        <?php if (!$is_full) : ?>
            <button class="testimonial-item__link" data-testimonial="<?php the_ID(); ?>">
                Читать полностью
            </button>
        <?php endif; ?>
    </div>
</div>