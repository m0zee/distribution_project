
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
                <h1>Add Purchase</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Add Purchase</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>purchase/insert" enctype="multipart/form-data">

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Add Purchase</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Company
                                    <span class="required">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <select class="form-control company" name="Company" required="">
                                        <option>Select Company</option><?php foreach ($table_company as $t) {?>
                                            <option value="<?php echo $t["id"] ?>"><?php echo $t["Name"] ?></option>
                                       <?php } ?></select>
                                </div>

                            </div>
                            <div class="form-group row">

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
<script>
    
    $('.company').change(function() {
        var company_id = $(this).val();
        $.ajax({
            url: <?php echo base_url() ?>+'product/get_product',
            type: 'POST',
            dataType: 'json',
            data: {company_id: company_id},
            success:function(res){
                
            }
        })
        
    });
</script>