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
include "include/head.php";
?>
    
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
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
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                 <div class="template-demo" align="center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="index_table.php">
                      <button type="button" class="btn btn-outline-secondary active"><font size=2px color=green><b><i class="menu-icon mdi mdi-chevron-left"></i> Table Index </b></font></button></a>
                      <a href="vektor_table.php">
                      <button type="button" class="btn btn-outline-secondary"><font size=2px color=green><b> Table Vektor <i class="menu-icon mdi mdi-chevron-right"></i></b></font></button></a>
                    </div>
                 </div>
                <div class="card-body">
             
                <h4 class="card-title"><font size=4px color=black>Table Index</font></h4>
                  <a href="index_table.php?act=indexing">
                  
                  <button type="button" class="btn btn-outline-secondary">
                  <font color=black>
                    Create Indexing dan Menghitung Bobot Setiap <code>.term</code> Docx
                  
                  </font>
                  </button><br><br>
                  </a>

                  <div class="table-responsive">

                  
                  <table id="myTable" class="table">
                      <thead>
                        <tr>
                          
                          <th>No</th>
                          <th>Term</th>
                          <th>ID Doc</th>
                          <th>TF</th>
                          <th>Weight</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                  <tbody>
                  <?php
                   include "koneksi.php";
                    $result = mysqli_query($con,"SELECT * FROM tbindex ORDER BY Id");

                    while($row = mysqli_fetch_array($result)) {
                      
                      echo '<tr>';
                      echo '<td>' . $row['Id'] . '</td>';
                      echo '<td>' . $row['Term'] . '</td>';
                      echo '<td>' . $row['DocId'] . '</td>';
                      echo '<td>' . $row['Count'] . '</td>';
                      echo '<td>' . $row['Bobot'] . '</td>';
                      echo '<td><a href="suntingindex.php?id='.$row['Id'].'"><i class="menu-icon mdi mdi-restart"></i>Edit</a></td>';
                      echo '</tr>';

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
        <!-- partial:../../partials/_footer.html -->
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
if ($apa == "indexing") {
  buatindex();	
  
  echo "<meta http-equiv='refresh'e url='basic_table.php'>";	
  echo "<script> window.location='index_table.php';</script>";
} 

?>