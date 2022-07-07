<?php 
include '../connect/koneksi.php'; 
include 'header.php';
?>

    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-body">
                <h4 class="text-center mt-2">Form Kritik & Saran Tour</h4>
                <form class="row mt-2 g-3">
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">Pesan</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include 'footer.php';?>