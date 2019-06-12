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
                    		<div class="col-md-4">
                    			<label>Company</label>
                    			<select class="form-control" name="company">
                    				<option value="">Select Company</option>
                                    <?php
                                        foreach ($company as $key => $value) {
                                    ?>
                                    <option value="<?php echo $value['id'] ?>" <?php if(isset($post) && $post['company'] == $value['id']) echo 'selected' ?>><?php echo $value['Name'] ?></option>
                                    <?php } ?>
                    			</select>
                    		</div>
                    		<div class="col-md-4">
                    			<label>Start Date</label>
                    			<input type="date" name="start" class="form-control" value="<?php echo (isset($post)) ? $post['start'] : '' ?>">
                    		</div>
                    		<div class="col-md-4">
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
        <?php if(isset($ledger_entries)): ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>
                                View Ledger
                                <form method="post" action="<?php echo base_url('ledger/print_ledger') ?>">
                                    <input type="hidden" name="company" value="<?php echo $post['company'] ?>">
                                    <input type="hidden" name="start" value="<?php echo $post['start'] ?>">
                                    <input type="hidden" name="end" value="<?php echo $post['end'] ?>">
                                    <button type="submit" class="btn btn-info pull-right">Print</button>
                                </form>
                            </h4>
                        </div>
                    </div>
                    <div class="panel-body">

                        <div class="table-responsive">
                            <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Company</th>
                                        <th>Date</th>
                                        <th>Credit</th>
                                        <th>Debit</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $balance = $ledger_entries[0]['credit_amount'] - $ledger_entries[0]['debit_amount'];
							    		foreach ($ledger_entries as $module) {
                                            if ($module["Type"] =='Debit') {
                                                $balance -= $module['Amount'];
                                            }
                                            else{
                                                $balance += $module['Amount'];
                                            }
							    	?>
                                        <tr>
                                            <td>
                                                <?php echo $module["id"] ?>
                                            </td>
                                            <td>
                                                <?php echo $module["name"] ?>
                                            </td>
                                            <td>
                                                <?php echo $module["company"] ?>
                                            </td>
                                            <td>
                                                <?php echo $module["Date"] ?>
                                            </td>
                                            <td>
                                                <?php echo ($module['Type'] != 'Debit') ? $module["Amount"] : 0 ?>
                                            </td>
                                            <td>
                                                <?php echo ($module['Type'] == 'Debit') ? $module["Amount"] : 0 ?>
                                            </td>
                                            <td>
                                                <?php echo $balance ?>
                                            </td>
                                        </tr>
                                    <?php 

                                        } 
                                    ?>
                                </tbody>
                            </table>

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
<!-- START CORE PLUGINS -->