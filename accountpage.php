<?php
    session_start();
    if(isset($_SESSION['user'])){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=home.html">';
        echo '<script>alert("You are already signed in.");</script>';

    } else{
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

        $username = $_POST["username"];
        $password = $_POST["password"];
        $sql = "SELECT username, password FROM user WHERE username ="."'".$username."';";

        $result = $db->query($sql);
        if($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if($row["password"] == $password ){
                   $_SESSION['user'] = $username;
                   echo '<META HTTP-EQUIV="Refresh" Content="0; URL=home.html">';
                   echo '<script> alert("Hello '.$row["username"].'! You are now signed in!"); </script>';
                   $db->close();
                }
                else{
                    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=home.html">';
                    echo '<script> alert("Wrong email/password. Try Again."); </script>';
                    $db->close();
                }
        }else{
            echo "0 results";
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=home.html">';
        }
    }
    $db->close();
    ?>
