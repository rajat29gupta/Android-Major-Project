<?php
	$details = $db->db_get_array("SELECT * FROM ".TABLE_ADMIN." WHERE admin_id = 1"); 
	foreach($details as $data);
?>

<?php include("common_head_file.php") ?>

  <div id="main" style="min-height:0">
	<!-- Start: Header -->
		<?php include("header.php"); ?>
	<!-- End: Header -->
	<!-- Start: Menu -->
		<?php include("menu.php"); ?>
	<!-- End: Menu -->
    <!-- Start: Content-Wrapper -->
<section id="content_wrapper">
  <!-- Start: Topbar -->
  <header id="topbar">
	<div class="topbar-left">
	  <ol class="breadcrumb">
		<li class="crumb-active">
		  <a href="<?php echo ADMIN_URL;?>">Dashboard</a>
		</li>
		<li class="crumb-icon">
		  <a href="<?php echo ADMIN_URL;?>">
			<span class="glyphicon glyphicon-home"></span>
		  </a>
		</li>
		<li class="crumb-link">
		  <a href="<?php echo ADMIN_URL;?>">Home</a>
		</li>
		<li class="crumb-trail">Dashboard</li>
	  </ol>
	</div>
	<div class="topbar-right" style="margin-top: 7px;">
	  <div class="ib topbar-dropdown">
	<!--	<label for="topbar-multiple" class="control-label pr10 fs11 text-muted" style="color:#555;";><?php echo date('l jS \of F Y , h:i:s A'); ?></label>   -->
	  </div>
	</div>
  </header>
  <!-- End: Topbar -->
  <!-- Begin: Content -->
  <section id="content" class="animated fadeIn">
		<div class="content-header dash_partss">
		  <h1 class="dash_wel"> Welcome to <b class="text-primary" style="color:#0095da">Admin Control Panel</b></h1>
		  <p class="dash_imgss"><img src="../<?=$data['logo']?>"  class="img-responsive"/></p>
	<!--	  <h1 class="lead">We even included dozens of prebuilt form layouts so you can leave work early</h1>  -->
		</div>
  </section>
  <!-- End: Content -->	  
  <?php include('fixfooter.php') ?>
</section>
<!-- End: Content-Wrapper -->
 </div>   

