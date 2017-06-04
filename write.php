<?php


$host = "localhost";
$user = "test";
$pass = "t3st3r123";
$db = "test";
$link = mysqli_connect($host, $user, $pass, $db) or die("Ei saa ühendust mootoriga- ".mysqli_error());
	
mysqli_query($link, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($link));


$tekst = mysqli_real_escape_string($link, $_POST['text']);

$query = "INSERT INTO 10163487_komment (id, kommentaar) VALUES (NULL, '$tekst')";

$result = mysqli_query($link, $query);

echo mysqli_error($link);
header("Location: index.php");

?>