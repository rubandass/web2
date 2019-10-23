$(document).ready(function () {

    $('#addPlayer').click(function () {
        //Reset the form values
        $('#playerForm')[0].reset();
        //Reset the hidden field 'id'
        $("#id").val('');
        //Reset the errors block
        $("#errors").html("")
        //Set title for modal dialog
        $('#playerModalLabel').html('Add Player');
        //Clear image if it comes from edit dialog
        $("#playerImage").attr('src', '');
        $("#playerImage").hide();
        //Hiding 'PATCH' method when submitting the form
        $('#route').hide();
        //Set the 'route' div to 'disabled'
        $('#route :input').attr('disabled', 'disabled');
        //show the modal dialog
        $("#playerModal").modal();
    });

    $('.editPlayer').click(function () {
        $('#playerForm')[0].reset();
        $('#playerModalLabel').html('Edit Player');
        $("#id").val($(this).data('id'));
        $("input[name='name']").val($(this).data('name'));
        $("input[name='age']").val($(this).data('age'));
        $("input[name='role']").val($(this).data('role'));
        $("input[name='batting']").val($(this).data('batting'));
        $("input[name='bowling']").val($(this).data('bowling'));
        $("input[name='odi_runs']").val($(this).data('odi_runs'));
        $("select[name='country_id']").val($(this).data('country_id'));
        $("#playerImage").attr('src', 'storage/' + $(this).data('image'));
        //$('#playerForm').prop('action', '/players/' + $(this).data('id'));
        $("#errors").html("")
        $('#playerImage + img').remove();
        $("#playerImage").show();
        //Show the 'PATCH' method.
        $('#route').show();
        //Remove the attribute 'disabled' of 'route' div.
        $('#route :input').removeAttr('disabled');
        $("#playerModal").modal();
    });

    //Delete multiple palyers
    $('#deletePlayers').click(function () {
        $("#ids").val("");

        var selectedPlayers = [];
        $("input[name='players']:checked").each(function () {
            selectedPlayers.push($(this).val());
        });
        if (selectedPlayers.length > 0) {
            $("#ids").val(selectedPlayers.join());
            $("#message").html("Are you sure you want to delete the selected players: ?");
            $("#cancel").html("Cancel");
            $("#submit").show();
            $("#deletePlayersModal").modal();
        } else {
            $("#message").html("No players selected.");
            $("#cancel").html("Close");
            $("#submit").hide();
            $("#deletePlayersModal").modal();
        }
    });


    //Uncheck the selected players after clicking Cancel button
    $('#cancel').click(function () {
            $("input[name='players']").prop('checked', false);
    });

    
    // Save player data using ajax
    $("form#playerForm").submit(function (e) {
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
            error: function (error) {
                console.log(error);
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    $('.deletePlayer').click(function () {
        $("#spanPlayerName").text($(this).data('name'));
        $('#playerDeleteForm').prop('action', $('#playerDeleteForm').data('url') + '/' + $(this).data('id'));
        //$('#playerDeleteForm').prop('action', '/players/' + $(this).data('id'));
        $("#playerDeleteModal").modal();
    });


    $('#searchPlayer').click(function () {
        //Reset the form values
        $('#playerSearchForm')[0].reset();
        //show the modal dialog
        $("#playerSearchModal").modal();
    });


    $("#playerImageInputFile").change(function () {
        readURL(this, 'playerImage');
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
