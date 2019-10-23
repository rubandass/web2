$(document).ready(function () {

    $('#addCountry').click(function () {
        //Reset the form values
        $('#countryForm')[0].reset();
        //Reset the hidden field 'id'
        $("#id").val('');
        //Reset the errors block
        $("#errors").html("")
        //Set title for modal dialog
        $('#countryModalLabel').html('Add Country');
        //Clear image if it comes from edit dialog
        $("img[id='countryImage']").attr('src', '');
        $("#countryImage").hide();
        //Set the action values when submitting the form
        //$('#countryForm').prop('action', '/countries');
        //Hiding 'PATCH' method when submitting the form
        $('#route').hide();
        //Set the 'route' div to 'disabled'
        $('#route :input').attr('disabled', 'disabled');
        //show the modal dialog
        $("#countryModal").modal();
    });

    // Save country data using ajax
    $("form#countryForm").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        var url = $(this).attr('action');
        if ($("#id").val() !== '') {
            url += '/' + $("#id").val();
        }
        $.ajax({
            url: url,
            type: $(this).attr('method'),
            data: formData,
            success: function (data) {
                $("#errors").html("");
                if (data["result"] == "success") {
                    document.location.reload();
                } else {
                    $.each(data['errors'], function (i, obj) {
                        $("#errors").append('<li>' + obj.join(" ") + '</li>')
                    });
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });


    $('.editCountry').click(function () {
        $('#countryModalLabel').html('Edit Country');
        $('#countryForm')[0].reset();
        $("#id").val($(this).data('id'));
        $("input[name='name']").val($(this).data('name'));
        $("img[id='countryImage']").attr('src', 'storage/' + $(this).data('flag'));

        //$('#countryForm').prop('action', $('#countryForm').prop('action') + '/' + $(this).data('id'));
        $("#errors").html("")
        $('#countryImage + img').remove();
        $("#countryImage").show();
        //Show the 'PATCH' method.
        $('#route').show();
        //Remove the attribute 'disabled' of 'route' div.
        $('#route :input').removeAttr('disabled');
        $("#countryModal").modal();
    });


    $('.deleteCountry').click(function () {
        $("#spanCountryName").text($(this).data('name'));
        $('#countryDeleteForm').prop('action', $('#countryDeleteForm').data('url') + '/' + $(this).data('id'));
        $("#countryDeleteModal").modal();
    });


    $("#countryImageInputFile").change(function () {
        readURL(this, 'countryImage');
    });
});

function readURL(input, image) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#' + image + 'img').remove();
            $('#' + image).attr('src', e.target.result);
            $('#' + image).show();
        }
        reader.readAsDataURL(input.files[0]);
    }
}

