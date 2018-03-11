<?php
	$servername = "localhost";
	$username = "root";
	$password = "chronotv";
	$db_name = 'chronoTv';

// Create connection
$conn = mysql_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die('Verbindung nicht möglich : ' . mysql_error());
}


// benutze Datenbank foo
$db_selected = mysql_select_db($db_name, $conn);
if (!$db_selected) {
    die ('Kann Datenbank nicht benutzen : ' . mysql_error());
}
?>