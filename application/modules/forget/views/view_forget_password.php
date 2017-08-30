<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Registration/Login</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<style >
*, *:before, *:after {
  box-sizing: border-box;
}

html {
  overflow-y: scroll;
}

body {
  background: #c1bdba;
  font-family: 'Titillium Web', sans-serif;
}

a {
  text-decoration: none;
  color: #1ab188;
  -webkit-transition: .5s ease;
          transition: .5s ease;
}
a:hover {
  color: #179b77;
}

.form {
  background: rgba(19, 35, 47, 0.9);
  padding: 40px;
  max-width: 600px;
  margin: 40px auto;
  border-radius: 4px;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
}

.tab-group {
  list-style: none;
  padding: 0;
  margin: 0 0 40px 0;
}
.tab-group:after {
  content: "";
  display: table;
  clear: both;
}
.tab-group li a {
  display: block;
  text-decoration: none;
  padding: 15px;
  background: rgba(160, 179, 176, 0.25);
  color: #a0b3b0;
  font-size: 20px;
  float: left;
  width: 50%;
  text-align: center;
  cursor: pointer;
  -webkit-transition: .5s ease;
          transition: .5s ease;
}
.tab-group li a:hover {
  background: #179b77;
  color: #ffffff;
}
.tab-group .active a {
  background: #1ab188;
  color: #ffffff;
}

.tab-content > div:last-child {
  display: none;
}

h1 {
  text-align: center;
  color: #ffffff;
  font-weight: 300;
  margin: 0 0 16px;
}

label {
  position: absolute;
  -webkit-transform: translateY(6px);
      -ms-transform: translateY(6px);
          transform: translateY(6px);
  left: 13px;
  color: rgba(255, 255, 255, 0.5);
  -webkit-transition: all 0.25s ease;
          transition: all 0.25s ease;
  -webkit-backface-visibility: hidden;
  pointer-events: none;
  font-size: 22px;
}
label .req {
  margin: 2px;
  color: #1ab188;
}

label.active {
  -webkit-transform: translateY(50px);
      -ms-transform: translateY(50px);
          transform: translateY(50px);
  left: 2px;
  font-size: 14px;
}
label.active .req {
  opacity: 0;
}

label.highlight {
  color: #ffffff;
}

input, textarea,select {
  font-size: 22px;
  display: block;
  width: 100%;
  height: 100%;
  padding: 5px 10px;
  background: #24323D;
  background-image: none;
  border: 1px solid #a0b3b0;
  color: #ffffff;
  border-radius: 0;
  -webkit-transition: border-color .25s ease, box-shadow .25s ease;
          transition: border-color .25s ease, box-shadow .25s ease;
}
input:focus, textarea:focus,select:focus {
  outline: 0;
  border-color: #1ab188;
}

textarea {
  border: 2px solid #a0b3b0;
  resize: vertical;
}

.field-wrap {
  position: relative;
  margin-bottom: 40px;
}

.top-row:after {
  content: "";
  display: table;
  clear: both;
}
.top-row > div {
  float: left;
  width: 48%;
  margin-right: 4%;
}
#address>div{
width: 100%;
margin-bottom:4%;
}
.top-row > div:last-child {
  margin: 0;
}

.button {
  border: 0;
  outline: none;
  border-radius: 0;
  padding: 15px 0;
  font-size: 2rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .1em;
  background: #1ab188;
  color: #ffffff;
  -webkit-transition: all 0.5s ease;
          transition: all 0.5s ease;
  -webkit-appearance: none;
}
.button:hover, .button:focus {
  background: #179b77;
}

.button-block {
  display: block;
  width: 100%;
cursor: pointer;
}

.forgot {
  margin-top: -20px;
  text-align: right;
}


</style>




<body>
	<div class="form">
		 <div style="margin: 0px auto; width: 10%; text-align: center;">
			<a href="<?php echo base_url();?>">
			<img style="width:100%;" src="<?php echo base_url();?>uploads/logo.png"></a>
		</div>

		<div class="tab-content">

			<div id="login" class="active" style='display:block;'> 
     
      <div id="login_recovery">  
				<h1>Update Password</h1>
				<div style="color: rgb(241, 255, 24);padding:10px;text-align:center;">
                  <?php 
                   $tmp_email= $this->session->userdata('email');

                  if($message_error_password!=NULL)
                  {
                    echo $message_error_password; 
                  }
                  
                  ?>
                  </div>
                  <?php $email = $this->session->userdata('email');?>
      				<form action="<?php echo site_url('forget/update_password')?>" method="post">
      					<div class="field-wrap">
  
      						<input type="text" name="email" value="<?php echo $tmp_email?>" disabled=""  />
      					</div>
      					
      					<div class="field-wrap">
      						<label>Password(Min 6 char)<span class="req">*</span></label>
      						<input type="password" name="pas_wrd" required autocomplete="off"/>
      					</div>
      					
			                <div class="field-wrap">
			                  <label>Re-Type Password<span class="req">*</span></label>
			                  <input type="password" name="con_pas_wrd" required autocomplete="off"/>
			                </div>
			                
      					<input type="submit" name="update" class="button button-block" value="Update"/>        
      				</form>
       
        </div>

			</div>
		</div><!-- tab-content -->
	</div> <!-- /form -->




<script>
function recovery_password(){
  document.getElementById('recovery_password').style.display='block';
  document.getElementById('login_recovery').style.display='none';
}
function back_to_login(){
  document.getElementById('recovery_password').style.display='none';
  document.getElementById('login_recovery').style.display='block';
}
</script>


<script>
	document.getElementById('register').addEventListener('change', function () {
		if(this.value == 'seller')
		{
			document.getElementById('store_rem').required = true;
		}
		if(this.value == 'buyer')
		{
			 document.getElementById('adrss').required = true;
		}
		});


</script>

<script type="text/javascript">





$('.form').find('input, textarea, select').on('keyup blur focus change', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    }
 else if (e.type === 'change') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    }
	else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('active highlight');
			}
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});
</script>












</body>
</html>