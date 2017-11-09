<?php
    // A simple PHP script demonstrating how to connect to MySQL.
    // Press the 'Run' button on the top to start the web server,
    // then click the URL that is emitted to the Output tab of the console.

    if(isset($_POST["fname"])
	    && isset($_POST["lname"])
	    && isset($_POST["uname"])
	    && isset($_POST["pswd"])) {

    	$servername = "dbserver.engr.scu.edu";
    	$usrname = "shu";
    	$pssword = "group2";
    	$database = "sdb_shu";

    	// Create connection
    	$db = mysqli_connect($servername, $usrname, $pssword, $database);

    	// Check connection
    	if ($db->connect_error) {
        	die("Connection failed: " . $db->connect_error);
    	}

    	$firstname = $db->real_escape_string($_POST["fname"]);
    	$lastname = $dp->real_escape_string($_POST["lname"]);
    	$username = $db->real_escape_string($_POST["uname"]);
    	$password = $db->real_escape_string($_POST["pswd"]);
    	$type = $_POST["clientid"];

    	$salt = openssl_random_pseudo_bytes(22);
    	$options = [
       	    'salt' => $salt,
    	];

    	$hashed_password = password_hash("$password", PASSWORD_BCRYPT, $options);

    	$sql = "INSERT INTO users(firstname, lastname, username, password, type, salt) VALUES ('" .$firstname. "', '" .$lastname. "','" .$username. "','" .$hashed_password."','".$type."','".$salt."')";

    	if ($db->query($sql) === TRUE) {
            echo '<script>alert("You have successfully created an account");</script>';
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=homepage.html">';
    	} else {
	      echo '<script>alert("Error: Unable to register");</script>';
	      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=homepage.html">';
    	}

    	$db->close();
    } else {
	echo'<script>alert("Failed to register.");</scipt>';
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=homepage.html">';
    }
?>
