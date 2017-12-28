<?php
	$table = TABLE_HEALTH;
	$start = 0;
	$end = 15;
	if(isset($_GET['start'])) {
		$start = $_GET['start'] * $end;
	}
	if(isset($_GET['status']) && isset($_GET['id'])) {
		$arr = array(
			'health_status' => $_GET['status']
		);
		$condition = " health_id = '".$_GET['id']."' ";
		$db->update($table,$arr,$condition);
		$db->redirect("home.php?pages=view-health-tips");
	}
	if(isset($_POST['command']) && $_POST['command'] == "m delete") {
		$ids = implode(",",$_POST['chk']);
		$condition = " health_id IN ($ids) ";
		// $rec_to_del = $db->select("SELECT * FROM `".TABLE_JOB."` WHERE $condition ");
		// foreach($rec_to_del as $del) {
		// 	unlink("../uploads/".$del->staff_photo);
		// }
		$db->delete($table,$condition);
		$db->redirect("home.php?pages=view-health-tips");
	}

	$where ="";
        if($_POST['health_title']!=""){
        echo $where .= "AND health_title like '%".$_POST['health_title']."%'";
        }


?>
<script>
function checkall(a) {
	if(a.checked) {
		$("input[type='checkbox']").prop("checked",true);
	} else {
		$("input[type='checkbox']").prop("checked",false);
	}
}
function uncheck() {
	var tot_ch = $("input[type='checkbox']").length;
	var chek_ch = $("input[type='checkbox']:checked").length;
	if(tot_ch == chek_ch + 1 && document.getElementById('main_ch').checked == false) {
		$("#main_ch").prop("checked",true);
	} else {
		$("#main_ch").prop("checked",false);
	}
}
function godelete() {
	var tot_chk = $("input[type='checkbox']:checked").length;
	if(tot_chk > 0) {
		if(confirm("Are You Want To Delete Selected Records!")) {
			if(confirm("Are You Sure To Delete Permanently Records!")) {
					document.form1.command.value = "m delete";
					document.form1.submit();
			}
		}
	} else {
		alert("Please Select Atlease One Record To Delete!");
	}
}

