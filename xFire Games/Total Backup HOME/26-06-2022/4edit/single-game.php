<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */
get_header();
?>
<?php
// Start the Loop.
while (have_posts()) :
    the_post();
    $game_id = get_the_ID();
    $game_screenshots = array();

    $background_image = $game_rate = $rating_count = $age_rating = $playing_time = $metaScore = $game_website = $tags = $genres = $developers = $publishers = $trailers = "";
    $game_release_date = get_post_meta($game_id, Xfire_Constants::Xfire_Game_Release_Date_Meta, true);
    if (function_exists('get_field')) {
        $background_image = get_field(Xfire_Constants::Xfire_Game_Background_Image_Meta, get_the_ID());
        $game_rate = get_field(Xfire_Constants::Xfire_Game_Rating_Meta, $game_id);
        $rating_count = get_field(Xfire_Constants::Xfire_Game_Rating_Count_Meta, $game_id);
        $age_rating = get_field(Xfire_Constants::Xfire_Game_Age_Rating_Meta, $game_id);
        $playing_time = get_field(Xfire_Constants::Xfire_Game_Playtime_Meta, $game_id);
        $metaScore = get_field(Xfire_Constants::Xfire_Game_Metacritic_Meta, $game_id);
        $game_website = get_field(Xfire_Constants::Xfire_Game_Website_Meta, $game_id);
        $game_screenshots = get_field(Xfire_Constants::Xfire_Game_Gallery, $game_id, true);
        $trailers = get_field(Xfire_Constants::Xfire_Game_Trailer, $game_id);
    }
    $tags = wp_get_post_terms($game_id, Xfire_Constants::Xfire_Tag_Taxonomy);
    $genres = wp_get_post_terms($game_id, Xfire_Constants::Xfire_Genre_Taxonomy);
    $developers = wp_get_post_terms($game_id, Xfire_Constants::Xfire_Developer_Taxonomy);
    $publishers = wp_get_post_terms($game_id, Xfire_Constants::Xfire_Publisher_Taxonomy);
    ?>
<?php
    $game_image = "";
    if (has_post_thumbnail($game_id)) {
        $game_image = wp_get_attachment_image_src(get_post_thumbnail_id($game_id), 'full');
//        var_dump($game_image);
    }
    ?>

