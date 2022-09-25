<?php
//var_dump(get_query_var('compare_param'));
get_header();

?>
<div class="container"><div class="xfire-compare-wrapper">
<?php
if (get_query_var('compare_param')) {
    $compare_param = str_replace("%20", " ", get_query_var('compare_param'));
    $compared_games = explode("-vs-", $compare_param);
}
$saved_meta = get_option(Xfire_Constants::Xfire_Rawg_Compare_Meta, array());
$saved_tax = get_option(Xfire_Constants::Xfire_Rawg_Compare_Tax, array());
$saved_post = get_option(Xfire_Constants::Xfire_Rawg_Compare_Post, array());
$admin_compare = Xfire_Games_Api_Admin_Compare::get_instance();
$compare_meta = $admin_compare->get_compare_meta();
$compare_taxonomies = $admin_compare->get_compare_taxonomies();
$compare_post = $admin_compare->get_compare_post();
$game_ids = array();
?>
<?php
$meta_array = array();
foreach ($compared_games as $key => $compared_game) {
    $game_id = 0;
    if ($post = get_page_by_path($compared_game, OBJECT, 'game'))
        $game_ids[] = $post->ID;
    foreach ($saved_post as $key => $post_data) {
        if ($post_data == "title") {
            $meta_array[$post_data][] = get_the_title($post->ID);
        }
        if ($post_data == "description") {
            $meta_array[$post_data][] = get_post_field('post_content', $post->ID);
        }
        if ($post_data == "feature_img") {
            $game_image = "";
            if (has_post_thumbnail($game_id)) {
                $game_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
            }
            if ($game_image != "")
                $meta_array[$post_data][] = $game_image[0];
        }
    }
//    var_dump($meta_array);
    foreach ($saved_meta as $key => $meta_key) {
        $meta_array[$meta_key][] = (get_field($meta_key, $post->ID, true));
    }
    foreach ($saved_tax as $key => $tax_key) {
        $meta_array[$tax_key][] = (wp_get_post_terms($post->ID, $tax_key));
    }
}
?>


<table>
    <thead>
        <tr>

            <?php
            foreach ($saved_post as $key => $post_data) {
                if (!empty(array_filter($meta_array[$post_data]))) {
                    ?>
                    <th><?php echo $compare_post[$post_data] ?> </th>
                    <?php
                }
            }


            foreach ($saved_meta as $key => $meta_key) {

//            var_dump($meta_array['xfire-game-website']);
                if (!empty(array_filter($meta_array[$meta_key]))) {
                    ?>

                    <th><?php echo $compare_meta[$meta_key] ?></th>
                    <?php
                }
            }


            foreach ($saved_tax as $key => $tax_key) {
                if (!empty(array_filter($meta_array[$tax_key]))) {
                    ?>

                    <th><?php echo $compare_taxonomies[$tax_key] ?></th>
                    <?php
                }
            }
            ?>

        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($compared_games as $key => $compared_game) {
            $post = get_page_by_path($compared_game, OBJECT, 'game');
          
            $game_id=$post->ID;
            ?>
            <tr>
              
                
                <?php
        foreach ($saved_post as $key => $post_data) {
            if (!empty(array_filter($meta_array[$post_data]))) {
                ?>
               

                    <?php
                  
                        if ($game_id != 0) {
                            ?>
                            <td><?php
                                if ($post_data == "title") {
                                    if (get_the_title($game_id) != "")
                                        echo get_the_title($game_id);
                                    else {
                                        echo '-';
                                    }
                                }
                                if ($post_data == "description") {
                                    if (get_post_field('post_content', $game_id) != "") {
                                        echo get_post_field('post_content', $game_id);
                                    } else {
                                        echo '-';
                                    }
                                }
                                if ($post_data == "feature_img") {
                                    $game_image = "";
                                    if (has_post_thumbnail($game_id)) {
                                        $game_image = wp_get_attachment_image_src(get_post_thumbnail_id($game_id), 'full');
//        var_dump($game_image);
                                    }
                                    if ($game_image != "") {
                                        ?>
                                        <a href="<?php echo $game_image[0] ?>" data-showsocial="true" class="html5lightbox" data-group="mygroup" data-thumbnail="<?php echo $game_image[0] ?>" title="Toronto">
                                            <img src="<?php echo $game_image[0] ?>" height="200px" width="100px">
                                        </a>
                                        <?php
                                    } else {
                                        echo '-';
                                    }
                                }
                                ?></td>
                            <?php
                        }
                   
                    ?>
             
                <?php
            }
        }
        ?>
        <?php
        foreach ($saved_meta as $key => $meta_key) {

//            var_dump($meta_array['xfire-game-website']);
            if (!empty(array_filter($meta_array[$meta_key]))) {
                ?>
          

                    <?php
                  
                        if ($game_id != 0) {

//                        var_dump(get_post_meta($game_id, $meta_key, true));
                            ?>
                            <td><?php
                                if ($meta_key == "xfire-game-screenshots" || $meta_key == "xfire-game-trailer") {
                                    if (function_exists('get_field'))
                                        $game_screenshots = get_field($meta_key, $game_id, true);
                                    if (!empty($game_screenshots)) {
                                        foreach ($game_screenshots as $key => $game_screenshot) {
//                    var_dump($game_screenshot);
                                            ?>
                                            <a href="<?php echo $game_screenshot ?>" data-showsocial="true" class="html5lightbox" data-group="mygroup" data-thumbnail="<?php echo $game_screenshot ?>" title="Toronto">
                                                <img src="<?php echo $game_screenshot ?>" height="200px" width="100px">
                                            </a>

                                            <?php
                                        }
                                    } else
                                        echo '-';
                                } elseif ($meta_key == "xfire-game-website" || $meta_key == "xfire-game-reddit-url") {
                                    $game_website = get_post_meta($game_id, $meta_key, true);
                                    if ($game_website != "")
                                        echo '<a href="' . esc_url($game_website) . '">' . $game_website . '</a><br/>';
                                    else
                                        echo '-';
                                } else {
                                    echo get_post_meta($game_id, $meta_key, true) ? get_post_meta($game_id, $meta_key, true) : "-";
                                }
                                ?></td>
                            <?php
                        }
                   
                    ?>
             
                <?php
            }
        }
        ?>
        <?php
        foreach ($saved_tax as $key => $tax_key) {
            if (!empty(array_filter($meta_array[$tax_key]))) {
                ?>
              

                    <?php
                    
                       

//                        var_dump(get_post_meta($game_id, $meta_key, true));
                            ?>
                            <td><?php
                                $tax_data = (wp_get_post_terms($game_id, $tax_key));
                                if (!empty($tax_data)) {
                                    foreach ($tax_data as $key => $tax) {
                                        $term_link = get_term_link($tax);

                                        echo '<a href="' . esc_url($term_link) . '">' . $tax->name . '</a>';
                                    }
                                } else
                                    echo '-';
                                ?></td>
                            <?php
                       
                    
                    ?>
               
                <?php
            }
        }
        ?>
            </tr>
            <?php
        }
        ?>

    </tbody>
</table>


        
        </div></div>
<?php
get_footer();
