<?php
include 'db.php';
if (isset($_GET['id'])) {
	$link = opendb();
	$id = $_GET['id'];
	$query2 = "UPDATE songs SET Artists_id=null WHERE Artists_id=". mysqli_real_escape_string($link, $id);
	mysqli_query($link, $query2);
	$query = "DELETE FROM artists WHERE id=" . mysqli_real_escape_string($link, $id);
	mysqli_query($link, $query);
	mysqli_close($link);
}

header("Location: artists.php");
?>