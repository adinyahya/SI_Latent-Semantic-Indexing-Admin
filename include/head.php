  <!DOCTYPE html>
<html lang="en">

<head>
 <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Latent Semantic Indexing</title>
  <!-- plugins:css -->
  <link rel="stylesheet" type="text/css" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" type="text/css" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" type="text/css" href="vendors/css/vendor.bundle.addons.css">

  <link rel="stylesheet" type="text/css" href="bulma/bulma.css">
  <link rel="stylesheet" type="text/css" href="bulma/bulma.css.map">
  <link rel="stylesheet" type="text/css" href="bulma/bulma.min.css">

  <link rel="stylesheet" type="text/css" href="css/style.css">


  <link rel="stylesheet" type="text/css" href="css/DataTables/datatables.min.css">
  <script type="text/javascript" src="css/DataTables/datatables.min.js"></script>
  <script type="text/javascript" src="css/jquery-1.10.2.min.js"></script>

  <link rel="shortcut icon" href="images/favicon.png" />


  <script type="text/javascript">

      $(document).ready(function()

      {

      $('#myTable').DataTable();

      });

  </script>
  <script type="text/javascript">
    //set timezone
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    //buat object date berdasarkan waktu di server
    var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
    //buat object date berdasarkan waktu di client
    var clientTime = new Date();
    //hitung selisih
    var Diff = serverTime.getTime() - clientTime.getTime();    
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function displayServerTime(){
        //buat object date berdasarkan waktu di client
        var clientTime = new Date();
        //buat object date dengan menghitung selisih waktu client dan server
        var time = new Date(clientTime.getTime() + Diff);
        //ambil nilai jam
        var sh = time.getHours().toString();
        //ambil nilai menit
        var sm = time.getMinutes().toString();
        //ambil nilai detik
        var ss = time.getSeconds().toString();
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>
  </head>

<body>
</html>