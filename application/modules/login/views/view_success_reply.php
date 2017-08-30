<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Address Book</title>

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


        <link href="raw/css/main.css" rel="stylesheet" type="text/css"/>
        <link href="raw/css/reset.css" rel="stylesheet" type="text/css"/>
        <!-- page specific plugin styles -->
        <link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
        <link rel="stylesheet" href="assets/css/chosen.min.css" />
        <link rel="stylesheet" href="assets/css/datepicker.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
        <link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
        <link rel="stylesheet" href="assets/css/colorpicker.min.css" />
        <link rel="stylesheet" href="assets/css/style/style.css" type="text/css" />

        
        <style>
            .header-style-1 .header-nav .navbar-default .navbar-collapse .navbar-nav > li > a {
                background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
                color: none;
                font-family: 'Montserrat', sans-serif;
                font-size: 18px;
                font-weight: 700;
                line-height: 0px;
                padding: 25px 35px 10px;
                -webkit-transitio: all 0.2s linear 0s;
                -moz-transition: all 0.2s linear 0s;
                -o-transition: all 0.2s linear 0s;
                transition: all 0.2s linear 0s;
            }
            
            .btn-info{
                background-color: #ace936 !important;
                border-color: #ace936 !important;
                margin-top: -18px;
                font-size: 17px;
            }
            
            .navbar {
                position: relative;
                min-height: 50px;
                margin-bottom: 0px;
                border: 1px solid transparent;
                height: auto
            }
            
            .btn {
                display: inline-block;
                padding: 6px 12px;
                margin-bottom: 0;
                font-size: 14px;
                font-weight: 400;
                line-height: 1.42857143;
                text-align: center;
                white-space: nowrap;
                vertical-align: middle;
                cursor: pointer;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                background-image: none;
                border: 1px solid transparent;
                border-radius: 4px;
            }
            
            .navbar .navbar-nav > li > a:hover, .navbar .navbar-nav > li > a:focus, .navbar .navbar-nav > li.open > a {
                background-color: #61b36f !important;
                color: #fff !important;
            }
            
            .navbar .navbar-nav > li{
                border: 0px;
            }
            
            .container {
                padding-right: 15px;
                padding-left: 15px;
                margin-right: auto;
                margin-left: auto;
            }
            
            .header-nav .navbar-default .navbar-collapse .navbar-nav > li > a {
                background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
                color: none;
                font-family: 'Montserrat', sans-serif;
                font-size: 18px;
                font-weight: 700;
                line-height: 0px;
                padding: 25px 35px 10px;
                -webkit-transitio: all 0.2s linear 0s;
                -moz-transition: all 0.2s linear 0s;
                -o-transition: all 0.2s linear 0s;
                transition: all 0.2s linear 0s;
            }


            .btn-info:hover, .btn-info:active, .open > .btn-info.dropdown-toggle {
                background-color: #ace936 !important;
                border-color: #ace936;
            }
        </style>

    </head>

    <body>


        <div class="body-content outer-top-xs" id="top-banner-and-menu">
            <div class="container">
                <div class="row">                    
                    <div class="main-content">
                        <div class="main-content-inner">
                            <div class="page-content">
                                <div class="ace-settings-container" id="ace-settings-container">

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-xs-1"></div>
                                        <div class="col-xs-10" style="margin: 0px auto">
                                            <div class="jumbotron" style="text-align: center;">
                                                <img src="assets/images/ok-icon-12.png" alt="ok" style="text-align: center; width: 50px; height: 50px;">
                                                <p>Your registration is successfully completed.</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-1"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-5 text-right" style="margin:10px;">
                                            <a href="login"><input type="button" class="btn btn-success" value="Click here for Login"></a>
                                        </div>
                                        <div class="col-md-4 text-left" style="float:left;margin:10px;">
                                            <input type="button" style="float:left" onclick="get_data()" class="btn btn-success" value="Click here for membership">
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="this_data" style="display:none;">
                                        <div class="col-xs-1"></div>

                                        <form action="login/insert_membership/<?= $reg_id; ?>" method="post" enctype="multipart/form-data">
                                            <div class="col-xs-10 jumbotron">
                                                <div class="form-group row">
                                                    <label for="background-image" class="col-xs-2 col-form-label">Background Image</label>
                                                    <div class="col-xs-10">
                                                        <input type='file' name="cover_img" onchange="readURL(this);"/>
                                                        <img id="blah" style="height:100px;width:100px;" src="uploads/no_image.png" alt="your image" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-xs-2 col-form-label">Profile Image</label>
                                                    <div class="col-xs-10">
                                                        <input type='file' name="profile_img" onchange="readURL_2(this);"/>
                                                        <img id="blah_2" style="height:100px;width:100px;" src="uploads/no_image.png" alt="your image" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-tel-input" class="col-xs-2 col-form-label">Store Name</label>
                                                    <div class="col-xs-10">
                                                        <input type="text" required name="store_name" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-tel-input" class="col-xs-2 col-form-label">Home title</label>
                                                    <div class="col-xs-10">
                                                        <input type="text" required name="home_title" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-tel-input" class="col-xs-2 col-form-label">Home Detail</label>
                                                    <div class="col-xs-10">
                                                        <textarea required rows="5" name="home_detail" class="form-control"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-tel-input" class="col-xs-2 col-form-label">About us</label>
                                                    <div class="col-xs-10">
                                                        <textarea required rows="5" name="about_us" class="form-control"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-tel-input" class="col-xs-2 col-form-label">Contact us</label>
                                                    <div class="col-xs-10">   
                                                        <table class="table table-bordered">
                                                            <tr>	
                                                                <td>
                                                                    <div onblur="myclick()" class="wysiwyg-editor" name="contact_us" id="editor1">

                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        var $path_assets = "dist";
                                                                    </script>
                                                                </td>
                                                            <input type="hidden" name="contact_us" id="desvalue">
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="form-group row" align="center">
                                                    <div class="col-xs-10 col-md-offset-2">
                                                        <input type="submit" class="btn btn-success" value="SUBMIT">
                                                    </div>
                                                </div>
                                    </div>
                                        </form>

                                </div><!-- /.page-content -->
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            
</div>

                    <footer id="footer" class="footer color-bg" style="padding-top:-10px;width: 100%;">
       
                        <!-- /.links-social -->


                        <div class="copyright-bar" style="background-image: none">
                            <div class="container">
                                <div class="page-header">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-3">
                                            <div class="page-footer wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                                                <h3 style="font-size:30px">
                                                    Information
                                                </h3>
                                                <ul class="page-footer-list" style="padding-left:35px;margin-top: 7px">

                                                    <li>
                                                        <i class="fa fa-angle-right"></i>
                                                        <a href="about_us">About us</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-angle-right"></i>
                                                        <a data-toggle="modal" data-target="#myModal" href="#" data-dropdown="drop7">Contact Us</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-angle-right"></i>
                                                        <a href="sell_first">How to Sell First</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-3">
                                            <div class="page-footer wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                                                <h1 style="margin-top: 20px">
                                                    <!--Important Links-->
                                                </h1>
                                                <ul class="page-footer-list" style="padding-left:35px;">


                                                    <li>
                                                        <i class="fa fa-angle-right"></i>
                                                        <a href="terms">Term & condition</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-angle-right"></i>
                                                        <a href="service">Privacy policy</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-angle-right"></i>
                                                        <a href="promote_ad">Promote Your Ad</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-sm-3">
                                            <div class="page-footer wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                                                <h1 style="margin-top: 20px">
                                                    <!-- Important Links-->
                                                </h1>
                                                <ul class="page-footer-list" style="padding-left:35px;">

                                                    <li>
                                                        <i class="fa fa-angle-right"></i>
                                                        <a href="support">Membership</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-angle-right"></i>
                                                        <a href="we_are_hiring">We are Hiring</a>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-angle-right"></i>
                                                        <a href="stay_safe">Stay Safe on meeean.com</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-3 address wow fadeInUp clearfix payment-methods" data-wow-duration="2s" data-wow-delay=".1s">

                                            <address style="margin-top: 20px">
                                                <ul>
                                                    <li>
                                                        <img src="raw/images/payments/facebook.png" alt="facebook" style="width: 45px;height: 45px;">
                                                    </li>
                                                    <li>
                                                        <img src="raw/images/payments/twitter.png" alt="twitter" style="width: 45px;height: 45px;">
                                                    </li>
                                                    <li>
                                                        <img src="raw/images/payments/google.png" alt="pinterest" style="width: 45px;height: 45px;">
                                                    </li>
                                                    <!--                    <li>
                                                                            <img src="raw/images/payments/linkedin.png" alt="linkedin" style="width: 28px;height: 28px;">
                                                                        </li>
                                                                        <li>
                                                                            <img src="raw/images/payments/youtube.png" alt="youtube" style="width: 28px;height: 28px;">
                                                                        </li>-->
                                                </ul>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <!-- <div class="col-md-12">
                                        <div class="col-md-4" style="background-color:white;">
                                                
                                        </div>
                                        <div class="col-md-4" style="background-color:blue;">
                                                
                                        </div>
                    
                                        <div class="col-md-4" style="background-color:green;">
                                                
                                        </div>
                                </div> -->
                                <div class="col-xs-12 col-sm-6 no-padding">
                                    <div class="copyright">
                                        Copyright © <?= date('Y') ?>
                                        <a href="">MEEEAN</a>
                                        - All rights Reserved
                                    </div>
                                </div>
                                <!-- <div class="col-xs-12 col-sm-6 no-padding">
                                     <div class="clearfix payment-methods">
                                         <ul>
                                             <li><img src="raw/images/payments/1.png" alt=""></li>
                                             <li><img src="raw/images/payments/2.png" alt=""></li>
                                             <li><img src="raw/images/payments/3.png" alt=""></li>
                                             <li><img src="raw/images/payments/4.png" alt=""></li>
                                             <li><img src="raw/images/payments/5.png" alt=""></li>
                                         </ul>
                                     </div> /.payment-methods -->
                            </div>
                        </div>

                
                    </footer>

    

    <script>
        function get_data()
        {
            $("#this_data").show();
        }
    </script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                            .attr('src', e.target.result)
                            .width(150)
                            .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURL_2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah_2')
                            .attr('src', e.target.result)
                            .width(150)
                            .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

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