//Shrink navigation within scrolling
jQuery.fn.shrink_nav = function () {
    if (jQuery(document).scrollTop() > 46) {
        jQuery("#idh-header").addClass("shrink");
    } else {
        jQuery("#idh-header").removeClass("shrink");
    }
}
jQuery(document).ready(function () {
    jQuery.fn.shrink_nav();
    jQuery(document).on("scroll", function () {
        jQuery.fn.shrink_nav();
    });
})


//In-Page Navigation Scroll
jQuery(function () {
    let headerHeight = jQuery('#idh-header').height();
    jQuery('a[href*=#]:not([href=#])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
            && location.hostname == this.hostname) {
            let target = jQuery(this.hash);
            target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                jQuery('html,body').animate({
                    scrollTop: target.offset().top - headerHeight - 45 //offsets for fixed header + section bottom margin
                }, 1000);
                return false;
            }
        }
    });
});