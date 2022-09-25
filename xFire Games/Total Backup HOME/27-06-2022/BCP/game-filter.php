<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storefront
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
        <?php
        if (have_posts()) :
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

            $args = array(
                'post_type' => 'game',
//                'posts_per_page' => 2,
                'paged' => $paged
                    // 'offset' => 6
            );

            // var_dump($args);
            $posts = new WP_Query($args);
            echo $posts->max_num_page;
            ?>

            <header class="page-header">
                <?php
                the_archive_title('<h1 class="page-title">', '</h1>');
                the_archive_description('<div class="taxonomy-description">', '</div>');
                ?>
            </header><!-- .page-header -->

            <div class="xfire-game-archive-wrapper">
                <div class="lds-hourglass"></div>
                <form class="xfire-filtering" method="get">
                   <!-- <select name="xfire_game_genre" class="xfire-game-genre"  style="width: 20%" placeholder="Genre" > </select> -->
                    <input name="xgname" class="xfire-game-name" style="width: 20%" placeholder="name" >
                    <input name="xgrating" class="xfire-game-rate" style="width: 20%" placeholder="rating" >
                    <input name="xgrdate" class="xfire-game-rdate" style="width: 20%" placeholder="Release Date" >

                                                <!-- <select name="xfire_game_developer" class="xfire-game-developer" style="width: 20%" placeholder="developer" ></select> -->
                                <!-- <select name="xfire_game_platform" class="xfire-game-platform" style="width: 20%" placeholder="platform"></select> -->

                                                <!-- <input name="xfire-game-release-date" class="xfire-game-release-date" > -->
                    <input type="button" value="submit" class="filter-btn">
                    <input type="hidden" name="paged" value="1" />
                    <input type="hidden" name="max_num_page" value="<?php echo $posts->max_num_page ?>" />

                </form>
                <div class="xfire-archive-wrapper">
                    <aside class="xfire-archive-game-aside">
                        <h2>Genres</h2>
                        <ul class="xfire-genre-list">
                            <li>Action</li>
                            <li>Action2</li>
                            <li>Action3</li>
                            <li>Action4</li>
                        </ul>
                    </aside>
                    <div class="xfire-list-games-content">
                        <ul class="xfire-content col-3">

                            <?php
                            include XFIRE_GAMES_FRONTEND_TEMPLATES . '/games-list/games-posts.php';
                            ?>

                            <?php
                        else :
                            ?>
                            <h3><?php _e('no content found') ?></h3>
                        <?php
                        endif;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
            </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
