jQuery(document).ready(function ($) {
    $("#submitFormButton").on("click", (function (event) {
        event.preventDefault();

        var position = $("#position-field").val();

        var data = {
            action: 'add_new_position',
            position: position,
        };

        jQuery.post(ajaxurl, data, function (response) {
            alert("Success: " + position );
            $("<div class=\"position_row\">" +
                "<input name='position' data-positionid='' class='position-input' type='text' value=\"" + position + "\" disabled></<input>" +
                "<button class='edit-save btn btn-outline-info btn-sm' type='button'>Edit</button>" +
                "<button class='delete btn btn-outline-danger btn-sm' type='button'>Delete</button></div>").insertAfter("h4");
            $("#position-form")[0].reset();
        })
    }));

    $(".edit-save").on("click", function (event) {
        event.preventDefault();
        var $this = $(this);

        var $input = $this.prev();
        if ( $input.prop( "disabled") ) {
            $input.prop( "disabled", false);
            $this.text( 'Save' );
            $this.removeClass( "btn-outline-info" );
            $this.addClass( "btn-outline-primary" );
        } else {

            $this.removeClass( "btn-outline-primary" );
            $this.addClass( "btn-outline-info" );

            var name = $input.val();
            console.log(name);

            var id = $input.attr( 'data-positionid' );
            console.log(id);

            var data = {
                action: 'edit_position',
                name: name,
                id: id,
            };
            jQuery.post(ajaxurl, data, function (response) {
                $input.prop( "disabled", true);
                $this.text( 'Edit' );
            });
        }
    });

    $('.delete_position').on('click', function(event){
        event.preventDefault();

        var $this = $(this);
        var $input = $this.prevAll('.position-input');
        var id = $input.attr( 'data-positionid' );
        console.log(id);

        var $deletePosition = confirm("Are you really want to DELETE this position?");

        if ($deletePosition == true) {
            console.log("You pressed OK!");

            var data = {
                action: 'delete_position',
                id: id,
            };
            jQuery.post( ajaxurl, data, function(response) {
            });
            $this.parents(".position_row").fadeOut(1000);
        } else {
            console.log("You pressed Cancel!");
        }
    });

    $('#first_name').keydown( function() {

        $english = /^[A-Za-z]+$/;
        $inputVal = $(this).val();
        $('span.error-keydown').remove();

        if ( !$english.test($inputVal) ) {
            $(this).after('<span style="color: red" class="error error-keydown">Please, write your First Name in English.</span>');
            $(this).val('');
        }
    }).focusout(function () {
        if ( !$english.test($inputVal) ) {
            $(this).val('');
        }
    });

    $('#last_name').keydown( function() {

        $english = /^[A-Za-z]+$/;
        $inputVal = $(this).val();
        $('span.error-keydown').remove();

        if ( !$english.test($inputVal) ) {
            $(this).after('<span style="color: red" class="error error-keydown">Please, write your Last Name in English.</span>');
            $(this).val('');
        }
    }).focusout(function () {
        if ( !$english.test($inputVal) ) {
            $(this).val('');
        }
    });

});