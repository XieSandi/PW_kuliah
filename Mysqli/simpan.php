<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$npm = $_POST['npm'];
$nama_mhs = $_POST['nama_mhs'];
$jurusan = $_POST['jurusan'];
$kelas = $_POST['kelas']; 
// menginput data ke database
mysqli_query($koneksi,"insert into mhs values('$npm','$nama_mhs','$jurusan','$kelas')");
 
// mengalihkan halaman kembali ke index.php
header("location:index3.php");
 
?>