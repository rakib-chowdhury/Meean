<base href="<?= base_url(); ?>"></base>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <title>Meeean</title>

    <meta name="description" content="overview &amp; stats"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>


    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css"/>


    <link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css"/>


    <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style"/>


    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css"/>
    <link rel="stylesheet" href="assets/css/chosen.min.css"/>
    <link rel="stylesheet" href="assets/css/datepicker.min.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css"/>
    <!--        <link rel="stylesheet" href="assets/css/daterangepicker.min.css" />-->
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" href="assets/css/colorpicker.min.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap.css"/>
    <link rel="stylesheet" href="assets/css/daterangepicker.css"/>


    <style>
        .jumbotron p {
            font-size: 15px;
        }

        .page-header {
            margin: 0 0 12px;
            border-bottom: 3px dotted #fff;
            padding-bottom: 16px;
            padding-top: 7px;
        }
    </style>


</head>
<body class="no-skin">

<div id="navbar" class="navbar navbar-default" style="background-color: rgb(66, 202, 146) !important;">
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
            <a href="market">
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
                    <form action="<?php echo site_url('market/change_information'); ?>" method="post"
                          enctype="multipart/form-data">

                        <div class="form-group col-md-6">
                            <label for="pwd">First Name:</label>
                            <input type="text" class="form-control" value="<?= $get_user_data[0]['reg_first_name']; ?>"
                                   id="password1" name="reg_first_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pwd">Last Name:</label>
                            <input type="text" class="form-control" value="<?= $get_user_data[0]['reg_last_name']; ?>"
                                   id="password1" name="reg_last_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pwd">Company Name:</label>
                            <input type="text" class="form-control"
                                   value="<?= $get_user_data[0]['reg_company_name']; ?>" id="password1"
                                   name="reg_company_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pwd">Company phone:</label>
                            <input type="text" class="form-control"
                                   value="<?= $get_user_data[0]['reg_company_phone']; ?>" id="password1"
                                   name="reg_company_phone">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pwd">User phone:</label>
                            <input type="text" class="form-control" value="<?= $get_user_data[0]['reg_phone']; ?>"
                                   id="password1" name="reg_phone">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pwd">Industry address:</label>
                            <input type="text" class="form-control" value="<?= $get_user_data[0]['reg_address']; ?>"
                                   id="password1" name="reg_address">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pwd">Industry Name:</label>
                            <input type="text" class="form-control" value="<?= $get_user_data[0]['industry_name']; ?>"
                                   id="password1" name="industry_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pwd">Profile Image:</label>
                            <input type="file" class="form-control" id="password1" name="userfile">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pwd">Company Employee:</label>
                            <input type="text" class="form-control" value="<?= $get_user_data[0]['com_employee']; ?>"
                                   id="password1" name="com_employee">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pwd">Company Eshtablished:</label>
                            <input type="text" class="form-control" value="<?= $get_user_data[0]['com_establish']; ?>"
                                   id="password1" name="com_establish">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Website:</label>
                            <input type="text" class="form-control" value="<?= $get_user_data[0]['website']; ?>"
                                   id="password1" name="website">
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


<div class="main-content">
    <div class="main-content-inner">


        <div class="page-content">
            <div class="ace-settings-container" id="ace-settings-container">

            </div>
