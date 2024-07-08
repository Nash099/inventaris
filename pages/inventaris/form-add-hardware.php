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
                    <h4 class="card-title">Tambah Hardware</h4>
                    <p class="card-description">Hardware </p>
                    <form enctype="multipart/form-data" autocomplete="off" action="action/action-add-perangkat.php" method="post" class="forms-sample">
                      <?php 
                      // Generate automatic code based on current date and time
                        $prefix = 'HRW'; // Prefix for the code
                       // Get current date and time (YearMonthDayHourMinuteSecond)
                        $random_number = rand(1000, 9999); // Generate a random 4-digit number
                        $generated_code = $prefix  . $random_number; // Combine prefix, date, and random number to create the code

                       // echo "Generated Code: " . $generated_code; // Output the generated code

                      ?>
                      <div class="form-group">
                        <label for="kode">Kode Hardware</label>
                        <input name="kode" id="kode" type="text" class="form-control" id="exampleInputName1" value="<?php echo  $generated_code?>" >
                      </div>
                      <div class="form-group">
                        <label for="nama">Nama Hardware</label>
                        <input name="nama"  type="text" class="form-control" id="nama" placeholder="EX: EPSON L3110">
                      </div>
                      <div class="form-group">
                        <label for="type">Jenis Hardware</label>
                        <select class="form-control select2" name="type" id="type">
                        <?php 
                            $query2="select * from type_hardware ";
                            $tampil=mysqli_query($koneksi, $query2) or die(mysqli_error($koneksi));
                            while($data1=mysqli_fetch_array($tampil))
                            {
                        ?>
                          <option value="<?php echo $data1['kode'];?>"><?php echo $data1['nama'];?>
                        <?php 
                        } 
                        
                        ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="sts">Status Kendaraan</label>
                        <select class="form-control" name="sts" id="sts">
                          <option>DIGUNAKAN</option>
                          <option>TIDAK DAPAT DIGUNAKAN</option>
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
                        <label for="tgl_pembelian">Tanggak Pembelian</label>
                        <input type="date" class="form-control" id="tgl_pembelian" name="tgl_pembelian" placeholder="EX:MORGAN">
                      </div>
                      <div class="form-group">
                        <label for="ket">Keterangan</label>
                        <input type="text" class="form-control" id="ket" name="ket" placeholder="EX:MORGAN">
                      </div>
                      <div class="form-group">
                        <label for="kantor">Alamat Hardware</label>
                        <select class="form-control select2" name="kantor" id="kantor">
                        <?php 

                            $query2="select * from tbl_kantor ";
                            $tampil=mysqli_query($koneksi, $query2) or die(mysqli_error($koneksi));
                            while($data1=mysqli_fetch_array($tampil))
                            {
                        ?>
                          <option value="<?php echo $data1['nm_kantor'];?>"><?php echo $data1['id'];?>. <?php echo $data1['nm_kantor'];?>
                        <?php 
                        }  
                        ?>
                        </select>
                      </div>
                      <div class="form-group">
                    <label for="nama_file">Foto Hardware</label>
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