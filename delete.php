<?php

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

    $row_id = $_GET["row_id"];

    $sql = "DELETE FROM books WHERE id = $row_id";

    if ($db->query($sql) === TRUE) {
	    echo '<script>alert("Book deleted");</script>';
	    $db->close();
	    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=accountpage.php">';
    } else {
	echo "Error"
      }

    $db->close();
?>
