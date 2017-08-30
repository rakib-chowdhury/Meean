<base href="<?= base_url(); ?>"></base>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Meeean</title>

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />


        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />


        <link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />


        <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

        <script src="assets/ckeditor/ckeditor.js"></script>
        <script src="assets/ckeditor/js/sample.js"></script>
        <link rel="stylesheet" href="assets/ckeditor/css/samples.css">
        <link rel="stylesheet" href="assets/ckeditor/toolbarconfigurator/lib/codemirror/neo.css">



        <script src="assets/js/ace-extra.min.js"></script>



        <!-- page specific plugin styles -->
        <link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
        <link rel="stylesheet" href="assets/css/chosen.min.css" />
        <link rel="stylesheet" href="assets/css/datepicker.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
        <link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
        <link rel="stylesheet" href="assets/css/colorpicker.min.css" />
        <link rel="stylesheet" href="assets/css/style/style.css" type="text/css" />


    </head>

    <body class="no-skin">

        <div id="navbar" class="navbar navbar-default">
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
                    <a href="admin">
                        <img style="height:100%;width:150px" src="uploads/<?= $logo_info->logo; ?>" alt="logo">
                    </a>
                </div>

                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                    <li class="light-blue">
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <!--<img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" />-->
                            <span class="user-info">
                                <small>Welcome,</small>
                                Admin
                            </span>

                            <i class="ace-icon fa fa-caret-down"></i>
                        </a>

                        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                            <li>
                                <a data-toggle="modal" data-target="#change_password">
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
        </div>

        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.check('main-container', 'fixed')
                } catch (e) {
                }
            </script>

            <div id="sidebar" class="sidebar                  responsive">
                <script type="text/javascript">
                    try {
                        ace.settings.check('sidebar', 'fixed')
                    } catch (e) {
                    }
                </script>
        <ul class="nav nav-list">
            <li class="active">
                <a href="admin">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text"> Dashboard </span>
                </a>

                <b class="arrow"></b>
            </li>
            <!-- <li class="">
                <a href="admin/all_slider">
                    <i class="menu-icon fa fa-picture-o"></i>
                    <span class="menu-text"> Slider </span>
                </a>
            </li> -->

            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-desktop"></i>
                    <span class="menu-text">
                        Home
                    </span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        <a href="admin/all_market_slider">
                            <i class="menu-icon fa fa-picture-o"></i>
                            <span class="menu-text">Slider </span>
                        </a>
                    </li>
                    <li class="">
                        <a href="admin/market_sponsor">
                            <i class="menu-icon fa fa-list"></i>
                            <span class="menu-text">Sponsor </span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-desktop"></i>
                    <span class="menu-text">
                        Trade Show
                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="admin/all_trade">
                            <i class="menu-icon fa fa-caret-right"></i>
                            All Tradeshow
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="admin/add_trade">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Add Trade
                        </a>

                        <b class="arrow"></b>
                    </li>

                </ul>
            </li> -->

            <li class="">
                <a href="admin/all_market_category">
                    <i class="menu-icon fa fa-list"></i>
                    <span class="menu-text">Category</span>
                </a>
            </li>

            <!-- <li class="">
                <a href="admin/all_product">
                    <i class="menu-icon fa fa-list"></i>
                    <span class="menu-text"> Product </span>
                </a>
            </li> -->
            

            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-desktop"></i>
                    <span class="menu-text">
                        Products
                    </span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        <a href="admin/all_market_product">
                            <i class="menu-icon fa fa-list"></i>
                            <span class="menu-text">All product </span>
                        </a>
                    </li>
                    <li class="">
                        <a href="admin/all_pending_product">
                            <i class="menu-icon fa fa-list"></i>
                            <span class="menu-text">All Pending product </span>
                        </a>
                    </li>
                    <li class="">
                        <a href="admin/all_featured_product">
                            <i class="menu-icon fa fa-list"></i>
                            <span class="menu-text">All Featured product </span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-desktop"></i>
                    <span class="menu-text">
                        Users
                    </span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        <a href="admin/all_user">
                            <i class="menu-icon fa fa-user"></i>
                            <span class="menu-text">All User </span>
                        </a>
                    </li>

                    <li class="">
                        <a href="admin/all_member">
                            <i class="menu-icon fa fa-user"></i>
                            <span class="menu-text">All Member </span>
                        </a>
                    </li>

                    <li class="">
                        <a href="admin/all_pending_members">
                            <i class="menu-icon fa fa-user"></i>
                            <span class="menu-text">Pending Members</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-desktop"></i>
                    <span class="menu-text">
                        Web Settings
                    </span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        <a href="admin/logo">
                            <i class="menu-icon fa fa-picture-o"></i>
                            <span class="menu-text"> Logo </span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>

            <!-- <li class="">
                <a href="admin/all_company">
                    <i class="menu-icon fa fa-pencil-square-o"></i>
                    <span class="menu-text"> Company </span>
                </a>
            </li> -->
            
            <!-- <li class="">
                <a href="" class="dropdown-toggle">
                    <i class="menu-icon fa fa-list"></i>
                    <span class="menu-text">
                        Contact Us
                    </span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        <a href="admin/add_contact_us">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Add Contact Us Info
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
            </li> -->

            
            
            <li class="">
                <a href="" class="dropdown-toggle">
                    <i class="menu-icon fa fa-list"></i>
                    <span class="menu-text">
                        Footer Information
                    </span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        <a href="admin/all_about">
                            <i class="menu-icon fa fa-info-circle"></i>
                            <span class="menu-text"> About us </span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="admin/all_membership">
                            <i class="menu-icon fa fa-users"></i>
                            <span class="menu-text"> Members </span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="admin/all_privacy">
                            <i class="menu-icon fa fa-info-circle"></i>
                            <span class="menu-text"> Privacy policy </span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="admin/all_terms">
                            <i class="menu-icon fa fa-cogs"></i>
                            <span class="menu-text"> Terms and Condition </span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="admin/all_hiring">
                            <i class="menu-icon fa fa-caret-right"></i>
                            <span class="menu-text"> we are hiring </span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="admin/how_sell_first">
                            <i class="menu-icon fa fa-caret-square-o-up"></i>
                            <span class="menu-text"> How to Sell First </span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="admin/promote_ad">
                            <i class="menu-icon fa fa-bar-chart"></i>
                            <span class="menu-text">Promote Your Ad</span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="admin/stay_safe">
                            <i class="menu-icon fa fa-save"></i>
                            <span class="menu-text">Stay Safe</span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="admin/add_contact_us">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Add Contact Us Info
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>

            <li class="">
                <a href="admin/advertise">
                    <i class="menu-icon fa fa-plus-square-o"></i>
                    <span class="menu-text"> Advertising </span>
                </a>

                <b class="arrow"></b>
            </li>
            
            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-desktop"></i>
                    <span class="menu-text">
                        Ads
                    </span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="">
                        <a href="admin/ad_settings">
                            <i class="menu-icon fa fa-plus-square-o"></i>
                            <span class="menu-text"> Settings </span>
                        </a>

                        <b class="arrow"></b>
                    </li>
                    
                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-desktop"></i>
                            <span class="menu-text">
                                Top Ads
                            </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="">
                                <a href="admin/all_top_ads">
                                    <i class="menu-icon fa fa-plus-square-o"></i>
                                    <span class="menu-text"> All Top Ads </span>
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <a href="admin/pending_top_ads">
                                    <i class="menu-icon fa fa-plus-square-o"></i>
                                    <span class="menu-text"> All Top Pending Ads </span>
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-desktop"></i>
                            <span class="menu-text">
                                Bump Ads
                            </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="">
                                <a href="admin/all_bump_ads">
                                    <i class="menu-icon fa fa-plus-square-o"></i>
                                    <span class="menu-text"> All Bump Ads </span>
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <a href="admin/pending_bump_ads">
                                    <i class="menu-icon fa fa-plus-square-o"></i>
                                    <span class="menu-text"> All Bump Pending Ads </span>
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </li>

            <!-- <li class="">
                <a href="admin/news_feed">
                    <i class="menu-icon fa fa-newspaper-o"></i>
                    <span class="menu-text"> News Feed </span>
                </a>

                <b class="arrow"></b>
            </li> -->

            <li class="">
                <a href="admin/all_mail">
                    <i class="menu-icon fa fa-envelope"></i>
                    <span class="menu-text"> Mail info </span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="admin/social_link">
                    <i class="menu-icon fa fa-share-square"></i>
                    <span class="menu-text"> Social Link Settings </span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="admin/all_mail_speech">
                    <i class="menu-icon fa fa-volume-up"></i>
                    <span class="menu-text"> Signup Speech </span>
                </a>

                <b class="arrow"></b>
            </li>
        </ul>


                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>

                <script type="text/javascript">
                    try {
                        ace.settings.check('sidebar', 'collapsed')
                    } catch (e) {
                    }
                </script>
            </div>


            <div class="main-content">
                <div class="main-content-inner">
                    <div class="page-content">
                        <?php if (!empty($message)): ?>  
                            <div class="col-lg-12" align="center">
                                <div class="alert alert-dismissable alert-success">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><?= $message ?></strong> 
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($message_error)): ?>  
                            <div class="col-lg-12">
                                <div class="alert alert-dismissable alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><?= $message_error ?></strong> 
                                </div>
                            </div>
                        <?php endif; ?> 


                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

                        <script type="text/javascript">
                    function sendData()
                    {

                        var data = new FormData($('#posting_comment')[0]);


                        $.ajax({
                            type: "POST",
                            url: "<?php echo site_url('admin/fileUpload'); ?>",
                            data: data,
                            mimeType: "multipart/form-data",
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function (data)
                            {
                                console.log(data);

                            }
                        });

                    }

                        </script>



                        <div class="page-header">
                            <h1 style="text-align:center;">
                                How to Sell First
                            </h1>
                        </div><!-- /.page-header -->
                        <div class="row">
                            <div class="col-xs-12" >
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"></label>
                                    <div class="col-sm-6">
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- PAGE CONTENT BEGINS -->
                            <form class="form-horizontal" role="form" class="col-sm-6" action="admin/update_how_to_sell" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"></label>
                                    <div class="col-sm-6	">
                                        <table class="table table-bordered">
                                            <tr>	
                                                <td>
                                                    <div onblur="myclick()" class="wysiwyg-editor" name="description" id="editor1">
                                                        <?php if($how_to_sell_first){echo $how_to_sell_first->how_to_sell_description;} ?>
                                                    </div>

                                                    <script type="text/javascript">
                                                        var $path_assets = "dist";
                                                    </script>
                                                </td>
                                            <input type="hidden" name="description" id="desvalue">
                                            </tr>
                                            <tr>
                                                <td>
                                                    <button type="submit" class="btn btn-info" name="Submit">Submit</button>
                                                </td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="footer-inner">
                    <div class="footer-content">
                        <span class="bigger-120">
                            <span class="blue bolder">Address Book</span>
                            Application &copy; 2016
                        </span>

                        &nbsp; &nbsp;
                        <span class="action-buttons">
                            <a href="#">
                                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                            </a>

                            <a href="#">
                                <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                            </a>

                            <a href="#">
                                <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                            </a>
                        </span>
                    </div>
                </div>
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
            <script src="assets/js/ace.min.js"></script>


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
                }
            </script>

    </body>
</html>