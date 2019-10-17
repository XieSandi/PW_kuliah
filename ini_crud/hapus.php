<?
include("koneksi.php");
$query="DELETE FROM mhs WHERE npm='".$_GET["npm"]."'";
$hasil=mysql_query($query);
if($hasil)
{
echo"data suskes dihapus<br>";
echo"[<a href="index2.php">view data</a>]&nbsp;";
}
else
{
echo"data gagal dihapus<br>";
echo"[<a href='index2.php'>view data</a>]&nbsp;";
}
?>