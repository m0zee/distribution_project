<!-- START CORE PLUGINS -->
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
                <h1>Submit Dsr</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Submit Dsr</li>
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
                                <h4>Submit Dsr</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Salesmen<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="salesmen" required="">
                                        <option>Select Salesmen</option>
                                        <?php foreach ($table_salesmen as $t) {?>
                                        <option value="<?php echo $t["id"] ?>"><?php echo $t["Name"] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>
                            <h3>Sales Return</h3>
                            <div class="hide-div row">
                                <input type="hidden" name="salesretun[gross_value][]">
                                <div class="form-group col-md-3">
                                    <label>Product</label>
                                    <br>
                                    <select class="form-control product product-list" name="salesretun[product_id][]">
                                        <option value="">Select Product</option>
                                        <?php foreach ($products as $t) {?>
                                            <option value="<?php echo $t["id"] ?>" data-price="<?php echo $t['sale_price'] ?>"><?php echo $t["Name"] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Shop</label>
                                    <br>
                                    <select class="form-control" name="salesretun[shop][]">
                                        <option value="">Select Shop</option>
                                        <?php foreach ($shops as $t) {?>
                                            <option value="<?php echo $t["id"] ?>"><?php echo $t["Name"] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Fresh Units</label>
                                    <br>
                                    <input type="number" name="salesretun[fresh_qty][]" class="form-control qty">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Demage Units</label>
                                    <br>
                                    <input type="number" name="salesretun[damage_qty][]" class="form-control qty">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Total Units</label>
                                    <br>
                                    <input type="number" name="salesretun[total_qty][]" readonly="" class="form-control qty">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Rate</label>
                                    <br>
                                    <input type="number" name="salesretun[rate][]" readonly="" class="form-control qty">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Discount</label>
                                    <br>
                                    <input type="number" name="salesretun[discount][]" class="form-control qty">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Net Amount</label>
                                    <br>
                                    <input type="number" name="salesretun[total][]" readonly="" class="form-control qty">
                                </div>
                                <div class="form-group col-md-1">
                                    <label style="opacity: 0">Net </label>
                                    <br>
                                    <div class="delet pull-right">
                                        <button type="button" class="add-relation btn btn-success ">Add More</button>
                                    </div>
                                </div>
                            </div>
                            <h3>Chaque</h3>
                            <div class="hide-div2 row">
                                <div class="form-group col-md-4">
                                    <label>Shop</label>
                                    <br>
                                    <select class="form-control" name="chaque[Party_Name][]">
                                        <option value="">Select Shop</option>
                                        <?php foreach ($shops as $t) {?>
                                            <option value="<?php echo $t["id"] ?>"><?php echo $t["Name"] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Address</label>
                                    <br>
                                    <input type="text" name="chaque[Address][]" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Bill</label>
                                    <br>
                                    <select class="form-control" name="chaque[Bill_NO][]">
                                        <option value="">Select Bill</option>
                                        <?php foreach ($bill as $t) {?>
                                            <option value="<?php echo $t["id"] ?>"><?php echo $t["id"] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Amount</label>
                                    <br>
                                    <input type="number" name="chaque[Cheq_Amount][]" class="form-control qty">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Date</label>
                                    <br>
                                    <input type="date" name="chaque[Cheque_Date][]" class="form-control qty">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Party Bank</label>
                                    <br>
                                    <input type="text" name="chaque[Party_Bank][]" class="form-control qty">
                                </div>
                                <div class="form-group col-md-1">
                                    <label style="opacity: 0">Net </label>
                                    <br>
                                    <div class="delet pull-right">
                                        <button type="button" class="add-relation2 btn btn-success ">Add More</button>
                                    </div>
                                </div>
                            </div>
                            <h3>Sign Bills</h3>
                            <div class="hide-div3 row">
                                <div class="form-group col-md-4">
                                    <label>Shop</label>
                                    <br>
                                    <select class="form-control" name="sign_bills[Party_Name][]">
                                        <option value="">Select Shop</option>
                                        <?php foreach ($shops as $t) {?>
                                            <option value="<?php echo $t["id"] ?>"><?php echo $t["Name"] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Address</label>
                                    <br>
                                    <input type="text" name="sign_bills[Address][]" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Bill</label>
                                    <br>
                                    <select class="form-control" name="sign_bills[Bill_NO][]">
                                        <option value="">Select Bill</option>
                                        <?php foreach ($bill as $t) {?>
                                            <option value="<?php echo $t["id"] ?>"><?php echo $t["id"] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Net Amount</label>
                                    <br>
                                    <input type="number" name="sign_bills[Net_Amount][]" class="form-control qty">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Sign Amount</label>
                                    <br>
                                    <input type="number" name="sign_bills[Signed_Amount][]" class="form-control qty">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Due Date</label>
                                    <br>
                                    <input type="date" name="sign_bills[Due_Date][]" class="form-control qty">
                                </div>
                                
                                <div class="form-group col-md-1">
                                    <label style="opacity: 0">Net </label>
                                    <br>
                                    <div class="delet pull-right">
                                        <button type="button" class="add-relation3 btn btn-success ">Add More</button>
                                    </div>
                                </div>
                            </div>
                            <h3>Recovery</h3>
                            <div class="hide-div4 row">
                                <div class="form-group col-md-3">
                                    <label>Shop</label>
                                    <br>
                                    <select class="form-control" name="recovery[Party_Name][]">
                                        <option value="">Select Shop</option>
                                        <?php foreach ($shops as $t) {?>
                                            <option value="<?php echo $t["id"] ?>"><?php echo $t["Name"] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Address</label>
                                    <br>
                                    <input type="text" name="recovery[Address][]" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Bill</label>
                                    <br>
                                    <select class="form-control" name="recovery[Bill_NO][]">
                                        <option value="">Select Bill</option>
                                        <?php foreach ($bill as $t) {?>
                                            <option value="<?php echo $t["id"] ?>"><?php echo $t["id"] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Amount</label>
                                    <br>
                                    <input type="number" name="recovery[Rcvd_Amount][]" class="form-control qty">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Cheque NO</label>
                                    <br>
                                    <input type="number" name="recovery[Cheque_NO][]" class="form-control qty">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Chaque Date</label>
                                    <br>
                                    <input type="date" name="recovery[Chaque_Date_][]" class="form-control qty">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Party Bank</label>
                                    <br>
                                    <input type="text" name="recovery[Party_Bank][]" class="form-control qty">
                                </div>
                                <div class="form-group col-md-1">
                                    <label style="opacity: 0">Net </label>
                                    <br>
                                    <div class="delet pull-right">
                                        <button type="button" class="add-relation4 btn btn-success ">Add More</button>
                                    </div>
                                </div>
                            </div>
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
    $("body").on("click", ".add-relation", function() {
        var html = $(".hide-div").first().clone();
        var main = $(this).parents('.main-div')
        $(html).find(".delet").html("<a class='btn btn-danger remove-relation'><i class='fa fa-trash-o' aria-hidden='true'></i> </a> " + ' <a class="btn btn-success add-relation"><strong> + </strong> </a>');
        $(".hide-div").last().after(html);
        $(".hide-div").last().find('input,select').not('input[type="hidden"]').val('')
    });
    $("body").on("click", ".remove-relation", function() {
        $(this).parents(".hide-div").remove();
    });


    $("body").on("click", ".add-relation2", function() {
        var html = $(".hide-div2").first().clone();
        var main = $(this).parents('.main-div')
        $(html).find(".delet").html("<a class='btn btn-danger remove-relation2'><i class='fa fa-trash-o' aria-hidden='true'></i> </a> " + ' <a class="btn btn-success add-relation2"><strong> + </strong> </a>');
        $(".hide-div2").last().after(html);
        $(".hide-div2").last().find('input,select').not('input[type="hidden"]').val('')
    });
    $("body").on("click", ".remove-relation2", function() {
        $(this).parents(".hide-div2").remove();
    });

    $("body").on("click", ".add-relation3", function() {
        var html = $(".hide-div3").first().clone();
        var main = $(this).parents('.main-div')
        $(html).find(".delet").html("<a class='btn btn-danger remove-relation3'><i class='fa fa-trash-o' aria-hidden='true'></i> </a> " + ' <a class="btn btn-success add-relation3"><strong> + </strong> </a>');
        $(".hide-div3").last().after(html);
        $(".hide-div3").last().find('input,select').not('input[type="hidden"]').val('')
    });
    $("body").on("click", ".remove-relation3", function() {
        $(this).parents(".hide-div3").remove();
    });

    $("body").on("click", ".add-relation4", function() {
        var html = $(".hide-div4").first().clone();
        var main = $(this).parents('.main-div')
        $(html).find(".delet").html("<a class='btn btn-danger remove-relation4'><i class='fa fa-trash-o' aria-hidden='true'></i> </a> " + ' <a class="btn btn-success add-relation4"><strong> + </strong> </a>');
        $(".hide-div4").last().after(html);
        $(".hide-div4").last().find('input,select').not('input[type="hidden"]').val('')
    });
    $("body").on("click", ".remove-relation4", function() {
        $(this).parents(".hide-div4").remove();
    });


    $('body').on('change', '[name="salesretun[product_id][]"]', function() {
        count_total($(this).parents('.hide-div'))
    })
    $('body').on('keyup', '[name="salesretun[fresh_qty][]"], [name="salesretun[damage_qty][]"], [name="salesretun[discount][]"]', function() {
        count_total($(this).parents('.hide-div'))
    })
    function count_total(main) {
        var price = main.find('[name="salesretun[product_id][]"] option:selected').attr('data-price')
        main.find('[name="salesretun[rate][]"]').val(price)
        var total = 0;
        total += (main.find('[name="salesretun[fresh_qty][]"]').val()) ? parseInt(main.find('[name="salesretun[fresh_qty][]"]').val()) : 0;
        total += (main.find('[name="salesretun[damage_qty][]"]').val()) ? parseInt(main.find('[name="salesretun[damage_qty][]"]').val()) : 0;
        main.find('[name="salesretun[total_qty][]"]').val(total)
        var amount = price * total;
        main.find('[name="salesretun[gross_value][]"]').val(amount)
        var discount =  (main.find('[name="salesretun[discount][]"]').val()) ? parseInt(main.find('[name="salesretun[discount][]"]').val()) : 0;
        if (discount) {
            amount = amount - (amount * discount / 100);
        }
        main.find('[name="salesretun[total][]"]').val(amount)
    }
</script>