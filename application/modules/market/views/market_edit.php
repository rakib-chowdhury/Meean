<base href="<?= base_url(); ?>"></base>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Eeanstar</title>

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />


        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />


        <link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />


        <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />


        <script src="assets/js/ace-extra.min.js"></script>



        <!-- page specific plugin styles -->
        <link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
        <link rel="stylesheet" href="assets/css/chosen.min.css" />
        <link rel="stylesheet" href="assets/css/datepicker.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
        <link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
        <link rel="stylesheet" href="assets/css/colorpicker.min.css" />




    </head>
    <body class="no-skin">

        <div id="navbar" class="navbar navbar-default" style="background-color:green !important;">
            <script type="text/javascript">
                try {
                    ace.settings.check('navbar', 'fixed')
                } catch (e) {
                }
            </script>

            <div class="navbar-container" id="navbar-container">
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                    <span class="sr-only">Toggle sidebar</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>
                </button>

                <div class="navbar-header pull-left">
                    <a href="home">

                        <img style="height:100%;width:150px" src="uploads/<?= $logo_info->logo; ?>" alt="logo">

                    </a>
                </div>

                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">

                        <li class="green">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <!--<img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" />-->
                                <span class="user-info">
                                    <small>Welcome,</small>
                                    <?= $get_user_data[0]['reg_first_name']; ?>   
                                </span>

                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <!-- <li>
                                    <a href="#">
                                        <i class="ace-icon fa fa-cog"></i>
                                        Settings
                                    </a>
                                </li>

                                <li>
                                    <a href="profile.html">
                                        <i class="ace-icon fa fa-user"></i>
                                        Profile
                                    </a>
                                </li> -->
                                <li>
                                    <a data-toggle="modal" style="cursor:pointer" st data-target="#change_info">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        Edit Information
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a data-toggle="modal" style="cursor:pointer" data-target="#change_password">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        Change Password
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="login/logout">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- /.navbar-container -->




            <!-- Modal -->
            <div class="modal fade" id="change_info" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Change information</h4>
                        </div>
                        <div class="modal-body">
                            <form  action="<?php echo site_url('market/change_information'); ?>" method="post" enctype="multipart/form-data">

                                <div class="form-group col-md-6">
                                    <label for="pwd">First Name:</label>
                                    <input type="text" class="form-control" value="<?= $get_user_data[0]['reg_first_name']; ?>" id="password1" name="reg_first_name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pwd">Last Name:</label>
                                    <input type="text" class="form-control" value="<?= $get_user_data[0]['reg_last_name']; ?>" id="password1" name="reg_last_name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pwd">Company Name:</label>
                                    <input type="text" class="form-control" value="<?= $get_user_data[0]['reg_company_name']; ?>" id="password1" name="reg_company_name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pwd">Company phone:</label>
                                    <input type="text" class="form-control" value="<?= $get_user_data[0]['reg_company_phone']; ?>" id="password1" name="reg_company_phone">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pwd">User phone:</label>
                                    <input type="text" class="form-control" value="<?= $get_user_data[0]['reg_phone']; ?>" id="password1" name="reg_phone">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pwd">Industry address:</label>
                                    <input type="text" class="form-control" value="<?= $get_user_data[0]['reg_address']; ?>" id="password1" name="reg_address">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pwd">Industry Name:</label>
                                    <input type="text" class="form-control" value="<?= $get_user_data[0]['industry_name']; ?>" id="password1" name="industry_name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pwd">Profile Image:</label>
                                    <input type="file" class="form-control" id="password1" name="userfile">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pwd">Company Employee:</label>
                                    <input type="text" class="form-control" value="<?= $get_user_data[0]['com_employee']; ?>" id="password1" name="com_employee">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pwd">Company Eshtablished:</label>
                                    <input type="text" class="form-control" value="<?= $get_user_data[0]['com_establish']; ?>" id="password1" name="com_establish">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Website:</label>
                                    <input type="text" class="form-control" value="<?= $get_user_data[0]['website']; ?>" id="password1" name="website">
                                </div>
                                <input type="hidden" name="edit_id" value="<?= $get_user_data[0]['reg_id']; ?>">
                                <input type="hidden" name="profile_img" value="<?= $get_user_data[0]['profile_img']; ?>">

                                <div class="modal-footer">
                                    <button type="submit" style="float:left" class="btn btn-success">Submit</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </div>


    <!-- header from here -->

    <div class="main-content">
        <div class="main-content-inner">


            <div class="page-content">
                <div class="ace-settings-container" id="ace-settings-container">

                </div> 

                <div class="page-header">
                    <h1 style="color:green;">
                        Edit Market Place Product

                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">


                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <form class="form-horizontal" action="market/update_market_product_details/<?= $p_details[0]['market_place_id']; ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="images_type" value="<?php echo $p_details[0]['images_type']?>">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Name:</label>
                                        <div class="col-sm-9">
                                            <input id="form-field-1" value="<?= $p_details[0]['market_place_name']; ?>" onblur="show_en_first_name_msg()" name="product_name" placeholder="Product Name" class="col-xs-10 col-sm-5" type="text">
                                            <span id="en_first_name_error_msg" style="display: none">Please Enter Product Name</span>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Price :</label>

                                        <div class="col-sm-9">
                                            <input id="form-field-1" value="<?= $p_details[0]['market_place_price']; ?>" onblur="show_en_first_name_msg()" name="product_price" placeholder="Product Price" class="col-xs-10 col-sm-5" type="text">
                                            <span id="en_first_name_error_msg" style="display: none">Please Enter Product Price</span>
                                        </div>
                                    </div>


                                    <div class="form-group">

                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Condition :</label>

                                        <div class="col-sm-9">
                                            <select name="condition" id="">
                                                <option value="">Choose Condition</option>
                                                <option <?php if ($p_details[0]['market_place_price'] == 'brand Bew') {
                                        echo "selected";
                                    } ?> value="Brand New">Brand New</option>
                                                <option <?php if ($p_details[0]['market_place_price'] == 'Used') {
                                        echo "selected";
                                    } ?> value="Used">Used</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">

                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Location :</label>

                                        <div class="col-sm-9">
                                            <select name="product_location" style="width: 41.5%;" onchange="select_dist()" id="location">
                                                <option value="">Choose a Location</option>
                                                <?php foreach ($location as $row) {
                                                    if ($p_details[0]['market_place_location'] == $row['location_id']) { ?>
                                                        <option selected value="<?= $row['location_id']; ?>"><?= $row['location_name']; ?></option>
                                                <?php } else { ?>
                                                        <option value="<?= $row['location_id']; ?>"><?= $row['location_name']; ?></option>
                                                    <?php }
                                                } ?>
                                            </select>


                                        </div>
                                    </div>



                                    <div class="form-group">

                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">District :</label>

                                        <div class="col-sm-9">
                                            <select name="market_dist_id" class="col-xs-10 col-sm-5" id="dist">
                                            <?php foreach ($district as $row) {
                                                if ($p_details[0]['market_dist_id'] == $row['dist_id']) { ?>
                                                        <option selected value="<?= $row['dist_id']; ?>"><?= $row['en_dist_name']; ?></option>
                                            <?php } else { ?>
                                                        <option value="<?= $row['dist_id']; ?>"><?= $row['en_dist_name']; ?></option>
                                                <?php }
                                            } ?>
                                            </select>

                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Category:</label>

                                        <div class="col-sm-9">

                                            <select name="market_category_id" id="cat_select"  onchange="category_option()" style="width: 41.5%;">
                                                <option value="">Choose a Category</option>
                                                    <?php foreach ($category as $row) {
                                                        if ($p_details[0]['market_category_id'] == $row['m_cat_id']) { ?>
                                                        <option selected value="<?= $row['m_cat_id']; ?>"><?= $row['m_cat_name']; ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $row['m_cat_id']; ?>"><?= $row['m_cat_name']; ?></option>
                                                        <?php }
                                                    } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="space-4"></div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Sub-category :</label>

                                        <div class="col-sm-9">
                                            <select name="market_sub_cat_id" id="sub_category" style="width: 41.5%;">
                                                <?php foreach ($sub_category_name as $row) {
                                                    if ($p_details[0]['market_sub_cat_id'] == $row['market_sub_cat_id']) { ?> 
                                                        <option selected value="<?= $sub_category_name[0]['market_sub_cat_id']; ?>" ><?= $sub_category_name[0]['market_sub_cat_name']; ?></option>

                                                    <?php }
                                                } ?>        
                                            </select>
                                        </div>

                                    </div>
                                    
                                    <table class="table table-condensed table-bordered table-striped">
                                    <h2>Main Image</h2>
                                    <tr style="text-align: center">
                                        <td>Image</td>
                                        <td>Type</td>
                                        <td>Action</td>
                                    </tr>
                                        <tr style="text-align: center">

                                            <td>
                                                <img src="assets/product_images/<?= $p_details[0]['market_place_image']; ?>" style="width:50px; height: 50px;">
                                            </td>
                                            <td>
                                                Main Image
                                            </td>
                                            <td>
                                                <a onclick="image_details('<?= $p_details[0]['images_table_id']; ?>')">Update</a>
                                            </td>
                                        </tr>
                                </table>
                                
                                <table class="table table-condensed table-bordered table-striped">
                                    <h2>Sub Images</h2>
                                    <tr style="text-align: center">
                                        <td>Images</td>
                                        <td>Type</td>
                                        <td>Action</td>
                                    </tr>
                                    <?php foreach ($p_details as $row){?>
                                        <tr style="text-align: center">

                                            <td>
                                                <img src="assets/product_images/<?= $row['images_name']; ?>" style="width:50px; height: 50px;">
                                            </td>
                                            <td>Sub-image</td>
                                            <td>
                                                <a onclick="sub_image_details('<?= $row['images_id']; ?>')">Update</a>
   
                                                <a href="<?php echo site_url('seller/delete_sub_images'); ?>/<?php echo $row['images_id'] ?>/<?php echo $row['market_place_id'] ?>">Delete</a>

                                            </td>

                                        </tr>
<?php } ?>
                                    <tr>
                                        <td style="text-align: center">  <b>Add More Sub Images:</b>  </td>
                                        <td colspan="2">
                                            <input type="file" multiple name="userfile[]" class="form-control" style="padding: 0px 12px;">
                                        </td>  
                                    </tr>
                                </table>

