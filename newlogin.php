<?php
    session_start();
    if(isset($_SESSION['user'])){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=home.html">';
        echo '<script>alert("You are already signed in.");</script>';

    } else{
        // A simple PHP script demonstrating how to connect to MySQL.
        // Press the 'Run' button on the top to start the web server,
        // then click the URL that is emitted to the Output tab of the console.

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

        $username = $db->real_escape_string($_POST["uname"]);
        $password = $db->real_escape_string($_POST["pswd"]);

        $sql = "SELECT username, password, salt FROM users WHERE username ="."'".$username."';";
        $result = $db->query($sql);
        if($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $options = [
                    'salt' => $row["salt"],
                ];
                $hashed_password = password_hash("$password", PASSWORD_BCRYPT, $options);

                if($hashed_password==$row["password"]){
                   $_SESSION['users'] = $username;
                   echo '<META HTTP-EQUIV="Refresh" Content="0; URL=accountpage.php">';
                   echo '<script> alert("Hello '.$row["username"].'! You are now signed in!"); </script>';
                  }
                else{
                    echo '<script> alert("Wrong email/password. Try Again."); </script>';
		    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.html">';
                }
        }else{
            echo '<script> alert("Error: Cannot connect to database"); </script>';
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=home.html">';
        }
    }
    $db->close();
    ?>
