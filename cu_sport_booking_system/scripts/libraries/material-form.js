function arrangeAndSubmit(material_form) {
    material_form.each(function() {
        $('.material-select', this).each(function() {
            var input = $('input', this);
            input.attr('value', $(this).attr('data-value'));

            if(input.attr('value') == 'any') {
                input.attr('name', '');
            }
        });

        $('.material-text', this).each(function() {
            var input = $('input', this);
            if(input.val().trim() == '') {
                input.attr('name', '');
            }
        });

        $(this).submit();
    });
}

$(document).ready(function($) {
    $('.material-form').each(function() {
        var form = $(this);
        $('.material-select li.option', this).click(function() {
            setTimeout(function(){
                arrangeAndSubmit(form);
            }, 450);
        });

        $('.material-text.search > input').keypress(function(e) {
            if(e.which == 13) {
                arrangeAndSubmit(form);
            }
        });

        $('.material-clear').click(function() {
            window.location.href = form.attr('action');
        })
    });
});
