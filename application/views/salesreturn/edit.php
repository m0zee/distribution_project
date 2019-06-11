
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
                <h1>Edit Salesreturn</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Edit Salesreturn</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>salesreturn/update" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $salesreturn["id"] ?>">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Edit Salesreturn</h4>
                            </div>
                        </div>
                        <div class="panel-body"><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Company<span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="company" required="">
                                                <option>Select Company</option><?php foreach ($table_company as $t) {?>
                                                    <option value="<?php echo $t["id"] ?>" <?php if($t["id"] == $salesreturn["company"]) echo "selected" ?>><?php echo $t["Name"] ?></option>
                                               <?php } ?></select>
                                        </div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Booker<span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="booker" required="">
                                                <option>Select Booker</option><?php foreach ($table_booker as $t) {?>
                                                    <option value="<?php echo $t["id"] ?>" <?php if($t["id"] == $salesreturn["booker"]) echo "selected" ?>><?php echo $t["Name"] ?></option>
                                               <?php } ?></select>
                                        </div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Shop<span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="shop" required="">
                                                <option>Select Shop</option><?php foreach ($table_shops as $t) {?>
                                                    <option value="<?php echo $t["id"] ?>" <?php if($t["id"] == $salesreturn["shop"]) echo "selected" ?>><?php echo $t["Name"] ?></option>
                                               <?php } ?></select>
                                        </div>

                                    </div>





                                    <div class="form-group row">

                                        <label for="example-text-input" class="col-sm-3 col-form-label">Product
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="shop" required="">
                                                <option>Select Product</option>
                                                <?php foreach ($table_products as $t) {?>
                                                    <option value="<?php echo $t["id"] ?>" <?php if($t["id"] == $salesreturn["shop"]) echo "selected" ?>><?php echo $t["Name"] ?></option>
                                                <?php } ?>
                                           </select>
                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="example-text-input" class="col-sm-3 col-form-label">Fresh Qty</label>
                                        <div class="col-sm-9">

                                            <input class="form-control" name="fresh_qty" type="number" value="<?php echo $salesreturn["fresh_qty"] ?>" id="example-text-input" placeholder="" >
                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="example-text-input" class="col-sm-3 col-form-label">Damage Qty</label>
                                        <div class="col-sm-9">

                                            <input class="form-control" name="damage_qty" type="number" value="<?php echo $salesreturn["damage_qty"] ?>" id="example-text-input" placeholder="" >
                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="example-text-input" class="col-sm-3 col-form-label">Rate</label>
                                        <div class="col-sm-9">

                                            <input class="form-control" name="rate" type="number" value="<?php echo $salesreturn["rate"] ?>" id="example-text-input" placeholder="" >
                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="example-text-input" class="col-sm-3 col-form-label">Gross amount</label>
                                        <div class="col-sm-9">

                                            <input class="form-control" name="gross_value" type="number" value="<?php echo $salesreturn["gross_value"] ?>" id="example-text-input" placeholder="" >
                                        </div>

                                    </div>






                                    <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Discount</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="discount" type="number" value="<?php echo $salesreturn["discount"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div>
                                    <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Total</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="total" type="number" value="<?php echo $salesreturn["total"] ?>" id="example-text-input" placeholder="" ></div>

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
