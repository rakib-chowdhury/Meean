<?php

class Market_place extends CI_Controller
{
    //put your code here

    public function __construct()
    {
        parent::__construct();


        $this->load->model('market_place_model');
        $this->load->model('login/login_model');
        $this->load->helper('text');
        $this->load->library("pagination");
        $this->load->helper('html');
        $this->load->library('email');
        $this->load->library('session');
    }

    public function index()
    {
        $data['count_viewers'] = $this->market_place_model->total_viewers_count();
//        print_r($data['count_viewers']);die();
        $total_hit = $data['count_viewers']->viewers_count + 1;
//        echo $total_hit;die();
        $data1['viewers_count'] = $total_hit;
        date_default_timezone_set("Asia/Dhaka");
        $data1['viewers_date'] = date('Y-m-d H:i:s');
//        print_r($data1);die();
        $this->market_place_model->viewers_count($data1);
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['contact_info'] = $this->db->get('contact_us_image')->row_array();
        $data['all_market_slider_info'] = $this->market_place_model->get_market_slider();
        $data['advertise'] = $this->market_place_model->select_advertise();
        $data['select_market_category'] = $this->market_place_model->select_market_category();
        $data['select_market_cat'] = $this->market_place_model->select_market_cat();/////iti///
        //$data['about_info']=$this->db->get('about')->row();
//        $data['sidebar_category']= "1";
//        $this->load->view('header',$data);
        // $data['market_slider_image']=$this->market_place_model->select_slider_image();
        $data['select_market_location'] = $this->market_place_model->select_market_location();
        $data['market_category_with_sub_category'] = $this->market_place_model->market_category_with_sub_category();
        $data['sponsor'] = $this->market_place_model->get_sponsor();
        $data['feature_product'] = $this->market_place_model->get_feature_product();
        $data['market_place_description'] = $this->market_place_model->market_place_description();
//        print_r($data['market_category_with_sub_category']);
//        exit();
        $this->load->view('market_content/market_header', $data);
        $this->load->view('view_market_place', $data);
        $this->load->view('market_content/footer', $data);
    }

    public function market_place_by_sub_category($market_place_id)
    {
//        if(file_exists('assets/watermark.png')){
//            echo 'iif';
//        }else{
//            echo 'eelse';
//        }
//        die();

        $data['file_url'] = 'assets/product_images/';
        $data['contact_info'] = $this->db->get('contact_us_image')->row_array();
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['about_info'] = $this->db->get('about')->row();
        $data['market_place_description'] = $this->market_place_model->select_description_market_place_id($market_place_id);
        $data['members_details'] = $this->market_place_model->members_details($data['market_place_description'][0]->reg_id);
        $data['select_sub_images'] = $this->market_place_model->select_sub_images_by_id($market_place_id);
        $data['related_product'] = $this->market_place_model->select_related_product($data['market_place_description'][0]->market_category_id);
//        $data['sidebar_category']= "1";
//        $this->load->view('header',$data);
        //echo '<pre>'; print_r($data['select_sub_images']); die();
        //echo '<pre>';   print_r(site_url().'>>>>>'.base_url());  exit();
        $this->load->view('market_content/market_header', $data);
        $this->load->view('market_place_sub_category', $data);
        $this->load->view('market_content/footer', $data);
    }

