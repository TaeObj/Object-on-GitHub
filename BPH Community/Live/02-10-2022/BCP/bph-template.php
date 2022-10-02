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
          <?php 
               $find_doctor_section_title = get_field('find_doctor_section_title', get_the_ID());
               $find_doctor_section_description = get_field('find_doctor_section_description', get_the_ID());
               $find_doctor_section_background = get_field('find_doctor_section_background', get_the_ID());
               $find_doctor_page_link = get_field('find_doctor_page', get_the_ID());
               $tabs_background = get_field('tabs_background', get_the_ID());
          ?>
          <!-- Call to Action -->
          <section class="uro-call2action" style="background-image:url(
               <?php echo $find_doctor_section_background;  ?>)">
               <div class="action-wrapper">
                    <h2><?php echo  $find_doctor_section_title;?></h2>
                    <p><?php echo  $find_doctor_section_description;?></p>
                    <a href="<?php echo $find_doctor_page_link;?>" class="btn btn-primary btn-xl"><?php echo __('Find a Doctor', 'bph-community');?></a>
               </div>
          </section>

        <!-- END Call to Action -->
        <section class="uro-fea-blocks" style="background-image:url(
               <?php echo $tabs_background;  ?>)">
            <div class="container">
                <div class="row">
                    <?php include(BPH_PATH. 'includes/Templates/tabs.php');?>
                </div>
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