<!--                                <div class="row">-->
<!--                                    <div class="col-xs-1"></div>-->
<!--                                    <div class="col-xs-10" style="margin: 0px auto">-->
<!--                                        <div class="jumbotron" style="text-align: center;">-->
<!--                                            <img src="assets/images/ok-icon-12.png" alt="ok" style="text-align: center; width: 50px; height: 50px;">-->
<!--                                            <h3>Your ad was successfully submitted for review</h3>-->
<!--                                            <p>Please note that it depends on admin of meeeanstar.com</p>-->
<!--                                            <p>You can keep track of your ad through "My ads"</p>-->
<!---->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-xs-1"></div>-->
<!--                                </div>-->
            <div class="row">
                <div class="col-xs-1"></div>
                <div class="col-xs-10" style="margin: 0px auto">
                    <form action="market/add_promote_add" method="post">

                        <input type="hidden" name="market_place_id" value="<?php echo $market_place_id; ?>">
                        <!--                                <input type="text" name="product_name" value="<?php echo $product_name; ?>">
                                <input type="text" name="product_price" value="<?php echo $product_price; ?>">
                                <input type="text" name="condition" value="<?php echo $condition; ?>">
                                <input type="text" name="product_location" value="<?php echo $product_location; ?>">
                                <input type="text" name="market_dist_id" value="<?php echo $market_dist_id; ?>">
                                <input type="text" name="cat_id" value="<?php echo $cat_id; ?>">
                                <input type="text" name="sub_cat_id" value="<?php echo $sub_cat_id; ?>">
                                <input type="text" name="product_description" value="<?php echo $product_description; ?>">-->

                        <div class="col-xs-12 jumbotron">
                            <h3 style="margin-left: 12%;">Promote Your ad - make it stand out</h3>
                            <p style="margin-left: 12%;margin-right: 33%;">By promoting you ad, you can save time and
                                effort still get more replies to your ad.
                                More replies means more buyers and <b>selling fast for the price you want</b>
                            </p>
                            <div class="page-header" style="margin-left: 12%;margin-right: 33%;">
                                <h4>Select Promotions</h4>
                            </div>
                            <?php if ($top_ad_settings) { ?>
                                <div class="col-xs-7" style="margin-left: 12%;margin-right: 33%;">
                                    <input class="col-xs-1" type="checkbox" <?php if($top_ad[0]['top_ad'] == '1') echo 'checked';  ?> name="top_ad" value="1" onclick="showBtn()">
                                    <img class="col-xs-2" src="uploads/<?php echo $top_ad_settings[0]['ad_icon']; ?>"
                                         alt="top" style="width: 100px;">
                                    <ul class="col-xs-7 list list-unstyled">
                                        <li>
                                            <h4>Top Ad</h4>
                                            <p><?php echo $top_ad_settings[0]['ad_text']; ?></p>
                                            <!--                                                <p><strong>Ad duration :</strong>-->
                                            <?php ////echo $top_ad_settings[0]['ad_duration'];?><!-- Days</p>-->
                                            <p><strong>Ad duration :</strong><input class="form-control" type="text" name="daterange1"
                                                                                    value="01/01/2015 - 01/31/2015"/>
                                            </p>
                                        </li>
                                    </ul>
                                    <input type="hidden" name="id" value="<?php echo $market_place_id ?>">
                                    <h4 class="col-xs-2" style="text-align: right">Price</h4>
                                    <p class="col-xs-2"
                                       style="text-align: right"><?php echo $top_ad_settings[0]['ad_price']; ?> BDT</p>
                                </div>
                            <?php } ?>
                            <?php if ($bump_ad_settings) { ?>
                                <div class="col-xs-7" style="margin-left: 12%;margin-right: 33%;">
                                    <input class="col-xs-1" type="checkbox" <?php if($bump_ad[0]['bump_ad'] == '1') echo 'checked';  ?> name="bump_ad" value="1"
                                           onclick="showBtn()">
                                    <img class="col-xs-2" src="uploads/<?php echo $bump_ad_settings[0]['ad_icon']; ?>"
                                         alt="top" style="width: 100px;height: 80px">
                                    <ul class="col-xs-7 list list-unstyled">
                                        <li>
                                            <h4>Daily Bump Up</h4>
                                            <p><?php echo $bump_ad_settings[0]['ad_text']; ?></p>
                                            <p><strong>Ad duration
                                                    :</strong><input type="text" class="form-control" name="daterange2"
                                                                     value="01/01/2015 - 01/31/2015"/>
                                            </p>
                                        </li>
                                    </ul>
                                    <h4 class="col-xs-2" style="text-align: right">Price</h4>
                                    <p class="col-xs-2"
                                       style="text-align: right"><?php echo $bump_ad_settings[0]['ad_price']; ?> BDT</p>
                                </div>
                            <?php } ?>
                            <a href="market">
                                <button style="margin-left: 30%;margin-right: 10px;float: left" type="submit"
                                        class="btn btn-danger">Cancel
                                </button>
                            </a>
                            <button style="margin-left: 10px;display: none;" id="myBtn" type="submit"
                                    class="btn btn-info">Submit
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-xs-1"></div>

            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->


<script src="assets/js/ace-extra.min.js"></script>
<!--<script src="assets/js/jquery.2.1.1.min.js"></script>-->
<script src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<!--<script src="assets/js/jquery.min.js"></script>-->
<!--<script src="assets/js/moment.min.js"></script>-->
<script src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="assets/js/daterangepicker.js"></script>
<script src="assets/js/bootstrap.js"></script>


<script type="text/javascript">
    //rakib 
    $(document).ready(function () {
        $('input[name="daterange1"]').daterangepicker(
            { minDate: moment().subtract('days', -1)
            });
        $('input[name="daterange2"]').daterangepicker(
            { minDate: moment().subtract('days', -1)
        });
    });
    //            $(function() {
    //                $('input[name="daterange"]').daterangepicker();
    //            });
</script>
<script>
    function showBtn() {
        if (document.getElementById('myBtn').style.display === "none") {
            document.getElementById('myBtn').style.display = "block";
        }
    }
</script>


<script type="text/javascript">
    window.jQuery || document.write("<script src='assets/js/jquery.min.js'>" + "<" + "/script>");
</script>


<script type="text/javascript">
    if ('ontouchstart' in document.documentElement)
        document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>

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
<script src="assets/js/ace.min.js"></script>
\
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
            toolbar: [
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
            toolbar: [
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
    function myclick() {
        var des = $('#editor1').html();
        $('#desvalue').val(des);
    }


    var fle_cnt = 1;
    $('#addNew').click(function (event) {

        event.preventDefault();
        if (fle_cnt <= 4) {
            fle_cnt++;
            $('#bkup_doc_rw').after('<div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">Sub Images:</label><div class="col-sm-9" ><input type="file" name="userfile[]" id="bkup_doc_proof_' + fle_cnt + '"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-danger btn-xs letter_font remNew" style="text-decoration: none;cursor: pointer;" href="#">-Remv</a></div>');

        }
    });

    $(document).on('click', '.remNew', function (event) {
        event.preventDefault();

        fle_cnt--;
        $(this).closest('div').remove();

    });


</script>


<script>
    function category_option() {
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


    function select_dist() {
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

        if (pass1 != pass2) {
            //alert("Passwords Do not match");
            document.getElementById("password1").style.borderColor = "#E34234";
            document.getElementById("password2").style.borderColor = "#E34234";
            document.getElementById("validate_status").innerHTML = 'Passwords Not Matched';
            ok = false;
        }

        else if (pass1.length < 6) {
            document.getElementById("validate_status").innerHTML = 'Minimum 6 characters needed';
            ok = false;
        }
        else if (!pass1.match(Exp)) {
            document.getElementById("validate_status").innerHTML = 'Password must contains alpha numeric';
            ok = false;
        }
        else {
            //alert("Passwords Match!!!");
        }
        return ok;
    }
</script>
<style type="text/css">
    #dvPreview img {
        margin: 5px;
    }
</style>

</body>
</html>




