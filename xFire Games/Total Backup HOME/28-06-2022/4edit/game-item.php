<li class="game-item">
    <a href="<?php the_permalink(); ?>">


        <?php
        $image_url = Xfire_Constants::xfire_get_default_img_url();
//        if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
//            $image_id = get_post_thumbnail_id();
//            $image_url = wp_get_attachment_image_src($image_id, 'medium');
//            $image_url = $image_url[0];
//        }
        if (has_post_thumbnail(get_the_ID())) {
            $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
            $image_url = $image_url[0];
        }
        $metaScore = get_field(Xfire_Constants::Xfire_Game_Metacritic_Meta, get_the_ID());
        $game_release_date = get_post_meta(get_the_ID(), Xfire_Constants::Xfire_Game_Release_Date_Meta, true);
        $genres = wp_get_post_terms(get_the_ID(), Xfire_Constants::Xfire_Genre_Taxonomy);
        ?>
        <img src="<?php echo $image_url; ?>" />
    </a>
    <div class="game-item-details">
        <div class="game-content">
            <header class="game-item-header">
                <div class="rate-stars">
                    <?php Xfire_Functions::get_rate_as_stars(get_the_ID()); ?>
                    <?php if ($metaScore): ?>
                    <span title="<?php _e('Metascore', XFIRE_GAMES_TEXT_DOMAIN); ?>"
                        class="rate"><?php echo $metaScore; ?></span>
                    <?php endif; ?>
                </div>
                <h2><a href="<?php the_permalink(); ?>"><?php echo the_title() ?></a></h2>
            </header>
        </div>

        <div class="game-bottom">
            <?php
            if (!is_singular('game'))
                Xfire_Functions::get_game_compare_btn(get_the_ID(), get_post_field('post_name'));
            ?>
            <ul class="game-meta">
                <li>
                    <h4><?php _e('Release date', XFIRE_GAMES_TEXT_DOMAIN); ?></h4>
                    <p><?php
                        if ($game_release_date)
                            echo date_i18n("M d, Y", strtotime($game_release_date));
                        ?></p>
                </li>
                <?php
                if ($genres != "") {
                    ?>
                <li>
                    <h4><?php _e('Genres', XFIRE_GAMES_TEXT_DOMAIN); ?></h4>
                    <p>
                        <?php
                            foreach ($genres as $key => $genre) {
                                $term_link = get_term_link($genre);

                                echo '<a href="' . esc_url($term_link) . '">' . $genre->name . '</a>';
                            }
                            ?>
                    </p>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</li>