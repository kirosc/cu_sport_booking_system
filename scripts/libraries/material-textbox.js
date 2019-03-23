$(document).ready(function($) {
    $('.material-text > input').change(function() {
        if($(this).val() != '') {
            $(this).addClass('hasValue');
        }
        else {
            $(this).removeClass('hasValue');
        }
    });
});
