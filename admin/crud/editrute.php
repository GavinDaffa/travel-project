<?php 
include '../../connect/koneksi.php'; 
include '../views/header.php';
if (empty($_SESSION['username'])) {
    header('location: ../../authadmin/');
}
?>

<div class="container-fluid mt-5">
    <h1>Halaman Edit Rute</h1>
    <div class="row">
        <div class="col-2">
            <div class="card">
                <div class="card-header">
                    <a class="nav-link" href="<?= BASE_ADMIN . '/dashboard.php' ?>">Dashboard</a>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a class="nav-link" href="<?= BASE_ADMIN . '/ruteindex.php' ?>">Rute</a></li>
                    <li class="list-group-item"><a class="nav-link" href="<?= BASE_ADMIN . '/transindex.php' ?>">Transaksi</a></li>
                    <li class="list-group-item"><a class="nav-link" href="<?= BASE_URL . '/connect/logout.php' ?>">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="col-10">
            <div class="card w-80" >
                <div class="card-body">
                    <form class="row g-2" method="POST" action="<?= BASE_ADMIN . '/crud/editrute.php'; ?>">
                        
                        <?php
                        $id_rute = $_GET['rute_id'];
                        $query = mysqli_query($koneksi,"SELECT * FROM rute WHERE id_rute = '$id_rute'");
                        while ($detailCust = mysqli_fetch_object($query)) { ?>
                        <div class="col-sm-4">
                            <input type="hidden" name="idrute" value="<?= $detailCust->id_rute; ?>">
                            <label for="nama_rute" class="form-label">Nama Lengkap Pemesan</label>
                            <input type="text" class="form-control" name="nama_rute" id="nama_rute" value="<?= $detailCust->nama_rute; ?>">
                        </div>
                        <!-- harga -->
                        <div class="col-sm-4">
                            <label for="email" class="form-label">Harga Tiket</label>
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $detailCust->harga_rute; ?>">
                        </div>
                        <!-- kapasitas -->
                        <div class="col-sm-4">
                            <label for="kapasitas" class="form-label">Kapasitas</label>
                            <input type="text" class="form-control" id="kapasitas" name="kapasitas" value="<?= $detailCust->kapasitas; ?>">
                        </div>
                        <!-- status -->
                        <div class="col-sm-4">
                            <label for="status" class="form-label">Status Rute</label><br>
                            <?php if ($detailCust->status == 'ada') { ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="ada" value="ada" checked>
                                    <label class="form-check-label" for="ada">Ada</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="tidak" value="tidak">
                                    <label class="form-check-label" for="tidak">Tidak</label>
                                </div>
                            <?php } else { ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="ada" value="ada">
                                    <label class="form-check-label" for="ada">Ada</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="tidak" value="tidak" checked>
                                    <label class="form-check-label" for="tidak">Tidak</label>
                                </div>
                            <?php } ?>
                        </div>
                        <?php } ?>

                        <div class="col-sm-12">
                            <button type="submit" name="edit" class="btn btn-pesan btn-success pt-2 pb-2 my-2">Edit Rute</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// cek apakah button dengan name edit sudah di klik
if (isset($_POST['edit'])) {
    $id_rute        = $_POST['idrute'];
    $nama           = $_POST['nama_rute'];
    $harga          = $_POST['harga'];
    $kapasitas      = $_POST['kapasitas'];
    $status         = $_POST['status'];

    // query database update
    $query  = mysqli_query($koneksi,"UPDATE rute SET nama_rute = '$nama', harga_rute = '$harga' ,kapasitas = '$kapasitas' , status = '$status' WHERE id_rute = $id_rute");
    if (!$query) {
        echo "gagal";
    }else{
        header('location: ./../ruteindex.php');
    }
}
?>

<?php include '../views/footer.php';?>