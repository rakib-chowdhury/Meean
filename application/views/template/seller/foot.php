<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Meeean</span>
							Application &copy; <?=date('Y');?>
						</span>

						&nbsp; &nbsp;
						<!--<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>-->
					</div>
				</div>
			</div>
			
			
			
			          <!-- Modal -->
  <div class="modal fade" id="change_password" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Password</h4>
        </div>
        <form  onsubmit="return myFunction()" action="<?php echo base_url(); ?>market/change_password" method="post">
                <div class="modal-body">
                    <?php $cur_location = $_SERVER['REQUEST_URI']; ?>
                    <input type="hidden" name="redirect_url" value="<?= $cur_location; ?>">
                    <div class="form-group">
                        <label for="pwd">New Password</label>
                        <input type="password"  required class="form-control" id="pass1" name="pass_change">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Confirm Password</label>
                        <input type="password" required class="form-control" id="pass2" name="con_pass_change">
                    </div>
                    <label style="color:red" id="validate_status"></label>

                </div>
                <div class="modal-footer">
                    <button type="submit" style="float:left" class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
      </div>
      
    </div>
  </div>



 <script language="javascript" type="text/javascript">
function myFunction() {

    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    
 //alert(pass1);
    var ok = true;
    var Exp = /((^[0-9]+[a-z]+)|(^[a-z]+[0-9]+))+[0-9a-z]+$/i;

    if (pass1 != pass2)

    {
        //alert("Passwords Do not match");
        document.getElementById("password1").style.borderColor = "#E34234";
        document.getElementById("password2").style.borderColor = "#E34234";
        document.getElementById("validate_status").innerHTML='Passwords Not Matched';
        ok = false;
    }
    
    else if(pass1.length<6)
    {
       document.getElementById("validate_status").innerHTML='Minimum 6 characters needed';
        ok = false;
    }
    else if(!pass1.match(Exp))
    {
       document.getElementById("validate_status").innerHTML='Password must contains alpha numeric';
        ok = false;
    }
    else {
        //alert("Passwords Match!!!");
    }
    return ok;
}
  </script>