<!--                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Previous Main Image</label>

                                        <div class="col-sm-4">
                                            <img style="width:100%" src="assets/product_images/<?= $p_details[0]['market_place_image']; ?>" alt="" />
                                            <input type="hidden" name="pre_main_img" value="<?= $p_details[0]['market_place_image']; ?>" />
                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Previous Sub Image</label>
                                            <?php for ($i = 0; $i < $count; $i++) { ?>
                                            <div class="col-sm-2">
                                                <img style="width:100%" src="assets/product_images/<?= $p_details[$i]['images_name']; ?>" alt="" />
                                                <input type="hidden" name="pre_sub_img[]" value="<?= $p_details[$i]['images_name']; ?>"/>
                                            </div>
                                            <?php } ?>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Main Image</label>

                                        <div class="col-sm-9">
                                            <input id="fileupload_main" name="userfile[]" type="file"/>
                                            <div id="dvPreview_main"></div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Sub Images:</label>

                                        <div class="col-sm-9">
                                            <input id="fileupload" multiple name="userfile[]"  type="file"/>
                                            <div id="dvPreview"></div>
                                        </div>


                                    </div>-->



                                    <div class="form-group">

                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Description :</label>

                                        <div class="col-sm-6">


                                            <div onblur="myclick()" class="wysiwyg-editor" name="product_description" id="editor1"><?= $p_details[0]['market_place_description']; ?></div>

                                            <script type="text/javascript">
                                                var $path_assets = "dist";
                                            </script>

                                            <input type="hidden" name="product_description" id="desvalue">
                                        </div>
                                    </div>



                                    <button style="margin-left:46.5%;" class="btn btn-success" onclick="emon77777()" type="submit" name="btn">
                                        <i class="ace-icon fa fa-check bigger-110"></i>
                                        Update
                                    </button>

                                    <a href="market/all_market_product" class="btn btn-danger">
                                        <i class="ace-icon fa fa-close bigger-110"></i>
                                        Cancel
                                    </a>


                                    <hr>
                                </form>
                            </div><!-- /.col -->
                        </div>



                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

