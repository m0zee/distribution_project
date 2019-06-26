
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
        <?php $temp = []; ?>
        <?php foreach ($table_product as $tp){
            $tp['used_qty'] = 0;
            $temp[$tp['id']] = $tp;
        }

        ?>
        <script>
            var product_stock = <?php echo json_encode($temp);  ?>
            
        </script>
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
                        <div class="panel-body main-div"><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Company<span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="Company" readonly required="">
                                                <option>Select Company</option><?php foreach ($table_company as $t) {?>
                                                    <option value="<?php echo $t["id"] ?>" data-slap='<?php echo $t['slap'] ?>' <?php if($t["id"] == $billing["Company"]) echo "selected" ?>><?php echo $t["Name"] ?></option>
                                               <?php } ?></select>
                                        </div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Booker<span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="Booker" readonly required="">
                                                <option>Select Booker</option><?php foreach ($table_booker as $t) {?>
                                                    <option value="<?php echo $t["id"] ?>" <?php if($t["id"] == $billing["Booker"]) echo "selected" ?>><?php echo $t["Name"] ?></option>
                                               <?php } ?></select>
                                        </div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Date<span class="required">*</span></label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Date" readonly type="date" value="<?php echo $billing["Date"] ?>" id="example-text-input" placeholder="" required=""></div>

                                    </div>
                                    <div class="form-group row">

                                        <label for="example-text-input" class="col-sm-3 col-form-label">Shop<span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="Shop" readonly required="">
                                                <option>Select Shop</option><?php foreach ($table_shops as $t) {?>
                                                    <option value="<?php echo $t["id"] ?>" <?php if($t["id"] == $billing["Shop"]) echo "selected" ?>><?php echo $t["Name"] ?></option>
                                               <?php } ?></select>
                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="example-text-input" class="col-sm-3 col-form-label">Company Discount<span class="required">*</span></label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="company_discount" type="number" value="<?php echo $billing["company_discount"] ?>" id="example-text-input" placeholder="" required=""></div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="example-text-input" class="col-sm-3 col-form-label">Discount<span class="required">*</span></label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Discount" type="number" value="<?php echo $billing["Discount"] ?>" id="example-text-input" placeholder="" required=""></div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="example-text-input" class="col-sm-3 col-form-label">Extra Discount<span class="required">*</span></label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="extra_discount" type="number" value="<?php echo $billing["extra_discount"] ?>" id="example-text-input" placeholder="" required=""></div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="example-text-input" class="col-sm-3 col-form-label">TO<span class="required">*</span></label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="extra_discount" type="number" value="<?php echo $billing["t_o"] ?>" id="example-text-input" placeholder="" required=""></div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="example-text-input" class="col-sm-3 col-form-label">Total Amount<span class="required">*</span></label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Total_Amount" type="number" step="any" value="<?php echo $billing["Total_Amount"] ?>" id="example-text-input" placeholder="" required=""></div>

                                    </div>

                                    
                                    <div class="hide-div row">
                                        <div class="form-group col-md-2">
                                            <label>Product</label>
                                            <br>
                                            <select class="form-control product product-list" name="product[0][]">
                                                <option value="">Select Product</option>
                                                <?php foreach ($table_product as $t) {?>
                                                    <option value="<?php echo $t["id"] ?>" 
                                                        data-json='<?php echo json_encode($t) ?>'
                                                        data-price="<?php echo $t['sale_price'] ?>">
                                                        <?php echo $t["Name"] ?>
                                                    </option>
                                                    <?php } ?>
                                            </select>
                                            <!-- <input type="number" name="product[]" class="form-control"> -->
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Rate</label>
                                            <br>
                                            <input type="number" name="rate[0][]" class="form-control rate">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Quantity</label>
                                            <br>
                                            <input type="number" name="quantity[0][]" class="form-control qty">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Gross Amount</label>
                                            <br>
                                            <input type="text" readonly="" name="gross[0][]" class="form-control gross">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Discount</label>
                                            <br>
                                            <input type="number" name="product_discount[0][]" class="form-control product_discount">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Total</label>
                                            <br>
                                            <input type="text" name="product_total[0][]" readonly="" class="form-control product_total">
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-lg-2 delet pull-right">
                                                <button type="button" class="add-relation btn btn-success ">Add More</button>
                                            </div>
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
<script type="text/javascript">
    $("body").on("click", ".add-relation", function() {
        var html = $(".hide-div").first().clone();
        $(html).find(".delet").html("<a class='btn btn-danger remove-relation'><i class='fa fa-trash-o' aria-hidden='true'></i> </a> " + ' <a class="btn btn-success add-relation"><strong> + </strong> </a>');
        $(".hide-div").last().after(html);
        $(".hide-div").last().find('input,select').not('input[type="checkbox"]').val('')
        $(".hide-div").last().find('input[type="checkbox"]').removeAttr('checked')
    });
    $('body').on('change', 'select.product', function() {
        set_producttotal($(this).parents('.hide-div'))
    })
    $('body').on('keyup', '.qty, .product_discount', function() {
        set_producttotal($(this).parents('.hide-div'), ($(this).hasClass('product_discount')) ? true : false)
    })
    $('body').on('keyup', 'input.qty, [name="company_discount"], [name="extra_discount"], [name="t_o"]', function() {
        set_disandtotal($(this).parents('.main-div'))
    })
    $('body').on('keyup', 'input[name="Discount"]', function() {
        set_disandtotal($(this).parents('.main-div'), $(this).val())
    })
    $('body').on('change', 'select.product, [name="Company"]', function() {
        set_disandtotal($(this).parents('.main-div'))
    })
    
    function set_producttotal(div, dis = false) {
        var product = div.find('select.product option:selected').attr('data-json')
        product = JSON.parse(product)
        div.find('.rate').val(product.sale_price)
        if (!dis) {
            div.find('.product_discount').val(product.discount)
        }
        if (!div.find('.qty').val()) {
            div.find('.qty').val(0)
        }
        var qty = div.find('.qty').val()
        div.find('.gross').val((product.sale_price * qty))
        var total = (product.sale_price * qty)
        var discount = div.find('.product_discount').val()
        total = total - (total * discount / 100);
        div.find('.product_total').val(total)
        //console.log(JSON.parse(product))
    }
    function set_disandtotal(main, dis = false) {
        var total = 0;
        var gross_total = 0;
        main.find('select.product').each(function() {
            //alert($(this).parents('.hide-div').find('input.product_total').val())
            // var price = $(this).find('option:selected').attr('data-price')
            // var qty = $(this).parents('.hide-div').find('input.qty').val()
            // total += (price * qty)
            total += parseInt($(this).parents('.hide-div').find('input.product_total').val())
            var product = $(this).find('option:selected').attr('data-json')
            product = JSON.parse(product)
            if (product.Slap != 'No') {
                gross_total += parseInt($(this).parents('.hide-div').find('input.product_total').val())
            }
        })
        var dis_array = $('[name="Company"] option:selected').attr('data-slap')
        //var dis_array = main.find('[name="Company"] option:selected').attr('data-slap')
        if (dis) {
            var discount = dis
        }
        else{
            var discount = get_dis(dis_array, gross_total)
        }
        main.find('[name="Discount"]').val(discount)
        var discount_total = 0;
        if (discount) {
            discount_total += (gross_total * discount / 100);
        }
        if(main.find('[name="company_discount"]').val()){
            discount_total += (total * parseInt(main.find('[name="company_discount"]').val()) / 100);
        }
        if(main.find('[name="extra_discount"]').val()){
            discount_total += (total * parseInt(main.find('[name="extra_discount"]').val()) / 100);
        }
        if(main.find('[name="t_o"]').val()){
            discount_total += parseInt(main.find('[name="t_o"]').val());
        }
        
        // alert(gross_total)
        // alert(discount_total)
        // alert(total)
        total = (total - discount_total)
        // if (discount) {
        //     discount = (parseInt(discount) + parseInt(main.find('[name="company_discount"]').val()) + parseInt(main.find('[name="extra_discount"]').val()))
        //     //discount = '0.0'+discount
        //     total = total - ((total * discount / 100) + parseInt(main.find('[name="t_o"]').val()));
        //     //total = total - (total * discount)
        // }
        // else{
        //     discount = (parseInt(main.find('[name="company_discount"]').val()) + parseInt(main.find('[name="extra_discount"]').val()))
        //     //discount = '0.0'+discount
        //     total = total - ((total * discount / 100) + parseInt(main.find('[name="t_o"]').val()));
        //     //total = total - (total * discount / 100);
        //     //total = total - (total * discount)
        // }
        main.find('[name="Total_Amount"]').val(total)
    }
    function get_dis(array, total) {
        array = JSON.parse(array)
        for (var i = 0; i < array.dis.length; i++) {
            if (total >= array.min[i] && total <= array.max[i]) {
                return array.dis[i]
            }
        }
    }


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
                            row += "<option data-json='"+JSON.stringify(val)+"' value='"+val.id+"' data-price="+val.sale_price+">"+val.Name+"</option>";
                        });
                    }



                    $('.product-list').html(row);
                }
            }
        })
        
    });

    $('.company').first().on('change', function(event) {
        select_auto_hidden_dropdown('.company', $(this).val());
    });

    $('.booker').first().on('change', function(event) {
        select_auto_hidden_dropdown('.booker', $(this).val());
    });

    $('.billing_date').first().on('change', function(event) {
        select_auto_hidden_dropdown('.billing_date', $(this).val());
    });


    function select_auto_hidden_dropdown(selector_class, value){
        $(selector_class).not(":eq(0)").val(value);
    }


    $('body').on('change', '.qty', function(){
        
        $.each(product_stock, function(index, val) {
            val.used_qty = 0;
        });
        // qty         = $(this).val();
        // $this = $(this);
        // product_id  = $(this).closest('.row').find('select').val()
        // console.log(qty);
        get_all_product_and_qty();
        // available_stock(qty, product_id, $this);
    });



    function available_stock(qty, product_id, $this) {
        if (parseInt(product_stock[product_id].stock_in_hand) > parseInt(product_stock[product_id].used_qty)) 
        {
            var available_qty = parseInt(product_stock[product_id].stock_in_hand) - (parseInt(product_stock[product_id].used_qty) + parseInt(qty));
            // console.log(available_qty);
            if (available_qty < 0) 
            {
                alert( parseInt(product_stock[product_id].stock_in_hand) - parseInt(product_stock[product_id].used_qty) + ' available qty');
                // $this.val('');
            }
            else{

                product_stock[product_id].used_qty = parseInt(product_stock[product_id].stock_in_hand) - available_qty;
            }


        }
    }


    // second try to calculate stock

    function get_all_product_and_qty() {

        $.each($('.hide-div .product'), function(index, val) {
            var qty = $(val).closest('.row').find('.qty').val();
            var product_id = $(val).val();
            var row = $(val).closest('.row');
            available_stock(qty, product_id, row);
        });
    }
</script>

<script>
    var billing_detail = <?php echo json_encode($billing_detail) ?>;
    count_details = billing_detail.length;
    if (count_details > 0) 
    {
        i = 1;
        $.each(billing_detail, function(index, val) {
            print_product_row(val, i);
            if (i == count_details) 
            {
                return
            }
            $('.add-relation').last().click();

            i++;
        });
    }

    function print_product_row(val) {
        console.log(val);
        console.log(parseInt(product_stock[val.product_id].stock_in_hand) + parseInt(val.qty))
        product_stock[val.product_id].stock_in_hand = parseInt(product_stock[val.product_id].stock_in_hand) + parseInt(val.qty)
        $('.hide-div').last().find('.product').val(val.product_id);
        $('.hide-div').last().find('.qty').val(val.qty);
        $('.hide-div').last().find('.rate').val(val.rate);
        $('.hide-div').last().find('.gross').val(val.gross);
        $('.hide-div').last().find('.product_discount').val(val.product_discount);
        $('.hide-div').last().find('.product_total').val(val.product_total);
    }


</script>