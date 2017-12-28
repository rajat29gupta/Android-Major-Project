<?php
	include "../wsconfig/connection.php";
	$profile = $db->db_get_array("SELECT * FROM ".TABLE_ADMIN." WHERE admin_id = 1"); 
	foreach($profile as $pro);
?>
    <!-- Start: Header -->
    <header class="navbar navbar-fixed-top">
      <div class="navbar-branding">
        <a class="navbar-brand" href="<?php echo ADMIN_URL;?>">
          <b>Admin</b>Panel
        </a>
        <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
      </div>
      <ul class="nav navbar-nav navbar-left">
        <li>
          <!--<a href="<?php echo BASE_URL;?>" target="_blank" class="text-system" data-toggle="tooltip" data-placement="top" title="" data-original-title="Activity">
		    <span class="fa fa-desktop"></span>
		  </a>-->
        </li>
        <li class="hidden-xs">
          <a class="request-fullscreen toggle-active" href="#">
            <span class="ad ad-screen-full fs18"></span>
          </a>
        </li>
      </ul>
	  <script>
		function runScript(e,v) {
			if (e.keyCode == 13) window.location = 'home.php?pages='+v;
		}
	  </script>
        <div class="navbar-form navbar-left navbar-search form-group">
		<!--<input type="text" class="form-control" placeholder="Search..." id="sename" name="sename" value="" onkeypress="return runScript(event,this.value)" onBlur="window.location = 'home.php?pages='+this.value">-->
        </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown" style="text-transform: capitalize;"> <img src="../<?php echo $pro['admin_image']?>" alt="avatar" class="mw30 br64 mr15"> 
		  Mr. <?php echo ucwords($pro['admin_name'])?>
            <span class="caret caret-tp hidden-xs"></span>
          </a>
          <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
            <li class="list-group-item">
              <a href="home.php?pages=profile" class="animated animated-short fadeInUp">
                <span class="fa fa-user"></span> Profile
              </a>
            </li>
		
            <li class="list-group-item">
              <a href="home.php?pages=change-password" class="animated animated-short fadeInUp">
                <span class="fa fa-key"></span> Change Password
              </a>
            </li>
            <li class="list-group-item">
              <a href="logout.php" class="animated animated-short fadeInUp">
                <span class="fa fa-power-off"></span> Logout </a>
            </li>
          </ul>
        </li>
      </ul>

    </header>
    <!-- End: Header -->