<div class="modal fade" id="quick_view_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>





    <script src="assets/js/jquery.2.1.1.min.js"></script>


    <script type="text/javascript">
                                            window.jQuery || document.write("<script src='assets/js/jquery.min.js'>" + "<" + "/script>");
    </script>


    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement)
            document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
    </script>
    <script src="assets/js/bootstrap.min.js"></script>


    <script src="assets/js/jquery-ui.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="assets/js/markdown.min.js"></script>
    <script src="assets/js/bootstrap-markdown.min.js"></script>
    <script src="assets/js/jquery.hotkeys.min.js"></script>
    <script src="assets/js/bootstrap-wysiwyg.min.js"></script>
    <script src="assets/js/bootbox.min.js"></script>
    <script src="assets/js/jquery.easypiechart.min.js"></script>
    <script src="assets/js/jquery.sparkline.min.js"></script>
    <script src="assets/js/jquery.flot.min.js"></script>
    <script src="assets/js/jquery.flot.pie.min.js"></script>
    <script src="assets/js/jquery.flot.resize.min.js"></script>


    <!-- ace scripts -->
    <script src="assets/js/ace-elements.min.js"></script>
    <script src="assets/js/ace.min.js"></script>\

    
    <script type="text/javascript">

            function image_details(images_table_id) {
//                var gpf_id= document.getElementById('gpf_id').value;
//                alert(images_table_id);

                //alert(url_for_reload);
                $.ajax({
                    url: "<?php echo site_url('market/image_details_modal'); ?>",
                    type: "post",
                    data: {images_table_id: images_table_id},
                    success: function (msg) {
                        $('#quick_view_modal').html(msg);
                        $('#quick_view_modal').modal('show');
                        //location.reload();
//                        alert(""+msg);

                    }
                });
            }
            
            function sub_image_details(images_id) {
//                var gpf_id= document.getElementById('gpf_id').value;
                //alert(gpf_id);

                //alert(url_for_reload);
                $.ajax({
                    url: "<?php echo site_url('market/sub_image_details_modal'); ?>",
                    type: "post",
                    data: {images_id: images_id},
                    success: function (msg) {
                        $('#quick_view_modal').html(msg);
                        $('#quick_view_modal').modal('show');
                        //location.reload();
//                        alert(""+msg);

                    }
                });
            }
            
        </script>
    
    <script type="text/javascript">
        jQuery(function ($) {

            function showErrorAlert(reason, detail) {
                var msg = '';
                if (reason === 'unsupported-file-type') {
                    msg = "Unsupported format " + detail;
                }
                else {
                    //console.log("error uploading file", reason, detail);
                }
                $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
            }

            //$('#editor1').ace_wysiwyg();//this will create the default editor will all buttons

            //but we want to change a few buttons colors for the third style
            $('#editor1').ace_wysiwyg({
                toolbar:
                        [
                            'font',
                            null,
                            'fontSize',
                            null,
                            {name: 'bold', className: 'btn-info'},
                            {name: 'italic', className: 'btn-info'},
                            {name: 'strikethrough', className: 'btn-info'},
                            {name: 'underline', className: 'btn-info'},
                            null,
                            {name: 'insertunorderedlist', className: 'btn-success'},
                            {name: 'insertorderedlist', className: 'btn-success'},
                            {name: 'outdent', className: 'btn-purple'},
                            {name: 'indent', className: 'btn-purple'},
                            null,
                            {name: 'justifyleft', className: 'btn-primary'},
                            {name: 'justifycenter', className: 'btn-primary'},
                            {name: 'justifyright', className: 'btn-primary'},
                            {name: 'justifyfull', className: 'btn-inverse'},
                            null,
                            {name: 'createLink', className: 'btn-pink'},
                            {name: 'unlink', className: 'btn-pink'},
                            null,
                            {name: 'insertImage', className: 'btn-success'},
                            null,
                            'foreColor',
                            null,
                            {name: 'undo', className: 'btn-grey'},
                            {name: 'redo', className: 'btn-grey'}
                        ],
                'wysiwyg': {
                    fileUploadError: showErrorAlert
                }
            }).prev().addClass('wysiwyg-style2');


            /**
             //make the editor have all the available height
             $(window).on('resize.editor', function() {
             var offset = $('#editor1').parent().offset();
             var winHeight =  $(this).height();
                 
             $('#editor1').css({'height':winHeight - offset.top - 10, 'max-height': 'none'});
             }).triggerHandler('resize.editor');
             */


            $('#editor2').css({'height': '200px'}).ace_wysiwyg({
                toolbar_place: function (toolbar) {
                    return $(this).closest('.widget-box')
                            .find('.widget-header').prepend(toolbar)
                            .find('.wysiwyg-toolbar').addClass('inline');
                },
                toolbar:
                        [
                            'bold',
                            {name: 'italic', title: 'Change Title!', icon: 'ace-icon fa fa-leaf'},
                            'strikethrough',
                            null,
                            'insertunorderedlist',
                            'insertorderedlist',
                            null,
                            'justifyleft',
                            'justifycenter',
                            'justifyright'
                        ],
                speech_button: false
            });




            $('[data-toggle="buttons"] .btn').on('click', function (e) {
                var target = $(this).find('input[type=radio]');
                var which = parseInt(target.val());
                var toolbar = $('#editor1').prev().get(0);
                if (which >= 1 && which <= 4) {
                    toolbar.className = toolbar.className.replace(/wysiwyg\-style(1|2)/g, '');
                    if (which == 1)
                        $(toolbar).addClass('wysiwyg-style1');
                    else if (which == 2)
                        $(toolbar).addClass('wysiwyg-style2');
                    if (which == 4) {
                        $(toolbar).find('.btn-group > .btn').addClass('btn-white btn-round');
                    } else
                        $(toolbar).find('.btn-group > .btn-white').removeClass('btn-white btn-round');
                }
            });




            //RESIZE IMAGE

            //Add Image Resize Functionality to Chrome and Safari
            //webkit browsers don't have image resize functionality when content is editable
            //so let's add something using jQuery UI resizable
            //another option would be opening a dialog for user to enter dimensions.
            if (typeof jQuery.ui !== 'undefined' && ace.vars['webkit']) {

                var lastResizableImg = null;
                function destroyResizable() {
                    if (lastResizableImg == null)
                        return;
                    lastResizableImg.resizable("destroy");
                    lastResizableImg.removeData('resizable');
                    lastResizableImg = null;
                }

                var enableImageResize = function () {
                    $('.wysiwyg-editor')
                            .on('mousedown', function (e) {
                                var target = $(e.target);
                                if (e.target instanceof HTMLImageElement) {
                                    if (!target.data('resizable')) {
                                        target.resizable({
                                            aspectRatio: e.target.width / e.target.height,
                                        });
                                        target.data('resizable', true);

                                        if (lastResizableImg != null) {
                                            //disable previous resizable image
                                            lastResizableImg.resizable("destroy");
                                            lastResizableImg.removeData('resizable');
                                        }
                                        lastResizableImg = target;
                                    }
                                }
                            })
                            .on('click', function (e) {
                                if (lastResizableImg != null && !(e.target instanceof HTMLImageElement)) {
                                    destroyResizable();
                                }
                            })
                            .on('keydown', function () {
                                destroyResizable();
                            });
                }

                enableImageResize();

                /**
                 //or we can load the jQuery UI dynamically only if needed
                 if (typeof jQuery.ui !== 'undefined') enableImageResize();
                 else {//load jQuery UI if not loaded
                 //in Ace demo dist will be replaced by correct assets path
                 $.getScript("assets/js/jquery-ui.custom.min.js", function(data, textStatus, jqxhr) {
                 enableImageResize()
                 });
                 }
                 */
            }


        });
    </script>

    <script type="text/javascript">
        function myclick()
        {
            var des = $('#editor1').html();
            $('#desvalue').val(des);
            //alert(des);
        }

        function emon77777()
        {
            var des = $('#editor1').html();
            $('#desvalue').val(des);
        }
    </script>



    <script>
        function category_option()
        {
            var cat_id = $('#cat_select').val();
            //alert(cat_id);

            $.ajax({
                url: "market/select_sub_category",
                type: "post",
                data: {cat_id: cat_id},
                success: function (msg) {
//alert(msg);
                    $('#sub_category').html(msg);
                }

            });
        }



        function select_dist()
        {
            var dist_id = $('#location').val();
            //alert(dist_id);
            $.ajax({
                url: "<?php echo site_url('market/select_div'); ?>",
                type: "post",
                data: {div_id: dist_id},
                success: function (msg) {

                    $('#dist').html(msg);
                }

            });
        }
    </script>


    <script language="javascript" type="text/javascript">
        window.onload = function () {
            var fileUpload = document.getElementById("fileupload");
            fileUpload.onchange = function () {
                if (typeof (FileReader) != "undefined") {
                    var dvPreview = document.getElementById("dvPreview");
                    dvPreview.innerHTML = "";
                    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                    for (var i = 0; i < fileUpload.files.length; i++) {
                        var file = fileUpload.files[i];
                        if (regex.test(file.name.toLowerCase())) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var img = document.createElement("IMG");
                                img.height = "100";
                                img.width = "100";
                                img.src = e.target.result;
                                dvPreview.appendChild(img);
                            }
                            reader.readAsDataURL(file);
                        } else {
                            alert(file.name + " is not a valid image file.");
                            dvPreview.innerHTML = "";
                            return false;
                        }
                    }
                } else {
                    alert("This browser does not support HTML5 FileReader.");
                }
            }
        };
    </script>  
    <script>
        function myFunction() {
            var pass1 = document.getElementById("password1").value;
            var pass2 = document.getElementById("password2").value;
            var ok = true;
            var Exp = /((^[0-9]+[a-z]+)|(^[a-z]+[0-9]+))+[0-9a-z]+$/i;

            if (pass1 != pass2)
            {
                //alert("Passwords Do not match");
                document.getElementById("password1").style.borderColor = "#E34234";
                document.getElementById("password2").style.borderColor = "#E34234";
                document.getElementById("validate_status").innerHTML = 'Passwords Not Matched';
                ok = false;
            }

            else if (pass1.length < 6)
            {
                document.getElementById("validate_status").innerHTML = 'Minimum 6 characters needed';
                ok = false;
            }
            else if (!pass1.match(Exp))
            {
                document.getElementById("validate_status").innerHTML = 'Password must contains alpha numeric';
                ok = false;
            }
            else {
                //alert("Passwords Match!!!");
            }
            return ok;
        }
    </script> <style type="text/css">
        #dvPreview img{
            margin:5px;
        }
    </style>

</body>
</html>

