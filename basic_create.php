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
            
      

            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                <h4 class="card-title"><b>Upload Document Skripsi</b></h4>
                  <p class="card-description">
                  </p>
<style>
colorY
{
  color:red;
}
ok
{
  color:green;
}

</style>
<p>File yang bisa di Upload hanya file dengan ekstensi <code><b>.pdf, .doc, .docx</b></code> dan besar file (file size) maksimal hanya 1 MB.</p>
<hr size="50px"></hr>
  <?php
    include "koneksi.php";
    include('class.pdf2text.php');
    
    if($_POST){
      for($i=0;$i<=count($_FILES['fileToUpload']['name'])-1;$i++)
      {
        $allowed_ext	= array('doc', 'docx', 'pdf');
        $file_name		= $_FILES['fileToUpload']['name'][$i];
        $file_ext		  = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
        $file_size		= $_FILES['fileToUpload']['size'][$i];
        $file_tmp		  = $_FILES['fileToUpload']['tmp_name'][$i];
        $tgl			    = date("Y-m-d");

        if(empty($_POST["jurusan"]))
        { 
           echo "<script> alert('Harap inputkan jurusan'); window.location='basic_create.php';</script>";
        }
        else
        {
           $jrs = $_POST['jurusan'];
        }

        if(!empty($_POST["jurusan"]))
        {
        if(in_array($file_ext, $allowed_ext) === true)
        {
          if($file_size < 8388608)
          {
            $lokasi = 'files/'.$file_name.'.'.$file_ext;
            move_uploaded_file($file_tmp, $lokasi);
            $a = new PDF2Text();
            $a->setFilename($lokasi);
            $a->decodePDF();
            $berita=$teks = str_replace("'", " ", $a->output());
            $php = "INSERT INTO tbberita VALUES(NULL, '$tgl', '$file_name', '$file_ext', '$file_size', '$lokasi','$berita', '$jrs')";
            
                $in = mysqli_query($con,$php);
                if($in)
                {
                  echo '<div><font color="green"> "SUCCESS": File berhasil di Upload!</font></div>';
                }
                else
                {
                  echo '<div><font color="red">"ERROR": Gagal upload file!</font></div>';
                }
          }
          else
          {
              echo '<div><font color="red">"ERROR": Besar ukuran file (file size) maksimal 1 Mb!</font></div>';
          }
        }
        else
        {
          echo '<div><font color="red">"ERROR": Ekstensi file tidak di izinkan!</font></div>';
        }
      }
    }
  }
    ?>
  
                  <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                       <b><label>Fakultas</label></b>
                          <div class="input-group col-xs-12">
                                <select id="fakultas" name="fakultas" class="form-control">
                                  <option value="">Pilih</option>
                                  <?php
                          $sql = "SELECT * FROM fakultas";
                          $say = mysqli_query($con, $sql)  or die ("Query salah : ".mysqli_error($conn)); 
        
                            
                             while($tampil = mysqli_fetch_array($say)) { 
                                  ?>
                <option value='<?php echo $tampil['id_fakul']; ?>'> <?php echo $tampil['nama_fakultas'] ?> </option>
                                  <?php
                                      }
                                  ?>
                                </select>
                              </div>
                          </div>
                      <div class="form-group">
                       <b><label>Jurusan</label></b>
                          <div class="input-group col-xs-12">  
                                <select id="jurusan" name="jurusan" class="form-control">
                                  <option value="">Pilih</option>
                                  <?php
                          $sql = "SELECT * FROM jurusan INNER join fakultas on jurusan.id_fakul_fk = fakultas.id_fakul order by nama_jurusan";

                          $say = mysqli_query($con, $sql)  or die ("Query salah : ".mysqli_error($conn)); 
        
                            
                             while($tampil = mysqli_fetch_array($say)) { 
                                  ?>
                <option id="jurusan" class='<?php echo $tampil['id_fakul']; ?>' value='<?php echo $tampil['nama_jurusan']; ?>'> <?php echo $tampil['nama_jurusan'] ?> </option>
                                  <?php
                                      }
                                  ?>
                                </select>
                              </div>
                          </div>
                      <div class="form-group">
                      <b><label>File upload</label></b>
                      <div class="input-group col-xs-12">
                        
                      <input type="file" name="fileToUpload[]" id="files" multiple="" onChange="makeFileList();" class="file-upload-browse btn btn-danger" >
                    
                      </div>
                    </div>
                    
                    <button type="submit" name="upload" class="btn btn-success mr-2">Submit</button>
                    <button class="btn btn-light"><a style="color: black" href="basic_create.php">Cancel</a></button>
                  </form>

                 
                </div>

              </div>


            </div>
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <h4 class="card-title"> <b>Data File</b></h4>
                  <p class="card-description">
                    File
                    <code>.upload</code>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-border">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Nama File
                          </th>
                        </tr>
                      </thead>
                      <tbody id="fileList">
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
      
                  <script>
                    function makeFileList() {
                      var input = document.getElementById("files");
                      var ul = document.getElementById("fileList");
                      //<img src="'+input.files[i].name+'" alt="'+input.files[i].name+'
                      for (var i = 0; i < input.files.length; i++) {
                        var li = document.createElement("tr");
                        console.log(input.files);
                        li.innerHTML = '<tr><td>'+i+'</td><td>'+input.files[i].name+'</td></tr>';
                        ul.appendChild(li);
                      }
                    }
                 </script>

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
  <script src="js/jquery.chained.min.js"></script>
  <script>
            $("#jurusan").chained("#fakultas");
           
  </script>
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