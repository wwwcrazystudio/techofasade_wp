<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Technofasade
 */

$tel = carbon_get_theme_option('tel');
$email = carbon_get_theme_option('email');
$address = carbon_get_theme_option('address');
$hours = carbon_get_theme_option('workhours');
$tg = carbon_get_theme_option('tg');
$wa = carbon_get_theme_option('wa');
?>

<dialog class="modal" id="contact-modal">
	<div class="modal__content">
		<button class="modal__close">
			<svg width="85" height="85" viewBox="0 0 85 85" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M63.6328 21.2031L21.2064 63.6295" stroke="white" stroke-width="4" stroke-linecap="round" />
				<path d="M21.2266 21.2031L63.653 63.6295" stroke="white" stroke-width="4" stroke-linecap="round" />
			</svg>
		</button>

		<div class="modal__body">
			<div class="modal__body-content">
				<div class="modal__modal-form modal-form">
					<div class="modal-form__wrap">
						<div class="modal-form__heading">
							Заполните форму
						</div>
						<div class="modal-form__text">
							Наш специалист свяжется с вами в ближайшее время, остветит на все интересующие вопросы и поможет
							подобрать оптимальное решение под ваши нужды
						</div>
						<form class="modal-form__content" data-form>
							<div class="modal-form__input input--icon input">
								<div class="input__wrap">
									<div class="input__icon input__icon--user">
										<svg width="21" height="25" viewBox="0 0 21 25" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M10.3637 12.0852C11.8449 12.0852 13.1274 11.5483 14.1755 10.4891C15.2233 9.43 15.7548 8.13417 15.7548 6.63713C15.7548 5.14061 15.2235 3.84461 14.1754 2.7852C13.1272 1.72632 11.8448 1.18945 10.3637 1.18945C8.88232 1.18945 7.60005 1.72632 6.55206 2.78538C5.50408 3.84444 4.97266 5.14044 4.97266 6.63713C4.97266 8.13417 5.50408 9.43017 6.55206 10.4892C7.60039 11.5481 8.88283 12.0852 10.3637 12.0852ZM7.47966 3.7226C8.28379 2.90997 9.2271 2.51496 10.3637 2.51496C11.5001 2.51496 12.4436 2.90997 13.2479 3.7226C14.0521 4.53541 14.4431 5.48885 14.4431 6.63713C14.4431 7.78576 14.0521 8.73903 13.2479 9.55183C12.4436 10.3646 11.5001 10.7596 10.3637 10.7596C9.22744 10.7596 8.28413 10.3645 7.47966 9.55183C6.67535 8.7392 6.2843 7.78576 6.2843 6.63713C6.2843 5.48885 6.67535 4.53541 7.47966 3.7226Z" fill="#DDDDDD" stroke="#DDDDDD" stroke-width="0.5" />
											<path d="M19.7966 18.5842C19.7663 18.1435 19.7052 17.6627 19.6152 17.155C19.5244 16.6435 19.4074 16.16 19.2674 15.718C19.1225 15.2612 18.926 14.8101 18.6827 14.3778C18.4304 13.9292 18.134 13.5385 17.8013 13.217C17.4535 12.8806 17.0276 12.6102 16.5351 12.413C16.0443 12.2168 15.5004 12.1174 14.9187 12.1174C14.6902 12.1174 14.4692 12.2121 14.0425 12.4929C13.7798 12.666 13.4726 12.8661 13.1297 13.0875C12.8365 13.2763 12.4393 13.4532 11.9487 13.6134C11.4701 13.7699 10.9841 13.8493 10.5042 13.8493C10.0247 13.8493 9.5387 13.7699 9.0597 13.6134C8.56961 13.4534 8.17224 13.2765 7.87955 13.0877C7.5399 12.8684 7.23252 12.6682 6.96595 12.4927C6.53955 12.2119 6.31858 12.1172 6.0901 12.1172C5.50813 12.1172 4.96442 12.2168 4.47381 12.4131C3.98166 12.61 3.55561 12.8805 3.20742 13.2171C2.87477 13.5388 2.57832 13.9293 2.32627 14.3778C2.08327 14.8101 1.88655 15.2611 1.74174 15.7182C1.60188 16.1601 1.48491 16.6435 1.39406 17.155C1.3039 17.662 1.24293 18.143 1.21271 18.5848C1.183 19.0167 1.16797 19.4662 1.16797 19.9204C1.16797 21.1012 1.53938 22.057 2.27179 22.762C2.99515 23.4576 3.95212 23.8103 5.11623 23.8103H15.8935C17.0573 23.8103 18.0143 23.4576 18.7378 22.762C19.4704 22.0575 19.8418 21.1013 19.8418 19.9203C19.8416 19.4645 19.8264 19.015 19.7966 18.5842ZM17.8334 21.8016C17.3555 22.2613 16.7209 22.4848 15.8934 22.4848H5.11623C4.28853 22.4848 3.65397 22.2613 3.17617 21.8018C2.70742 21.3509 2.47961 20.7353 2.47961 19.9204C2.47961 19.4966 2.49345 19.0781 2.52111 18.6764C2.54809 18.2822 2.60325 17.8493 2.68505 17.3892C2.76582 16.9348 2.86862 16.5084 2.99089 16.1224C3.1082 15.7522 3.26821 15.3857 3.46664 15.0326C3.65602 14.6961 3.87391 14.4074 4.11435 14.1747C4.33925 13.9571 4.62272 13.779 4.95673 13.6455C5.26565 13.5219 5.61281 13.4543 5.98969 13.4441C6.03563 13.4688 6.11742 13.5159 6.24994 13.6032C6.51957 13.7808 6.83037 13.9834 7.17395 14.2051C7.56124 14.4546 8.06022 14.68 8.65636 14.8745C9.26582 15.0737 9.8874 15.1748 10.5044 15.1748C11.1214 15.1748 11.7431 15.0737 12.3522 14.8747C12.9489 14.6798 13.4477 14.4546 13.8355 14.2048C14.1871 13.9777 14.4892 13.7809 14.7588 13.6032C14.8913 13.516 14.9731 13.4688 15.0191 13.4441C15.3961 13.4543 15.7433 13.5219 16.0524 13.6455C16.3862 13.779 16.6697 13.9573 16.8946 14.1747C17.135 14.4072 17.3529 14.6959 17.5423 15.0328C17.7409 15.3857 17.9011 15.7524 18.0182 16.1222C18.1406 16.5087 18.2436 16.935 18.3242 17.389C18.4058 17.85 18.4612 18.2831 18.4882 18.6766V18.6769C18.516 19.0771 18.53 19.4954 18.5302 19.9204C18.53 20.7355 18.3022 21.3509 17.8334 21.8016Z" fill="#DDDDDD" stroke="#DDDDDD" stroke-width="0.5" />
										</svg>
									</div>
									<label for="name" class="input__label input__label--hidden">
										Имя
									</label>
									<input class="input__control" id="name" placeholder="Имя" name="name" required>
								</div>
							</div>
							<div class="modal-form__input input--icon input">
								<div class="input__wrap">
									<div class="input__icon input__icon--tel">
										<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M20.3614 15.6269L17.5983 12.8638C16.6114 11.8769 14.9338 12.2717 14.5391 13.5545C14.243 14.4427 13.2562 14.9362 12.368 14.7388C10.3943 14.2453 7.72986 11.6796 7.23644 9.60719C6.94039 8.719 7.5325 7.73216 8.42065 7.43614C9.70354 7.04141 10.0983 5.36378 9.11144 4.37694L6.34829 1.61379C5.55882 0.923006 4.37461 0.923006 3.68382 1.61379L1.80883 3.48879C-0.0661654 5.46247 2.0062 10.6927 6.64434 15.3309C11.2825 19.969 16.5127 22.1401 18.4864 20.1664L20.3614 18.2914C21.0522 17.5019 21.0522 16.3177 20.3614 15.6269Z" stroke="#DDDDDD" stroke-width="2" />
										</svg>
									</div>
									<label for="tel" class="input__label input__label--hidden">
										Телефон
									</label>
									<input type="tel" class="input__control" id="tel" name="tel" required placeholder="+7 (***) ***-**-**">
								</div>
							</div> 
							<button class="modal-form__link">
								Оставить заявку
							</button>
							<div class="modal-form__policy">
								Нажимая на кнопку «Оставить заявку» вы даете
								свое согласие на обработку <a href="<?= get_privacy_policy_url(); ?>">персональных данных</a>
								сайта
							</div>
							<?php wp_nonce_field( 'contact_form', 'contact_nonce' ) ;?>
							<input type="hidden" data-configurator-input name="configurator" disabled>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</dialog>

