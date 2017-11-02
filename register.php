<?php
    // A simple PHP script demonstrating how to connect to MySQL.
    // Press the 'Run' button on the top to start the web server,
    // then click the URL that is emitted to the Output tab of the console.

    $servername = getenv('dbserver.engr.scu.edu');
    $username = getenv('shu');
    $password = "group2";
    $database = "sdb_shu";
    $dbport = 3306;

    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    echo "Connected successfully (".$db->host_info.")";

    $firstname = $_POST["fname"];
    $lastname = $_POST["lname"];
    $username = $_POST["uname"];
    $password = $_POST["pswd"];
    $type = $_POST["type"];

    echo($firstname);
    echo($lastname);
    echo($username);
    echo($password);
    echo($type);

    $firstname = mysql_real_escape_string($firstname);
    $lastname = mysql_real_escape_string($lastname);
    $username = mysql_real_escape_string($username);
    $type = mysql_real_escape_string($type);

    $sql = "INSERT INTO user(firstname, lastname, username, password, type)
    VALUES ($firstname, $lastname, $username, $password, $type);
    echo($sql);

    if ($db->query($sql) === TRUE) {
        echo '<script>alert("You have successfully created an account");</script>';
        $db->close();
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=homepage.html">';
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    $db->close();
    ?>
