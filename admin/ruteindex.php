<?php 
include '../connect/koneksi.php';
include './views/header.php';
if (empty($_SESSION['username'])) {
    header('location: ../authadmin/');
}
?>

<div class="container-fluid mt-5">
    <h1>Halaman Rute</h1>
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
            <div class="card w-100 border-0" >
                <div class="card-body">
                    <a href="<?= BASE_ADMIN . '/crud/tambahrute.php'; ?>" class="btn btn-primary btn-md mb-2">Tambah Rute</a>
                    <table class="table table-striped">
                        <thead class="table-dark"> 
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Rute</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Kapasitas</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM rute");
                                $i = 1;
                                while ($data = mysqli_fetch_object($query)) { ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $data->nama_rute; ?></td>
                                <td>Rp. <?= $data->harga_rute; ?></td>
                                <td>
                                    <div class="text-center">
                                        <img src="<?= BASE_URL . '/gallery/'. $data->foto; ?>" style="width:100px;height:100px;" class="rounded">
                                    </div>
                                </td>
                                <td><?= $data->kapasitas; ?> Orang</td>
                                <td><?= $data->status; ?></td>
                                <td>
                                    <a href="<?= BASE_ADMIN . '/crud/editrute.php?rute_id=' . $data->id_rute; ?>" class="text-decoration-none">Edit </a> |
                                    <a href="<?= BASE_ADMIN . '/crud/hapus.php?rute=' . $data->id_rute; ?>" class="text-decoration-none">Hapus</a>
                                </td>
                            </tr>
                                <?php }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './views/footer.php';?>