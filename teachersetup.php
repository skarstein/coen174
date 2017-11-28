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

  $sql = "INSERT INTO courses(course_id, user_id) VALUES ('".$course_id."', '".$_SESSION['user_id']."')";
  if ($db->query($sql) === TRUE) {
        echo '<script>alert("You have successfully created an account");</script>';
        if ($type == 1) {
          echo '<META HTTP-EQUIV="Refresh" Content="0; URL=teachersetup.php">';
        }
        else {
          echo '<META HTTP-EQUIV="Refresh" Content="0; URL=studentsetup.php">';
        }
  } else {
          echo '<script>alert("Error: Unable to register");</script>';
          echo '<META HTTP-EQUIV="Refresh" Content="0; URL=homepage.html">';
  }

  $db->close();
  ?>

<!DOCTYPE html>
<HTML>
<head>
<link rel="stylesheet" type="text/css" href="display.css"/>

  <title>My Account</title>
  <center>
    <h1>My Account</h1>
  </center>

</head>

<body>
  <div> <center>   Welcome to the book matching system! Lets get you set up.  First, we'll create a course for you to start with.  Enter a course number below.   </center>  </div>

  <div class="form_center">
  <div class="form_mate">
  <form action = "teachersetup.php" method = "post">
  <fieldset>
      <br><b>Course ID</b><br>
      <input type="text" name="course_id" required>
      <button type="submit">Enter</button>
  </fieldset>
  </form>
  </div>
  </div>
</body>
</HTML>
