jQuery(document).ready(function () {
    jQuery('.remove-item-from-compare').on('click', function (e) {
        console.log("Ssssssssssssss");
        // e.preventDefault();
        var self = this;
        var elem = jQuery(this);
        var game = jQuery(this).attr("data-game-id");
        var games_arr = {};
        var url = jQuery('.xfire-compare-widget a').attr('data-url');
        var should_redirect = false;
        if (Cookies.get(game_filters_data.xfire_cookie_name)) {
            games_arr = Cookies.get(game_filters_data.xfire_cookie_name);
            games_arr = JSON.parse(games_arr);
        }
        if (Object.keys(games_arr).length) { //didn't reach limit


            if (jQuery.inArray(game, Object.keys(games_arr)) !== -1) { //exists
                elem.attr("data-game-id", game).closest('tr').remove();
                // if (Object.keys(games_arr).length > 1) { //didn't reach limit
                delete games_arr[game]
                jQuery('.xfire-compare-widget a span').text(Object.keys(games_arr).length)
                if (Object.keys(games_arr).length == 0) {
                    should_redirect = true;
                }
                games_arr = JSON.stringify(games_arr);
                Cookies.set(game_filters_data.xfire_cookie_name, games_arr, {
                    expires: parseInt(game_filters_data.xfire_cookie_expire),
                    url: game_filters_data.xfire_game_url
                });

                if (should_redirect) {
                    window.location.href = url;
                }
                jQuery('<div class="game-msg fail">' + game_filters_data.xfire_game_already_exist + '</div>')
                    .insertBefore(elem)
                    .delay(3000)
                    .fadeOut(function () {
                        jQuery(this).remove();
                    });
            }
        }

    });
});