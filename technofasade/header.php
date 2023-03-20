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

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@600;700&display=swap" rel="stylesheet">
	<link rel="preload" href="<?=THEME_PATH;?>assets/fonts/AlistairSignature.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?=THEME_PATH;?>assets/fonts/Gilroy-Extrabold.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?=THEME_PATH;?>assets/fonts/Gilroy-Light.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?=THEME_PATH;?>assets/fonts/Gilroy-Regular.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?=THEME_PATH;?>assets/fonts/Gilroy-Bold.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?=THEME_PATH;?>assets/fonts/Gilroy-Medium.woff2" as="font" type="font/woff2" crossorigin>
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

			<a href="/#products" class="header__catalogue-link">
				<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 10.2414H3.7931V11H0V10.2414ZM0 11.7586H3.7931V12.5172H0V11.7586ZM0 8.72414H3.7931V9.48276H0V8.72414ZM0 17.8276H3.7931V18.9655H0V17.8276ZM0 16.3103H3.7931V17.069H0V16.3103ZM0 14.7931H3.7931V15.5517H0V14.7931ZM0 13.2759H3.7931V14.0345H0V13.2759ZM0 0.758621H3.7931V1.89655H0V0.758621ZM17.4483 0H4.55172V20.4828H17.4483V0ZM5.68966 1.13793H10.6207V4.17241H5.68966V1.13793ZM5.68966 4.93103H10.6207V7.96552H5.68966V4.93103ZM5.68966 8.72414H10.6207V11.7586H5.68966V8.72414ZM5.68966 12.5172H10.6207V15.5517H5.68966V12.5172ZM5.68966 19.3448V16.3103H10.6207V19.3448H5.68966ZM16.3103 19.3448H11.3793V16.3103H16.3103V19.3448ZM16.3103 15.5517H11.3793V12.5172H16.3103V15.5517ZM16.3103 11.7586H11.3793V8.72414H16.3103V11.7586ZM16.3103 7.96552H11.3793V4.93103H16.3103V7.96552ZM16.3103 4.17241H11.3793V1.13793H16.3103V4.17241ZM0 2.65517H3.7931V3.41379H0V2.65517ZM0 7.2069H3.7931V7.96552H0V7.2069ZM0 5.68966H3.7931V6.44828H0V5.68966ZM0 4.17241H3.7931V4.93103H0V4.17241ZM18.2069 10.2414H22V11H18.2069V10.2414ZM18.2069 8.72414H22V9.48276H18.2069V8.72414ZM18.2069 2.65517H22V3.41379H18.2069V2.65517ZM18.2069 5.68966H22V6.44828H18.2069V5.68966ZM18.2069 4.17241H22V4.93103H18.2069V4.17241ZM18.2069 0.758621H22V1.89655H18.2069V0.758621ZM3.03448 21.2414H18.9655V22H3.03448V21.2414ZM18.2069 7.2069H22V7.96552H18.2069V7.2069ZM18.2069 14.7931H22V15.5517H18.2069V14.7931ZM18.2069 16.3103H22V17.069H18.2069V16.3103ZM18.2069 17.8276H22V18.9655H18.2069V17.8276ZM18.2069 13.2759H22V14.0345H18.2069V13.2759ZM18.2069 11.7586H22V12.5172H18.2069V11.7586Z" fill="#A77B50" />
				</svg>

				Продукция
			</a>

			<a href="<?= site_url();?>" class="header__logo">
				<picture class="">
					<source srcset="data:image/avif;base64,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" type="image/avif">
					<img src="data:image/webp;base64,UklGRtgIAABXRUJQVlA4WAoAAAAQAAAArAAATgAAQUxQSLoCAAABoJVtWx5JeiXgoHAwcQAOuhwkDjIOGAdpB0iIBCREAhKQ8BzwM/ROM2c7V0RMAN+pFvgvDtYPGsn67tay5xVO29q895KM995W3vut8t7bjj/D6b+1yKCTIt1UmU+aVyMBkjywS7JAlmSB0PCZOttFfdK9puGHNrrFLsky6KelodwjfV+bcw54nHOm5epNUgBuYy8gTMMPbEB2rwPAfFs1kNSs1I+Akwxwz7sGDuCSFAG3ogS8JO37/jGvmF4AdkkB2FfWnZIhaHG53mblnPPQDcUsrulmdXs74PPfU4L0rC3UdlaMMQ2dB3CvTf0pkvxQMIX6r+DuXDGe0xQmfawoAh+SBdI8M3AAl6QbcAsJTUknkN/vB7jm6e5ZgF/vTwAtpC3JMGi/wPeU6Mcl6Wcv6AuUejZ3sl2TjlyVU1/ie7KxKtHoe/vSzbmX/sPGuc2oXtSf+/8axne3xua9Nz1zhCv4Ae+972y+Nj3ft9/dQTdWBsB3fhbqbFtvoJhWpvnsLfr7WnwVWgfdbBoXgP8N+LW0UKVW7hEaqTp/C7+e0znnbJWq0vBA/qGfQKoMdRoo7uMG7k5ytVmBUx8o4KsDCJIeKJWHDGUgS6ZA7kSNr8FDueEc8/u+VwHuAtuQErCwE9IF91g/Qchwrq/knPNLUoL7hDKnwH5DnFZyzjktoVkVCG/gNcMD7oIyrZmXsgEfBjhnnIA5gNfyYgghGOkErDLEGTc8ssA+6wkhhHMJTu0bCCFDnlEghwDEWVHjS8j0XyNHjNFoo5//FjYG99Yl6QGkc4DXgAWeZR0jUbJA2d+fwCPdI3urhCsDsfOE+r2QCBhJGbKkRH+XMjySLHC1urbTjgvJkCUpAkbaSueRNiBKUoE8tmtVFrirE9gl2acqwUgHcFYJML0cNy3mi61zm9EfuaY/+J+IAFZQOCD4BQAAMB8AnQEqrQBPAD4xFohDIiEhFGzNNCADBLEAQi58bzgbM/S/0A/13889jv6Ad2HH36V+i94n+Y/7T+c+gD1Afmb2AP4B/AP0g6wHmA6AH+c9QD+YdQB6AHlVftX/9vkU/b79Sf//8gX6f///2AP//6gH//mWs3P2g9gMovhppLJmHij93fcE8nH//+3f91TA0XDa2nCh/xnzFqut3wavbCd4Cv9plS6s0B77O578BI5r2Yk+O/uqK0zL/R9vNna8n2JTYpc/QW02sIl4l2FRev6TG0VkMADPgBlvVcDt6gDyUO4+dhZfcjOz4B9q+Mjnm7xtktopENOm0nbme8ONsljAAP7+8QS6Qi0vksiGaAHjRQnaQoqyft6RjACP/4ezdZ5RNYgbLUMukZ9277jaWqV8gaexbaxlw9NMWzOYBMt0bn6enz9pFClOrYt4kMQkVfFhfmcJCiz8ZH0D1OwsPiZI2yPyTVfVgJ1B2yEo7ZtMwhknJiobKM3gx6l1efr2rj7g0TlDMio3a7wiq3gSnQy23H4rjLOU5VNy/ZIO3mAlf9BUC7/m/8e+TvDX+Jb+QrXa5aKKMPz/i/rBHGxeb5/1YEFwW52Pbx0rA6v0vHX3Ruv9qVYy+MPf6TStY/e0idkyzqqb6AJ4mbU0q7KAdl3RWr0YfWI/Ncp28ESC/n0UCflQjCZzfvkJJFSVln5VnqHsubcWurXJSwKjecxK99w3M4p1y6BQJHV0QSbnsu78pTeHTzfPuqE3I1WC2JqIfOi6ZvxQ1luJCwSM8ucB7UxV3+jl1e071aFT+B80CaASDpy3vidOxjFQSSMo9Dhlo1DmQrvs7YZWg5OaaAgviuIII/UIH7cKf770snuTLLztCIHdOoTeEa2KMzqIgCrX6OkRwBfGvYSA0jEM7O/gahRIdhCyucI4lcmPXfKJZHTZLNaBRKvblQzAktpQSa6KMX8mcnviWaKnNIq/Nz1TC4JDelfRWjAMB+QuM+HgamM2Zasi/+3+0K/s0b5uLEdDYF/8VcfrPQdT074LZOmTRUTfaet6WtLL7bh83Y9xThhXLLHCkuIC3RaY7PsdzZv0bSJ3eWLjMuGXeMpRD/XDD9kz5tpvs3PorTA2UTSVudWOLtz69HFCYoDtNxZasTTMJjc3rFmzwjnRHBwdR4auqjpC3aFIZU9CE2ChPzXQaxZOWvEaaxHW4y3xuW9Dcce2U9OegSMG2D/04VrZ41AMzEzwZlgA6kvHtr4Mx3ljHO/TSiPXU4nvw/xXqeF4H6Zghyz5/wK3rKAEVa410r1btDvEQDNauhzIy4rzgKb0AE2d+fgAN+D8PjR6gG6nYY38kDbdUH+xbUVsrI16O6Gu5Zr9OpRUUCayTz7lFnudtrT5xThi5VfdthqMdgI7FN1d/XBf0pBmjn1W8qL/OkDpa0pJe68UCNDiq9Yv9kSYqgE8LaoQAWrFasI2UwHwLTn7pDBGs/6xu5DzPCLnIcGJNXF6BHFBD3HY4BM+7MwMU2vE38zsGH2p1C0BWfObf8NOs5dDue6Pxhyy7JffpKnIwJSmhU102wKInNzBY+YasXdPFTcSEd/+KdAl9rDw8ZCx8HPyY9G0NeFiTdRE/pA3BiR5mNcKCcliAQpFvRpJIRo9Hr5y1Cf6vEDJyPLPjoLPhEn+A3soWIxqZ1A0az4/Ih14lZRu3+Cx0PpoDixvYn8seavphBbUtj0wqepeGGUi35u0pA22sggvWCZe4eOvurFUu7TzpZMfEiAL9xZYufpFe0JlMRa21UcRVKf1UyhylbKXDEfJeCHbrgHOMZMOh1WSs189eMSgBzP5EgHrXVrOBiskFL3kBR1hPEcenzrrVpb32PcSi6tL8qHUKEubj3dnKI6Q9nfYp2gagAAyfrXhoaZcBeWvWE9A+ZP3+IZOR4Z/0vEOKTrzw6pvLqhDDwaAGHQNotT/Kidff3zPPF1549PSZEsG79CExtf+MO6xNx6oBklfwTz+gNVc/gm2IfjeThUTDdO2+otppdxKSkUzMj3gAAAAAA&#x3D;&#x3D;" alt="">
				</picture>
			</a>

			<div class="socials header__socials">
				<ul class="socials__list">
					<li class="socials__item">
						<a href="" target="_blank" rel="nofollow" class="socials__link">
							<svg width="27" height="16" viewBox="0 0 27 16" fill="none" xmlns="http://www.w3.org/2000/svg">
								<g opacity="0.6">
									<path d="M26.7574 14.2731C26.6848 14.1469 26.2359 13.1334 24.0759 11.0503C21.8147 8.86906 22.1184 9.22325 24.8421 5.45164C26.5009 3.15465 27.1641 1.75191 26.9565 1.15224C26.614 0.160633 25.0131 0.734598 23.9641 0.740946L22.0251 0.752679C21.6637 0.754866 21.265 0.662595 20.9574 0.852402C20.628 1.05937 20.5343 1.48817 20.3902 1.84952C20.1336 2.49278 19.6628 3.60104 19.0995 4.59421C17.2922 7.78369 16.5683 7.95202 16.2729 7.75388C15.5861 7.29273 15.7583 5.89876 15.7583 4.90983C15.7583 1.81854 16.2088 0.529772 14.8791 0.196621C14.4369 0.0861552 14.1129 0.0125114 12.984 0.000237418C11.5361 -0.0155434 10.3093 0.00549769 9.61575 0.357936C9.15338 0.592895 8.79732 1.11717 9.015 1.14698C9.28332 1.1838 9.89082 1.31706 10.2131 1.77295C10.975 2.84666 10.6939 4.34196 10.6304 5.65698C10.5851 6.59299 10.4417 7.55468 10.0562 7.77317C9.50775 8.08353 8.75682 7.45054 7.14525 4.55564C6.52951 3.45005 6.02558 2.2566 5.80943 1.722C5.73208 1.53068 5.66547 1.33262 5.54625 1.16417C5.49625 1.09354 5.43436 1.02176 5.36157 0.966375C5.00058 0.691147 4.50887 0.706567 4.05494 0.709456L1.33589 0.726759C1.03168 0.728694 0.721184 0.715142 0.430794 0.805803C0.29831 0.847166 0.167624 0.910776 0.0881268 1.00846C-0.222626 1.39189 0.165738 1.94913 0.364143 2.40105C1.19951 4.30379 3.72346 9.74566 6.51244 12.7652C8.89189 15.3386 11.515 15.832 12.6432 15.9203C13.0213 15.9498 13.3999 15.9354 13.7791 15.9354H13.9997C14.5484 15.9354 15.1944 16.0104 15.5591 15.6005C15.7238 15.4168 15.766 15.1175 15.7767 14.9631C15.7812 14.8971 15.7796 14.8311 15.7808 14.765C15.7886 14.327 15.875 12.5726 16.7539 12.283C17.7444 11.9568 19.0168 14.4572 20.3651 15.4199C20.9971 15.871 21.535 15.9811 21.8526 15.9997C22.0567 16.0116 22.2619 15.9865 22.4664 15.9835L23.2844 15.9715C24.6486 15.9517 27.4421 15.4531 26.7574 14.2731Z" fill="#CB9274" />
								</g>
							</svg>
						</a>
					</li>
					<li class="socials__item">
						<a href="" target="_blank" rel="nofollow" class="socials__link">
							<svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
								<g opacity="0.6">
									<path d="M0.353259 8.63193L4.96166 10.4044L6.74539 16.3161C6.85952 16.6947 7.30879 16.8346 7.60699 16.5834L10.1758 14.4253C10.4451 14.1992 10.8286 14.1879 11.11 14.3985L15.7432 17.865C16.0622 18.1039 16.5141 17.9238 16.5941 17.5265L19.9882 0.701963C20.0755 0.26804 19.6618 -0.0939527 19.2609 0.0658489L0.347859 7.5847C-0.118874 7.77019 -0.114808 8.45117 0.353259 8.63193ZM6.45792 9.46089L15.4645 3.74438C15.6263 3.64194 15.7929 3.86749 15.6539 4.00036L8.22086 11.1207C7.95959 11.3713 7.79106 11.7067 7.74332 12.0708L7.49012 14.0044C7.45659 14.2626 7.10466 14.2883 7.03552 14.0384L6.06172 10.5122C5.95019 10.1101 6.11272 9.68046 6.45792 9.46089Z" fill="#CB9274" />
								</g>
							</svg>

						</a>
					</li>
					<li class="socials__item">
						<a href="" target="_blank" rel="nofollow" class="socials__link">
							<svg width="26" height="18" viewBox="0 0 26 18" fill="none" xmlns="http://www.w3.org/2000/svg">
								<g opacity="0.6">
									<path d="M24.8714 3.011C24.581 1.92379 23.7303 1.0668 22.6515 0.774039C20.6805 0.23053 12.7965 0.23053 12.7965 0.23053C12.7965 0.23053 4.91264 0.23053 2.94163 0.753321C1.88358 1.04589 1.01213 1.92398 0.721771 3.011C0.203125 4.99683 0.203125 9.11526 0.203125 9.11526C0.203125 9.11526 0.203125 13.2544 0.721771 15.2195C1.01232 16.3065 1.86283 17.1637 2.94182 17.4565C4.93339 18 12.7967 18 12.7967 18C12.7967 18 20.6805 18 22.6515 17.4772C23.7305 17.1846 24.581 16.3275 24.8716 15.2404C25.3902 13.2544 25.3902 9.13617 25.3902 9.13617C25.3902 9.13617 25.411 4.99683 24.8714 3.011Z" fill="#CB9274" />
									<path d="M10.5273 12.9919L17.0834 9.18716L13.8054 7.28477L10.5273 5.38239V12.9919Z" fill="white" />
								</g>
							</svg>
						</a>
					</li>
				</ul>
			</div>
			<a href="" class="header__tel">
				+7 (499) <span>999-99-99</span>
			</a>
		</div>

		<nav class="header__header-menu header-menu">
			<div class="header-menu__wrap">
				<div class="header-menu__col">
					<ul class="header-menu__list">
						<li class="header-menu__item">
							<a href="" class="header-menu__link"><span>01</span> Главная</a>
						</li>
						<li class="header-menu__item">
							<a href="" class="header-menu__link"><span>02</span> Продукция</a>
						</li>
						<li class="header-menu__item">
							<a href="" class="header-menu__link"><span>03</span> Монтаж</a>
						</li>
						<li class="header-menu__item">
							<a href="" class="header-menu__link"><span>04</span> Примеры работ</a>
						</li>
						<li class="header-menu__item">
							<a href="" class="header-menu__link"><span>05</span> Контакты</a>
						</li>
					</ul>
				</div>
				<div class="header-menu__col">
					<ul class="header-menu__list">
						<li class="header-menu__item">
							<a href="" class="header-menu__link"><span>06</span> Сотрудничество</a>
						</li>
						<li class="header-menu__item">
							<a href="" class="header-menu__link"><span>07</span> О компании</a>
							<ul class="header-menu__sub-list">
								<li class="header-menu__sub-item">
									<a href="" class="header-menu__sub-link">
										Отзывы
									</a>
								</li>
								<li class="header-menu__sub-item">
									<a href="" class="header-menu__sub-link">
										Сертификаты и документация
									</a>
								</li>
								<li class="header-menu__sub-item">
									<a href="" class="header-menu__sub-link">
										Статьи
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="header-menu__contacts">
					<a href="" class="header-menu__tel">
						+7 (999) 999 99 99
					</a>
					<a href="" class="header-menu__email">
						technofasade@mail.ru
					</a>
					<div class="socials header-menu__socials">
						<ul class="socials__list">
							<li class="socials__item">
								<a href="" target="_blank" rel="nofollow" class="socials__link">
									<svg width="27" height="16" viewBox="0 0 27 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g opacity="0.6">
											<path d="M26.7574 14.2731C26.6848 14.1469 26.2359 13.1334 24.0759 11.0503C21.8147 8.86906 22.1184 9.22325 24.8421 5.45164C26.5009 3.15465 27.1641 1.75191 26.9565 1.15224C26.614 0.160633 25.0131 0.734598 23.9641 0.740946L22.0251 0.752679C21.6637 0.754866 21.265 0.662595 20.9574 0.852402C20.628 1.05937 20.5343 1.48817 20.3902 1.84952C20.1336 2.49278 19.6628 3.60104 19.0995 4.59421C17.2922 7.78369 16.5683 7.95202 16.2729 7.75388C15.5861 7.29273 15.7583 5.89876 15.7583 4.90983C15.7583 1.81854 16.2088 0.529772 14.8791 0.196621C14.4369 0.0861552 14.1129 0.0125114 12.984 0.000237418C11.5361 -0.0155434 10.3093 0.00549769 9.61575 0.357936C9.15338 0.592895 8.79732 1.11717 9.015 1.14698C9.28332 1.1838 9.89082 1.31706 10.2131 1.77295C10.975 2.84666 10.6939 4.34196 10.6304 5.65698C10.5851 6.59299 10.4417 7.55468 10.0562 7.77317C9.50775 8.08353 8.75682 7.45054 7.14525 4.55564C6.52951 3.45005 6.02558 2.2566 5.80943 1.722C5.73208 1.53068 5.66547 1.33262 5.54625 1.16417C5.49625 1.09354 5.43436 1.02176 5.36157 0.966375C5.00058 0.691147 4.50887 0.706567 4.05494 0.709456L1.33589 0.726759C1.03168 0.728694 0.721184 0.715142 0.430794 0.805803C0.29831 0.847166 0.167624 0.910776 0.0881268 1.00846C-0.222626 1.39189 0.165738 1.94913 0.364143 2.40105C1.19951 4.30379 3.72346 9.74566 6.51244 12.7652C8.89189 15.3386 11.515 15.832 12.6432 15.9203C13.0213 15.9498 13.3999 15.9354 13.7791 15.9354H13.9997C14.5484 15.9354 15.1944 16.0104 15.5591 15.6005C15.7238 15.4168 15.766 15.1175 15.7767 14.9631C15.7812 14.8971 15.7796 14.8311 15.7808 14.765C15.7886 14.327 15.875 12.5726 16.7539 12.283C17.7444 11.9568 19.0168 14.4572 20.3651 15.4199C20.9971 15.871 21.535 15.9811 21.8526 15.9997C22.0567 16.0116 22.2619 15.9865 22.4664 15.9835L23.2844 15.9715C24.6486 15.9517 27.4421 15.4531 26.7574 14.2731Z" fill="#CB9274" />
										</g>
									</svg>
								</a>
							</li>
							<li class="socials__item">
								<a href="" target="_blank" rel="nofollow" class="socials__link">
									<svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g opacity="0.6">
											<path d="M0.353259 8.63193L4.96166 10.4044L6.74539 16.3161C6.85952 16.6947 7.30879 16.8346 7.60699 16.5834L10.1758 14.4253C10.4451 14.1992 10.8286 14.1879 11.11 14.3985L15.7432 17.865C16.0622 18.1039 16.5141 17.9238 16.5941 17.5265L19.9882 0.701963C20.0755 0.26804 19.6618 -0.0939527 19.2609 0.0658489L0.347859 7.5847C-0.118874 7.77019 -0.114808 8.45117 0.353259 8.63193ZM6.45792 9.46089L15.4645 3.74438C15.6263 3.64194 15.7929 3.86749 15.6539 4.00036L8.22086 11.1207C7.95959 11.3713 7.79106 11.7067 7.74332 12.0708L7.49012 14.0044C7.45659 14.2626 7.10466 14.2883 7.03552 14.0384L6.06172 10.5122C5.95019 10.1101 6.11272 9.68046 6.45792 9.46089Z" fill="#CB9274" />
										</g>
									</svg>

								</a>
							</li>
							<li class="socials__item">
								<a href="" target="_blank" rel="nofollow" class="socials__link">
									<svg width="26" height="18" viewBox="0 0 26 18" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g opacity="0.6">
											<path d="M24.8714 3.011C24.581 1.92379 23.7303 1.0668 22.6515 0.774039C20.6805 0.23053 12.7965 0.23053 12.7965 0.23053C12.7965 0.23053 4.91264 0.23053 2.94163 0.753321C1.88358 1.04589 1.01213 1.92398 0.721771 3.011C0.203125 4.99683 0.203125 9.11526 0.203125 9.11526C0.203125 9.11526 0.203125 13.2544 0.721771 15.2195C1.01232 16.3065 1.86283 17.1637 2.94182 17.4565C4.93339 18 12.7967 18 12.7967 18C12.7967 18 20.6805 18 22.6515 17.4772C23.7305 17.1846 24.581 16.3275 24.8716 15.2404C25.3902 13.2544 25.3902 9.13617 25.3902 9.13617C25.3902 9.13617 25.411 4.99683 24.8714 3.011Z" fill="#CB9274" />
											<path d="M10.5273 12.9919L17.0834 9.18716L13.8054 7.28477L10.5273 5.38239V12.9919Z" fill="white" />
										</g>
									</svg>
								</a>
							</li>
						</ul>
					</div>
					<div class="header-menu__address">
						г. Москва, Ново-Совхозная улица, 3
						<div>Пн. - Пт. 9:00-20:00</div>
					</div>
				</div>
			</div>
		</nav>
	</header>