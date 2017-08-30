<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar" style="padding: 0px 20px 0px 0px;">

                <!-- ================================== TOP NAVIGATION ================================== -->
                <div class="side-menu animate-dropdown outer-bottom-xs" id="categories" style="margin-top:0">
                    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
                    <nav class="yamm megamenu-horizontal" role="navigation">
                        <ul id="menu-v">
                            <?php foreach ($select_market_cat as $row) {////iti /// replace with $select_market_category ?>
                                <li>
                                    <a href="market_place/product_cat_filter/<?= $row->market_category_id; ?>"><?= $row->market_category_name; ?></a>
                                    <?php if ($row->sub_cat_num != 0) { ?>
                                        <ul class="sub">
                                            <?php
                                            foreach ($market_category_with_sub_category as $row2) {
                                                if ($row->market_category_id == $row2->market_category_id) {
                                                    echo "<li><a href='market_place/product_sub_cat_filter/$row2->market_sub_cat_id'>" . $row2->market_sub_cat_name . "</a></li>";
                                                }
                                            } ?>

                                        </ul><!-- /.dropdown-menu -->
                                    <?php } ?>
                                </li><!-- /.menu-item -->
                            <?php } ?>
                        </ul><!-- /.nav -->
                    </nav><!-- /.megamenu-horizontal -->
                </div><!-- /.side-menu -->


            </div><!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder" style="padding: 0px;">
                <!-- ========================================== SECTION – HERO ========================================= -->

                <div id="hero">
                    <div class="wrap-in">
                        <div class="wmuSlider example1 slide-grid" style="">
                            <div class="wmuSliderWrapper">
                                <?php foreach ($all_market_slider_info as $row) : ?>
                                    <article style="position: absolute; width: 100%; opacity: 0;">
                                        <div class="banner-matter">
                                            <div class=" banner-bag">
                                                <img class="img-responsive"
                                                     style="height:515px;width:100%;object-fit: cover"
                                                     src="uploads/<?= $row->image ?>">
                                            </div>


                                            <div class="clearfix"></div>
                                        </div>

                                    </article>
                                <?php endforeach ?>


                            </div>
                            </a>
                            <ul class="wmuSliderPagination">
                                <li><a href="#" class="">0</a></li>
                                <li><a href="#" class="">1</a></li>
                                <li><a href="#" class="">2</a></li>
                            </ul>

                        </div>
                    </div>
                </div>


                <div id="nimmi" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner" role="listbox"
                         style=" border: 1px solid #ccc; margin-top:463px;background-color: #fff;">
                        <div class="item active" role="presentation">
                            <?php $i = 0;
                            foreach ($sponsor as $row) { ?>
                                <?php if ($i == 4 || $i == 8) {
                                    echo '<div class="item" role="presentation">';
                                } ?>
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <!-- ============================================================= LATEST TWEET============================================================= -->
                                    <div class="media" style="margin-top:40px; margin-bottom:40px">
                                        <a class="media-left" href="<?= $row['sponsor_link']; ?>">
                                            <div class="thumbnail col-xs-12 col-sm-12" style="height:130px !important;">
                                                <img class="media-object"
                                                     src="uploads/sponsor/<?= $row['sponsor_image']; ?>"
                                                     alt="<?= $row['sponsor_name']; ?>" width="100%"
                                                     style="height:100% !important;">
                                            </div>
                                        </a>

                                    </div><!-- /.contact-timing -->
                                    <!-- ============================================================= LATEST TWEET : END ============================================================= -->
                                </div>
                                <?php if ($i == 3 || $i == 7) {
                                    echo '</div>';
                                } ?>
                                <?php $i++;
                            } ?>


                        </div>


                    </div>

                    <a href="#nimmi" class="left carousel-control" data-slide="prev" style="margin-top:550px">
                        <span class="glyphicon glyphicon-chevron-left" style="color: #f9a91b;"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a href="#nimmi" class="right carousel-control" data-slide="next" style="margin-top:550px">
                        <span class="glyphicon glyphicon-chevron-right" style="color: #f9a91b;"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
            <hr>

            <div class="col-xs-12 col-sm-12 col-md-12" style="padding: 0px;">
                <div id="eeanstar" class="carousel slide" data-ride="carousel" style="margin-top: 20px;">
                    <h1 style="font-size: 23px;color: rgb(47, 47, 173);margin-bottom:30px">Featured Products</h1>

                    <div class="carousel-inner eeanstar-slide" role="listbox">
                        <div class="item active" role="presentation">
                            <?php $i = 0;
                            foreach ($feature_product as $row){ ?>
                            <?php if ($i == 5) {
                                echo '</div><div class="item" role="presentation">';
                                $i = 0;
                            } ?>
                            <div class="col-xs-12 col-sm-6 col-md-3" style="width: 20%">
                                <!-- ============================================================= LATEST TWEET============================================================= -->
                                <div class="media">
                                    <a class="media-left"
                                       href="market_place/market_place_by_sub_category/<?= $row->market_place_id; ?>">
                                        <div class="thumbnail col-xs-12 col-sm-12" style="height:220px !important;"
                                        ">
                                        <img class="media-object"
                                             src="assets/product_images/<?= $row->market_place_image; ?>"
                                             alt="<?= $row->market_place_name; ?>" width="20%"
                                             style="height:100% !important;">
                                </div>
                                </a>

                            </div><!-- /.contact-timing -->
                            <!-- ============================================================= LATEST TWEET : END ============================================================= -->
                        </div>
                        <?php $i++;
                        } ?>

                    </div>


                </div>

                <a href="#eeanstar" class="left carousel-control" data-slide="prev"
                   style="margin-top:50px; margin-left: -20px;">
                    <span class="glyphicon glyphicon-chevron-left" style="margin-top: -35px;color: #f9a91b;"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a href="#eeanstar" class="right carousel-control" data-slide="next"
                   style="margin-top:50px; margin-right: -20px;">
                    <span class="glyphicon glyphicon-chevron-right" style="margin-top: -35px;color: #f9a91b;"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>

    </div>
