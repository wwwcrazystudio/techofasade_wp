<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Technofasade
 */

get_header();
?>

<div class="page">
	<main class="page__main-content">
		<div class="container">
			<?php the_breadcrumbs('page'); ?>
			<h1 class="page__heading"><?php the_title(); ?></h1>

			<div class="page__wrap">
				<aside class="page__sidebar">
					<div class="page__sidebar-wrap">
						<nav class="page__nav-menu nav-menu">
							<ul class="nav-menu__list" data-navbar>
							</ul>
							<ul class="nav-menu__list">
								<li class="nav-menu__item">
									<a class="nav-menu__link" href="#contacts">
										Отправить заявку
									</a>
								</li>
							</ul>
						</nav>
					</div>
				</aside>
				<div class="page__content" data-content>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</main>

	<section class="page__contacts contacts" id="contacts">
		<?php get_template_part('template-parts/content', 'contacts'); ?>
	</section>
</div>

<?php
get_footer();
