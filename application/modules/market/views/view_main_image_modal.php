<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title center" id="exampleModalLabel"><strong></strong></h4>
        </div>
        
        <form action="market/update_image" method="post" enctype="multipart/form-data">
        <div class="modal-body">

            <?php foreach ($image_details as $row){?>
             <!--<input type="hidden" name="img_id" value="<?php echo $row['img_id'];?>">-->
             <!--<input type="hidden" name="is_main_image" value="<?php echo $row['is_main_image'];?>">-->
             <input type="hidden" name="market_place_id" value="<?php echo $row['market_place_id'];?>">
            <div class="form-group">
                <label for="name">Product Image:</label>
                <img src="assets/product_images/<?= $row['market_place_image']; ?>" style="width: 100px;height: 100px">
            </div>

            <div class="form-group">
                <label for="email">New Image:</label>
                <input type="file" name="userfile" class="form-control" id="email" value="">
            </div>

        </div>
            <?php }?>
        <div class="modal-footer">
            <button type="submit" name="btn" class="btn btn-primary" class="pull-right">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal" style="float: left">Decline</button>

        </div>
</form>
    </div>
</div>

