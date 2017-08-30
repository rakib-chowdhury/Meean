<body class="cnt-home"/>


<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container" style="padding: 0px;">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:10px;">
                <?php if ($all_ads_info) { ?>
                    <a href="<?= $all_ads_info->all_ads_link; ?>">
                        <div id="image_banner" style="margin-top: 0px; margin-bottom:15px">
                            <img class="img-responsive" style="width:100%;height:110px"
                                 src="uploads/<?= $all_ads_info->all_ads_image; ?>" alt="Add">
                        </div>
                    </a>
                <?php } ?>
            </div>


            <div class="col-xs-12 col-sm-6 col-md-3" style="margin-top:0px;padding-left: 13px;">
                <div class="col-xs-12 col-sm-12 col-md-12 market_place_sidebar">

                    <form class="form-horizontal" method="post" action="market_place/product_search">

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label"
                                   style="font-size: 15px">Category</label>
                            <div class="col-sm-9">
                                <select class="col-xs-12 col-sm-12" id="market_place_category"
                                        name="market_category_id">
                                    <option value="">Select Category</option>
                                    <?php
                                    foreach ($select_market_category as $row) {
                                        ?>
                                        <option
                                            value="<?= $row->market_category_id; ?>"><?php echo $row->market_category_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label"
                                   style="font-size: 15px">Division</label>
                            <div class="col-sm-9">
                                <select class="col-xs-12 col-sm-12 market_place_location" name="location_name"
                                        id="division" onchange="get_district()">
                                    <option value="">Select Division</option>
                                    <?php
                                    foreach ($select_market_location as $row) {
                                        ?>
                                        <option
                                            value="<?= $row->location_id; ?>"><?php echo $row->location_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label"
                                   style="font-size: 15px">District</label>
                            <div class="col-sm-9">
                                <select class="col-xs-12 col-sm-12" name="district" id="district"
                                        style="padding: 5px 0px;" onchange="get_upazilla()">

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label" style="font-size: 15px">Area</label>
                            <div class="col-sm-9">
                                <select class="col-xs-12 col-sm-12" name="upazilla" id="upazilla" style="padding: 5px;">

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label" style="font-size: 15px">Minimum
                                Price:</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="number" name="minimum">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label" style="font-size: 15px">Maximum
                                Price:</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="number" name="maximum">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label" style="font-size: 15px">Ads
                                View:</label>
                            <div class="col-sm-9">
                                <select class="col-xs-12 col-sm-12" name="view_ads" id="view_ads" style="padding: 5px;">
                                    <option value="0">All Ads</option>
                                    <option value="1">Only members</option>

                                </select>
                            </div>
                        </div>


                        <div id="slider-range"></div>

                        <input type="hidden" id="amount1">
                        <input type="hidden" id="amount2">
                        <div class="col-md-12" style="margin-top:20px;" align="center">
                            <p>
                                <input type="submit" class="btn btn-success" name="submit_range" value="Submit"
                                       style="width: 100px">
                            </p>
                        </div>
                    </form>
                    <div style="padding-top:10px" align="center">
                        <a href="market_place/market_place_by_product">
                            <button type="button" class="btn btn-warning" style="margin-top:20px">view all product
                            </button>
                        </a>
                    </div>
                    <div class="col-xs-12 col-md-12 sidebar" id="categories">
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
                                                    }
                                                    ?>

                                                </ul><!-- /.dropdown-menu -->
                                            <?php } ?>
                                        </li><!-- /.menu-item -->
                                    <?php } ?>
                                </ul><!-- /.nav -->
                            </nav><!-- /.megamenu-horizontal -->
                        </div><!-- /.side-menu -->
                    </div>

                    <div class="col-xs-12 col-md-12 sidebar" id="locations">
                        <div class="side-menu animate-dropdown outer-bottom-xs">
                            <div class="head text-center"> Locations</div>
                            <nav class="yamm megamenu-horizontal" role="navigation">
                                <ul class="nav">
                                    <?php
                                    foreach ($select_market_location as $row) {
                                        ?>
                                        <li class="dropdown menu-item">
                                            <a href="market_place/search_by_location/<?php echo $row->location_id; ?>"><?php echo $row->location_name ?></a>

                                        </li><!-- /.menu-item -->
                                    <?php } ?>

                                </ul><!-- /.nav -->
                            </nav><!-- /.megamenu-horizontal -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-7 col-md-pull-0">
                <form style="width: 100%;margin-left: 0px" class="form-container" method="post"
                      action="market_place/market_place_by_search_product">
                    <input type="text" required class="search-field" name="keyword"
                           placeholder="Type search text here..."/>
                    <div class="submit-container">
                        <input type="submit" value="" class="submit"/>
                    </div>
                </form>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-7 market_place">
                <?php
                if (count($market_place_description) >= 1) {
                if ($all_top_product != 0) {
                    foreach ($all_top_product as $row1) { ?>

                        <a style="display:block"
                           href="market_place/market_place_by_sub_category/<?php echo $row1['market_place_id'] ?>">
                            <div class="col-xs-12 col-sm-12 col-md-12 market_place_view"
                                 style="background-color: #f3dc5b99">
                                <div class="col-xs-4 col-md-3 thumbnail">
                                    <?php if (file_exists($file_url . '' . $row1['market_place_image'])) { ?>
                                        <img src="assets/product_images/<?= $row1['market_place_image']; ?>"
                                             alt="agriculture">
                                    <?php } else { ?>
                                        <img src="assets/product_images/no_image.jpg" alt="No Image">
                                    <?php } ?>
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

                                    <?php if ($row1['members_status'] == 1) { ?>
                                        <!--<p style="border: 1px solid grey;padding: 5px;margin-top: 15px;background-color: grey;color: black;border-radius: 5px;width: 50%">Members</p>-->
                                        <p style="margin-top:15px;"><span
                                                style="padding:2px; font-size:10px; border:1px solid gray; background:#e1e1e1; border-radius: 5px;">Members</span>
                                        </p>
                                    <?php } ?>

                                </div>
                                <div class="col-xs-2 col-md-3">
                                        <span class="tags">
                                            <span class="price-tag">
                                                <p style="margin-top: 40px;width:100px;">
                                                    &#2547;<?= $row1['market_place_price']; ?>
                                                </p>
                                            </span>
                                        </span>
                                </div>
                                    <span class="pull-right"
                                          style="border-radius: 5px;background-color: #fff;padding: 8px;">
                                        <img src="uploads/<?php echo $top_ad_settings[0]->ad_icon ?>" alt="top"
                                             style="width: 20px;height: 20px;">Top ad
                                    </span>
                            </div>
                        </a>
                    <?php }
                }
                if ($bump_ad != 0) {
                    foreach ($bump_ad as $bump) {
                        ?>
                        <a style="display:block"
                           href="market_place/market_place_by_sub_category/<?php echo $bump['market_place_id'] ?>">
                            <div class="col-xs-12 col-sm-12 col-md-12 market_place_view"
                                 style="background-color: #f6f6f6">
                                <div class="col-xs-4 col-md-3 thumbnail">
                                    <?php if (file_exists($file_url . '' . $bump['market_place_image'])) { ?>
                                        <img src="assets/product_images/<?= $bump['market_place_image']; ?>"
                                             alt="agriculture">
                                    <?php } else { ?>
                                        <img src="assets/product_images/no_image.jpg" alt="agriculture">
                                    <?php } ?>
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

                                    <?php if ($bump['members_status'] == 1) { ?>
                                        <!--<p style="border: 1px solid grey;padding: 5px;margin-top: 15px;background-color: grey;color: black;border-radius: 5px;width: 50%">Members</p>-->
                                        <p style="margin-top:15px;"><span
                                                style="padding:2px; font-size:10px; border:1px solid gray; background:#e1e1e1; border-radius: 5px;">Members</span>
                                        </p>
                                    <?php } ?>

                                </div>
                                <div class="col-xs-2 col-md-3">
                                        <span class="tags">
                                            <span class="price-tag">
                                                <p style="margin-top: 40px;width:100px;">
                                                    &#2547;<?= $bump['market_place_price']; ?>
                                                </p>
                                            </span>
                                        </span>
                                </div>
                                    <span class="pull-right"
                                          style="border-radius: 5px;background-color: #fff;padding: 8px;">
                                        <img src="uploads/<?php echo $bump_ad_settings[0]->ad_icon ?>" alt="top"
                                             style="width: 20px;height: 20px;">Bump ad
                                    </span>
                            </div>
                        </a>
                        <?php
                    }
                }
                foreach ($market_place_description as $row) {
                if ($row->top_ad != 1 && $row->bump_ad != 1) {
                ?>

                <a style="display:block"
                   href="market_place/market_place_by_sub_category/<?php echo $row->market_place_id ?>">
                    <div class="col-xs-12 col-sm-12 col-md-12 market_place_view">
                        <div class="col-xs-4 col-md-3 thumbnail">
                            <?php if (file_exists($file_url . '' . $row->market_place_image)) { ?>
                                <img src="assets/product_images/<?= $row->market_place_image; ?>" alt="agriculture">
                            <?php } else { ?>
                                <img src="assets/product_images/no_image.jpg" alt="No Image">
                            <?php } ?>
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

                            <?php if ($row->members_status == 1) { ?>
                                <!--<p style="border: 1px solid grey;padding: 5px;margin-top: 15px;background-color: grey;color: black;border-radius: 5px;width: 50%">Members</p>-->
                                <p style="margin-top:15px;"><span
                                        style="padding:2px; font-size:10px; border:1px solid gray; background:#e1e1e1; border-radius: 5px;">Members</span>
                                </p>
                            <?php } ?>

                        </div>
                        <div class="col-xs-2 col-md-3">
                                            <span class="tags">
                                                <span class="price-tag">
                                                    <p style="margin-top: 40px;width:100px;">
                                                        &#2547;<?= $row->market_place_price; ?>
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

            <div class="col-xs-12 col-sm-3 col-md-2 advertise">
                <?php foreach ($advertise as $row) {
                if ($row['post_name'] == 'market page all ads right(1st position)') {
                ?>

                <a target="_blank" href="<?= $row['link']; ?>"><img
                        style="margin-top:-45px; width: 100%;margin-bottom:60px;height:500px;"
                        src="uploads/<?= $row['image']; ?>" alt="Add"></a>
            </div>
            <?php }
            }
            ?>
            <?php foreach ($advertise as $row) {
                if ($row['post_name'] == 'market page all ads right(2nd position)') {
                    ?>

                    <div class="col-xs-12 col-sm-3 col-md-2 advertise">

                        <a target="_blank" href="<?= $row['link']; ?>"><img
                                style="margin-top:-45px; width: 100%;height:500px;" src="uploads/<?= $row['image']; ?>"
                                alt="Addddd"></a>

                    </div><!-- .col -->
                <?php }
            }
            ?>
        </div>

        <div class="row">
            <div class="col-md-3 description" style=""></div>
            <div class="col-md-7 text-center">
                <?php echo $pagination; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 description" style=""></div>
            <div class="col-md-7 description" style="border:2px solid #e4e4e4;padding: 10px;  background-color: #fff;">
                <p style="padding-bottom:30px;font-size:20px;font-family:san-serif;text-align:center;"><b>Don't you have
                        any post yet !!</b></p>
                <a style="color:black;font-weight: bold;color:red; margin-left:250px"
                   class="btn btn-warning text-center" <?php
                if ($this->session->userdata('type') == 4) {
                    echo "href='market/add_market_place_product'";
                } else {
                    ?> data-toggle="modal" data-target="#my_modal" <?php } ?> >Post a free AD <!-- iti --></a>
            </div>
        </div>

    </div>
</div>
</div>

<!-- /.info-boxes -->


<script>
    function get_district() {
        var division_id = $('#division').val();
//                     alert(division_id);

        $.ajax({
            url: "<?php echo site_url('market_place/get_district'); ?>",
            type: "post",
            data: {division_id: division_id},
            success: function (msg) {
//                                alert(msg);
                $('#district').html(msg);
            }

        });
    }

    function get_upazilla() {
        var district_id = $('#district').val();
//                     alert(district_id);

        $.ajax({
            url: "<?php echo site_url('market_place/get_upazilla'); ?>",
            type: "post",
            data: {district_id: district_id},
            success: function (msg) {
//                                alert(msg);
                $('#upazilla').html(msg);
            }

        });
    }
</script>


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

