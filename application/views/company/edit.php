
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

                                    </div><!-- <div class="form-group row">

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

                                    </div> -->

                                <div class="all-q ">
                                    <label>Slap</label><br><br>
                                    <?php 
                                    $slap = json_decode($company['slap']);
                                    foreach ($slap->min as $key => $value) {
                                    ?>
                                    <div class="hide-div row">
                                        <div class="form-group col-md-4">
                                            <label>Min</label><br>
                                            <input type="number" name="slap[min][]" class="form-control" value="<?php echo $value ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Max</label><br>
                                            <input type="number" name="slap[max][]" class="form-control" value="<?php echo $slap->max[$key] ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Discount</label><br>
                                            <input type="number" name="slap[dis][]" class="form-control" value="<?php echo $slap->dis[$key] ?>">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-2 delet pull-right">
                                                <?php if($key == 0){ ?>
                                                <button type="button" class="add-relation btn btn-success ">Add More</button>
                                                <?php } else{ ?>
                                                <a class="btn btn-danger remove-relation"><i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                                                <a class="btn btn-success add-relation"><strong> + </strong> </a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
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
    $("body").on("click",".add-relation",function(){
        var html = $(".hide-div").first().clone();
        $(html).find(".delet").html("<a class='btn btn-danger remove-relation'><i class='fa fa-trash-o' aria-hidden='true'></i> </a> "+' <a class="btn btn-success add-relation"><strong> + </strong> </a>');
        $(".hide-div").last().after(html);
        $(".hide-div").last().find('input,select').not('input[type="checkbox"]').val('')
        $(".hide-div").last().find('input[type="checkbox"]').removeAttr('checked')
    });
    $("body").on("click",".remove-relation",function(){
        $(this).parents(".hide-div").remove();
    });
</script>