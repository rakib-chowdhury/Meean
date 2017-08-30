<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends MX_Controller {

    //public $counter=0;
    function __construct() {
        parent::__construct();
        $login_email = $this->session->userdata('login_email');
        $type = $this->session->userdata('type');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('inflector');
        $this->load->library('form_validation');
        if ($login_email == NULL || $type == NULL || $type == "" || $type == 0 || $login_email == "") {
            $this->session->unset_userdata('login_email');
            $this->session->unset_userdata('type');
            $this->session->unset_userdata('logged_in');
            $m_data['message'] = 'Enter your valid Email and password first';
            $this->session->set_userdata($m_data);
            redirect('login', 'refresh');
        }
        // $this->load->model('db_search');
        $this->load->library("session");
        $this->load->model('admin_model');
        $this->load->helper('text');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('inflector');
    }

    public function index() {
        $data['logo_info'] = $this->db->get('logo')->row();

        $data['buyer_user_info'] = $this->admin_model->get_buyer_user_info();
        $data['buyer_user_number'] = count($data['buyer_user_info']);

        $data['seller_user_info'] = $this->admin_model->get_seller_user_info();
        $data['seller_user_number'] = count($data['seller_user_info']);

        $data['product_info'] = $this->db->get('product')->result();
        $data['product_num'] = count($data['product_info']);

        $data['trade_show_info'] = $this->db->get('trade')->result();
        $data['trade_num'] = count($data['trade_show_info']);

        $data['market_user_info'] = $this->admin_model->get_market_user_info();
        $data['market_user_number'] = count($data['market_user_info']);

        $data['market_sponsor_info'] = $this->admin_model->get_market_sponsor_info();
        $data['market_sponsor_number'] = count($data['market_sponsor_info']);

        $data['market_product_info'] = $this->db->get('market_place')->result();
        $data['market_product_number'] = count($data['market_product_info']);

        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');

        $data['product_number'] = $this->admin_model->get_product_number();
        $data['market_number'] = $this->admin_model->get_market_number();
        $data['trade_number'] = $this->admin_model->get_trade_number();

        $today = date('Y-m-d');
        $month = date('Y-m');
        $data['count_viewers'] = $this->admin_model->today_viewers_count($today);
        $data['wk_count_viewers'] = $this->admin_model->weekly_viewers_count();
        $data['mn_count_viewers'] = $this->admin_model->monthly_viewers_count($month);
        $data['total_count_viewers'] = $this->admin_model->total_viewers_count();
//            echo '<pre>';print_r($data['mn_count_viewers']);die();

        $this->load->view('admin_all', $data);
        $this->load->view('template/admin/foot');
        $this->load->view('template/admin/footerlink', $data);
    }

    // SLIDER START
    public function all_slider() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['all_slider_info'] = $this->db->get('slider')->result();
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');

        $this->load->view('slider_all', $data);
        $this->load->view('template/admin/foot');
    }

    public function update_slider($p_id) {
        $slider_details = $this->admin_model->get_specific_slider($p_id);
        $status = $slider_details[0]['status'];
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        $data = array('status' => $status,);

        $this->admin_model->update_slider_status($data, $p_id);
        redirect('admin/all_slider', 'refresh');
    }

    public function insert_slider() {

        $this->load->library('upload');
        $files = $_FILES;
        $cpt = count($_FILES['userfile']['name']);
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['userfile']['name'] = uniqid() . '_' . underscore($files['userfile']['name'][$i]);
            $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];

            $image_info = getimagesize($_FILES['userfile']['tmp_name']);
            $image_width = $image_info[0];
            $image_height = $image_info[1];
            if ($image_width != "770" || $image_height != "450") {
                $data['message'] = $this->session->set_userdata('message', 'Image Height and width did not match');

                redirect('admin/all_slider');
            }

            $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
            $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

            $oldFileName = $_FILES['userfile']['name'];
            $_FILES['userfile']['name'] = str_replace("'", "", $oldFileName);
            $this->upload->initialize($this->set_upload_options($_FILES['userfile']['name']));
            $this->upload->do_upload();
            $data2 = array
                (
                'image' => $_FILES['userfile']['name'],
                'status' => 1,
            );
            $this->admin_model->insert_slider_images($data2);
        }
        redirect('admin/all_slider', 'refresh');
    }

    private function set_upload_options($file_name) {
        //upload an image options
        $url = base_url();

        $config = array();
        $config['file_name'] = $file_name;
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '0';
        $config['overwrite'] = FALSE;

        return $config;
    }

    public function delete_slider($id = NULL) {
        if ($id) {
            $data['id'] = $id;
            $this->db->where('id', $id);
            $this->db->delete('slider', $data);
            $data['message'] = $this->session->flashdata('message', 'Data successfully deleted');
            $data['message_error'] = $this->session->flashdata('message_error');
            redirect('admin/all_slider');
        }
    }

    // SLIDER END
    // MARKET SLIDER START

    public function all_market_slider() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['all_market_slider_info'] = $this->db->get('market_slider')->result();
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');

        $this->load->view('market_slider_all', $data);
        $this->load->view('template/admin/foot');
    }

    public function update_market_slider($p_id) {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['logo_info'] = $this->db->get('logo')->row();
        $market_slider_details = $this->admin_model->get_specific_market_slider($p_id);
        $status = $market_slider_details[0]['status'];
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        $data = array('status' => $status,);

        $this->admin_model->update_market_slider_status($data, $p_id);
        redirect('admin/all_market_slider', 'refresh');
    }

    public function insert_market_slider() {
        $data['logo_info'] = $this->db->get('logo')->row();

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
            $this->upload->initialize($this->set_upload_option($_FILES['userfile']['name']));
            $this->upload->do_upload();
            $data2 = array
                (
                'image' => $_FILES['userfile']['name'],
                'status' => 1,
            );
            $this->admin_model->insert_market_slider_images($data2);
        }
        redirect('admin/all_market_slider', 'refresh');
    }

    private function set_upload_option($file_name) {
        //upload an image options
        $url = base_url();

        $config = array();
        $config['file_name'] = $file_name;
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '0';
        $config['overwrite'] = FALSE;

        return $config;
    }

    public function delete_market_slider($id = NULL) {
        //$data['logo_info'] = $this->db->get('logo')->row();
        if ($id) {
            $data['id'] = $id;
            $this->db->where('id', $id);
            $this->db->delete('market_slider', $data);
            $data['message'] = $this->session->flashdata('message', 'Data successfully deleted');
            $data['message_error'] = $this->session->flashdata('message_error');
            redirect('admin/all_market_slider');
        }
    }

    // MARKET SLIDER ENDS



    public function all_category() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['all_cat_info'] = $this->admin_model->get_all_category();
        $data['all_sub_cat_info'] = $this->admin_model->get_all_sub_category();
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');
        $this->load->view('category_all', $data);
        $this->load->view('template/admin/foot');
    }

    public function add_category() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['message'] = $this->session->flashdata('message');
        $data['message_error'] = $this->session->flashdata('message_error');
        $data['all_cat_info'] = $this->db->get('category')->result();
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');
        $data['product_number'] = $this->admin_model->get_product_number();
        $data['market_number'] = $this->admin_model->get_market_number();
        $data['trade_number'] = $this->admin_model->get_trade_number();
        $this->load->view('category', $data);

        $this->load->view('template/admin/foot');
        $this->load->view('template/admin/footerlink', $data);
    }

    public function insert_category() {
        $data['cat_name'] = $this->input->post('cat_name');
        $this->db->insert('category', $data);
        $this->session->set_flashdata('message', 'Your Category was successfully inserted');
        redirect('admin/add_category');
    }

    public function all_trade() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->helper('text');
        $data['all_trade_info'] = $this->admin_model->get_all_trade();
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');
        $this->load->view('trade_all', $data);
        $this->load->view('template/admin/foot');
    }

    public function add_trade() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['all_trade_info'] = $this->db->get('trade')->result();
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');
        $this->load->view('trade_add', $data);
    }

    public function insert_trade() {
        $config['upload_path'] = 'uploads/trade/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        $this->load->library('upload', $config);
        $file_name = 'file';
        if (!$this->upload->do_upload($file_name)) {
            $this->session->set_flashdata('message_error', 'Image not Inserted properly');
            redirect('admin/add_trade');
        } else {
            $upload_data = $this->upload->data();
            $values['image'] = $upload_data['file_name'];
            $values['name'] = $this->input->post('name');
            $values['venue'] = $this->input->post('venue');
            $values['description'] = $this->input->post('description');
            $this->db->insert('trade', $values);
            $this->session->set_flashdata('message', 'Data uploaded');
            redirect('admin/add_trade');
        }
    }

    public function insert_sub_category() {
        $data['cat_id'] = $this->input->post('cat_id');
        $data['sub_cat_name'] = $this->input->post('sub_cat_name');
        $this->db->insert('sub_category', $data);
        $this->session->set_flashdata('message', 'Your Sub-Category was successfully inserted');
        redirect('admin/add_category');
    }

    public function all_product() {
        $data['logo_info'] = $this->db->get('logo')->row();

        $data['all_product_info'] = $this->admin_model->get_all_product();
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');
        $this->load->view('product_all', $data);
        $this->load->view('template/admin/foot');
    }

    public function update_product($p_id) {
        $product_details = $this->admin_model->get_specific_product($p_id);
        $status = $product_details[0]['status'];
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        $data = array('status' => $status,);

        $this->admin_model->update_product_status($data, $p_id);
        redirect('admin/all_product', 'refresh');
    }

    public function update_product_feature($p_id) {
        $product_details = $this->admin_model->get_specific_product($p_id);
        $is_feature = $product_details[0]['is_feature'];
        if ($is_feature == 0) {
            $is_feature = 1;
        } else {
            $is_feature = 0;
        }
        $data = array('is_feature' => $is_feature,);

        $this->admin_model->update_product_status($data, $p_id);
        redirect('admin/all_product', 'refresh');
    }

    public function update_product_innovative($p_id) {
        $product_details = $this->admin_model->get_specific_product($p_id);
        $is_innovative = $product_details[0]['is_innovative'];
        if ($is_innovative == 0) {
            $is_innovative = 1;
        } else {
            $is_innovative = 0;
        }
        $data = array('is_innovative' => $is_innovative,);

        $this->admin_model->update_product_status($data, $p_id);
        redirect('admin/all_product', 'refresh');
    }

    public function all_user() {
        $data['logo_info'] = $this->db->get('logo')->row();

        $data['all_user_info'] = $this->admin_model->get_all_user();
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');
        $this->load->view('user_all', $data);
        $this->load->view('template/admin/foot');
    }

    public function all_member() {
        $data['logo_info'] = $this->db->get('logo')->row();

        $data['all_user_info'] = $this->admin_model->get_all_user();
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');
        $this->load->view('member_all', $data);
        $this->load->view('template/admin/foot');
    }

    public function update_user($p_id) {
        $user_details = $this->admin_model->get_specific_user($p_id);
        $is_block = $user_details[0]['is_block'];
        if ($is_block == 0) {
            $is_block = 1;
        } else {
            $is_block = 0;
        }
        $data = array('is_block' => $is_block,);

        $this->admin_model->update_user_status($data, $p_id);
        //die();
        redirect('admin/all_user', 'refresh');
    }

    public function update_members() {
//        echo 'hello';die();
        if($this->uri->segment(3)){
            $id = $this->uri->segment(3);
            $members_status = $this->admin_model->get_members_status($id);
//        print_r($members_status);die();
        if($members_status == 0){
            $members_status = 1;
            $this->admin_model->update_members_status($members_status, $id);
        }
        else{
            $members_status = 0;
            $this->admin_model->update_members_status($members_status, $id);
        }
        }
        
        redirect('admin/all_user', 'refresh');
    }

    public function all_pending_members() {
        $data['logo_info'] = $this->db->get('logo')->row();

        $data['pending_members'] = $this->admin_model->get_all_pending_members();
//        echo '<pre>';print_r($data['pending_members']);die();
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');
        $this->load->view('all_pending_members', $data);
        $this->load->view('template/admin/foot');
    } 

    public function all_company() {
        $data['logo_info'] = $this->db->get('logo')->row();

        $data['all_company_info'] = $this->admin_model->get_all_company();
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');
        $this->load->view('company_all', $data);
        $this->load->view('template/admin/foot');
    }

    public function update_company($p_id) {
        $company_details = $this->admin_model->get_specific_company($p_id);
        $status = $company_details[0]['status'];
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        $data = array('status' => $status,);

        $this->admin_model->update_company_status($data, $p_id);
        redirect('admin/all_company', 'refresh');
    }

    public function logo() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['all_info'] = $this->db->get('logo')->row();
        $data['message'] = $this->session->flashdata('message');
        $data['message_error'] = $this->session->flashdata('message_error');
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');
        $data['product_number'] = $this->admin_model->get_product_number();
        $data['market_number'] = $this->admin_model->get_market_number();
        $data['trade_number'] = $this->admin_model->get_trade_number();
        $this->load->view('logo', $data);
        $this->load->view('template/admin/foot');
        $this->load->view('template/admin/footerlink', $data);
    }

    public function update_logo() {
        $id = $this->input->post('edit_id');
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'jpg|gif|png';
        $config['max_size'] = '1000';
        $this->load->library('upload', $config);
        $file_name = 'logo';
        if (!$this->upload->do_upload($file_name)) {
            $id = $this->input->post('edit_id');
            $values['logo'] = $this->input->post('logo');
            $this->db->where('logo_id', $id);
            $this->db->update('logo', $values);
            $this->session->set_flashdata('message', 'Logo not updated');
            redirect('admin/logo');
        } else {
            $upload_data = $this->upload->data();
            $values['logo'] = $upload_data['file_name'];
            $this->db->where('logo_id', $id);
            $this->db->update('logo', $values);
            $this->session->set_flashdata('message', 'Logo updated');
            redirect('admin/logo');
        }
    }

    public function update_all_ads_info() {
        $id = $this->input->post('edit_id');
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'jpg|gif|png';
        $config['max_size'] = '1000';
        $this->load->library('upload', $config);
        $file_name = 'all_ads_image';
        if (!$this->upload->do_upload($file_name)) {
            $id = $this->input->post('edit_id');
            $values['all_ads_image'] = $this->input->post('all_ads_image');
            $values['all_ads_link'] = $this->input->post('all_ads_link');
            $this->db->where('id', $id);
            $this->db->update('all_ads', $values);
            $this->session->set_flashdata('message', 'Image not updated');
            redirect('admin/all_market_category');
        } else {
            $upload_data = $this->upload->data();
            $values['all_ads_image'] = $upload_data['file_name'];
            $values['all_ads_link'] = $this->input->post('all_ads_link');
            $this->db->where('id', $id);
            $this->db->update('all_ads', $values);
            $this->session->set_flashdata('message', 'Image updated');
            redirect('admin/all_market_category');
        }
    }

    public function see_it() {

        $this->load->helper('directory'); //load directory helper
        $data['dir'] = "uploads/ajax_image/"; // Your Path to folder
        $data['map'] = directory_map($data['dir']); /* This function reads the directory path specified in the first parameter and             
          builds an array representation of it and all its contained files. */
        $this->load->view('test', $data);
    }

    public function add_contact_us() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');

        $data['contact_info'] = $this->admin_model->all_contact_image();
