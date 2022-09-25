<?php
$max_num_pages = $posts->max_num_pages;
while ( $posts->have_posts() ) :$posts->the_post();?>
   
<?php  include XFIRE_GAMES_FRONTEND_TEMPLATES. '/games-list/game-item.php'; ?>
<?php endwhile;wp_reset_query();?>
<?php if($max_num_pages>1 &&$max_num_pages !=$paged):?>
<a href="" class="load-more xfire-search-page-load-more" data-paged="<?php echo $paged+1;?>" data-max-num-pages="<?php echo $max_num_pages; ?>"><?php _e('Load more', 'hello-elementor') ?></a>
<?php endif;?>
