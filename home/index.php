<?php 
include '../connect/koneksi.php'; 
include 'header.php';
?>

	<div class="container mt-5">
	<?php 
	if (!empty($_GET['pesan'])) { ?>
		<div class="alert alert-primary" role="alert">
			Selamat datang <i><strong><?= $_SESSION['username'] ?></strong></i>, silahkan memilih rute travel !
		</div>
	<?php }
	?>
		<div class="row row-cols-1 row-cols-md-4 g-3">
		<?php
			$query = mysqli_query($koneksi,"SELECT * FROM rute");
			while ($data = mysqli_fetch_object($query)) { ?>
		  <div class="col">
			<div class="card h-100">
			  	<img src="<?= BASE_URL . '/gallery/' . $data->foto; ?>" class="card-img-top h-50" style="object-fit:cover;">
				<div class="card-body">
					<h5 class="card-title text-center"><?= $data->nama_rute; ?></h5>
				</div>
				<div class="card-footer bg-none">
					<?php
					if (!empty($_SESSION['username'])) {
						if ($data->status == 'ada') {
							echo '<a href="'.BASE_URL.'/home/reservasi.php?rute='. $data->id_rute. '" class="btn btn-primary w-100">Pesan Sekarang</a>';
						}else{
							echo '<button type="submit" class="btn btn-secondary w-100" disabled>CLOSED</button>';
						}
					}else{
						echo '<button type="submit" class="btn btn-secondary w-100" disabled>Login untuk memilih Rute</button>';
					}
					?>
				</div>
			</div>
		  </div>
		  <?php } ?>
		</div>
	</div>
	
<?php include 'footer.php';?>