<dialog class="modal" id="success-modal">
	<div class="modal__content">
		<button class="modal__close">
			<svg width="85" height="85" viewBox="0 0 85 85" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M63.6328 21.2031L21.2064 63.6295" stroke="white" stroke-width="4" stroke-linecap="round" />
				<path d="M21.2266 21.2031L63.653 63.6295" stroke="white" stroke-width="4" stroke-linecap="round" />
			</svg>
		</button>

		<div class="modal__body">
			<div class="modal__body-content">
				<div class="modal__modal-notice modal-notice">
					<div class="modal-notice__backtext">
						Заявка отправлена
					</div>
					<div class="modal-notice__heading">
						Спасибо!
					</div>
					<div class="modal-notice__text">
						Мы получили вашу заявку, в ближайшее время с Вами свяжется наш менеджер, ответит на все интересующие
						вопросы и поможет подобрать оптимальное решение под ваши задачи
					</div>
				</div>
			</div>
		</div>
	</div>
</dialog>


<div class="top-btn">
	<button class="top-btn__toggle">
		<svg width="38" height="29" viewBox="0 0 38 29" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M19 9.39551L38 28.1119L19 15.9179L8.18121e-07 28.1119L19 9.39551Z" fill="black" />
			<path d="M19.001 0.888061L32.8965 15.0672L19.001 6.27612L5.10547 15.0672L19.001 0.888061Z" fill="black" />
		</svg>
	</button>
