
<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <div class="nav-link">
                <div class="user-wrapper">
                  <div class="profile-image">
                    <img src="images/faces/w.png" alt="profile image">
                  </div>
                  <div class="text-wrapper">
                    <p class="profile-name"><?php echo $_SESSION['usern']['usern']; ?></p>
                    <div>
                      <small class="designation text-muted">Admin</small>
                      <span class="status-indicator online"></span>
                    </div>
                  </div>
                </div>
                  <a class="btn btn-success btn-block" href="basic_create.php">New Documents
                  <i class="mdi mdi-plus"></i></a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
  
            <li class="nav-item">
              <a class="nav-link" href="basic_corpus.php">
                <i class="menu-icon mdi mdi-book"></i>
                <span class="menu-title">Data Abstract</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index_table.php">
                <i class="menu-icon mdi mdi-table"></i>
                <span class="menu-title">Tables Indexing</span>
              </a>
            </li>
          
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                  <i class="menu-icon mdi mdi-restart"></i>
                  <span class="menu-title">Nothing</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                  <ul class="nav flex-column sub-menu">
                   
                    <li class="nav-item">
                      <a class="nav-link" href="#"> nothing </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#"> nothing </a>
                    </li>
                
                  </ul>
                </div>
              </li>
          </ul>
        </nav>
        
  