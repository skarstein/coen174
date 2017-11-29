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

    $lexilepref = $db->real_escape_string($_POST["lexile"]);
    $copyrightpref = $db->real_escape_string($_POST["copyright"]);
    $pagepref = $db->real_escape_string($_POST["page"]);
    $recommendedpref = $db->real_escape_string($_POST["recommended"]);
    $topicpref = $db->real_escape_string($_POST["topic"]);
    $pprotagpref = $db->real_escape_string($_POST["primary"]);
    $sprotagpref = $db->real_escape_string($_POST["secondary"]);

    //get books
    //rank them
    //add them to student database in that order
    $sql = "SELECT * FROM books WHERE course_id='".$_SESSION['course']."';";
    $result = $db->query($sql);
    while($row=mysqli_fetch_array($result)){
        $sql = "INSERT INTO student_books(title, author, copyright, lexile, pages, recommended, topic, pprotag_n, sprotag_n, user_id, course_id) VALUES ('" .$row['title']. "', '" .$row['author']. "','" .$row['copyright']."','".$row['lexile']."','".$row['pages']."','".$row['recommended']."','".$row['topic']."','".$row['pprotag_n']."','".$row['sprotag_n']."','".$_SESSION['user_id']."', '".$_SESSION['course']."')";
    }

    if ($db->query($sql) === TRUE) {
        echo '<script>alert("Here are your matches!");</script>';
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=bookresults.php">';
    } else {
          echo '<script>alert("Error: Unable to submit form");</scipt>';
	  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=bookrank.php">';
    }

    $db->close();
    ?>