//            print_r($data['contact_info']);die();
        $this->load->view('add_conatct_us', $data);
        $this->load->view('template/admin/foot');
    }

    public function save_contact_us_info() {
        $data['contact_info'] = $this->admin_model->all_contact_image();
        if ($data['contact_info']) {
            $data1['contact_us_text'] = $this->input->post('contact_us_text');
            $data1['contact_us_phone'] = $this->input->post('contact_us_phone');
            if (empty($_FILES['contact_us_image']['name'])) {
                $data1['contact_us_image'] = $this->input->post('contact_image');
            } else {
                $data['contact_us_image'] = $this->input->post('contact_us_image');
                $config['upload_path'] = 'assets/images/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '0';
                $config['max_width'] = 1280;
                $config['max_height'] = 853;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                $error = array();
                $fdata = array();
                if (!$this->upload->do_upload('contact_us_image')) {
                    $error = $this->upload->display_errors();
                    echo $error;
                } else {
                    $fdata = $this->upload->data();
                    $data1['contact_us_image'] = $config['upload_path'] . $fdata['file_name'];
                }
            }

//            print_r($data1);
//            die();
            $this->admin_model->update_contact_us_info($data1);
        } else {
            $data1['contact_us_text'] = $this->input->post('contact_us_text');
            $data1['contact_us_phone'] = $this->input->post('contact_us_phone');
            //For Image Upload

            $data1['contact_us_image'] = $this->input->post('contact_us_image');

            $config['upload_path'] = 'assets/images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 5000;
            $config['max_width'] = 1280;
            $config['max_height'] = 853;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $error = array();
            $fdata = array();
            if (!$this->upload->do_upload('contact_us_image')) {
                $error = $this->upload->display_errors();
                echo $error;
            } else {
                $fdata = $this->upload->data();
                $data1['contact_us_image'] = $config['upload_path'] . $fdata['file_name'];
            }

//            print_r($data1);die();

            $this->admin_model->save_contact_us_info($data1);
        }

        redirect('admin/add_contact_us');
    }

    public function all_about() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->library('upload');
        $this->load->helper(array('url'));
        $data['all_about_info'] = $this->db->get('about')->row();
        
