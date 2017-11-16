<?php
	session_start();
	if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
		session_unset();
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=homepage.html">';
		session_destroy();
        
	}
?>
