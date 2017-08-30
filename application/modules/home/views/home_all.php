 <div class="header_end">

            <div class="company_heading" style="width: 100%;background-color: #04455B;padding: 10px;color: #fff;margin: 10px 0px;position: absolute;">
                <marquee behavior="scroll" direction="left" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 6, 0);">

                    <ul class="list-unstyled list-inline">

                        <?php foreach ($news_feed_info as $row) : ?>

                            <li>
                                <a style="color: #fff" href="#">
                                    <strong class="icon-text dot_icon left">&#9679;</strong> <?= $row->news; ?>&nbsp;
                                </a>
                            </li>

                        <?php endforeach; ?>
                    </ul>               
                </marquee>      
            </div>
            
            <div class="container" style="margin: auto;text-align: center;position: relative;">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h1 style="color: #fff;font-size: 30px;margin: 75px auto;">What Do You Want?<br> Find It On Eeanstar.</h1>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
                <div id="search_product" class="search_product col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <form class="form-inline col-lg-12 col-md-12 col-sm-12 col-xs-12" style="position: absolute">
                        <div class="form-group col-sm-4 col-xs-4">
                            <label class="sr-only" for="exampleInputEmail3">Email address</label>
                            <select class="" id="current_type">
                                <option value="1">Products</option>
                                <option value="2">Buyer</option>
                                <option value="3">Seller</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-8 col-xs-8">
                            <label class="sr-only" for="exampleInputPassword3">Password</label>
                            <input id="remove_opacity" class="" type="text" name="" onkeyup="search_result_by_type(this);" onfocus="remove_opacity_div()" onblur="remain_opacity_div()">
                            <div id="search_div" style="display:none;background:#fff;position:absolute;z-index:1200;width:92%;top: 1px;left: -40px"></div>
                        </div>
                    </form>
<!--                    <select class="col-sm-4 col-xs-4" id="current_type">
                        <option value="1">Products</option>
                        <option value="2">Buyer</option>
                        <option value="3">Seller</option>
                    </select>
                    
                    <input id="remove_opacity" class="col-sm-8 col-xs-6" type="text" name="" onkeyup="search_result_by_type(this);" onfocus="remove_opacity_div()" onblur="remain_opacity_div()">
                    <div id="search_div" style="display:none;background:#fff;position:absolute;z-index:1200;width:92%;margin-top: 28px;"></div>-->
<!--                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Product
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">HTML</a></li>
                            <li><a href="#">CSS</a></li>
                            <li><a href="#">JavaScript</a></li>
                        </ul>
                    </div>-->
                        <span style="position: absolute;right: 27px;top: -7px;color: blue;" class="glyphicon glyphicon-search"></span>
                </div>
<!--                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <button class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
                </div>-->
                </div>
        </div>



<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->	
            <div class="col-xs-12 col-sm-12 col-md-2 sidebar">
                <?php
                if ($sidebar_category) {
                    ?>
                    <!-- ================================== TOP NAVIGATION ================================== -->
                    <!--                        <div id="categories" class="side-menu animate-dropdown outer-bottom-xs">
                                                <div class="head text-center"> Categories</div>        
                                                <nav class="yamm megamenu-horizontal" role="navigation">
                                                    <ul class="nav">
                    <?php
                    foreach ($select_category as $row) {
                        ?>
                                                            <li class="dropdown menu-item">
                                                                <a href="product/product_by_category/<?= $row->cat_id; ?>"><?php
                        $bar = $row->cat_name;
                        echo ucfirst(strtolower($bar));
                        ?>
                                                                </a>
                                                                         
                                                            </li> /.menu-item 
                    <?php } ?>
                                                        <li class="dropdown menu-item">
                                                            <a href="product">More...</a>
                                                                     
                                                        </li>
                                                    </ul> /.nav 
                                                </nav> /.megamenu-horizontal 
                                            </div> /.side-menu -->
                <?php } ?>
                
                <!-- ============================================== INFO BOXES : END ============================================== -->


            </div><!-- /.sidemenu-holder -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->

