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
        $sql = "INSERT INTO student_books(title, author, copyright, lexile, pages, recommended, topic, pprotag_n, sprotag_n, user_id, course_id, rank) VALUES ('" .$row['title']. "', '" .$row['author']. "','" .$row['copyright']."','".$row['lexile']."','".$row['pages']."','".$row['recommended']."','".$row['topic']."','".$row['pprotag_n']."','".$row['sprotag_n']."','".$_SESSION['user_id']."', '".$_SESSION['course']."', 0)";
        $saved = $db->query($sql);
    }

    $sql = "SELECT id, lexile FROM student_books WHERE course_id='".$_SESSION['course']."' AND user_id='".$_SESSION['user_id']."';";
    $result = $db->query($sql);
    while($row=mysqli_fetch_array($result)){
        if ($row['lexile'] - $lexilepref <= 0) {
            $sql = "UPDATE student_books SET rank = rank + 22 WHERE id = '".$row['id']."';";
            $updated = $db->query($sql);
        } else if ($row['lexile'] - $lexilepref <= 150) {
            $sql = "UPDATE student_books SET rank = rank + 15 WHERE id = '".$row['id']."';";
            $updated = $db->query($sql);
        } else if ($row['lexile'] - $lexilepref <= 300) {
            $sql = "UPDATE student_books SET rank = rank + 9 WHERE id = '".$row['id']."';";
            $updated = $db->query($sql);
        } else if ($row['lexile'] - $lexilepref <= 450) {
            $sql = "UPDATE student_books SET rank = rank + 4 WHERE id = '".$row['id']."';";
            $updated = $db->query($sql);
        }
    }

    $sql = "SELECT id, copyright FROM student_books WHERE course_id='".$_SESSION['course']."' AND user_id='".$_SESSION['user_id']."';";
    $result = $db->query($sql);
    while($row=mysqli_fetch_array($result)){
        if ($row['copyright'] - $copyrightpref <= 9  && $row['copyright'] - $copyrightpref >= 0) {
            $sql = "UPDATE student_books SET rank = rank + 1 WHERE id = '".$row['id']."';";
            $updated = $db->query($sql);
        }
    }

    $sql = "SELECT id, pages FROM student_books WHERE course_id='".$_SESSION['course']."' AND user_id='".$_SESSION['user_id']."';";
    $result = $db->query($sql);
    while($row=mysqli_fetch_array($result)){
        if ($pagepref == 'a') {
            if (100 - $row['pages'] > 0) {
                $sql = "UPDATE student_books SET rank = rank + 1 WHERE id = '".$row['id']."';";
                $updated = $db->query($sql);
            }
        } else if ($pagepref == 'b') {
            if (300 - $row['pages'] > 0 && $row['pages'] - 100 >= 0) {
                $sql = "UPDATE student_books SET rank = rank + 1 WHERE id = '".$row['id']."';";
                $updated = $db->query($sql);
            }
        } else if ($pagepref == 'c') {
            if (500 - $row['pages'] > 0 && $row['pages'] - 300 >= 0) {
                $sql = "UPDATE student_books SET rank = rank + 1 WHERE id = '".$row['id']."';";
                $updated = $db->query($sql);
            }
        } else if ($pagepref == 'd') {
            if ($row['pages'] - 500 >= 0) {
                $sql = "UPDATE student_books SET rank = rank + 1 WHERE id = '".$row['id']."';";
                $updated = $db->query($sql);
            }
        } 
    }

    $sql = "SELECT id, recommended FROM student_books WHERE course_id='".$_SESSION['course']."' AND user_id='".$_SESSION['user_id']."';";
    $result = $db->query($sql);
    while($row=mysqli_fetch_array($result)){
        if ($row['recommended'] == $recommendedpref) {
            $sql = "UPDATE student_books SET rank = rank + 1 WHERE id = '".$row['id']."';";
            $updated = $db->query($sql);
        }
    }

    $sql = "SELECT id, topic FROM student_books WHERE course_id='".$_SESSION['course']."' AND user_id='".$_SESSION['user_id']."';";
    $result = $db->query($sql);
    while($row=mysqli_fetch_array($result)){
        if ($row['topic'] == $topicpref) {
            $sql = "UPDATE student_books SET rank = rank + 1 WHERE id = '".$row['id']."';";
            $updated = $db->query($sql);
        }
    }

    $sql = "SELECT id, pprotag_n FROM student_books WHERE course_id='".$_SESSION['course']."' AND user_id='".$_SESSION['user_id']."';";
    $result = $db->query($sql);
    while($row=mysqli_fetch_array($result)){
        if ($row['pprotag_n'] == $pprotagpref) {
            $sql = "UPDATE student_books SET rank = rank + 1 WHERE id = '".$row['id']."';";
            $updated = $db->query($sql);
        }
    }

    $sql = "SELECT id, sprotag_n FROM student_books WHERE course_id='".$_SESSION['course']."' AND user_id='".$_SESSION['user_id']."';";
    $result = $db->query($sql);
    while($row=mysqli_fetch_array($result)){
        if ($row['sprotag_n'] == $sprotagpref) {
            $sql = "UPDATE student_books SET rank = rank + 1 WHERE id = '".$row['id']."';";
            $updated = $db->query($sql);
        }
    }

    if ($saved === TRUE) {
        echo '<script>alert("Here are your matches!");</script>';
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=bookresults.php">';
    } else {
          echo '<script>alert("Error: Unable to submit form");</scipt>';
	  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=bookrank.php">';
    }

    $db->close();
    ?>
