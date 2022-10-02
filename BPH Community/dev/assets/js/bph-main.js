/*!
 * Project Custom JS
 * Author : Ahmed Abdel Moula
 */
$ = jQuery;

$(window).load(function () {
  // Animate loader off screen
  $(".se-pre-con").fadeOut("slow");;
});

$(document).ready(function () {
  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  }),
    $(".gc-scroll__to-top").click(function () {
      return $("html, body").animate({ scrollTop: 0 }, "slow"), !1;
    });

}),
  $(document).on("scroll", function () {
    $(document).scrollTop() > 86 ? $("#uro-header").addClass("shrink") : $("#uro-header").removeClass("shrink");
  });
