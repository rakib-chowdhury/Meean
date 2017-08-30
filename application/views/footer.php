<!-- ============================================================= FOOTER ============================================================= -->

<?php 
   
            $this->db->select('*');
            $this->db->from('contact_us_image');
        
         $query = $this->db->get();
        $result = $query->result_array();
        
//        print_r($result);die();
?>


<footer id="footer" class="footer color-bg" style="padding-top:-10px">

    <!-- /.links-social -->

<!--    <div class="header_bottom">
        start
        
        <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
            
            <div data-thumb="raw/images/thumbs/road.jpg" data-src="raw/images/thumbs/road.jpg">
                <div class="camera_caption fadeFromBottom">
                    
                </div>
            </div>
            
        </div>
        
        end
        <div class="clear"></div>
    </div>-->
    
    
    <div class="header_bottom">
        <!--start-->
        <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">

            <div data-thumb="raw/images/thumbs/leaf.jpg" data-src="raw/images/thumbs/road.jpg">
                <div class="camera_caption">
                    <h2 style="text-align: center;margin-bottom: 50px;font-size: 19px">INFORMATION</h2>
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <div class="col-xs-12 col-sm-4">
                                    <h3>Contact Us</h3><hr style="width: 30px;left: 0;margin-left: 15px;border: 1px solid aliceblue;">
                                    <div id="contact_button">
                                          <a data-toggle="modal" data-target="#myModal" href="#" data-dropdown="drop7">
                                              <button style="border: 1px solid black;width: 125px; height: 135px; border-radius: 20px;color: #ecab12;text-align: center;">Click Here...</button>
                                          </a>
                                        </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <h3>About Us</h3><hr style="width: 30px;left: 0;margin-left: 15px;border: 1px solid aliceblue;">
                                          <p style="text-align: justify;font-size: 13px;margin-bottom: 10px;">Eeanstar.com is a website where you can buy and sell almost everything. 
                                            The best deals are often done with people who live in your own city or on your own street, so on Eeanstar.com it's easy to buy and sell locally. 
                                            All you have to do is select your region.</p>
                                        <a href="about_us" style="color: #d48908;font-size: 18px;">Read More...</a>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <h3>Membership</h3><hr style="width: 30px;left: 0;margin-left: 15px;border: 1px solid aliceblue;">
                                    <p style="text-align: justify; font-size: 13px;margin-bottom: 10px">Eeanstar.com is a website where you can buy and sell almost everything. 
                                        The best deals are often done with people who live in your own city or on your own street, </p>
                                    <a href="support" style="color: #d48908;font-size: 18px;">Read More...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div data-thumb="raw/images/thumbs/leaf.jpg" data-src="raw/images/thumbs/road.jpg">
                <div class="camera_caption">
                    <h2 style="text-align: center;margin-bottom: 50px;font-size: 19px">INFORMATION</h2>
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <div class="col-xs-12 col-sm-4">
                                    <h3>We Are Hiring</h3><hr style="width: 30px;left: 0;margin-left: 15px;border: 1px solid aliceblue;">
                                          <p style="text-align: justify;font-size: 13px;margin-bottom: 10px;">This is our hiring process term</p>
                                        <a href="we_are_hiring" style="color: #d48908;font-size: 18px;">Read More...</a>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <h3>Terms & Condition</h3><hr style="width: 30px;left: 0;margin-left: 15px;border: 1px solid aliceblue;">
                                          <p style="text-align: justify;font-size: 13px;margin-bottom: 10px;">This is our terms & condition page. See our terms & condition</p>
                                        <a href="terms" style="color: #d48908;font-size: 18px;">Read More...</a>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <h3>Privacy Policy</h3><hr style="width: 30px;left: 0;margin-left: 15px;border: 1px solid aliceblue;">
                                    <p style="text-align: justify; font-size: 13px;margin-bottom: 10px">Eeanstar.com is a website where you can buy and sell almost everything. 
                                        The best deals are often done with people who live in your own city or on your own street, </p>
                                    <a href="service" style="color: #d48908;font-size: 18px;">Read More...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

