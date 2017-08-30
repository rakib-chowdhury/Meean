<div class="main-content">
	<div class="main-content-inner">
						<div class="breadcrumbs" id="breadcrumbs">
							<script type="text/javascript">
								try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
							</script>

							<ul class="breadcrumb">
								<li>
									<i class="ace-icon fa fa-home home-icon"></i>
									<a href="<?php echo site_url('admin/index');?>">Home</a>
								</li>

								<li>
									<a href="<?php echo site_url('admin/category');?>">Category</a>
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
								<h1>
									Insert Category
									
								</h1>
							</div><!-- /.page-header -->

							<div class="row">
								<div class="col-xs-6" >
									<!-- PAGE CONTENT BEGINS -->



									<form class="form-horizontal" role="form" class="col-sm-6" action="admin/insert_category" method="post">
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Category </label>

											<div class="col-sm-9 ">
												<input type="text" id="form-field-1" name="cat_name" placeholder="category" class="col-xs-10 col-sm-5" />
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
								

								<div class="col-xs-6">
								
									<form class="form-horizontal" role="form" class="col-sm-6" action="insert_sub_category" method="post">
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Category </label>

											<div class="col-sm-6">
												<div class="space-2"></div>

													<select class="chosen-select form-control" id=" form-field-select-4" data-placeholder="Choose a State..." name="cat_id">
													<?php foreach($all_cat_info as $row):?>
													<option value="<?=$row->cat_id;?>"><?=$row->cat_name;?></option>
													<?php endforeach;?>
													</select>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sub Category </label>

											<div class="col-sm-9">
												<input type="text" id="form-field-1" name="sub_cat_name" placeholder="Sub Category" class="col-xs-10 col-sm-5" />
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