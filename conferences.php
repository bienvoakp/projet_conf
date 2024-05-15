<?php
    include_once("db_config.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['tel']) && isset($_POST['email'])) { 
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $tel = htmlspecialchars($_POST['tel']);
        $email = htmlspecialchars($_POST['email']);

        try {
            $con = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE );
        } catch (\Throwable $th) {
            throw $th;
        }
        
        // Prepare the query with placeholders
        $sql = "INSERT INTO client(nom, prenom, tel, email) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        // Bind parameters to prevent SQL injection
        if (!$stmt) {
        die("Error preparing statement: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "sss", $nom, $prenom, $tel, $email);

        // Execute the prepared statement
        if (!mysqli_stmt_execute($stmt)) {
        die("Error executing statement: " . mysqli_stmt_error($stmt));
        }

        echo 'Bonjour ' . $nom . ' ' . $prenom . ' ! Votre inscription a été enregistrée avec succès. Merci !';

        // Close the statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        
    }

?>
