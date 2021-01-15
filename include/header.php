
<body onload="setInterval('displayServerTime()', 1000);">
 <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="dashboard.php">
         <img src="images/logo_ITATS.jpg" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="dashboard.php">
          <img src="images/logo-mini.svg" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
        
          <li class="nav-item">
            <a href="#" class="nav-link">
             
               <style>
                   .jamcolor
                   {
                       color:black;
                       margin-left:300px;
                   }
                   </style>
              <?php
                   
                   date_default_timezone_set('Asia/Jakarta');
                   $jam = date("H:i:s");
                   echo "<div class='jamcolor'>";
                   echo "</div>";
                   echo "<i class='mdi mdi-clock'></i>";
                   echo "<span id='clock'>".$jam."</span>";
                   
                   
              ?>

            </a>
          </li>
        
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          
         
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">

              <span class="profile-text">Well hello, <?php echo $_SESSION['usern']['usern']; ?> !</span>
              <img class="img-xs rounded-circle" src="images/faces/w.png" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  
                </div>
              </a>
              <?php
              $id = $_SESSION['id']['id'];
              ?>
              <a class="dropdown-item mt-2" href="suntingpassword.php?id=<?php echo $id; ?>">
                Change Password Accounts
              </a>
              <a class="dropdown-item" href="logout.php">
                Sign Out
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
 </body>    