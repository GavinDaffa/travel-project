<?php 
include '../connect/koneksi.php';
include './views/header.php';
if (empty($_SESSION['username'])) {
    header('location: ../authadmin/');
}
?>

<div class="container-fluid mt-5">
    <h1>Halaman Transaksi</h1>
    <div class="row">
        <div class="col-2">
            <div class="card">
                <div class="card-header">
                    <a class="nav-link" href="<?= BASE_ADMIN . '/dashboard.php' ?>">Dashboard</a>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a class="nav-link" href="<?= BASE_ADMIN . '/ruteindex.php' ?>">Rute</a></li>
                    <li class="list-group-item active"><a class="nav-link" href="<?= BASE_ADMIN . '/transindex.php' ?>">Transaksi</a></li>
                    <li class="list-group-item"><a class="nav-link" href="<?= BASE_URL . '/connect/logout.php' ?>">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="col-10">
            <div class="card w-100 border-0" style="height:250px">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="table-dark"> 
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Rute</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Telepon</th>
                                <th scope="col">Email</th>
                                <th scope="col">Orang</th>
                                <th scope="col">Berangkat</th>
                                <th scope="col">Kembali</th>
                                <th scope="col">Total Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $q = mysqli_query($koneksi,"SELECT r.nama_lengkap, r.jeniskelamin, r.telepon, r.email, rute.nama_rute, r.jumlah_orang, r.tgl_berangkat, r.tgl_kembali, r.biaya FROM reservasi as r INNER JOIN rute ON rute.id_rute = r.id_rute");
                                $i = 1;
                                while ($data = mysqli_fetch_object($q)) { ?>
                                
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $data->nama_lengkap; ?></td>
                                <td><?= $data->nama_rute; ?></td>
                                <td><?= $data->jeniskelamin; ?></td>
                                <td><?= $data->telepon; ?></td>
                                <td><?= $data->email; ?></td>
                                <td><?= $data->jumlah_orang; ?></td>
                                <td><?= $data->tgl_berangkat; ?></td>
                                <td><?= $data->tgl_kembali; ?></td>
                                <td><?= $data->biaya; ?></td>
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