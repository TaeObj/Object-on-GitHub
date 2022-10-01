<?php get_header();?>

     <!-- Home Slider -->
     <section id="home-slider">
     <div class="owl-carousel">
          <?php include(BPH_PATH. 'includes/Templates/slider.php');?>
     </div>
     </section>
     <!-- END Home Slider -->

     <!-- Site Main -->
     <main id="uro-main">
     <div class="container">
     <section class="uro-fea-blocks">
          <div class="row">
               <?php include(BPH_PATH. 'includes/Templates/tabs.php');?>
          </div>
     </section>

     <section class="uro-news">
          <h2>Latest News</h2>
          <ul class="news-list row">
               <?php include(BPH_PATH. 'includes/Templates/news.php');?>
          </ul>
     </section>
     </div>
     </main>

<?php get_footer(); ?>
