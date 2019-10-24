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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE pelanggan SET pl_nama=%s, pl_alamat=%s, pl_telp=%s, pl_jkt_ref=%s, pl_tgl_entry=%s, tl_id=%s WHERE pl_id=%s",
                       GetSQLValueString($_POST['pl_nama'], "text"),
                       GetSQLValueString($_POST['pl_alamat'], "text"),
                       GetSQLValueString($_POST['pl_telp'], "text"),
                       GetSQLValueString($_POST['pl_jkt_ref'], "int"),
                       GetSQLValueString($_POST['pl_tgl_entry'], "date"),
                       GetSQLValueString($_POST['tl_id'], "int"),
                       GetSQLValueString($_POST['pl_id'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());
}

$colname_Recordset1 = "-1";
if (isset($_GET['pl_id'])) {
  $colname_Recordset1 = $_GET['pl_id'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = sprintf("SELECT * FROM pelanggan WHERE pl_id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_free_result($Recordset1);
?>

<div class="page">
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Pelanggan</li>
        <li class="breadcrumb-item active">Edit Pelanggan</li>
    </ol>
        <form action="<?php echo $editFormAction; ?>" method="POST" id="form1" name="form1" role="form" class="form-horizontal">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Nama</label>
                <input class="form-control" name="pl_nama" value="<?php echo htmlentities($row_Recordset1['pl_nama'], ENT_COMPAT, ''); ?>" id="exampleInputName" type="text" aria-describedby="nameHelp" >
              </div>
              <div class="col-md-6">
                <label for="exampleInputjkp">Kode JKP</label>
                <input class="form-control" name="pl_jkt_ref" value="<?php echo htmlentities($row_Recordset1['pl_jkt_ref'], ENT_COMPAT, ''); ?>" id="exampleInputjkp" type="text" aria-describedby="jkpHelp" >
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="alamat">Alamat</label>
                <input class="form-control" name="pl_alamat" value="<?php echo htmlentities($row_Recordset1['pl_alamat'], ENT_COMPAT, ''); ?>" id="alamat" type="text"  >
              </div>
          <div class="col-md-6">
            <label for="tgl">Tgl Entry</label>
            <input class="form-control" name="pl_tgl_entry" value="<?php echo htmlentities($row_Recordset1['pl_tgl_entry'], ENT_COMPAT, ''); ?>" type="date" id="tgl">
          </div>
          </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">No Tlp</label>
                <input class="form-control" name="pl_telp" id="exampleInputtlp" type="number" value="<?php echo htmlentities($row_Recordset1['pl_telp'], ENT_COMPAT, ''); ?>" >
              </div>
              <div class="col-md-6">
              <label for="kode">Kode tarif</label>
                  <select name="tl_id" value="<?php echo htmlentities($row_Recordset1['tl_id'], ENT_COMPAT, ''); ?>" class="form-control" id="kode">
                    <option value="1">1. 900 kw/h</option>
                    <option value="2">2. 1200 kw/h</option>
                  </select>
              </div>
            </div>              
            
          </div>
          <br>
          <button type="submit" class="btn btn-primary btn-block" name="MM_insert" value="MM_update">
            Input  
          </button>
            <input type="hidden" name="MM_update" value="form1" />
            <input type="hidden" name="pl_id" value="<?php echo $row_Recordset1['pl_id']; ?>" />
        </form>
</div>