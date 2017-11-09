<?php
  session_start();
?>

<!DOCTYPE html>
<HTML>
<head>
<link rel="stylesheet" type="text/css" href="display.css"/>

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
<style>
/* Dropdown Button */
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}

table, th, td {
    border: 1px solid black;
}

</style>
<body>
  <!--<button type="button" onclick="location.href='createabook.html'"> Select a course </button> -->
  <div>
    Welcome!
  </div>
  <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Select a Course</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="createabook.html">Course 1</a>
    <a href="createabook.html">Course 2</a>
    <a href="createabook.html">Course 3</a>
  </div>
  <a href = "createbook.html"><button> Add Books </button> </a>
</div>
<?php
$servername = "dbserver.engr.scu.edu";
$username = 'shu';
$password = 'group2';
$dbname = 'sdb_shu';

$connection = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT * FROM books";
$result = $connection->query($sql);
?>

<table class = "table">
 <thead>
   <tr>
     <th>Title</th>
     <th>Author First Name</th>
     <th>Author Last Name</th>
     <th>Copyright</th>
     <th>Lexile</th>
     <th>Pages</th>
     <th>Recommended</th>
     <th>Topic</th>
     <th>Protagonist Nature</th>
     <th>Secondary Protagonist Nature</th>
   </tr>
 </thead>
 <tbody>
 <?php
 while($row=$result->fetch_assoc()){
   echo
     "<tr>
       <td>"$connection->real_escape_string(.$row['title'].)"</td>
       <td>".$row['author_f']."</td>
       <td>".$row['author_l']."</td>
       <td>".$row['copyright']."</td>
       <td>".$row['lexile']."</td>
       <td>".$row['pages']."</td>
       <td>".$row['recommended']."</td>
       <td>".$row['topic']."</td>
       <td>".$row['pprotag_n']."</td>
       <td>".$row['sprotag_n']."</td>
       <td><a href=\"editPage.html\"><button>edit</button></a></td>
       <td><button>delete</button></td>
      </tr>";
}

$connection->close();

?>
</tbody>
</table>
</body>
</HTML>
