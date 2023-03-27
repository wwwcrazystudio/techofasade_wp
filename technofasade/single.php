<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Technofasade
 */

get_header();
?>

<main class="article-page">
	<div class="container">
		<?php the_breadcrumbs('article-page'); ?>
		</nav>
		<div class="article-page__wrap">
			<aside class="article-page__sidebar">
				<div class="article-page__sidebar-wrap">
					<time datetime="<?= get_the_date('Y-m-d'); ?>" class="article-page__date">
						<?= get_the_date('d F Y'); ?>
						<span><?= get_the_date('G:i'); ?></span>
					</time>

					<div class="share article-page__share">
						<div class="share__title">
							Поделиться:
						</div>
						<ul class="share__list">
							<li class="share__item">
								<a href="http://vk.com/share.php?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&image=<?php the_post_thumbnail_url() ;?>&noparse=true" target="_blank" rel="nofollow" class="share__link">
									<svg width="27" height="16" viewBox="0 0 27 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g opacity="0.6">
											<path d="M26.7574 14.2731C26.6848 14.1469 26.2359 13.1334 24.0759 11.0503C21.8147 8.86906 22.1184 9.22325 24.8421 5.45164C26.5009 3.15465 27.1641 1.75191 26.9565 1.15224C26.614 0.160633 25.0131 0.734598 23.9641 0.740946L22.0251 0.752679C21.6637 0.754866 21.265 0.662595 20.9574 0.852402C20.628 1.05937 20.5343 1.48817 20.3902 1.84952C20.1336 2.49278 19.6628 3.60104 19.0995 4.59421C17.2922 7.78369 16.5683 7.95202 16.2729 7.75388C15.5861 7.29273 15.7583 5.89876 15.7583 4.90983C15.7583 1.81854 16.2088 0.529772 14.8791 0.196621C14.4369 0.0861552 14.1129 0.0125114 12.984 0.000237418C11.5361 -0.0155434 10.3093 0.00549769 9.61575 0.357936C9.15338 0.592895 8.79732 1.11717 9.015 1.14698C9.28332 1.1838 9.89082 1.31706 10.2131 1.77295C10.975 2.84666 10.6939 4.34196 10.6304 5.65698C10.5851 6.59299 10.4417 7.55468 10.0562 7.77317C9.50775 8.08353 8.75682 7.45054 7.14525 4.55564C6.52951 3.45005 6.02558 2.2566 5.80943 1.722C5.73208 1.53068 5.66547 1.33262 5.54625 1.16417C5.49625 1.09354 5.43436 1.02176 5.36157 0.966375C5.00058 0.691147 4.50887 0.706567 4.05494 0.709456L1.33589 0.726759C1.03168 0.728694 0.721184 0.715142 0.430794 0.805803C0.29831 0.847166 0.167624 0.910776 0.0881268 1.00846C-0.222626 1.39189 0.165738 1.94913 0.364143 2.40105C1.19951 4.30379 3.72346 9.74566 6.51244 12.7652C8.89189 15.3386 11.515 15.832 12.6432 15.9203C13.0213 15.9498 13.3999 15.9354 13.7791 15.9354H13.9997C14.5484 15.9354 15.1944 16.0104 15.5591 15.6005C15.7238 15.4168 15.766 15.1175 15.7767 14.9631C15.7812 14.8971 15.7796 14.8311 15.7808 14.765C15.7886 14.327 15.875 12.5726 16.7539 12.283C17.7444 11.9568 19.0168 14.4572 20.3651 15.4199C20.9971 15.871 21.535 15.9811 21.8526 15.9997C22.0567 16.0116 22.2619 15.9865 22.4664 15.9835L23.2844 15.9715C24.6486 15.9517 27.4421 15.4531 26.7574 14.2731Z" fill="#CB9274" />
										</g>
									</svg>
								</a>
							</li>
							<li class="share__item">
								<a href="https://t.me/share/url?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" rel="nofollow" class="share__link">
									<svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g opacity="0.6">
											<path d="M0.353259 8.63193L4.96166 10.4044L6.74539 16.3161C6.85952 16.6947 7.30879 16.8346 7.60699 16.5834L10.1758 14.4253C10.4451 14.1992 10.8286 14.1879 11.11 14.3985L15.7432 17.865C16.0622 18.1039 16.5141 17.9238 16.5941 17.5265L19.9882 0.701963C20.0755 0.26804 19.6618 -0.0939527 19.2609 0.0658489L0.347859 7.5847C-0.118874 7.77019 -0.114808 8.45117 0.353259 8.63193ZM6.45792 9.46089L15.4645 3.74438C15.6263 3.64194 15.7929 3.86749 15.6539 4.00036L8.22086 11.1207C7.95959 11.3713 7.79106 11.7067 7.74332 12.0708L7.49012 14.0044C7.45659 14.2626 7.10466 14.2883 7.03552 14.0384L6.06172 10.5122C5.95019 10.1101 6.11272 9.68046 6.45792 9.46089Z" fill="#CB9274" />
										</g>
									</svg>
								</a>
							</li>
						</ul>
					</div>
					<a href="<?= site_url(); ?>/#production" class="article-page__products-banner">
						<picture>
							<source srcset="<?= THEME_PATH; ?>/assets/img/banner.avif" type="image/avif">
							<img src="<?= THEME_PATH; ?>/assets/img/banner.webp" alt="Наша продукция">
						</picture>
					</a>
				</div>
			</aside>
			<div class="article-page__content">
				<article class="article-page__article">

					<h1 class="article-page__heading">
						<?php the_title(); ?>
					</h1>

					<?php if (!empty(get_the_post_thumbnail_url())) : ?>
						<img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" />
					<?php endif; ?>

					<?php the_content(); ?>

				</article>

				<nav class="article-page__articles-nav articles-nav">
					<ul class="articles-nav__list">
						<?php $prev_post = get_previous_post();
						if ($prev_post) : ?>
							<li class="articles-nav__item articles-nav__item--prev">
								<a href="<?= get_permalink($prev_post->ID); ?>" class="articles-nav__item-link" data-animate-link>
									Предыдущая
								</a>

								<div class="articles-nav__news-item news-item">
									<?php get_template_part('template-parts/content', 'news-item', array('id' => $prev_post->ID)); ?>
								</div>
							</li>
						<?php endif; ?>

						<?php $next_post = get_next_post();
						if ($next_post) : ?>
							<li class="articles-nav__item articles-nav__item--next">
								<a href="<?= get_permalink($next_post->ID); ?>" class="articles-nav__item-link" data-animate-link>
									Следующая
								</a>

								<div class="articles-nav__news-item news-item">
									<?php get_template_part('template-parts/content', 'news-item', array('id' => $next_post->ID)); ?>
								</div>
							</li>
						<?php endif; ?>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</main>

<?php
get_footer();
