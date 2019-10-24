<?php
	include 'koneksi.php';
	$npm =$_GET["npm"];
    mysqli_query($koneksi,"delete from mhs where npm=$npm");
	header("location:index3.php");
?>