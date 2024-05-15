<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    if (isset($_POST['nom']) && isset($_POST['prenom'])) { 
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        echo 'Bonjour ' . $nom . ' ' . $prenom . ' ! Votre inscription a été enregistrée avec succès. Merci !';
    }

?>