//        $this->load->view('template/admin/headerlink');
//        $this->load->view('template/admin/head', $data);
//        $this->load->view('template/admin/leftnav');
        $this->load->view('about_all', $data);
//        $this->load->view('template/admin/footerlink');
    }

    public function fileUpload() {
        $attachment_file = $_FILES["attachment_file"];
        $output_dir = "uploads/ajax_image/";
        $fileName = $_FILES["attachment_file"]["name"];
        move_uploaded_file($_FILES["attachment_file"]["tmp_name"], $output_dir . $fileName);
        echo "File uploaded successfully";
    }

    public function update_about() {
        //$data['logo_info'] = $this->db->get('logo')->row();
        $data['description'] = $this->input->post('description');
        $this->db->update('about', $data);
        redirect('admin/all_about');
    }

    public function all_membership() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['all_membership_info'] = $this->db->get('membership')->row();
        
//        $this->load->view('template/admin/headerlink');
//        $this->load->view('template/admin/head', $data);
//        $this->load->view('template/admin/leftnav');
        $this->load->view('membership_all', $data);
//        $this->load->view('template/admin/footerlink');
    }

    public function update_membership() {
        //$data['logo_info'] = $this->db->get('logo')->row();
        $data['description'] = $this->input->post('description');
        $this->db->update('membership', $data);
        redirect('admin/all_membership');
    }

    public function all_hiring() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['all_hiring_info'] = $this->db->get('we_are_hiring')->row();
        
