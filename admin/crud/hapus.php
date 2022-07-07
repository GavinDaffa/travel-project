<?php
include '../../connect/koneksi.php'; 

// jika URL tidak ada ?[cust]= dan ?[rute]= dan ?[trans]= maka kembali ke dashboard
if (empty($_GET['rute']) && empty($_GET['trans'])) {
    header('location: ../dashboard.php');
}



// GET URL rute & delete
$id_rute = $_GET['rute'];
$queryRute = mysqli_query($koneksi,"DELETE FROM rute WHERE id_rute = $id_rute");
if (!$queryRute) {
    echo "gagal";
}else{
    header('location: ../ruteindex.php');
}

// GET URL transaksi & delete
$id_trans = $_GET['trans'];
$queryTrans = mysqli_query($koneksi,"DELETE FROM transaksi WHERE id_trans = $id_trans");
if (!$queryTrans) {
    echo "gagal";
}else{
    header('location: ../transindex.php');
}
?>