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

  $sql = "SELECT * FROM courses WHERE course_id = '".$course_id."'";

  $result = $db->query($sql);
  if($result->num_rows == 0) {
    echo '<script>alert("Error: course id does not exist");</script>';
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=studentaccountpage.php">';
  } else {
      $row = $result->fetch_assoc();
      $sql2 = "INSERT INTO student_courses(course_id, user_id, name) VALUES ('".$row['course_id']."', '".$_SESSION['user_id']."', '".$row['name']."')";
      if ($db->query($sql2) === TRUE) {
        echo '<script>alert("You have successfully added a course");</script>';
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=studentaccountpage.php">';
      } else {
          echo '<script>alert("Error: Unable to add course");</script>';
          echo '<META HTTP-EQUIV="Refresh" Content="0; URL=studentaccountpage.php">';
      }
  }
  $db->close();
?>