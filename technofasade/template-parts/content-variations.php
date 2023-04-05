<?php
$variations_heading = carbon_get_the_post_meta('variations_heading');
$variations_text = carbon_get_the_post_meta('variations_desc');
$variations_slider = carbon_get_the_post_meta('variations_slider');
?>
<div class="variations__wrap">
    <div class="container">
        <div class="variations__heading" data-aos="fade-up">
            <div class="variations__backtext">
                Используемый крепеж
            </div>
            <div class="variations__heading-content">
                Крепеж
            </div>
        </div>

        <div class="variations__head">
            <h3 class="variations__subheading" data-aos="fade-right">
                <?= $variations_heading; ?>
            </h3>

            <div class="variations__desc" data-aos="fade-left">
                <?= $variations_text; ?>
            </div>
        </div>

        <div class="variations__carousel swiper" data-aos="fade-up">
            <ul class="variations__carousel-list swiper-wrapper">
                <?php foreach ($variations_slider as $item) : ?>
                    <li class="variations__carousel-item swiper-slide">
                        <picture>
                            <source srcset="<?= wp_get_attachment_image_url($item, 'full'); ?>.webp" type="image/webp">
                            <img loading="lazy" src="<?= wp_get_attachment_image_url($item, 'full'); ?>" alt="<?= get_post_meta($item, '_wp_attachment_image_alt', true); ?>">
                        </picture>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="variations__carousel-controls" data-animate-controls>
                <button class="variations__carousel-control" data-control data-direction="next">
                    <svg width="48" height="67" viewBox="0 0 48 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M33 33.5L0 67L21.5 33.5L0 0L33 33.5Z" fill="white" />
                        <path d="M48 33.5L23 58L38.5 33.5L23 9L48 33.5Z" fill="white" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>