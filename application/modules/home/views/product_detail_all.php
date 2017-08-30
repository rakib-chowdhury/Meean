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
                    <img src="assets/product_images/<?=$row['product_image'];?>" height="220" width="220" alt="">
                </div>
                <ul class="piclist">
                    <li style="width: 50px;height: 50px;float: left;margin: 5px"><img src="assets/product_images/<?=$row['product_image'];?>" style="width: 100%" alt=""></li>
                  <?php foreach($select_sub_images as $row){?>
                    <li style="width: 50px;height: 50px;float: left;margin: 5px"><img style="width: 100%" src="assets/product_images/<?=$row['images_name'];?>" alt=""></li>
                    <?php }?>
                </ul>
            </div>
            <div class="col-xs-12 col-md-8" style="float:left;">
                <h3><?php echo $row['product_name']?></h3>
                <hr>
            </div>
            <div class="col-md-8" style="float:left">
                <table class="table table-bordered">
                    <tr>
                        <th>product model</th>
                        <td><?php echo $row['product_model'];?></td>
                    </tr>
                    <tr>
                        <th>price</th>
                        <td><?php echo $row['product_price'];?></td>
                    </tr>
                    <tr>
                        <th>minimum order quantity</th>
                        <td><?php echo $row['product_quantity'];?></td>
                    </tr>
                    <tr>
                        <th>Delivery time</th>
                        <td>within 15 days after receiving advance payment</td>
                    </tr>
                    <tr>
                        <th>Payment type</th>
                        <td>T/T, L/C</td>
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
            <p class="text-justify"><?php echo $row['product_description'];?></p>
        </div>
        <hr style="border: dotted 1px;" />
    <?php }?>
    </div>
</div>
<div class="info-boxes wow fadeInUp">
                <section id="featured_product" class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                    <h2 style="font-size: 19px;margin: 5px;color: rgb(65, 94, 155);">Related Products</h2>
                   <?php foreach($related_product as $row){ ?>
                    <div class="col-xs-12 col-md-12 related">
                        <div class="thumbnail" style="height: 100px">
                           <a href="<?=base_url();?>home/Product_detail/<?=$row['product_id'];?>"> <img src="assets/product_images/<?=$row['product_image'];?>" style="width: 100%;height: 100%">
                        </div>
                        <h4><a href="home/Product_detail/<?=$row['product_id'];?>"><?=$row['product_name'];?></a></h4>
                       <p><?=$row['product_model'];?></p>
                    <p><?=$row['product_price'];?></p><br>
                    </div>
                    <?php } ?>                    
                </section>
            </div>
</div>
</div>




