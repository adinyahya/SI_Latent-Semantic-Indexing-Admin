 <?php
  
  include "koneksi.php";
  
  function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }

  
            
        if($_SERVER["REQUEST_METHOD"]=="POST") 
        {
                 
                      
              $lupa="";
              $emailnya="";
                
            
        if($_POST["email"]) 
        {
                   $emailnya=test_input($_POST["email"]);
        }

            
        
                   
          if(isset($_POST) & !empty($_POST['email']))
          {

                  $emailnya = mysqli_real_escape_string($con, $_POST['email']);
                  $sql = "SELECT * FROM tbuser WHERE email = '$emailnya'";
                  $res = mysqli_query($con, $sql);
                  $count = mysqli_num_rows($res);
                  if($count == 1)
                  {
                      
                  }
                  else
                  {
                       echo "<script> alert('Email anda belum terdaftar'); </script>";
                      
                  }
          }
          
                  $r = mysqli_fetch_assoc($res);
                  $password = $r['passw'];
                  $to = $_POST['email'];
                  $subject = "Your Recovered Password";     
                  $message = "Please use this password to login : " . $password;
                  $headers = 'From : www.comebingdeveloper.com, Reply-To www.comebingdeveloper.den, X-Mailer ,PHP/' . phpversion();
                  ini_set('SMTP', "localhost");
                  ini_set('smtp_port', "25");
                   if(mail($to, $subject, $message, $headers))
                  {
                  echo "<script> alert('Silahkan cek email untuk mengetahui password'); </script>";
                  }
                  else
                  {
                  echo "<script> alert('Gagal mengirim ke email'); </script>";
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
             <h2 class="text-center mb-4">Forget Password</h2>
            <div class="auto-form-wrapper">
              <form method="post" action="">
                <div class="form-group">
                  <label class="label">Email</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="email" placeholder="Email">
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
                  <button class="btn btn-primary submit-btn btn-block">Forget</button>
                </div>
                <div class="form-group d-flex justify-content-between">
                  <div class="form-check form-check-flat mt-0">
                   
                  </div>
                  </div>
               
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Sudah ingat ?</span>
                  <a href="index.php" class="text-black text-small">Back</a>
                </div>
              </form>
            </div>
            <ul class="auth-footer">
              <li>
                <a href="#">Conditions</a>
              </li>
              <li>
                <a href="#">Help</a>
              </li>
              <li>
                <a href="#">Terms</a>
              </li>
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