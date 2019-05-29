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
                <h1>Add Billing</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Add Billing</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>billing/insert" enctype="multipart/form-data">

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Add Billing</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="main-div">
                                <div class="form-group row">

                                    <label for="example-text-input" class="col-sm-3 col-form-label">Company<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control company" name="Company[]" required="">
                                            <option>Select Company</option>
                                            <?php foreach ($table_company as $t) {?>
                                                <option value="<?php echo $t["id"] ?>" data-slap='<?php echo $t['slap'] ?>'>
                                                    <?php echo $t["Name"] ?>
                                                </option>
                                                <?php } ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label for="example-text-input" class="col-sm-3 col-form-label">Booker<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control booker" name="Booker[]" required="">
                                            <option>Select Booker</option>
                                            <?php foreach ($table_booker as $t) {?>
                                                <option value="<?php echo $t["id"] ?>">
                                                    <?php echo $t["Name"] ?>
                                                </option>
                                                <?php } ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label for="example-text-input" class="col-sm-3 col-form-label">Date<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="Date[]" type="date" value="<?php echo date('Y-m-d') ?>" id="example-text-input" placeholder="" required="">
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label for="example-text-input" class="col-sm-3 col-form-label">Shop<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control shop" name="Shop[]" required="">
                                            <option>Select Shop</option>
                                            <?php foreach ($table_shops as $t) {?>
                                                <option value="<?php echo $t["id"] ?>">
                                                    <?php echo $t["Name"] ?>
                                                </option>
                                                <?php } ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="all-q ">
                                    <div class="hide-div row">
                                        <div class="form-group col-md-6">
                                            <label>Product</label>
                                            <br>
                                            <select class="form-control product" name="product[0][]">
                                                <option value="">Select Product</option>
                                                <?php foreach ($table_product as $t) {?>
                                                    <option value="<?php echo $t["id"] ?>" data-price="<?php echo $t['sale_price'] ?>">
                                                        <?php echo $t["Name"] ?>
                                                    </option>
                                                    <?php } ?>
                                            </select>
                                            <!-- <input type="number" name="product[]" class="form-control"> -->
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Quantity</label>
                                            <br>
                                            <input type="number" name="quantity[0][]" class="form-control qty">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 delet pull-right">
                                                <button type="button" class="add-relation btn btn-success ">Add More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <label for="example-text-input" class="col-sm-3 col-form-label">Discount<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="Discount[]" type="number" value="0" id="example-text-input" placeholder="" required="">
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label for="example-text-input" class="col-sm-3 col-form-label">Total<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="Total_Amount[]" readonly="" type="number" value="0" id="example-text-input" placeholder="" required="">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-2 delet-main pull-right">
                                        <button type="button" class="add-main btn btn-success ">Add More</button>
                                    </div>
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
<script type="text/javascript">
    $("body").on("click", ".add-relation", function() {
        var html = $(".hide-div").first().clone();
        $(html).find(".delet").html("<a class='btn btn-danger remove-relation'><i class='fa fa-trash-o' aria-hidden='true'></i> </a> " + ' <a class="btn btn-success add-relation"><strong> + </strong> </a>');
        $(".hide-div").last().after(html);
        $(".hide-div").last().find('input,select').not('input[type="checkbox"]').val('')
        $(".hide-div").last().find('input[type="checkbox"]').removeAttr('checked')
    });
    $("body").on("click", ".remove-relation", function() {
        $(this).parents(".hide-div").remove();
    });

    $("body").on("click", ".add-main", function() {
        var html = $(".main-div").first().clone();
        html.find('.hide-div').not('.hide-div:first-child').remove()
        $(html).find(".delet-main").html("<a class='btn btn-danger remove-main'><i class='fa fa-trash-o' aria-hidden='true'></i> </a> " + ' <a class="btn btn-success add-main"><strong> + </strong> </a>');
        $(".main-div").last().after(html);
        //$(".main-div").last().find('input,select').not('select.company, select.booker, input[name="Date[]"]').val('')
        $(".main-div").last().find('input').not('input[name="Date[]"]').val('')
        $(".main-div").last().find('input[name="Total_Amount[]"]').val('0')
        $('.main-div').last().find('select').find('option').removeAttr('selected')
        $('.main-div').last().find('select.company').val($('.main-div').first().find('select.company').val())
        $('.main-div').last().find('select.booker').val($('.main-div').first().find('select.booker').val())
        $('.main-div').last().find('[name="product[0][]"]').attr('name', 'product['+($('.main-div').length - 1)+'][]')
        $('.main-div').last().find('[name="quantity[0][]"]').attr('name', 'quantity['+($('.main-div').length - 1)+'][]')
    });
    $("body").on("click", ".remove-main", function() {
        $(this).parents(".main-div").remove();
    });
    $('body').on('keyup', 'input.qty', function() {
        set_disandtotal($(this).parents('.main-div'))
    })
    $('body').on('keyup', 'input[name="Discount[]"]', function() {
        set_disandtotal($(this).parents('.main-div'), $(this).val())
    })
    $('body').on('change', 'select.product, [name="Company[]"]', function() {
        set_disandtotal($(this).parents('.main-div'))
    })
    function set_disandtotal(main, dis = false) {
        var total = 0;
        main.find('select.product').each(function() {
            var price = $(this).find('option:selected').attr('data-price')
            var qty = $(this).parents('.hide-div').find('input.qty').val()
            total += (price * qty)
        })
        var dis_array = main.find('[name="Company[]"] option:selected').attr('data-slap')
        if (dis) {
            var discount = dis
        }
        else{
            var discount = get_dis(dis_array, total)
        }
        main.find('[name="Discount[]"]').val(discount)
        discount = '0.'+discount
        total = total - (total * discount)
        main.find('[name="Total_Amount[]"]').val(total)
    }
    function get_dis(array, total) {
        array = JSON.parse(array)
        for (var i = 0; i < array.dis.length; i++) {
            if (total >= array.min[i] && total <= array.max[i]) {
                return array.dis[i]
            }
        }
    }
</script>