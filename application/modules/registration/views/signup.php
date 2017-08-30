<?php //include 'layouts/header.php';    ?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <form class="form-horizontal well registration-form" action="<?php echo site_url('registration/signup_post'); ?>" method="post">
            <fieldset>
                <center><legend style="margin: 0; padding: 3px 0;"><strong>সংগঠক নিবন্ধন ফরম</strong> </legend><hr style="padding:0; margin: 0; padding-bottom: 5px;"><p style="color:red; font-size: 13px">(সকল তথ্য সঠিকভাবে বাংলায় পূরণ করুন)</p></center>
                <div class="form-group">
                    <label for="user_name" class="col-md-3 control-label">সংগঠকের নাম</label>
                    <div class="col-md-8">
                        <input class="form-control" name="user_name" id="user_name" placeholder="সমবায় সংগঠকের নাম" type="text" required>
                        <span class="help-block" > সমবায় সংগঠকের নাম</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="user_nid" class="col-md-3 control-label">জাতীয় পরিচয়পত্র নং</label>
                    <div class="col-md-8">
                        <input  class="form-control" name="user_nid" id="user_nid"  minlength="13" maxlength="17" placeholder="সমবায় সংগঠকের ১৭ ডিজিটের জাতীয় পরিচয়পত্র নং" type="text" required>
                        <span class="help-block">আপনার জাতীয় পরিচয়পত্রের নাম্বার ১৩ ডিজিট হলে তার পূর্বে আপনার জন্মসাল লিখুন । </span>
                    </div>
                </div>
                <div class="form-group" >
                    <label for="user_phone" class="col-md-3 control-label">মোবাইল নাম্বার</label>
                    <div class="col-md-2">
                        <select name="country-code" id="" class="form-control">
                            <option value="+৮৮">+৮৮</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type='hidden' name='user_phone_eng' id='user_phone_eng' value=''>
                        <input onkeyup="check_phone()" onblur="check_phone()" type="text" name="user_phone" class="form-control" id="user_phone" placeholder="Mobile Number" minlength="11" maxlength="11" required>
                        <span style="color:red;" id="reg_pn_err">উপরোক্ত  ফোন নম্বর দ্বারা পূর্বে অনলাইন নিবন্ধন করা হয়েছে। অনুগ্রহ করে নতুন ফোন নম্বর দিন ।</span><span class="help-block">১১ ডিজিট এর ফোন নম্বর</span>
                    </div>
                </div><!-- /form-group -->
                <!--                <div class="form-group">
                                    <label for="user_phone" class="col-md-2 control-label">ফোন নাম্বার</label>
                                    <div class="col-md-10">
                                        <input onblur="check_phone()" class="form-control" name="user_phone" id="user_phone" placeholder="সমিতি প্রধানের ফোন নাম্বার" type="text" required>
                                        <span class="help-block">সমিতি প্রধানের ফোন নাম্বার</span>
                                    </div>
                                </div>-->

                <div class="form-group">
                    <label for="user_email" class="col-md-3 control-label">ই-মেইল (ঐচ্ছিক)</label>
                    <div class="col-md-8">
                        <input class="form-control" name="user_email" id="user_email" placeholder="E-mail address" type="email" >
                        <span class="help-block">সমবায় সংগঠকের ই-মেইল</span>
                        <p id="check_email_msg"></p>
                    </div>
                </div>
                <div class="checkbox">
                    <label class="col-md-6 col-md-offset-2">
                        <input type="checkbox" name="asd" value="1" id="chk_bx" required> উপরে প্রদত্ত সকল তথ্য সঠিক
                    </label>
                </div>
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-4">
                        <button id="submit" class="btn btn-success btn-raised btn-block" type="submit">সাবমিট করুন</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div><!-- /col12 -->
</div><!-- /row -->
<?php $this->load->view('public_layouts/footer'); ?>

<script>


    $(document).ready(function(){
        $('#reg_pn_err').hide();
        $('#submit').attr('disabled','disabled');
    });

    function check_email() {
        var tmp_email = $('#user_email').val();
        //alert(tmp_email);

        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('registration/check_email'); ?>',
            data: {
                email: tmp_email
            },
            success: function (data) {
                console.log(data);
                if (data == 0) {
                    document.getElementById('user_email').value = '';
                    //document.getElementById('check_email_msg').innerHTML = 'this email exists';
                    console.log('This email already exists..');
                }

            }
        });
    }
    function check_nid() {
        var tmp_nid = $('#user_nid').val();
        //alert(tmp_email);

        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('registration/check_nid'); ?>',
            data: {
                nid: tmp_nid
            },
            success: function (data) {
                console.log(data);
                if (data == 0) {
                    document.getElementById('user_nid').value = '';
                    console.log('This NID already exists..');
                }

            }
        });
    }
    function check_phone() {
        var tmp_phone_bn = $('#user_phone').val();
        console.log('bn '+tmp_phone_bn);

        var banToeng={'০': 0,'১': 1,'২': 2,'৩': 3,'৪': 4,'৫': 5,'৬': 6,'৭': 7,'৮': 8,'৯': 9};
        String.prototype.getbngToeng = function() {
            var retStr = this;
            for (var x in banToeng) {
                retStr = retStr.replace(new RegExp(x, 'g'), banToeng[x]);
            }
            return retStr;
        };

        var bng_number=''+tmp_phone_bn +'';
        var tmp_phone=bng_number.getbngToeng();


        console.log('en ' +tmp_phone);

        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('registration/check_phone'); ?>',
            data: {
                phone: tmp_phone
            },
            success: function (data) {
                console.log('data ' +data);
                if (data ==0) {
                    $('#reg_pn_err').hide();
                    document.getElementById('user_phone_eng').value =tmp_phone;
                    console.log('eng' +$('#user_phone_eng').val());
                    var asd=''+tmp_phone+'';
                    if(asd.length==11){
                        $('#submit').removeAttr('disabled');
                    }

                }else{
                    $('#submit').attr('disabled','disabled');
                    document.getElementById('user_phone').value = '';
                    $('#reg_pn_err').show();
                    $('#chk_bx').prop('checked',false);
                    console.log('This Phone Number already exists..');
                     

                }

            }
        });
    }
</script>