//        $this->load->view('template/admin/headerlink');
//        $this->load->view('template/admin/head', $data);
//        $this->load->view('template/admin/leftnav');
        $this->load->view('hiring_all', $data);
//        $this->load->view('template/admin/footerlink');
    }
    
    
    public function how_sell_first() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['how_to_sell_first'] = $this->db->get('how_to_sell_first')->row();
        
//        $this->load->view('template/admin/headerlink');
//        $this->load->view('template/admin/head', $data);
//        $this->load->view('template/admin/leftnav');
        $this->load->view('how_sell_first', $data);
//        $this->load->view('template/admin/footerlink');
    }
    
    public function update_how_to_sell() {
        $data1['how_to_sell_first'] = $this->admin_model->get_how_to_sell_first();
        $data['how_to_sell_description'] = $this->input->post('description');
        
        if($data1['how_to_sell_first'] == NULL || $data1['how_to_sell_first'] == ''){
            $this->admin_model->insert_how_to_sell_first($data);
        }
        else{
            $this->admin_model->update_how_to_sell_first($data);
        }
        
        redirect('admin/how_sell_first');
    }
    
    public function promote_ad() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['promote_ad'] = $this->db->get('promote_ad')->row();
        
//        $this->load->view('template/admin/headerlink');
//        $this->load->view('template/admin/head', $data);
//        $this->load->view('template/admin/leftnav');
        $this->load->view('promote_ad', $data);
//        $this->load->view('template/admin/foot');
//        $this->load->view('template/admin/footerlink');
    }
    
    public function insert_promote_your_ad() {
        $data1['promote_ad'] = $this->db->get('promote_ad')->row();
        $data['promote_ad_description'] = $this->input->post('description');
//        print_r($data['promote_ad']);die();
        if($data1['promote_ad'] == NULL || $data1['promote_ad'] == ''){
            $this->admin_model->insert_promote_ad_description($data);
        }
        else{
            $this->admin_model->update_promote_ad_description($data);
        }
        
        redirect('admin/promote_ad');
    }
    
    public function stay_safe() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['stay_safe'] = $this->db->get('stay_safe')->row();
        
//        $this->load->view('template/admin/headerlink');
//        $this->load->view('template/admin/head', $data);
//        $this->load->view('template/admin/leftnav');
        $this->load->view('stay_safe_page', $data);
//        $this->load->view('template/admin/foot');
//        $this->load->view('template/admin/footerlink');
    }
    
    public function insert_stay_safe() {
        $data1['stay_safe'] = $this->db->get('stay_safe')->row();
        $data['stay_safe_description'] = $this->input->post('description');
//        print_r($data1['stay_safe']);die();
        if($data1['stay_safe'] == NULL || $data1['stay_safe'] == ''){
            $this->admin_model->insert_stay_safe_description($data);
        }
        else{
            $this->admin_model->update_stay_safe_description($data);
        }
        
        redirect('admin/stay_safe');
    }

    public function update_hiring() {
        //$data['logo_info'] = $this->db->get('logo')->row();
        $data['description'] = $this->input->post('description');
        $this->db->update('we_are_hiring', $data);
        redirect('admin/all_hiring');
    }

    public function all_terms() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['all_terms_info'] = $this->db->get('terms')->row();
        
//        $this->load->view('template/admin/headerlink');
//        $this->load->view('template/admin/head', $data);
//        $this->load->view('template/admin/leftnav');
        $this->load->view('terms_all', $data);
//        $this->load->view('template/admin/footerlink');
    }

    public function update_terms() {
        $data['description'] = $this->input->post('description');
        $this->db->update('terms', $data);
        redirect('admin/all_terms');
    }

    public function all_mail_speech() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['all_mail_speech_info'] = $this->db->get('mail_speech')->row();
        $this->load->view('mail_speech_all', $data);
    }

    public function update_mail_speech() {
        $data['description'] = $this->input->post('description');
        $this->db->update('mail_speech', $data);
        redirect('admin/all_mail_speech');
    }

    public function all_privacy() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['all_privacy_info'] = $this->db->get('privacy')->row();
        
//        $this->load->view('template/admin/headerlink');
//        $this->load->view('template/admin/head', $data);
//        $this->load->view('template/admin/leftnav');
        $this->load->view('privacy_all', $data);
