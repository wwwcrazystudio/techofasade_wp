<?php

/* Template name: Контакты */

get_header();
$tel = carbon_get_theme_option('tel');
$email = carbon_get_theme_option('email');
$address = carbon_get_theme_option('address');
$hours = carbon_get_theme_option('workhours');
$tg = carbon_get_theme_option('tg');
$wa = carbon_get_theme_option('wa');
$map = carbon_get_theme_option('map');
?>

<main class="contacts-page">
    <div class="contacts-page__wrap">
        <div class="container">
            <?php the_breadcrumbs('contacts-page'); ?>
            <h1 class="contacts-page__heading"><?php the_title(); ?></h1>

            <div class="contacts-page__content">
                <div class="contacts-page__contacts-list contacts-list">
                    <ul class="contacts-list__list">
                        <?php if (!empty($tel)) : ?>
                            <li class="contacts-list__item">
                                <div class="contacts-list__item-title">Телефон</div>
                                <div class="contacts-list__item-value">
                                    <a href="tel:<?= str_replace(array('(', ')', ' ', '<span>', '</span>'), '', $tel); ?>" class="contacts-list__item-tel">
                                        <?= $tel; ?>
                                    </a>
                                </div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($email)) : ?>
                            <li class="contacts-list__item">
                                <div class="contacts-list__item-title">Email</div>
                                <div class="contacts-list__item-value">
                                    <a href="mailto:<?= $email; ?>" class="contacts-list__item-email">
                                        <?= $email; ?>
                                    </a>
                                </div>
                            </li>
                        <?php endif; ?>

                        <li class="contacts-list__item">
                            <div class="contacts-list__item-title">
                                Мы в мессенджерах
                            </div>
                            <div class="contacts-list__item-value">
                                <div class="socials contacts-list__socials">
                                    <ul class="socials__list">
                                        <li class="socials__item">
                                            <a href="<?= $wa; ?>" target="_blank" rel="nofollow" class="socials__link">
                                                <svg width="34" height="35" viewBox="0 0 34 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.55738 31.2278L8.19906 31.5843C10.837 33.224 13.9028 34.2222 17.1111 34.2222C26.4509 34.2222 34.2222 26.4509 34.2222 16.9685C34.2222 7.48606 26.4509 0 17.0398 0C7.62869 0 0 7.55738 0 16.9685C0 20.2481 0.926863 23.4564 2.63796 26.1657L3.06577 26.8074L1.42599 32.7963L7.55738 31.2278Z" fill="#CB9274" />
                                                    <path d="M11.5454 7.35886L10.1884 7.28711C9.75987 7.28711 9.33138 7.43061 9.04569 7.71752C8.40287 8.29135 7.33155 9.36725 7.04586 10.8019C6.54593 12.9538 7.33155 15.536 9.18857 18.1182C11.0456 20.7004 14.6167 24.8607 20.9019 26.654C22.9017 27.2278 24.473 26.8691 25.7587 26.0801C26.7586 25.4346 27.4014 24.4304 27.6157 23.3544L27.83 22.3502C27.9014 22.0633 27.7585 21.7046 27.4728 21.5612L22.9732 19.481C22.6875 19.3375 22.3303 19.4093 22.1161 19.6962L20.3305 21.9915C20.1876 22.135 19.9734 22.2067 19.7591 22.135C18.5449 21.7046 14.4739 19.9831 12.2597 15.6794C12.1883 15.4643 12.1883 15.249 12.3312 15.1056L14.0453 13.169C14.1882 12.9538 14.2595 12.6669 14.1882 12.4516L12.1169 7.78927C12.0454 7.57402 11.8311 7.35886 11.5454 7.35886Z" fill="white" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="socials__item">
                                            <a href="<?= $tg; ?>" target="_blank" rel="nofollow" class="socials__link">
                                                <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.3098 35.0717C26.7489 35.0717 34.4008 27.4198 34.4008 17.9807C34.4008 8.54157 26.7489 0.889648 17.3098 0.889648C7.87067 0.889648 0.21875 8.54157 0.21875 17.9807C0.21875 27.4198 7.87067 35.0717 17.3098 35.0717Z" fill="#CB9274" />
                                                    <path d="M5.55496 16.4573L25.0526 8.93966C25.9575 8.61274 26.7478 9.16042 26.4546 10.5288L26.4563 10.5271L23.1365 26.1673C22.8905 27.2762 22.2316 27.5458 21.3098 27.0234L16.2542 23.2974L13.8157 25.6466C13.5461 25.9162 13.3186 26.1437 12.7962 26.1437L13.1551 20.9988L22.5248 12.5342C22.9326 12.1752 22.4338 11.973 21.8962 12.3303L10.3173 19.6204L5.32577 18.0633C4.2422 17.7195 4.2186 16.9797 5.55496 16.4573Z" fill="white" />
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>


                        <?php if (!empty($hours)) : ?>
                            <li class="contacts-list__item">
                                <div class="contacts-list__item-title">
                                    Режим работы
                                </div>
                                <div class="contacts-list__item-value">
                                    <?= $hours; ?>
                                </div>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($address)) : ?>
                            <li class="contacts-list__item">
                                <div class="contacts-list__item-title">Адрес</div>
                                <div class="contacts-list__item-value">
                                    <?= $address; ?>
                                </div>
                            </li>
                        <?php endif; ?>

                    </ul>
                </div>

                <?php if (!empty($map)) : ?>
                    <div class="contacts-page__map">
                        <?= $map; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <section class="contacts-page__contacts contacts">
        <?php get_template_part('template-parts/content', 'contacts', array('hide_head' => true)); ?>
    </section>
</main>

<?php
get_footer();
