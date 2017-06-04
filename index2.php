<?php
session_start();

	$host = "localhost";
	$user = "test";
	$pass = "t3st3r123";
	$db = "test";
	$link = mysqli_connect($host, $user, $pass, $db) or die("Ei saa ühendust mootoriga- ".mysqli_error());
	
	mysqli_query($link, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($link));

	$m2rkmed = array();
	$sql = "SELECT * FROM 10163487_komment";
	$result = mysqli_query($link, $sql);
	$ridu = mysqli_num_rows($result);
	for ($i = 0; $i < $ridu; $i++){
		$m2rkmed[] = mysqli_fetch_assoc($result);
	}


	if (isset($_GET['lisa'])){
		$tekst = mysqli_real_escape_string($link, $_POST['tekst']);
		
		$sql = "INSERT INTO 10163487_komment (id, kommentaar) VALUES (NULL, '$tekst')";
		$result = mysqli_query($link, $sql);

	}

	if (isset($_GET['muuda'])){
		$ids = array();
		foreach($_POST['id'] as $id){
			$ids[] = mysqli_real_escape_string($link, $id);
		}
		$tekst = mysqli_real_escape_string($link, $_POST['tekst']);
		$sql = "UPDATE 10163487_komment SET kommentaar = $tekst WHERE id in (".implode(',', $ids).")";
		$result = mysqli_query($link, $sql);

	}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Märkmik</title>
	<style type="text/css">
	
	</style>
</head>
<body>

<table>
<tr>
	<th>Märkmed</th>
	<th><form id="muutmine" action="?muuda" method="POST"><input type="submit" value="muuda"/></form></th>
</tr>
<?php if (!empty($m2rkmed)):
	foreach($m2rkmed as $id => $m2rge):
?>
<tr>
	<td><?php echo htmlspecialchars($m2rge['kommentaar']); ?></td>
	<td><input type="checkbox" name="id[]" value="<?php echo htmlspecialchars($m2rge['id']); ?>" form="muutmine"/></td>
</tr> 
<?php endforeach;
endif;
?>
<tr>
<td><input type="text" name="tekst" form="lisamine"/></td>
<td><form id="muutmine" action="?lisa" method="POST"><input type="submit" value="lisa"/></form></td>
</tr>
</table>
</body>
</html>
