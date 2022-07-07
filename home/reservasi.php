<?php 
include '../connect/koneksi.php'; 
include 'header.php';
if (empty($_SESSION['username'])) {
    header('location: ./index.php');
}
if (empty($_GET['rute'])) {
    // cek apakah URL ada ?[rute]= jika tidak pindah ke halaman awal 
    header('location: ./index.php');
}
?>

    <div class="container mt-5 d-flex justify-content-center">
        <div class="row mt-4">
            <div class="col-md-5">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="../gallery/bromo.jpg" class="d-block w-100 rounded">
                        </div>
                        <div class="carousel-item">
                        <img src="../gallery/dieng.jpg" class="d-block w-100 rounded">
                        </div>
                        <div class="carousel-item">
                        <img src="../gallery/candi.jpeg" class="d-block w-100 rounded">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <h3 class="text-center mb-3">Form Pemesanan Tour</h3>
                <div class="card d-flex align-items-center">
                    <div class="card-body">
                        <form class="row g-2" method="POST" action="<?= BASE_URL . '/home/reservasi.php'; ?>">
                            <!-- nama -->
                            <div class="col-sm-5">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap Pemesan</label>
                                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="nama">
                            </div>
                            <!-- email -->
                            <div class="col-sm-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="nama@email.com">
                            </div>
                            <!-- telepon -->
                            <div class="col-sm-3">
                                <label for="telepon" class="form-label">Telepon/WA</label>
                                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="628xxxx">
                            </div>
                            <!-- jeniskelamin -->
                            <div class="col-sm-12">
                                <label for="jeniskelamin" class="form-label">Jenis Kelamin</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jeniskelamin" id="pria" value="pria">
                                    <label class="form-check-label" for="pria">Pria</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jeniskelamin" id="wanita" value="wanita">
                                    <label class="form-check-label" for="wanita">Wanita</label>
                                </div>
                            </div>
                            
                            <!-- rute -->
                            <div class="col-sm-12">
                                <label for="rute" class="form-label">Pilih Rute <a href="<?= BASE_URL . '/home/harga.php' ?>" class="text-decoration-none">(CEK HARGA RUTE DISINI)</a></label>
                                <?php
                                    $id_rute = $_GET['rute'];
                                    $queryAll = mysqli_query($koneksi,"SELECT * FROM rute"); // ambil semua data tbl rute
                                    while ($dataAll = mysqli_fetch_object($queryAll)) { ?>
                                    <?php if ($dataAll->id_rute == $id_rute) { ?>
                                        <!-- jika id_rute dari tabel == id_rute dari GET , maka form checked -->
                                        <!-- checked -->
                                    <div class="form-check">
                                        <input type="hidden" name="hargarute" value="<?= $dataAll->harga_rute; ?>">
                                        <input class="form-check-input" type="radio" name="rute" id="<?= $dataAll->id_rute; ?>" value="<?= $dataAll->id_rute; ?>" checked>
                                        <label class="form-check-label" for="<?= $dataAll->id_rute; ?>"><?= $dataAll->nama_rute; ?></label>
                                    </div>
                                    <?php continue; } ?>
                                        <!-- tidak check -->
                                    <div class="form-check">
                                        <?php  if($dataAll->status == 'tidak') { ?>
                                            <!-- jika status rute == tidak maka disable pilihan -->
                                            <!-- disabled -->
                                            <input class="form-check-input" type="radio" name="rute" id="<?= $dataAll->id_rute; ?>" disabled>
                                        <?php }else{ ?>
                                            <input class="form-check-input" type="radio" name="rute" id="<?= $dataAll->id_rute; ?>" value="<?= $dataAll->id_rute; ?>">
                                        <?php } ?>
                                        <label class="form-check-label" for="<?= $dataAll->id_rute; ?>"><?= $dataAll->nama_rute; ?></label>
                                    </div>
                                    <?php } ?>
                            </div>
                            
                            <!-- jumlah orang -->
                            <div class="col-sm-4">
                                <label for="jumlah_orang" class="form-label">Jumlah Orang</label>
                                <input type="number" class="form-control" id="jumlah_orang" name="jumlah_orang">
                            </div>
                            <!-- tgl berangkat -->
                            <div class="col-sm-4">
                                <label for="tgl_berangkat" class="form-label">Tanggal Berangkat</label>
                                <input type="date" class="form-control" id="tgl_berangkat" name="tgl_berangkat">
                            </div>
                            <!-- tgl kembali -->
                            <div class="col-sm-4">
                                <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                                <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali">
                            </div>

                            <div class="col-sm-12">
                                <button type="submit" name="pesan" class="btn btn-pesan btn-success w-100 pt-2 pb-2 my-2">Booking</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php';?>

<?php
if (isset($_POST['pesan'])) {
    $nama_lengkap   = $_POST['nama_lengkap'];
    $email          = $_POST['email'];
    $telepon        = $_POST['telepon'];
    $jeniskelamin   = $_POST['jeniskelamin'];
    $pilih_rute     = $_POST['rute'];
    $jumlah_orang   = $_POST['jumlah_orang'];
    $tgl_berangkat  = $_POST['tgl_berangkat'];
    $tgl_kembali    = $_POST['tgl_kembali'];

    $hargaRute      = $_POST['hargarute'];
    $hargaFinal     = $jumlah_orang * $hargaRute;
    // get harga dari rute
    $query  = mysqli_query($koneksi,"INSERT INTO reservasi (nama_lengkap, jeniskelamin, telepon, email, id_rute, jumlah_orang, tgl_berangkat, tgl_kembali, biaya) VALUES ('$nama_lengkap' , '$jeniskelamin' , '$telepon' , '$email' , '$pilih_rute' , '$jumlah_orang' , '$tgl_berangkat' , '$tgl_kembali', $hargaFinal )");
    if (!$query) {
        echo "gagal";
    }else{
        header('location: ./index.php');
    }
    
}
?>