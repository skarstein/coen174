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
        $username = "shu";
        $password = "group2";
        $database = "sdb_shu";

        // Create connection
        $db = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $username = $_POST["uname"];
        $password = $_POST["pswd"];
        
        $sql = "SELECT username, password, salt FROM users WHERE username ="."'".$username."';";
        $result = $db->query($sql);
        if($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $options = [
                    'salt' => $row["salt"],
                ];
                $hashed_password = password_hash("$password", PASSWORD_BCRYPT, $options);
                //echo($hashed_password);

                if($hashed_password==$row["password"]){
                   $_SESSION['users'] = $username;
                   echo '<META HTTP-EQUIV="Refresh" Content="0; URL=accountpage.php">';
                   echo '<script> alert("Hello '.$row["username"].'! You are now signed in!"); </script>';
                   $db->close();
                }
                else{
                    //echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.html">';
                    echo '<script> alert("Wrong email/password. Try Again."); </script>';
                    $db->close();
                }
        }else{
            echo "0 results";
            //echo '<META HTTP-EQUIV="Refresh" Content="0; URL=home.html">';
        }
    }
    $db->close();
    ?>
