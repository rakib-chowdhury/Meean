            <div class="main-content">
                <div class="main-content-inner">


                    <div class="page-content">
                        <div class="ace-settings-container" id="ace-settings-container">

                        </div> 

                        <div class="page-header">
                            <h1>
                                Edit Product

                            </h1>
                        </div><!-- /.page-header -->

                        <div class="row">
                            <div class="col-xs-12">


                                <div class="row">
                                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
                                        <form name="myForm" class="form-horizontal" action="seller/update_product_details/<?=$p_details[0]['product_id'];?>" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Name:</label>
                                                <div class="col-sm-9">
                                                    <input id="form-field-1" value="<?=$p_details[0]['product_name'];?>" onblur="show_en_first_name_msg()" name="product_name" placeholder="Product Name" class="col-xs-10 col-sm-5" type="text">
                                                    <span id="en_first_name_error_msg" style="display: none">Please Enter Product Name</span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Price :</label>

                                                <div class="col-sm-9">
                                                    <input id="form-field-1" value="<?=$p_details[0]['product_price'];?>" onblur="show_en_first_name_msg()" name="product_price" placeholder="Product Price" class="col-xs-10 col-sm-5" type="text">
                                                    <span id="en_first_name_error_msg" style="display: none">Please Enter Product Price</span>
                                                </div>
                                            </div>
											
											<div class="form-group">
                                                
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Model :</label>

                                                <div class="col-sm-9">
                                                    <input id="form-field-1" value="<?=$p_details[0]['product_model'];?>" onblur="show_en_first_name_msg()" name="product_model" placeholder="Product Model" class="col-xs-10 col-sm-5" type="text">
                                                    <span id="en_first_name_error_msg" style="display: none">Please Enter Product Model</span>
                                                </div>
                                            </div>
											
											<div class="form-group">
                                                
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Size :</label>

                                                <div class="col-sm-9">
                                                    <input id="form-field-1" value="<?=$p_details[0]['product_size'];?>" onblur="show_en_first_name_msg()" name="product_size" placeholder="Product Size" class="col-xs-10 col-sm-5" type="text">
                                                    <span id="en_first_name_error_msg" style="display: none">Please Enter Product Size</span>
                                                </div>
                                            </div>
											
											<div class="form-group">
                                                
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Quantity :</label>

                                                <div class="col-sm-9">
                                                    <input id="form-field-1" value="<?=$p_details[0]['product_quantity'];?>" onblur="show_en_first_name_msg()" name="product_quantity" placeholder="Product Quantity" class="col-xs-10 col-sm-5" type="number" min="1" >
                                                    <span id="en_first_name_error_msg" style="display: none">Please Enter Product Quantity</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Category:</label>

                                                <div class="col-sm-9">

                                                    <select name="cat_id" id="cat_select"  onchange="category_option()" style="width: 41.5%;">
                                                        <option value="">Choose a Category</option>
                                                        <?php foreach ($category as $row) { if($p_details[0]['cat_id']==$row['cat_id']){?>
                                                            <option selected value="<?= $row['cat_id']; ?>"><?= $row['cat_name']; ?></option>
                                                        <?php } else {?>
														<option value="<?= $row['cat_id']; ?>"><?= $row['cat_name']; ?></option>
														<?php } } ?>
                                                    </select>
                                                    <span id="bn_first_name_error_msg" style="display: none">Please Enter Designation</span>
                                                </div>
                                            </div>
                                            <div class="space-4"></div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Sub-category :</label>

                                                <div class="col-sm-9">
                                                    <select name="sub_cat_id" id="sub_category" style="width: 41.5%;">
													<option selected value="<?=$sub_category_name[0]['sub_cat_id'];?>" ><?=$sub_category_name[0]['sub_cat_name'];?></option>
                                                        
                                                    </select>
                                                </div>

                                            </div>
											
											<div class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Previous Main Image</label>

                                                <div class="col-sm-4">
                                                   <img style="width:100%" src="assets/product_images/<?=$p_details[0]['product_image'];?>" alt="" />
													<input type="hidden" name="pre_main_img" value="<?=$p_details[0]['product_image'];?>" />
												</div>

                                            </div>
											
											
											<div class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Previous Sub Image</label>
												<?php for($i=0;$i<$count;$i++){ ?>
                                                <div class="col-sm-2">
                                                   <img style="width:100%" src="assets/product_images/<?=$p_details[$i]['images_name'];?>" alt="" />
													<input type="hidden" name="pre_sub_img[]" value="<?=$p_details[$i]['images_name'];?>"/>
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

                                            </div>
											
			
										
											<div class="form-group">
                                                
                                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Description :</label>

                                                <div class="col-sm-9">
                                                    
                                                    <textarea  style="resize:none" name="product_description" id="form-field-1" cols="30" placeholder="Product Description" class="col-xs-10 col-sm-5" rows="10"><?=$p_details[0]['product_description'];?></textarea>
													<span id="en_first_name_error_msg" style="display: none">Please Enter Product Description</span>
                                                </div>
                                            </div>
											

                                          
                                            <button style="margin-left:46.5%;" class="btn btn-info" type="submit" name="btn">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                Update
                                            </button>

											 <a href="seller/all_product" class="btn btn-danger">
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

            