    public function market_memebrs($reg_id)
    {
        $data['contact_info'] = $this->db->get('contact_us_image')->row_array();
        $data['product_info'] = $this->market_place_model->get_members_product($reg_id);
        $data['mem_info'] = $this->db->get_where('reg_members', array('reg_id' => $reg_id))->row();
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['about_info'] = $this->db->get('about')->row();
        $data['members_details'] = $this->market_place_model->members_detail_info($reg_id);


        $data['market_place'] = $this->market_place_model->members_market_place_description($reg_id);
        $total_rows = count($data['market_place']);
        $config['base_url'] = base_url() . 'index.php/market_place/market_memebrs/' . $reg_id;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = "10";
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
//        echo '<pre>';print_r($data['members_details']);
//         die();
        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        //call the model function to get the department data
        $data['market_place_description'] = $this->market_place_model->member_market_place_description_pagination_all($config["per_page"], $data['page'], $reg_id);
        $data['pagination'] = $this->pagination->create_links();


        $data['bump_ad_settings'] = $this->market_place_model->all_bump_settings();
        $data['top_ad_settings'] = $this->market_place_model->all_top_settings();
//        echo '<pre>';print_r($data['market_place_description']);die();
        $data['all_top_product'] = 0;
        if ($data['top_ad_settings']) {
            $data['all_top_product'] = $this->market_place_model->get_all_top_product_by_reg_id($reg_id, $data['top_ad_settings'][0]->ad_duration);
        }
//        echo '<pre>';print_r($data['all_top_product']);die();
        $data['bump_ad'] = 0;
        if ($data['bump_ad_settings']) {
            $data['bump_ad'] = $this->market_place_model->get_all_bump_product_by_reg_id($reg_id, $data['bump_ad_settings'][0]->ad_duration);
        }
//        echo '<pre>';print_r($data['bump_ad']);die();
        $this->load->view('market_content/market_header', $data);
        $this->load->view('market_place_members_detail', $data);
        $this->load->view('market_content/footer', $data);
    }

