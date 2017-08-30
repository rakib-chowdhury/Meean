<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Market extends MX_Controller {

    //public $counter=0;
    function __construct() {
        parent::__construct();
        $login_email = $this->session->userdata('login_email');
        $type = $this->session->userdata('type');
        $reg_id = $this->session->userdata('reg_id');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('inflector');
        $this->load->library('image_lib');
        $this->load->library('form_validation');

        if ($login_email == NULL || $reg_id == NULL || $type == NULL || $type == "" || $type == 1 || $type == 3 || $type == 2 || $login_email == "") {
            $this->session->unset_userdata('login_email');
            $this->session->unset_userdata('type');
            $this->session->unset_userdata('logged_in');
            $m_data['message'] = 'Enter your valid Email and password first';
            $this->session->set_userdata($m_data);
            redirect('login', 'refresh');
        }
        // $this->load->model('db_search');
        $this->load->library("session");
        $this->load->model('market_model');
        $this->load->model('login/login_model');
        $this->load->helper('text');
    }

    public function index() {        
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['about_info'] = $this->db->get('about')->row();
        $reg_id = $this->session->userdata('reg_id');
        $data['product_info_all'] = $this->market_model->get_all_market_product($reg_id);
        $count_num = count($data['product_info_all']);
        if ($count_num <= 0) {
            $data['get_user_data'] = $this->market_model->get_user_data($reg_id);
            //$this->load->view('template/seller/headerlink');
            //$this->load->view('template/seller/head',$data);
            //$this->load->view('template/seller/leftnav');
            $data['category'] = $this->market_model->get_all_category();
            $data['location'] = $this->market_model->get_all_location();
            $this->load->view('market_add', $data);
            $this->load->view('template/seller/foot');
            //$this->load->view('template/seller/footerlink');
        } else {

            $data['get_user_data'] = $this->market_model->get_user_data($reg_id);
            $data['members_info'] = $this->market_model->get_members_info_by_reg_id($reg_id);
            $data['all_product_info'] = $this->market_model->get_all_market_product($reg_id);
            //$this->load->view('template/seller/headerlink');
            //$this->load->view('template/seller/head',$data);
            //$this->load->view('template/seller/leftnav');
            $data['msg'] = $this->session->flashdata('flashmsg');
            //echo '<pre>';print_r($msg);die();

            //print_r($data['members_info']);die();
            $this->load->view('market_all', $data);
            $this->load->view('template/seller/foot');


//         $this->load->helper('text');
//         $data['about_info']=$this->db->get('about')->row();
//	   $reg_id = $this->session->userdata('reg_id');
//	   $data['get_user_data']=$this->market_model->get_user_data($reg_id);
//	   $u_name = $data['get_user_data'][0]['reg_first_name'] . " " . $data['get_user_data'][0]['reg_last_name']; ////iti
//           $this->session->set_userdata('username', $u_name);   ////iti
//	   $this->load->view('template/seller/headerlink');
//	   $this->load->view('template/seller/head',$data);
//	   //$this->load->view('template/seller/leftnav');
//	   $this->load->view('user_all',$data);
//	   $this->load->view('template/seller/foot');
//	   $this->load->view('template/seller/footerlink');
        }
    }
    
    
    public function change_information() {
        $reg_id = $this->input->post('reg_id');
        
        $data['reg_first_name'] = $this->input->post('reg_first_name');
        $data['reg_last_name'] = $this->input->post('reg_last_name');
        $data['reg_company_name'] = $this->input->post('reg_company_name');
        $data['reg_company_phone'] = $this->input->post('reg_company_phone');
        $data['reg_phone'] = $this->input->post('reg_phone');
        $data['reg_address'] = $this->input->post('reg_address');
        $data['industry_name'] = $this->input->post('industry_name');
        $data['com_employee'] = $this->input->post('com_employee');
        $data['com_establish'] = $this->input->post('com_establish');
        $data['website'] = $this->input->post('website');
//        print_r($data);die();
        $this->market_model->update_profile_info($data,$reg_id);
        
        redirect('market');
    }
    

    public function add_category() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->helper('text');
        $data['about_info'] = $this->db->get('about')->row();
        $data['message'] = $this->session->flashdata('message');
        $data['message_error'] = $this->session->flashdata('message_error');
        $data['all_cat_info'] = $this->db->get('category')->result();
        //$this->load->view('template/seller/headerlink');
        //$this->load->view('template/seller/head');
        //$this->load->view('template/seller/leftnav');
        $this->load->view('category', $data);
        $this->load->view('template/seller/foot');
        $this->load->view('template/seller/footerlink');
    }

    public function select_div() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $div_id = $this->input->post('div_id');
        $dist_name = $this->market_model->get_district($div_id);
        // print_r($dist_name);
        echo '<option value="0" >Select District</option>';
        foreach ($dist_name as $row) {
            echo '<option value="' . $row['dist_id'] . '">' . $row['en_dist_name'] . '</option>';
        }
    }
    
     public function get_upazilla() {
        $district_id = $this->input->post('district_id');
//        echo $district_id;die();
//        $reg_id = $this->input->post('reg_id');
        $all_upazilla = $this->login_model->get_upazilla_by_dist_id($district_id);
        
//        print_r($all_district);die();
        echo '<option value="0" >Select Your Upazilla</option>';
       foreach ($all_upazilla as $row) 
       {
            echo '<option value="'.$row['upz_id'].'">'.$row['en_upz_name'].'</option>';
       }
    }

    public function insert_category() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->helper('text');
        $data['about_info'] = $this->db->get('about')->row();
        $data['cat_name'] = $this->input->post('cat_name');
        $this->db->insert('category', $data);
        $this->session->set_flashdata('message', 'Your Category was successfully inserted');
        redirect('admin/category');
    }

    public function insert_sub_category() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->helper('text');
        $data['about_info'] = $this->db->get('about')->row();
        $data['cat_id'] = $this->input->post('cat_id');
        $data['sub_cat_name'] = $this->input->post('sub_cat_name');
        $this->db->insert('sub_category', $data);
        $this->session->set_flashdata('message', 'Your Sub-Category was successfully inserted');
        redirect('admin/category');
    }

    public function all_product() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->helper('text');
        $data['about_info'] = $this->db->get('about')->row();
        $reg_id = $this->session->userdata('reg_id');
        $data['get_user_data'] = $this->market_model->get_user_data($reg_id);
        $data['all_product_info'] = $this->market_model->get_all_product($reg_id);
        //$this->load->view('template/seller/headerlink');
        //$this->load->view('template/seller/head',$data);
        //$this->load->view('template/seller/leftnav');
        $this->load->view('product_all', $data);
        $this->load->view('template/seller/foot');
    }

    public function all_market_product() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->helper('text');
        $data['about_info'] = $this->db->get('about')->row();
        $reg_id = $this->session->userdata('reg_id');
        $data['members_info'] = $this->market_model->get_members_info_by_reg_id($reg_id);
        $data['get_user_data'] = $this->market_model->get_user_data($reg_id);
        $data['all_product_info'] = $this->market_model->get_all_market_product($reg_id);
        $this->load->view('market_all', $data);
        $this->load->view('template/seller/foot');
    }

    public function add_product() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->helper('text');
        $data['about_info'] = $this->db->get('about')->row();
        $reg_id = $this->session->userdata('reg_id');
        $data['get_user_data'] = $this->market_model->get_user_data($reg_id);
        //$this->load->view('template/seller/headerlink');
        //$this->load->view('template/seller/head',$data);
        //$this->load->view('template/seller/leftnav');
        $data['category'] = $this->market_model->get_all_category();
        $this->load->view('product_add', $data);
        $this->load->view('template/seller/foot');
        //$this->load->view('template/seller/footerlink');
    }

    public function add_market_place_product() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->helper('text');
        $data['about_info'] = $this->db->get('about')->row();
        $reg_id = $this->session->userdata('reg_id');
        $data['get_user_data'] = $this->market_model->get_user_data($reg_id);
        //$this->load->view('template/seller/headerlink');
        //$this->load->view('template/seller/head',$data);
        //$this->load->view('template/seller/leftnav');
        $data['category'] = $this->market_model->get_all_category();
        $data['location'] = $this->market_model->get_all_location();
        $this->load->view('market_add', $data);
        $this->load->view('template/seller/foot');
        //$this->load->view('template/seller/footerlink');
    }

    public function edit_product() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->helper('text');
        $data['about_info'] = $this->db->get('about')->row();
        $reg_id = $this->session->userdata('reg_id');
        $data['get_user_data'] = $this->market_model->get_user_data($reg_id);
        $p_id = $this->uri->segment(3);
        $check_id = $this->market_model->get_image_table_data($p_id);
        if ($check_id) {
            $data['p_details'] = $this->market_model->get_product_details($p_id, $reg_id);
        } else {
            $data['p_details'] = $this->market_model->get_product_details_w_image($p_id, $reg_id);
        }

        // echo "<pre>";
        // print_r($data['p_details']);
        // echo "</pre>";
        // die();
        $data['count'] = count($data['p_details']);
        $data['sub_category_name'] = $this->market_model->get_sub_cat_name($data['p_details'][0]['sub_cat_id']);

        $data['category'] = $this->market_model->get_all_category();

        $this->load->view('template/seller/headerlink');
        $this->load->view('template/seller/head', $data);
        //$this->load->view('template/seller/leftnav');
        $this->load->view('product_edit', $data);
        $this->load->view('template/seller/foot');
        //$this->load->view('template/seller/footerlink');
    }

    public function edit_market_product() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->helper('text');
        $data['about_info'] = $this->db->get('about')->row();
        $reg_id = $this->session->userdata('reg_id');
        $data['get_user_data'] = $this->market_model->get_user_data($reg_id);
        $p_id = $this->uri->segment(3);
        $check_id = $this->market_model->get_image_table_data_market($p_id);
        if ($check_id) {
            $data['p_details'] = $this->market_model->get_market_product_details($p_id, $reg_id);
        } else {
            $data['p_details'] = $this->market_model->get_market_product_details_w_image($p_id, $reg_id);
        }

        // echo "<pre>";
        // print_r($data['p_details']);
        // echo "</pre>";
        //die();
        $data['location'] = $this->market_model->get_all_location();
        $data['district'] = $this->market_model->get_all_district();
        $data['count'] = count($data['p_details']);
        $data['sub_category_name'] = $this->market_model->get_sub_cat_name($data['p_details'][0]['market_sub_cat_id']);

        $data['category'] = $this->market_model->get_all_category2();

        //$this->load->view('template/seller/headerlink');
        //$this->load->view('template/seller/head',$data);
        //$this->load->view('template/seller/leftnav');
        $this->load->view('market_edit', $data);
        $this->load->view('template/seller/foot');
        //$this->load->view('template/seller/footerlink');
    }

    public function select_sub_category() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->helper('text');
        $data['about_info'] = $this->db->get('about')->row();

        $cat_id = $this->input->post('cat_id');
        $sub_category = $this->market_model->get_sub_category($cat_id);
        echo '<option value="0" >Select a sub-category</option>';
        foreach ($sub_category as $row) {
            echo '<option value="' . $row['market_sub_cat_id'] . '">' . $row['market_sub_cat_name'] . '</option>';
        }
        //echo '<option>''<option>';
    }

    public function update_product_details($p_id) {
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->helper('text');
        $data['about_info'] = $this->db->get('about')->row();
        $reg_id = $this->session->userdata('reg_id');
        $product_name = "";
        $product_price = 0.0;
        $product_model = "";
        $product_size = "";
        $product_quantity = 0;
        $cpt = 0;
        $reg_id = $this->session->userdata('reg_id');

        $product_name = $this->input->post('product_name');
        $product_price = $this->input->post('product_price');
        $product_model = $this->input->post('product_model');
        $product_size = $this->input->post('product_size');
        $product_quantity = $this->input->post('product_quantity');
        $cat_id = $this->input->post('cat_id');
        $sub_cat_id = $this->input->post('sub_cat_id');
        $product_description = $this->input->post('product_description');

        $pre_main_image = $this->input->post('pre_main_img');
        $pre_sub_img = $this->input->post('pre_sub_img');


        $counter = 0;
        foreach ($_FILES['userfile']['name'] as $row) {
            if (!empty($row)) {
                $counter++;
            }
        }
        if ($counter == 0) {
            $data1 = array
                (
                'product_name' => $product_name,
                'reg_id' => $reg_id,
                'product_price' => $product_price,
                'product_model' => $product_model,
                'product_size' => $product_size,
                'product_quantity' => $product_quantity,
                'cat_id' => $cat_id,
                'sub_cat_id' => $sub_cat_id,
                'product_description' => $product_description,
                'product_image' => $pre_main_image,
                'status' => 1,
            );

            $this->market_model->update_new_product($p_id, $data1);
        } else {
            //upload image
            $this->market_model->delete_product_sub_images($p_id);
            $this->load->library('upload');
            $files = $_FILES;
            $cpt = count($_FILES['userfile']['name']);
            for ($i = 0; $i < $cpt; $i++) {
                $_FILES['userfile']['name'] = uniqid() . '_' . underscore($files['userfile']['name'][$i]);
                $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

                $oldFileName = $_FILES['userfile']['name'];
                $_FILES['userfile']['name'] = str_replace("'", "", $oldFileName);
                $this->upload->initialize($this->set_upload_options($_FILES['userfile']['name']));
                $this->upload->do_upload();


                if ($i == 0) {
                    $data1 = array
                        (
                        'product_name' => $product_name,
                        'reg_id' => $reg_id,
                        'product_price' => $product_price,
                        'product_model' => $product_model,
                        'product_size' => $product_size,
                        'product_quantity' => $product_quantity,
                        'cat_id' => $cat_id,
                        'sub_cat_id' => $sub_cat_id,
                        'product_description' => $product_description,
                        'product_image' => $_FILES['userfile']['name'],
                        'status' => 1,
                    );

                    $this->market_model->update_new_product($p_id, $data1);
                } else {
                    $data2 = array
                        (
                        'images_table_id' => $p_id,
                        'images_name' => $_FILES['userfile']['name'],
                        'images_type' => 1,
                    );
                    $this->market_model->insert_product_images($data2);
                }
            }
        }

        redirect('market/all_product', 'refresh');
    }
    
    public function image_details_modal() {
        $images_table_id = $this->input->post('images_table_id');
//        echo $images_table_id;die();
        $data['image_details'] = $this->market_model->image_details($images_table_id);
//        print_r($data);exit();
        $this->load->view('market/view_main_image_modal',$data);
    }
    
    public function update_image() {
        $product_id = $this->input->post('market_place_id');
        
        $this->load->library('upload');
        $files = $_FILES;
            $_FILES['userfile']['name'] = uniqid() . '_' . underscore($files['userfile']['name']);
                $_FILES['userfile']['type'] = $files['userfile']['type'];
                $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'];
                $_FILES['userfile']['error'] = $files['userfile']['error'];
                $_FILES['userfile']['size'] = $files['userfile']['size'];

                $oldFileName = $_FILES['userfile']['name'];
                $_FILES['userfile']['name'] = str_replace("'", "", $oldFileName);
            $this->upload->initialize($this->set_upload_options($_FILES['userfile']['name']));
            $this->upload->do_upload();
            
            $product_image = $_FILES['userfile']['name'];
//            print_r($product_image);exit();
        $this->market_model->update_main_image($product_id,$product_image);
        redirect('market/edit_market_product/'.$product_id);
    
    }
    
    
    public function update_sub_image() {
        $images_id = $this->input->post('images_id');
        $images_table_id = $this->input->post('images_table_id');
        
        $this->load->library('upload');
        $files = $_FILES;
            $_FILES['userfile']['name'] = uniqid() . '_' . underscore($files['userfile']['name']);
                $_FILES['userfile']['type'] = $files['userfile']['type'];
                $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'];
                $_FILES['userfile']['error'] = $files['userfile']['error'];
                $_FILES['userfile']['size'] = $files['userfile']['size'];

                $oldFileName = $_FILES['userfile']['name'];
                $_FILES['userfile']['name'] = str_replace("'", "", $oldFileName);
            $this->upload->initialize($this->set_upload_options($_FILES['userfile']['name']));
            $this->upload->do_upload();
            
            $product_image = $_FILES['userfile']['name'];
//            print_r($product_image);exit();
        $this->market_model->update_sub_image($images_id,$product_image);
        redirect('market/edit_market_product/'.$images_table_id);
    }
    
    
    public function sub_image_details_modal() {
        $images_id = $this->input->post('images_id');
//        echo $images_id;die();
        $data['image_details'] = $this->market_model->sub_image_details($images_id);
//        print_r($data);exit();
        $this->load->view('market/view_sub_image_modal',$data);
    }

    public function update_market_product_details($p_id) {
//        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->helper('text');
//        $data['about_info'] = $this->db->get('about')->row();
        $reg_id = $this->session->userdata('reg_id');
        $product_name = "";
        $product_price = 0.0;
        $product_location = "";
        $product_quantity = 0;
        $cpt = 0;
        $reg_id = $this->session->userdata('reg_id');

        $files = $_FILES;
        
        if(array_sum($_FILES['userfile']['error']) > 0) { 
            $data['market_place_name'] = $this->input->post('product_name');
            $data['market_place_price'] = $this->input->post('product_price');
//            $data['product_model'] = $this->input->post('product_model');
//            $data['product_size'] = $this->input->post('product_size');
//            $data['product_quantity'] = $this->input->post('product_quantity');
            $data['market_place_location'] = $this->input->post('product_location');
            $data['market_dist_id'] = $this->input->post('market_dist_id');
            $data['condition'] = $this->input->post('condition');
            $data['market_category_id'] = $this->input->post('market_category_id');
            $data['market_sub_cat_id'] = $this->input->post('market_sub_cat_id');
            $data['market_place_description'] = $this->input->post('product_description');

//            print_r($data);die();
            $this->market_model->update_new_market_product($p_id, $data);
        }
        else{
             $data['market_place_name'] = $this->input->post('product_name');
            $data['market_place_price'] = $this->input->post('product_price');
//            $data['product_model'] = $this->input->post('product_model');
//            $data['product_size'] = $this->input->post('product_size');
//            $data['product_quantity'] = $this->input->post('product_quantity');
            $data['market_place_location'] = $this->input->post('product_location');
            $data['market_dist_id'] = $this->input->post('market_dist_id');
            $data['condition'] = $this->input->post('condition');
            $data['market_category_id'] = $this->input->post('market_category_id');
            $data['market_sub_cat_id'] = $this->input->post('market_sub_cat_id');
            $data['market_place_description'] = $this->input->post('product_description');
            
           $this->market_model->update_new_market_product($p_id, $data);
//             print_r($data);die();
             
       $data['images_type'] = $this->input->post('images_type');
        $this->load->library('upload');
        
        $cpt = count($_FILES['userfile']['name']);
        
       
//            echo 'You must upload a photo';die();
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['userfile']['name'] = uniqid() . '_' . underscore($files['userfile']['name'][$i]);
            $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
            $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

            $oldFileName = $_FILES['userfile']['name'];
            $_FILES['userfile']['name'] = str_replace("'", "", $oldFileName);
            $this->upload->initialize($this->set_upload_options($_FILES['userfile']['name']));
            $this->upload->do_upload();
          
                $data1 = array
                    (
                    'images_table_id'=>$p_id,
                    'images_name' => $_FILES['userfile']['name'],
                    'images_type' =>  $data['images_type'] 
                );
//            print_r($data1);
//            exit();

            $this->market_model->insert_product_images($data1);
        }
        }

        redirect('market/all_market_product', 'refresh');
    }

    public function delete_product($p_id) {
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->helper('text');
        $data['about_info'] = $this->db->get('about')->row();
        $this->market_model->delete_product_confirm($p_id);
        redirect('market/all_product', 'refresh');
    }

    public function delete_market_product($p_id) {
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->helper('text');
        $data['about_info'] = $this->db->get('about')->row();
        $this->market_model->delete_market_product_confirm($p_id);
        redirect('market/all_market_product', 'refresh');
    }

    public function insert_product() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->helper('text');
        $data['about_info'] = $this->db->get('about')->row();
        $product_name = "";
        $product_price = 0.0;
        $product_model = "";
        $product_size = "";
        $product_quantity = 0;
        $reg_id = $this->session->userdata('reg_id');

        $product_name = $this->input->post('product_name');
        $product_price = $this->input->post('product_price');
        $price_unit = $this->input->post('price_unit');
        $product_model = $this->input->post('product_model');
        $product_size = $this->input->post('product_size');
        $product_quantity = $this->input->post('product_quantity');
        $cat_id = $this->input->post('cat_id');
        $sub_cat_id = $this->input->post('sub_cat_id');
        $product_description = $this->input->post('product_description');


        $last_product_id = 0;
        $this->load->library('upload');
        $files = $_FILES;
        $cpt = count($_FILES['userfile']['name']);
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['userfile']['name'] = uniqid() . '_' . underscore($files['userfile']['name'][$i]);
            $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
            $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

            $oldFileName = $_FILES['userfile']['name'];
            $_FILES['userfile']['name'] = str_replace("'", "", $oldFileName);
            $this->upload->initialize($this->set_upload_options($_FILES['userfile']['name']));
            $this->upload->do_upload();


            if ($i == 0) {
                $data1 = array
                    (
                    'product_name' => $product_name,
                    'reg_id' => $reg_id,
                    'product_price' => $product_price,
                    'price_unit' => $price_unit,
                    'product_model' => $product_model,
                    'product_size' => $product_size,
                    'product_quantity' => $product_quantity,
                    'cat_id' => $cat_id,
                    'sub_cat_id' => $sub_cat_id,
                    'product_description' => $product_description,
                    'product_image' => $_FILES['userfile']['name'],
                    'status' => 1,
                );

                $last_product_id = $this->market_model->insert_new_product($data1);
            } else {
                $data2 = array
                    (
                    'images_table_id' => $last_product_id,
                    'images_name' => $_FILES['userfile']['name'],
                    'images_type' => 1,
                );
                $this->market_model->insert_product_images($data2);
            }
        }
        redirect('market/all_product', 'refresh');
    }

    public function insert_product_marketplace() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->helper('text');
        $data['about_info'] = $this->db->get('about')->row();
        $product_name = "";
        $product_price = 0.0;
        $product_location = "";
        $product_quantity = 0;
        $reg_id = $this->session->userdata('reg_id');

        $product_name = $this->input->post('product_name');
        $product_price = $this->input->post('product_price');
        $condition = $this->input->post('condition');

        $product_location = $this->input->post('product_location');
        $market_dist_id = $this->input->post('market_dist_id');

        $cat_id = $this->input->post('cat_id');
        $sub_cat_id = $this->input->post('sub_cat_id');
        $product_description = $this->input->post('product_description');


        $last_product_id = 0;
        $this->load->library('upload');
        $files = $_FILES;
        $cpt = count($_FILES['userfile']['name']);
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['userfile']['name'] = uniqid() . '_' . underscore($files['userfile']['name'][$i]);
            $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
            $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

            $oldFileName = $_FILES['userfile']['name'];
            $_FILES['userfile']['name'] = str_replace("'", "", $oldFileName);
            $this->upload->initialize($this->set_upload_options($_FILES['userfile']['name']));
            $this->upload->do_upload();

            $imageInformation = getimagesize($_FILES['userfile']['tmp_name']);

            $imageWidth = $imageInformation[0]; //Contains the Width of the Image

            $imageHeight = $imageInformation[1];

            // echo $imageHeight.' '.$imageWidth;
            // die();
            /// watermark image resize

            $this->watermark_image($imageWidth, $imageHeight);
            //$this->resize($imageWidth,$imageHeight);

            $watermark_path = $_FILES['userfile']['name'];

            $this->overlay($watermark_path);
            //$this->watermark($watermark_path,$imageHeight);

            if ($i == 0) {
                $data1 = array
                    (
                    'market_place_name' => $product_name,
                    'reg_id' => $reg_id,
                    'market_place_price' => $product_price,
                    'condition' => $condition,
                    'market_place_location' => $product_location,
                    'market_dist_id' => $market_dist_id,
                    'market_category_id' => $cat_id,
                    'market_sub_cat_id' => $sub_cat_id,
                    'market_place_description' => $product_description,
                    'market_place_image' => $_FILES['userfile']['name'],
                    'market_place_is_block' => 1,
                );

                $last_product_id = $this->market_model->insert_new_market_product($data1);
            } else {
                $data2 = array
                    (
                    'images_table_id' => $last_product_id,
                    'images_name' => $_FILES['userfile']['name'],
                    'images_type' => 4,
                );
                $this->market_model->insert_market_place_images($data2);
            }
        }

        redirect('market/promote_ad/'.$last_product_id); 

        //redirect('market/all_market_product', 'refresh');
    }

  
   public function promote_ad($id){
        $data['market_place_id'] = $id;
        //echo '<pre>';print_r($data['market_place_id']);die();
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->helper('text');
        $data['about_info'] = $this->db->get('about')->row();
        $reg_id = $this->session->userdata('reg_id');
       $data['top_ad'] = $this->market_model->check_top_ad($id);
       $data['bump_ad'] = $this->market_model->check_bump_ad($id);
       //echo '<pre>';print_r($data['bump_ad']);die();
        $data['get_user_data'] = $this->market_model->get_user_data($reg_id);

        $data['top_ad_settings'] = $this->market_model->get_top_ad_settings_info();
        $data['bump_ad_settings'] = $this->market_model->get_bump_ad_settings_info();
        
        //echo '<pre>';print_r($data['top_ad_settings']);die();
        $data['category'] = $this->market_model->get_all_category();
        $data['location'] = $this->market_model->get_all_location();
        $this->load->view('promote_ad', $data);
        $this->load->view('template/seller/foot');
       //echo '<pre>';print_r($data);die();
        //$this->load->view('template/seller/footerlink');
    }
    
    public function add_promote_add() {
        //$data['logo_info'] = $this->db->get('logo')->row();
        //echo '<pre>';print_r($data);die();
        $market_place_id = $this->input->post('id');
        //echo '<pre>';print_r($market_place_id);die();
        $data['top_ad'] = $this->input->post('top_ad');
        $data['bump_ad'] = $this->input->post('bump_ad');
        if($data['top_ad'] == 1)
        {
            $daterange1 = trim($this->input->post('daterange1'), " ");
            $daterange1 = explode('-',$daterange1);
            $data['top_ad_start'] = date("Y-m-d", strtotime($daterange1[0]));
            $data['top_ad_end'] = date("Y-m-d", strtotime($daterange1[1]));
        }
        if($data['bump_ad'] == 1)
        {
            $daterange2 = $this->input->post('daterange2');
            $daterange2 = explode('-',$daterange2);
            $data['bump_ad_start'] = date("Y-m-d", strtotime($daterange2[0]));
            $data['bump_ad_end'] = date("Y-m-d", strtotime($daterange2[1]));
        }
        //echo '<pre>';print_r($data);die();
            if($data['top_ad'] || $data['bump_ad'])
            {
                $this->market_model->insert_promote($data,$market_place_id);
                $this->session->set_flashdata('flashmsg', 'successful');
            }
        else{
            $this->session->set_flashdata('flashmsg', 'unsuccessful');
        }

        redirect('market');
    }
    public function watermark_image($imageWidth, $imageHeight) {
        $data['logo_info'] = $this->db->get('logo')->row();
        $file = 'assets/watermark.png';
        $newfile = 'assets/product_images/watermark.png';

        if (!copy($file, $newfile)) {
            // echo "failed to copy $file...\n";
        } else {
            // echo "copied $file into $newfile\n";
        }

        //shell_exec("cp -r ".$file." ".$newfile);
        //echo $imageWidth.' '.$imageHeight;
        //die();
        $this->resize($imageWidth, $imageHeight);
    }

    public function watermark($path, $height) {
        $data['logo_info'] = $this->db->get('logo')->row();
        $wm_font_size = 10;
        $config['source_image'] = 'assets/product_images/' . $path;
        $config['wm_text'] = 'eeanstar.com';
        $config['wm_type'] = 'text';
        $config['wm_font_path'] = './system/fonts/texb.ttf';
        $config['wm_font_size'] = ceil($height / 100 * $wm_font_size);
        $config['wm_font_color'] = 'cccccc';

        $config['wm_vrt_alignment'] = 'top';
        $config['wm_hor_alignment'] = 'center';
        $config['wm_padding'] = '20';

        $this->image_lib->initialize($config);

        $this->image_lib->watermark();
    }

    public function overlay($path) {
        $data['logo_info'] = $this->db->get('logo')->row();
        $config['image_library'] = 'gd2';
        $config['source_image'] = 'assets/product_images/' . $path;
        $config['wm_type'] = 'overlay';
        $config['wm_overlay_path'] = 'assets/product_images/watermark.png'; //the overlay image
        $config['wm_vrt_alignment'] = 'middle';
        $config['wm_hor_alignment'] = 'center';
        $config['wm_padding'] = '0';
        //	$config['wm_x_transp'] = '200';
        //$config['wm_y_transp'] = '20';
        $config['wm_opacity'] = '50';

        $this->image_lib->initialize($config);


        if (!$this->image_lib->watermark()) {
            echo $this->image_lib->display_errors();
        }
    }

    public function resize($height, $width) {
        $this->load->library('image_lib');
        $config['image_library'] = 'gd2';
        $config['source_image'] = "assets/product_images/watermark.png";
        $config['overwrite'] = TRUE;
        $image_config['quality'] = "100%";
        $image_config['maintain_ratio'] = FALSE;
        $config['height'] = $height;
        $config['width'] = $width;
        $config['new_image'] = "assets/product_images/"; //you should have write permission here..
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }

    private function set_upload_options($file_name) {
        //upload an image options
        $url = base_url();

        $config = array();
        $config['file_name'] = $file_name;
        $config['upload_path'] = 'assets/product_images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '0';
        $config['overwrite'] = FALSE;

        return $config;
    }

    public function change_password() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->helper('text');
        $data['about_info'] = $this->db->get('about')->row();
        $reg_id = $this->session->userdata('reg_id');
        $redirect_url = $this->input->post('redirect_url');
        $this->form_validation->set_rules('pass_change', 'Password', 'trim|required|matches[con_pass_change]|min_length[6]|alpha_numeric|callback_password_check|md5');
        $this->form_validation->set_rules('con_pass_change', 'Password Confirmation', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            //$this->load->view('myform');
        } else {
            //$this->load->view('formsuccess');
            $data = array('login_password' => $this->input->post('pass_change'),);
            $this->market_model->password_change($data, $reg_id);
        }


        redirect('logout', 'refresh');
    }

    public function update_product($p_id) {
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->helper('text');
        $data['about_info'] = $this->db->get('about')->row();
        $product_details = $this->admin_model->get_specific_product($p_id);
        echo "<pre>";
        print_r($product_details);
        echo "</pre>";
        die();
        $status = $product_details[0]['status'];
        //$data = array('status' => , );

        $this->admin_model->update_product_status($data, $p_id);
        redirect('admin/all_product', 'refresh');
    }

    public function all_company() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->helper('text');
        $data['about_info'] = $this->db->get('about')->row();

        $this->load->view('template/seller/headerlink');
        $this->load->view('template/seller/head');
        //$this->load->view('template/seller/leftnav');
        $this->load->view('company_all');
        $this->load->view('template/seller/foot');
    }

    public function logo() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->helper('text');
        $data['about_info'] = $this->db->get('about')->row();

        $this->load->view('template/seller/headerlink');
        $this->load->view('template/seller/head');
        //$this->load->view('template/seller/leftnav');
        $this->load->view('logo');
        $this->load->view('template/seller/foot');
        $this->load->view('template/seller/footerlink');
    }

}
