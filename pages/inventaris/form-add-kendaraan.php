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
        <div class="main-panel">
          <div class="content-wrapper">
          <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">FORM TAMBAH DATA MESIN DAN KENDARAAN</h4>
                    <p class="card-description">Mesin dan Kendaraan </p>
                    <form enctype="multipart/form-data" autocomplete="off" action="action/action-add-kendaraan.php" method="post" class="forms-sample" required>
                      <div class="form-group">
                        <label for="kode">NOMOR MESIN / NOMOP POLISI</label>
                        <input name="kode" id="kode" type="text" class="form-control" id="exampleInputName1" placeholder="EX:AG01234RR" required>
                      </div>
                      <div class="form-group">
                        <label for="nama_brg">NAMA MESIN / KENDARAAN</label>
                        <input name="nama_brg" id="nama_brg" type="text" class="form-control" id="nama" placeholder="EX:SUPRA 125, GRANDMAX" required>
                      </div>
                      <div class="form-group">
                        <label for="merek">MEREK</label>
                        <input name="merek" id="merek" type="text" class="form-control" id="merek" placeholder="EX:HONDA,DAIHATSU" required>
                      </div>
                      <div class="form-group">
                        <label for="type_barang">TYPE MESIN / KENDARAAN</label>
                        <select class="form-control" name="type_barang" id="type_barang">
                          <option>RODA 4</option>
                          <option>RODA 2</option>
                          <option>MESIN LAINNYA</option>
                        </select>
                      </div>
                      <!--<div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>-->
                      <div class="form-group">
                        <label for="pengguna">PENGGUNA</label>
                        <input type="text" class="form-control" id="pengguna" name="pengguna" placeholder="EX:MORGAN" required>
                      </div>
                      <div class="form-group">
                        <label for="keterangan">KETERANGAN</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="EX:MORGAN" required>
                      </div>
                      <div class="form-group">
                        <label for="status">STATUS MESIN / KENDARAAN</label>
                        <select class="form-control" id="status" name="status">
                          <option>DIGUNAKAN</option>
                          <option>TIDAK DIGUNAKAN</option>
                          <option>RUSAK</option>
                        </select>
                      </div>
                      <div class="form-group">
                    <label for="upload">FOTO KENDARAAN</label>
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