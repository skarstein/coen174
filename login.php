<?php //Connecting to SQL db
$connect = mysqli_connect("my host", "my user","my password", "my db");
//Sending form data to SQL db.
mysqli_query($connect, "INSERT INTO posts(category, title, contents, tags)
VALUES('$_POST[post_category'], '$_POST[post_title]', '$_POST[post_contents]', '$_POST[post_tags]')"); ?>


First Name: <p style = "font-size: 24px;"> <?php echo($_POST["fname"]); ?> </p> <br>
Last Name:  <b> <?php echo($_POST["lname"]); ?> </b> <br>
Username: <?php echo($_POST["uname"]); ?> <br>
Password: <?php echo($_POST["pswd"]); ?><br>
Student/Teacher: <?php echo($_POST["clientid"]); ?><br>
