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

mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = "SELECT * FROM pelanggan";
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<style type="text/css">
.page .card.mb-3 .card-body .table-responsive #dataTable tbody tr td .btn.btn-warning {
	color: #FFF;
}
</style>


<div class="page">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Pelanggan</li>
        <li class="breadcrumb-item active">Data Pelanggan    </li>
    </ol>
    <div class="card mb-3">
        <div class="card-header">
      <i class="fa fa-table"></i> Data Pelanggan </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No Tlp</th>
                  <th>Tgl Entry</th>
                  <th>ID Tarif</th>
                  <th>Tools</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No Tlp</th>
                  <th>Tgl Entry</th>
                  <th>ID Tarif</th>
                  <th>Tools</th>
                </tr>
              </tfoot>
              <tbody>
 				 <?php do { ?>
    				<tr>
      				<td><?php echo $row_Recordset1['pl_id']; ?></td>
      				<td><?php echo $row_Recordset1['pl_nama']; ?></td>
      				<td><?php echo $row_Recordset1['pl_alamat']; ?></td>
      				<td><?php echo $row_Recordset1['pl_telp']; ?></td>
      				<td><?php echo $row_Recordset1['pl_tgl_entry']; ?></td>
      				<td><?php echo $row_Recordset1['tl_id']; ?></td>
              <td>
                <a href="index.php?page=bayar&pl_id=<?php echo $row_Recordset1['pl_id']; ?>&tl_id=<?php echo $row_Recordset1['tl_id'];?>" class='btn btn-success'>CEK</a>
                <a href="index.php?page=edit&pl_id=<?php echo $row_Recordset1['pl_id']; ?>" class='btn btn-warning'>EDIT</a>
                <a href="hapus.php?pl_id=<?php echo $row_Recordset1['pl_id']; ?>" class='btn btn-danger'>HAPUS</a></td>
              </tr>
    			<?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
              </tbody>
            </table>
          </div>
        </div>
</div>
</div>
    <?php
mysql_free_result($Recordset1);
?>
<table width="100%" border="0">
  <tr>
    <td width="50%"><a href="index.php?page=form" class='btn btn-primary btn-block'>Tambah Baru</a></td>
    <td width="50%"><a href="laporan.php" class='btn btn-primary btn-block'>Cetak</a></td>
  </tr>
</table>