<div id="eeanstar" class="carousel slide" data-ride="carousel">
    <div class="container">
        <h1 style="font-size: 23px;color: rgb(65, 94, 155);margin: 20px 0px;">Innovative Products</h1>
        
        <ul class="carousel-indicators">
            <li data-target="#eeanstar" data-slide-to="0" class="active"></li>
            <li data-target="#eeanstar" data-slide-to="1"></li>
            <li data-target="#eeanstar" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner" role="listbox" >
            <div class="item active" role="presentation">
                
                <?php 
                $i=0; foreach ($innovative_product_1 as $row){
                    
                    if($i == 4)break;
                    ?>
                <div class="col-xs-12 col-sm-6 col-md-3">

                    <div class="media">
                        <a class="media-left" href="product/product_detail/<?php echo $row['product_id']?>">
                            <div class="thumbnail col-xs-12 col-sm-12">
                                <img style="width: 100%;height: 200px;" class="media-object" src="assets/product_images/<?=$row['product_image'];?>" alt="Generic placeholder image" width="100">
                            </div>
                        </a>

                    </div>

                </div>
                <?php $i++;} ?>
            </div>
            
            <?php if(count($innovative_product_1) > 3){?>
            
            <div class="item" role="presentation">
                
                 <?php 
                 
                $i=0; foreach ($innovative_product_1 as $row){
                    if($i > 3){
                        if($i == 8)break;
                    ?>
                <div class="col-xs-12 col-sm-6 col-md-3">

                    <div class="media">
                        <a class="media-left" href="product/product_detail/<?php echo $row['product_id']?>">
                            <div class="thumbnail col-xs-12 col-sm-12">
                                <img style="width: 100%;height: 200px;" class="media-object" src="assets/product_images/<?=$row['product_image'];?>" alt="Generic placeholder image" width="100">
                            </div>
                        </a>

                    </div>

                </div>
                    <?php }$i++;}?>
                
            </div>
            <?php }?>
            <?php if(count($innovative_product_1) > 7){?>
            <div class="item" role="presentation">
                
                 <?php 
                 
                $i=0; foreach ($innovative_product_1 as $row){
                    if($i > 7){
                         if($i == 12)break;
                    ?>
                <div class="col-xs-12 col-sm-6 col-md-3">

                    <div class="media">
                        <a class="media-left" href="product/product_detail/<?php echo $row['product_id']?>">
                            <div class="thumbnail col-xs-12 col-sm-12">
                                <img style="width: 100%;height: 200px;" class="media-object" src="assets/product_images/<?=$row['product_image'];?>" alt="Generic placeholder image" width="100">
                            </div>
                        </a>

                    </div>

                </div>
                <?php }$i++;}?>
                
            </div>
            <?php }?>
        </div>

        <a href="#eeanstar" class="left carousel-control" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a href="#eeanstar" class="right carousel-control" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div id="after_carousel" style="height: 380px;background-color: #fff;margin-top: 20px;width: 100%">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="left_part" style="">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="info-boxes wow fadeInUp">
                <div class="info-boxes-inner">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="info-box">
                                
                                <!-- 'Home page top right(1st position)' -->
                                
                                <a target="_blank" href="<?= $advertise_top_right->link; ?>">
                                    <img  style="height:98%;width: 100%" src="uploads/<?= $advertise_top_right->image; ?>" alt="Add">
                                </a>
                            </div>
                        </div><!-- .col -->
                    </div><!-- /.row -->
                </div><!-- /.info-boxes-inner -->

            </div><!-- /.info-boxes -->
        </div>
    </div>
    <div  id="right_part" style="">
        <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="logo" style="height:70px;width:200px">
                <a href="home">

                    <img style="height:100%;width:100%" src="uploads/<?= $logo_info->logo; ?>" alt="logo">

                </a>
            </div><!-- /.logo -->
        </div>
        <div class="col-xs-12 col-sm-12">
            <ul class="nav">
                <?php
                $i = 0;
                foreach ($select_category as $row) {
                    if ($i == 5)
                        break;
                    ?>
                    <li class="dropdown menu-item" style="border-top: 1px solid aliceblue;padding: 5px;">
<!--                        <img src="../../../../raw/images/categories/" alt="cateogry_image">-->
                        <a href="product/product_by_category/<?= $row->cat_id; ?>"><?php
                            $bar = $row->cat_name;
                            echo ucfirst(strtolower($bar));
                            ?>
                        </a>

                    </li> 
                    <!--/.menu-item--> 
    <?php $i++;
} ?>
                <li class="dropdown menu-item">
                    <a href="product">More...</a>

                </li>
            </ul>
        </div>
        </div>
    </div>
