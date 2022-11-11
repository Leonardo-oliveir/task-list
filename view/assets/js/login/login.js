$('#input_login').click(function () {
    if ($('#input_login').is(':disabled')) {
        $('#input_login').removeAttr('disabled');
    } else {
        $('#input_login').attr('disabled', 'disabled');
    }
});