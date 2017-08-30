<ul>

    <?php $i = 0;
    foreach ($search_data as $row) { ?>
        <li style="padding:10px;border-bottom: 1px solid #ccc;display:block;overflow:hidden">
            
            <div class="aa-cartbox-info" style="float:left;width:50%">
                <h4>
                    <a style="color:black;" href="product/Product_detail/<?php echo $row['product_id']?>"><?php echo $row['product_name']; ?></a>
                </h4>
                <!--<p style="color:#555;"><?= $row['product_price']; ?>&#2547;</p>-->
            </div>
            <!--<a class="btn btn-success" style="float:left;padding: 5px 14px;border-radius: 0px;font-weight: bold;" href="product/Product_detail/<?php echo $row['product_id']?>">View Details</a>-->

            </li>

    <?php $i++;
} ?>

</ul>

