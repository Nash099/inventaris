<!DOCTYPE html>
<html lang="en">
  <?php include "partials/head.php";?>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Register Now</h3>
                <form action="pages/login/add-user.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input name="username" id="username" type="text" class="form-control p_input" required>
                  </div>
                  <div class="form-group">
                    <label for="fullname">Nama Lengkap</label>
                    <input name="fullname" id="fullname" type="text" class="form-control p_input" required>
                  </div>
                  <div class="form-group">
                      <label  for="kantor">INSTANSI</label>
                                  <select name="kantor" id="kantor"  class="form-control select2" required="required"> 
                                  <option value="">---- Pilih Kantor ----</option>
                                      <?php 
                                          $query2="select * from tbl_kantor ";
                                          $tampil=mysqli_query($koneksi, $query2) or die(mysqli_error($koneksi));
                                          while($data1=mysqli_fetch_array($tampil))
                                                {
                                      ?>
                                      <option value="<?php echo $data1['nm_kantor'];?>"><?php echo $data1['kode'];?> : <?php echo $data1['nm_kantor'];?>
                                      </option>
                                      <?php 
                                            } 
                                      ?>
                                  </select>  
                  </div>
                  <div class="form-group">
                    <label for="password">Password *</label>
                    <input name="password" id="password" type="password" class="form-control p_input" required>
                  </div>
                  <div class="form-group">
                    <label for="upload">Foto *</label>
                    <input name="nama_file" id="nama_file" type="file" class="form-control p_input" required>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-facebook mr-2 col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  <p class="sign-up">Sudah Punya Akun?<a href="index.php"> Masuk Disini</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   <?php  include "partials/end.php";?>

  </body>
</html>