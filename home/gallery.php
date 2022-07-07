<?php 
include '../connect/koneksi.php'; 
include 'header.php';
?>

	<div class="container mt-5">
		<div class="row mt-2 row-cols-1 row-cols-md-4 g-2">
            <?php $query = mysqli_query($koneksi,"SELECT * FROM rute");
			while ($data = mysqli_fetch_object($query)) { ?>
            <div class="col">
                <img src="<?= BASE_URL . '/gallery/' . $data->foto; ?>" class="card-img-top" style="height:300px; object-fit:cover;">
            </div>
            <?php } ?>
        </div>
	</div>

<?php include 'footer.php';?>