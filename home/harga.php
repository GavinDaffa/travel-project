<?php 
include '../connect/koneksi.php'; 
include 'header.php';
?>

    <div class="container mt-5">
        <h3 class="text-center">Harga Paket Tour</h3>
        <div class="row mt-2 row-cols-1 row-cols-md-4 g-3">
            <?php
                $query = mysqli_query($koneksi,"SELECT * FROM rute");
                while ($data = mysqli_fetch_object($query)) { ?>
            <div class="col">
                <div class="card h-100">
                    <img src="<?= BASE_URL . '/gallery/' . $data->foto; ?>" class="card-img-top h-50" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?= $data->nama_rute; ?></h5>
                        <p>Keterangan : <br/>IDR <?= $data->harga_rute; ?>/Orang, termasuk makan,snack,dokumentasi & transportasi.</p>
                        <?php
                        if ($data->status == "ada") : ?>
                            <span class="badge rounded-pill text-bg-primary"><?= $data->status; ?></span>
                        <?php else : ?>
                            <span class="badge rounded-pill text-bg-secondary"><?= $data->status; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php }
            ?>
            
        </div>
    </div>

<?php include 'footer.php';?>