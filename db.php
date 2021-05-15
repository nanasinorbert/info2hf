<?php 
function opendb(){
	$link = mysqli_connect("localhost", "root", "") or die("Connection error" .mysqli_error($link));
	mysqli_select_db($link, "info2hf");
	mysqli_query($link, "set character_set_results='utf-8'");
	return $link;
}
?>