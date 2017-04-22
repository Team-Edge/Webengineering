<?php
	var_dump($_GET);
	$text = substr($_GET['text'], 8);
	include("../../zugriffWE.php");
	if ($mysqli->connect_error) {
		$message['error'] = 'Datenbankverbindung fehlgeschlagen: ' . $mysqli->connect_error;
	}
	$stmt="DELETE FROM Bilder WHERE Image_URL=".'"'.$text.'"';
	echo $stmt;
	$mysqli->query($stmt);
	$mysqli->close();
?>