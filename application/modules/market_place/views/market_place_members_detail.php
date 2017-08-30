<style>
    .imgA1
    {
        float: left; position: relative;
    }
    .imgB1
    {
        position: absolute; bottom: 0px; left: 20px;
    }
    
    #store_name{
        position: absolute; bottom: 100px; left: 250px;
        border: 1px solid #cedd3eb3;
        background-color: #cedd3eb3;
        color: #fff;
        padding: 12px;
        border-radius: 5px;
        font-size: 25px;
    }

    #home{
        background-color: #fff;padding: 0px;margin: 5px 0px;
    }

    #home h3{
        font-size: 25px;
        margin: 10px 0px;
    }

    #home p{
        font-size: 17px;
    }

    #about_us{
        display: none;background-color: #fff;padding: 0px;margin: 5px 0px;
    }

    #about_us h3{
        font-size: 25px;
        margin: 10px 0px;
    }

    #about_us p{
        font-size: 17px;
    }

    #contact_us{
        display: none;background-color: #fff;padding: 0px;margin: 5px 0px;
    }

    #contact_us h3{
        font-size: 25px;
        margin: 10px 0px;
    }

    #contact_us p{
        font-size: 17px;
    }


</style>


<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
      <?php if($members_details){?>
        <div class="row"> <!-- /.sidemenu-holder -->
            <div class="col-lg-1"></div>
            <div class="col-lg-10 col-xs-12 membership_banner" style="border:1px solid #ccc;padding: 0px;height: 396px;background-color: #fff;">
                <img class="imgA1" src="uploads/<?= $mem_info->cover_img ?>" alt="banner" style="width: 100%;height: 350px">
                <img class="imgB1" src="uploads/<?= $mem_info->profile_img ?>" alt="cover" style="width: 200px;height: 200px;border: 5px solid #e1e1e1;">
                <span id="store_name"><?php echo $mem_info->store_name?></span>
                <div class="col-sm-4"></div>
                <div class="col-xs-12 col-sm-8">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#top" data-toggle="tab" id="top" onclick="showDiv(1)">Home</a></li>
                        <li role="presentation"><a href="#pop" data-toggle="tab" onclick="showDiv(2)">About Us</a></li>
                        <li role="presentation"><a href="#rec" data-toggle="tab" onclick="showDiv(3)">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10 col-xs-12" id="home">
                <div class="jumbotron" style="background-color: #fff">
                    <h3><?= $mem_info->home_title ?></h3>
                    <p><?= $mem_info->home_detail ?></p>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>

        <div class="row">
            <div class="col-lg-1"></div>

            <div class="col-lg-10 col-xs-12" id="about_us" style="display: none">
                <div class="jumbotron" style="background-color: #fff">
                    <h3>About Us</h3>
                    <p><?= $mem_info->about_us ?></p>
                </div>
            </div>
            <div class="col-lg-`1"></div>
        </div>

        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10 col-xs-12" id="contact_us" style="display: none">
                <div class="jumbotron" style="background-color: #fff">
                    <h3>Contact Us</h3>
                    <p><?= $mem_info->contact_us ?></p>
                    <div class="col-md-12" style="float:left;background-color: #fff;">
                        <h4 style="font-size: 20px;margin: 10px;">&#9993; Mail to Member</h4>
                        <table class="table table-bordered">
                            <tr>
                                <th>Your Name</th>
                                <td><input style="border: 1px solid #e6e3e3;" type="text" name="name" id="name" class="box"></td>
                            </tr>
                            <tr>
                                <th>Your Email</th>
                                <td><input style="border: 1px solid #e6e3e3;" type="text" id="mail_id" name="mail_id" class="box"></td>
                            </tr>
                            <tr>
                                <th>Your mobile number</th>
                                <td><input style="border: 1px solid #e6e3e3;" type="text" name="mobile_number" id="mobile_number" class="box"></td>
                            </tr>
                            <tr>
                                <th>Your Message</th>
                                <td><textarea style="border: 1px solid #e6e3e3;resize: none;" rows="3" id="mail_message" name="mail_message" cols="18" class="textbox"></textarea></td>
                            </tr> 
                            <tr>
                                <th>
                                    <input type="hidden" name="sender_mail" id="sender_mail"  value="<?php echo $members_details[0]->reg_email ?>">
                                    <input type="hidden" name="sender_id" id="sender_id" value="<?php echo $members_details[0]->reg_id ?>">
                                    <input type="hidden" name="sender_link" id="sender_link" value="<?php echo 'http://meeean.com/market_place/market_memebrs/' . $members_details[0]->reg_id ?>">
                                </th>
                                <td><button type="button" onclick="send_mail_to_market_seller()" class="btn btn-info" style="margin: 10px 0px;">Send</button></td>
                            </tr> 
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>


        <div class="row">
            <h1 style="font-size: 25px;text-align: center">Other Products From this Shop</h1>
            <div class="col-md-2"></div>
            <div class="col-xs-12 col-sm-6 col-md-8 market_place">
            <?php
                if (count($market_place_description) >= 1) {
                    if($all_top_product !=0){
                    foreach ($all_top_product as $row1) { ?>
                    
                            <a style="display:block" href="market_place/market_place_by_sub_category/<?php echo $row1['market_place_id'] ?>">
                                <div class="col-xs-12 col-sm-12 col-md-12 market_place_view" style="background-color: aliceblue">
                                    <div class="col-xs-4 col-md-3 thumbnail">

                                        <img src="assets/product_images/<?= $row1['market_place_image']; ?>" alt="agriculture">

                                    </div>
                                    <div class="col-xs-6 col-md-6 market_place_description">
                                        <h3><?php echo $row1['market_place_name']; ?></h3>
                                        <p style=""><?php
                                            $now = date('Y-m-d H:i:s');
                                            $exp = $row1['market_place_publish_date'];

                                            $date1 = new DateTime($now);
                                            $date2 = new DateTime($exp);
                                            $interval = $date1->diff($date2);
                                            echo "About" . "\n";
                                            if ($interval->y != 0) {
                                                echo $interval->y . " years" . "\n";
                                            } else if ($interval->m != 0) {
                                                echo $interval->m . " months" . "\n";
                                            } else if ($interval->d != 0) {

                                                if ($interval->d >= 28) {
                                                    echo "4 weeks" . "\n";
                                                } else if ($interval->d >= 21) {
                                                    echo "3 weeks" . "\n";
                                                } else if ($interval->d >= 14) {
                                                    echo "2 weeks" . "\n";
                                                } else if ($interval->d >= 7) {
                                                    echo "1 week" . "\n";
                                                } else {
                                                    echo $interval->d . " days" . "\n";
                                                }
                                            } else if ($interval->h != 0) {
                                                echo $interval->h . " hours" . "\n";
                                            } else if ($interval->m != 0) {
                                                echo $interval->m . " minutes" . "\n";
                                            } else {
                                                echo $interval->s . " seconds" . "\n";
                                            }
                                            echo "ago";
                                            ?>, <?php echo $row1['location_name']; ?> </p>
                                        <p style=""><?php echo $row1['market_category_name'] ?></p>
                                    </div>
                                    <div class="col-xs-2 col-md-3">
                                        <span class="tags">
                                            <span class="price-tag">
                                                <p style="margin-top: 40px;width:100px;">&#2547;<?= $row1['market_place_price']; ?>
                                                </p>
                                            </span>
                                        </span>
                                    </div>
                                    <span class="pull-right" style="border-radius: 5px;background-color: #fff;padding: 8px;">
                                        <img src="assets/images/rank_1.jpg" style="width: 20px;height: 20px;">Top ad
                                    </span>
                                </div>
                            </a>
                    <?php }}
                            if($bump_ad !=0){
                                foreach ($bump_ad as $bump) {
                            ?>
                            <a style="display:block" href="market_place/market_place_by_sub_category/<?php echo $bump['market_place_id'] ?>">
                                <div class="col-xs-12 col-sm-12 col-md-12 market_place_view" style="background-color: #f6f6f6">
                                    <div class="col-xs-4 col-md-3 thumbnail">

                                        <img src="assets/product_images/<?= $bump['market_place_image']; ?>" alt="agriculture">

                                    </div>
                                    <div class="col-xs-6 col-md-6 market_place_description">
                                        <h3><?php echo $bump['market_place_name']; ?></h3>
                                        <p style=""><?php
                                            $now = date('Y-m-d H:i:s');
                                            $exp = $bump['market_place_publish_date'];

                                            $date1 = new DateTime($now);
                                            $date2 = new DateTime($exp);
                                            $interval = $date1->diff($date2);
                                            echo "About" . "\n";
                                            if ($interval->y != 0) {
                                                echo $interval->y . " years" . "\n";
                                            } else if ($interval->m != 0) {
                                                echo $interval->m . " months" . "\n";
                                            } else if ($interval->d != 0) {

                                                if ($interval->d >= 28) {
                                                    echo "4 weeks" . "\n";
                                                } else if ($interval->d >= 21) {
                                                    echo "3 weeks" . "\n";
                                                } else if ($interval->d >= 14) {
                                                    echo "2 weeks" . "\n";
                                                } else if ($interval->d >= 7) {
                                                    echo "1 week" . "\n";
                                                } else {
                                                    echo $interval->d . " days" . "\n";
                                                }
                                            } else if ($interval->h != 0) {
                                                echo $interval->h . " hours" . "\n";
                                            } else if ($interval->m != 0) {
                                                echo $interval->m . " minutes" . "\n";
                                            } else {
                                                echo $interval->s . " seconds" . "\n";
                                            }
                                            echo "ago";
                                            ?>, <?php echo $bump['location_name']; ?> </p>
                                        <p style=""><?php echo $bump['market_category_name'] ?></p>
                                    </div>
                                    <div class="col-xs-2 col-md-3">
                                        <span class="tags">
                                            <span class="price-tag">
                                                <p style="margin-top: 40px;width:100px;">&#2547;<?= $bump['market_place_price']; ?>
                                                </p>
                                            </span>
                                        </span>
                                    </div>
                                    <span class="pull-right" style="border-radius: 5px;background-color: #fff;padding: 8px;">
                                        <img src="assets/images/images.png" style="width: 20px;height: 20px;">Bump ad
                                    </span>
                                </div>
                            </a>
                            <?php
                            }}
                    foreach ($market_place_description as $row) {
                        if ($row->top_ad != 1 && $row->bump_ad != 1) {?>
                        <a style="display:block" href="market_place/market_place_by_sub_category/<?php echo $row->market_place_id ?>">

                            
                            <div class="col-xs-12 col-sm-12 col-md-12 market_place_view">
                                <div class="col-xs-4 col-md-3 thumbnail">

                                    <img src="assets/product_images/<?= $row->market_place_image; ?>" alt="agriculture" style="height: 100px;width: 100%;">

                                </div>
                                <div class="col-xs-6 col-md-6 market_place_description">
                                    <h3><?php echo $row->market_place_name; ?></h3>
                                    <p style=""><?php
                                        $now = date('Y-m-d H:i:s');
                                        $exp = $row->market_place_publish_date;

                                        $date1 = new DateTime($now);
                                        $date2 = new DateTime($exp);
                                        $interval = $date1->diff($date2);
                                        echo "About" . "\n";
                                        if ($interval->y != 0) {
                                            echo $interval->y . " years" . "\n";
                                        } else if ($interval->m != 0) {
                                            echo $interval->m . " months" . "\n";
                                        } else if ($interval->d != 0) {

                                            if ($interval->d >= 28) {
                                                echo "4 weeks" . "\n";
                                            } else if ($interval->d >= 21) {
                                                echo "3 weeks" . "\n";
                                            } else if ($interval->d >= 14) {
                                                echo "2 weeks" . "\n";
                                            } else if ($interval->d >= 7) {
                                                echo "1 week" . "\n";
                                            } else {
                                                echo $interval->d . " days" . "\n";
                                            }
                                        } else if ($interval->h != 0) {
                                            echo $interval->h . " hours" . "\n";
                                        } else if ($interval->m != 0) {
                                            echo $interval->m . " minutes" . "\n";
                                        } else {
                                            echo $interval->s . " seconds" . "\n";
                                        }
                                        echo "ago";
                                        ?>, <?php echo $row->location_name; ?> </p>
                                    <p style=""><?php echo $row->market_category_name ?></p>
                                </div>
                                <div class="col-xs-2 col-md-3">
                                    <span class="tags">
                                        <span class="price-tag">
                                            <p style="margin-top: 40px;width:100px;">&#2547;<?= $row->market_place_price; ?>
                                            </p>
                                        </span>
                                    </span>
                                </div>

                            </div>
                        <?php }
                    }
                } else {
                    ?>
                    <h3 style="text-align:center;font-size:29px;">No product available</h3>
            <?php } ?>
            </a>

            </div>

        </div>

        <div class="row">
            <div class="col-md-3 description" style=""></div>
            <div class="col-md-7 text-center">
                    <?php echo $pagination; ?>
            </div>
        </div>

      <?php }else{?>
        <h1 style="text-align: center;font-size:25px;color: red;">Wait For the Admin Approval</h1>
        <?php }?>

    </div>


