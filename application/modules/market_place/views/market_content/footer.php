<!-- ============================================================= FOOTER ============================================================= -->


<footer id="footer" class="footer color-bg" style="padding-top:-10px">

    <!-- /.links-social -->


    <div class="copyright-bar" style="background-image: none">
        <div class="container">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-3 col-sm-3">
                        <div class="page-footer wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                            <h3 style="font-size:30px">
                                Information
                            </h3>
                            <ul class="page-footer-list" style="padding-left:35px;margin-top: 7px">

                                <li>
                                    <i class="fa fa-angle-right"></i>
                                    <a href="about_us">About us</a>
                                </li>
                                <li>
                                    <i class="fa fa-angle-right"></i>
                                    <a data-toggle="modal" data-target="#myModal" href="#" data-dropdown="drop7">Contact Us</a>
                                </li>
                                <li>
                                    <i class="fa fa-angle-right"></i>
                                    <a href="sell_first">How to Sell First</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3">
                        <div class="page-footer wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                            <h1 style="margin-top: 20px">
                                <!--Important Links-->
                            </h1>
                            <ul class="page-footer-list" style="padding-left:35px;">


                                <li>
                                    <i class="fa fa-angle-right"></i>
                                    <a href="terms">Term & condition</a>
                                </li>
                                <li>
                                    <i class="fa fa-angle-right"></i>
                                    <a href="service">Privacy policy</a>
                                </li>
                                <li>
                                    <i class="fa fa-angle-right"></i>
                                    <a href="promote_ad">Promote Your Ad</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-3">
                        <div class="page-footer wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                            <h1 style="margin-top: 20px">
                                <!-- Important Links-->
                            </h1>
                            <ul class="page-footer-list" style="padding-left:35px;">

                                <li>
                                    <i class="fa fa-angle-right"></i>
                                    <a href="support">Membership</a>
                                </li>
                                <li>
                                    <i class="fa fa-angle-right"></i>
                                    <a href="we_are_hiring">We are Hiring</a>
                                </li>
                                <li>
                                    <i class="fa fa-angle-right"></i>
                                    <a href="stay_safe">Saty Safe on meeean.com</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 address wow fadeInUp clearfix payment-methods" data-wow-duration="2s" data-wow-delay=".1s">
                        <?php 
                            $this->db->select('*');
                            $this->db->from('social_link');
                            
                            $query = $this->db->get();
                            $result = $query->result_array();
//                            print_r($result);
                        ?>
                        <address style="margin-top: 20px">
                            <ul>
                                <li>
                                    <a href="<?php if($result[0]['fb_link']){echo $result[0]['fb_link'];}?>">
                                        <img src="raw/images/payments/facebook.png" alt="facebook" style="width: 45px;height: 45px;">
                                    </a>
                                    
                                </li>
                                <li>
                                    <a href="<?php if($result[0]['tweet_link']){echo $result[0]['tweet_link'];}?>">
                                        <img src="raw/images/payments/twitter.png" alt="twitter" style="width: 45px;height: 45px;">
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php if($result[0]['google_plus_link']){echo $result[0]['google_plus_link'];}?>">
                                        <img src="raw/images/payments/google.png" alt="Google+" style="width: 45px;height: 45px;">
                                    </a>
                                    
                                </li>
                                <!--                    <li>
                                                        <img src="raw/images/payments/linkedin.png" alt="linkedin" style="width: 28px;height: 28px;">
                                                    </li>
                                                    <li>
                                                        <img src="raw/images/payments/youtube.png" alt="youtube" style="width: 28px;height: 28px;">
                                                    </li>-->
                            </ul>
                        </address>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- <div class="col-md-12">
                    <div class="col-md-4" style="background-color:white;">
                            
                    </div>
                    <div class="col-md-4" style="background-color:blue;">
                            
                    </div>

                    <div class="col-md-4" style="background-color:green;">
                            
                    </div>
            </div> -->
            <div class="col-xs-12 col-sm-6 no-padding">
                <div class="copyright">
                    Copyright © <?= date('Y') ?>
                    <a href="">MEEEAN</a>
                    - All rights Reserved
                </div>
            </div>
            <!-- <div class="col-xs-12 col-sm-6 no-padding">
                 <div class="clearfix payment-methods">
                     <ul>
                         <li><img src="raw/images/payments/1.png" alt=""></li>
                         <li><img src="raw/images/payments/2.png" alt=""></li>
                         <li><img src="raw/images/payments/3.png" alt=""></li>
                         <li><img src="raw/images/payments/4.png" alt=""></li>
                         <li><img src="raw/images/payments/5.png" alt=""></li>
                     </ul>
                 </div> /.payment-methods -->
        </div>
    </div>
