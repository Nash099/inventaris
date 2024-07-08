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
             <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">                  
                  <div class="card-body">           
                    <h4 class="card-title">Daftar Kendaraan dan Mesin</h4>   
                    <div class="form-group">
                      <div class="input-group">   
                      <form action='view-kendaraan.php' method="POST" class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                        <input style="width: 400px;" type="text" name="qcari" class="form-control input-sm pull-right" placeholder="Cari berdasarkan Nomor Kendaraan Atau Nama Kendaraan">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary btn-icon-text btn-sm" type="submit"><i class="mdi mdi mdi-account-search"></i>Search</button>
                          <button href="view-kendaraan.php" class="btn btn-outline-success btn-icon-text btn-sm" type="submit"><i class="mdi mdi-autorenew"></i>Refresh</button>
                        </div>
                      </form>  
                      </div>
                    </div>    
                    <div class="table-responsive  ">
                      <div class="scroller box-body" style="height:550px;" > 
                        <table class="table table-hover">   
                        <?php
                              $query1="select * from barang ORDER BY id DESC";
                              if(isset($_POST['qcari'])){
                              $qcari=$_POST['qcari'];
                              $query1="SELECT * FROM  barang 
                              where kode like '%$qcari%'
                              or nama_brg like '%$qcari%' ORDER BY id DESC  ";
                          }
                          $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error($koneksi));
                        ?>                      
                          <thead>
                            <tr>
                              <th width="50">No</th>
                              <th>Nopol</th>
                              <th>Nama Kendaraan</th>
                              <th>Type</th>
                              <th>Pengguna</th>
                              <th>Keterangan</th>
                              <th width="100">Status</th>
                              <th width="100">Aksi</th>
                            </tr>
                          </thead>
                          <?php 
                            $no=0;
                            while($data=mysqli_fetch_array($tampil))
                            { $no++; 
                          ?>
                          <tbody>
                            <tr>
                              <td><?php echo $no; ?></td>
                              <td><?php echo $data['kode']; ?></td>
                              <td><?php echo $data['nama_brg']; ?></td>
                              <td><?php echo $data['type_barang']; ?></td>
                              <td><?php echo $data['pengguna']; ?></td>
                              <td><?php echo $data['keterangan']; ?></td>
                              <td><?php echo $data['status']; ?></td>
                              <td><center><div id="thanks">
                        <a class="btn btn-outline-primary btn-icon-text btn-sm" data-placement="bottom" href="form-add-history.php?hal=edit&id=<?php echo $data['id'];?>" data-toggle="tooltip" title="Maintenance" href="form-add-history.php"> <i class="mdi mdi-cart-plus"></i></a>

                        <a onclick="return confirm ('MENU INI MASIH DALAM TAHAP PENGEMBANGAN, HUBUNGI TIM IT JIKA ADA KENDALA');" class="btn btn-outline-warning btn-icon-text btn-sm" data-placement="bottom" data-toggle="tooltip" title="Edit Data" href="#"><span class="mdi mdi-tooltip-edit"></a>
                      </tr></div>
                              <!--<td><label class="badge badge-danger">Rusak</label></td>-->
                            </tr>
                          <?php   
                            } 
                          ?>
                          </tbody>
                        </table>
                    </div>
                  </div>
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
    <?php include "component-body.php"?>
    <!-- End custom js for this page -->
  </body>
</html>



