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
                    <h4 class="card-title">Form Tambah Kendaraan dan Mesin</h4>
                    <p class="card-description">Kendaraan dan Mesin </p>
                    <form enctype="multipart/form-data" autocomplete="off" action="action/action-add-kendaraan.php" method="post" class="forms-sample">
                      <div class="form-group">
                        <label for="kode">Nomor Polisi</label>
                        <input name="kode" id="kode" type="text" class="form-control" id="exampleInputName1" placeholder="EX:AG01234RR">
                      </div>
                      <div class="form-group">
                        <label for="nama_brg">Nama Kendaraan</label>
                        <input name="nama_brg" id="nama_brg" type="text" class="form-control" id="nama" placeholder="EX:SUPRA 125, GRANDMAX">
                      </div>
                      <div class="form-group">
                        <label for="merek">Merek</label>
                        <input name="merek" id="merek" type="text" class="form-control" id="merek" placeholder="EX:HONDA,DAIHATSU">
                      </div>
                      <div class="form-group">
                        <label for="type_barang">Type Kendaraan</label>
                        <select class="form-control" name="type_barang" id="type_barang">
                          <option>Roda Dua</option>
                          <option>Roda Empat</option>
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
                        <label for="pengguna">Pengguna</label>
                        <input type="text" class="form-control" id="pengguna" name="pengguna" placeholder="EX:MORGAN">
                      </div>
                      <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="EX:MORGAN">
                      </div>
                      <div class="form-group">
                        <label for="status">Status Kendaraan atau Mesin</label>
                        <select class="form-control" id="status" name="status">
                          <option>Digunakan</option>
                          <option>Tidak Digunakan</option>
                          <option>Rusak</option>
                        </select>
                      </div>
                      <div class="form-group">
                    <label for="upload">Foto Kendaraan</label>
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