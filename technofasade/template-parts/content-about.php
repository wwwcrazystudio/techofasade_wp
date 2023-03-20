<?php
$about_heading = carbon_get_the_post_meta('about_heading');
$about_text = carbon_get_the_post_meta('about_desc');
$about_advantages = carbon_get_the_post_meta('about_advantages');
?>

<div class="about-us__wrap">
    <div class="container">
        <div class="about-us__heading" data-aos="fade-up">
            <div class="about-us__backtext">
                Techno fasade
            </div>
            <div class="about-us__heading-content">
                О компании
            </div>
        </div>

        <div class="about-us__head">
            <div class="about-us__subheading" data-aos="fade-right">
                <?= $about_heading; ?>
            </div>
            <div class="about-us__desc" data-aos="fade-left">
                <?= $about_text; ?>
            </div>
        </div>

        <?php if (!empty($about_advantages)) : ?>
            <div class="about-us__our-advantages our-advantages">
                <ul class="our-advantages__list">
                    <?php foreach ($about_advantages as $key => $item) : ?>
                        <li class="our-advantages__item" data-aos="fade-right" data-aos-delay="<?= $key * 150; ?>">
                            <div class="our-advantages__item-title">
                                <?= $item['heading']; ?>
                            </div>
                            <div class="our-advantages__item-desc">
                                <?= $item['text']; ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div data-aos="fade-up"><a href="" class="about-us__link" data-animate-link> О компании </a></div>
    </div>
</div>