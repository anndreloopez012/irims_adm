<body class="hold-transition sidebar-mini layout-fixed">
    <div class=" imgmenu main-header navbar navbar-expand "> 
        <div class="row">
            <div class="col-12" >
                <img src="irims_adm/../lib/dist/img/<?php echo $adm_enc_img?>" class="img">
            </div>
            <div class="col-6 ">
                <a><?php echo $adm_enc_izq_lg?></a>
            </div>
            <div class="col-6 scrmenu">
                <a><?php echo $adm_enc_der_lg?></a>
            </div>
        </div>
    </div>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home.php" class="nav-link"><b><?php echo $title?></b></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item" data-toggle="tooltip" data-placement="top" title="New Window">
        <div id="window">
        <a class="nav-link"  href="home.php" target="_blank">
          <i class="far fa-window-restore"></i>
        </a>
        </div>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Log out">
        <div id="logout">
          <a class="nav-link"  href="irims_adm/../interbase/logout.php">
            <i class="fas fa-times-circle"></i>
          </a>
        </div>
      </li>
    </ul>
  </nav>

  <style>
  div.scrmenu{
    text-align: right !important;
  }
  </style>