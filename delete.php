<?php

    session_start();
    $servername = "dbserver.engr.scu.edu";
    $username = "shu";
    $password = "group2";
    $database = "sdb_shu";

    // Create connection
    $db = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

   $sql = "DELETE FROM books WHERE title = '".$_GET['title']."';";

   if ($db->query($sql) === TRUE) {
       echo '<script>alert("You have successfully deleted the book");</script>';
       echo '<META HTTP-EQUIV="Refresh" Content="0; URL=accountpage.php">';
   } else {
        echo '<script>alert("Error: Unable to delete book");</script>';
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=accountpage.php">';
    }

    $db->close();
?>