//        $this->load->view('template/admin/footerlink');
    }

    public function update_privacy() {
        $data['description'] = $this->input->post('description');
        $this->db->update('privacy', $data);
        redirect('admin/all_privacy');
    }

    public function advertise() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['all_info'] = $this->db->get('advertise')->result();
        $data['message'] = $this->session->flashdata('message');
        $data['message_error'] = $this->session->flashdata('message_error');
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');
        $this->load->view('advertise_all', $data);
        $this->load->view('template/admin/foot');
    }
    
   public function ad_settings($id=NULL)
    {
        if($id)
        {
            $data['id']=$id;
            $data['get_ad_info']=$this->db->get_where('ad_settings',array('id'=>$id))->row_array();
            // echo "<pre>";
            // print_r($data['get_ad_info']);
            // die();
            $data['logo_info'] = $this->db->get('logo')->row();
            $data['all_info'] = $this->db->get('advertise')->result();
            $data['settings_details'] = $this->admin_model->get_settings_value();
            $this->load->view('template/admin/headerlink');
            $this->load->view('template/admin/head', $data);
            $this->load->view('template/admin/leftnav');
            $this->load->view('ad_settings', $data);
            $this->load->view('template/admin/foot');
        }
        else
        {
            $data['logo_info'] = $this->db->get('logo')->row();
            $data['all_info'] = $this->db->get('advertise')->result();
            $data['settings_details'] = $this->admin_model->get_settings_value();
            $this->load->view('template/admin/headerlink');
            $this->load->view('template/admin/head', $data);
            $this->load->view('template/admin/leftnav');
            $this->load->view('ad_settings', $data);
            $this->load->view('template/admin/foot');
        }
    }

    public function insert_ad()
    {
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'jpg|gif|png';
        $config['max_size'] = '1024';
        $this->load->library('upload', $config);
        $file_name = 'ad_icon';
        if (!$this->upload->do_upload($file_name)) {
            $this->session->set_flashdata('message_error', 'Icon is mandatory and only support JPEG,JPG,PNG,GIF. Image size highest 1MB');
            redirect('admin/ad_settings');
        } else {
            $upload_data = $this->upload->data();
            $values['ad_icon'] = $upload_data['file_name'];
            $values['ad_type'] = $this->input->post('ad_type');
            $values['ad_text'] = $this->input->post('ad_text');
            $values['ad_price'] = $this->input->post('ad_price');
            $values['ad_duration'] = $this->input->post('ad_duration');
            $this->db->insert('ad_settings', $values);
            $this->session->set_flashdata('message_', 'Data inserted');
            redirect('admin/ad_settings');
        }
    }

    public function update_ad()
    {
        $id=$this->input->post('edit_id');
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'jpg|gif|png';
        $config['max_size'] = '1024';
        $this->load->library('upload', $config);
        $file_name = 'ad_icon';
        if (!$this->upload->do_upload($file_name)) {
            
            $values['ad_type'] = $this->input->post('ad_type');
            $values['ad_text'] = $this->input->post('ad_text');
            $values['ad_price'] = $this->input->post('ad_price');
            $values['ad_duration'] = $this->input->post('ad_duration');
            $this->db->where('id',$id);
            $this->db->update('ad_settings', $values);
            $this->session->set_flashdata('message_', 'Data updated');
            redirect('admin/ad_settings');
        } else {
            $upload_data = $this->upload->data();
            $values['ad_icon'] = $upload_data['file_name'];
            $values['ad_type'] = $this->input->post('ad_type');
            $values['ad_text'] = $this->input->post('ad_text');
            $values['ad_price'] = $this->input->post('ad_price');
            $values['ad_duration'] = $this->input->post('ad_duration');
            $this->db->where('id',$id);
            $this->db->update('ad_settings', $values);
            $this->session->set_flashdata('message', 'Data updated');
            redirect('admin/ad_settings');
        }
    }

    public function delete_ad_setting($id)
    {
        $data['id']=$id;
        $this->db->where('id',$data['id']);
        $this->db->delete('ad_settings');
        $this->session->set_flashdata('message', 'Data successfully deleted');
        redirect('admin/ad_settings');
    }
    
    public function add_ad_settings() {
        
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['all_info'] = $this->db->get('advertise')->result();
        $data['message'] = $this->session->flashdata('message');
        $data['message_error'] = $this->session->flashdata('message_error');
        
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');
        
        $this->load->view('add_ad_settings', $data);
        $this->load->view('template/admin/foot');
    }

    public function all_top_ads() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['all_product_info'] = $this->admin_model->get_all_market_product();
        
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');
        
        $this->load->view('all_top_ads', $data);
        $this->load->view('template/admin/foot');
    }
    
    public function pending_top_ads() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['all_product_info'] = $this->admin_model->get_all_market_product();
        
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');
        
        $this->load->view('all_pending_top_ads', $data);
        $this->load->view('template/admin/foot');
    }
    
    public function all_bump_ads() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['all_product_info'] = $this->admin_model->get_all_market_product();
        
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');
        
        $this->load->view('all_bump_ads', $data);
        $this->load->view('template/admin/foot');
    }
    
     public function pending_bump_ads() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['all_product_info'] = $this->admin_model->get_all_market_product();
        
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');
        
        $this->load->view('all_pending_bump_ads', $data);
        $this->load->view('template/admin/foot');
    }

    public function insert_advertise() {
        $post_name=$this->input->post('post_name');
        $get_info=$this->admin_model->get_advertise($post_name);
        $num_count=count($get_info);
        if($num_count==0)
        {
            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'jpg|gif|png';
            $config['max_size'] = '1000';
            $this->load->library('upload', $config);
            $file_name = 'image';
            if (!$this->upload->do_upload($file_name)) {
                $this->session->set_flashdata('message', 'advertise not inserted');
                redirect('admin/advertise');
            } else {
                $upload_data = $this->upload->data();
                $values['image'] = $upload_data['file_name'];
                $values['post_name'] = $this->input->post('post_name');
                $values['link'] = $this->input->post('link');
                $this->db->insert('advertise', $values);
                $this->session->set_flashdata('message', 'advertise inserted');
                redirect('admin/advertise');
            }
        }
        else
        {
            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'jpg|gif|png';
            $config['max_size'] = '1000';
            $this->load->library('upload', $config);
            $file_name = 'image';
            if (!$this->upload->do_upload($file_name)) {
                $values['post_name'] = $this->input->post('post_name');
                $values['link'] = $this->input->post('link');
                $values['image'] = $this->input->post('image');
                $this->db->where('post_name', $post_name);
                $this->db->update('advertise', $values);
                $this->session->set_flashdata('message', 'advertise not inserted');
                redirect('admin/advertise');
            } else {
                $upload_data = $this->upload->data();
                $values['image'] = $upload_data['file_name'];
                $values['post_name'] = $this->input->post('post_name');
                $values['link'] = $this->input->post('link');
                $this->db->where('post_name', $post_name);
                $this->db->update('advertise', $values);
                $this->session->set_flashdata('message', 'advertise Updated');
                redirect('admin/advertise');
            }
        }
    }

    public function delete_advertise($id = NULL) {
        if ($id) {
            $data['id'] = $id;
            $this->db->where('id', $id);
            $this->db->delete('advertise', $data);
            $this->session->set_flashdata('message', 'Data successfullty deleted');
            redirect('admin/advertise');
        }
    }

    public function news_feed() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['all_info'] = $this->db->get('news_feed')->result();
        $data['message'] = $this->session->flashdata('message');
        $data['message_error'] = $this->session->flashdata('message_error');
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');
        $this->load->view('news_feed_all', $data);
        $this->load->view('template/admin/foot');
    }

    public function insert_news_feed() {
        $values['news'] = $this->input->post('news');
        $this->db->insert('news_feed', $values);
        $this->session->set_flashdata('message', 'News Feed inserted');
        redirect('admin/news_feed');
    }

    public function delete_news_feed($id = NULL) {
        if ($id) {
            $data['id'] = $id;
            $this->db->where('id', $id);
            $this->db->delete('news_feed', $data);
            $this->session->set_flashdata('message', 'Data successfullty deleted');
            redirect('admin/news_feed');
        }
    }

    public function all_mail() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->order_by("contact_id", "desc");
        $data['all_info'] = $this->db->get('contact_us')->result();
        $data['message'] = $this->session->flashdata('message');
        $data['message_error'] = $this->session->flashdata('message_error');
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');
        $this->load->view('mail_all', $data);
        $this->load->view('template/admin/foot');
    }

    public function reply_message() {

        $contact_id = $this->input->post('contact_id');
        $email = $this->input->post('email');
        $message = $this->input->post('message');
        $reply_message = $this->input->post('reply_message');


        //insert  into db



        $messag = '<html><body>';
        // $messag. ='<span style="width:30%;">';


        $messag.= '<p><b>Your message: </b>' . $message . '</p>';
        $messag.= '<p><b>Answer: </b>' . $reply_message . '</p>';
        $messag.= '</body></html>';


        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'infiniti.websitewelcome.com',
            'smtp_port' => 465,
            'smtp_user' => 'noreply@geeksntechnology.com',
            'smtp_pass' => '41Rv!HLcIXFv',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );

        $this->load->library('email', $config);


        $this->email->set_newline("\r\n");
        $this->email->from('support@eeanstar.com');
        $this->email->to($email);
        $base = $this->config->base_url();
        $this->email->subject('Reply from meeean.com');
        $this->email->message($messag);


        $this->email->set_mailtype('html');

        $mail = $this->email->send();
        $data = array('status' => 1,);
        $this->admin_model->update_status($contact_id, $data);
        $m_data = array();
        $m_data['message'] = "Your Message Has been Sent Successfully";
        $this->session->set_userdata($m_data);
        redirect('admin/all_mail', 'refresh');
    }

    public function all_market_category() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['all_ads_info'] = $this->db->get('all_ads')->row();
        $data['message'] = $this->session->flashdata('message');
        $data['message_error'] = $this->session->flashdata('message_error');
        $data['all_cat_info'] = $this->db->get('market_category')->result();
        $data['all_sub_cat_info'] = $this->db->get('market_sub_category')->result();
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');
        $data['product_number'] = $this->admin_model->get_product_number();
        $data['market_number'] = $this->admin_model->get_market_number();
        $data['trade_number'] = $this->admin_model->get_trade_number();
        $this->load->view('market_category_view', $data);
        $this->load->view('template/admin/foot');
        //$this->load->view('template/admin/footerlink',$data);
    }

    public function insert_market_category() {
        $config['upload_path'] = 'uploads/market_category/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $this->load->library('upload', $config);
        $file_name = 'market_image';
        if (!$this->upload->do_upload($file_name)) {
            $this->session->set_flashdata('message_error', 'Something went wrong');
            redirect('admin/all_market_category');
        } else {
            $upload_data = $this->upload->data();
            $values['market_image'] = $upload_data['file_name'];
            $values['market_category_name'] = $this->input->post('market_category_name');
            $values['market_category_link'] = $this->input->post('market_category_link');
            $this->db->insert('market_category', $values);
            $this->session->set_flashdata('message', 'Data uploaded');
            redirect('admin/all_market_category');
        }
    }

    public function insert_market_sub_category() {
        $data['market_category_id'] = $this->input->post('market_category_id');
        $data['market_sub_cat_name'] = $this->input->post('market_sub_cat_name');
        $this->db->insert('market_sub_category', $data);
        $this->session->set_flashdata('message', 'Data uploaded');
        redirect('admin/all_market_category');
    }

    // market sub category
    public function edit_sub_category($market_sub_cat_id = NULL) {
        if ($market_sub_cat_id) {
            $data['logo_info'] = $this->db->get('logo')->row();
            $data['market_sub_info'] = $this->db->get_where('market_sub_category', array('market_sub_cat_id' => $market_sub_cat_id))->row();
            $this->load->view('template/admin/headerlink');
            $this->load->view('template/admin/head', $data);
            $this->load->view('template/admin/leftnav');
            $this->load->view('market_sub_category_edit_view', $data);
            $this->load->view('template/admin/foot');
            //$this->load->view('template/admin/footerlink',$data);
        }
    }

    // sub category
    public function edit_sub_cat($sub_cat_id = NULL) {
        if ($sub_cat_id) {
            $data['logo_info'] = $this->db->get('logo')->row();
            $data['sub_cat_info'] = $this->db->get_where('sub_category', array('sub_cat_id' => $sub_cat_id))->row();
            $this->load->view('template/admin/headerlink');
            $this->load->view('template/admin/head', $data);
            $this->load->view('template/admin/leftnav');
            $this->load->view('sub_category_edit_view', $data);
            $this->load->view('template/admin/foot');
        }
    }

    // market sub category
    public function update_market_sub_category() {
        $market_sub_cat_id = $this->input->post('edit_id');
        $data['market_sub_cat_name'] = $this->input->post('market_sub_cat_name');
        $this->db->where('market_sub_cat_id', $market_sub_cat_id);
        $this->db->update('market_sub_category', $data);
        redirect('admin/all_market_category');
    }

    // sub category
    public function update_sub_category() {
        $sub_cat_id = $this->input->post('edit_id');
        $data['sub_cat_name'] = $this->input->post('sub_cat_name');
        $this->db->where('sub_cat_id', $sub_cat_id);
        $this->db->update('sub_category', $data);
        redirect('admin/all_category');
    }

    public function edit_market_category($id = NULL) {
        if ($id) {
            $data['logo_info'] = $this->db->get('logo')->row();
            $data['all_info'] = $this->db->get_where('market_category', array('market_category_id' => $id))->row();
            $data['message'] = $this->session->flashdata('message');
            $data['message_error'] = $this->session->flashdata('message_error');
            $this->load->view('template/admin/headerlink');
            $this->load->view('template/admin/head', $data);
            $this->load->view('template/admin/leftnav');
            $this->load->view('market_category_edit', $data);
            $this->load->view('template/admin/foot');
            //$this->load->view('template/admin/footerlink',$data);
        }
    }

    public function delete_market_category($market_category_id = NULL) {
        if ($market_category_id) {
            $data['market_category_id'] = $market_category_id;
            $this->db->where('market_category_id', $market_category_id);
            $this->db->delete('market_category', $data);
            $data['message'] = $this->session->flashdata('message');
            $data['message_error'] = $this->session->flashdata('message_error');
            redirect('admin/all_market_category');
        }
    }

    public function delete_market_sub_category($market_sub_cat_id = NULL) {
        if ($market_sub_cat_id) {
            $data['market_sub_cat_id'] = $market_sub_cat_id;
            $this->db->where('market_sub_cat_id', $market_sub_cat_id);
            $this->db->delete('market_sub_category', $data);
            $data['message'] = $this->session->flashdata('message');
            $data['message_error'] = $this->session->flashdata('message_error');
            redirect('admin/all_market_category');
        }
    }

    public function edit_category($id = NULL) {
        if ($id) {
            $data['logo_info'] = $this->db->get('logo')->row();
            $data['all_info'] = $this->db->get_where('category', array('cat_id' => $id))->row();
            $data['message'] = $this->session->flashdata('message');
            $data['message_error'] = $this->session->flashdata('message_error');
            $this->load->view('template/admin/headerlink');
            $this->load->view('template/admin/head', $data);
            $this->load->view('template/admin/leftnav');
            $this->load->view('category_edit_view', $data);
            $this->load->view('template/admin/foot');
            //$this->load->view('template/admin/footerlink',$data);
        }
    }

    public function update_category() {
        $cat_id = $this->input->post('edit_id');
        $data['cat_name'] = $this->input->post('cat_name');
        $this->db->where('cat_id', $cat_id);
        $this->db->update('category', $data);
        redirect('admin/all_category');
    }

    public function delete_category($cat_id) {


        $show_status = $this->admin_model->get_specific_cat($cat_id);
        $status = $show_status[0]['status'];
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        $data = array('status' => $status,);

        $this->admin_model->update_cat_status($data, $cat_id);
        $data['message'] = $this->session->flashdata('message');
        $data['message_error'] = $this->session->flashdata('message_error');
        redirect('admin/all_category');
    }

    public function delete_sub_category($sub_cat_id = NULL) {
        if ($sub_cat_id) {
            $data['sub_cat_id'] = $sub_cat_id;
            $this->db->where('sub_cat_id', $sub_cat_id);
            $this->db->delete('sub_category', $data);
            $data['message'] = $this->session->flashdata('message');
            $data['message_error'] = $this->session->flashdata('message_error');
            redirect('admin/all_category');
        }
    }