</script>
 <div id="main" style="min-height:0">
	<!-- Start: Header -->
		<?php include("header.php"); ?>
	<!-- End: Header -->
	<!-- Start: Menu -->
		<?php include("menu.php"); ?>
	<!-- End: Menu -->
    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

      <header id="topbar">
        <div class="topbar-left">
          <ol class="breadcrumb">
            <li class="crumb-active">
              <a href="home.php?pages=add-health-tips">Add Health Tips</a>
            </li>
            <li class="crumb-icon">
              <a href="<?php echo ADMIN_URL;?>">
                <span class="glyphicon glyphicon-home"></span>
              </a>
            </li>
            <li class="crumb-link">
              <a href="<?php echo ADMIN_URL;?>">Home</a>
            </li>
            <li class="crumb-trail">View Health Tips</li>
          </ol>
        </div>
        <div class="topbar-right" style="margin-top: 7px;">
          <div class="ib topbar-dropdown">
      <!--      <label for="topbar-multiple" class="control-label pr10 fs11 text-muted" style="color:#555;";><?php echo date('l jS \of F Y , h:i:s A'); ?></label>   -->
          </div>
        </div>
      </header>


		<section id="content" class="table-layout animated fadeIn">
		   <div class="form-group " style="padding-bottom: 0;">
		   	  <div class="col-md-10 pull-left">
		   	  <form class="" id="" role="form" method="post" action="home.php?pages=view-health-tips" >
		    	<div class="col-md-3 plp1 ">
		     	  <input type="text" id="health_title" class="form-control product" value="<?=$_REQUEST['health_title']?>" name="health_title" autocomplete="off" placeholder="Search By Health Title">
		    	</div>

		     	<div class="col-md-1 plp1 ">
		    		<input type="submit" id="save" name="Search" style="height: 37px" class="btn btn-primary" value="Search">
		      	</div>
		      </div>
		      </form>

		      <form class="" id="" role="form" method="post" action="home.php?pages=view-health-tips" >
		      <div class="col-md-1 pull-right">
		     	<div class="col-md-1 plp1 ">
		    		<input type="submit" id="save" name="search" style="height: 37px" class="btn btn-primary" value="Default">
		      	</div>
		      </div>
		      </form>

		   </div>
		</section>
	  </form>

      <!-- Begin: Content -->
      <section id="content" class="table-layout animated fadeIn">
        <div class="tray tray-center" style="height:100% !important;">
			<div class="center-block">
				<div class="panel panel-warning panel-border top mb35">
				  <div class="panel">
					<div class="panel-body pn">
					<form role="form" name="form1" method="post" enctype="multipart/form-data">
					  <input type="hidden" name="command" value="">

					  <div class="table-responsive">
						<table class="table admin-form theme-warning tc-checkbox-1 fs13">
						  <thead>
							<tr class="bg-light">
							  <th class="text-center" style="width:120px;">
								<label class="option block mn">
								  <input type="checkbox" id="main_ch" onClick="checkall(this)" >
								  <span class="checkbox mn"></span> Select
								</label>
							  </th>
							  <th class="" style="width: 350px;">Title</th>
							  <th class="" style="width: 200px;">Description</th>
							  <th class="">Image</th>
							  <th class="">Language</th>
							  <th class="">Date</th>
							  <th class="text-right">Status</th>
							</tr>
						  </thead>
						  <tbody>
							<?php
							$ex_data = $db->db_get_array("SELECT * FROM $table WHERE 1=1 $where ORDER BY health_id DESC LIMIT $start, $end");
							$tot = count($ex_data);
							if ( $tot > 0) {
							foreach($ex_data as $data) {
							?>
							<tr>
							  <td class="">
								<label class="option block mn" style="width: 55px;">
								  <input type="checkbox" name="chk[]" value="<?=$data['health_id']?>" onClick="uncheck()" >
								  <span class="checkbox mn"></span>
								</label>
							  </td>

							  <td class="">
								<a title="Edit" href="home.php?pages=add-health-tips&edit_id=<?=$data['health_id']?>" style="text-transform: capitalize;"><?=$data['health_title']?></a>
							  </td>

							  <td class="" >
								<?php
								if($data['health_description'] != "") {
								?>
								<?=$data['health_description']?>
								<?php
								} else {
								?>
								- - - - -
								<?php }
								?>
							  </td>

							  <td class="" >
								<?php
								if($data['health_image'] != "") {
								?>
								<img src="../uploads/<?=$data['health_image']?>" width="100"/>
								<?php
								} else {
								?>
								- - - - -
								<?php }
								?>
							  </td>

                                                             <td class="" >
								<?php
								if($data['health_language'] != "") {
								?>
								<?=$data['health_language']?>
								<?php
								} else {
								?>
								- - - - -
								<?php }
								?>
							  </td>

							  <td class="" >
								<?php
								if($data['health_created'] != "") {
								?>
								<?= date('d F Y',strtotime($data['health_created']))?>
								<?php
								} else {
								?>
								- - - - -
								<?php }
								?>
							  </td>



								<?php
								if($data['health_status'] != 0) {
								?>

								<td class="text-right">
									<a href="home.php?pages=view-health-tips&status=0&id=<?=$data['health_id']?>" class="" title="Show">
									<button type="button" class="btn btn-success br2 btn-xs fs12 " > Active
									</button></a>
							    </td>
								<?php
								} else {
								?>
								<td class="text-right">
								<a href="home.php?pages=view-health-tips&status=1&id=<?=$data['health_id']?>" class="" title="Hide">
									<button type="button" class="btn btn-danger  br2 btn-xs fs12 dropdown-toggle" > Deactive
									</button></a>
							    </td>
								<?php } ?>
							</tr>
							<?php
							}
							}
							else{
							?>
								<td class="text-center" colspan="6">
									No Records Found !!!
							    </td>
							<?php
							}
							?>
						  </tbody>
						</table>
					  </div>
					  <?php
						$ex_data = $db->db_get_array("SELECT * FROM $table WHERE 1=1 $where ORDER BY health_id DESC ");
						$new = count($ex_data);

						if ( $new > 0) {
					  ?>
					    <div class="dt-panelfooter clearfix">
							<div class="dataTables_info" id="datatable_info" role="status" aria-live="polite" style="padding-left: 15px;">
								<a href="javascript:godelete()" alt="Delete"><i class="fa fa-trash-o delete"></i></a>
							</div>
							<div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
								<ul class="pagination">
								<?php
								$tot_page = ceil($new/$end);
								$prev_link = ($_GET['start'] > 0) ? "home.php?pages=view-health-tips&start=".($_GET['start'] - 1) : "javascript: return void(0)";
								?>
									<li class="paginate_button previous <?php if(!isset($_GET['start']) || ($_GET['start'] == 0)) echo 'disabled'; ?>" aria-controls="datatable" tabindex="0" id="datatable_previous" ><a href="<?php echo $prev_link ?>">Previous</a></li>

								<?php
								for($pn = 0; $pn < $tot_page; $pn++) {
									$page_link = ($_GET['start'] == $pn) ? "javascript: return void(0)" : "home.php?pages=view-health-tips&start=".$pn;
								?>
									<li class="paginate_button <? if($_GET['start'] == $pn) echo 'active'; ?>" aria-controls="datatable" tabindex="0"><a href="<?=$page_link?>"><?php echo $pn + 1; ?></a></li>
								<?php
								}
								$next_link = ($_GET['start'] < $tot_page - 1) ? "home.php?pages=view-health-tips&start=".($_GET['start'] + 1) : "javascript: return void(0)";
								?>

									<li class="paginate_button next <?php if(($_GET['start'] == $tot_page - 1)) echo 'disabled'; ?>" aria-controls="datatable" tabindex="0" id="datatable_next" ><a href="<?=$next_link?>">Next</a></li>
								</ul>
							</div>
						</div>
						<?php
							}
						?>
					</form>
					</div>
				  </div>
				</div>
            </div>
		</div>

      </section>
      <!-- End: Content -->
	  <?php include('fixfooter.php') ?>
    </section>
</div>
