<?php
    // A simple PHP script demonstrating how to connect to MySQL.
    // Press the 'Run' button on the top to start the web server,
    // then click the URL that is emitted to the Output tab of the console.

    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;

    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    echo "Connected successfully (".$db->host_info.")";

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $id = $_POST["id"];

    echo($firstname);
    echo($lastname);
    echo($username);
    echo($password);
    echo($id);

    $sql = "INSERT INTO user(firstname, lastname, username, password, type)
    VALUES ("."'".$firstname."','".$lastname."','".$username."','".$password."'
    echo($sql);

    if ($db->query($sql) === TRUE) {
        echo '<script>alert("You have successfully created an account");</script>';
        $db->close();
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=home.html">';
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    $db->close();
    ?>
