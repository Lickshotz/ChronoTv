
<?php
    if(!$_SESSION['logged_in'])
            header("Location: index.php");

	$servername = '172.19.0.1';
	$username = 'user';
	$password = 'test';
	$db_name = 'myDb';

// Create connection
$con = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if (!$con) {
    die('Verbindung nicht möglich : ' . mysqli_error());
}



?>
