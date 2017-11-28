<?php
  session_start();
?>

<!DOCTYPE html>
<HTML>
<head>
<!--<link rel="stylesheet" type="text/css" href="display.css">-->
  <title>My Account</title>
  <h1>My Account</h1>
  <script>
  /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</head>
<style> <?php include 'display.css'; ?> </style>

<body>
<?php
$servername = "dbserver.engr.scu.edu";
$username = 'shu';
$password = 'group2';
$dbname = 'sdb_shu';

$connection = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT * FROM books WHERE user_id ="."'".$_SESSION['user_id']."';";
$result = $connection->query($sql);
?>
  <!--<button type="button" onclick="location.href='createabook.html'"> Select a course </button> -->
  <div id = "welcome">
<!--    Welcome, -->
  </div>
  <div class="add">
  <a href = "createbook.html"><button class = "dropbtn"> Add Books </button> </a>
  </div>
  <!--<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Select a Course</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="createabook.html">Course 1</a>
    <a href="createabook.html">Course 2</a>
    <a href="createabook.html">Course 3</a>
  </div>
  -->
  <div id="logout">
    <button onclick="logout();" type="button" class="logout-btn">Logout</button>
  </div>

<table class = "table-rwd">
 <thead>
   <tr>
     <th>Title</th>
     <th>Author</th>
     <th>Copyright</th>
     <th>Lexile</th>
     <th>Pages</th>
     <th>Recommended</th>
     <th>Topic</th>
     <th>Protagonist Nature</th>
     <th>Secondary Protagonist Nature</th>
     <td colspan = "2">Modify </td>
   </tr>
 </thead>
 <tbody>
 <?php
 while($row=$result->fetch_assoc()){
   echo
     "<tr>
       <td>".htmlspecialchars($row['title'])."</td>
       <td>".htmlspecialchars($row['author'])."</td>
       <td>".htmlspecialchars($row['copyright'])."</td>
       <td>".htmlspecialchars($row['lexile'])."</td>
       <td>".htmlspecialchars($row['pages'])."</td>
       <td>".htmlspecialchars($row['recommended'])."</td>
       <td>".htmlspecialchars($row['topic'])."</td>
       <td>".htmlspecialchars($row['pprotag_n'])."</td>
       <td>".htmlspecialchars($row['sprotag_n'])."</td>
       <td><button id='editbutton' onclick=\"editFunction('".htmlspecialchars($row['title'])."')\">edit</button></a></td>
       <td><button id='deletebutton' onclick=\"deleteFunction('".htmlspecialchars($row['title'])."')\">delete</button></td>
      </tr>";
}

$connection->close();

?>
<script>
    editFunction = function(title) {
        window.location = "editPage.php?title=" + title;
    }
</script>
<script>
    deleteFunction = function(title) {
        window.location = "delete.php?title=" + title;
    }
</script>
</tbody>
</table>
<script src="logout.js"></script>
</body>
</HTML>
