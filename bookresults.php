<?php
  session_start();
  $servername = "dbserver.engr.scu.edu";
  $username = 'shu';
  $password = 'group2';
  $dbname = 'sdb_shu';

  $connection = mysqli_connect($servername, $username, $password, $dbname);
  $sql = "SELECT * FROM student_books WHERE user_id ='".$_SESSION['user_id']."' AND course_id='".$_SESSION['course']."';";
  $result = $connection->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="bookresults.css"/>
<script src="logout.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
  <meta charset="utf-8"/>
</head>
<body>
<hr>
    <h4>Recommended Books</h4>
    <table border=0 class="rectangle-list">
        <tr>
            <td>
            <ol>
            <?php
                while($row=mysqli_fetch_array($result)) {
                    echo '<li><p>'.htmlspecialchars($row['title']).'</p></li>';
                }

                $connection->close();
            ?>
            </ol>
            </td>
        </tr>
    </table>
    <button type="button" class="logout-btn" onclick="logout();">Logout</button>
    <a href="studentaccountpage.php"><button type="button" class="back-btn">Back</button></a>
</body>
</html>
