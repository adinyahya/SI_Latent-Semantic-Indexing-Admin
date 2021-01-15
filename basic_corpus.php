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
         <!-- 
                                <div class="content-wrapper">
                                <div class="row">
                                <div class="col-lg-12 stretch-card">
                                <div class="card">
                                <div class="card-body">
                                <font color="blue">
                                 <h3 style="color: red" align="center"><b>Data yang sudah di Stopword dan Stemming</b></h3><t><hr></hr>
                                </font> 
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                -->
                  <?php
                            include "koneksi.php";

                            $result = mysqli_query($con, "SELECT * FROM tbberita ORDER BY Id desc");
                            
                            while($row = mysqli_fetch_array($result)) {
                                echo '<div class="content-wrapper">';
                                echo '<div class="row">';
                                echo '<div class="col-lg-12 stretch-card">';
                                echo '<div class="card">';
                                echo '<div class="card-body">';
                                echo '<font color="blue">';
                                echo '<h4>'.$row['Judul'].'</h4>';
                                
                                echo '</font>';	
                                echo '<p class="card-description">';
                                //echo 'Achmad Adin Yahya';
                               // echo '<code>.NO 121 Vol 2</code>';
                                echo '</p>';
                                echo '<div class="table-responsive">';
                                echo '<table class="table table-bordered">';
                                echo '<tbody>';
                                echo '<tr>';
								echo '<p>'.$row['Berita'].'</p>';	
                                echo '</tr>';  
                                
                                echo '</tbody>';
                                
                                echo '</table>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                               }  		
                            ?>
             
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