<style>
.content-area {
    background-image: url('<?php echo ($game_image != "") ? $game_image[0] : ""; ?>');
}
</style>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container">
            <div class="game-wrapper">
                <section class="game-details">
                    <div class="game-title">
                        <div class="title-meta">
                            <div class="ptime">
                                <?php if ($playing_time != "") { ?>
                                <div class="game-info playing-time">

                                    <h2>Playing Time</h2>
                                    <?php
                            echo $playing_time;
                            ?>
                                </div>
                                <?php
                    }
                    ?>
                            </div>
                        </div>
                        <h1> <?php echo get_the_title(); ?> </h1>
                    </div>
                    <div class="game-description">
                        <h2>About:</h2>

                        <p> <?php echo get_the_content(); ?> </p>
                    </div>
                    <div class="game-badges">
                        <?php if ($game_release_date) { ?>
                        <div class="game-info release-date">
                            <h2>Release Date:</h2>
                            <?php
                            echo date_i18n("M d, Y", strtotime($game_release_date));
                            ?>
                        </div>
                        <?php } ?>
                        <?php if ($metaScore != "") { ?>
                        <div class="game-info game-metascore">

                            <h2>MetaScore</h2>
                            <?php
                            echo $metaScore;
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    </div>
                    <div class="rating-wrapper">
                        <?php
                    if ($game_rate != "") {
                        ?>
                        <div class="game-info game-rate">

                            <h2>Rating:</h2>
                            <?php
                            echo $game_rate;
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                        <div class="game-info rating-data">

                            <?php
                        $rating_arr = $exceptional_rating = $recommended_rating = $meh_rating = $skip_rating = array(Xfire_Constants::Xfire_Game_Ratings_Data_Count_Meta => 0, Xfire_Constants::Xfire_Game_Ratings_Data_Percentage_Meta => 0);
//            if (have_rows(Xfire_Constants::Xfire_Game_Ratings_data_Meta)):
//
//                while (have_rows(Xfire_Constants::Xfire_Game_Ratings_Data_Meta)): the_row();
//
//                    $exceptional_rating = get_sub_field(Xfire_Constants::Xfire_Game_Exceptional_Rating_Meta) ? get_sub_field(Xfire_Constants::Xfire_Game_Exceptional_Rating_Meta) : $rating_arr;
//                    $recommended_rating = get_sub_field(Xfire_Constants::Xfire_Game_Recommended_Rating_Meta) ? get_sub_field(Xfire_Constants::Xfire_Game_Recommended_Rating_Meta) : $rating_arr;
//
//                    $meh_rating = get_sub_field(Xfire_Constants::Xfire_Game_Meh_Rating_Meta) ? get_sub_field(Xfire_Constants::Xfire_Game_Meh_Rating_Meta) : $rating_arr;
//
//                    $skip_rating = get_sub_field(Xfire_Constants::Xfire_Game_Skip_Rating_Meta) ? get_sub_field(Xfire_Constants::Xfire_Game_Skip_Rating_Meta) : $rating_arr;
//
//                endwhile;
//            endif;
                        if ($exceptional_rating[Xfire_Constants::Xfire_Game_Ratings_Data_Count_Meta] != 0) {
                            ?>

                            <h2>Exceptional Rating:</h2>
                            <?php
                            echo $exceptional_rating[Xfire_Constants::Xfire_Game_Ratings_Data_Count_Meta];
                        }
                        if ($recommended_rating[Xfire_Constants::Xfire_Game_Ratings_Data_Count_Meta] != 0) {
                            ?>

                            <h2>Recommended Rating:</h2>
                            <?php
                            echo $recommended_rating[Xfire_Constants::Xfire_Game_Ratings_Data_Count_Meta];
                        }
                        if ($meh_rating[Xfire_Constants::Xfire_Game_Ratings_Data_Count_Meta] != 0) {
                            ?>
                            <h2>Meh Rating:</h2>
                            <?php
                            echo $meh_rating[Xfire_Constants::Xfire_Game_Ratings_Data_Count_Meta];
                        }
                        if ($skip_rating[Xfire_Constants::Xfire_Game_Ratings_Data_Count_Meta] != 0) {
                            ?>
                            <h2>Skip Rating:</h2>
                            <?php
                            echo $skip_rating[Xfire_Constants::Xfire_Game_Ratings_Data_Count_Meta];
                        }
                        ?>
                        </div>

                        <?php if ($rating_count != "") { ?>
                        <div class="game-info rating-count">
                            <h2>Rating Count</h2>
                            <?php
                            echo $rating_count;
                            ?>
                        </div>

                        <?php
                    }
                    ?>
                        <?php if ($age_rating != "") { ?>
                        <div class="game-info age-rating">

                            <h2>Age Rating</h2>
                            <?php
                            echo $age_rating;
                            ?>
                        </div>

                        <?php
                    }
                    ?>
                    </div>


                    <?php if ($game_website != "") { ?>
                    <div class="game-info game-website">
                        <i class="bb-icon bb-ui-icon-globe"></i>
                        <div>
                            <h2>Website</h2>
                            <?php echo '<a href="' . esc_url($game_website) . '">' . $game_website . '</a><br/>'; ?>
                        </div>
                    </div>
                    <?php }
                    ?>

                    <?php
                    if ($tags != "") {
                        ?>
                    <div class="game-info game-tags">


                        <h2>tags:</h2>
                        <?php
                            foreach ($tags as $key => $tag) {
                                $term_link = get_term_link($tag);

                                echo '<a href="' . esc_url($term_link) . '">' . $tag->name . '</a>';
                            }
                            ?>
                    </div>
                    <?php }
                    ?>
                    <?php if ($genres != "") { ?>
                    <div class="game-info game-genres">
                        <h2>Genres:</h2>
                        <?php
                            $genres_arr = array();
                            foreach ($genres as $key => $genre) {
                                $term_link = get_term_link($genre);

                                echo '<a href="' . esc_url($term_link) . '">' . $genre->name . '</a>';
                                $genres_arr[] = $genre->name;
                            }
                            ?>
                    </div>
                    <?php
                    }
                    ?>
                    <?php $similar_games = Xfire_Functions::get_game_by_tax(Xfire_Constants::Xfire_Genre_Taxonomy, $genres_arr, $game_id);
                    ?>
                    <?php if ($similar_games) { ?>
                    <div class="game-info game-similar">
                        <h2>Similar:</h2>
                        <?php
                            if ($similar_games->have_posts()) {
                                while ($similar_games->have_posts()) :
                                    $similar_games->the_post();
                                    echo '<p><a href="' . get_permalink() . '">' . get_the_title() . '</a></p>';
                                endwhile;
                            }
                            ?>
                    </div>
                    <?php
                    }
                    ?>
                    <?php $alternative_games = Xfire_Functions::get_game_by_tax(Xfire_Constants::Xfire_Genre_Taxonomy, $genres_arr, $game_id, $game_rate);
                    ?>
                    <?php if ($alternative_games) { ?>
                    <div class="game-info game-alternative">

                        <h2>Alternative:</h2>
                        <?php
                            if ($alternative_games->have_posts()) {

                                while ($alternative_games->have_posts()) :
                                    $alternative_games->the_post();
                                    echo '<p><a href="' . get_permalink() . '">' . get_the_title() . '</a></p>';
                                endwhile;
                            }
                            ?>
                    </div>
                    <?php
                    }
                    ?>
                </section>

                <aside class="game-sidebar">
                    <?php
//            var_dump($game_screenshots);
                    if (!empty($game_screenshots)) {
                        ?>
                    <div class="game-info game-screenshots">
                        <h2>screenshots:</h2>
                        <?php
                            foreach ($game_screenshots as $key => $game_screenshot) {
//                    var_dump($game_screenshot);
                                ?>
                        <a href="<?php echo $game_screenshot ?>" data-showsocial="true" class="html5lightbox"
                            data-group="mygroup" data-thumbnail="<?php echo $game_screenshot ?>" title="Toronto">
                            <img src="<?php echo $game_screenshot ?>" height="200px" width="100px">
                        </a>

                        <?php }
                            ?>
                    </div>
                    <?php
                    }
                    if ($trailers != "") {
                        while (the_repeater_field(Xfire_Constants::Xfire_Game_Trailer, $game_id)) {
                            ?>
                    <a href="<?php echo get_sub_field(Xfire_Constants::Xfire_Game_Trailer_Video) ?>"
                        class="html5lightbox" data-group="mygroup" data-weblink="https://www.wonderplugin.com"
                        data-weblinktarget="_self" title="Wordpress Carousel">
                        <img src="<?php echo get_sub_field(Xfire_Constants::Xfire_Game_Trailer_Preview) ?>"
                            height="200px" width="100px">
                    </a>

                    <?php
                        }
                    }
                    ?>
                    <?php if ($developers != "") { ?>
                    <div class="game-info game-developer">

                        <h2>Developers:</h2>
                        <?php
                            foreach ($developers as $key => $developer) {
                                $term_link = get_term_link($developer);

                                echo '<a href="' . esc_url($term_link) . '">' . $developer->name . '</a>';
                            }
                            ?>
                    </div>
                    <?php } ?>
                    <?php if ($publishers != "") { ?>
                    <div class="game-info game-publisher">

                        <h2>Publisher:</h2>
                        <?php
                            foreach ($publishers as $key => $publisher) {
                                $term_link = get_term_link($publisher);

                                echo '<a href="' . esc_url($term_link) . '">' . $publisher->name . '</a>';
                            }
                            ?>
                    </div>
                    <?php } ?>
                </aside>
            </div>
        </div>
    </main>
    <!--#main -->
</div>
<!--#primary -->

<?php
endwhile; // End the loop.

get_footer();