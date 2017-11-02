<?php //Connecting to SQL db
$connect = mysqli_connect("my host", "my user","my password", "my db");
if(!connect)
{
  die('Connection Failed: '.mysql_error());
  mysql_select_db("database_name", $connect);
}

//Sending form data to SQL db.
//mysqli_query($connect, "INSERT INTO posts(category, title, contents, tags)
V//ALUES('$_POST[post_category'], '$_POST[post_title]', '$_POST[post_contents]', '$_POST[post_tags]')");

$user_info = “INSERT INTO table_name(firstname, lastname, username, password) VALUES ('$_POST[firstname]', '$_POST[lastname]','$_POST[username]', '$_POST[password]')”;
if (!mysql_query($user_info, $connect)) { die('Error: ' . mysql_error()); } echo “Your information was added to the database.”; mysql_close($connect); ?>

First Name: <p style = "font-size: 24px;"> <?php echo($_POST["fname"]); ?> </p> <br>
Last Name:  <b> <?php echo($_POST["lname"]); ?> </b> <br>
Username: <?php echo($_POST["uname"]); ?> <br>
Password: <?php echo($_POST["pswd"]); ?><br>
Student/Teacher: <?php echo($_POST["clientid"]); ?><br>
