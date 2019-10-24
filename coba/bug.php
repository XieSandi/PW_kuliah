<?php require_once('Connections/koneksi.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE penggunaan SET pl_nama=%s, pl_jkt_ref=%s, pl_alamat=%s, awal=%s, akhir=%s, tl_id=%s, total=%s, jumlah=%s, bayar=%s, kembalian=%s WHERE pl_id=%s",
                       GetSQLValueString($_POST['pl_nama'], "text"),
                       GetSQLValueString($_POST['pl_jkt_ref'], "int"),
                       GetSQLValueString($_POST['pl_alamat'], "text"),
                       GetSQLValueString($_POST['awal'], "int"),
                       GetSQLValueString($_POST['akhir'], "int"),
                       GetSQLValueString($_POST['tl_id'], "int"),
                       GetSQLValueString($_POST['total'], "int"),
                       GetSQLValueString($_POST['jumlah'], "int"),
                       GetSQLValueString($_POST['bayar'], "int"),
                       GetSQLValueString($_POST['kembalian'], "int"),
                       GetSQLValueString($_POST['pl_id'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());
}

mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = "SELECT * FROM penggunaan";
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_GET['tl_id'])) {
  $colname_Recordset2 = $_GET['tl_id'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_Recordset2 = sprintf("SELECT * FROM tarif_listrik WHERE tl_id = %s", GetSQLValueString($colname_Recordset2, "int"));
$Recordset2 = mysql_query($query_Recordset2, $koneksi) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

$colname_Recordset3 = "-1";
if (isset($_GET['pl_id'])) {
  $colname_Recordset3 = $_GET['pl_id'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_Recordset3 = sprintf("SELECT * FROM pelanggan WHERE pl_id = %s", GetSQLValueString($colname_Recordset3, "int"));
$Recordset3 = mysql_query($query_Recordset3, $koneksi) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
#form2 table tr #kepala {
	text-align: center;
	font-family: "Courier New", Courier, monospace;
}
#form2 table tr #kepala2 {
	text-align: center;
	font-weight: bold;
	font-family: Georgia, "Times New Roman", Times, serif;
}
#form2 table tr #strip {
	text-align: center;
}
</style>
</head>

<body onload="javascript : window.print();">
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
<p>&nbsp;</p>
</form>
<form id="form2" name="form2" method="post" action="">
  <table width="360" border="0">
    <tr>
      <td colspan="7" id="kepala2">Coba Payment Point</td>
    </tr>
    <tr>
      <td colspan="7" id="kepala">Terima kasih telah membayar tagihan di Payment Point kami</td>
    </tr>
    <tr>
      <td colspan="7" id="strip">-----------------------------------------------------------------------------------</td>
    </tr>
    <tr>
      <td>Tanggal</td>
      <td>:</td>
      <td><?php echo $row_Recordset3['pl_tgl_entry']; ?></td>
      <td>&nbsp;</td>
      <td>Admin</td>
      <td>:</td>
      <td>Xie</td>
    </tr>
    <tr>
      <td colspan="7" id="strip">-----------------------------------------------------------------------------------</td>
    </tr>
    <tr>
      <td width="25">ID</td>
      <td width="5">:</td>
      <td width="125"><?php echo $row_Recordset1['pl_id']; ?></td>
      <td width="50">&nbsp;</td>
      <td width="25">JKP</td>
      <td width="5">&nbsp;</td>
      <td width="125"><?php echo $row_Recordset1['pl_jkt_ref']; ?></td>
    </tr>
    <tr>
      <td>Nama</td>
      <td>:</td>
      <td colspan="5"><?php echo $row_Recordset1['pl_nama']; ?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>:</td>
      <td colspan="5"><?php echo $row_Recordset1['pl_alamat']; ?></td>
    </tr>
    <tr>
      <td colspan="7" id="strip">-----------------------------------------------------------------------------------</td>
    </tr>
    <tr>
      <td>Kode</td>
      <td>:</td>
      <td><?php echo $row_Recordset1['tl_id']; ?></td>
      <td>&nbsp;</td>
      <td>Meter</td>
      <td>:</td>
      <td><?php echo $row_Recordset1['total']; ?> kw/h</td>
    </tr>
    <tr>
      <td>Daya</td>
      <td>:</td>
      <td><?php echo $row_Recordset2['tl_daya']; ?> kw/h</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="7" id="strip">-----------------------------------------------------------------------------------</td>
    </tr>
    <tr>
      <td>Total</td>
      <td>:</td>
      <td>Rp <?php echo $row_Recordset1['jumlah']; ?>,-</td>
      <td>&nbsp;</td>
      <td>Bayar</td>
      <td>:</td>
      <td>Rp <?php echo $row_Recordset1['bayar']; ?>,-</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>Kembali</td>
      <td>:</td>
      <td>Rp <?php echo $row_Recordset1['kembalian']; ?>,-</td>
    </tr>
    <tr>
      <td colspan="7" id="strip">-----------------------------------------------------------------------------------</td>
    </tr>
    <tr>
      <td colspan="7" id="kepala">Harap simpan struk ini sebagai bukti pembayaran!</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($Recordset3);
?>
