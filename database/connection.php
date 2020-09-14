<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "my_christianfrancini";

    // Connessione
    $link = new mysqli($servername, $username, $password, $databasename);

    // Check di Connessione
    if ($link->connect_error) {
        die("Connection error: " .$link->connect_error);
    }

?>
