    
<div class="wow fadeInUp">
    <div class="info-boxes-inner">
        <div class="container">
            <div class="row">


                <!-- /.info-boxes --><br>
                <!-- ============================================== INFO BOXES : END ============================================== -->


            </div><!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-8 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->
                <?php foreach ($select_company as $row) { ?>
                    <div id="hero">
                        <div class="col-md-12">
                            <div class="table-responsive" align="center">
                                <h2 style="font-size: 25px;margin: 10px 0px;">Company Details</h2>
                                <table class="table table-bordered"  style="width:80%;">
                                    <tr style="border-bottom:1px solid #ddd;">
                                        <th style="width:40%;">Company name</th>
                                        <td><?php echo $row->reg_company_name ?></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #ddd;">
                                        <th>Address</th>
                                        <td><?php echo $row->reg_address ?></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #ddd;">
                                        <th>City</th>
                                        <td><?php echo $row->reg_city ?></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #ddd;">
                                        <th>Country</th>
                                        <td><?php echo $row->reg_country ?></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #ddd;">
                                        <th>Telephone</th>
                                        <td><?php echo $row->reg_company_phone ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>


                    </div>

                <?php } ?>


            </div><!-- /.homebanner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-4">   
                <div class="wow fadeInUp">
                    <div class="info-boxes-inner">

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 company_contact" style="background-color: rgb(247, 248, 246);">
                <h3 style="font-size: 20px;text-align: center;margin: 10px 0px;">Contact With Company</h3>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Subject</label>
                    <?php foreach ($product_name as $row) { ?>     
                        <div class="col-sm-10">
                            <input id="subject" value="<?= $row->product_name; ?>" required type="text" name="subject" placeholder="Mail Subject" class="form-control custom-control" style="border: 1px solid rgb(204, 204, 204);margin-bottom:5px;"/>
                        </div>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Message</label>
                    <div class="col-sm-10">
                        <textarea id="mail_message" required class="form-control custom-control" name="mail_message" rows="3" cols="100" style="resize:none;margin-bottom:5px;"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Mail Code</label>
                    <div class="col-sm-10">
                        <input id="mail_code" required type="text" name="mail_code" placeholder="Registration first to get your mail code" class="form-control custom-control" style="border: 1px solid rgb(204, 204, 204);"/>
                    </div>
                </div>
                <br />
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" onclick="send_mail_to_company()" class="btn btn-info" style="margin: 10px 0px;">Send</button>
                    </div>
                </div>


            </div>

        </div><!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.row -->
</div>




