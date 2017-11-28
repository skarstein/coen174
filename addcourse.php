<?php

  session_start();
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

  $course_id = $db->real_escape_string($_POST["course_id"]);
  $name = $db->real_escape_string($_POST["name"]);

  $sql = "INSERT INTO courses(course_id, user_id, name) VALUES ('".$course_id."', '".$_SESSION['user_id']."', '".$name."')";
  if ($db->query($sql) === TRUE) {
        echo '<script>alert("You have successfully created a course");</script>';
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=teacheraccountpage.php">';
  } else {
          echo '<script>alert("Error: Unable to create course");</script>';
          echo '<META HTTP-EQUIV="Refresh" Content="0; URL=teacheraccountpage.php">';
  }
  $db->close();
?>
