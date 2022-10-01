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

        <!-- Call to Action -->
        <section class="uro-call2action" style="background-image:
            url(https://bph-community-test.objectsdev.com/wp-content/uploads/2022/09/bph-02.jpg)">
            <div class="action-wrapper">
                <h2>Call to Action Title</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy</p>
                <a href="#!" class="btn btn-primary btn-xl">Take an Action</a>
            </div>
        </section>

        <!-- END Call to Action -->
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