</div>
</footer>


<!--Modal Effect-->


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Contact Us</h4>
            </div>
            <div class="modal-body">

                <form role="form" method="post" action="<?php echo base_url(); ?>market_place/contact_us">

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter full name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email_address" class="form-control" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone No:</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone no">
                    </div>

                    <div class="form-group">
                        <label for="company">Subject</label>
                        <input type="text" name="subject" class="form-control" placeholder="Enter Title">
                    </div>

                    <div class="form-group">
                        <label for="company">Description</label>
                        <input type="text" name="description" class="form-control" id="company" placeholder="Enter Descriptions">
                    </div>

                    <!--                                        <div class="form-group">
                                                                <label for="company">Company / Organization name</label>
                                                                <input type="text" name="company_name" class="form-control" placeholder="Enter Organization Name">
                                                            </div>-->

                    <button type="submit" name="btn" class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </form>


            </div>
            <div class="modal-footer">
                <section id="description" style="height: 175px">
                    <p style="font-size:20px;padding-right:350px;">meeean.com</p><br>
                    <p style="text-align: left"><?=$contact_info['contact_us_text']?></p>
                    <p style="font-size:20px;padding-right:260px;padding-top:20px;"></p>
                    <div class="col-xs-3">
                      <image src="<?=$contact_info['contact_us_image']?>"> 
                    </div>
                    <div class="col-xs-5">
                      <p style="text-align: left;">Call us</p> <p style="text-align: left;"><?=$contact_info['contact_us_phone']?></p>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>


<!--Modal Effect-->
<!-- ============================================================= FOOTER : END============================================================= -->


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


<!--Modal Effect-->


<!--<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

         Modal content
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Contact Us</h4>
            </div>
            <div class="modal-body">

                <form role="form" method="post" action="<?php echo base_url(); ?>home/contact_us">

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter full name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email_address" class="form-control" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone No:</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone no">
                    </div>

                    <div class="form-group">
                        <label for="company">Subject</label>
                        <input type="text" name="subject" class="form-control" placeholder="Enter Title">
                    </div>

                    <div class="form-group">
                        <label for="company">Description</label>
                        <input type="text" name="description" class="form-control" id="company" placeholder="Enter Descriptions">
                    </div>

                    <div class="form-group">
                        <label for="company">Company / Organization name</label>
                        <input type="text" name="company_name" class="form-control" placeholder="Enter Organization Name">
                    </div>

                    <button type="submit" name="btn" class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </form>


            </div>
            <div class="modal-footer">
                <section class="col-xs-12" id="section">
                    <div class="col-xs-12"><h3 style="font-size: 23px;">Eeanstar.com</h3></div>
                    <div class="col-xs-12"><p style="font-size: 17px;"><?php echo $result[0]['contact_us_text'] ?></p></div>
                    <img src="<?php echo base_url() . $result[0]['contact_us_image'] ?>" style="width: 50px;height: 50px"> &nbsp &nbsp Call us &nbsp &nbsp  <?php echo $result[0]['contact_us_phone'] ?>   
                        
                    
                    <p style="font-size:20px;padding-right:310px;">Eeanstar.com</p><br>
                    <p style="font-size: 15px;text-align: justify;padding-left:40px;"><?php echo $result[0]['contact_us_text'] ?></p>
                    <p style="font-size:20px;padding-right:260px;padding-top:20px;"><img src="<?php echo base_url() . $result[0]['contact_us_image'] ?>" style="width: 100px;height: 100px"> &nbsp &nbsp Call us &nbsp &nbsp  <?php echo $result[0]['contact_us_phone'] ?></p>
                </section>
            </div>
        </div>
    </div>
</div>-->


<!--Modal Effect-->

<div class="modal fade" id="my_modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Log in to proceed next step</h4>
            </div>
            <div class="modal-body">
                <p>You are not authorized for "Post Add".<br>Please Login as <i>Market Place</i> user. </p>
            </div>
            <div class="modal-footer">
                <center><a href="market_place/post_add">
                        <button type="button" class="btn btn-success" value="login">Login</button></a>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                </center>

            </div>
        </div>

    </div>
</div>

<!-- ============================================================= FOOTER : END============================================================= -->


<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->



<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="raw/js/jquery-1.11.1.min.js"></script>

<script src="raw/js/bootstrap.min.js"></script>

<script src="raw/js/bootstrap-hover-dropdown.min.js"></script>
<script src="raw/js/owl.carousel.min.js"></script>

