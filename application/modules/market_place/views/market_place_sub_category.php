<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function () {
        FB.init({
            appId: '{your-app-id}',
            status: true,
            xfbml: true
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row"> <!-- /.sidemenu-holder -->
            <div class="col-xs-12 col-sm-12 col-md-8 homebanner-holder" style="border:1px solid #ccc">
                <?php
                foreach ($market_place_description as $row) {
                    ?>
                    <div id="hero">
                        <!--- New Content-->
                        <div class="single_grid">
                            <div class="col-md-12" style="background-color: mediumseagreen">
                                <ul  class="etalage" id="etalage">
                                    <div>
                                        <h4 style="font-size: 26px;text-align: left; color: #ffffff; margin-top: 5px;margin-bottom: 5px;">
                                            <?php echo $row->market_place_name ?></h4>
                                    </div>


                                    <?php foreach ($select_sub_images as $row2) { //print_r($file_url.''.$row2->images_name);  ?>
                                        
                                        <?php if(file_exists($file_url.''.$row2->images_name)) { //echo 'iif';?>
                                            <li style="margin-bottom: 50px !important;">
                                                <img class="etalage_source_image img-responsive"
                                                     src="assets/product_images/<?= $row2->images_name; ?>"
                                                     title=""/>
                                            </li>
                                    <?php } else { //echo 'eelse'; ?>
                                            <li style="margin-bottom: 50px !important;">
                                                <img class="etalage_source_image img-responsive"
                                                     src="assets/product_images/no_image.jpg"
                                                     title=""/>
                                            </li>
                                    <?php }} ?>
                                </ul>


                            </div>
                            <div class="col-xs-12 col-md-12">
                                <div class="">
                                    <div class="cart-b">
                                        <div class="left-n" style="font-size: 16px;">
                                            &#2547;<?php echo $row->market_place_price ?></div>
                                        <span class="tags" style="">
                                            <span class="price-tag">
                                                <p style="line-height: 2em;margin-top: -10px;width:100px;color: white;font-size: 14px;">
                                                    &#2547; Price</p>
                                            </span>
                                        </span>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <h4 style="margin: 5px;">Description:</h4>
                                            <p><?php echo $row->market_place_description ?></p>
                                                <a href='market/promote_ad/<?= $row->market_place_id ?>'><button style="background-color: #3cb371 !important;margin-bottom: 25px;  border-color: transparent !important;font-size: 17px" class="btn btn-info">Promote This Ad</button></a>
                                        </div>

                                        <div align="right" class="col-md-6">
                                            <h6 style="font-size: 16px;margin: 5px">Location
                                                : <?php echo $row->en_dist_name ?>
                                                , <?php echo $row->location_name ?></h6>
                                            <h6 style="font-size: 16px;margin: 5px;">Condition
                                                : <?php echo $row->condition ?></h6>
                                            <h6 style="font-size: 16px;margin: 5px;">Adding time :
                                                <?php
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
                                                ?>

                                            </h6>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php } ?>

            </div>

            <?php
            foreach ($market_place_description as $row) {
                ?>

                <div class="info-boxes wow fadeInUp">
                    <div class="col-xs-12 col-md-4" style="float:left;background-color: #fff;">
                        <h4 style="font-size: 20px;margin: 10px;">&#8520; Advertiser Information</h4>
                        <div class="form-group table-responsive" style="overflow-x:auto">
                            <table class="table table-bordered" style="background-color: rgb(255, 255, 255);">
                                <tr>
                                    <td>Name</td>
                                    <td><?php echo $row->reg_first_name,' ',$row->reg_last_name ?></td>
                                </tr>
                                <tr>
                                    <td>phone</td>
                                    <td><?php echo $row->reg_phone ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="col-xs-12 col-md-4" style="float:left;background-color: #fff;">
                <h4 style="font-size: 20px;margin: 10px;">&#9993; Mail to Advertiser</h4>
                <table class="table table-bordered">
                    <tr>
                        <th>Your Name</th>
                        <td><input style="border: 1px solid #e6e3e3;" type="text" name="name" id="name" class="box">
                        </td>
                    </tr>
                    <tr>
                        <th>Your Email</th>
                        <td><input style="border: 1px solid #e6e3e3;" type="text" id="mail_id" name="mail_id"
                                   class="box"></td>
                    </tr>
                    <tr>
                        <th>Your mobile number</th>
                        <td><input style="border: 1px solid #e6e3e3;" type="text" name="mobile_number"
                                   id="mobile_number" class="box"></td>
                    </tr>
                    <tr>
                        <th>Your Message</th>
                        <td><textarea style="border: 1px solid #e6e3e3;resize: none;" rows="3" id="mail_message"
                                      name="mail_message" cols="18" class="textbox"></textarea></td>
                    </tr>
                    <tr>
                        <th>
                            <input type="hidden" name="sender_mail" id="sender_mail"
                                   value="<?php echo $market_place_description[0]->reg_email ?>">
                            <input type="hidden" name="sender_id" id="sender_id"
                                   value="<?php echo $market_place_description[0]->reg_id ?>">
                            <input type="hidden" name="sender_link" id="sender_link"
                                   value="<?php echo 'http://meeean.com/market_place/market_place_by_sub_category/' . $market_place_description[0]->market_place_id ?>">
                        </th>
                        <td>
                            <button type="button" onclick="send_mail_to_market_seller()" class="btn btn-info"
                                    style="margin: 10px 0px;">Send
                            </button>
                        </td>
                    </tr>
                </table>
            </div>

            <?php
            if ($members_details) {
                foreach ($members_details as $row) {
                    ?>

                    <div class="info-boxes wow fadeInUp">
                        <div class="col-xs-12 col-md-4" style="float:left;background-color: #fff;">
                            <h4 style="font-size: 20px;margin: 10px;">Visit Member's Information</h4>
                            <table class="table table-bordered" style="background-color: rgb(255, 255, 255);">
                                <tr>
                                    <td style="width:15%"><img style="height:50px; width:50px;"
                                                               src="uploads/<?= $row->cover_img ?>"></td>
                                    <td>
                                        <a href="market_place/market_memebrs/<?php echo $row->reg_id; ?>"><?php echo $row->store_name ?></a>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                <?php }
            } ?>

            <div class="info-boxes wow fadeInUp">
                <div class="col-xs-12 col-md-4"
                     style="float:left;background-color: #fff;border: 1px solid #f0ebeb;padding: 5px;">
                    <span style="font-size: 20px;margin: 10px;">Share</span>
                    <!-- <a class="sharer" href="http://www.meeean.com/market_place/market_place_by_sub_category/<?php echo $market_place_description[0]->market_place_id ?>" data-title="Shirts on Website!">
                        <img src="raw/images/payments/facebook.png" style="width: 40px;">
                    </a> -->
                    <a target="_blank"
                       href="http://www.facebook.com/sharer.php?u=http%3A%2F%2Fwww.meeean.com%2Fmarket_place%2Fmarket_place_by_sub_category%2F<?php echo $market_place_description[0]->market_place_id; ?>">
                        <img src="raw/images/payments/facebook.png" style="width: 40px;">
                    </a>

                    <a target="_blank"
                       href="http://twitter.com/share?text= See <?php echo $market_place_description[0]->market_place_name ?> At &url=http://www.meeean.com/market_place/market_place_by_sub_category/<?php echo $market_place_description[0]->market_place_id ?>">
                        <img src="raw/images/payments/twitter.png" style="width: 40px;">
                    </a>

                    <a target="_blank"
                       href="https://plus.google.com/share?url=http%3A%2F%2Fwww.meeean.com%2Fmarket_place%2Fmarket_place_by_sub_category%2F<?php echo $market_place_description[0]->market_place_id; ?>">
                        <img src="raw/images/payments/google.png" style="width: 40px;">
                    </a>
                </div>
            </div>
            <div class="info-boxes wow fadeInUp">
                <div class="col-md-4" style="float:left;background-color: #fff;padding: 10px;">
                    <a data-toggle="modal" data-target="#myModal" href="#" data-dropdown="drop7"
                       style="font-size: 20px">Report on Meeean</a>

                </div>
            </div>

        </div>
        <div class="row">

        </div>

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12" style="padding: 0px;">
                <div id="eeanstar" class="carousel slide" data-ride="carousel" style="margin: 10px 0px;">
                    <h1 style="font-size: 23px;color: rgb(47, 47, 173);margin-bottom:40px;">Related Products</h1>
                    <ul class="carousel-indicators">
                        <li data-target="#nimmi" data-slide-to="0" class="active"></li>
                        <li data-target="#nimmi" data-slide-to="1"></li>
                        <li data-target="#nimmi" data-slide-to="2"></li>
                    </ul>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active" role="presentation">

                            <?php //$i = 0;
                            foreach ($related_product as $i => $row) {
                                if ($i <= 11) {
                                    if ($i % 4 == 0 && $i != 0) {
                                        echo '<div class="item" role="presentation">';
                                    } ?>
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <!-- ============================================================= LATEST TWEET============================================================= -->
                                        <div class="media">
                                            <a class="media-left"
                                               href="market_place/market_place_by_sub_category/<?= $row->market_place_id; ?>">
                                                <div class="thumbnail col-xs-12 col-sm-12"
                                                     style="height:220px !important;">
                                                    <img class="media-object"
                                                         src="assets/product_images/<?= $row->market_place_image; ?>"
                                                         alt="<?= $row->market_place_name; ?>" width="100"
                                                         style="height:100% !important;">
                                                </div>
                                            </a>
                                        </div>
                                        <!-- ============================================================= LATEST TWEET : END ============================================================= -->
                                    </div>

                                    <?php
                                    if ($i == 3 || $i == 7 || $i == 11 || $i == 15 || $i == 19 || $i == 23 || $i == 27) {
                                        echo '</div>';
                                    }
                                }
                            } ?>
                        </div>


                    </div>

                    <a href="#eeanstar" class="left carousel-control" data-slide="prev" style="margin-top:50px">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a href="#eeanstar" class="right carousel-control" data-slide="next" style="margin-top:50px">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>


        </div>
    </div>
</div>

<div class="modal fade" id="mail_modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="modal_header"></h4>
            </div>
            <div class="modal-body">
                <p id="modal_msg"></p>
            </div>
            <div class="modal-footer">
                <a href="" id="modal_url">
                    <button type="button" class="btn btn-success" id="ok_btn">OK</button>
                </a>

            </div>
        </div>

    </div>
</div>


<script src="raw/js/jquery-1.11.1.min.js"></script>

<script>
    $('.sharer').click(function (e) {
        e.preventDefault();

        var title = $(this).data('title');
        var url = $(this).attr('href');
        var fbSharerUrl = 'http://www.facebook.com/sharer.php?';
        var params = {
            u: url,
            t: title
        };
        var fbSharerConfig = 'toolbar=0,status=0,width=600,height=400';

        window.open(fbSharerUrl + $.param(params), 'sharer', fbSharerConfig);
    });
</script>
<script>
    $(document).on("click", "#YOUR_RATING_BUTTON", function () {
        var id = $(this).data('id');
        var photo = $(this).data('photo');
        var obj = {
            method: 'feed',
            link: '{The link you want to share}',
            picture: '{the url of the photo you want}',
            name: '{The name of the link attachment}',
            description: '{The description of the link (appears beneath the link caption). If not specified, this field is automatically populated by information scraped from the link, typically the title of the page}',
            display: 'popup'
        };

        function callback(response) {
            //do something with callback
            if (response && response.post_id) {
                alert('Thank you for sharing this rating.');
            } else {
                alert('Rating was not shared.');
            }
        }

        FB.ui(obj, callback);
    });
</script>

<!-- For demo purposes – can be removed on production -->
<script>

    function send_mail_to_market_seller() {
        var name = $('#name').val();
        var mail_id = $('#mail_id').val();
        var mobile_number = $('#mobile_number').val();
        var mail_message = $('#mail_message').val();
        var sender_mail = $('#sender_mail').val();
        var sender_id = $('#sender_id').val();
        var sender_link = $('#sender_link').val();
//                                    alert (name);
//                alert (sender_link);


        $.ajax({
            url: "market_place/contact_with_user",
            type: "post",
            data: {
                name: name,
                mail_id: mail_id,
                mobile_number: mobile_number,
                mail_message: mail_message,
                sender_mail: sender_mail,
                sender_id: sender_id,
                sender_link: sender_link
            },
            success: function (msg) {
//                                            alert(msg);
                // $('#sub_category').html(msg);

                if (msg == '0') {
                    //alert("0");
                    $("#modal_header").html('Error');
                    $("#modal_msg").html('Message send failed');
                    $("#modal_url").removeAttr('href');

                    $("#mail_modal").modal();


                }
                if (msg == '1') {
                    //alert("01");
                    $("#modal_header").html('Success');
                    $("#modal_msg").html('Your mail successfully send');

                    $("#modal_url").removeAttr('href');

                    $("#mail_modal").modal();


                    //window.reload();
                }

            }

        });
    }

</script>

<script>
    jQuery(document).ready(function ($) {

        $('#etalage').etalage({
            thumb_image_width: 720,
            thumb_image_height: 600,
            source_image_width: 900,
            source_image_height: 1000,
            show_hint: true,
            click_callback: function (image_anchor, instance_id) {
                alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor + '"\n(in Etalage instance: "' + instance_id + '")');
            }
        });

    });
</script>
<script src="raw/css/jquery.etalage.min.js"></script>
<script type="application/x-javascript"> addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
    }, false);
    function hideURLbar() {
        window.scrollTo(0, 1);
    } </script>

<script type="text/javascript">

    var mcVM_options = {menuId: "menu-v", alignWithMainMenu: false};
    /* www.menucool.com/vertical/vertical-menu.*/
    init_v_menu(mcVM_options);
    function init_v_menu(a) {
        if (window.addEventListener)
            window.addEventListener("load", function () {
                start_v_menu(a)
            }, false);
        else
            window.attachEvent && window.attachEvent("onload", function () {
                start_v_menu(a)
            })
    }
    function start_v_menu(i) {
        var e = document.getElementById(i.menuId), j = e.offsetHeight, b = e.getElementsByTagName("ul"), g = /msie|MSIE 6/.test(navigator.userAgent);
        if (g)
            for (var h = e.getElementsByTagName("li"), a = 0, l = h.length; a < l; a++) {
                h[a].onmouseover = function () {
                    this.className = "onhover"
                };
                h[a].onmouseout = function () {
                    this.className = ""
                }
            }
        for (var k = function (a, b) {
            if (a.id == i.menuId)
                return b;
            else {
                b += a.offsetTop;
                return k(a.parentNode.parentNode, b)
            }
        }, a = 0; a < b.length; a++) {
            var c = b[a].parentNode;
            c.getElementsByTagName("a")[0].className += " arrow";
            b[a].style.left = c.offsetWidth + "px";
            b[a].style.top = c.offsetTop + "px";
            if (i.alignWithMainMenu) {
                var d = k(c.parentNode, 0);
                if (b[a].offsetTop + b[a].offsetHeight + d > j) {
                    var f;
                    if (b[a].offsetHeight > j)
                        f = -d;
                    else
                        f = j - b[a].offsetHeight - d;
                    b[a].style.top = f + "px"
                }
            }
            c.onmouseover = function () {
                if (g)
                    this.className = "onhover";
                var a = this.getElementsByTagName("ul")[0];
                if (a) {
                    a.style.visibility = "visible";
                    a.style.display = "block"
                }
            };
            c.onmouseout = function () {
                if (g)
                    this.className = "";
                this.getElementsByTagName("ul")[0].style.visibility = "hidden";
                this.getElementsByTagName("ul")[0].style.display = "none"
            }
        }
        for (var a = b.length - 1; a > -1; a--)
            b[a].style.display = "none"
    }
</script>


</body>
</html>
