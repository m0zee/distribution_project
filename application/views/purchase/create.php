
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
                                <div class="col-md-2">
                                    <label for="example-text-input" class="col-form-label">Product
                                        <span class="required">*</span>
                                    </label>
                                    <select name="product_id" class="form-control product-list">    
                                    </select>
                                </div>
                            
                                <div class="col-md-2">
                                    <label for="example-text-input" class="col-form-label">Quantity
                                        <span class="required">*</span>
                                    </label>
                                    <input type="number" class="form-control" name="qty">
                                </div>

                                <div class="col-md-2">
                                    <label for="example-text-input" class="col-form-label">Rate
                                        <span class="required">*</span>
                                    </label>
                                    <input type="number" class="form-control" name="rate">
                                </div>
                                <div class="col-md-2">
                                    <label for="example-text-input" class="col-form-label">Gross value
                                        <span class="required">*</span>
                                    </label>
                                    <input type="number" class="form-control" name="gross_value">
                                </div>
                                <div class="col-md-2">
                                    <label for="example-text-input" class="col-form-label">Discount
                                        <span class="required">*</span>
                                    </label>
                                    <input type="number" class="form-control" name="discount">
                                </div>
                                <div class="col-md-2">
                                    <label for="example-text-input" class="col-form-label">Total
                                        <span class="required">*</span>
                                    </label>
                                    <input type="number" class="form-control" name="total">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-2 delet pull-right">
                                    <button type="button" class="add-sub btn btn-success ">Add More</button>
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
            url: '<?php echo base_url() ?>'+'product/get_product',
            type: 'POST',
            dataType: 'json',
            data: {company_id: company_id},
            success:function(res){
                if ( res.status == 200 ) 
                {
                    var row = '';
                    row += '<option value="">Please Select</option>';

                    if ( res.data.length > 0 ) {
                        $.each(res.data, function(index, val) {
                            row += '<option value="'+val.id+'">'+val.Name+'</option>';
                        });
                    }

                    $('.product-list').html(row);
                }
            }
        })
        
    });

     $("body").on("click",".add-sub",function(){
        var html = $(".after-add-sub").first().clone();
        $(html).find(".delet").html("<a class='btn btn-danger remove'><i class='fa fa-trash-o' aria-hidden='true'></i> </a> "+' <a class="btn btn-success add-sub"><strong> + </strong> </a>');
        $(".after-add-sub").last().after(html);
        $(".after-add-sub").last().find('input,select').not('input[type="checkbox"]').val('')
        $(".after-add-sub").last().find('input[type="checkbox"]').removeAttr('checked')
        $(".after-add-sub").last().find('.hide-div').hide()
        var con = 0
        $(".after-add-sub").each(function() {
            $(this).find('input[type="checkbox"]').attr('name','required['+con+']')
            con++
        })
        get_tables()
        filed_type()
    });
</script>