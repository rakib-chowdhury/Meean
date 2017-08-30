<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">

             <div class="col-xs-12 col-sm-12 col-md-12 homebanner-holder">


              <?php foreach($advertise as $row){ if($row['post_name']=='trade page banner'){?>

                <div id="image_banner">
                    <a target="_blank" href="<?=$row['link'];?>"><img class="img-responsive" style="width:100%;height:150px" src="uploads/<?=$row['image'];?>" alt="Add"></a>
                </div>
	      <?php break; } } ?>


            </div>
            
            <?php foreach($trade_detail as $rows){?>
            <div class="col-md-12" style="margin-top:10px;">
                <div class="trade_show_image">
                <div id="image_banner">
                    <img class="img-responsive" style="width:100%;height:300px;" src="uploads/trade/<?=$rows['image'];?>" alt="Add">
                </div>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="page-header">
                <h1 style="font-size: 30px;text-align:center;"><?=$rows['name'];?></h1>
                </div>
                <div class="jumbotron">
                    <h2 style="font-size: 25px;text-align:center;">Venue <b>:</b> <?=$rows['venue'];?></h2>
                     <br/>
                    <p style="text-align:justify;"> About <?=$rows['name'];?> <b>:</b> <?=$rows['description'];?></p>
                </div>

            </div>
            <?php }?>
            <div class="info-boxes wow fadeInUp">
                <div class="info-boxes-inner">
                <?php foreach($advertise as $row){ if($row['post_name']=='trade page top right(1st position)'){?>
                  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="info-box">
                        <a target="blank" href="<?=$row['link'];?>"><img class="img-responsive" style="height:100px;width: 100%" src="uploads/<?=$row['image'];?>" alt="Add"></a>
                    </div>
                  </div>
	        <?php } if($row['post_name']=='trade page middle right(2nd position)'){?>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                   <div class="info-box">
                      <a target="blank" href="<?=$row['link'];?>"><img class="img-responsive" style="height:100px;width: 100%" src="uploads/<?=$row['image'];?>" alt="Add"></a>
                   </div>
                </div>

		<?php } } ?>
                 <section id="featured_product" class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <h2 style="font-size: 20px;margin: 15px;color: rgb(87, 171, 245);">Recent Shows</h2>
                    <?php foreach($trade_show as $row){?>
                    <?php if($row['image']!=$rows['image']) { ?>
                    <div class="col-xs-6 col-md-6 featured">
                        <div class="thumbnail" style="height: 100px">
                            <a href="trade_show/index/<?=$row['id'];?>"><img src="uploads/trade/<?=$row['image'];?>" style="width: 100%;height: 100%"></a>
                        </div>
                        <h4 style="text-align:center;"><?=$row['name'];?></h4>
                    </div>
                    <?php } }?>
                </section>
               </div>
            </div>
        </div>
    </div>
</div>