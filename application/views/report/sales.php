/.Navbar  Static Side -->
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
                <h1>View Ledger</h1>
                <small> </small>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">View Ledger</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Select Detail</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                    	<form method="post" action="">
                    		
                    		<div class="col-md-3">
                    			<label>Company</label>
                                <select class="form-control" name="company">
                                    <option value="">Select Company</option>
                                    <?php
                                        foreach ($table_company as $key => $value) {
                                    ?>
                                    <option value="<?php echo $value['id'] ?>" <?php if(isset($post) && $post['company'] == $value['id']) echo 'selected' ?>><?php echo $value['Name'] ?></option>
                                    <?php } ?>
                                </select>
                    		</div>
                            <div class="col-md-3">
                                <label>Booker</label>
                                <select class="form-control" name="booker">
                                    <option value="">Select Booker</option>
                                    <?php
                                        foreach ($table_booker as $key => $value) {
                                    ?>
                                    <option value="<?php echo $value['id'] ?>" <?php if(isset($post) && $post['booker'] == $value['id']) echo 'selected' ?>><?php echo $value['Name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label>Start Date</label>
                                <input type="date" name="start" class="form-control" value="<?php echo (isset($post)) ? $post['start'] : '' ?>">
                            </div>
                            <div class="col-md-2">
                                <label>End Date</label>
                                <input type="date" name="end" class="form-control" value="<?php echo (isset($post)) ? $post['end'] : '' ?>">
                            </div>
                            <div class="col-md-2 pull-right">
                                <br>
                                <button type="submit" class="btn btn-info pull-right">View</button>
                            </div>
                    	</form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->
        <?php if(isset($entries)): ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>
                                View Ledger
                            </h4>
                        </div>
                    </div>
                    <div class="panel-body">

                        <div class="table-responsive">
                            <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Date</th>
                                        <th>Booker</th>
                                        <th>Company</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $balance = 0;
                                        $return = 0;
							    		foreach ($entries as $module) {
                                            $balance += $module["amount"];
                                            $return += $module["dsr_sales_return"];
							    	?>
                                        <tr>
                                            <td>
                                                <?php echo $module["id"] ?>
                                            </td>
                                            <td>
                                                <?php echo $module["shop"] ?>
                                            </td>
                                            <td>
                                                <?php echo $module["booker"] ?>
                                            </td>
                                            <td>
                                                <?php echo $module["company"] ?>
                                            </td>
                                            <td>
                                                <?php echo $module["amount"] ?>
                                            </td>
                                        </tr>
                                    <?php 

                                        } 
                                    ?>
                                    <!-- <tr>
                                        <td></td>
                                        <td>Total</td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo $balance ?></td>
                                    </tr> -->
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        Total Sale: <?php echo $balance ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        Total Sale return: <?php echo $return ?>
                                    </div>
                                </div>
                                <?php 
                                    if (isset($type)) {
                                        foreach ($type as $key => $value) {
                                ?>
                                <div class="col-md-12">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        Total Sale <?php echo $value['Name'] ?>: <?php echo $value['amount'] ?>
                                    </div>
                                </div>
                                <?php } } ?>
                                <div class="col-md-12">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        Total To: <?php echo $to ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        Total Slap: <?php echo $slap ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        Total Company Discount: <?php echo $company_discount ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        Total Extra Discount: <?php echo $extra_discount ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    	<?php endif; ?>
        <div style="height: 450px;"></div>
    </div>
    <!-- /.main content -->
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- START CORE PLUGINS