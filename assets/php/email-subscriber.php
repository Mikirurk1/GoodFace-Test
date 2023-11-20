<?php
add_action('wp_ajax_send_email', 'send_email');
add_action('wp_ajax_nopriv_send_email', 'send_email');

function send_email()
{
    $email = $_POST['email'];

    $to = 'teriv168@gmail.com';
    $subject = "U Have a New Subscribe";
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: Хвиля Здоров\'я <noreply@ваш-сайт.com>'
    );

    $message_body = '<html>New Subscriber:</strong> ' . $email . '</p></html>';

    $sent = wp_mail($to, $subject, $message_body, $headers);

    if ($sent) {
        $confirmation_subject = "Confirmation of Subscription";
        $confirmation_message = "Thank you for subscribing to our newsletter!";
        $confirmation_sent = wp_mail($email, $confirmation_subject, $confirmation_message, $headers);

        if ($confirmation_sent) {
            echo 'Success';
        } else {
            echo 'Error sending confirmation email';
        }
    } else {
        echo 'Error';
    }

    wp_die();
}