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
$query_Recordset1 = "SELECT * FROM penggunaan";
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>


<div class="page">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Transaksi</li>
    </ol>
    <div class="card" style="padding:20px">
    <h4>Read This!</h4>
        <p>
            Berikut adalah data transaksi pembayaran tagihan listrik pada bulan : <strong>April 2018</strong><br>
            Untuk menambahkan data transaksi silahkan menuju halaman anggota , untuk mengecek dan menghitung biaya.
        </p>
    </div>

    <br>

    <div class="card mb-3">
        <div class="card-header">
      <i class="fa fa-table"></i> Data Tarif </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>JKP REF</th>
                    <th>Alamat</th>
                    <th>Kode Tarif</th>
                    <th>Meter Awal</th>
                    <th>Meter Akhir</th>
                    <th>Total Meter</th>
                    <th>Jumalah Bayar</th>
                    <th>Tools</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>JKP REF</th>
                    <th>Alamat</th>
                    <th>Kode Tarif</th>
                    <th>Meter Awal</th>
                    <th>Meter Akhir</th>
                    <th>Total Meter</th>
                    <th>Jumalah Bayar</th>
                    <th>Tools</th>
                </tr>
              </tfoot>
              <tbody>
 				<?php do { ?>
    				<tr>
      				<td><?php echo $row_Recordset1['pl_id']; ?></td>
      				<td><?php echo $row_Recordset1['pl_nama']; ?></td>
      				<td><?php echo $row_Recordset1['pl_jkt_ref']; ?></td>
      				<td><?php echo $row_Recordset1['pl_alamat']; ?></td>
      				<td><?php echo $row_Recordset1['tl_id']; ?></td>
                    <td><?php echo $row_Recordset1['awal']; ?></td>
                    <td><?php echo $row_Recordset1['akhir']; ?></td>
                    <td><?php echo $row_Recordset1['total']; ?></td>
                    <td><?php echo $row_Recordset1['jumlah']; ?></td>
                    <td><a href="bug.php?pl_id=<?php echo $row_Recordset1['pl_id']; ?>&tl_id=<?php echo $row_Recordset1['tl_id'];?>">Struk</a></tr>
    			<?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
              </tbody>
            </table>
          </div>
        </div>
<a href="cetak.php" class='btn btn-primary btn-block'>Cetak</a>
</div>
</div>
    <?php
mysql_free_result($Recordset1);
?>