<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <?php include "component-head.php"; ?>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <?php include "component-sidebar.php"; ?>

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <?php include "component-navbar.php"; ?>
        <!-- partial -->
<?php 
//jika sudah mendapatkan parameter GET id dari URL
if(isset($_GET['id'])){
  //membuat variabel $id untuk menyimpan id dari GET id di URL
  $id = $_GET['id'];

  //query ke database SELECT tabel mahasiswa berdasarkan id = $id
  $select = mysqli_query($koneksi, "SELECT * FROM perangkat WHERE id='$id'") or die(mysqli_error($koneksi));

  //jika hasil query = 0 maka muncul pesan error
  if(mysqli_num_rows($select) == 0){
    echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
    exit();
  //jika hasil query > 0
  }else{
    //membuat variabel $data dan menyimpan data row dari query
    $data = mysqli_fetch_assoc($select);
  }
    // SIMPAN DI FOLDER
} 

?>
        
        <div class="main-panel">
          <div class="content-wrapper">
          <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">FORM HARDWARE</h4>
                    <p class="card-description">Mesin dan Kendaraan </p>
                    <form enctype="multipart/form-data" autocomplete="off" action="action/action-add-history-kendaraan.php"  method="post" class="forms-sample">
                      <div class="form-group">
                        <label for="kode">Nomor Polisi / Serial</label>
                        <input name="kode" id="kode" type="text" class="form-control" value="<?php echo $data['kode']?>">
                      </div>
                      <div class="form-group">
                        <label for="nama_brg">Nama Kendaraan</label>
                        <input name="nama_brg" id="nama_brg" type="text" class="form-control" value="<?php echo $data['nama']?>" placeholder="EX:SUPRA 125, GRANDMAX">
                      </div>
                      <div class="form-group">
                        <label for="pengguna">Pengguna</label>
                        <input name="pengguna" id="pengguna" type="text" class="form-control" value="<?php echo $data['kantor']?>" placeholder="EX:SUPRA 125, GRANDMAX">
                      </div>
                      <div class="form-group">
                        <label for="km_saatini">Kilometer Saat Ini</label>
                        <input name="km_saatini" id="km_saatini" type="number" class="form-control"  placeholder="EX:2000" required>
                      </div>
                      <div class="form-group">
                        <label for="ket_servis">Keterangan Services</label>
                        <textarea name="ket_servis" id="ket_servis" type="text" class="form-control"  placeholder="EX:GANTI OLI BULANAN" required></textarea>
                      </div>
                      <div class="form-group">
                        <label for="nominal">Nominal Pembayaran </label>
                        <input type="number" class="form-control" id="nominal" name="nominal" placeholder="EX:5000000" required>
                      </div>
                      <div class="form-group ">
                        <label for="tgl_servis">Tanggal Servis</label>
                        <input  type="date" class="form-control" id="tgl_servis" name="tgl_servis" required>
                      </div>
                      <div class="form-group">
                          <label for="upload">Foto Nota</label>
                          <input name="nama_file" id="nama_file" type="file" class="form-control p_input" required>
                      </div> 
                        <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />
                    </form>
                  </div>
                </div>
              </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?php include "component-footer.php";?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <?php include "component-body.php";?>
    <!-- End custom js for this page -->
  </body>
</html>