<!--            <div data-thumb="raw/images/thumbs/leaf.jpg" data-src="raw/images/thumbs/road.jpg">
                <div class="camera_caption">
                    <h2 style="text-align: center;margin-bottom: 50px;font-size: 19px">INFORMATION</h2>
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <div class="col-xs-12 col-sm-4">
                                    <h3>Contact Us</h3><hr style="width: 30px;left: 0;margin-left: 15px;border: 1px solid aliceblue;">
                                    <div id="contact_button">
                                          <a data-toggle="modal" data-target="#myModal" href="#" data-dropdown="drop7">
                                              <button style="border: 1px solid black;width: 125px; height: 135px; border-radius: 20px;color: #ecab12;text-align: center;">Click Here...</button>
                                          </a>
                                        </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <h3>About Us</h3><hr style="width: 30px;left: 0;margin-left: 15px;border: 1px solid aliceblue;">
                                          <p style="text-align: justify;font-size: 13px;margin-bottom: 10px;">Eeanstar.com is a website where you can buy and sell almost everything. 
                                            The best deals are often done with people who live in your own city or on your own street, so on Eeanstar.com it's easy to buy and sell locally. 
                                            All you have to do is select your region.</p>
                                        <a href="about_us" style="color: #d48908;font-size: 18px;">Read More...</a>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <h3>Membership</h3><hr style="width: 30px;left: 0;margin-left: 15px;border: 1px solid aliceblue;">
                                    <p style="text-align: justify; font-size: 13px;margin-bottom: 10px">Eeanstar.com is a website where you can buy and sell almost everything. 
                                        The best deals are often done with people who live in your own city or on your own street, </p>
                                    <a href="membership" style="color: #d48908;font-size: 18px;">Read More...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>-->

        </div>



        <!--end-->
    </div>

    <div class="copyright-bar">
        <!--            <div class="container">
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
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-3">
                    <div class="page-footer wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                      <h1 style="margin-top: 20px">
                        Important Links
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
                      </ul>
                    </div>
                  </div>
                  
                  <div class="col-lg-3 col-sm-3">
                    <div class="page-footer wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                      <h1 style="margin-top: 20px">
                        Important Links
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
                      </ul>
                    </div>
                  </div>
                  
                
              </div>
                            </div>-->
        <div id="end_footer" style="width: 100%;background-color: #032F3E;height: auto;">
            <div class="container">
                <div class="col-xs-12 col-sm-12 no-padding">
                    <div class="copyright col-sm-6 col-xs-12">
                        Copyright © <?= date('Y') ?>
                        <a href="" style="color: #f5971d;">EEANSTAR</a>
                        - All rights Reserved
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12 address wow fadeInUp clearfix payment-methods" data-wow-duration="2s" data-wow-delay=".1s">

                        <address style="margin-top: 0px;padding-top: 0px !important;">
                            <ul>
                                <li><a href="https://www.facebook.com/eeanstar"><img src="raw/images/payments/facebook-512.png" alt=""></a></li>
                                <li><a href="https://twitter.com/eeanstar"><img src="raw/images/payments/twitter-xxl.png" alt=""></a></li>
                                <li><a href="https://www.instagram.com/eeanstar"><img src="raw/images/payments/google_plus.png" alt=""></a></li>
                                <li><a href="https://www.instagram.com/eeanstar"><img src="raw/images/payments/rss-xxl.png" alt=""></a></li>
                            </ul>
                        </address>
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
<!--                    <div class="col-xs-12"><h3 style="font-size: 23px;">Eeanstar.com</h3></div>
                    <div class="col-xs-12"><p style="font-size: 17px;"><?php echo $result[0]['contact_us_text']?></p></div>
                    <img src="<?php echo base_url().$result[0]['contact_us_image']?>" style="width: 50px;height: 50px"> &nbsp &nbsp Call us &nbsp &nbsp  <?php echo $result[0]['contact_us_phone']?>   -->
                        
                    
                    <p style="font-size:20px;padding-right:310px;">Eeanstar.com</p><br>
                    <p style="font-size: 15px;text-align: justify;padding-left:40px;"><?php echo $result[0]['contact_us_text']?></p>
                    <p style="font-size:20px;padding-right:260px;padding-top:20px;"><img src="<?php echo base_url().$result[0]['contact_us_image']?>" style="width: 100px;height: 100px"> &nbsp &nbsp Call us &nbsp &nbsp  <?php echo $result[0]['contact_us_phone']?></p>
                </section>
            </div>
        </div>
    </div>
</div>


<!--Modal Effect-->
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