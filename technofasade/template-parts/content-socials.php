<?php $socials = carbon_get_theme_option('socials');?>

<ul class="socials__list">
    <?php foreach ($socials as $social) : ?>
    <li class="socials__item">
        <a href="<?=$social['link'];?>" target="_blank" rel="nofollow" class="socials__link">
            <img src="<?=wp_get_attachment_image_url($social['icon'], 'large');?>" alt="<?=$social['title'];?>">
        </a>
    </li>
    <?php endforeach;?>
</ul>