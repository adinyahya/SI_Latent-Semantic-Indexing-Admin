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

      $email="";
      $user="";
      $pas="";
      $verpas="";

        if(empty($_POST["users"]))
          {
               echo "<script> alert('Nama tidak boleh kosong'); window.location='register.php';</script>";
             
          }
          else
          {
                if($_POST["users"]) 
                {
                            $user=test_input($_POST["users"]);
                }
          }

          if(empty($_POST["email"]))
          { 
            echo "<script> alert('Email tidak boleh kosong'); window.location='register.php';</script>";
             
          }
          else
          {
              if($_POST["email"]) {
                          $email=test_input($_POST["email"]);
              }
          }
                   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                    {
                                     echo "<script> alert('Masukkan email dengan benar'); window.location='register.php';</script>";
             
                                     
                    }

        if(empty($_POST["pass"]))
          {
              echo "<script> alert('Password tidak boleh kosong'); window.location='register.php';</script>";
             
          }
          else
          {
          if($_POST["pass"]) 
          {
                  $pas=test_input($_POST["pass"]);
          }
          }
      
      
      if($_POST["verpass"] != $_POST["pass"])
          {
              echo "<script> alert('Password tidak sama'); window.location='register.php';</script>";
               
          }else 
          {
              if($_POST["verpass"] == $_POST["pass"]) {
                      $verpas= md5($_POST["verpass"]);
          }
          }

  if(!empty($_POST["email"]) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($_POST["users"]) && !empty($_POST["pass"])  && !empty($_POST["verpass"]) && ($_POST["pass"] == $_POST["verpass"]))
          {
        


  $sql = "INSERT into tbuser set usern='$user', email='$email', passw='$pas', verpassw='$verpas', hak_akses='1' ";

                
              if ($con->query($sql)==TRUE)
              {
                  echo "<script> alert('Berhasil'); window.location='index.php';</script>";
              }else
              {
                  echo "<script> alert('Email anda sudah terdaftar'); window.location='index.php';</script>";
                    echo"error:".$sql."<br>".$conn->error;
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
      <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <form method="post" action="">
                
            <h2 class="text-center mb-4">Register</h2>
                <div class="form-group">
                  <label class="label">Username</label>
                  <div class="input-group">
                    <input type="text" name="users" class="form-control" placeholder="Username">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="label">Email</label>
                  <div class="input-group">
                    <input type="text" name="email" class="form-control" placeholder="Email">
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
                    <input type="password" name="pass" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Verifikasi Password</label>
                  <div class="input-group">
                    <input type="password" name="verpass" class="form-control" placeholder="Confirm Password">
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
                  <button type="submit" class="btn btn-primary submit-btn btn-block">Register</button>
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Already have and account ?</span>
                  <a href="index.php" class="text-black text-small">Login</a>
                </div>
              </form>
            </div>
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