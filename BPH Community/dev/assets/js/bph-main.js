/*!
 * Project Custom JS
 * Author : Ahmed Abdel Moula
 */

$(document).ready(function () {
  // Bootstrap Tooltip Trigger
  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });


  // Button Scroll to Top
  $(".gc-scroll__to-top").click(function () {
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      "slow"
    );
    return false;
  });

});

$(".lang-list li").on("click", function (e) {
  $(".lang-selected img").attr('src', $(this).find('img').attr('src'));
});

$('html').on("click", function (e) {
  if (!$(".lang-list").hasClass('d-none')) {
    $('.lang-list').addClass('d-none');
  }
});
