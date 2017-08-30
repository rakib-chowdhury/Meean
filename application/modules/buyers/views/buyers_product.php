<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">     
            <div class="wow fadeInUp">
                <div class="info-boxes-inner">

                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div id="image_banner">
                                <?php foreach($advertise as $row){ if($row['post_name']=='buyers detail banner'){?>

                                <div id="image_banner">
                                    <a target="_blank" href="<?=$row['link'];?>"><img class="img-responsive" style="height:200px;width:100%;margin-top:5px;" src="uploads/<?=$row['image'];?>" alt="Add"></a>
                                </div>
                                <?php break; } } ?>

                        </div>
                    </div><!-- .col -->
                    <!-- /.row -->
                </div><!-- /.info-boxes-inner -->

            </div><!-- /.info-boxes --><br>
            <!-- ============================================== INFO BOXES : END ============================================== -->


        </div><!-- /.sidemenu-holder -->
        <!-- ============================================== SIDEBAR : END ============================================== -->

        <!-- ============================================== CONTENT ============================================== -->
        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
            <!-- ========================================== SECTION – HERO ========================================= -->
            <h1 align="center" style="font-size: 28px;color: #415e9b; margin: 10px 0px"></h1>
            <div id="hero">


                <?php
                foreach ($select_buyer as $row){
                ?>
                    <div class="col-md-12">
                        
                        <section id="all_product_description">
                            <div class="col-xs-12 col-sm-2 col-md-2" id="product_image">
                                <img style="height:100px;width:100px; margin-top:7px;" src="assets/product_images/<?php echo $row->product_image;?>">
                            </div>
                            
                            <div class="col-xs-12 col-sm-8 col-md-8" id="product_description">
                                
                                <h4><strong><?php echo $row->reg_company_name?></strong></h4>
                                <table style="text-align: center">
                                    <tr>
                                        <td>Name: </td>
                                        <td><?php echo $row->product_name?></td>
                                    </tr>
                                    <tr>
                                        <td>Model: </td>
                                        <td><?php echo $row->product_model?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td> Price: </td>
                                        <td><?php echo $row->product_price?></td>
                                    </tr>
<!--                                    <tr>
                                        <td>Supplying Ability: </td>
                                        <td>10000 Set / Month</td>
                                    </tr>
                                    <tr>
                                        <td>Payment Type: </td>
                                        <td>T/T, L/C</td>
                                    </tr>-->
                                </table>
                                                    
                            </div>
                            <div class="col-xs-12 col-sm-2 col-md-2" style="padding-top:45px;">
                                <a href="buyers/buyer_detail/<?php echo $row->reg_id;?>"><button type="button">View details</button></a>
                            </div>
                        </section>
                    </div>
                <?php } ?>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <?php echo $pagination; ?>
                </div>
            </div>


        </div><!-- /.homebanner-holder -->
        <!-- ============================================== CONTENT : END ============================================== -->
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <div class="wow fadeInUp">
            <div class="info-boxes-inner" style="margin-top: 40px">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <?php foreach($advertise as $row){ if($row['post_name']=='buyers detail right (single position)'){?>

                        <div id="image_banner">
                            <a target="_blank" href="<?=$row['link'];?>"><img class="img-responsive" style="height:700px;width:100%;margin-top:5px;" src="uploads/<?=$row['image'];?>" alt="Add"></a>
                        </div>
                        <?php break; } } ?>
                </div>
            </div>
        </div>
       </div>
    </div><!-- /.row -->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
</div><!-- /.container -->
<!-- /#top-banner-and-menu -->




