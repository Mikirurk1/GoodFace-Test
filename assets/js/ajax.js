function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);

}

$(document).ready(function () {
    $('.subscription-form input[name=email]').on("input", function () {
        let email = $('input[name=email]').val();
        validateEmail(email);
        if (validateEmail(email)) {
            $('.subscription-form input[name=email]').removeClass('not-valid')
            $('.input-err').hide();
        }
    })

    $('.subscription-form').submit(function (e) {
        e.preventDefault();

        let email = $('input[name=email]').val();

        if (!validateEmail(email)) {
            $('.subscription-form input[name=email]').addClass('not-valid')
            $('.input-err').show();
        } else {
            $.ajax({
                type: 'POST',
                url: ajax_params.ajax_url,
                data: {
                    action: 'send_email',
                    email: email
                },
                success: function (response) {
                    $('.footer-form').hide();
                    $('.footer-success').show();
                    $('.footer__subscriber-hello').hide();
                    $('.footer__subscriber-success').show();
                }
            });
        }
    });
});