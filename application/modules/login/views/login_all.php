<base href="<?php echo base_url() ?>">


<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!doctype html>
<html>
    <head>
        <title> Login Form </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script> -->
        <!-- font files  -->
        <link href='//fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>
        <!-- /font files  -->
        <!-- css files -->
        <link href="raw/css/style.css" rel='stylesheet' type='text/css' media="all" />
        <!-- /css files -->
        <style>
            label.radio-inline {
                color: white;
                font-size: 19px;
            }
        </style>
    </head>
    <body >
        <div class="body-content outer-top-xs" id="top-banner-and-menu">
            <div class="container">
                <div class="row">
                    <h1 style="font-size:28px;text-align: center;color:#415E9B; margin-bottom:30px;font-weight: bolder;">Login and Registration Form</h1>
                    <h3 style=" text-align:center;color:#415E9B;background-color: #EEE; width: 80%;margin: 0px auto;">
                        <?php
                        $exc = $this->session->userdata('message');
                        if (!empty($exc)):
                            ?>  
                            <div class="col-lg-12" align="center">
                                <div class="alert alert-dismissable alert-success">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><?= $exc ?></strong> 
                                </div>
                            </div>
                            <?php $this->session->unset_userdata('message'); ?>
                        <?php endif; ?>



                    </h3>
                    <div class="log">
                        <div class="content1" style="background-color: white">
                            <div class="row">
                                <div class="form-top" style="background-color: white">
                                    <div class="form-top-left">
                                        <h2>Login to our site</h2>
                                        <p>Enter username and password to log on:</p>
                                    </div>
                                    <div class="form-top-right">
                                        <i class="fa fa-key"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-bottom" style="background-color: white">

                                <?php if (!empty($message)): ?>  
                                    <div class="col-lg-12" align="center">
                                        <div class="alert alert-dismissable alert-success">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <strong><?= $message ?></strong> 
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($message_error)): ?>  
                                    <div class="col-lg-12">
                                        <div class="alert alert-dismissable alert-danger">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <strong><?= $message_error ?></strong> 
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <form action="login/login_check" method="post">
                                    <div id="show_input" style="display: block">
                                        <input type="email" name="login_email" value="EMAIL" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                    this.value = 'EMAIL';
                                                }">
                                        <input type="password" name="password" value="PASSWORD" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                    this.value = 'PASSWORD';
                                                }">
                                    </div>

                                    <div class="button-row" id="show_button" style="display: block">
                                        <input type="submit" name="login"  class="sign-in" value="Sign In" style="font-size: 15px;">
                                        <input type="reset" class="forgot_password" value="Forgot Password" style="font-size: 15px;" onclick="showHiddenInput()">
                                        <div class="clear"></div>
                                    </div>


                                </form>
                                <form action="forget" method="post">
                                    <div id="hidden_input" style="display: none">
                                        <input type="email" name="f_email" placeholder="EMAIL">
                                    </div>

                                    <div class="button-row" id="hidden_button" style="display: none">
                                        <input type="submit" name="recovery_submit"  class="sign-in" value="Submit" style="font-size: 15px;">
                                        <input type="reset" class="reset" value="Back to Login" style="font-size: 15px;" onclick="showDisplayInput()">
                                        <div class="clear"></div>
                                    </div> 
                                </form>		

                            </div>
                        </div>
                        <div class="content2" style="background-color: white">

                            <div class="row">
                                <div class="form-top" style="background-color: white">
                                    <div class="form-top-left">
                                        <h2>Sign up now</h2>
                                        <p>Fill in the form below to get instant access:</p>
                                    </div>
                                    <div class="form-top-right">
                                        <i class="fa fa-pencil"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-bottom" style="background-color: white">
                                <span class="error_form" id="email_error_message" style="color:rgb(224, 16, 8);"></span>
                                <span id="empty_email_error_message" style="display: none;color:rgb(224, 16, 8);" >Please Enter Your Email</span>
                                <form name="myForm" onsubmit="return validateform() && checkemail(this.value)" method="post" action="login/registration" enctype="multipart/form-data">
                                    <div>
                                        <select  name="type" onchange="" id="type">
