jQuery(document).ready(function ($) {
    $("#search_button").on('click', function (event) {
        event.preventDefault();
        $('#search_results_container').remove();

        var searchQuery = $("#site_search").val();
        var inputId = $('#search-form div').children('input:checked').attr('id');

        if (inputId == "name_id_radio") {
            var search_request = {
                action: 'search_user',
                dataType: "html",
                request: searchQuery,
            };
        } else if (inputId == "skype_id_radio") {
            var search_request = {
                action: 'search_user_skype',
                dataType: "html",
                request: searchQuery,
            }
        } else if (inputId == "nickname_id_radio") {
            var search_request = {
                action: 'search_user_nickname',
                dataType: "html",
                request: searchQuery,
            }
        }

        jQuery.post(myajax.url, search_request, function (response) {
            $('#search-form').append('<div id="search_results_container">' + response + '</div>');
            console.log(response);
        });

    });

    $('#site_search').keydown( function() {

        $english = /^[A-Za-z]+$/;
        $inputVal = $(this).val();
        $('span.error-keydown').remove();

        if ( !$english.test($inputVal) ) {
            $(this).after('<span style="color: red" class="error error-keydown">Please, write your search request in English.</span>');
            $(this).val('');
        }
    }).focusout(function () {
        if ( !$english.test($inputVal) ) {
            $(this).val('');
        }
    });

    $('#get_users_on_the_floor').on('click', function (event) {
        event.preventDefault();

        $('#search_results_container').remove();
        var searchQuery = $('#floor-form select').children('option:selected').val();

        var search_request = {
            action: 'get_users_on_floor',
            dataType: "html",
            request: searchQuery,
        };

        jQuery.post(myajax.url, search_request, function (response) {
            $('#search-form').append('<div id="search_results_container">' + response + '</div>');
            console.log(response);
        });
    })

});
