 <div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">    
<div class="info-boxes wow fadeInUp">
    <div class="info-boxes-inner">
        <div class="row">
        </div><!-- /.row -->
    </div><!-- /.info-boxes-inner -->
</div><!-- /.info-boxes -->
</div><!-- /.sidemenu-holder -->
<div class="col-xs-12 col-sm-12 col-md-10 homebanner-holder">
    <div id="hero">
<?php 
    foreach ($product_details as $row){
?>
        <!-- zoom effetc, Heading, box detail starts here-->
        <div class="col-md-12">
            <div class="col-xs-12 col-md-4" style="float:left;">
                <div class="picZoomer">
                    <img src="assets/product_images/<?=$row->market_place_image;?>" height="220" width="220" alt="">
                </div>
                <ul class="piclist">
                    <li><img src="uploads/0.jpg" alt=""></li>
                    <li><img src="uploads/1.jpg" alt=""></li>
                    <li><img src="uploads/2.jpg" alt=""></li>
                    <li><img src="uploads/3.jpg" alt=""></li>
                </ul>
            </div>
            <div class="col-xs-12 col-md-8" style="float:left;">
                <h3><?php echo $row->market_place_name?></h3>
                <hr>
            </div>
            <div class="col-md-8" style="float:left">
                <table class="table table-bordered">
                    <tr>
                        <th>product location</th>
                        <td><?php echo $row->location_name;?></td>
                    </tr>
                    <tr>
                        <th>price</th>
                        <td><?php echo $row->market_place_price?></td>
                    </tr>
                    
                </table>
            </div>
        </div>
        <!-- zoom effetc, Heading, box detail ends here-->
        
        <div class="col-md-12">
            <h4 style="margin-top: 20px">Product Description</h4>
            <hr style="border: dotted 1px;" />
        </div>
        <div class="specific">
            <p class="text-justify"><?php echo $row->market_place_description;?></p>
        </div>
        <hr style="border: dotted 1px;" />
    <?php }?>
    </div>
</div>
<div class="info-boxes wow fadeInUp">
                <section id="featured_product" class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                    <h2 style="font-size: 19px;margin: 5px;color: rgb(65, 94, 155);">Related Products</h2>
                    <div class="col-xs-12 col-md-12 related">
                        <div class="thumbnail" style="height: 100px">
                            <img src="raw/images/bannerdesign1.jpg" style="width: 100%;height: 100%">
                        </div>
                        <h4>Product Name</h4>
                        <h5>Product Price</h5><br>
                    </div>
                    
                    <div class="col-xs-12 col-md-12 related">
                        <div class="thumbnail" style="height: 100px">
                            <img src="raw/images/bannerdesign1.jpg" style="width: 100%;height: 100%">
                        </div>
                        <h4>Product Name</h4>
                         <h5>Product Price</h5>
                    </div>
                    
                </section>
            </div>
</div>
</div>




