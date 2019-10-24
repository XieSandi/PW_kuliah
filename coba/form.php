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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO pelanggan ( pl_nama, pl_alamat, pl_telp, pl_jkt_ref, pl_tgl_entry, tl_id) VALUES ( %s, %s, %s, %s, %s, %s)",
                       //GetSQLValueString($_POST['pl_id'], "int"),
                       GetSQLValueString($_POST['pl_nama'], "text"),
                       GetSQLValueString($_POST['pl_alamat'], "text"),
                       GetSQLValueString($_POST['pl_telp'], "text"),
                       GetSQLValueString($_POST['pl_jkt_ref'], "int"),
                       GetSQLValueString($_POST['pl_tgl_entry'], "date"),
                       GetSQLValueString($_POST['tl_id'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());

  //$insertGoTo = "coba2.php?" . $row_Recordset1[''] . "=" . $row_Recordset1[''] . "";
  //if (isset($_SERVER['QUERY_STRING'])) {
    //$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    //$insertGoTo .= $_SERVER['QUERY_STRING'];
  //}
  //header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = "SELECT * FROM pelanggan";
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>


<div class="page">
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Pelanggan</li>
        <li class="breadcrumb-item active">Pelanggan Baru</li>
    </ol>
        <form action="<?php echo $editFormAction; ?>" method="POST" id="form1" name="form1" role="form" class="form-horizontal">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Nama</label>
                <input class="form-control" name="pl_nama" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Masukan Nama">
              </div>
              <div class="col-md-6">
                <label for="exampleInputjkp">Kode JKP</label>
                <input class="form-control" name="pl_jkt_ref" id="exampleInputjkp" type="text" aria-describedby="jkpHelp" placeholder="Masukan Kode JKP">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="alamat">Alamat</label>
                <input class="form-control" name="pl_alamat" id="alamat" type="text"  placeholder="Masukan Alamat">
              </div>
          <div class="col-md-6">
            <label for="tgl">Tgl Entry</label>
            <input class="form-control" name="pl_tgl_entry" type="date" id="tgl">
          </div>
          </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">No Tlp</label>
                <input class="form-control" name="pl_telp" id="exampleInputtlp" type="number" placeholder="Masukan No Telp">
              </div>
              <div class="col-md-6">
              <label for="kode">Kode tarif</label>
                  <?php 
        					include 'Connections/koneksi.php';
              echo "<select name='tl_id' class='form-control' id='kode' >";
              $id_query="SELECT tl_id , tl_daya from tarif_listrik";
              $id=mysql_query($id_query) or die (mysql_error());
                while
              ($data=mysql_fetch_object($id)){
                echo "<option value='$data->tl_id'>$data->tl_id . $data->tl_daya kw/h </option>";
              }
        				 							echo "</select>";
        			?>
              </div>
            </div>              
            
          </div>
          <br>
          <button type="submit" class="btn btn-primary btn-block" name="MM_insert" value="form1">
            Input  
          </button>
        </form>
</div>

<?php
mysql_free_result($Recordset1);
?>