</div>

</div>


<!-- For demo purposes – can be removed on production -->

<div class="config open" style="display: none">
    <div class="config-options">
        <h4>Pages</h4>
        <ul class="list-unstyled animate-dropdown">
            <li class="dropdown">
                <button class="dropdown-toggle btn btn-primary btn-block" data-toggle="dropdown">View Pages</button>
                <ul class="dropdown-menu" role="menu">
                    <li role="presentation" class="dropdown-header">Home Pages</li>
                    <li><a href="home.html">Home</a></li>
                    <li><a href="home2.html">Home II</a></li>
                    <li><a href="home-furniture.html">Home Furniture</a></li>
                    <li><a href="homepage1.html">Home Page I</a></li>
                    <li><a href="homepage2.html">Home Page II</a></li>
                    <li class="divider"></li>
                    <li role="presentation" class="dropdown-header">Other Pages</li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="blog-details.html">Blog Details</a></li>
                    <li><a href="category.html">Category</a></li>
                    <li><a href="category-2.html">Category II</a></li>
                    <li><a href="checkout.html">Checkout</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="detail.html">Detail</a></li>
                    <li><a href="detail2.html">Detail II</a></li>
                    <li><a href="shopping-cart.html">Shopping Cart Summary</a></li>

                </ul>
            </li>
        </ul>
        <h4>Header Styles</h4>
        <ul class="list-unstyled">
            <li><a href="home.html">Header 1</a></li>
            <li><a href="homepage1.html">Header 2</a></li>
            <li><a href="home-furniture.html">Header 3</a></li>
        </ul>
        <h4>Layouts</h4>
        <ul class="list-unstyled">
            <li><a href="homepage1.html">Full Width</a></li>
            <li><a href="homepage2.html">Boxed</a></li>
        </ul>
        <h4>Colors</h4>
        <ul>
            <li><a class="changecolor green-text" href="#" title="Green color">Green</a></li>
            <li><a class="changecolor blue-text" href="#" title="Blue color">Blue</a></li>
            <li><a class="changecolor red-text" href="#" title="Red color">Red</a></li>
            <li><a class="changecolor orange-text" href="#" title="Orange color">Orange</a></li>
            <li><a class="changecolor dark-green-text" href="#" title="Darkgreen color">Dark Green</a></li>
        </ul>
    </div>
    <a class="show-theme-options" href="#"><i class="fa fa-wrench"></i></a>
</div>
<!-- For demo purposes – can be removed on production : End -->


<!-- JavaScripts placed at the end of the document so the pages load faster -->
