<?php

    $destination = "bienvenuakpo@gmail.com";
    $sujet="Test de mail";
    $message = "c'est un test de mail";
    $headers = array(
        'From' => 'edouardoaf2@gmail.com',
        'Reply-To' => 'edouardoaf2@gmail.com',
        'X-Mailer' => 'PHP'.phpversion()
    );

    mail(
        $destination,
        $sujet,
        $message,
        $headers
    );
?>