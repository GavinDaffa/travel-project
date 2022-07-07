<?php 
include '../connect/koneksi.php';
include './views/header.php';

if (empty($_SESSION['username'])) {
    header('location: ../authadmin/');
}
?>


<div class="container-fluid mt-5">
    <h1>Halaman Dashboard</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-header bg-primary">
                    <a class="nav-link text-white" href="<?= BASE_ADMIN . '/dashboard.php' ?>">Dashboard</a>
                </div>
                <ul class="list-group list-group-flush">    
                    <li class="list-group-item"><a class="nav-link" href="<?= BASE_ADMIN . '/ruteindex.php' ?>">Rute</a></li>
                    <li class="list-group-item"><a class="nav-link" href="<?= BASE_ADMIN . '/transindex.php' ?>">Transaksi</a></li>
                    <li class="list-group-item"><a class="nav-link" href="<?= BASE_URL . '/connect/logout.php' ?>">Logout</a></li>
                </ul>
            </div>
        </div>
    <div class="col-md-9">
        <div class="card w-100" style="height:250px">
            <div class="card-body">
                <h5 class="card-title">Selamat datang <?= $_SESSION['username']; ?> di halaman dashboard admin.</h5>
            </div>
        </div>
    </div>
  </div>
</div>

<?php include './views/footer.php';?>