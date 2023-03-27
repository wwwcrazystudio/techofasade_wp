<?php

function generatePDF($content = '')
{

    require __DIR__ . '/../vendor/autoload.php';

    $html = '<html>';
    $html .= '<head>';
    $html .= '</head>';
    $html .= '<body>';

    $html .= $content;

    $html .= '</body></html>';

    $mpdf = new \Mpdf\Mpdf(array(
        'margin_left' => 20,
        'margin_right' => 15,
        'margin_top' => 48,
        'margin_bottom' => 25,
        'margin_header' => 10,
        'margin_footer' => 10
    ));

    $mpdf->SetTitle("Собери свое решение");
    $mpdf->SetAuthor("Technofasade");

    $mpdf->WriteHTML($html);
    $uploads = wp_upload_dir();
    $currentTime = time();
    $filePath = $uploads['path'] . '/brief' .  $currentTime  . '.pdf';
    $fileUrl = $uploads['url'] . '/brief' .  $currentTime  . '.pdf';
    $mpdf->Output($filePath, \Mpdf\Output\Destination::FILE);
    echo $fileUrl;
    wp_die();
}

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


    $to      = get_option('admin_email');
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

    if (isset($_POST['configurator'])) {
        $data = json_decode(stripslashes($_POST['configurator']));

        foreach ($data as $key => $value) {
            $message .= "<p>{$key}: {$value}</p>";
        }
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
    wp_die();
}

add_action('wp_ajax_dealer_load_more', 'dealer_load_more');
add_action('wp_ajax_nopriv_dealer_load_more', 'dealer_load_more');

function dealer_load_more()
{

    $args = array(
        'posts_per_page' => 9,
        'paged' => $_POST['page'],
        'post_type' => 'dealer',
    );

    $query = new WP_Query($args);
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            $address = carbon_get_the_post_meta('dealer_address');
            $address_url = carbon_get_the_post_meta('dealer_address_url');
            $tel = carbon_get_the_post_meta('dealer_tel');
        ?>
            <li class="dealers__item">
                <div class="dealers__item-img">
                    <img width="145" height="145" src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                </div>
                <div class="dealers__item-info">
                    <div class="dealers__item-title">
                        <?php the_title(); ?>
                    </div>
                    <a href="<?= $address_url; ?>" class="dealers__item-address">
                        <?= $address; ?>
                    </a>
                    <a href="tel:<?= str_replace(array('(', ')', ' ', '-'), '', $tel); ?>" class="dealers__item-tel">
                        <?= $tel; ?>
                    </a>
                </div>
            </li>
        <?php endwhile;
        wp_reset_postdata();
    endif;
    wp_die();
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
    wp_die();
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
    wp_die();
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
        <?php
        while ($query->have_posts()) :
            $query->the_post(); ?>
            <li class="testimonials-page__testimonial-item testimonial-item" id="testimonial_<?php the_ID(); ?>">
                <?php get_template_part('template-parts/content', 'testimonial-item', array('full' => true)); ?>
            </li>
<?php endwhile;
        wp_reset_postdata();
    endif;
    wp_die();
}


add_action('wp_ajax_get_pdf', 'get_pdf');
add_action('wp_ajax_nopriv_get_pdf', 'get_pdf');

function get_pdf()
{
    $data =  json_decode(stripslashes($_POST['data']));
    $preview = $_POST['preview'];

    $table = '<table style="width: 100%; color:#333; border-collapse: collapse; margin-left: auto; margin-right: auto; font-size: 14px;">';

    $table .= '<tr nobr="true">';
    $table .= "<th colspan='2' style='width: 100%; padding-top: 5px; padding-bottom: 5px; font-size:30px; padding-left: 10px; padding-right: 10px; border: solid 1px #000000; text-align: center;'>Собери свое решение</th>";
    $table .= '</tr>';

    if ($_POST['preview']) {
        $table .= '<tr nobr="true">';
        $table .= "<th colspan='2' style='width: 100%; padding-top: 20px; padding-bottom: 20px; padding-left: 10px; padding-right: 10px; border: solid 1px #000000; text-align: center;'><img src='{$preview}'></th>";
        $table .= '</tr>';
    }

    foreach ($data as $label => $value) {
        $table .= '<tr nobr="true">';
        $table .= "<th style='width: 50%; padding-top: 5px; padding-bottom: 5px; padding-left: 10px; padding-right: 10px; border: solid 1px #000000; text-align: left;'>{$label}</th> <td style='width: 50%; padding-top: 5px; padding-bottom: 5px; padding-left: 10px; padding-right: 10px; border: solid 1px #000000; text-align: left;'>{$value}</td>";
        $table .= '</tr>';
    }

    $table .= '</table>';

    generatePDF($table);
}
