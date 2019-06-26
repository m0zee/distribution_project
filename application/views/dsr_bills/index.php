		<!-- /.Navbar  Static Side -->
			<div class="control-sidebar-bg"></div>
			<!-- Page Content -->
			<div id="page-wrapper">
				<!-- main content -->
				<div class="content">
					<!-- Content Header (Page header) -->
					<div class="content-header">
						<div class="header-icon">
							<i class="pe-7s-box1"></i>
						</div>
						<div class="header-title">
							<h1>View Dsr bills</h1>
							<small> </small>
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> Home</a></li>

								<li class="active">View Dsr bills</li>
							</ol>
						</div>
					</div> <!-- /. Content Header (Page header) -->

					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-bd">
								<div class="panel-heading">
									<div class="panel-title">
										<h4>View Dsr bills</h4>
										<?php 
											if ($permission["created"] == "1") {
										?>
										<a href="<?php echo base_url("dsr_bills/create") ?>"><button class="btn btn-info pull-right">Add Dsr bills</button></a>
										<?php } ?>
									</div>
								</div>
								<div class="panel-body">
									
									<div class="table-responsive">
										<table id="dataTableExample2" class="table table-bordered table-striped table-hover">
											<thead>
												<tr>
													<th>Id</th><th>Name</th><th>Date</th><th>Total Amount</th><th>Return Amount</th><th>Sales Return Amount</th><th>Cheque Amount</th><th>Sign Bill Amount</th><th>Recovery Amount</th><th>Final Amount</th><th>Cash Amount</th><?php 
														if ($permission["edit"] == "1" || $permission["deleted"] == "1"){
													?>
													<th>Action</th>
													<?php } ?>
												</tr>
											</thead>
										    <tbody>
										    	<?php
										    		foreach ($dsr_bills as $module) {
										    	?>
												<tr>
													<td><?php echo $module["id"] ?></td><td><?php echo $module["Name"] ?></td><td><?php echo $module["Date"] ?></td><td><?php echo $module["Total_Amount"] ?></td><td><?php echo $module["return_amount"] ?></td><td><?php echo $module["dsr_sales_return"] ?></td><td><?php echo $module["dsr_cheque"] ?></td><td><?php echo $module["dsr_sign_bills"] ?></td><td><?php echo $module["dsr_recovery"] ?></td><td><?php echo $module["dsr_total"] ?></td><td><?php echo $module["dsr_cash"] ?></td>
													<td>
														<!-- <a href="<?php echo base_url('dsr_bills/dsr/'.$module['id']) ?>" class="btn btn-info">Print DSR</a> -->
														<?php 
															if (!$module['salesmen']) {
														?>
														<a href="<?php echo base_url('dsr_bills/bills/'.$module['id']) ?>" class="btn btn-info">Print Bills</a>
														<a href="<?php echo base_url('dsr_bills/load_sheet/'.$module['id']) ?>" class="btn btn-info">Print Load Sheet</a>
														<?php } ?>
														
														<?php 
															if (!$module['return_amount']) {
														?>
														<a href="<?php echo base_url('dsr_bills/submit_return/'.$module['id']) ?>" class="btn btn-info">Submit Return</a>
														<?php } ?>
														
														<?php 
															if (!$module['salesmen']) {
														?>
														<a href="<?php echo base_url('dsr_bills/submit_dsr/'.$module['id']) ?>" class="btn btn-info">Submit DSR</a>
														<?php } ?>
													</td>
													<?php 
														if ($permission["edit"] == "1" || $permission["deleted"] == "1"){
													?>
													<!-- <td>
														<?php 
															if ($permission["edit"] == "1") {
														?>
														<a href="<?php echo base_url() ?>dsr_bills/edit/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/record1.png" title="View Order" alt="View Order" width="35" height="35"></a>
														<?php } ?>
														<?php 
															if ($permission["deleted"] == "1") {
														?>
		                                                <a href="<?php echo base_url() ?>dsr_bills/delete/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/d-icon.png" title="Delete" alt="Delete" width="35" height="35"></a>
		                                                <?php } ?>
	                                                </td> -->
	                                                <?php } ?>
												</tr>
												<?php } ?>
											</tbody>
										</table>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="height: 450px;"></div>
				</div> <!-- /.main content -->
			</div><!-- /#page-wrapper -->
		</div><!-- /#wrapper -->
		<!-- START CORE PLUGINS -->






