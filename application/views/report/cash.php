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
                    		
                    		<div class="col-md-10">
                    			<label>Date</label>
                    			<input type="date" name="date" class="form-control" value="<?php echo (isset($post)) ? $post['date'] : '' ?>">
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
                                        <th>Saleman</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $balance = 0;
							    		foreach ($entries as $module) {
                                            $balance += $module['amount'];
							    	?>
                                        <tr>
                                            <td>
                                                <?php echo $module["id"] ?>
                                            </td>
                                            <td>
                                                <?php echo $module["name"] ?>
                                            </td>
                                            <td>
                                                <?php echo $module["amount"] ?>
                                            </td>
                                        </tr>
                                    <?php 

                                        } 
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td>Total</td>
                                        <td><?php echo $balance ?></td>
                                    </tr>
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