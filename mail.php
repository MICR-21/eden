<?php
    
    $headers = array(
        'Authorization: Bearer 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',
        'Content-Type: application/json'
    );

    $data = a3rray(
        "personalizations" => array(
            array(
                "to" => array(
                    array(
                        "email" => 'hsnhafsah@gmail.com',
                        "name" => 'Charles Mainaa'
                    )
                )
            )
        ),
        "from" => array(
            "email" => 'admin@icse.rochella.org',
            "name" => $_POST["name"]
        ),
        "subject" => 'Test me',
        "content" => array(
            array(
                "type" => "text/html",
                "value" => $_POST["message"]."<br> from".$_POST["email"]
                //'Hi there this is a test'
            )
        )
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);
header("location:./index.html");
?>