    public function market_place_by_product()
    {
        $data['file_url'] = 'assets/product_images/';
        $data['contact_info'] = $this->db->get('contact_us_image')->row_array();
        $data['all_ads_info'] = $this->db->get('all_ads')->row();
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['market_place'] = $this->market_place_model->market_place_description();
        $total_rows = count($data['market_place']);
        $config['base_url'] = base_url() . 'index.php/market_place/market_place_by_product';
        $config['total_rows'] = $total_rows;
        $config['per_page'] = "10";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //call the model function to get the department data
        $data['market_place_description'] = $this->market_place_model->market_place_description_pagination_all($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();


        $data['bump_ad_settings'] = $this->market_place_model->all_bump_settings();
        $data['top_ad_settings'] = $this->market_place_model->all_top_settings();
        //echo '<pre>';print_r($data['top_ad_settings']);die();
        $all_existence_top = $this->market_place_model->all_top_product($data['top_ad_settings'][0]->ad_duration);
        $all_existence_bump = $this->market_place_model->all_bump_product($data['top_ad_settings'][0]->ad_duration);
        //$data['all_top_product'] = $this->market_place_model->get_duration();
        //echo '<pre>';print_r($data['all_top_product']);die();
        foreach ($all_existence_top as $row) {
            $market_place_id = $row['market_place_id'];
//            $top_ad_type = $row['top_ad'];
            $this->market_place_model->update_top_product($market_place_id);
        }

        foreach ($all_existence_bump as $row) {
            $market_place_id = $row['market_place_id'];
//            $top_ad_type = $row['top_ad'];
            $this->market_place_model->update_bump_product($market_place_id);
        }

        $data['all_top_product'] = 0;
        //print_r($data['top_ad_settings']);die();
        if ($data['top_ad_settings']) {
            $data['all_top_product'] = $this->market_place_model->get_all_top_product($data['top_ad_settings'][0]->ad_duration);
        }
        $data['bump_ad'] = 0;
        if ($data['bump_ad_settings']) {
            $data['bump_ad'] = $this->market_place_model->get_all_bump_product($data['bump_ad_settings'][0]->ad_duration);
        }

        $data['about_info'] = $this->db->get('about')->row();
        $data['select_market_category'] = $this->market_place_model->select_market_category();
        $data['select_market_cat'] = $this->market_place_model->select_market_cat();/////iti///
        $data['select_market_location'] = $this->market_place_model->select_market_location();
        $data['market_category_with_sub_category'] = $this->market_place_model->market_category_with_sub_category();
        $data['advertise'] = $this->market_place_model->select_advertise();


//        echo '<pre>';print_r($data['all_bump_product']);die();

        $this->load->view('market_content/market_header', $data);
        $this->load->view('view_market_product', $data);
        $this->load->view('market_content/footer', $data);
    }

    public function market_place_by_search_product()
    {
        $data['contact_info'] = $this->db->get('contact_us_image')->row_array();
        $data['logo_info'] = $this->db->get('logo')->row();
        //$data['market_place']=  $this->market_place_model->market_place_description();


        $keyword = '';
        if ($this->input->post('keyword')) {
            $keyword = $this->input->post('keyword');
        } else {
            $keyword = $this->session->userdata('keyword');
        }
        $this->session->set_userdata('keyword', $keyword);

        $data['results'] = $this->market_place_model->search($keyword);
        $total_rows = count($data['results']);

        $config['base_url'] = base_url() . 'index.php/market_place/market_place_by_search_product';
        $config['total_rows'] = $total_rows;
        $config['per_page'] = "10";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 3;

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //call the model function to get the department data
        $data['market_place_description'] = $this->market_place_model->market_place_description_pagination($config["per_page"], $data['page'], $keyword);
        $data['pagination'] = $this->pagination->create_links();

        $data['bump_ad_settings'] = $this->market_place_model->all_bump_settings();
        $data['top_ad_settings'] = $this->market_place_model->all_top_settings();

        $data['all_top_product'] = 0;
        if ($data['top_ad_settings']) {
            $data['all_top_product'] = $this->market_place_model->get_all_top_product_by_keyword($keyword, $data['top_ad_settings'][0]->ad_duration);
        }
//        echo '<pre>';print_r($data['all_top_product']);die();

        $data['bump_ad'] = 0;
        if ($data['bump_ad_settings']) {
            $data['bump_ad'] = $this->market_place_model->get_all_bump_product_by_keyword($keyword, $data['bump_ad_settings'][0]->ad_duration);
        }


        $data['about_info'] = $this->db->get('about')->row();
        $data['select_market_category'] = $this->market_place_model->select_market_category();
        $data['select_market_cat'] = $this->market_place_model->select_market_cat();/////iti///
        $data['select_market_location'] = $this->market_place_model->select_market_location();
        $data['market_category_with_sub_category'] = $this->market_place_model->market_category_with_sub_category();
        $data['advertise'] = $this->market_place_model->select_advertise();


        $this->load->view('market_content/market_header', $data);
        $this->load->view('view_search_product', $data);
        $this->load->view('market_content/footer', $data);
    }

    public function post_add()
    { ///iti
        $data['logo_info'] = $this->db->get('logo')->row();
        if ($this->session->userdata('type') == 2) {
            redirect('logout');
        } elseif ($this->session->userdata('type') == 3) {
            redirect('logout');
        } elseif ($this->session->userdata('type') == 4) {
            redirect('seller/add_market_place_product');
        } else {
            redirect('login');
        }
    }

    public function Product_detail($product_id)
    {
        $data['contact_info'] = $this->db->get('contact_us_image')->row_array();
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['about_info'] = $this->db->get('about')->row();
        $data['news_feed'] = $this->market_place_model->select_news_feed();
        $this->load->view('header', $data);

        $data['product_details'] = $this->market_place_model->select_product_details_by_id($product_id);

        $this->load->view('product_detail_all', $data);
        $this->load->view('market_content/footer', $data);
    }

    public function get_district()
    {
        $division_id = $this->input->post('division_id');
//        echo $division_id;die();
        $all_district = $this->login_model->get_district_by_div_id($division_id);

        echo '<option value="" >Select Your District</option>';
        foreach ($all_district as $row) {
            echo '<option value="' . $row['dist_id'] . '">' . $row['en_dist_name'] . '</option>';
        }

    }

    public function get_upazilla()
    {
        $district_id = $this->input->post('district_id');
//        echo $district_id;die();
//        $reg_id = $this->input->post('reg_id');
        $all_upazilla = $this->login_model->get_upazilla_by_dist_id($district_id);

//        print_r($all_district);die();
        echo '<option value="" >Select Your Upazilla</option>';
        foreach ($all_upazilla as $row) {
            echo '<option value="' . $row['upz_id'] . '">' . $row['en_upz_name'] . '</option>';
        }
    }

    public function product_search()
    {    	
        $data['contact_info'] = $this->db->get('contact_us_image')->row_array();
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->load->helper('text');
        $data['about_info'] = $this->db->get('about')->row();
        $data['all_market_info'] = $this->db->get('market_place')->result();
        $market_category_id = $this->input->post('market_category_id');
        $location_name = $this->input->post('location_name');
        $district = $this->input->post('district');
        $upazilla = $this->input->post('upazilla');
        $minimum = $this->input->post('minimum');
        $maximum = $this->input->post('maximum');
        $view_ads = $this->input->post('view_ads');

        if ($this->input->post('market_category_id') || $this->input->post('location_name') || $this->input->post('minimum') || $this->input->post('maximum') || $this->input->post('view_ads')) {
            $data = array(
               $data['market_category_id'] = $market_category_id,
                'location_name' => $location_name,
                'district_id' => $district,
                'upazilla_id' => $upazilla,
                'minimum' => $minimum,
                'maximum' => $maximum,
                'view_ads' => $view_ads
            );
            $data['market_category_id'] = 
            $this->session->set_userdata($data);
            //print_r(($data));
            //die();
        }


        $data['contact_info'] = $this->db->get('contact_us_image')->row_array();
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['category_ad'] = $this->market_place_model->select_ad_by_category($market_category_id);

        $data['select_market_category'] = $this->market_place_model->select_market_category();
        $data['select_market_location'] = $this->market_place_model->select_market_location();
        $data['market_category_with_sub_category'] = $this->market_place_model->market_category_with_sub_category();

        $data['market_place'] = $this->market_place_model->market_place_description_by_search2($market_category_id, $location_name, $minimum, $maximum, $district, $upazilla, $view_ads);


//        echo '<pre>';
//        //print_r($data['market_place']);
//        foreach ($data['market_place'] as $ty)
//        {
//            echo '=='.$ty->market_place_id.'--'.$ty->members_status;
//        }
//        die();

        $total_rows = count($data['market_place']);
        $config['base_url'] = base_url() . 'index.php/market_place/product_search';
        $config['total_rows'] = $total_rows;
        $config['per_page'] = "10";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //call the model function to get the department data
        $data['market_place_description'] = $this->market_place_model->market_place_description_by_search_pagination2($market_category_id, $location_name, $minimum, $maximum, $district, $upazilla, $config["per_page"], $data['page'], $view_ads);

        //print_r($data['market_place_description']); die();
        $data['pagination'] = $this->pagination->create_links();
        $data['advertise'] = $this->market_place_model->select_advertise();
        $data['select_market_category'] = $this->market_place_model->select_market_category();
        $data['select_market_cat'] = $this->market_place_model->select_market_cat();/////iti///
        $data['slider_image'] = $this->market_place_model->select_slider_image();
        $data['select_market_location'] = $this->market_place_model->select_market_location();
        $data['market_category_with_sub_category'] = $this->market_place_model->market_category_with_sub_category();
        $data['sponsor'] = $this->market_place_model->get_sponsor();
        $data['advertise'] = $this->market_place_model->select_advertise();

        $data['bump_ad_settings'] = $this->market_place_model->all_bump_settings();
        $data['top_ad_settings'] = $this->market_place_model->all_top_settings();

        $data['all_top_product'] = 0;

        if ($data['top_ad_settings']) {
            $data['all_top_product'] = $this->market_place_model->get_all_top_product_by_search2($market_category_id, $location_name, $minimum, $maximum, $district, $upazilla,$data['top_ad_settings'][0]->ad_duration,$view_ads);
        }
//        echo '<pre>';print_r($data['all_top_product']);die();

        $data['bump_ad'] = 0;
        if ($data['bump_ad_settings']) {
            $data['bump_ad'] = $this->market_place_model->get_all_bump_product_by_search2($market_category_id, $location_name, $minimum, $maximum, $district, $upazilla, $data['bump_ad_settings'][0]->ad_duration,$view_ads);
        } //echo 'dfs';die();
        $data['file_url'] = 'assets/product_images/';
	//echo '<pre>';print_r($data['file_url']);die();
        $this->load->view('market_content/market_header', $data);
        $this->load->view('view_market_product_search_specific', $data);
        $this->load->view('market_content/footer', $data);
    }

    public function product_cat_filter($cat_id)
    {
    	$data['file_url'] = 'assets/product_images/';
        $data['contact_info'] = $this->db->get('contact_us_image')->row_array();
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['category_ad'] = $this->market_place_model->select_ad_by_category($cat_id);
        $data['select_market_cat'] = $this->market_place_model->select_market_cat();/////iti///
        $data['select_market_category'] = $this->market_place_model->select_market_category();
        $data['select_market_location'] = $this->market_place_model->select_market_location();
        //print_r($data['category_ad']);die();

        $data['market_place'] = $this->market_place_model->market_place_filter_by_cat($cat_id);
        $total_rows = count($data['market_place']);
        $config['base_url'] = base_url() . 'index.php/market_place/product_cat_filter/' . $cat_id;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = "10";
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        //call the model function to get the department data
        $data['view_ads'] = $this->input->post('view_ads');
       // print_r($data['view_ads']);die();
        $data['market_place_description'] = $this->market_place_model->market_place_filter_by_cat_pagination2($cat_id, $config["per_page"], $data['page'], $data['view_ads']);
        $data['pagination'] = $this->pagination->create_links();
        $data['advertise'] = $this->market_place_model->select_advertise();

        $data['bump_ad_settings'] = $this->market_place_model->all_bump_settings();
        $data['top_ad_settings'] = $this->market_place_model->all_top_settings();

        $data['all_top_product'] = 0;
        if ($data['top_ad_settings']) {
            $data['all_top_product'] = $this->market_place_model->get_all_top_product_by_category2($cat_id, $data['top_ad_settings'][0]->ad_duration, $data['view_ads']);
        }
//        echo '<pre>';print_r($data['all_top_product']);die();
        $data['bump_ad'] = 0;
        if ($data['bump_ad_settings']) {
            $data['bump_ad'] = $this->market_place_model->get_all_bump_product_by_category2($cat_id, $data['bump_ad_settings'][0]->ad_duration, $data['view_ads']);
        }

        $data['market_category_with_sub_category'] = $this->market_place_model->market_category_with_sub_category();
        $this->load->view('market_content/market_header', $data);
        $this->load->view('view_market_product_search', $data);
        $this->load->view('market_content/footer', $data);
    }

    public function product_sub_cat_filter($cat_id)
    {
	$data['file_url'] = 'assets/product_images/';
        $data['contact_info'] = $this->db->get('contact_us_image')->row_array();
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['category_ad'] = $this->market_place_model->select_ad_by_sub_category($cat_id);

        //print_r($data['category_ad']);die();

        $data['select_market_category'] = $this->market_place_model->select_market_category();
        $data['select_market_location'] = $this->market_place_model->select_market_location();
        $data['market_place'] = $this->market_place_model->market_place_filter_by_sub_cat($cat_id);
        $total_rows = count($data['market_place']);
        $config['base_url'] = base_url() . 'index.php/market_place/product_sub_cat_filter/' . $cat_id;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = "10";
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        //call the model function to get the department data
        $data['market_place_description'] = $this->market_place_model->market_place_filter_by_sub_cat_pagination($cat_id, $config["per_page"], $data['page']);
        //echo '<pre>';print_r($data['market_place_description']);die();
        $data['pagination'] = $this->pagination->create_links();

        $data['advertise'] = $this->market_place_model->select_advertise();

        $data['bump_ad_settings'] = $this->market_place_model->all_bump_settings();
        $data['top_ad_settings'] = $this->market_place_model->all_top_settings();

        $data['all_top_product'] = 0;
        if ($data['top_ad_settings']) {
            $data['all_top_product'] = $this->market_place_model->get_all_top_product_by_subcategory($cat_id, $data['top_ad_settings'][0]->ad_duration);
        }
//        echo '<pre>';print_r($data['all_top_product']);die();
        $data['bump_ad'] = 0;
        if ($data['bump_ad_settings']) {
            $data['bump_ad'] = $this->market_place_model->get_all_bump_product_by_subcategory($cat_id, $data['bump_ad_settings'][0]->ad_duration);
        }

        $data['select_market_cat'] = $this->market_place_model->select_market_cat();
        $data['market_category_with_sub_category'] = $this->market_place_model->market_category_with_sub_category();

        $this->load->view('market_content/market_header', $data);
        $this->load->view('view_market_product_search', $data);
        $this->load->view('market_content/footer', $data);
    }

    public function search_by_location($location_id)
    {
        $data['contact_info'] = $this->db->get('contact_us_image')->row_array();
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['select_market_cat'] = $this->market_place_model->select_market_cat();
        $data['market_category_with_sub_category'] = $this->market_place_model->market_category_with_sub_category();
        $data['select_market_category'] = $this->market_place_model->select_market_category();
        $data['select_market_location'] = $this->market_place_model->select_market_location();
        $data['market_place'] = $this->market_place_model->select_product_by_location($location_id);
        $total_rows = count($data['market_place']);
        $config['base_url'] = base_url() . 'index.php/market_place/product_sub_cat_filter/' . $location_id;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = "10";
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        //call the model function to get the department data
        $data['select_product_by_location'] = $this->market_place_model->select_product_by_location_pagination($location_id, $config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
        $data['advertise'] = $this->market_place_model->select_advertise();

        $data['bump_ad_settings'] = $this->market_place_model->all_bump_settings();
        $data['top_ad_settings'] = $this->market_place_model->all_top_settings();

        $data['all_top_product'] = 0;
        if ($data['top_ad_settings']) {
            $data['all_top_product'] = $this->market_place_model->get_all_top_product_by_location($location_id, $data['top_ad_settings'][0]->ad_duration);
        }
//        echo '<pre>';
//                print_r($data['all_top_product']);die();
        $data['bump_ad'] = 0;
        if ($data['bump_ad_settings']) {
            $data['bump_ad'] = $this->market_place_model->get_all_bump_product_by_location($location_id, $data['bump_ad_settings'][0]->ad_duration);
        }

        $this->load->view('market_content/market_header', $data);
        $this->load->view('view_market_product_by_location', $data);
        $this->load->view('market_content/footer', $data);
    }

    public function contact_us()
    {
        $name = $this->input->post('name');
        $email_address = $this->input->post('email_address');
        $phone = $this->input->post('phone');
        $subject = $this->input->post('subject');
        $description = $this->input->post('description');
        $company_name = $this->input->post('company_name');

        $data_contact = array(
            'name' => $name,
            'email' => $email_address,
            'phone' => $phone,
            'subject' => $subject,
            'description' => $description,
            'company_name' => $company_name
        );
//insert  into db

        $this->market_place_model->insert_contact_us_data($data_contact);

        $messag = '<html><body>';
        // $messag. ='<span style="width:30%;">';
        $messag .= '<p><b>Sender name: </b>' . $name . '</p>';
        $messag .= '<p><b>Sender email: </b>' . $email_address . '</p>';
        $messag .= '<p><b>Sender message: </b>' . $description . '</p>';
        $messag .= '</body></html>';


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
        $this->email->from($email_address, 'meeean');
        $this->email->to('support@meeean.com');
        $base = $this->config->base_url();
        $this->email->subject('Meeean problem issue');
        $this->email->message($messag);


        $this->email->set_mailtype('html');

        $mail = $this->email->send();
        redirect('market_place', 'refresh');

    }

    public function contact_with_user()
    {
//         $data['logo_info']=$this->db->get('logo')->row();
        $name = $this->input->post('name');
        $mail_id = $this->input->post('mail_id');
        $mobile_number = $this->input->post('mobile_number');
        $mail_message = $this->input->post('mail_message');
        $sender_mail = $this->input->post('sender_mail');
        $sender_id = $this->input->post('sender_id');
        $sender_link = $this->input->post('sender_link');

//             echo $sender_mail;die();
        $messag = '<html><body>';
        //$messag. ='<span style="width:30%;">';
        $messag .= '<p><b>Buyer Name: </b>' . $name . '</p>';
        $messag .= '<p><b>Buyer Phone Number: </b>' . $mobile_number . '</p>';
        $messag .= '<p><b>Sender message: </b>' . $mail_message . '</p>';
        $messag .= '<p><b>Sender link: </b>' . $sender_link . '</p>';
        $messag .= '</body></html>';


        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'infiniti.websitewelcome.com',
            'smtp_port' => 465,
            'smtp_user' => 'noreply@geeksntechnology.com',
            'smtp_pass' => '41Rv!HLcIXFv',
            'mailtype' => 'html',
            'charset' => 'iso-88510-1'
        );

        $this->load->library('email', $config);


        $this->email->set_newline("\r\n");
        $this->email->from($mail_id, 'Meeean');
        $this->email->to($sender_mail);
        $base = $this->config->base_url();
        $this->email->subject('Product inquery | meeean');
        $this->email->message($messag);


        $this->email->set_mailtype('html');

        if ($this->email->send()) {
            echo '1';
        } else {
            echo '0';
        }

    }

}
