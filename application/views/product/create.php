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
                <h1>Add Product</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Add Product</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>product/insert" enctype="multipart/form-data">

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Add Product</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Name<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="Name" type="text" value="" id="example-text-input" placeholder="" required="">
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Company<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="Company" required="">
                                        <option>Select Company</option>
                                        <?php foreach ($table_company as $t) {?>
                                            <option value="<?php echo $t["id"] ?>">
                                                <?php echo $t["Name"] ?>
                                            </option>
                                            <?php } ?>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Product Type<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control product_type" name="Type" required="">
                                        <option>Select Product Type</option>
                                        <?php //foreach ($table_type as $t) {?>
                                            <!-- <option value="<?php //echo $t["id"] ?>">
                                                <?php //echo $t["Name"] ?>
                                            </option> -->
                                            <?php //} ?>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Code<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="Code" type="text" value="" id="example-text-input" placeholder="" required="">
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Packing type</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="packing_type">
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Quantity in a pack</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="qty">
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Stock In hand</label>
                                <div class="col-sm-9">
                                    <input type="number" value="0" class="form-control" name="stock_in_hand">
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Product Discount</label>
                                <div class="col-sm-9">
                                    <input type="text" value="0" class="form-control" name="discount">
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Purchase Price</label>
                                <div class="col-sm-9">
                                    <input type="text" value="0" class="form-control" name="purchase_price">
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Sale Price</label>
                                <div class="col-sm-9">
                                    <input type="text" value="0" class="form-control" name="sale_price">
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="Description"></textarea>
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
    
    $('select[name=Company]').change(function() {
        var company_id = $(this).val();
        get_product_type(company_id);
    });


    function get_product_type(company_id){
        if (company_id < 1) return false;

        $.ajax({
            url: '<?php echo base_url('product_type/get_product_type_by_company_id') ?>',
            type: 'POST',
            dataType: 'json',
            data: {company_id: company_id},
            success: function (res) {
                if ( res.status == 200 ) 
                {
                    var row = '';
                    row += '<option value="">Please Select</option>';
                    if ( res.data.length > 0 ) {
                        $.each(res.data, function(index, val) {
                            row += "<option value='"+val.id+"' >"+val.Name+"</option>";
                        });
                    }
                    $('.product_type').html(row);
                }
 
            }
        })
        
    }
</script>