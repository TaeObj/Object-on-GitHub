//Shrink navigation within scrolling
jQuery(document).on("scroll", function () {
  if (jQuery(document).scrollTop() > 80) {
    jQuery("#idh-header").addClass("shrink");
  } else {
    jQuery("#idh-header").removeClass("shrink");
  }
});