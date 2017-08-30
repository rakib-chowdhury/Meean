<div class="main-content">
				<div class="main-content-inner">
					

					<div class="page-content">
						    <div class="ace-settings-container" id="ace-settings-container">

                        </div> 

                        <div class="page-header">
                            <h1>
                                Dashboard

                            </h1>
                        </div><!-- /.page-header -->

						

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<!--<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>

									<i class="ace-icon fa fa-check green"></i>

									Welcome to
									<strong class="green">
										Ace
										<small>(v1.3.3)</small>
									</strong>,
	легкий, много-функциональный и простой в использовании шаблон для админки на bootstrap 3.3. Загрузить исходники с <a href="https://github.com/bopoda/ace">github</a> (with minified ace js files).
								</div>-->

								<div class="row">
									<div class="col-xs-12 col-sm-6 widget-container-col ui-sortable">
                                                <div class="widget-box ui-sortable-handle">
                                                    <div class="widget-header">
                                                        <h5 class="widget-title">Profile</h5>

                                                        <div class="widget-toolbar">
                                                            <div class="widget-menu">


                                                            </div>


                                                            <a href="#" data-action="collapse">
                                                                <i class="ace-icon fa fa-chevron-up"></i>
                                                            </a>

                                                            <a href="#" data-action="close">
                                                                <i class="ace-icon fa fa-times"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="widget-body">
                                                        <div class="widget-main">
                                                            <div class="total_div">

                                                                <!--<div class="profile_image">
                                                                    <img style="width:100%" src="<?= base_url(); ?>assets/images/avatar.png" alt="" />
                                                                </div>-->
                                                                <div class="profile_description">
                                                                    <div class="profile_title">
                                                                        Name :
                                                                    </div>
                                                                    <div class="profile_value">
                                                                       <?=$get_user_data[0]['reg_first_name'].' '.$get_user_data[0]['reg_last_name'];?>
                                                                    </div>

                                                                    <div class="profile_title">
                                                                        Email :
                                                                    </div>
                                                                    <div class="profile_value">
																	<?=$get_user_data[0]['reg_email'];?>
                                                                    </div>

                                                                    <div class="profile_title">
                                                                        Phone :
                                                                    </div>
                                                                    <div class="profile_value">
																			<?=$get_user_data[0]['reg_phone'];?>
                                                                    </div>


                                                                    <div class="profile_title">
                                                                        Address :
                                                                    </div>
                                                                    <div class="profile_value">
																		<?=$get_user_data[0]['reg_address'];?>
                                                                    </div>
																	
																	<div class="profile_title">
                                                                        City :
                                                                    </div>
                                                                    <div class="profile_value">
																		<?=$get_user_data[0]['reg_city'];?>
                                                                    </div>
																	
																	<div class="profile_title">
                                                                        Country :
                                                                    </div>
                                                                    <div class="profile_value">
																		<?=$get_user_data[0]['reg_country'];?>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

									<div class="vspace-12-sm"></div>

									<!--<div class="col-sm-5">
										<div class="widget-box">
											<div class="widget-header widget-header-flat widget-header-small">
												<h5 class="widget-title">
													<i class="ace-icon fa fa-signal"></i>
													Product Statistics
												</h5>

												<div class="widget-toolbar no-border">
													
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div id="piechart-placeholder"></div>

													<div class="hr hr8 hr-double"></div>

												</div><!-- /.widget-main 
											</div><!-- /.widget-body 
										</div><!-- /.widget-box
									</div><!-- /.col -->
								</div><!-- /.row -->

						</div>
					</div>
				</div>
			</div>

		

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		