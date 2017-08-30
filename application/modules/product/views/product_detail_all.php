<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">    
<!--            <div class="info-boxes wow fadeInUp">
                <div class="info-boxes-inner">
                    <div class="row">
                    </div> /.row 
                </div> /.info-boxes-inner 
            </div> /.info-boxes -->
        </div><!-- /.sidemenu-holder -->
        <div class="col-xs-12 col-sm-12 col-md-10 homebanner-holder">
            <div id="hero">
                <?php
                foreach ($product_details as $row) {
                    ?>
                    <!-- zoom effetc, Heading, box detail starts here-->
                    <div class="col-md-12">
                        <div class="col-xs-12 col-md-4" style="float:left;">
                            <div class="picZoomer">
                                <img src="assets/product_images/<?= $row->product_image; ?>" height="220" width="220" alt="">
                            </div>
                            <ul class="piclist">
                                <li style="width: 50px;height: 50px;float: left;margin: 5px">
                                    <img src="assets/product_images/<?= $row->product_image; ?>" style="width: 100%;height: 100%;" alt="">
                                </li>
                                <?php foreach ($select_sub_images as $row) { ?>
                                    <li style="width: 50px;height: 50px;float: left;margin: 5px">
                                        <img src="assets/product_images/<?= $row->images_name; ?>" style="width: 100%;height: 100%;" alt="">
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-md-8" style="float:left;">
                            <h3><?php echo $row->product_name ?></h3>
                            <hr>
                        </div>
                        <div class="col-xs-12 col-md-8" style="float:left">
                            <table class="table table-bordered">
                                <tr>
                                    <th>product model</th>
                                    <td><?php echo $row->product_model ?></td>
                                </tr>
                                <tr>
                                    <th>price</th>
                                    <td><?php echo $row->product_price ?></td>
                                </tr>
                                <tr>
                                    <th>Quantity</th>
                                    <td><?php echo $row->product_quantity ?></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <!-- zoom effetc, Heading, box detail ends here-->

                    <div class="col-md-12" style="">
                        <h4 style="margin-top: 20px">Product Description</h4>
                        <hr style="border: dotted 1px;" />
                        <div class="specific">
                            <p class="text-justify"><?php echo $row->product_description ?></p><br>
                        </div>
                    </div>

                    <hr style="border: dotted 1px;" />
                <?php } ?>
            </div>
        </div>

        <div class="info-boxes wow fadeInUp">
            <section id="featured_product" class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                <h2 style="font-size: 18px;margin: 5px;color: rgb(65, 94, 155);">Related Products</h2>
                <?php foreach ($related_product as $row) { ?>
                    <div class="col-xs-12 col-md-12 related">
                        <div class="thumbnail" style="height: 100px">
                           <a href="product/Product_detail/<?= $row->product_id; ?>">
                                <img src="assets/product_images/<?= $row->product_image; ?>" style="width: 100%;height: 100%">
                            </a>
                        </div>
                        <h4><a href="product/Product_detail/<?= $row->product_id; ?>"><?= $row->product_name; ?></a></h4>
                        <p>Model - <?= $row->product_model; ?></p>
                        <p>Price - <?= $row->product_price ?></p><br>
                    </div>
                <?php } ?> 
            </section>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 company_details">
            <!-- ========================================== SECTION – HERO ========================================= -->
            <?php foreach ($product_details as $row) { ?>
            <div id="hero" style="background-color: #e3e3e3;">
                    <div class="col-md-12">
                        <div class="table-responsive" align="center">
                           <!-- <h2 style="font-size: 25px;margin: 10px 0px;">Company Details</h2>
                            <table class="table table-bordered"  style="width:80%;">
                                        <tr style="border-bottom:1px solid #ddd;">
                                            <th style="width:40%;">Company name</th>
                                            <td><b><?php echo $row->reg_company_name?></b></td>
                                        </tr>
                                        <tr style="border-bottom:1px solid #ddd;">
                                            <th>Email</th>
                                            <td><?php echo $row->reg_email?></td>
                                        </tr>
                                        <tr style="border-bottom:1px solid #ddd;">
                                            <th>Address</th>
                                            <td><?php echo $row->reg_address?></td>
                                        </tr>
                                        <tr style="border-bottom:1px solid #ddd;">
                                            <th>City</th>
                                            <td><?php echo $row->reg_city?></td>
                                        </tr>
                                        <tr style="border-bottom:1px solid #ddd;">
                                            <th>Country</th>
                                            <td><?php echo $row->country_name;?><img style="height:40px;width:40px; margin-top:0px;" src="uploads/country_flag/<?=$row->country_image;?>"></td>
                                        </tr>
                                        <tr style="border-bottom:1px solid #ddd;">
                                            <th>Telephone</th>
                                            <td><?php echo $row->reg_company_phone?></td>
                                        </tr>
                                        <tr style="border-bottom:1px solid #ddd;">
                                            <th>Mobile</th>
                                            <td><?php echo $row->reg_phone?></td>
                                        </tr>
                                    </table>  -->
                            <!--<a href="company/contact_company/<?php //echo $row->cat_id; ?>/<?php //echo $row->product_id; ?>"><button style="width: 100%;background: #183c4a;color: white;border: 1px solid #ccc;border-radius: 4px;padding: 10px;">Contact With Company</button></a>-->
                            <a href="product/contact_company_by_product/<?php echo $row->product_id; ?>"><button style="width: 100%;background: #183c4a;color: white;border: 1px solid #ccc;border-radius: 4px;padding: 10px;">Contact With Company</button></a>
                        </div> 
                    </div>


                </div>

            <?php } ?>


        </div><!-- /.homebanner-holder -->
    </div>
</div>