</div>


 <div class="modal fade" id="market_modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id ="modal_header"> </h4>
            </div>
            <div class="modal-body">
                <p id="modal_msg"></p>
            </div>
            <div class="modal-footer">
                <a href="" id="modal_url">
                    <button type="button" class="btn btn-success" id="ok_btn" >OK</button></a>

            </div>
        </div>

    </div>
</div>



<script>

            function send_mail_to_market_seller()
            {
                var name = $('#name').val();
                var mail_id = $('#mail_id').val();
                var mobile_number = $('#mobile_number').val();
                var mail_message = $('#mail_message').val();
                var sender_mail = $('#sender_mail').val();
                var sender_id = $('#sender_id').val();
                var sender_link = $('#sender_link').val();
//                                    alert (sender_link);
                //alert (mail_id);


                $.ajax({
                    url: "market_place/contact_with_user",
                    type: "post",
                    data: {name: name, mail_id: mail_id, mobile_number: mobile_number, mail_message: mail_message, sender_mail: sender_mail, sender_id: sender_id, sender_link: sender_link},
                    success: function (msg) {
                                            //alert(msg);
                        // $('#sub_category').html(msg);

                        if (msg == '0')
                        {
                            alert("Message send failed");
                            //alert("0");
                            $("#modal_header").html('Error');
                            $("#modal_msg").html('Message send failed');
                            $("#modal_url").removeAttr('href');
                            $("#market_modal").modal();
                        }
                        if (msg == '1')
                        {
                            alert("Your Message Has been Send Successfully");
                            location.reload();
                            //alert("01");
                            $("#modal_header").html('Success');
                            $("#modal_msg").html('Your mail successfully send');

                            $("#modal_url").removeAttr('href');

                            $("#market_modal").modal();



                            //window.reload();
                        }

                    }

                });
            }

    </script>

<script>
    function showDiv(e) {
//        alert(e);
        if (e == 1) {
            document.getElementById('home').style.display = "block";
            document.getElementById('about_us').style.display = "none";
            document.getElementById('contact_us').style.display = "none";
        }

        if (e == 2) {
            document.getElementById('home').style.display = "none";
            document.getElementById('about_us').style.display = "block";
            document.getElementById('contact_us').style.display = "none";
        }

        if (e == 3) {
            document.getElementById('home').style.display = "none";
            document.getElementById('about_us').style.display = "none";
            document.getElementById('contact_us').style.display = "block";
        }
    }
</script>

</body>
</html>
