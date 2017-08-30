				<div class="main-content">
					<div class="main-content-inner">
						<div class="page-content">
							<?php if(!empty($message)):?>  
				            <div class="col-lg-12" align="center">
				              <div class="alert alert-dismissable alert-success">
				                <button type="button" class="close" data-dismiss="alert">&times;</button>
				                <strong><?=$message?></strong> 
				              </div>
				            </div>
				            <?php endif;?>
				            <?php if(!empty($message_error)):?>  
				            <div class="col-lg-12">
				              <div class="alert alert-dismissable alert-danger">
				                <button type="button" class="close" data-dismiss="alert">&times;</button>
				                <strong><?=$message_error?></strong> 
				              </div>
				            </div>
				            <?php endif;?> 

							<div class="page-header">
								<h1 style="text-align:center;">
									Insert Trade Show Details
								</h1>
							</div><!-- /.page-header -->
							<div class="row">
								<div class="col-xs-12" >
									<!-- PAGE CONTENT BEGINS -->
									<form class="form-horizontal" role="form" class="col-sm-6" action="admin/insert_trade" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label class="col-sm-2 control-label no-padding-right" for="form-field-1"></label>
											<div class="col-sm-6	">
												<table class="table table-bordered">
												<tr>
													<th>image</th>
													<td><input type="file" name="file"></td>
												</tr>
												<tr>
													<th>Name</th>
													<td><input type="text" name="name"></td>
												</tr>
												<tr>
													<th>Venue</th>
													<td><input type="text" name="venue"></td>
												</tr>
												<tr>
													<th>Details</th>
													<td>
														<div onblur="myclick()" class="wysiwyg-editor" name="description" id="editor1"></div>
															
															<script type="text/javascript">
																var $path_assets = "dist";
															</script>
													</td>
													<input type="hidden" name="description" id="desvalue">
												</tr>
												<tr>
													<th></th>
													<td>
														<input type="submit" class="btn btn-info" name="Submit">
														<button class="btn" type="reset">
														<i class="ace-icon fa fa-undo bigger-110"></i>Reset</button>
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
 
	</body>
</html>
