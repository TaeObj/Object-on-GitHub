<?php
get_header();

?>

<div class="qodef-full-width">
    <div class="qodef-full-width-inner">
        <div class="vc_row wpb_row vc_row-fluid qodef-section">
            <div class="clearfix qodef-full-section-inner">
                <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                            <div class="qodef-elements-holder qodef-two-columns qodef-responsive-mode-1024">
                                <!-- Celebrity Image -->
                                <div class="qodef-elements-holder-item">
                                    <div class="qodef-elements-holder-item-inner cav-celeb-img">
                                        <div class="qodef-elements-holder-item-content" style="padding: 0;">
                                            <div class="wpb_single_image wpb_content_element vc_align_left">
                                                <figure class="wpb_wrapper vc_figure">
                                                    <div class="vc_single_image-wrapper vc_box_border_grey">
                                                        <?php if (has_post_thumbnail()) { ?>
                                                            <img src="<?= get_the_post_thumbnail_url(get_the_ID(), "large") ?>"
                                                                 class="vc_single_image-img attachment-full" alt="a">
                                                             <?php } ?>
                                                    </div>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Celebrity Image -->
                                <!-- Celebrity Details -->
                                <div class="qodef-elements-holder-item cav-celeb-details">
                                    <div class="qodef-elements-holder-item-inner">
                                        <div class="qodef-elements-holder-item-content"
                                             style="padding: 20% 12% 20% 10.5%">
                                            <h1 class="celeb-name"><?= get_the_title() ?></h1>
                                            <?php if ( $celeb_talents = get_the_terms(get_the_ID(), "celeb_talent") ){ ?>
                                                <h4 class="celeb-category"> 
                                                    <?= implode( ' , ', wp_list_pluck($celeb_talents, 'name')); ?>
                                                </h4>
                                            <?php } ?>
                                            <p class="celeb-brief">
                                                <?= get_the_excerpt() ?>
                                            </p>
                                            <?php if (get_field('celebrity_total_fund', get_the_ID())) { ?>
                                                <h6 class="celeb-fund">
                                                    <?php echo sprintf(__('Total Fund Raised By %s', 'ultima'), get_the_title()) ?>
                                                    <span>
                                                        <?php echo get_woocommerce_currency_symbol() . " " . get_field('celebrity_total_fund', get_the_ID()) ?></span>
                                                </h6>
                                            <?php } ?> 
                                            <span class="celeb-sig">
                                                <?php if (get_field('celebrity_signature', get_the_ID())) { ?>
                                                    <img
                                                        src="<?= get_field('celebrity_signature', get_the_ID())["url"] ?>"
                                                        alt="">
                                                    <?php } ?>
                                            </span>
                                            <div class="celeb-social">
                                                <?php if (get_field('celebrity_facebook', get_the_ID())) { ?>
                                                    <a itemprop="url" class=""
                                                       href="<?= get_field('celebrity_facebook', get_the_ID()) ? get_field('celebrity_facebook', get_the_ID()) : "#" ?>"
                                                       target="_blank">
                                                        <span class="icon-normal"><i
                                                                class="qodef-icon-font-awesome fa fa-facebook qodef-icon-element"
                                                                style="color: rgb(255, 255, 255); font-size: 24px;"></i></span>
                                                    </a>
                                                <?php } ?> 

                                                <?php if (get_field('celebrity_twitter', get_the_ID())) { ?>
                                                    <a itemprop="url" class=""
                                                       href="<?= get_field('celebrity_twitter', get_the_ID()) ? get_field('celebrity_twitter', get_the_ID()) : "#" ?>" target="_blank">
                                                        <span class="icon-normal"><i
                                                                class="qodef-icon-font-awesome fa fa-twitter qodef-icon-element"
                                                                style="color: rgb(255, 255, 255); font-size: 24px;"></i></span>
                                                    </a>
                                                <?php } ?> 

                                                <?php if (get_field('celebrity_instagram', get_the_ID())) { ?>
                                                    <a itemprop="url" class=""
                                                       href="<?= get_field('celebrity_instagram', get_the_ID()) ? get_field('celebrity_instagram', get_the_ID()) : "#" ?>"
                                                       target="_blank">
                                                        <span class="icon-normal"><i
                                                                class="qodef-icon-font-awesome fa fa-instagram qodef-icon-element"
                                                                style="color: rgb(255, 255, 255); font-size: 24px;"></i></span>
                                                    </a>
                                                <?php } ?> 
                                            </div>
                                            <?php 
                                            $celebrity_term_url = Celebrity_Admin::get_instance()->get_celebrity_term_url(get_the_ID());
                                            if($celebrity_term_url){
                                            ?>
                                                <a itemprop="url" href="<?php echo $celebrity_term_url; ?>" target="_self" class="qodef-btn qodef-btn-medium qodef-btn-solid qodef-btn-custom-hover-bg qodef-btn-custom-border-hover qodef-btn-custom-hover-color qodef-btn-icon qodef-btn-hover-scale"> 
                                                    <span class="qodef-btn-text"><?php _e('View Goods', 'ultima') ?></span>
                                                    <span class="qodef-btn-icon-normal">
                                                        <i class="qodef-icon-font-awesome fa fa-angle-right "></i>
                                                    </span>
                                                    <span class="qodef-btn-icon-flip">
                                                        <i class="qodef-icon-font-awesome fa fa-angle-right "></i>
                                                    </span>
                                                </a>
                                            <?php 
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Celebrity Details -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();

?>