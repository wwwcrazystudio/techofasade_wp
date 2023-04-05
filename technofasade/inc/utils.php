<?php

add_filter('use_block_editor_for_post', 'remove_frontpage_editor', 10, 2);

function remove_frontpage_editor($use_block_editor)
{
    if (get_option('page_on_front') == get_the_ID()) {
        remove_post_type_support('page', 'editor');
        remove_post_type_support('page', 'custom-fields');
        remove_post_type_support('page', 'comments');
        remove_post_type_support('page', 'author');
        return false;
    }

    return $use_block_editor;
}

function remove_redundant_menus()
{
    remove_menu_page('edit-comments.php');
}

add_action('admin_menu', 'remove_redundant_menus');

function the_breadcrumbs($prefix)
{
?>
    <nav class="<?= $prefix; ?>__breadcrumbs breadcrumbs" aria-label="breadcrumb">
        <ol class="breadcrumbs__list">
            <li class="breadcrumbs__item">
                <a class="breadcrumbs__link" href="<?= site_url(); ?>">
                    Главная
                </a>
            </li>

            <?php if (is_singular() && !is_singular('page') && !is_singular('production')) :
                $type = get_post_type(get_queried_object_id());
                $typeObj = get_post_type_object($type); ?>
                <li class="breadcrumbs__item">
                    <a class="breadcrumbs__link" href="<?= get_post_type_archive_link($type); ?>">
                        <?= strip_tags(str_replace('Записи', 'Статьи', $typeObj->labels->name)); ?>
                    </a>
                </li>
            <?php endif; ?>

            <li class="breadcrumbs__item breadcrumbs__item--active" aria-current="page">
                <?= strip_tags(is_post_type_archive() ?  post_type_archive_title() : get_the_title(get_queried_object_id())); ?>
            </li>
        </ol>
    </nav>
<?php
}


function the_pagination($prefix, $query)
{

    $big = 999999999;

    $args = array(
        'base'    => '%_%',
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total'   => $query->max_num_pages,
        'type'    => 'array',
        'prev_text' => 'Назад
            <svg transform="rotate(180deg)" width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 9L9.53674e-07 18L4.95 9L9.53674e-07 0L9 9Z" fill="#CB9274" />
                <path d="M15 9L6 18L10.95 9L6 0L15 9Z" fill="#CB9274" />
            </svg>',
        'next_text' => 'Дальше
            <svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 9L9.53674e-07 18L4.95 9L9.53674e-07 0L9 9Z" fill="#CB9274" />
                <path d="M15 9L6 18L10.95 9L6 0L15 9Z" fill="#CB9274" />
            </svg>',
    );

    $pages = paginate_links($args); ?>

    <nav class="<?= $prefix; ?>__pagination pagination">
        <ul class="pagination__list">
            <?php foreach ($pages as $item) :
                $link = str_replace(array('page-numbers current', 'page-numbers', 'next', 'prev'), array('pagination__link pagination__link--active', 'pagination__link', 'pagination__link--text', 'pagination__link--text'), $item);
            ?>
                <li class="pagination__item">
                    <?= $link; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>

<?php
}

add_action('template_redirect', 'redirect_unavailable_singular_posts');
function redirect_unavailable_singular_posts()
{
    if (is_singular('testimonial')) {
        wp_redirect(home_url(), 302);
        exit;
    }

    if (is_singular('portfolio')) {
        wp_redirect(home_url(), 302);
        exit;
    }

    if (is_singular('certificate')) {
        wp_redirect(home_url(), 302);
        exit;
    }

    if (is_singular('dealer')) {
        wp_redirect(home_url(), 302);
        exit;
    }
}