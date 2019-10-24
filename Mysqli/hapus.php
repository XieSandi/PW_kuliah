<?php
	include 'koneksi.php';
	$id =$_GET["id"];
    mysqli_query($koneksi,"delete from mhs where npm=$id");
	header("location:index3.php");
?>