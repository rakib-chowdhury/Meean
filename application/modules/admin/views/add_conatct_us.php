<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try {
                    ace.settings.check('breadcrumbs', 'fixed')
                } catch (e) {
                }
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo site_url('admin/index'); ?>">Home</a>
                </li>

                <li>
                    <a href="<?php echo site_url('admin/category'); ?>">Contact Us</a>
                </li>

            </ul><!-- /.breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>

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

            <div class="page-header">
                <h1>
                    Insert Contact Us Info

                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12" >
                    <!-- PAGE CONTENT BEGINS -->



                    <form onsubmit="return chkForm()" class="form-horizontal" role="form" class="col-sm-6" action="admin/save_contact_us_info" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Company Text </label>

                            <div class="col-sm-9 ">
                                <div onblur="myclick()" class="wysiwyg-editor" name="contact_us_text" id="editor1"><?php if($contact_info){echo $contact_info['0']['contact_us_text'];}?></div>
                                <input type="hidden" name="contact_us_text" id="desvalue">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Company Phone </label>

                            <div class="col-sm-9 ">
                                <input type="text" id="contact_phone" name="contact_us_phone" value="<?php if($contact_info){echo $contact_info['0']['contact_us_phone'];}?>" placeholder="Company Phone" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Company Image </label>

                            <div class="col-sm-9 ">
                                <input type="file" id="form-field-1" name="contact_us_image" class="col-xs-10 col-sm-5" />
                                <?php if($contact_info){?>
                                    <img src="<?php echo base_url().$contact_info['0']['contact_us_image'];?>">
                                    <input type="hidden" name="contact_image" value="<?php echo $contact_info['0']['contact_us_image'];?>">   
                                <?php }?>
                            </div>
                        </div>


                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <!-- <button class="btn btn-info" type="button">
                                        <i class="ace-icon fa fa-check bigger-110"></i>
                                        Submit
                                </button> -->

                                <input type="submit" class="btn btn-info" name="Submit">

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="ace-icon fa fa-undo bigger-110"></i>
                                    Reset
                                </button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

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


<script>
    function chkForm(){
        var cmp_text = document.getElementById('desvalue').value;
        var contact_phone = document.getElementById('contact_phone').value;
//        alert(cmp_text);
        if(cmp_text == null || cmp_text == ''){
            alert('The Input Value Can Not be Empty');
            return false;
        }
        if(isNaN(contact_phone)){
            alert('The Input Value Must be Number');
            return false;
        }
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
    }
</script>