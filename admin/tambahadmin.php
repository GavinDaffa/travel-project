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
                    <li class="list-group-item"><a class="nav-link" href="<?= BASE_ADMIN . '/ruteindex.php' ?>">Rute</a></li>
                    <li class="list-group-item"><a class="nav-link" href="<?= BASE_ADMIN . '/transindex.php' ?>">Transaksi</a></li>
                    <li class="list-group-item active"><a class="nav-link" href="<?= BASE_ADMIN . '/tambahadmin.php' ?>">Tambah Admin</a></li>
                    <li class="list-group-item"><a class="nav-link" href="<?= BASE_URL . '/connect/logout.php' ?>">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="col-4">
            <div class="card w-80" >
                <div class="card-body">
                    <form class="row g-2" method="POST" action="<?= BASE_ADMIN ?>/tambahadmin.php">
                        <!-- username admin -->
                        <div class="col-md-12">
                            <label for="username" class="form-label">Username Admin</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" name="tambah" class="btn btn-pesan btn-success pt-2 pb-2 my-2">Tambah Admin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card w-100">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nomor</th>
                                <th scope="col">Username & Password</th>
                                <th scope="col">Level</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE level = 'admin'");
                        $i = 1;
                        while ($data = mysqli_fetch_object($query)) { ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $data->username; ?></td>
                                <td><?= $data->level; ?></td>
                            </tr>  
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './views/footer.php';?>
<?php
if (isset($_POST['tambah'])) {
    $query = mysqli_query($koneksi, "INSERT INTO user (username,password,level) VALUES ('".$_POST['username']."','".md5($_POST['username'])."','admin')");
    if (!$query) {
        echo 'gagal';
    }else{
        echo '<script type="text/javascript">window.location.href= "tambahadmin.php";</script>';
    }
}
?>