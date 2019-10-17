<?php 
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$npm = $_POST['npm'];
$nama_mhs = $_POST['nama_mhs'];
$jurusan = $_POST['jurusan'];
$kelas = $_POST['kelas'];

// update data ke database
mysqli_query($koneksi,"update mhs set nama_mhs='$nama_mhs', jurusan='$jurusan', kelas='$kelas' WHERE npm='$npm'");

// mengalihkan halaman kembali ke index.php
header("location:index2.php");

?>