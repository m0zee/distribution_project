
<!-- /.Navbar  Static Side -->
<div class="control-sidebar-bg"></div>
<!-- Page Content -->
<div id="page-wrapper">
    <!-- main content -->
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon">
                <i class="pe-7s-note2"></i>
            </div>
            <div class="header-title">
                <h1>Add Sign bills</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Add Sign bills</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>sign_bills/insert" enctype="multipart/form-data">

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Add Sign bills</h4>
                            </div>
                        </div>
                        <div class="panel-body"><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Party Name<span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="Party_Name" required="">
                                                <option>Select Party Name</option><?php foreach ($table_shops as $t) {?>
                                                    <option value="<?php echo $t["id"] ?>"><?php echo $t["Name"] ?></option>
                                               <?php } ?></select>
                                        </div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Address<span class="required">*</span></label>
                                        <div class="col-sm-9"><input class="form-control" name="Address" type="text" value="" id="example-text-input" placeholder="" required=""></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Bill NO<span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="Bill_NO" required="">
                                                <option>Select Bill NO</option><?php foreach ($table_billing as $t) {?>
                                                    <option value="<?php echo $t["id"] ?>"><?php echo $t["id"] ?></option>
                                               <?php } ?></select>
                                        </div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Net Amount<span class="required">*</span></label>
                                        <div class="col-sm-9"><input class="form-control" name="Net_Amount" type="text" value="" id="example-text-input" placeholder="" required=""></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Signed Amount<span class="required">*</span></label>
                                        <div class="col-sm-9"><input class="form-control" name="Signed_Amount" type="text" value="" id="example-text-input" placeholder="" required=""></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Due Date<span class="required">*</span></label>
                                        <div class="col-sm-9"><input class="form-control" name="Due_Date" type="date" value="" id="example-text-input" placeholder="" required=""></div>

                                    </div><div class="form-group row">

                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary pull-right">Add</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

</div>
<!-- /.main content -->
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- START CORE PLUGINS -->
