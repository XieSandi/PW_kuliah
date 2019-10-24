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

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_koneksi, $koneksi);
$query_Recordset1 = "SELECT * FROM tarif_listrik";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?>

<div class="page">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tarif</li>
    </ol>
    <div class="card" style="padding:20px">
    <h4>Read This!</h4>
        <p>
            Tarif ditentukan melalui database berdasarkan ketentuan pusat <strong>(PLN)</strong>
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
                  <th>Daya</th>
                  <th>Tarif Normal</th>
                  <th>Max</th>
                  <th>Tarif Lebih</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Daya</th>
                  <th>Tarif Normal</th>
                  <th>Max</th>
                  <th>Tarif Lebih</th>
                </tr>
              </tfoot>
              <tbody>
 				<?php do { ?>
    				<tr>
      				<td><?php echo $row_Recordset1['tl_id']; ?></td>
      				<td><?php echo $row_Recordset1['tl_daya']; ?></td>
      				<td><?php echo $row_Recordset1['tl_tarif']; ?></td>
      				<td><?php echo $row_Recordset1['tl_max']; ?></td>
      				<td><?php echo $row_Recordset1['tl_lebih']; ?></td>
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