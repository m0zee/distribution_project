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
                <h1>Edit Product</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Edit Product</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>product/update" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $product["id"] ?>">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Edit Product</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Name<span class="required">*</span></label>
                                <div class="col-sm-9">

                                    <input class="form-control" name="Name" type="text" value="<?php echo $product["Name"] ?>" id="example-text-input" placeholder="" required="">
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Company<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="Company" required="">
                                        <option>Select Company</option>
                                        <?php foreach ($table_company as $t) {?>
                                            <option value="<?php echo $t["id"] ?>" <?php if($t[ "id"]==$product["Company"]) echo "selected" ?>>
                                                <?php echo $t["Name"] ?>
                                            </option>
                                            <?php } ?>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Code<span class="required">*</span></label>
                                <div class="col-sm-9">

                                    <input class="form-control" name="Code" type="text" value="<?php echo $product["Code"] ?>" id="example-text-input" placeholder="" required="">
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Packing type</label>
                                <div class="col-sm-9">
                                    <input type="text" value="<?php echo $product["packing_type"] ?>" class="form-control" name="packing_type">
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Quantity in a pack</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?php echo $product["qty"] ?>" name="qty">
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Purchase Price</label>
                                <div class="col-sm-9">
                                    <input type="number" value="0" class="form-control" name="purchase_price">
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Sale Price</label>
                                <div class="col-sm-9">
                                    <input type="number" value="0" class="form-control" name="sale_price">
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">

                                    <textarea class="form-control" name="Description">
                                        <?php echo $product["Description"] ?>
                                    </textarea>
                                </div>

                            </div>
                            <div class="form-group row">

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