<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Technofasade
 */
$tel = carbon_get_theme_option('tel');
$email = carbon_get_theme_option('email');
$address = carbon_get_theme_option('address');
$hours = carbon_get_theme_option('workhours');
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@600;700&display=swap" rel="stylesheet">
	<link rel="preload" href="<?= THEME_PATH; ?>/assets/fonts/AlistairSignature.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?= THEME_PATH; ?>/assets/fonts/Gilroy-Extrabold.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?= THEME_PATH; ?>/assets/fonts/Gilroy-Light.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?= THEME_PATH; ?>/assets/fonts/Gilroy-Regular.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?= THEME_PATH; ?>/assets/fonts/Gilroy-Bold.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?= THEME_PATH; ?>/assets/fonts/Gilroy-Medium.woff2" as="font" type="font/woff2" crossorigin>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<header class="header">
		<div class="header__wrap">
			<button class="header__toggler">
				<span class="header__toggler-icon">
					<span></span><span></span><span></span>
				</span>
				<span class="header__toggler-text">Меню</span>
			</button>

			<a href="<?=site_url();?>/#production" class="header__catalogue-link">
				<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 10.2414H3.7931V11H0V10.2414ZM0 11.7586H3.7931V12.5172H0V11.7586ZM0 8.72414H3.7931V9.48276H0V8.72414ZM0 17.8276H3.7931V18.9655H0V17.8276ZM0 16.3103H3.7931V17.069H0V16.3103ZM0 14.7931H3.7931V15.5517H0V14.7931ZM0 13.2759H3.7931V14.0345H0V13.2759ZM0 0.758621H3.7931V1.89655H0V0.758621ZM17.4483 0H4.55172V20.4828H17.4483V0ZM5.68966 1.13793H10.6207V4.17241H5.68966V1.13793ZM5.68966 4.93103H10.6207V7.96552H5.68966V4.93103ZM5.68966 8.72414H10.6207V11.7586H5.68966V8.72414ZM5.68966 12.5172H10.6207V15.5517H5.68966V12.5172ZM5.68966 19.3448V16.3103H10.6207V19.3448H5.68966ZM16.3103 19.3448H11.3793V16.3103H16.3103V19.3448ZM16.3103 15.5517H11.3793V12.5172H16.3103V15.5517ZM16.3103 11.7586H11.3793V8.72414H16.3103V11.7586ZM16.3103 7.96552H11.3793V4.93103H16.3103V7.96552ZM16.3103 4.17241H11.3793V1.13793H16.3103V4.17241ZM0 2.65517H3.7931V3.41379H0V2.65517ZM0 7.2069H3.7931V7.96552H0V7.2069ZM0 5.68966H3.7931V6.44828H0V5.68966ZM0 4.17241H3.7931V4.93103H0V4.17241ZM18.2069 10.2414H22V11H18.2069V10.2414ZM18.2069 8.72414H22V9.48276H18.2069V8.72414ZM18.2069 2.65517H22V3.41379H18.2069V2.65517ZM18.2069 5.68966H22V6.44828H18.2069V5.68966ZM18.2069 4.17241H22V4.93103H18.2069V4.17241ZM18.2069 0.758621H22V1.89655H18.2069V0.758621ZM3.03448 21.2414H18.9655V22H3.03448V21.2414ZM18.2069 7.2069H22V7.96552H18.2069V7.2069ZM18.2069 14.7931H22V15.5517H18.2069V14.7931ZM18.2069 16.3103H22V17.069H18.2069V16.3103ZM18.2069 17.8276H22V18.9655H18.2069V17.8276ZM18.2069 13.2759H22V14.0345H18.2069V13.2759ZM18.2069 11.7586H22V12.5172H18.2069V11.7586Z" fill="#A77B50" />
				</svg>

				Продукция
			</a>

			<a href="<?= site_url(); ?>" class="header__logo">
				<picture>
					<source srcset="data:image/avif;base64,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" type="image/avif">
					<img src="data:image/webp;base64,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&#x3D;&#x3D;" alt="<?=get_option( 'blogname' );?>">
				</picture>
			</a>

			<div class="socials header__socials">
				<?php get_template_part('template-parts/content', 'socials'); ?>
			</div>
			<?php if (!empty($tel)) : ?>
				<a href="tel:<?= str_replace(array('(', ')', ' ', '<span>', '</span>', '-'), '', $tel); ?>" class="header__tel">
					<?= $tel; ?>
				</a>
			<?php endif; ?>
		</div>

		<nav class="header__header-menu header-menu">
			<div class="header-menu__wrap">
				<div class="header-menu__col">
					<?php bem_menu('main-menu-1', 'header-menu'); ?>
				</div>
				<div class="header-menu__col">
					<?php bem_menu('main-menu-2', 'header-menu'); ?>
				</div>
				<div class="header-menu__contacts">
					<?php if (!empty($tel)) : ?>
						<a href="tel:<?= str_replace(array('(', ')', ' ', '<span>', '</span>', '-'), '', $tel); ?>" class="header-menu__tel">
							<?= $tel; ?>
						</a>
					<?php endif; ?>
					<?php if (!empty($email)) : ?>
						<a href="mailto:<?= $email; ?>" class="header-menu__email">
							<?= $email; ?>
						</a>
					<?php endif; ?>
					<div class="socials header-menu__socials">
						<?php get_template_part('template-parts/content', 'socials'); ?>
					</div>
					<div class="header-menu__address">
						<?php if (!empty($address)) : ?>
							<?= $address; ?>
						<?php endif; ?>
						<?php if (!empty($hours)) : ?>
							<div><?= $hours; ?></div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</nav>
	</header>