<script src="raw/js/echo.min.js"></script>
<script src="raw/js/jquery.easing-1.3.min.js"></script>
<script src="raw/js/bootstrap-slider.min.js"></script>
<script src="raw/js/jquery.rateit.min.js"></script>
<script type="text/javascript" src="raw/js/lightbox.min.js"></script>
<script src="raw/js/bootstrap-select.min.js"></script>
<script src="raw/js/wow.min.js"></script>
<script src="raw/js/scripts.js"></script>

<script src="public_assets/js/jquery.min.js" type="text/javascript"></script>
<script src="public_assets/js/jquery.mobile.customized.min.js" type="text/javascript"></script>
<script src="public_assets/js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="public_assets/js/camera.min.js" type="text/javascript"></script>


<!--<script src="raw/js/jquery-ui.js"></script>-->
<script type = "text/javascript" >
    $(function () {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 500,
            values: [100, 300],
            slide: function (event, ui) {
                $("#amount").html("$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]);
                $("#amount1").val(ui.values[ 0 ]);
                $("#amount2").val(ui.values[ 1 ]);
            }
        });
        $("#amount").html("$" + $("#slider-range").slider("values", 0) +
                " - $" + $("#slider-range").slider("values", 1));
    });
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
        for (var a = b.length - 1; a > - 1; a--)
            b[a].style.display = "none"
    }
</script>


<script>
    jQuery(function () {

        jQuery('#camera_wrap_1').camera({
            thumbnails: true
        });

        jQuery('#camera_wrap_2').camera({
            height: '400px',
            loader: 'bar',
            pagination: false,
            thumbnails: true
        });
    });
</script>

<!-- For demo purposes – can be removed on production -->

<script src="raw/switchstylesheet/switchstylesheet.js"></script>

<!--<script src="public_assets/js/jquery.min.js" type="text/javascript"></script>
<script src="public_assets/js/jquery.mobile.customized.min.js" type="text/javascript"></script>
<script src="public_assets/js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="public_assets/js/camera.min.js" type="text/javascript"></script>


<script>
    jQuery(function () {

        jQuery('#camera_wrap_1').camera({
            thumbnails: true
        });

        jQuery('#camera_wrap_2').camera({
            height: '400px',
            loader: 'bar',
            pagination: false,
            thumbnails: true
        });
    });
</script>-->

<script>

    $(document).on("click", "#ok_btn", function () {

        $("#my_modal").modal('toggle');
        if ($("#modal_url").attr('href')) {

            redirectTo($("#modal_url").attr('href'));
        }
    });

    function redirectTo(url) {
        location.href = url;
    }


</script>

<!--For Market Place Slider-->

<script src="raw/js/jquery.wmuSlider.js"></script> 
<script>
    $('.example1').wmuSlider();
</script>

<!--End Market Place Slider-->

<script>
    $(document).ready(function () {
        $(".changecolor").switchstylesheet({seperator: "color"});
        $('.show-theme-options').click(function () {
            $(this).parent().toggleClass('open');
            return false;
        });
    });

    $(window).bind("load", function () {
        $('.show-theme-options').delay(2000).trigger('click');
    });
</script>
<!-- For demo purposes – can be removed on production : End -->

<script type="text/javascript" src="raw/js/jquery.picZoomer.js"></script>
<script type="text/javascript">
    $(function () {
        $('.picZoomer').picZoomer();
        $('.piclist li').on('click', function (event) {
            var $pic = $(this).find('img');
            $('.picZoomer-pic').attr('src', $pic.attr('src'));
        });
    });
</script>

<script>

    function send_mail_to_company()
    {
        var subject = $('#subject').val();
        var mail_message = $('#mail_message').val();
        var mail_code = $('#mail_code').val();


        $.ajax({
            url: "company/contact_with_company",
            type: "post",
            data: {subject: subject, mail_message: mail_message, mail_code: mail_code},
            success: function (msg) {

                // $('#sub_category').html(msg);

                if (msg == '0')
                {
//alert("0");
                    $("#modal_header").html('Error');
                    $("#modal_msg").html('Your mail <i>security code</i> does not match');
                    $("#modal_url").removeAttr('href');

                    $("#my_modal").modal();


                }
                if (msg == '1')
                {
//alert("01");
                    $("#modal_header").html('Success');
                    $("#modal_msg").html('Your mail successfully send');

                    $("#modal_url").prop('href', 'company');

                    $("#my_modal").modal();



                    //window.reload();
                }
                if (msg == '2')
                {

                    //alert("2");
                    $("#modal_header").html('Unauthorized  Error');
                    $("#modal_msg").html('Please Login');

                    $("#modal_url").prop('href', 'login');

                    $("#my_modal").modal();


                    //window.location.href = 'http://eeanstar.com/login'; 

                }

            }

        });
    }

</script>





<div class="modal fade" id="my_modal" role="dialog">
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

</body>
</html>