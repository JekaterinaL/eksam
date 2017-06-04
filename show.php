<?php
	$host = "localhost";
	$user = "test";
	$pass = "t3st3r123";
	$db = "test";
	$link = mysqli_connect($host, $user, $pass, $db) or die("Ei saa ühendust mootoriga- ".mysqli_error());
	
	mysqli_query($link, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($link));
	
	$sql="SELECT * FROM 10163487_komment";
	$result = mysqli_query($link, $sql);
	
	while($rows = mysqli_fetch_array($result)) {
		echo "<br/>";
		echo (htmlspecialchars($rows['id']));
		echo " - ";
		echo (htmlspecialchars($rows['kommentaar']));
	}

?>