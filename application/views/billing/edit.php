
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
                <h1>Edit Billing</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Edit Billing</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>billing/update" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $billing["id"] ?>">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Edit Billing</h4>
                            </div>
                        </div>
                        <div class="panel-body"><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Company<span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="Company" required="">
                                                <option>Select Company</option><?php foreach ($table_company as $t) {?>
                                                    <option value="<?php echo $t["id"] ?>" <?php if($t["id"] == $billing["Company"]) echo "selected" ?>><?php echo $t["Name"] ?></option>
                                               <?php } ?></select>
                                        </div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Booker<span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="Booker" required="">
                                                <option>Select Booker</option><?php foreach ($table_booker as $t) {?>
                                                    <option value="<?php echo $t["id"] ?>" <?php if($t["id"] == $billing["Booker"]) echo "selected" ?>><?php echo $t["Name"] ?></option>
                                               <?php } ?></select>
                                        </div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Date<span class="required">*</span></label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Date" type="date" value="<?php echo $billing["Date"] ?>" id="example-text-input" placeholder="" required=""></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Shop<span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="Shop" required="">
                                                <option>Select Shop</option><?php foreach ($table_shops as $t) {?>
                                                    <option value="<?php echo $t["id"] ?>" <?php if($t["id"] == $billing["Shop"]) echo "selected" ?>><?php echo $t["Name"] ?></option>
                                               <?php } ?></select>
                                        </div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Discount<span class="required">*</span></label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Discount" type="number" value="<?php echo $billing["Discount"] ?>" id="example-text-input" placeholder="" required=""></div>

                                    </div><div class="form-group row">

                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary pull-right">Update</button>
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
