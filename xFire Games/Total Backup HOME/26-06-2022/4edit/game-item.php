<li class="game-item">
    <a href="<?php echo the_permalink(get_the_ID()); ?>">

        <?php
        $image_url = Xfire_Constants::xfire_get_default_img_url();
        if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
            $image_id = get_post_thumbnail_id();
            $image_url = wp_get_attachment_image_src($image_id, 'medium');
            $image_url = $image_url[0];
        }
        ?>
        <img src="<?php echo $image_url; ?>" />
    </a>
    <div class="game-item-details">
        <header class="game-item-header">
            <h1><?php echo the_title() ?></h1>
            <span class="rate">80</span>
        </header>
        <div class="game-content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
            has been the industry's standard dummy text ever since the 1500s</div>
        <ul class="game-meta">
            <li>
                <h4>Release date:</h4>
                <p>Dec 31, 2022</p>
            </li>
            <li>
                <h4>genres:</h4>
                <p><a href="https://games.objectsdev.com/game_genre/indie/">Indie</a><a
                        href="https://games.objectsdev.com/game_genre/indie/">Action</a></p>
            </li>
        </ul>
    </div>
</li>