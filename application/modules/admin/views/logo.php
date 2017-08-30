<div class="main-content">
	<div class="main-content-inner">
		<div class="page-content">
			<div class="page-content">
            <!-- /.page-header starts -->
				<div class="ace-settings-container" id="ace-settings-container">

	            </div> 

	            <div class="page-header">
	                <h1>
	                    Update logo

	                </h1>
	            </div>
            <!-- /.page-header ends -->


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

		<div class="row">
			<div class="col-xs-6" >
				<!-- PAGE CONTENT BEGINS -->



				<form class="form-horizontal" role="form" class="col-sm-6" action="admin/update_logo" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Input images</label>
						<div class="col-sm-9 " style="padding-top:10px;">
							<input type="file" id="form-field-1" name="logo" placeholder="category" />
						</div>
					</div>
					<div class="clearfix form-actions">
						<div class="col-md-offset-3 col-md-9">
							<input type="submit" class="btn btn-info" name="Submit">
                            <input type="hidden" name="edit_id" value="<?=$all_info->logo_id;?>">
                            <input type="hidden" name="logo" value="<?=$all_info->logo;?>">

							&nbsp; &nbsp; &nbsp;
							<button class="btn" type="reset">
								<i class="ace-icon fa fa-undo bigger-110"></i>
								Reset
							</button>
						</div>
					</div>
				</form>

				
				
			</div>
			
			<div class="col-xs-6" >
				<table class="table">
					<tr>
						<th style="text-align:center;">Logo</th>
					</tr>
					<tr>
						<td style="text-align:center;"><img style="height:70px;width:250px;" src="uploads/<?=$all_info->logo;?>"></td>
					</tr>
				</table>
				
			</div>

			
								
							
</div>



					</div>
				</div>