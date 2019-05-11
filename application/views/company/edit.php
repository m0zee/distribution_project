
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
                <h1>Edit Company</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Edit Company</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>company/update" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $company["id"] ?>">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Edit Company</h4>
                            </div>
                        </div>
                        <div class="panel-body"><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Name<span class="required">*</span></label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Name" type="text" value="<?php echo $company["Name"] ?>" id="example-text-input" placeholder="" required=""></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Code<span class="required">*</span></label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Code" type="text" value="<?php echo $company["Code"] ?>" id="example-text-input" placeholder="" required=""></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Address" type="textarea" value="<?php echo $company["Address"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">

                                        <textarea class="form-control" name="Description" ><?php echo $company["Description"] ?></textarea></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Min Slap</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Min_Slap" type="text" value="<?php echo $company["Min_Slap"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Max Slap</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Max_Slap" type="text" value="<?php echo $company["Max_Slap"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Discount Percentage</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Discount_Percentage" type="number" value="<?php echo $company["Discount_Percentage"] ?>" id="example-text-input" placeholder="" ></div>

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
