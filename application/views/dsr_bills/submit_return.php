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
                <h1>Submit Return</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Submit Return</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->
        <form method="post" action="" enctype="multipart/form-data">

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Submit Return</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php 
                                foreach ($dsr_bills as $key => $value): 
                                    $rate = explode(',', $value['rate']);
                                    $product = explode(',', $value['product']);
                                    $detail_id = explode(',', $value['detail_id']);
                                    $qty = explode(',', $value['qty']);
                                    $product_discount = explode(',', $value['product_discount']);
                                    $product_total = explode(',', $value['product_total']);
                                    $slap = explode(',', $value['slap']);
                            ?>
                            <div class="main-div" style="border-bottom: 1px solid;margin-bottom: 10px;">
                                <input type="hidden" name="bill_id[]" value="<?php echo $value['id'] ?>">
                                <div class="form-group row">

                                    <label for="example-text-input" class="col-sm-3 col-form-label">Company<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="" class="form-control" readonly="" value="<?php echo $value['company'] ?>">
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label for="example-text-input" class="col-sm-3 col-form-label">Booker<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="" class="form-control" readonly="" value="<?php echo $value['booker'] ?>">
                                        
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label for="example-text-input" class="col-sm-3 col-form-label">Date<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control billing_date" name="" type="date" value="<?php echo date('Y-m-d', strtotime($value['Date'])) ?>" id="example-text-input" placeholder="" readonly>
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label for="example-text-input" class="col-sm-3 col-form-label">Shop<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="" class="form-control" readonly="" value="<?php echo $value['shop'] ?>">
                                        
                                    </div>

                                </div>

                                <div class="all-q ">
                                    <?php 
                                        foreach ($product as $k => $v) {
                                    ?>
                                    <div class="hide-div row">
                                        <input type="hidden" name="bill_detail_id[<?php echo $value['id'] ?>][]" value="<?php echo $detail_id[$k] ?>">

                                        <div class="form-group col-md-2">
                                            <label>Product</label>
                                            <br>
                                            <input type="text" name="" value="<?php echo $product[$k] ?>" readonly="" class="form-control">
                                            
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Rate</label>
                                            <br>
                                            <input type="text" value="<?php echo $rate[$k] ?>" readonly name="" class="form-control rate">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>Quantity</label>
                                            <br>
                                            <input type="text" value="<?php echo $qty[$k] ?>" readonly="" name="" class="form-control qty">
                                        </div>
                                        <input type="hidden" value="<?php echo $qty[$k] * $rate[$k] ?>" class="gross" name="">
                                        <div class="form-group col-md-2">
                                            <label>Return Quantity</label>
                                            <br>
                                            <input type="text" value="0" name="return_qty[<?php echo $value['id'] ?>][]" class="form-control return_qty">
                                        </div>
                                        <input type="hidden" name="" value="<?php echo trim($slap[$k]) ?>" class="slap">
                                        <div class="form-group col-md-1">
                                            <label>Discount</label>
                                            <br>
                                            <input type="text" value="<?php echo $product_discount[$k] ?>" readonly="" name="" class="form-control product_discount">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Bill Total</label>
                                            <br>
                                            <input type="text" value="<?php echo $product_total[$k] ?>" name="" readonly class="form-control product_total">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Final Total</label>
                                            <br>
                                            <input type="text" value="<?php echo $product_total[$k] ?>" name="final_total[<?php echo $value['id'] ?>][]" readonly class="form-control final_total">
                                        </div>
                                        
                                    </div>
                                    <?php } ?>
                                </div>

                                <div class="form-group row">

                                    <label for="example-text-input" class="col-sm-3 col-form-label">Discount<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control bill_discount" name="" readonly="" type="number" value="<?php echo $value['Discount'] ?>" id="example-text-input" placeholder="" >
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label for="example-text-input" class="col-sm-3 col-form-label">Company Discount<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control company_discount" name="" readonly="" type="number" value="<?php echo $value['company_discount'] ?>" id="example-text-input" placeholder="" >
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label for="example-text-input extra_discount" class="col-sm-3 col-form-label">Extra Discount<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control extra_discount" name="" readonly=""  type="number" value="<?php echo $value['extra_discount'] ?>" id="example-text-input" placeholder="" >
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label for="example-text-input" class="col-sm-3 col-form-label">TO<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control t_o" name="" readonly="" type="number" value="<?php echo $value['t_o'] ?>" id="example-text-input" placeholder="" >
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label for="example-text-input" class="col-sm-3 col-form-label">Bill Total<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="" readonly="" type="number" value="<?php echo $value['Total_Amount'] ?>" id="example-text-input" placeholder="" required="">
                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label for="example-text-input" class="col-sm-3 col-form-label">Final Total<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="bill_total[]" readonly="" type="number" value="<?php echo $value['Total_Amount'] ?>" id="example-text-input" placeholder="" required="">
                                    </div>

                                </div>
                                
                            </div>
                            <?php endforeach; ?>
                            <div class="form-group row">

                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
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
    $('.return_qty').keyup(function() {
        calculate_product_total($(this).parents('.hide-div'))
        calculate_total($(this).parents('.main-div'))
    })
    function calculate_product_total(div) {
        var rate = div.find('.rate').val()
        var qty = div.find('.qty').val()
        var return_qty = div.find('.return_qty').val()
        var product_discount = div.find('.product_discount').val()
        var total = (qty - return_qty) * rate;
        total = total - (total * product_discount / 100);
        div.find('.final_total').val(total)
    }
    function calculate_total(main) {
        var total = 0;
        var gross_total = 0;
        main.find('.return_qty').each(function() {
            total += parseInt($(this).parents('.hide-div').find('input.final_total').val())
            if ($(this).parents('.hide-div').find('input.slap').val() != 'No') {
                gross_total += parseInt($(this).parents('.hide-div').find('input.final_total').val())
            }
        })
        var discount = main.find('.bill_discount').val()
        var discount_total = 0;
        if (discount) {
            discount_total += (gross_total * discount / 100);
        }
        if(main.find('.company_discount').val()){
            discount_total += (total * parseInt(main.find('.company_discount').val()) / 100);
        }
        if(main.find('.extra_discount').val()){
            discount_total += (total * parseInt(main.find('.extra_discount').val()) / 100);
        }
        if(main.find('.t_o').val()){
            discount_total += parseInt(main.find('.t_o').val());
        }
        //alert(discount_total)
        total = (total - discount_total)
        main.find('[name="bill_total[]"]').val(parseInt(total))
    }
</script>