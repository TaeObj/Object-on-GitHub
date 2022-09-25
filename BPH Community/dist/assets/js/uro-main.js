/*!
 * Project Custom JS
 * Author : Ahmed Abdel Moula
 */
$(document).ready((function(){$((function(){$('[data-toggle="tooltip"]').tooltip()})),$(".gc-scroll__to-top").click((function(){return $("html, body").animate({scrollTop:0},"slow"),!1}))})),$(".lang-list li").on("click",(function(t){$(".lang-selected img").attr("src",$(this).find("img").attr("src"))})),$("html").on("click",(function(t){$(".lang-list").hasClass("d-none")||$(".lang-list").addClass("d-none")}));