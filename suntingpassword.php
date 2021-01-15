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


      $editpassbaru="";
      $editverpassbaru="";
      $ror="";

      if($_POST["passbaru"]) 
      {
                  $editpassbaru=test_input($_POST["passbaru"]);
      }
      
      
      
      if($_POST["verpassbaru"] != $_POST["passbaru"])
          {
             // $ror="* Password Tidak Sama !";

              echo "<script> alert('Password Tidak Sama !');</script>";
              
          }else 
          {
              if($_POST["verpassbaru"] == $_POST["passbaru"]) 
              {
                      $editverpassbaru= md5($_POST["verpassbaru"]);
              }
          }

          if(!empty($_POST["passbaru"])  && !empty($_POST["verpassbaru"]) && ($_POST["passbaru"] == $_POST["verpassbaru"]))
          {
              $as = $_GET['id'];
              $sql = "UPDATE tbuser SET passw='$editpassbaru', verpassw='$editverpassbaru' where id='$as' ";

                
              if ($con->query($sql)==TRUE)
              {
                  echo "<script> alert('Berhasil');</script>";
                  $_SESSION['passw']['passw']=$editpassbaru;
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
                <h4 class="card-title">Sunting Password</h4>
                <hr> </hr>
                  <p class="card-description">
          
  
                  <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Password Baru</label>
                      <input type="text" class="form-control" name="passbaru" id="exampleInputName1" placeholder="Password Baru">
                    </div>
                   
                    <div class="form-group">
                      <label for="exampleTextarea1">Verifikasi Password Baru</label>
                      <input type="text" class="form-control" name="verpassbaru" id="exampleTextarea1" rows="10" placeholder="Verifikasi Password Baru"></textarea>
                    </div>
                    <button type="submit" name="upload" class="btn btn-success mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
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