</div>

<div class="messengers">
	<div class="messengers__wrap">
		<button class="messengers__toggle">
			<span class="messengers__toggle-icon"></span>
		</button>

		<ul class="messengers__list">
			<li class="messengers__item">
				<a href="<?= $tg; ?>" target="_blank" rel="nofollow" class="messengers__item-link">
					<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
						<g opacity="0.5">
							<path class="circle" d="M25.3689 49.7799C38.8534 49.7799 49.7847 38.6002 49.7847 24.8092C49.7847 11.0183 38.8534 -0.161438 25.3689 -0.161438C11.8844 -0.161438 0.953125 11.0183 0.953125 24.8092C0.953125 38.6002 11.8844 49.7799 25.3689 49.7799Z" fill="#02A1E0" />
							<path class="icon" d="M8.56791 22.5837L36.4216 11.6002C37.7144 11.1225 38.8435 11.9227 38.4246 13.922L38.427 13.9195L33.6844 36.7704C33.3329 38.3905 32.3916 38.7845 31.0748 38.0212L23.8525 32.5774L20.369 36.0096C19.9838 36.4036 19.6588 36.736 18.9125 36.736L19.4253 29.2191L32.8105 16.8519C33.3931 16.3275 32.6805 16.032 31.9125 16.554L15.3712 27.2051L8.2405 24.9301C6.69253 24.4278 6.65883 23.347 8.56791 22.5837Z" fill="white" />
						</g>
					</svg>
				</a>
			</li>
			<li class="messengers__item">
				<a href="<?= $wa; ?>" target="_blank" rel="nofollow" class="messengers__item-link">
					<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
						<g opacity="0.5">
							<path class="circle" d="M11.0416 45.625L11.9791 46.1458C15.8333 48.5416 20.3125 50 25 50C38.6458 50 50 38.6458 50 24.7916C50 10.9374 38.6458 0 24.8958 0C11.1458 0 0 11.0416 0 24.7916C0 29.5833 1.35418 34.2708 3.85416 38.2291L4.47921 39.1666L2.08343 47.9167L11.0416 45.625Z" fill="#2CB742" />
							<path class="icon" d="M16.8637 10.7516L14.881 10.6467C14.2549 10.6467 13.6288 10.8564 13.2114 11.2756C12.2722 12.114 10.707 13.6859 10.2896 15.782C9.55919 18.926 10.707 22.6987 13.4202 26.4714C16.1334 30.2441 21.351 36.3225 30.5338 38.9424C33.4556 39.7808 35.7514 39.2568 37.6298 38.1041C39.0908 37.1609 40.0298 35.6937 40.343 34.1217L40.656 32.6545C40.7604 32.2353 40.5516 31.7112 40.1342 31.5017L33.56 28.4625C33.1426 28.2529 32.6208 28.3577 32.3078 28.7769L29.699 32.1304C29.4903 32.3401 29.1772 32.4448 28.8642 32.3401C27.0902 31.7112 21.1422 29.1961 17.9072 22.9082C17.8029 22.5939 17.8029 22.2794 18.0116 22.0698L20.516 19.2403C20.7248 18.926 20.8291 18.5068 20.7248 18.1923L17.6986 11.3804C17.5941 11.0659 17.2811 10.7516 16.8637 10.7516Z" fill="white" />
						</g>
					</svg>
				</a>
			</li>
		</ul>
	</div>
