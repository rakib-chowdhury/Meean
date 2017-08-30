<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Buyer extends MX_Controller {

    //public $counter=0;
    function __construct() {
        parent::__construct();
        $login_email = $this->session->userdata('login_email');
        $type = $this->session->userdata('type');
        $reg_id = $this->session->userdata('reg_id');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('inflector');

        $this->load->library('form_validation');

        if ($login_email == NULL || $reg_id == NULL || $type == NULL || $type == "" || $type == 1 || $type == 2 || $type == 4 || $login_email == "") {
            $this->session->unset_userdata('login_email');
            $this->session->unset_userdata('type');
            $this->session->unset_userdata('logged_in');
            $m_data['message'] = 'Enter your valid Email and password first';
            $this->session->set_userdata($m_data);
            redirect('login', 'refresh');
        }
        // $this->load->model('db_search');
        $this->load->library("session");
        $this->load->model('buyer_model');
        $this->load->helper('text');
    }

    public function index() {
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
        $data['about_info'] = $this->db->get('about')->row();
        $reg_id = $this->session->userdata('reg_id');
        $data['get_user_data'] = $this->buyer_model->get_user_data($reg_id);
        $data['all_product_info'] = $this->buyer_model->get_all_product($reg_id);
        $count_num = count($data['all_product_info']);
        if ($count_num <= 0) {
            $this->load->view('template/buyer/headerlink');
            $this->load->view('template/buyer/head', $data);
            //$this->load->view('template/seller/leftnav');
            $data['category'] = $this->buyer_model->get_all_category();
            $this->load->view('product_add', $data);
            $this->load->view('template/buyer/foot');
            //$this->load->view('template/seller/footerlink');
        } else {
            $this->load->view('template/buyer/headerlink');
            $this->load->view('template/buyer/head', $data);
            //$this->load->view('template/seller/leftnav');
            $this->load->view('product_all', $data);
            $this->load->view('template/buyer/foot');




//        $this->load->helper('text');
//        $data['logo_info']=$this->db->get('logo')->row();
//        $this->db->limit(5);
//        $data['news_feed_info']=$this->db->get('news_feed')->result();
//        $data['about_info']=$this->db->get('about')->row();
//	      $reg_id = $this->session->userdata('reg_id');
//		  $data['get_user_data']=$this->buyer_model->get_user_data($reg_id);
//		  $u_name = $data['get_user_data'][0]['reg_first_name'] . " " . $data['get_user_data'][0]['reg_last_name']; ////iti
//        $this->session->set_userdata('username', $u_name);   ////iti
//		  $this->load->view('template/seller/headerlink');
//		  $this->load->view('template/seller/head',$data);
//		  $this->load->view('template/seller/leftnav');
//		  $this->load->view('user_all',$data);
//		  $this->load->view('template/seller/foot');
//		  $this->load->view('template/seller/footerlink');
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
        $this->buyer_model->update_profile_info($data,$reg_id);
        
        redirect('buyer');
    }

    public function add_category() {
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
        $data['about_info'] = $this->db->get('about')->row();
        $data['message'] = $this->session->flashdata('message');
        $data['message_error'] = $this->session->flashdata('message_error');
        $data['all_cat_info'] = $this->db->get('category')->result();
        $this->load->view('template/seller/headerlink');
        $this->load->view('template/seller/head');
        //$this->load->view('template/seller/leftnav');
        $this->load->view('category', $data);
        $this->load->view('template/seller/foot');
        $this->load->view('template/seller/footerlink');
    }

    public function insert_category() {
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
        $data['about_info'] = $this->db->get('about')->row();
        $data['cat_name'] = $this->input->post('cat_name');
        $this->db->insert('category', $data);
        $this->session->set_flashdata('message', 'Your Category was successfully inserted');
        redirect('admin/category');
    }

    public function insert_sub_category() {
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
        $data['about_info'] = $this->db->get('about')->row();
        $data['cat_id'] = $this->input->post('cat_id');
        $data['sub_cat_name'] = $this->input->post('sub_cat_name');
        $this->db->insert('sub_category', $data);
        $this->session->set_flashdata('message', 'Your Sub-Category was successfully inserted');
        redirect('admin/category');
    }

    public function all_product() {
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
        $data['about_info'] = $this->db->get('about')->row();
        $reg_id = $this->session->userdata('reg_id');
        $data['get_user_data'] = $this->buyer_model->get_user_data($reg_id);
        $data['all_product_info'] = $this->buyer_model->get_all_product($reg_id);
        $this->load->view('template/seller/headerlink');
        $this->load->view('template/seller/head', $data);
        //$this->load->view('template/seller/leftnav');
        $this->load->view('product_all', $data);
        $this->load->view('template/seller/foot');
    }

    public function all_market_product() {
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
        $data['about_info'] = $this->db->get('about')->row();
        $reg_id = $this->session->userdata('reg_id');
        $data['get_user_data'] = $this->buyer_model->get_user_data($reg_id);
        $data['all_product_info'] = $this->buyer_model->get_all_market_product($reg_id);
        $this->load->view('template/seller/headerlink');
        $this->load->view('template/seller/head', $data);
        //$this->load->view('template/seller/leftnav');
        $this->load->view('market_all', $data);
        $this->load->view('template/seller/foot');
    }

    public function add_product() {
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
        $data['about_info'] = $this->db->get('about')->row();
        $reg_id = $this->session->userdata('reg_id');
        $data['get_user_data'] = $this->buyer_model->get_user_data($reg_id);
        $this->load->view('template/seller/headerlink');
        $this->load->view('template/seller/head', $data);
        //$this->load->view('template/seller/leftnav');
        $data['category'] = $this->buyer_model->get_all_category();
        $this->load->view('product_add', $data);
        $this->load->view('template/seller/foot');
        //$this->load->view('template/seller/footerlink');
    }

    public function add_market_place_product() {
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
        $data['about_info'] = $this->db->get('about')->row();
        $reg_id = $this->session->userdata('reg_id');
        $data['get_user_data'] = $this->buyer_model->get_user_data($reg_id);
        $this->load->view('template/seller/headerlink');
        $this->load->view('template/seller/head', $data);
        //$this->load->view('template/seller/leftnav');
        $data['category'] = $this->buyer_model->get_all_category();
        $this->load->view('market_add', $data);
        $this->load->view('template/seller/foot');
        //$this->load->view('template/seller/footerlink');
    }

    public function edit_product() {
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
        $data['about_info'] = $this->db->get('about')->row();
        $reg_id = $this->session->userdata('reg_id');
        $data['get_user_data'] = $this->buyer_model->get_user_data($reg_id);
        $p_id = $this->uri->segment(3);
        $check_id = $this->buyer_model->get_image_table_data($p_id);
        if ($check_id) {
            $data['p_details'] = $this->buyer_model->get_product_details($p_id, $reg_id);
        } else {
            $data['p_details'] = $this->buyer_model->get_product_details_w_image($p_id, $reg_id);
        }

        // echo "<pre>";
        // print_r($data['p_details']);
        // echo "</pre>";
        // die();
        $data['count'] = count($data['p_details']);
        $data['sub_category_name'] = $this->buyer_model->get_sub_cat_name($data['p_details'][0]['sub_cat_id']);

        $data['category'] = $this->buyer_model->get_all_category();

        $this->load->view('template/seller/headerlink');
        $this->load->view('template/seller/head', $data);
        //$this->load->view('template/seller/leftnav');
        $this->load->view('product_edit', $data);
        $this->load->view('template/seller/foot');
        //$this->load->view('template/seller/footerlink');
    }

    public function edit_market_product() {
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
        $data['about_info'] = $this->db->get('about')->row();
        $reg_id = $this->session->userdata('reg_id');
        $data['get_user_data'] = $this->buyer_model->get_user_data($reg_id);
        $p_id = $this->uri->segment(3);
        $check_id = $this->buyer_model->get_image_table_data_market($p_id);
        if ($check_id) {
            $data['p_details'] = $this->buyer_model->get_market_product_details($p_id, $reg_id);
        } else {
            $data['p_details'] = $this->buyer_model->get_market_product_details_w_image($p_id, $reg_id);
        }

        // echo "<pre>";
        // print_r($data['p_details']);
        // echo "</pre>";
        // die();
        $data['count'] = count($data['p_details']);
        $data['sub_category_name'] = $this->buyer_model->get_sub_cat_name($data['p_details'][0]['sub_cat_id']);

        $data['category'] = $this->buyer_model->get_all_category();

        $this->load->view('template/seller/headerlink');
        $this->load->view('template/seller/head', $data);
        //$this->load->view('template/seller/leftnav');
        $this->load->view('market_edit', $data);
        $this->load->view('template/seller/foot');
        //$this->load->view('template/seller/footerlink');
    }

    public function select_sub_category() {
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
        $data['about_info'] = $this->db->get('about')->row();

        $cat_id = $this->input->post('cat_id');
        $sub_category = $this->buyer_model->get_sub_category($cat_id);
        echo '<option value="0" >Select a sub-category</option>';
        foreach ($sub_category as $row) {
            echo '<option value="' . $row['sub_cat_id'] . '">' . $row['sub_cat_name'] . '</option>';
        }
        //echo '<option>''<option>';
    }
    
    public function image_details_modal() {
        $images_table_id = $this->input->post('images_table_id');
//        echo $images_table_id;die();
        $data['image_details'] = $this->buyer_model->image_details($images_table_id);
//        print_r($data);exit();
        $this->load->view('buyer/view_main_image_modal',$data);
    }
    
    public function sub_image_details_modal() {
        $images_id = $this->input->post('images_id');
//        echo $images_id;die();
        $data['image_details'] = $this->buyer_model->sub_image_details($images_id);
//        print_r($data);exit();
        $this->load->view('buyer/view_sub_image_modal',$data);
    }
    
    public function update_image() {
        $product_id = $this->input->post('product_id');
        
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
        $this->buyer_model->update_main_image($product_id,$product_image);
        redirect('buyer/edit_product/'.$product_id);
    
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
        $this->buyer_model->update_sub_image($images_id,$product_image);
        redirect('buyer/edit_product/'.$images_table_id);
    }
    
    public function delete_sub_images($images_id,$product_id) {
        $this->buyer_model->delete_sub_image($images_id);
        redirect('buyer/edit_product/'.$product_id);
    }

    public function update_product_details($p_id) {
        $this->load->helper('text');
        $reg_id = $this->session->userdata('reg_id');
        $files = $_FILES;
//        print_r($files);die();
        if(array_sum($_FILES['userfile']['error']) > 0) {
            $data['product_name'] = $this->input->post('product_name');
            $data['product_price'] = $this->input->post('product_price');
            $data['price_unit'] = $this->input->post('price_unit');
            $data['payment_method'] = $this->input->post('payment_method');
            $data['product_model'] = $this->input->post('product_model');
            $data['product_size'] = $this->input->post('product_size');
            $data['product_quantity'] = $this->input->post('product_quantity');
            $data['cat_id'] = $this->input->post('cat_id');
            $data['sub_cat_id'] = $this->input->post('sub_cat_id');
            $data['product_description'] = $this->input->post('product_description');
//            print_r($data);die();
           $this->buyer_model->update_new_product($p_id, $data);
        }
        
        else{
            $data['product_name'] = $this->input->post('product_name');
            $data['product_price'] = $this->input->post('product_price');
            $data['price_unit'] = $this->input->post('price_unit');
            $data['payment_method'] = $this->input->post('payment_method');
            $data['product_model'] = $this->input->post('product_model');
            $data['product_size'] = $this->input->post('product_size');
            $data['product_quantity'] = $this->input->post('product_quantity');
            $data['cat_id'] = $this->input->post('cat_id');
            $data['sub_cat_id'] = $this->input->post('sub_cat_id');
            $data['product_description'] = $this->input->post('product_description');
            $this->buyer_model->update_new_product($p_id, $data);
            
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
                    'images_table_id' => $p_id,
                    'images_name' => $_FILES['userfile']['name'],
                    'images_type' => $data['images_type']
                );
//                print_r($data1);
//                exit();

                $this->buyer_model->insert_product_images($data1);
            }
        }
        redirect('buyer/all_product', 'refresh');
    }

    public function update_market_product_details($p_id) {
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
        $data['about_info'] = $this->db->get('about')->row();
        $reg_id = $this->session->userdata('reg_id');
        $product_name = "";
        $product_price = 0.0;
        $product_location = "";
        $product_quantity = 0;
        $cpt = 0;
        $reg_id = $this->session->userdata('reg_id');

        $product_name = $this->input->post('product_name');
        $product_price = $this->input->post('product_price');
        $product_location = $this->input->post('product_location');
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
                'market_place_name' => $product_name,
                'reg_id' => $reg_id,
                'market_place_price' => $product_price,
                'market_place_location' => $product_location,
                'cat_id' => $cat_id,
                'sub_cat_id' => $sub_cat_id,
                'market_place_description' => $product_description,
                'market_place_image' => $pre_main_image,
                'market_place_is_block' => 0,
            );

            $this->buyer_model->update_new_market_product($p_id, $data1);
        } else {
            //upload image
            $this->buyer_model->delete_market_product_sub_images($p_id);
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
                        'market_place_name' => $product_name,
                        'reg_id' => $reg_id,
                        'market_place_price' => $product_price,
                        'market_place_location' => $product_location,
                        'cat_id' => $cat_id,
                        'sub_cat_id' => $sub_cat_id,
                        'market_place_description' => $product_description,
                        'market_place_image' => $_FILES['userfile']['name'],
                        'market_place_is_block' => 0,
                    );

                    $this->buyer_model->update_new_market_product($p_id, $data1);
                } else {
                    $data2 = array
                        (
                        'images_table_id' => $p_id,
                        'images_name' => $_FILES['userfile']['name'],
                        'images_type' => 4,
                    );
                    $this->buyer_model->insert_market_place_images($data2);
                }
            }
        }

        redirect('buyer/all_market_product', 'refresh');
    }

    public function delete_product($p_id) {
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
        $data['about_info'] = $this->db->get('about')->row();
        $this->buyer_model->delete_product_confirm($p_id);
        redirect('buyer/all_product', 'refresh');
    }

    public function delete_market_product($p_id) {
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
        $data['about_info'] = $this->db->get('about')->row();
        $this->buyer_model->delete_market_product_confirm($p_id);
        redirect('buyer/all_market_product', 'refresh');
    }

    public function insert_product() {
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
        $data['about_info'] = $this->db->get('about')->row();
        $product_name = "";
        $product_price = 0.0;
        $product_model = "";
        $product_size = "";
        $product_quantity = 0;
        $reg_id = $this->session->userdata('reg_id');

        $product_name = $this->input->post('product_name');
        $product_price = $this->input->post('product_price');
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
                    'product_model' => $product_model,
                    'product_size' => $product_size,
                    'product_quantity' => $product_quantity,
                    'cat_id' => $cat_id,
                    'sub_cat_id' => $sub_cat_id,
                    'product_description' => $product_description,
                    'product_image' => $_FILES['userfile']['name'],
                    'status' => 1,
                );

                $last_product_id = $this->buyer_model->insert_new_product($data1);
            } else {
                $data2 = array
                    (
                    'images_table_id' => $last_product_id,
                    'images_name' => $_FILES['userfile']['name'],
                    'images_type' => 1,
                );
                $this->buyer_model->insert_product_images($data2);
            }
        }
        redirect('buyer/all_product', 'refresh');
    }

    public function insert_product_marketplace() {
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
        $data['about_info'] = $this->db->get('about')->row();
        $product_name = "";
        $product_price = 0.0;
        $product_location = "";
        $product_quantity = 0;
        $reg_id = $this->session->userdata('reg_id');

        $product_name = $this->input->post('product_name');
        $product_price = $this->input->post('product_price');
        $product_location = $this->input->post('product_location');
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
                    'market_place_name' => $product_name,
                    'reg_id' => $reg_id,
                    'market_place_price' => $product_price,
                    'market_place_location' => $product_location,
                    'cat_id' => $cat_id,
                    'sub_cat_id' => $sub_cat_id,
                    'market_place_description' => $product_description,
                    'market_place_image' => $_FILES['userfile']['name'],
                    'market_place_is_block' => 0,
                );

                $last_product_id = $this->buyer_model->insert_new_market_product($data1);
            } else {
                $data2 = array
                    (
                    'images_table_id' => $last_product_id,
                    'images_name' => $_FILES['userfile']['name'],
                    'images_type' => 4,
                );
                $this->buyer_model->insert_market_place_images($data2);
            }
        }
        redirect('buyer/all_market_product', 'refresh');
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
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
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
            $this->buyer_model->password_change($data, $reg_id);
        }


        redirect('logout', 'refresh');
    }

    public function update_product($p_id) {
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
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
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
        $data['about_info'] = $this->db->get('about')->row();

        $this->load->view('template/seller/headerlink');
        $this->load->view('template/seller/head');
        //$this->load->view('template/seller/leftnav');
        $this->load->view('company_all');
        $this->load->view('template/seller/foot');
    }

    public function logo() {
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
        $data['about_info'] = $this->db->get('about')->row();

        $this->load->view('template/seller/headerlink');
        $this->load->view('template/seller/head');
        //$this->load->view('template/seller/leftnav');
        $this->load->view('logo');
        $this->load->view('template/seller/foot');
        $this->load->view('template/seller/footerlink');
    }

}
