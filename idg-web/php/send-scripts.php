<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        if ( empty($name) OR empty($message) OR empty($email)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Ups, wystąpił problem z wysłaniem wiadomości. Wypełnij formularz i spróbuj ponownie.";
            exit;
        }
        
        $to = "biuro@idg-online.com";
        $subject = "Wiadomość od: $name";

        $email_content = "Imie i nazwisko: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Wiadomość:\n$message\n";
        
        $headers = "";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";

        // Send the email.
        if (mail($to, $subject, $email_content, $headers)) {
            // Set a 200 (okay) response code.
            // http_response_code(200);
            echo "Wiadomość została wysłana :)";
        } else {
            // Set a 500 (internal server error) response code.
            // http_response_code(500);
            echo "Ups, coś poszło nie tak :(";
        }
    }
?>