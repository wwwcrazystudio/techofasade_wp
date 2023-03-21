<?php

function custom_wp_mail_content_type()
{
    return 'text/html';
}

add_action('wp_ajax_contact_form', 'contact_form_process');
add_action('wp_ajax_nopriv_contact_form', 'contact_form_process');

function contact_form_process()
{

    if (empty($_POST) || !wp_verify_nonce($_POST['contact_nonce'], 'contact_form')) {
        wp_send_json(array('success' => false, 'message' => 'Извините, проверочные данные не соответствуют'));
        wp_die();
    }

    if (preg_match('/(http|ftp|mailto|href)/', $_POST['name'])) {
        wp_send_json(array('success' => false, 'message' => 'Ошибка проверки на спам'));
        wp_die();
    }

    $name = $_POST['name'];
    $tel = $_POST['tel'];

    add_filter('wp_mail_content_type', 'custom_wp_mail_content_type');

    //$to      = get_option('admin_email');
    $to      = 'mikhail.shuvalov@crazy.studio';
    $subject = get_option('blogname') . ' - запрос обратной связи';
    $headers = 'From: ' . get_option('blogname') . ' <auto@' . $_SERVER['SERVER_NAME'] . '>';

    $message = '<html>';
    $message .= '<head>';
    $message .= '<title>' . $subject . '</title>';
    $message .= '</head>';
    $message .= '<body>';

    $message .= '<h3>' . $subject . '</h3>';

    if (isset($name)) {
        $message .= "<p>Имя: {$name}</p>";
    }

    if (isset($tel)) {
        $message .= "<p>Телефон: {$tel}</p>";
    }

    wp_mail($to, $subject, $message, $headers);

    remove_filter('wp_mail_content_type', 'custom_wp_mail_content_type');

    wp_send_json(array('success' => true));
    wp_die();
}


add_action('wp_ajax_certificate_load_more', 'certificate_load_more');
add_action('wp_ajax_nopriv_certificate_load_more', 'certificate_load_more');

function certificate_load_more()
{
    $args = array(
        'posts_per_page' => 24,
        'paged' => $_POST['page'],
        'post_type' => 'certificate',
    );

    $query = new WP_Query($args);

    while ($query->have_posts()) :
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
    wp_reset_postdata();
}

add_action('wp_ajax_post_load_more', 'post_load_more');
add_action('wp_ajax_nopriv_post_load_more', 'post_load_more');

function post_load_more()
{
    $args = array(
        'posts_per_page' => 18,
        'paged' => $_POST['page'],
        'post_type' => 'post',
    );

    $query = new WP_Query($args);

    while ($query->have_posts()) :
        $query->the_post(); ?>
        <li class="news__news-item news-item" data-aos="fade-right" data-aos-delay="<?= $query->current_post * 150; ?>">
            <?php get_template_part('template-parts/content', 'news-item'); ?>
        </li>
    <?php endwhile;
    wp_reset_postdata();
}

add_action('wp_ajax_portfolio_load_more', 'portfolio_load_more');
add_action('wp_ajax_nopriv_portfolio_load_more', 'portfolio_load_more');

function portfolio_load_more()
{
    $args = array(
        'posts_per_page' => 14,
        'paged' => $_POST['page'],
        'post_type' => 'portfolio',
    );

    $query = new WP_Query($args);

    while ($query->have_posts()) :
        $query->the_post(); ?>
        <li class="gallery__item">
            <a href="<?php the_post_thumbnail_url('full'); ?>" class="gallery__item-link" data-gallery="portfolio">
                <picture class="gallery__item-img">
                    <source srcset="<?php the_post_thumbnail_url('large'); ?>.webp" type="image/webp">
                    <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                </picture>
            </a>
        </li>
    <?php endwhile;
    wp_reset_postdata();
}

add_action('wp_ajax_testimonial_load_more', 'testimonial_load_more');
add_action('wp_ajax_nopriv_testimonial_load_more', 'testimonial_load_more');

function testimonial_load_more()
{
    $args = array(
        'posts_per_page' => 10,
        'paged' => $_POST['page'],
        'post_type' => 'testimonial',
    );

    $query = new WP_Query($args);
    if ($query->have_posts()) : ?>
        <ul class="testimonials-page__list">
            <?php $i = 1;
            while ($query->have_posts()) :
                $query->the_post();
                if ($i < 6) : ?>
                    <li class="testimonials-page__testimonial-item testimonial-item" id="#<?php the_ID(); ?>">
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
                    <li class="testimonials-page__testimonial-item testimonial-item" id="#<?php the_ID(); ?>">
                        <?php get_template_part('template-parts/content', 'testimonial-item'); ?>
                    </li>
            <?php endif;
                $i++;
            endwhile;
            wp_reset_postdata(); ?>
        </ul>
    <?php endif; ?>
<?php }