</div>

<footer class="footer">
	<div class="footer__wrap">

		<div class="footer__topbar">
			<div class="container">
				<div class="footer__topbar-wrap">
					<div class="footer__col">
						<a href="<?= site_url(); ?>" class="footer__logo">
							<picture>
								<source srcset="data:image/avif;base64,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" type="image/avif">
								<img src="data:image/webp;base64,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&#x3D;&#x3D;" alt="">
							</picture>
						</a>

						<div class="footer__logo-title">
							Декоративные ставни и комплектующее для окон
						</div>
					</div>

					<div class="footer__col">
						<div class="footer__footer-menu footer-menu">
							<?php bem_menu('footer-menu-1', 'footer-menu'); ?>
						</div>
					</div>

					<div class="footer__col">
						<div class="footer__footer-menu footer-menu">
							<?php bem_menu('footer-menu-2', 'footer-menu'); ?>
						</div>
					</div>

					<div class="footer__col">
						<div class="footer__contacts">
							<?php if (!empty($tel)) : ?>
								<a href="tel:<?= str_replace(array('(', ')', ' ', '<span>', '</span>', '-'), '', $tel); ?>" class="footer__tel">
									+7 (999) 999 99 99
								</a>
							<?php endif; ?>
							<?php if (!empty($email)) : ?>
								<a href="mailto:<?= $email; ?>" class="footer__email">
									<?= $email; ?>
								</a>
							<?php endif; ?>
							<?php if (!empty($address)) : ?>
								<div class="footer__address">
									<?= $address; ?>
								</div>
							<?php endif; ?>
							<?php if (!empty($hours)) : ?>
								<div class="footer__worktime">
									<?= $hours; ?>
								</div>
							<?php endif; ?>
							<button class="footer__contact-link" data-modal="contact-modal">
								Оставить заявку
							</button>
						</div>
					</div>


				</div>

			</div>
		</div>


		<div class="footer__bottombar">
			<div class="container">
				<div class="footer__bottombar-wrap">
					<div class="footer__copyright">
						©<?= get_the_date('Y'); ?> Techno Fasade, декоративные ставни
					</div>

					<div class="footer__links">
						<a href="<?= get_privacy_policy_url(); ?>" class="footer__link">
							Политика конфиденциальности
						</a>
					</div>

					<div class="socials footer__socials">
						<?php get_template_part('template-parts/content', 'socials'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>

</html>