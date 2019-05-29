
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
                <h1>Edit Ledger entries</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Edit Ledger entries</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>ledger_entries/update" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $ledger_entries["id"] ?>">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Edit Ledger entries</h4>
                            </div>
                        </div>
                        <div class="panel-body"><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Company<span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="Company" required="">
                                                <option>Select Company</option><?php foreach ($table_company as $t) {?>
                                                    <option value="<?php echo $t["id"] ?>" <?php if($t["id"] == $ledger_entries["Company"]) echo "selected" ?>><?php echo $t["Name"] ?></option>
                                               <?php } ?></select>
                                        </div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Date<span class="required">*</span></label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Date" type="number" value="<?php echo $ledger_entries["Date"] ?>" id="example-text-input" placeholder="" required=""></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Amount<span class="required">*</span></label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Amount" type="number" value="<?php echo $ledger_entries["Amount"] ?>" id="example-text-input" placeholder="" required=""></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Type<span class="required">*</span></label>
                                        <div class="col-sm-9">

                                        <select class="form-control" name="Type" required="">
        <option>Select Type</option><option value="Debit" <?php if("Debit" == $ledger_entries["Type"]) echo "selected" ?>>Debit</option><option value="Credit" <?php if("Credit" == $ledger_entries["Type"]) echo "selected" ?>>Credit</option></select></div>

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