</div>


<!--    <div id="hero">
        <div id="sliderFrame">
        <div id="slider">
<?php foreach ($slider_image as $row) { ?>
                    <img src="uploads/<?= $row['image']; ?>" />
               
<?php } ?>

            
        </div>
    </div>
    </div>-->
<div id="home_featured_product">
<div class="container">
    <div class="row">

        <div class="links-social inner-top-sm" style="padding-top: 25px;">

            <!-- ============================================================= CONTACT INFO ============================================================= -->

            <!-- ============================================================= CONTACT INFO : END ============================================================= -->            	

        </div>

        <h1 style="font-size: 23px;color: rgb(65, 94, 155);margin-bottom: 20px;">Featured Products</h1>	  
<?php foreach ($feature_product_1 as $row) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="media">
                    <a class="media-left" href="product/Product_detail/<?= $row['product_id']; ?>">
                        <div class="thumbnail col-xs-12 col-sm-6">
                            <img class="media-object" style="height:100px;width:100%;" src="assets/product_images/<?= $row['product_image']; ?>" alt="Generic placeholder image" width="100">
                        </div>
                    </a>
                    <div class="media-body" style="padding: 5px;">
                        <h4 style="color:#555 !important;" class="media-heading"><a href="home/Product_detail/<?= $row['product_id']; ?>"><?= $row['product_name']; ?></a></h4>
                        <p><?= $row['product_model']; ?></p>
                        <p><?= $row['product_price']; ?></p>
                    </div>
                </div>                        
            </div>	
<?php } ?>	


    </div>
</div>

</div>

<!-- /.homebanner-holder -->
<!-- ============================================== CONTENT : END ============================================== -->



<!--<div class="container">
    <div class="row">

        <div class="info-boxes wow fadeInUp">
            <div class="info-boxes-inner">
<?php foreach ($advertise as $row) {
    if ($row['post_name'] == 'Home page top right(1st position)') { ?>
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            <div class="info-box">
                                <a target="_blank" href="<?= $row['link']; ?>"><img class="img-responsive" style="height:100px;width: 100%" src="uploads/<?= $row['image']; ?>" alt="Add"></a>
                            </div>
                        </div>
    <?php }
} ?> 
<?php foreach ($advertise as $row) {
    if ($row['post_name'] == 'Home page middle right(2nd position)') { ?>
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            <div class="info-box">
                                <a target="_blank" href="<?= $row['link']; ?>"><img class="img-responsive" style="height:100px;width: 100%" src="uploads/<?= $row['image']; ?>" alt="Add"></a>
                            </div>
                        </div>
                    <?php }
                } ?>
<?php foreach ($advertise as $row) {
    if ($row['post_name'] == 'Home page bottom right(3rd position)') { ?>
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            <a target="_blank" href="<?= $row['link']; ?>"><img class="img-responsive" src="uploads/<?= $row['image']; ?>" alt="image_spa"></a>
                        </div>
    <?php }
} ?>
            </div>
        </div>


    </div>
</div>-->

<script>
        function search_result_by_type(val) {
            var s_value = val.value;
            var url_for_reload = $('#current_type').val();
//            alert(url_for_reload);
            if (s_value == '')
            {
                $("#search_div").css("display", "none");
            }
            else {
                $.ajax({
                    url: "product/search_result_by_type",
                    type: "post",
                    data: {s_value: s_value, url_for_reload: url_for_reload},
                    success: function (msg) {
                        //$("#search_div").css("display", "block");
                        $("#search_div").fadeIn("slow");

                        $('#search_div').html(msg);

                        // $('#quick_view_modal').modal('show');
                        // location.reload();
                        // alert(""+msg);

                    }
                });
            }
        }
    </script>
    
    <script>
        function remove_opacity_div(){
            document.getElementById("search_product").style.opacity = "1";
        }
        
         function remain_opacity_div(){
            document.getElementById("search_product").style.opacity = "0.4";
        }
              
    </script>

