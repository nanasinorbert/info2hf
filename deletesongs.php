<?php 
include 'db.php';
if(isset($_GET['id'])){
	$link = opendb();
	$id = $_GET['id'];
	
	$query = "DELETE FROM songs WHERE id=" . mysqli_real_escape_string($link, $id);
	mysqli_query($link, $query);
	mysqli_close($link); 
}
header("Location: songs.php");
?>