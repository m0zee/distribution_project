
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
                <h1>Add Salesreturn</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Add Salesreturn</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>salesreturn/insert" enctype="multipart/form-data">

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Add Salesreturn</h4>
                            </div>
                        </div>
                        <div class="panel-body"><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Company<span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control company" name="company" required="">
                                                <option>Select Company</option><?php foreach ($table_company as $t) {?>
                                                    <option value="<?php echo $t["id"] ?>"><?php echo $t["Name"] ?></option>
                                               <?php } ?></select>
                                        </div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Booker<span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="booker" required="">
                                                <option>Select Booker</option><?php foreach ($table_booker as $t) {?>
                                                    <option value="<?php echo $t["id"] ?>"><?php echo $t["Name"] ?></option>
                                               <?php } ?></select>
                                        </div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Shop<span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="shop" required="">
                                                <option>Select Shop</option><?php foreach ($table_shops as $t) {?>
                                                    <option value="<?php echo $t["id"] ?>"><?php echo $t["Name"] ?></option>
                                               <?php } ?></select>
                                        </div>

                                    </div>
                                    <!-- <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Discount</label>
                                        <div class="col-sm-9"><input class="form-control" name="discount" type="number" value="" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Total</label>
                                        <div class="col-sm-9"><input class="form-control" name="total" type="number" value="" id="example-text-input" placeholder="" ></div>

                                    </div> -->

                            <div class="form-group row after-add-sub">
                                <div class="col-md-1">
                                    <label for="example-text-input" class="col-form-label">Product
                                        <span class="required">*</span>
                                    </label>
                                    <select name="product[0][product_id]" data-name="product_id" class="form-control product-list">
                                        <option value="">Please Select</option>
                                    </select>
                                </div>
                            
                                <div class="col-md-2">
                                    <label for="example-text-input" class="col-form-label">Fresh Quantity
                                        <span class="required">*</span>
                                    </label>
                                    <input type="number" class="form-control f_qty" name="product[0][f_qty]" data-name="f_qty">
                                </div>

                                <div class="col-md-2">
                                    <label for="example-text-input" class="col-form-label">Damage Quantity
                                        <span class="required">*</span>
                                    </label>
                                    <input type="number" class="form-control d_qty" name="product[0][d_qty]" data-name="d_qty">
                                </div>

                                <div class="col-md-1">
                                    <label for="example-text-input" class="col-form-label">Rate
                                        <span class="required">*</span>
                                    </label>
                                    <input type="number" class="form-control rate" name="product[0][rate]" data-name="rate">
                                </div>
                                <div class="col-md-2">
                                    <label for="example-text-input" class="col-form-label">Sale value
                                        <span class="required">*</span>
                                    </label>
                                    <input type="number" class="form-control gross_value" name="product[0][sale_value]" data-name="gross_value">
                                </div>
                                <div class="col-md-1">
                                    <label for="example-text-input" class="col-form-label">Discount
                                        <span class="required">*</span>
                                    </label>
                                    <input type="number" class="form-control discount" name="product[0][discount]" data-name="discount">
                                </div>
                                <div class="col-md-2">
                                    <label for="example-text-input" class="col-form-label">Total
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" readonly="" class="form-control total" name="product[0][total]" data-name="total">
                                </div>
                                <div class="col-lg-1 delet pull-right">
                                    <label for="">&nbsp;</label>
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
                            row += "<option data-json='"+JSON.stringify(val)+"' value='"+val.id+"'>"+val.Name+"</option>";
                        });
                    }



                    $('.product-list').html(row);
                }
            }
        })
        
    });

    $('.panel-body').on('change', '.product-list', function() {
        if ($('option:selected', this).val() > 0) 
        {
            var product_data = $('option:selected', this).data('json');
            var current_row = $(this).parent().parent();

            $(current_row).find('.rate').val(product_data.sale_price);
            calculate_total(current_row);
            
        }

    });

    $('.panel-body').on('keyup', '.f_qty, .d_qty, .rate, .gross_value, .discount', function(){
        var current_row = $(this).parent().parent();

            // $(current_row).find('.rate').val(product_data.purchase_price);
            calculate_total(current_row);
    })



    function calculate_total(current_row){
        var f_qty = $(current_row).find('.f_qty').val();
        var d_qty = $(current_row).find('.d_qty').val();
        var qty = parseInt(d_qty) + parseInt(f_qty);
        var rate = $(current_row).find('.rate').val();
        var gross_value = qty * rate;
            $(current_row).find('.gross_value').val(gross_value);
        var discount = $(current_row).find('.discount').val();

        var total_value = gross_value - (gross_value * discount / 100);
        $(current_row).find('.total').val(total_value); 
    }

     $("body").on("click",".add-sub",function(){
        var html = $(".after-add-sub").first().clone();
        $(html).find(".delet").html("<a class='btn btn-danger remove'><i class='fa fa-trash-o' aria-hidden='true'></i> </a> "+' <a class="btn btn-success add-sub"><strong> + </strong> </a>');
        $(".after-add-sub").last().after(html);
        var all_input = $(".after-add-sub").last().find('input');
        $.each(all_input, function(index, val) {
            $(val).val('');
        });
        reset_field_name();
        
    });

     $("body").on("click",".remove",function(){
        $(this).parents(".after-add-sub").remove();
        reset_field_name();
    });

     function reset_field_name(){
        var con = 0
        $(".after-add-sub").each(function() {
             var name = $(this).find('select').data('name');
            $(this).find('select').attr('name', 'product['+con+']['+name+']');
            var all_input = $(this).find('input');
            $.each(all_input, function(index, val) {
                var name = $(this).data('name');
                $(val).attr('name', 'product['+con+']['+name+']');
            });
            con++
        })
     }
</script>