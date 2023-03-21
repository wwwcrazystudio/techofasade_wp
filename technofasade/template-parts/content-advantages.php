<?php
$advantages = carbon_get_the_post_meta('advantages');
?>
<?php if (!empty($advantages)) : ?>
    <div class="container">
        <div class="advantages__wrap">
            <div class="advantages__heading" data-aos="fade-up">
                <div class="advantages__backtext">
                    <?= $args ? $args['backtext'] : 'Techno Fasade'; ?>
                </div>
                <?php if (!$args['no_heading']) : ?>
                    <h2 class="advantages__heading-content">
                        Мы производим ставни класса Lux, с вниманием к каждой детали
                    </h2>
                <?php endif; ?>
            </div>
            <div class="advantages__subheading" data-aos="fade-up">
                О продукте
            </div>
            <ul class="advantages__list">
                <?php foreach ($advantages as $key => $item) : ?>
                    <li class="advantages__advantage-item advantage-item" data-aos="fade-right" data-aos-delay="<?= 150 * $key; ?>">
                        <div class="advantage-item__wrap">
                            <picture class="advantage-item__img">
                                <source srcset="<?= wp_get_attachment_image_url($item['img'], 'large'); ?>.webp" type="image/webp">
                                <img src="<?= wp_get_attachment_image_url($item['img'], 'large'); ?>" alt="<?= get_post_meta($item['img'], '_wp_attachment_image_alt', true); ?>">
                            </picture>
                            <div class="advantage-item__title">
                                <?= $item['heading']; ?>
                            </div>
                            <div class="advantage-item__desc">
                                <?= $item['text']; ?>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>