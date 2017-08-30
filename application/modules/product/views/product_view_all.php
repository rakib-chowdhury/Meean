<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">     
            <div class="wow fadeInUp">
                <div class="info-boxes-inner">

                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div id="image_banner">
                        <?php foreach($advertise as $row){ if($row['post_name']=='product detail banner'){?>
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="info-box">
                                <a target="_blank" href="<?=$row['link'];?>"><img class="img-responsive" style="width:100%;height:150px" src="uploads/<?=$row['image'];?>" alt="Banner"></a>
                            </div>
                        </div>
                        <?php } } ?>
                        </div>
                    </div><!-- .col -->
                    <!-- /.row -->
                </div><!-- /.info-boxes-inner -->

            </div><!-- /.info-boxes --><br>
            <!-- ============================================== INFO BOXES : END ============================================== -->


        </div><!-- /.sidemenu-holder -->
        <!-- ============================================== SIDEBAR : END ============================================== -->

        <!-- ============================================== CONTENT ============================================== -->
        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
            <!-- ========================================== SECTION – HERO ========================================= -->
            
            <div id="hero">


                <?php if($product_by_sub_category){ 
                foreach ($product_by_sub_category as $row){ ?>
                 <h1 align="center" style="font-size: 28px;color: #415e9b; margin: 10px 0px">All Products</h1>
                <div class="col-md-12">
                        <a href="product/Product_detail/<?php echo $row->product_id?>">
                        <section id="all_product_description">
                            <div class="col-xs-12 col-sm-2 col-md-2" id="product_image">
                                <img style="height:100px;width:100px; margin-top:7px;" src="assets/product_images/<?=$row->product_image;?>">
                            </div>
                            
                            <div class="col-xs-12 col-sm-7 col-md-7" id="product_description">
                                
                                <h4><?php echo $row->product_name?></h4>
                                <div class="col-xs-2 col-sm-3"></div>
                                <table class="col-md-12 col-xs-8 col-sm-6">
                                    <tr>
                                        <td>Model: </td>
                                        <td><?php echo $row->product_model?></td>
                                    </tr>
                                    <tr>
                                        <td> Price: </td>
                                        <td><?php echo $row->product_price?></td>
                                    </tr>
                              <!--  <tr>
                                        <td>Supplying Ability: </td>
                                        <td>10000 Set / Month</td>
                                    </tr>
                                    <tr>
                                        <td>Payment Type: </td>
                                        <td>T/T, L/C</td>
                                    </tr>-->
                                    <tr>
                                        <td colspan="2" style="padding-top:15px;"><button type="button">View       
                                             details</button>
                                        </td>
                                    </tr>
                                </table>
                                                    
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3" style="padding-top:20px;">
                                <table class="col-xs-12 col-sm-12">
                                    <tr>
                                        <td><p style="font-size: 20px;font-family: sans-serif;color: #0d5492;text-align: center;"><?php echo ucfirst("$row->reg_company_name");?></p></td>
                                    </tr>
                                    <tr>
                                        <td><p style="padding-top:5px;text-align: center;"><?php echo ucfirst("$row->reg_address");?></p></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: 700"><img style="height:40px;width:40px; margin-top:0px;" src="uploads/country_flag/<?=$row->country_image;?>">
                                       <?php echo ucfirst("$row->country_name");?>
                                        </td>
                                    </tr>
                                </table>
                                
                                
                                
                            </div>
                        </section></a>
                    </div>
	</div>	
                <?php } }else{ ?>
                    <h1 align="center" style="font-size: 28px;color: #415e9b; margin: 10px 0px"><?php echo "No product available"; ?></h1>
                <?php }?>
            

            <div class="row">
                <div class="col-md-12 text-center">
                    <?php echo $pagination; ?>
                </div>
            </div>





        </div><!-- /.homebanner-holder -->
        <!-- ============================================== CONTENT : END ============================================== -->
        <div class="wow fadeInUp">
            <div class="info-boxes-inner" style="margin-top: 40px">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <?php foreach($advertise as $row){
                        if($row['post_name']=='product detail right (single position)'){?>
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="info-box">
                            <a target="_blank" href="<?=$row['link'];?>"><img class="img-responsive" style="width:100%;height:100%" src="uploads/<?=$row['image'];?>" alt="Banner"></a>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
            </div>
        </div>

    </div><!-- /.row -->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
</div><!-- /.container -->
<!-- /#top-banner-and-menu -->




<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends MX_Controller {


	function __construct() {
        parent::__construct();
        // $this->load->model('db_search');
        $this->load->library("session");
        $this->load->model('registration_model');

    }


	public function index()
	{
		$this->load->view('registration_all');
	}

	public function insert_member(){
		$data['name']=$this->input->post('name');
		$data['phone']=$this->input->post('phone');
		$data['email']=$this->input->post('email');
		$data['designation']=$this->input->post('designation');
		$reg_id=$this->registration_model->save_info($data);

		$password=md5($this->input->post('password'));
		$email=$this->input->post('email');
		$designation=$this->input->post('designation');

		$value= array(
			'email'=>$email,
			'password'=>$password,
			'designation'=>$designation,
			'admin_reg_id'=>$reg_id,
			'status'=>0
			);
		$this->registration_model->save_login_info($value);
		redirect('registration');
	}
}
