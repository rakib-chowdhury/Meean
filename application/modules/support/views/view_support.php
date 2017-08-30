<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            
            <div class="col-sm-12 col-md-12">
                <div class="page-header">
                </div>
                <div class="jumbotron">
                    <h2 style="font-size: 25px;text-align: center;margin-bottom: 30px;color: rgb(65, 94, 155);">Welcome To Eeanstar</h2>
                    <p style="font-size: 18px;text-align: justify">Here You can know about us. How to use it how to stay safe and get in touch with us</p>
                </div>

            </div>
            <div class="col-xs-12 col-sm-3">
                <ul class="list-unstyled footer_list">
                    <li>
                        <a href="about_us">About Us  </a><i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a class="active" href="support"><strong>Membership</strong></a> <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="service">Privacy Policy </a><i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="terms">Terms & Condition </a><i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="we_are_hiring">We are hiring </a><i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="sell_first">How to Sell First</a><i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="promote_ad">Promote Your Ad</a><i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="stay_safe">Stay safe on meeean.com</a><i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#myModal" href="#" data-dropdown="drop7">Contact Us </a> <i class="fa fa-angle-right"></i>
                    </li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-9">
                <section id="description">
                    <h2><?=$member_info->description;?> </h2>
                </section>
            </div>
        </div>
    </div>
</div>


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
<!--                                        <div class="form-group">
                                            <label for="phone">Address:</label>
                                            <textarea name="address" rows="2" cols="580" class="form-control" style="resize: none"></textarea>
                                        </div>-->

                                        <div class="form-group">
                                            <label for="company">Subject</label>
                                            <input type="text" name="subject" class="form-control" placeholder="Enter Title">
                                        </div>

                                        <div class="form-group">
                                            <label for="company">Description</label>
                                            <input type="text" name="description" class="form-control" id="company" placeholder="Enter Description">
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
                                    <section id="description">
                    <p style="font-size:20px;padding-right:310px;">Eeanstar.com</p><br>
                    <p style="font-size: 15px;text-align: justify;padding-left:40px;""><?=$contact_info['contact_us_text']?></p>
                    <p style="font-size:20px;padding-right:260px;padding-top:20px;"><image src="<?=$contact_info['contact_us_image']?>"> &nbsp &nbsp Call us &nbsp &nbsp  <?=$contact_info['contact_us_phone']?></p>
                </section>
                                </div>
                            </div>
                         </div>
                    </div>


<!--Modal Effect-->