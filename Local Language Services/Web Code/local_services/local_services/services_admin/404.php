 
  <div id="main" style="min-height:0">
	<!-- Start: Header -->
		<?php include("header.php"); ?>
	<!-- End: Header -->
	<!-- Start: Menu -->
		<?php include("menu.php"); ?>
	<!-- End: Menu -->
    <!-- Start: Content-Wrapper -->
    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">


      <!-- Start: Topbar -->
      <header id="topbar">
        <div class="topbar-left">
          <ol class="breadcrumb">
            <li class="crumb-active">
              <a href="home.php?pages=404.php">404 Error</a>
            </li>
            <li class="crumb-icon">
              <a href="<?php echo ADMIN_URL;?>">
                <span class="glyphicon glyphicon-home"></span>
              </a>
            </li>
            <li class="crumb-link">
              <a href="<?php echo ADMIN_URL;?>">Home</a>
            </li>
            <li class="crumb-trail">404 Error</li>
          </ol>
        </div>
      </header>
      <!-- End: Topbar -->

      <!-- Begin: Content -->
      <section id="content" class="pn animated fadeIn">

        <div class="center-block mt50 mw800" style=" text-align: center;">
          <h1 class="error-title" style="font-size: 220px;line-height: 250px;color:#4a89dc"> 404! </h1>
          <h2 class="error-subtitle">Page Not Found.</h2>
        </div>
		<?php include('fixfooter.php') ?>
      </section>
      <!-- End: Content -->

    </section>



  </div>
  