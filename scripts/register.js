$(function () {
    "use strict";
    let isCoach = false;


    /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function () {
        $(this).on('blur', function () {
            if ($(this).val().trim() != "") {
                $(this).addClass('has-val');
            } else {
                $(this).removeClass('has-val');
            }
        })
    });


    /*==================================================================
    [ Validate ]*/

    $('.validate-form').on('submit', function () {
        var input = $('.validate-input:not(.hidden) .input100');
        var check = true;

        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }

        return check;
    });

    $('.validate-form .input100').each(function () {
        $(this).focus(function () {
            hideValidate(this);
        });
    });

    function validate(input) {
        if ($(input).attr('name') === 'user_name') {
            // Check if username contains whitespace
            if ($(input).val().match(/^\S*$/) == null) {
                return false;
            }
        } else if ($(input).attr('name') === 'email') {
            // Check email format
            if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        } else {
            // Check if the input is empty
            if ($(input).val().trim() === '') {
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }

    /*==================================================================
    [ Show pass ]*/
    var showPass = 0;
    $('.btn-show-pass').on('click', function () {
        if (showPass == 0) {
            $(this).next('input').attr('type', 'text');
            $(this).find('i').removeClass('zmdi-eye');
            $(this).find('i').addClass('zmdi-eye-off');
            showPass = 1;
        } else {
            $(this).next('input').attr('type', 'password');
            $(this).find('i').addClass('zmdi-eye');
            $(this).find('i').removeClass('zmdi-eye-off');
            showPass = 0;
        }

    });

    /*==================================================================
    [ Submit ]*/


    $('input[type=checkbox]').on('click', function () {
        if (isCoach) {
            $('.coach').addClass("hidden");
            $('.student').removeClass("hidden");
            isCoach = !isCoach;
        } else {
            $('.student').addClass("hidden");
            $('.coach').removeClass("hidden");
            isCoach = !isCoach;
        }
    });

    /*==================================================================
    [ Custom function ]*/
    $('input[name="birthday"]').daterangepicker({
        locale: {
            "format": "YYYY-MM-DD",
            "separator": "-",
            "firstDay": 1
        },
        startDate: moment(),
        maxDate: moment(),
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901
    });
});