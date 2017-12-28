<?php
	switch($_REQUEST['pages']) {
		
		case "" : $class1 = 'class="active"' ; break;
		
		case "profile" : $class2 = 'class="active"' ; break;
		
		case "change-password" : $class3 = 'class="active"' ; break;

		case "add-jobs" : $class4 = 'class="active"' ; break;

		case "view-jobs" : $class4 = 'class="active"' ; break;

		case "view-users" : $class5 = 'class="active"' ; break;

		case "apply-jobs" : $class6 = 'class="active"' ; break;

                case "add-retail-food" : $class7 = 'class="active"' ; break;

		case "view-retail-food" : $class7 = 'class="active"' ; break;

                case "add-health-tips" : $class8 = 'class="active"' ; break;

		case "view-health-tips" : $class8 = 'class="active"' ; break;

                case "add-online-news" : $class9 = 'class="active"' ; break;

		case "view-online-news" : $class9 = 'class="active"' ; break;

                case "add-restaurant" : $class10 = 'class="active"' ; break;

		case "view-restaurant" : $class10 = 'class="active"' ; break;

		

	}
?>
<!-- Start: Sidebar -->
<aside id="sidebar_left" class="nano nano-primary affix">
    <!-- Start: Sidebar Left Content -->
    <div class="sidebar-left-content nano-content">
        <!-- Start: Sidebar Menu -->
        <ul class="nav sidebar-menu">
          <li class="sidebar-label pt20"></li>
			<li <?php echo $class1;?>>
				<a href="<?php echo ADMIN_URL;?>">
				  <span class="glyphicons glyphicons-dashboard"></span>
				  <span class="sidebar-title">Dashboard</span>
				</a>
			</li>
			<li class="sidebar-label pt15">Menu</li>
			 
			
                       <li <?php echo $class7;?>>
				<a class="accordion-toggle" href="#">
				  <span class="fa fa-life-ring""></span>
				  <span class="sidebar-title">Retail Food</span>
				  <span class="caret"></span>
				</a>
				<ul class="nav sub-nav">
				  <li>
					<a href="home.php?pages=add-retail-food"> Add Retail Food </a>
				  </li>
				  <li>
					<a href="home.php?pages=view-retail-food"> View Retail Food </a>
				  </li>
				</ul>
			</li>

                          <li <?php echo $class8;?>>
				<a class="accordion-toggle" href="#">
				  <span class="fa fa-life-ring""></span>
				  <span class="sidebar-title">Health Tips</span>
				  <span class="caret"></span>
				</a>
				<ul class="nav sub-nav">
				  <li>
					<a href="home.php?pages=add-health-tips"> Add Health Tips </a>
				  </li>
				  <li>
					<a href="home.php?pages=view-health-tips"> View Health Tips </a>
				  </li>
				</ul>
			</li>

                          <li <?php echo $class9;?>>
				<a class="accordion-toggle" href="#">
				  <span class="fa fa-life-ring""></span>
				  <span class="sidebar-title">Online News</span>
				  <span class="caret"></span>
				</a>
				<ul class="nav sub-nav">
				  <li>
					<a href="home.php?pages=add-online-news"> Add Online News </a>
				  </li>
				  <li>
					<a href="home.php?pages=view-online-news"> View Online News </a>
				  </li>
				</ul>
			</li>

                        <li <?php echo $class10;?>>
				<a class="accordion-toggle" href="#">
				  <span class="fa fa-life-ring""></span>
				  <span class="sidebar-title">Restaurant</span>
				  <span class="caret"></span>
				</a>
				<ul class="nav sub-nav">
				  <li>
					<a href="home.php?pages=add-restaurant"> Add Restaurant </a>
				  </li>
				  <li>
					<a href="home.php?pages=view-restaurant"> View Restaurant </a>
				  </li>
				</ul>
			</li>

		
			
			<li class="sidebar-label pt20">Systems</li> 
			
			<li <?php echo $class3;?>>
				<a href="home.php?pages=change-password">
				  <span class="glyphicons glyphicons-keys"></span>
				  <span class="sidebar-title">Change Password</span>
				</a>
			</li>
        
        </ul>
        <!-- End: Sidebar Menu -->

	      <!-- Start: Sidebar Collapse Button -->
	      <div class="sidebar-toggle-mini">
	        <a href="#">
	          <span class="fa fa-sign-out"></span>
	        </a>
	      </div>
	      <!-- End: Sidebar Collapse Button -->

      </div>
    <!-- End: Sidebar Left Content -->

</aside>
