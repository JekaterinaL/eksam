<!DOCTYPE html>
<html>
<head>
	<title>Märkmik</title>
	<meta charset="utf-8">
</head>

<body>

<form method="POST" action="write.php">
	<h3>Märkmete lisamine:</h3>
	<p><textarea name="text" cols="40" rows="3"></textarea></p>
	<p><input type="submit" value="Lisa"></p>
</form>

<h3>Märkmed:</h3>
<?php include 'show.php'?>
<form method="POST" action="change.php">
	<p><textarea name="text" cols="40" rows="3"></textarea></p>
	<p><input type="submit" value="Muuda"></p>
</form>

</body>
</html>