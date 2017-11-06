<?php
    // A simple PHP script demonstrating how to connect to MySQL.
    // Press the 'Run' button on the top to start the web server,
    // then click the URL that is emitted to the Output tab of the console.

    $servername = "dbserver.engr.scu.edu";
    $username = "shu";
    $password = "group2";
    $database = "sdb_shu";

    // Create connection
    $db = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    //echo "Connected successfully (".$db->host_info.")";

    $booktitle = $_POST["title"];
    $authorfirstname = $_POST["author_f"];
    $authorlastname = $_POST["author_l"];
    $copyrightdate = $_POST["copyright"];
    $lexilelevel = $_POST["lexile"];
    $numberofpages = $_POST["pages"];
    $boolrecommended = $_POST["recommended"];
    $booktopic = $_POST["topic"];
    $bookpprotag_n = $_POST["pprotag_n"];
    $booksprotag_n = $_POST["sprotag_n"];

    //echo($booktitle);
    //echo($authorfirstname);
    //echo($authorlastname);
    //echo($copyrightdate);
    //echo($lexilelevel);
    //echo($lexilelevel);
    //echo($numberofpages);
    //echo($boolrecommended);
    //echo($booktopic);
    //echo($bookpprotag_n);
    //echo($booksprotag_n);







    $sql = "INSERT INTO books(title, author_f, author_l, copyright, lexile, pages, recommended, topic, pprotag_n, sprotag_n) VALUES ('" .$booktitle. "', '" .$authorfirstname. "','" .$authorlastname. "','" .$copyrightdate."','".$lexilelevel."','".$numberofpages."','".$boolrecommended."','".$booktopic."','".$bookpprotag_n."','".$booksprotag_n."')";
    //echo($sql);

    if ($db->query($sql) === TRUE) {
        echo '<script>alert("You have successfully added a book");</script>';
        $db->close();
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=accountpage.php">';
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    $db->close();
    ?>