/////////////////////////   Edited By Aman////////////
    //   	$img_name=$_FILES['userfile']['name'];
    //   	$market_category_id = $this->input->post('market_category_id');
    //   	// echo $market_category_id ;
    //   	$page_link=$this->input->post('page_link');
    // $img_path=$this->upload_img_cat($img_name);
    // $values['market_image']=$img_path;
    // $market_category_id = $this->input->post('market_category_id');
    // $this->admin_model->update_specific_cat_image($values,$market_category_id);
    // $this->session->set_flashdata('message','Data uploaded');
    // redirect('admin/all_market_category');


    public function update_market_cat_ad_image() {
        $id = $this->input->post('edit_id');
        $config['upload_path'] = 'uploads/market_category/';
        $config['allowed_types'] = 'jpg|gif|png';
        $config['max_size'] = '1000';
        $this->load->library('upload', $config);
        $file_name = 'market_image';
        if (!$this->upload->do_upload($file_name)) {
            $id = $this->input->post('edit_id');
            $values['market_image'] = $this->input->post('market_image');
            $values['market_category_name'] = $this->input->post('market_category_name');
            $values['market_category_link'] = $this->input->post('market_category_link');
            $this->db->where('market_category_id', $id);
            $this->db->update('market_category', $values);
            $this->session->set_flashdata('message', 'Image not updated');
            redirect('admin/all_market_category');
        } else {
            $upload_data = $this->upload->data();
            $values['market_image'] = $upload_data['file_name'];
            $values['market_category_name'] = $this->input->post('market_category_name');
            $values['market_category_link'] = $this->input->post('market_category_link');
            $this->db->where('market_category_id', $id);
            $this->db->update('market_category', $values);
            $this->session->set_flashdata('message', 'Image updated');
            redirect('admin/all_market_category');
        }
    }

    public function all_market_product() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['all_product_info'] = $this->admin_model->get_all_market_product();
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');
        $this->load->view('market_all', $data);
        $this->load->view('template/admin/foot');
    }

    public function all_pending_product() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['all_product_info'] = $this->admin_model->get_all_market_product();
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');
        $this->load->view('pending_all', $data);
        $this->load->view('template/admin/foot');
    }

    public function all_featured_product() {
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['all_product_info'] = $this->admin_model->get_all_market_product();
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');
        $this->load->view('featured_all', $data);
        $this->load->view('template/admin/foot');
    }

    public function update_market_product($p_id) {
        $product_details = $this->admin_model->get_specific_market_product($p_id);
        $status = $product_details[0]['market_place_is_block'];
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        $data = array('market_place_is_block' => $status,);

        $this->admin_model->update_market_product_status($data, $p_id);
        redirect('admin/all_market_product', 'refresh');
    }

    public function update_product_market_feature($p_id) {
        $product_details = $this->admin_model->get_specific_market_product($p_id);
        $is_feature = $product_details[0]['is_feature'];
        if ($is_feature == 0) {
            $is_feature = 1;
        } else {
            $is_feature = 0;
        }
        $data = array('is_feature' => $is_feature,);

        $this->admin_model->update_market_product_status($data, $p_id);
        redirect('admin/all_market_product', 'refresh');
    }

    public function market_sponsor() {
        $data['logo_info'] = $this->db->get('logo')->row();

        $data['message'] = $this->session->flashdata('message');
        $data['message_error'] = $this->session->flashdata('message_error');
        $data['all_sponsor'] = $this->db->get('market_sponsor')->result();
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');
        $data['product_number'] = $this->admin_model->get_product_number();
        $data['market_number'] = $this->admin_model->get_market_number();
        $data['trade_number'] = $this->admin_model->get_trade_number();
        $this->load->view('view_sponsor.php', $data);
        $this->load->view('template/admin/foot');
        // $this->load->view('template/admin/footerlink',$data);
    }

    public function insert_market_sponsor() {
        $img_name = $_FILES['userfile']['name'];
        $sponsor_name = $this->input->post('sponsor_name');
        $sponsor_link = $this->input->post('sponsor_link');
        $page_link = $this->input->post('page_link');
        $img_path = $this->upload_img($img_name, $page_link);
        $data = array(
            'sponsor_name' => $sponsor_name,
            'sponsor_image' => $img_path,
            'sponsor_link' => $sponsor_link,
        );
        $this->admin_model->insert_sponsor($data);
        redirect('admin/market_sponsor', 'refresh');
    }

    public function upload_img($name, $page_link) {

        $url = base_url();
        $image_name = uniqid() . '_' . $name;
        $config = array();
        $config['upload_path'] = 'uploads/sponsor/';
        $config['file_name'] = $image_name;
        $config['overwrite'] = TRUE;
        $config["allowed_types"] = 'gif|jpg|png';
        $config['max_size'] = '0';
        $this->load->library('upload', $config);

        $this->upload->data();
        $this->upload->initialize($config);

        if (!$this->upload->do_upload()) {
            $this->session->set_flashdata('message_error', 'Something went wrong');
            redirect('admin/', $page_link);
        } else {
            return $image_name;
            // echo 'success';                          
        }
    }

    public function upload_img_cat($name) {

        $url = base_url();
        $image_name = uniqid() . '_' . $name;
        $config = array();
        $config['upload_path'] = 'assets/images/';
        $config['file_name'] = $image_name;
        $config['overwrite'] = TRUE;
        $config["allowed_types"] = 'gif|jpg|png';
        $config['max_size'] = '0';
        $this->load->library('upload', $config);

        $this->upload->data();
        $this->upload->initialize($config);

        if (!$this->upload->do_upload()) {
            $error_msg = $this->upload->display_errors();
            $this->session->set_flashdata('message_error', $error_msg);
            redirect('admin/all_market_category');
        } else {
            return $image_name;
            // echo 'success';                          
        }
    }

    public function delete_sponsor($sp_id) {
        $this->admin_model->delete_sponsor($sp_id);
        redirect('admin/market_sponsor', 'refresh');
    }

    public function delete_trade($id) {
        $this->admin_model->delete_trade($id);
        redirect('admin/all_trade', 'refresh');
    }

    public function change_password() {
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
            $this->admin_model->password_change($data, $reg_id);
        }


        redirect('logout', 'refresh');
    }

    public function update_member_type() {
        $reg_id = $this->input->post('reg_id');
        $data['member_type'] = $this->input->post('type');

        $this->db->where('reg_id', $reg_id);
        $this->db->update('registration', $data);
        redirect('admin/all_user');
    }

   
    public function social_link() {
        $data['logo_info'] = $this->db->get('logo')->row();

        $data['message'] = $this->session->flashdata('message');
        $data['message_error'] = $this->session->flashdata('message_error');
        $data['all_social_link'] = $this->db->get('social_link')->result();
//        print_r($data['all_social_link']);die();
        $this->load->view('template/admin/headerlink');
        $this->load->view('template/admin/head', $data);
        $this->load->view('template/admin/leftnav');
        $this->load->view('view_social_link.php', $data);
        $this->load->view('template/admin/foot');
    }
    
    public function insert_social_link() {
        $data['fb_link'] = $this->input->post('fb_link');
        $data['tweet_link'] = $this->input->post('tweet_link');
        $data['google_plus_link'] = $this->input->post('google_plus_link');
//        print_r($data);die();
        $data1 = $this->db->get('social_link')->result();
//        print_r($data);die();
        if($data1[0]->fb_link == NULL || $data1[0]->fb_link == '' && $data1[0]->tweet_link == NULL || $data1[0]->tweet_link == '' && $data1[0]->google_plus_link == NULL || $data1[0]->google_plus_link == ''){
            $this->db->insert('social_link',$data);
        }
        if($data1[0]->fb_link != NULL || $data1[0]->fb_link != ''){
            $this->admin_model->update_fb_link($data['fb_link']);
        }
        
        if($data1[0]->tweet_link != NULL || $data1[0]->tweet_link != ''){
            $this->admin_model->update_tweet_link($data['tweet_link']);
        }
        
        if($data1[0]->google_plus_link != NULL || $data1[0]->google_plus_link != ''){
            $this->admin_model->update_google_link($data['google_plus_link']);
        }
        
        
        redirect('admin/social_link','refresh');
    }
    
    

}
