<?php require_once('Connections/konek.php'); ?>
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

$maxRows_apalah = 10;
$pageNum_apalah = 0;
if (isset($_GET['pageNum_apalah'])) {
  $pageNum_apalah = $_GET['pageNum_apalah'];
}
$startRow_apalah = $pageNum_apalah * $maxRows_apalah;

mysql_select_db($database_konek, $konek);
$query_apalah = "SELECT * FROM b";
$query_limit_apalah = sprintf("%s LIMIT %d, %d", $query_apalah, $startRow_apalah, $maxRows_apalah);
$apalah = mysql_query($query_limit_apalah, $konek) or die(mysql_error());
$row_apalah = mysql_fetch_assoc($apalah);

if (isset($_GET['totalRows_apalah'])) {
  $totalRows_apalah = $_GET['totalRows_apalah'];
} else {
  $all_apalah = mysql_query($query_apalah);
  $totalRows_apalah = mysql_num_rows($all_apalah);
}
$totalPages_apalah = ceil($totalRows_apalah/$maxRows_apalah)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table border="1">
  <tr>
    <td>c</td>
    <td>d</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_apalah['c']; ?></td>
      <td><?php echo $row_apalah['d']; ?></td>
    </tr>
    <?php } while ($row_apalah = mysql_fetch_assoc($apalah)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($apalah);
?>
