<?php
include '../connection.php';
if (isset($_GET['del'])) {
	$id=$_GET['del'];
	$sql="DELETE FROM student WHERE id=$id";
	$res=mysqli_query($link,$sql);
	echo"<script>window.location='teachers.php'</script>";
	# code...
}
?>