    
<div class="wow fadeInUp">
    <div class="info-boxes-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="info-box">
                        <?php foreach ($advertise as $row) {
                            if ($row['post_name'] == 'buyers single detail banner') {
                                ?>

                                <div id="image_banner">
                                    <a target="_blank" href="<?= $row['link']; ?>"><img class="img-responsive" style="height:200px;width:100%;margin-top:5px;" src="uploads/<?= $row['image']; ?>" alt="Add"></a>
                                </div>
                                <?php
                                break;
                            }
                        }
                        ?>
                    </div>
                </div><!-- .col -->





                <!-- /.info-boxes --><br>
                <!-- ============================================== INFO BOXES : END ============================================== -->


                <!-- /.sidemenu-holder -->
                <!-- ============================================== SIDEBAR : END ============================================== -->

                <!-- ============================================== CONTENT ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-8 buyer_details">
                    <!-- ========================================== SECTION – HERO ========================================= -->

                    <div id="hero">
                        <div class="col-md-12">
                            <div class="table-responsive" align="center">
                                <h2 style="font-size: 25px;margin: 10px 0px;">Buyer Details</h2>
                                <table class="table table-bordered"  style="width:80%;">

                                    <tr style="border-bottom:1px solid #ddd;">
                                        <th style="width:40%;" class="default">Buyers Name</th>
                                        <td><?php echo $select_buyer_details->reg_first_name . ' ' . $select_buyer_details->reg_last_name ?></td>
                                    </tr>

                                    <tr style="border-bottom:1px solid #ddd;">
                                        <th style="width:40%;" class="default">Company Name</th>
                                        <td><?php echo $select_buyer_details->reg_company_name ?></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #ddd;">
                                        <th style="width:40%;">Industry Type</th>
                                        <td><?php echo $select_buyer_details->cat_name; ?></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #ddd;">
                                        <th>Business Type</th>
                                        <td><?php echo $select_buyer_details->bus_type ?></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #ddd;">
                                        <th>Main Market</th>
                                        <td><?php echo $select_buyer_details->main_market; ?></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #ddd;">
                                        <th style="width:40%;" class="default">Buyers Email</th>
                                        <td><?php echo $select_buyer_details->reg_email ?></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #ddd;">
                                        <th>Address</th>
                                        <td><?php echo $select_buyer_details->reg_address ?></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #ddd;">
                                        <th class="default">City</th>
                                        <td><?php echo $select_buyer_details->reg_city ?></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #ddd;">
                                        <th>Country</th>
                                        <td><?php echo $select_buyer_details->country_name; ?><img style="height:40px;width:40px; margin-top:0px;" src="uploads/country_flag/<?= $select_buyer_details->country_image; ?>"></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #ddd;">
                                        <th class="default">Telephone</th>
                                        <td><?php echo $select_buyer_details->reg_company_phone ?></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #ddd;">
                                        <th class="default">Mobile</th>
                                        <td><?php echo $select_buyer_details->reg_phone ?></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #ddd;">
                                        <th>No. of Company Employee</th>
                                        <td><?php echo $select_buyer_details->com_employee ?></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #ddd;">
                                        <th>Company Established</th>
                                        <td><?php echo $select_buyer_details->com_establish ?></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #ddd;">
                                        <th>Company Web site</th>
                                        <td><?php echo $select_buyer_details->website ?></td>
                                    </tr>

                                </table>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- /.homebanner-holder -->



                <!-- ============================================== CONTENT : END ============================================== -->
                <div class="info-boxes wow fadeInUp">
                    <div class="info-boxes-inner">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                            <div class="info-box">
<?php foreach ($advertise as $row) {
    if ($row['post_name'] == 'buyers single detail right (1st position)') {
        ?>

                                        <div id="image_banner">
                                            <a target="_blank" href="<?= $row['link']; ?>"><img class="img-responsive" style="height:100px;width:100%;margin-top:5px;" src="uploads/<?= $row['image']; ?>" alt="Add"></a>
                                        </div>
        <?php
        break;
    }
}
?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                            <div class="info-box">
                                <?php foreach ($advertise as $row) {
                                    if ($row['post_name'] == 'buyers single detail right (2nd position)') {
                                        ?>

                                        <div id="image_banner">
                                            <a target="_blank" href="<?= $row['link']; ?>"><img class="img-responsive" style="height:100px;width:100%;margin-top:5px;" src="uploads/<?= $row['image']; ?>" alt="Add"></a>
                                        </div>
        <?php
        break;
    }
}
?>
                            </div>
                        </div>
                    </div>

                </div><!-- /.row -->
                <!-- ============================================== BRANDS CAROUSEL ============================================== -->
                <!-- /.logo-slider -->
                <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
            </div>
        </div><!-- /.row -->
    </div>




