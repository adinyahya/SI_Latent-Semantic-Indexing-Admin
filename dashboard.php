<?php

session_start();
error_reporting(0);
error_reporting(E_ALL);
if (isset($_SESSION['hak_akses']))
{
    if($_SESSION['hak_akses'] == "1")
    {
        
    }
    else if($_SESSION['hak_akses'] == "2")
    {
            header ("location:index.php");
        
    }
}else if(!isset($_SESSION['hak_akses']))
{
header ("location:index.php");
}
include "koneksi.php"; 
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
 <?php
 include "include/head.php"
?>
 </head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
<?php
include "include/header.php";
?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php
      include "include/menu.php";
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
       
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      
                      <i class="mdi mdi-book text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total Documents</p>
                      <div class="fluid-container">
                        <?php
                        include "koneksi.php";

                          $Sql = "SELECT * FROM tbberita";
                          $say = mysqli_query($con, $Sql)  or die ("Query salah : ".mysqli_error($conn)); 
                          $datum = array();        
                               while (($row = mysqli_fetch_array($say)) != null) 
                               {
                                $datum[] = $row;
                               }
                          $count = count($datum);
                          echo '<h3 class="font-weight-medium text-right mb-0">'.$count.'</h3>';
                            ?>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-book mr-1" aria-hidden="true"></i> Documents skripsi
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                     <a href="index_table.php"> <i class="mdi mdi-bookmark-outline text-success icon-lg"></i></a>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Index</p>
                      <div class="fluid-container">
                          <?php
                        include "koneksi.php";

                          $Sql = "SELECT * FROM tbindex";
                          $say = mysqli_query($con, $Sql)  or die ("Query salah : ".mysqli_error($conn)); 
                          $datum = array();        
                               while (($row = mysqli_fetch_array($say)) != null) 
                               {
                                $datum[] = $row;
                               }
                          $count = count($datum);
                          echo '<h3 class="font-weight-medium text-right mb-0">'.$count.'</h3>';
                            ?>
                        
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Indexing documents
                  </p>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                     <a href="cache_table.php"><i class="mdi mdi-delete text-danger icon-lg"></i></a>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Cache</p>
                      <div class="fluid-container">
                           <?php
                        include "koneksi.php";

                          $Sql = "SELECT * FROM tbcache";
                          $say = mysqli_query($con, $Sql)  or die ("Query salah : ".mysqli_error($conn)); 
                          $datum = array();        
                               while (($row = mysqli_fetch_array($say)) != null) 
                               {
                                $datum[] = $row;
                               }
                          $count = count($datum);
                          echo '<h3 class="font-weight-medium text-right mb-0">'.$count.'</h3>';
                            ?>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-delete mr-1" aria-hidden="true"></i> Cache searching
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-location text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Employees</p>
                      <div class="fluid-container">
                          <?php
                        include "koneksi.php";

                          $Sql = "SELECT * FROM tbuser";
                          $say = mysqli_query($con, $Sql)  or die ("Query salah : ".mysqli_error($conn)); 
                          $datum = array();        
                               while (($row = mysqli_fetch_array($say)) != null) 
                               {
                                $datum[] = $row;
                               }
                          $count = count($datum);
                          echo '<h3 class="font-weight-medium text-right mb-0">'.$count.'</h3>';
                            ?>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-account mr-1" aria-hidden="true"></i> Account
                  </p>
                </div>
              </div>
            </div>
          </div>
          
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 style="color: black"><b>Data Documents Skripi</b></h4><t>
                  <h5 align="right"><a href="dashboard.php?act=hapusdata"><i class="mdi mdi-delete text-danger mr-1" aria-hidden="true"></i><font color="red">Reset Semua Data</font></a></h5>
                  <hr></hr>
					<table id="myTable" class="table-bordered">
						<thead>
							<tr>
								<th>No.</th>
                <th>Upload Date</th>
								<th>Title</th>
                <th>File Tipe</th>
								<th>File Size</th>
								<th>Abstract</th>
                <th>Majors</th>
							</tr>
						</thead>
						<tbody>
              <?php
              include "koneksi.php";
							$Sql = "SELECT * FROM tbberita";
							$say = mysqli_query($con, $Sql)  or die ("Query salah : ".mysqli_error($conn)); 
                            
							$nomor = 0;
                            
                             while($tampil = mysqli_fetch_array($say)) { 
								$nomor++;

								echo '<tr>';
									echo '<td>'.$nomor.'</td>';	
									echo '<td>'.$tampil['tanggal_upload'].'</td>';
									echo '<td>'.$tampil['Judul'].'</td>';	
									echo '<td>'.$tampil['tipe_file'].'</td>';	
									echo '<td>'.$tampil['ukuran_file'].'</td>';		
									echo '<td>'.$tampil['Berita'].'</td>';

                  echo '<td>'.$tampil['jurusannya'].'</td>';
								echo '</tr>';
							}
							?>
						</tbody>
					</table>
				
                </div>
              </div>
            </div>
          </div>
          
       
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
     <?php
        include "include/footer.php";
      ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->

  

</body>

</html>

<?php
include 'koneksi.php';
include 'fungsi/preprocessingX.php';
$apa="";
if(!empty($_GET["act"])){
$apa = $_GET["act"];
}
if ($apa == "hapusdata") {
  hapusall();  
  echo "<meta http-equiv='refresh'e url='dashboard.php'>";  
  echo "<script> window.location='dashboard.php';</script>";
} 
?>