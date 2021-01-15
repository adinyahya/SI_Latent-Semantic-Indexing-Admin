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


      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      if($_SERVER["REQUEST_METHOD"]=="POST")
      {


      $indexbaru="";
    

      if($_POST["indexnew"]) 
      {
                  $indexbaru=test_input($_POST["indexnew"]);
      }
      
      

          if(!empty($_POST["indexnew"]))
          {
              $as = $_GET['id'];
              $sql = "UPDATE tbindex SET Term='$indexbaru' where id='$as' ";

                
              if ($con->query($sql)==TRUE)
              {
                  echo "<script> alert('Berhasil'); window.location='basic_table.php';</script>";

              }
              else
              {
                  echo "<script> alert('Gagal memperbaruhi password !');</script>";
                  echo"error:".$sql."<br>".$con->error;
              }
                  mysqli_close($con);
          }
        }

  
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
            
            <style>
                        .war{color : red;}
            </style>
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                <h4 class="card-title">Sunting Index</h4>
                <hr> </hr>
                  <p class="card-description">
          
  
                  <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Index Lama</label><br>
                         <?php
                        $sql ="SELECT * FROM tbindex WHERE Id = '".$_GET['id']."'";
                        $result = mysqli_query($con,$sql);
                        $row = mysqli_fetch_array($result);
                         echo "<font color=red>".$row['Term']."</font>";
                         ?>
                    </div>
                   
                    <div class="form-group">
                      <label for="exampleTextarea1">Ganti Index Baru</label>
                      <input type="text" class="form-control" name="indexnew" id="exampleTextarea1" rows="10" placeholder="Index Baru"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <button class="btn btn-light"><a href="basic_table.php">Cancel</a></button>
                  </form>
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