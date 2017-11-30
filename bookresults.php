<?php
  session_start();
  $servername = "dbserver.engr.scu.edu";
  $username = 'shu';
  $password = 'group2';
  $dbname = 'sdb_shu';

  $connection = mysqli_connect($servername, $username, $password, $dbname);
  $sql = "SELECT * FROM student_books WHERE user_id ='".$_SESSION['user_id']."' AND course_id='".$_SESSION['course']."' ORDER BY rank;";
  $result = $connection->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>My Account</title>
<h1>Recommended Books</h1>
<link rel="stylesheet" type="text/css" href="display.css"/>
<script src="logout.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
  <meta charset="utf-8"/>
</head>
<body>
<div id = "welcome">
  <p>books for course <?php echo '"'.$_SESSION['course'].'"';?></p>
</div>
    <button type="button" class="logout-btn" onclick="logout();">Logout</button>
    <a href="studentaccountpage.php"><button type="button" class="back-btn">Back</button></a>

    <table class = "table-rwd" id="books">
     <thead>
       <tr>
         <th style="color:#dd5;">Title</th>
         <th style="color:#dd5;">Author</th>
         <th style="color:#dd5;">Copyright</th>
         <th style="color:#dd5;">Lexile</th>
         <th style="color:#dd5;">Pages</th>
         <th style="color:#dd5;">Recommended</th>
         <th style="color:#dd5;">Topic</th>
         <th style="color:#dd5;">Protagonist Nature</th>
         <th style="color:#dd5;">Secondary Protagonist Nature</th>
         <th style="color:#dd5;">Rank</th>
       </tr>
     </thead>
     <tbody>
     <?php
     while($row=$result->fetch_assoc()){
       echo
         "<tr>
           <td align=\"center\">".htmlspecialchars($row['title'])."</td>
           <td align=\"center\">".htmlspecialchars($row['author'])."</td>
           <td align=\"center\">".htmlspecialchars($row['copyright'])."</td>
           <td align=\"center\">".htmlspecialchars($row['lexile'])."</td>
           <td align=\"center\">".htmlspecialchars($row['pages'])."</td>
           <td align=\"center\">".htmlspecialchars($row['recommend'])."</td>
           <td align=\"center\">".htmlspecialchars($row['topic'])."</td>
           <td align=\"center\">".htmlspecialchars($row['pprotag_n'])."</td>
           <td align=\"center\">".htmlspecialchars($row['sprotag_n'])."</td>
           <td align=\"center\">".htmlspecialchars($row['rank'])."</td>
          </tr>";
      }
      $connection->close();
      ?>
    </tbody>
    </table>
</body>
</html>
