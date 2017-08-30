            <div class="main-content">
                <div class="main-content-inner">


                    <div class="page-content">
                        <div class="ace-settings-container" id="ace-settings-container">

                        </div> 

                        <div class="page-header">
                            <h1>
                                Add Product to Market Place

                            </h1>
                        </div><!-- /.page-header -->

                        <div class="row">
                            <div class="col-xs-12">


                                <div class="row">
                                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
                                        <form name="myForm" class="form-horizontal" action="<?php echo site_url('seller/insert_product_marketplace'); ?>" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Name:</label>
                                                <div class="col-sm-9">
                                                    <input id="form-field-1" onblur="show_en_first_name_msg()" name="product_name" placeholder="Product Name" class="col-xs-10 col-sm-5" type="text">
                                                    <span id="en_first_name_error_msg" style="display: none">Please Enter Product Name</span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Price :</label>

                                                <div class="col-sm-9">
                                                    <input id="form-field-1" onblur="show_en_first_name_msg()" name="product_price" placeholder="Product Price" class="col-xs-10 col-sm-5" type="text">
                                                    <span id="en_first_name_error_msg" style="display: none">Please Enter Product Price</span>
                                                </div>
                                            </div>
											
											<div class="form-group">
                                                
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Location :</label>

                                                <div class="col-sm-9">
                                                    <input id="form-field-1" onblur="show_en_first_name_msg()" name="product_location" placeholder="Product Location" class="col-xs-10 col-sm-5" type="text">
                                                    <span id="en_first_name_error_msg" style="display: none">Please Enter Product Location</span>
                                                </div>
                                            </div>
											
											
											
							

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Category:</label>

                                                <div class="col-sm-9">

                                                    <select name="cat_id" id="cat_select"  onchange="category_option()" style="width: 41.5%;">
                                                        <option value="">Choose a Category</option>
                                                        <?php foreach ($category as $row) { ?>
                                                            <option value="<?= $row['cat_id']; ?>"><?= $row['cat_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span id="bn_first_name_error_msg" style="display: none">Please Enter Designation</span>
                                                </div>
                                            </div>
                                            <div class="space-4"></div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Sub-category :</label>

                                                <div class="col-sm-9">
                                                    <select name="sub_cat_id" id="sub_category" style="width: 41.5%;">
                                                        
                                                        
                                                    </select>
                                                </div>

                                            </div>
											
											
											 <div class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Main Image</label>

                                                <div class="col-sm-9">
                                                   <input required id="fileupload_main" name="userfile[]" type="file"/>
													<div id="dvPreview_main"></div>
                                                </div>

                                            </div>
											
											<div class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Sub Images:</label>

                                                <div class="col-sm-9">
                                                   <input id="fileupload" multiple name="userfile[]"  type="file"/>
													<div id="dvPreview"></div>
                                                </div>

                                            </div>
											
			
										
											<div class="form-group">
                                                
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Description :</label>

                                                <div class="col-sm-6">
                                                    
                                                    <!--<textarea  style="resize:none" name="product_description" id="form-field-1" cols="30" placeholder="Product Description" class="col-xs-10 col-sm-5" rows="10"><?=$p_details[0]['market_place_description'];?></textarea>
													<span id="en_first_name_error_msg" style="display: none">Please Enter Product Description</span>-->
													<div onblur="myclick()" class="wysiwyg-editor" name="description" id="editor1"></div>
															
															<script type="text/javascript">
																var $path_assets = "dist";
															</script>
															
													<input type="hidden" name="product_description" id="desvalue">
                                                </div>
                                            </div>
											

                                          
                                            <button style="margin-left:46.5%;" class="btn btn-info" type="submit" name="btn">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                Insert
                                            </button>


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

			



		<script src="assets/js/jquery.2.1.1.min.js"></script>


		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

	
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
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
			jQuery(function($){
	
	function showErrorAlert (reason, detail) {
		var msg='';
		if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
		else {
			//console.log("error uploading file", reason, detail);
		}
		$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
		 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
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
			{name:'bold', className:'btn-info'},
			{name:'italic', className:'btn-info'},
			{name:'strikethrough', className:'btn-info'},
			{name:'underline', className:'btn-info'},
			null,
			{name:'insertunorderedlist', className:'btn-success'},
			{name:'insertorderedlist', className:'btn-success'},
			{name:'outdent', className:'btn-purple'},
			{name:'indent', className:'btn-purple'},
			null,
			{name:'justifyleft', className:'btn-primary'},
			{name:'justifycenter', className:'btn-primary'},
			{name:'justifyright', className:'btn-primary'},
			{name:'justifyfull', className:'btn-inverse'},
			null,
			{name:'createLink', className:'btn-pink'},
			{name:'unlink', className:'btn-pink'},
			null,
			{name:'insertImage', className:'btn-success'},
			null,
			'foreColor',
			null,
			{name:'undo', className:'btn-grey'},
			{name:'redo', className:'btn-grey'}
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
	

	$('#editor2').css({'height':'200px'}).ace_wysiwyg({
		toolbar_place: function(toolbar) {
			return $(this).closest('.widget-box')
			       .find('.widget-header').prepend(toolbar)
				   .find('.wysiwyg-toolbar').addClass('inline');
		},
		toolbar:
		[
			'bold',
			{name:'italic' , title:'Change Title!', icon: 'ace-icon fa fa-leaf'},
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
	
	


	$('[data-toggle="buttons"] .btn').on('click', function(e){
		var target = $(this).find('input[type=radio]');
		var which = parseInt(target.val());
		var toolbar = $('#editor1').prev().get(0);
		if(which >= 1 && which <= 4) {
			toolbar.className = toolbar.className.replace(/wysiwyg\-style(1|2)/g , '');
			if(which == 1) $(toolbar).addClass('wysiwyg-style1');
			else if(which == 2) $(toolbar).addClass('wysiwyg-style2');
			if(which == 4) {
				$(toolbar).find('.btn-group > .btn').addClass('btn-white btn-round');
			} else $(toolbar).find('.btn-group > .btn-white').removeClass('btn-white btn-round');
		}
	});


	

	//RESIZE IMAGE
	
	//Add Image Resize Functionality to Chrome and Safari
	//webkit browsers don't have image resize functionality when content is editable
	//so let's add something using jQuery UI resizable
	//another option would be opening a dialog for user to enter dimensions.
	if ( typeof jQuery.ui !== 'undefined' && ace.vars['webkit'] ) {
		
		var lastResizableImg = null;
		function destroyResizable() {
			if(lastResizableImg == null) return;
			lastResizableImg.resizable( "destroy" );
			lastResizableImg.removeData('resizable');
			lastResizableImg = null;
		}

		var enableImageResize = function() {
			$('.wysiwyg-editor')
			.on('mousedown', function(e) {
				var target = $(e.target);
				if( e.target instanceof HTMLImageElement ) {
					if( !target.data('resizable') ) {
						target.resizable({
							aspectRatio: e.target.width / e.target.height,
						});
						target.data('resizable', true);
						
						if( lastResizableImg != null ) {
							//disable previous resizable image
							lastResizableImg.resizable( "destroy" );
							lastResizableImg.removeData('resizable');
						}
						lastResizableImg = target;
					}
				}
			})
			.on('click', function(e) {
				if( lastResizableImg != null && !(e.target instanceof HTMLImageElement) ) {
					destroyResizable();
				}
			})
			.on('keydown', function() {
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
				var des =$('#editor1').html();
				$('#desvalue').val(des);
			}
		</script>
		
		
		
		 <script>
            function category_option()
            {
		         var cat_id=$('#cat_select').val();
		         //alert(cat_id);
				 
		    	 $.ajax({
			        url: "seller/select_sub_category",
			        type: "post",
			        data: {cat_id:cat_id},
			        success: function(msg) {
//alert(msg);
		            $('#sub_category').html(msg);
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
        document.getElementById("validate_status").innerHTML='Passwords Not Matched';
        ok = false;
    }
    
    else if(pass1.length<6)
    {
       document.getElementById("validate_status").innerHTML='Minimum 6 characters needed';
        ok = false;
    }
    else if(!pass1.match(Exp))
    {
       document.getElementById("validate_status").innerHTML='Password must contains alpha numeric';
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

            			
			
			
            