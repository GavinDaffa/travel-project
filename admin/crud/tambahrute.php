<?php 
include '../../connect/koneksi.php'; 
include '../views/header.php';
if (empty($_SESSION['username'])) {
    header('location: ../../authadmin/');
}
?>

<div class="container-fluid mt-5">
    <h1>Halaman Tambah Rute</h1>
    <div class="row">
        <div class="col-2">
            <div class="card">
                <div class="card-header">
                    <a class="nav-link" href="<?= BASE_ADMIN . '/dashboard.php' ?>">Dashboard</a>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item active"><a class="nav-link" href="<?= BASE_ADMIN . '/ruteindex.php' ?>">Rute</a></li>
                    <li class="list-group-item"><a class="nav-link" href="<?= BASE_ADMIN . '/transindex.php' ?>">Transaksi</a></li>
                    <li class="list-group-item"><a class="nav-link" href="<?= BASE_URL . '/connect/logout.php' ?>">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="col-10">
            <div class="card w-80" >
                <div class="card-body">
                    <form class="row g-2" method="POST" action="<?= BASE_ADMIN . '/crud/tambahrute.php'; ?>" enctype="multipart/form-data">
                        <!-- nama rute -->
                        <div class="col-sm-6">
                            <label for="nama_rute" class="form-label">Nama Rute</label>
                            <input type="text" class="form-control" name="nama_rute" id="nama_rute" placeholder="cth. Surabaya - Bandung">
                        </div>
                        <!-- harga rute -->
                        <div class="col-sm-6">
                            <label for="harga_rute" class="form-label">Harga Rute</label>
                            <input type="number" class="form-control" name="harga_rute" id="harga_rute" placeholder="55000">
                        </div>
                        <!-- foto -->
                        <div class="col-sm-12">
                            <label for="gambar" class="form-label">Upload Foto</label>
                            <input class="form-control" type="file" name="file" id="gambar">
                        </div>
                        <!-- kapasitas -->
                        <div class="col-sm-12">
                            <label for="kapasitas" class="form-label">Kapasitas Rute</label>
                            <input type="number" class="form-control" name="kapasitas" id="kapasitas" min="1" placeholder="0">
                        </div>
                        <!-- status rute -->
                        <div class="col-sm-4">
                            <label for="status_rute" class="form-label">Status Rute</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_rute" id="ada" value="ada">
                                <label class="form-check-label" for="ada">Ada</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_rute" id="tidak" value="tidak">
                                <label class="form-check-label" for="tidak">Tidak</label>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <button type="submit" name="tambah" class="btn btn-pesan btn-success pt-2 pb-2 my-2">Tambah Rute</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// cek apakah button dengan name tambah sudah di klik
if (isset($_POST['tambah'])) {
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);
    $nama_rute      = $_POST['nama_rute'];
    $harga_rute     = $_POST['harga_rute'];
    $kapasitas      = $_POST['kapasitas'];
    $status         = $_POST['status_rute'];
    
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
    $namaFoto = $_FILES['file']['name'];
    $x = explode('.', $nama_rute);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    
    if ($ukuran < 1044070) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], '../../gallery/' . $_FILES["file"]["name"])) {
            $query =    mysqli_query($koneksi,"INSERT INTO rute (`nama_rute`, `harga_rute`, `foto`, `kapasitas`, `status`) VALUES ('$nama_rute','$harga_rute','$namaFoto' ,'$kapasitas', '$status')");
            if ($query) {
                echo '<script type="text/javascript">window.location.href= "tambahrute.php";</script>';
            } else {
                echo 'Data gagal tersimpan';
            }
        }else{
            echo "gagal";
        }
        
    } else {echo '<script type="text/javascript">alert("Ukuran file terlalu besar");window.location.href= "index.php";</script>';
    }
}

?>

<?php include '../views/footer.php';?>