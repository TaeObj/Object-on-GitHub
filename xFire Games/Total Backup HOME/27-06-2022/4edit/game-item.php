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
        <div class="game-content">
            <header class="game-item-header">
                <h2><?php echo the_title() ?></h2>
                <span title="<?php _e('Metascore',XFIRE_GAMES_TEXT_DOMAIN);?>" class="rate">80</span>
            </header>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                has been the industry's standard dummy text ever since the 1500s</p>
        </div>

        <div class="game-bottom">
            <?php Xfire_Functions::get_game_compare_btn(get_the_ID());?>
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
    </div>
</li>