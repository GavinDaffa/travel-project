<?php 
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
	  <div class="container-fluid">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse  d-flex justify-content-center" id="navbarNavAltMarkup">
		  <div class="navbar-nav mt-3">
			<a class="nav-link active" aria-current="page" href="<?= BASE_URL; ?>">Home</a>
			<a class="nav-link" href="<?= BASE_URL . '/home/gallery.php' ?>">Gallery</a>
			<a class="nav-link" href="<?= BASE_URL . '/home/harga.php' ?>">Harga</a>
			<a class="nav-link" href="<?= BASE_URL . '/home/contact.php' ?>">Contact</a>
			<?php
			print_r($_SESSION);
			if ($_SESSION['username']) {
				echo '<a class="nav-link" href="'.BASE_URL.'/connect/logout.php"><h5><span class="badge bg-success pt-2 pb-2 px-4">Logout</span></h5></a>';
			}else{
				echo '<a class="nav-link" href="'.BASE_URL.'/authuser/"><h5><span class="badge bg-success pt-2 pb-2 px-4">Login</span></h5></a>';
			}
			?>
		  </div>
		</div>
	  </div>
	</nav>