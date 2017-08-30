<?php
$reg_email = $this->session->userdata('reg_email');
$type = $this->session->userdata('type');
?>


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
            
            .content2 input[type="text"] {
                width:35%;
            }
        </style>
    </head>
    <body >
        <div class="body-content outer-top-xs" id="top-banner-and-menu">
            <div class="container">
                <div class="row">
                    
                    <div class="log">
                        
                        <div class="content2" style="width:100%;">
                            <h2 style="font-size:28px;text-align: center;color:#415E9B; margin:15px;font-weight: bolder;">Sign Up Here</h2>

                            <span id="first_name_error_message" style="display: none">Please Enter Your First Name</span>
                            <span id="last_name_error_message" style="display: none">Please Enter Your Last Name</span>
                            <span id="password_error_message" style="display: none">Please Enter Your Password</span>
                            <span id="company_name_error_message" style="display: none">Please Enter Your Company Name</span>
                            <span id="city_error_message" style="display: none">Please Enter Your City</span>
                            <span id="country_error_message" style="display: none">Please Enter Your Country</span>
                            <span id="address_error_message" style="display: none">Please Enter Your Address</span>
                            <span id="business_phone_error_message" style="display: none">Please Enter Your Business Phone</span>
                            <span id="phone_error_message" style="display: none">Please Enter Your Phone</span>
                            <span id="industry_name_error_message" style="display: none">Please Enter Your Industry Name</span>

                            <form name="myForm" onsubmit="return validateform()" method="post" action="login/buyer_seller_reg" enctype="multipart/form-data">
                                
                                <input type="text" id="first_name" name="reg_first_name" placeholder="FIRST NAME">
                                <input type="text" name="reg_last_name" placeholder="LAST NAME">
                                <input type="hidden" name="reg_email" value="<?php echo $reg_email;?>">
                                <input type="hidden" name="type" value="<?php echo $type;?>">
                                
                                <input type="email" name="reg_email" value="<?php echo $reg_email;?>" style="width:35%;margin-top: 5%;">
                                <input type="password" name="login_password" placeholder="PASSWORD" style="width:35%;margin-top: 5%;">
                                <input type="text" name="reg_company_name" placeholder="COMPANY NAME">
                                <input type="text" name="reg_city" placeholder="CITY" id="city">
                                <select style=" padding: 9px;margin-top: 59px;width: 35%;" class="large-field" id="country2" name="reg_country">
                                    <option value="0"> --- Select Country --- </option>
                                    <?php foreach ($select_country as $row){?>
                                    <option value="<?php echo $row->country_id;?>"><?php echo $row->country_name?></option>
                                    <?php }?>
                                </select>
                                <input type="text" name="reg_address" placeholder="ADDRESS" id="address">
                                <input type="text" name="reg_company_phone" placeholder="BUSINESS PHONE" id="phone">
                                <input type="text" name="reg_phone" placeholder="MOBILE NUMBER" id="phone">
                                <!-- <select multiple="multiple" style=" padding: 9px;margin-top: 59px;margin-left: 0px;width: 35%;" class="large-field" id="country2" name="main_market">
                                    <option value=""> -- Select Main Market -- </option>
                                    <option value="tomatoes">America</option>
                                    <option value="mozarella">Asia</option>
                                    <option value="mushrooms">Europe</option>
                                    <option value="pepperoni">Middleeast</option>
                                    <option value="onions">Africa</option>
                                    <option value="onions">Occania</option>
                                    <option value="onions">Caribbea</option>
                                    <option value="onions">World Wide</option>
                                </select> -->
                                
                                <select style=" padding: 9px;margin-top:59px;margin-left:14.5%;width: 35%; float:left;" class="large-field" id="country2" name="bus_type">
                                    <option value=""> --- Select Business Type --- </option>
                                    <option value="trading_company">Trading company</option>
                                    <option value="importer">Importer</option>
                                    <option value="exporter">Exporter</option>
                                    <option value="business_service">Business Service</option>
                                    <option value="agents">Agents</option>
                                    <option value="association">Association</option>
                                    <option value="distribute/whole_seller">Distribute/Whole Seller</option>
                                    <option value="manufacture">Manufacture</option>
                                    <option value="other">Other</option>
                                </select>
                                
                                <select style=" padding: 9px;margin-top: 59px;margin-left: 4%;width: 35%;" class="dropdown large-field" id="country2" name="main_market">
                                    <option value=""> -- Select Main Market -- </option>
                                    <option value="tomatoes">America</option>
                                    <option value="mozarella">Asia</option>
                                    <option value="mushrooms">Europe</option>
                                    <option value="pepperoni">Middleeast</option>
                                    <option value="onions">Africa</option>
                                    <option value="onions">Occania</option>
                                    <option value="onions">Caribbea</option>
                                    <option value="onions">World Wide</option>
                                </select>
                                <input type="text" name="com_employee" placeholder="COMPANY EMPLOYEE">
                                <input type="text" name="com_establish" placeholder="COMPANY ESTABLISHED">
                                <input style="margin-left:14.5%;width: 35%; float:left;" type="text" name="website" placeholder="WEBSITE" id="phone">

                                <select name="industry_name" style=" padding: 9px;margin-top: 59px;margin-left: 4%;width: 35%;" class="large-field" id="country2" >
                                    <option value="0">Select Your Industry Type</option>
                                    <?php
                                    foreach ($select_category as $row){
                                    ?>
                                    <option value="<?php echo $row->cat_id?>"><?php echo $row->cat_name?></option>
                                    <?php }?>
                                </select>

                                <input type="submit" class="register" value="Submit" name="sign_up">
                            </form>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>

   
       <script>
            function validateform(){  
                    var first_name=document.getElementById('first_name').value;
                    var last_name=document.myForm.reg_last_name.value;
                    var password=document.myForm.login_password.value;
                    var company_name=document.myForm.reg_company_name.value;
                    var state=document.myForm.reg_city.value;
                    var country=document.myForm.reg_country.value;
                    var address=document.myForm.reg_address.value;
                    var company_phone=document.myForm.reg_company_phone.value;
                    var phone=document.myForm.reg_phone.value;
                    var industry_name=document.myForm.industry_name.value;
//      alert(industry_name);
      if (first_name === null || first_name === ""){  
         document.getElementById('first_name_error_message').style.display = 'block'; 
          return false; 
      }
      
      if (last_name === null || last_name === ""){  
         document.getElementById('last_name_error_message').style.display = 'block'; 
          return false; 
      }
      
      
       if (password === null || password === ""){  
         document.getElementById('password_error_message').style.display = 'block';  
         return false; 
      } 
      
      if (company_name === null || company_name === ""){  
         document.getElementById('company_name_error_message').style.display = 'block';  
         return false; 
      } 
      
         if (state === null || state === ""){  
         document.getElementById('city_error_message').style.display = 'block';  
         return false; 
      } 
      
      if (country === null || country === 0){  
         document.getElementById('country_error_message').style.display = 'block';  
         return false; 
      } 
     
             
      if (address === null || address === ""){  
         document.getElementById('address_error_message').style.display = 'block';  
         return false; 
      } 
              
      if (company_phone === null || company_phone === ""){  
         document.getElementById('business_phone_error_message').style.display = 'block';  
         return false; 
      } 
              
      if (phone === null || phone === ""){  
         document.getElementById('phone_error_message').style.display = 'block';  
         return false; 
      } 
      
      if (industry_name === null || industry_name === 0){  
         document.getElementById('industry_name_error_message').style.display = 'block';  
         return false; 
      } 
      
}
        </script>

   
        
        <script>
            function showDiv(elem){
   if(elem.value == 3)
      document.getElementById('hidden_input_type').style.display = "block";
  else
      document.getElementById('hidden_input_type').style.display = "none";
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
    </body>
</html>