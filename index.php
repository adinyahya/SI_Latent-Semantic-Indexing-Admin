 <?php
  session_start();
  
  function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }

  
            
                if($_SERVER["REQUEST_METHOD"]=="POST") {
                 
               
                $user=["user"];
                $pass=["pass"];
                
               if(empty($_POST["user"])) {
                        echo "<script> alert('Nama tidak boleh kosong'); window.location='index.php';</script>";
             
                    } else {
                        if($_POST["user"]) {
                            $user= test_input($_POST["user"]);
                        }
                    }
                   
                    if(empty($_POST["pass"])) {
                        echo "<script> alert('Password tidak boleh kosong'); window.location='index.php';</script>";
             
                    } else {
                        if($_POST["pass"]) {
                            $pass=test_input($_POST["pass"]);
                        }
                
                    }
            
        
                   
          if(!empty($_POST["user"]) && !empty($_POST["pass"])){

          include "koneksi.php";

          $php = "select * from tbuser where usern='$user' and passw='$pass'";
          $result = mysqli_query($con,$php);
                    
          if (mysqli_query($con, $php)){
          
          }
          else
          {
            echo "Error" . $php . "</br>" . mysqli_error($con);
          }
          


          if($view = mysqli_fetch_array($result))
          {
          
          $_SESSION['usern'] = $view;
          $_SESSION['hak_akses'] = $view['hak_akses'];  

          $_SESSION['id'] = $view;         
          
          echo "<script> alert('Berhasil'); window.location='dashboard.php';</script>";
                    
          }
          else
          {
         
            echo "<script>alert ('Username atau Password salah');</script>";
                echo "<script> window.location='index.php';</script>";
            
            
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
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            
            <div class="auto-form-wrapper">
              <form method="post" action="">
                 <h2 class="text-center mb-4">Login Admin</h2>
                <div class="form-group">
                  <label class="label">Username</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="user" placeholder="Username">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" name="pass" placeholder="*********">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
              <div class="form-group d-flex justify-content-center">
                 
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Login</button>
                </div>
                <div class="form-group d-flex justify-content-between">
                  <div class="form-check form-check-flat mt-0">
                   
                  </div>
                  <a href="forgetpassword.php" class="text-small forgot-password text-black">Forgot Password</a>
                </div>
               
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Not a member ?</span>
                  <a href="register.php" class="text-black text-small">Create new account</a>
                </div>
              </form>
            </div>
            <ul class="auth-footer">
             
            </ul>
            <p class="footer-text text-center">copyright © 2018 ComeBing Developer. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/misc.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>