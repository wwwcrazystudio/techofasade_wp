<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Technofasade
 */

get_header();
?>

<main class="error-page">

	<div class="error-page__wrap">

		<div class="container">

			<div class="error-page__content">

				<h1 class="error-page__dec">404</h1>

				<div class="error-page__heading">
					Произошла ошибка
				</div>

				<div class="error-page__subheading">
					К сожалению, страница недоступна
				</div>

				<a href="<?=site_url();?>" data-animate-link class="error-page__btn-link">Вернуться на главную</a>

			</div>

		</div>

	</div>

</main>

<?php
get_footer();
