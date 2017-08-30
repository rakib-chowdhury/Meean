<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">    

            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-12 homebanner-holder">


                <?php foreach ($advertise as $row) {
                    if ($row['post_name'] == 'product page banner') { ?>

                        <div id="image_banner">
                            <a target="_blank" href="<?= $row['link']; ?>">
                                <img class="img-responsive" style="width:100%;height:150px" src="uploads/<?= $row['image']; ?>" alt="Add">
                            </a>
                        </div>
        <?php break;
    }
} ?>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->
                <div class="col-xs-12 col-sm-12 col-md-12" >
                    <div id="hero">

                        <div class="col-md-12" align="center">
                            <?php foreach ($cat_info as $row) { ?>
                                <h1 style="font-size:20px;padding-top:30px;padding-bottom:30px;"><?= $row['cat_name']; ?> Products</h1>
                            <?php } ?><hr/>
                        </div>

                            <?php foreach ($sub_cat_info as $row) { ?>
                        <div class="col-xs-12 col-sm-4 col-md-4" style="height: 173px;">
                                <a href="product/all_product/<?= $row['sub_cat_id']; ?>">
                                    <div class="thumbnail">
                                            <img style="height:100px;width:200px;" src="uploads/subcategory/<?= $row['sub_image']; ?>">
                                        </div>
                                </a>
                                <figcaption>
                                    <a href="product/all_product/<?= $row['sub_cat_id']; ?>" id="sub_category_header"><?= $row['sub_cat_name']; ?></a>
                                </figcaption>
                                
                            </div>

                            <?php } ?>

                    </div>

                </div>
            </div><!-- /.homebanner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="info-boxes wow fadeInUp">
                    <div class="info-boxes-inner">
                        <?php foreach ($advertise as $row) {
                            if ($row['post_name'] == 'product page top right(1st position)') { ?>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="info-box" style="margin-top:110px;">
                                        <a target="_blank" href="<?= $row['link']; ?>"><img class="img-responsive" style="height:100px;width:100%;" src="uploads/<?= $row['image']; ?>" alt="Add"></a>
                                    </div>
                                </div>
                                <?php } if ($row['post_name'] == 'product page bottom right(2nd position)') { ?>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="info-box">
                                        <a target="_blank" href="<?= $row['link']; ?>"><img class="img-responsive" style="height:100px;width: 100%" src="uploads/<?= $row['image']; ?>" alt="Add"></a>
                                    </div>
                                </div>
                                <?php }
                            } ?>
                    </div>

                </div>

                <div class="info-boxes wow fadeInUp">
                    <section id="featured_product" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h2 style="font-size: 20px;margin: 15px;color: rgb(87, 171, 245);">Featured Products</h2>
<?php foreach ($feature_product_1 as $row) { ?>
                            <div class="col-xs-6 col-md-6 featured">
                                <div class="thumbnail" style="height: 100px">
                                    <a href="<?= base_url(); ?>product/Product_detail/<?= $row['product_id']; ?>"><img src="assets/product_images/<?= $row['product_image']; ?>" style="width: 100%;height: 100%"></a>
                                </div>
                                <h4><?= $row['product_name']; ?></h4>
                            </div>
                        <?php } ?>
                    </section>
                </div>
                <div class="info-boxes wow fadeInUp">
                    <section id="featured_product" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h2 style="font-size: 20px;margin: 15px;color: rgb(87, 171, 245);">Innovative Products</h2>
                            <?php foreach ($innovative_product_1 as $row) { ?>
                            <div class="col-xs-6 col-md-6 featured">
                                <div class="thumbnail" style="height: 100px">
                                    <a href="<?= base_url(); ?>product/Product_detail/<?= $row['product_id']; ?>"><img src="assets/product_images/<?= $row['product_image']; ?>" style="width: 100%;height: 100%"></a>
                                </div>
                                <h4><?= $row['product_name']; ?></h4>
                            </div>
                            <?php } ?>
                    </section>
                </div>

                <!-- /.row -->
                <!-- ============================================== BRANDS CAROUSEL ============================================== -->
                <!-- /.logo-slider -->
                <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
            </div><!-- /.container -->
        </div><!-- /#top-banner-and-menu -->
    </div>
</div>
        <script>
            var showAgriculture = document.getElementById('hideAgriculture');
            var more_agriculture_button = document.getElementById('more_agriculture');
            var less_agriculture_button = document.getElementById('less_agriculture');

            var showApparel = document.getElementById('hideApparel');
            var more_apparel_button = document.getElementById('more_apparel');
            var less_apparel_button = document.getElementById('less_apparel');

            var showAutomobile = document.getElementById('hideAutomobile');
            var more_automobile_button = document.getElementById('more_automobile');
            var less_automobile_button = document.getElementById('less_automobile');

            var showBeauty = document.getElementById('hideBeauty');
            var more_beauty_button = document.getElementById('more_beauty');
            var less_beauty_button = document.getElementById('less_beauty');

            var showBusiness = document.getElementById('hideBusiness');
            var more_business_button = document.getElementById('more_business');
            var less_business_button = document.getElementById('less_business');

            function showAgricultureList() {
                if (showAgriculture.style.display === 'none') {
                    showAgriculture.style.display = 'block';
                    more_agriculture_button.style.display = 'none';
                    less_agriculture_button.style.display = 'inline';
                }
            }

            function showApparelList() {
                if (showApparel.style.display === 'none') {
                    showApparel.style.display = 'block';
                    more_apparel_button.style.display = 'none';
                    less_apparel_button.style.display = 'inline';
                }
            }

            function showAutomobileList() {
                if (showAutomobile.style.display === 'none') {
                    showAutomobile.style.display = 'block';
                    more_automobile_button.style.display = 'none';
                    less_automobile_button.style.display = 'inline';
                }
            }

            function showBeautyList() {
                if (showBeauty.style.display === 'none') {
                    showBeauty.style.display = 'block';
                    more_beauty_button.style.display = 'none';
                    less_beauty_button.style.display = 'inline';
                }
            }

            function showBusinessList() {
                if (showBusiness.style.display === 'none') {
                    showBusiness.style.display = 'block';
                    more_business_button.style.display = 'none';
                    less_business_button.style.display = 'inline';
                }
            }


            function hideBusinessList() {
                if (showBusiness.style.display === 'block') {
                    showBusiness.style.display = 'none';
                    more_business_button.style.display = 'inline';
                    less_business_button.style.display = 'none';
                }
            }

            function hideBeautyList() {
                if (showBeauty.style.display === 'block') {
                    showBeauty.style.display = 'none';
                    more_beauty_button.style.display = 'inline';
                    less_beauty_button.style.display = 'none';
                }
            }

            function hideAgricultureList() {
                if (showAgriculture.style.display === 'block') {
                    showAgriculture.style.display = 'none';
                    more_agriculture_button.style.display = 'inline';
                    less_agriculture_button.style.display = 'none';
                }
            }

            function hideApparelList() {
                if (showApparel.style.display === 'block') {
                    showApparel.style.display = 'none';
                    more_apparel_button.style.display = 'inline';
                    less_apparel_button.style.display = 'none';
                }
            }

            function hideAutomobileList() {
                if (showAutomobile.style.display === 'block') {
                    showAutomobile.style.display = 'none';
                    more_automobile_button.style.display = 'inline';
                    less_automobile_button.style.display = 'none';
                }
            }

        </script>


