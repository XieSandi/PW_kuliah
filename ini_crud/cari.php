<?php
include("koneksi.php");
$query="select * FROM mhs WHERE npm='".$_POST["npm"]."'";
$hasil=mysql_query($query);
$jumlah=mysql_num_rows($hasil);
echo"<table border='1' cellspacing='0' cellpadding='2' width='60%'>
<tr> 
<td width='5%' align='center'>npm</td>
<td width='20%' align='center'>nama_mhs</td>
<td width='30%' align='center'>jurusan</td>
<td width='20%' align='center'>kelas</td>
</tr>";
if($jumlah<>0) {
$i=1;
while($data=mysql_fetch_array($hasil))
{
echo"<tr>
<td>$data[0]</td>
<td>$data[1]</td>
<td>$data[2]</td>
<td>$data[3]</td>
<td>[<a href='ubah.php?id=$data[0]'>ubah</a>]&nbsp;
[<a href='hapus.php?id=&data[0]'>hapus</a></td>
</tr>";
$i++;
} echo"<br>[<a href='index2.php'>kembali ke view data</a>&nbsp;";
}
else {
echo"<tr><td colspan='5' align='center'> data tidak ditemukan</tr>";
}
echo"</table>";
?>