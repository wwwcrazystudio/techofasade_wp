<?php
$montage_heading = carbon_get_the_post_meta('montage_heading');
$montage_text = carbon_get_the_post_meta('montage_desc');
$montage_video = carbon_get_the_post_meta('montage_video');
?>
<div class="montage__wrap">
    <div class="container">
        <div class="montage__heading" data-aos="fade-up">
            <div class="montage__backtext">
                Способ установки
            </div>
            <div class="montage__heading-content">
                Монтаж
            </div>
        </div>

        <div class="montage__head">
            <h3 class="montage__subheading" data-aos="fade-right">
                <?= $montage_heading; ?>
            </h3>

            <div class="montage__desc" data-aos="fade-left">
                <?= $montage_text; ?>
            </div>
        </div>

        <div class="montage__video" data-aos="fade-up">
            <iframe width="100" height="100" src="<?=$montage_video;?>" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>

        <div data-aos="fade-up"><a href="" class="montage__link" data-animate-link>Подробнее о монтаже</a></div>
    </div>
</div>