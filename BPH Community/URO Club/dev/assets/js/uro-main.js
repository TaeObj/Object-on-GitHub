/*!
 * Project Custom JS
 * Author : Ahmed Abdel Moula
 */
$ = jQuery;

/*$(window).load(function () {
  // Animate loader off screen
  $(".se-pre-con").fadeOut("slow");;
});*/

$(document).ready(function () {
  $(".gc-scroll__to-top").click(function () {
    return $("html, body").animate({ scrollTop: 0 }, "slow"), !1;
  });

  $(".alert-success").fadeTo(5000, 500).slideUp(500, function () {
    $(".alert-success").slideUp(500);
  });

});

