<?php
    // A simple PHP script demonstrating how to connect to MySQL.
    // Press the 'Run' button on the top to start the web server,
    // then click the URL that is emitted to the Output tab of the console.

    $servername = "dbserver.engr.scu.edu";
    $username = "shu";
    $password = "group2";
    $database = "sdb_shu";

    // Create connection
    $db = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    //echo "Connected successfully (".$db->host_info.")";

    $firstname = $db->real_escape_string($_POST["fname"]);
    $lastname = $dp->real_escape_string($_POST["lname"]);
    $username = $db->real_escape_string($_POST["uname"]);
    $password = $db->real_escape_string($_POST["pswd"]);
    $type = $_POST["clientid"];

   // echo($firstname);
   // echo($lastname);
   // echo($username);
    //echo($password);

    //$firstname = mysql_real_escape_string($firstname);
    //$lastname = mysql_real_escape_string($lastname);
    //$username = mysql_real_escape_string($username);
    //$type = mysql_real_escape_string($type);

    $salt = openssl_random_pseudo_bytes(22);
    $options = [
       'salt' => $salt,
    ];
    
    $hashed_password = password_hash("$password", PASSWORD_BCRYPT, $options);
    //echo($hashed_password);

    //echo($type);

    $sql = "INSERT INTO users(firstname, lastname, username, password, type, salt) VALUES ('" .$firstname. "', '" .$lastname. "','" .$username. "','" .$hashed_password."','".$type."','".$salt."')";
    //echo($sql);

    if ($db->query($sql) === TRUE) {
        echo '<script>alert("You have successfully created an account");</script>';
        $db->close();
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=homepage.html">';
    } else {
	  echo '<script>alert("Error: Unable to register");</script>';
          $db->close();
	  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=homepage.html">';
    }

    $db->close();
    ?>