<!--                                            <option class="default">Select Your Type</option>-->
                                            <!--<option value="5" class="default">Trade</option>-->
                                            <option value="4" class="default" >Market Place</option>
                                        </select>
                                        <div id="hidden_select" style="display: none">
                                            <select name="type1">
                                                <option value="2">Buyer</option>
                                                <option value="3">Seller</option>
                                            </select>
                                        </div>
                                    </div>

                                    <input type="email" name="reg_email" placeholder="EMAIL" id="email"  onkeyup="checkemail(this.value);">

                                    <div id="hidden_input_type" style="display: none">
                                        <input type="text" required name="reg_first_name" placeholder="FIRST NAME" >
                                        <input type="text" required name="reg_last_name" placeholder="LAST NAME" >
                                      <!--  <input type="text" required name="login_username" placeholder="USERNAME"> -->
                                        <input type="password" required name="login_password" placeholder="PASSWORD">
                                        <input type="text" required name="reg_phone" placeholder="PHONE" id="phone">
                                        <select id="division" onchange="get_district()" name="division">
                                            <option value="0">Select Your Division</option>
                                            <?php foreach ($all_division as $row){?>
                                            <option value="<?php echo $row->location_id?>"><?php echo $row->location_name?></option>
                                            <?php }?>
                                        </select>
                                        
                                        <select name="district" id="district" style="" onchange="get_upazilla()">
                                                        
                                         </select>
                                        
                                        <select name="upazilla" id="upazilla" style="">
                                                        
                                         </select>
                                        <input required type="text" name="reg_address" placeholder="ADDRESS" id="address">
                                    </div>
                                    <input type="submit" class="register" value="Submit" name="sign_up" id="myBtn">
    <!--                                    <input type="text" name="reg_name" placeholder="NAME">
                                        <input type="text" name="login_username" placeholder="USERNAME">
                                        <input type="text" name="reg_phone" placeholder="PHONE" id="phone">
                                        <div id="hidden_input_type" style="display: block">
                                            <input type="text" name="reg_address" placeholder="ADDRESS" id="address">
                                            <input type="text" name="reg_city" placeholder="CITY" >
                                            <input type="text" name="reg_country" placeholder="Country">
                                        </div>
                                        
                                        <input type='file' name="profile_img" onchange="readURL(this);" />
                                        <img id="blah" src="#" alt="your image" />
                                        <input type="submit" class="register" value="Register" name="sign_up" >
                                    -->
                                </form>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>

        <script src="raw/js/jquery-1.11.1.min.js"></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="raw/js/bootstrap.min.js"></script>

        <script>
            $(document).ready(function(){
                var elem=$('#type').val();
                
                    if (elem == 4)
                        document.getElementById('hidden_input_type').style.display = "block";
                    else
                        document.getElementById('hidden_input_type').style.display = "none";



                    if (elem == 5)
                        document.getElementById('hidden_select').style.display = "block";
                    else
                        document.getElementById('hidden_select').style.display = "none";

            });
            function get_district()
            {
                     var division_id=$('#division').val();
//                     alert(division_id);

                     $.ajax({
                            url: "<?php echo site_url('login/get_district'); ?>",
                            type: "post",
                            data: {division_id:division_id},
                            success: function(msg) {
//                                alert(msg);
                        $('#district').html(msg);
                    }

                     });
            }
            
            function get_upazilla()
            {
                     var district_id=$('#district').val();
//                     alert(district_id);

                     $.ajax({
                            url: "<?php echo site_url('login/get_upazilla'); ?>",
                            type: "post",
                            data: {district_id:district_id},
                            success: function(msg) {
//                                alert(msg);
                        $('#upazilla').html(msg);
                    }

                     });
            }
        </script>
        
        <script>


                    function checkemail(email)
                    {
                        $.ajax({
                            url: "<?php echo site_url('login/email_check_reg'); ?>",
                            type: "post",
                            data: {email: email},
                            success: function (msg) {
                            console.log(email);
                                if (msg == 0)
                                {
                                    $("#email_error_message").html("Your email already registered");
                                    $("#email_error_message").show();
                                    document.getElementById("myBtn").disabled = true;
                                    //alert( "email existed");
                                }
                                else {
                                    $("#email_error_message").hide();
                                    document.getElementById("myBtn").disabled = false;
                                }

                            }
                        });

                    }



                    function showDiv(elem) {
                        if (elem.value == 4)
                            document.getElementById('hidden_input_type').style.display = "block";
                        else
                            document.getElementById('hidden_input_type').style.display = "none";
                    }

                    function showSelect(elem) {
                        if (elem.value == 5)
                            document.getElementById('hidden_select').style.display = "block";
                        else
                            document.getElementById('hidden_select').style.display = "none";
                    }

                    function showHiddenInput() {
                        document.getElementById('show_input').style.display = "none";
                        document.getElementById('show_button').style.display = "none";
                        document.getElementById('hidden_input').style.display = "block";
                        document.getElementById('hidden_button').style.display = "block";
                    }

                    function showDisplayInput() {
                        document.getElementById('show_input').style.display = "block";
                        document.getElementById('show_button').style.display = "block";
                        document.getElementById('hidden_input').style.display = "none";
                        document.getElementById('hidden_button').style.display = "none";
                    }

        </script>



        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah')
                                .attr('src', e.target.result)
                                .width(150)
                                .height(150);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
        <script>
            function validateform() {
                var email = document.myForm.reg_email.value;

                if (email === null || email === "") {
                    document.getElementById('empty_email_error_message').style.display = 'block';
                    return false;
                }

            }
        </script>

    </body>
</html>