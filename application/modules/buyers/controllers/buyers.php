<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buyers extends MX_Controller {

  public function __construct() {
        parent::__construct();

        $this->load->library("pagination");        
        $this->load->model('buyer_model');
        $this->load->model('home/home_model');
        $this->load->helper('url');
    }

	public function index()
	{
        $this->load->helper('text');
        $data['logo_info']=$this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info']=$this->db->get('news_feed')->result();
        $data['about_info']=$this->db->get('about')->row();
         $data['feature_product_1']= $this->buyer_model->select_feature_product_1();
        $data['innovative_product_1']= $this->buyer_model->select_innovative_product_1();
        $data['advertise']=  $this->buyer_model->select_advertise();
	$data['news_feed']=  $this->buyer_model->select_news_feed();
	$data['sidebar_category']="";
        
//        $data['select_abcd_product']=  $this->buyer_model->select_abcd_category();
       $data['a_category']=  $this->buyer_model->select_a_category();
       $data['b_category']=  $this->buyer_model->select_b_category();
       $data['c_category']=  $this->buyer_model->select_c_category();
       $data['d_category']=  $this->buyer_model->select_d_category();
       $data['e_category']=  $this->buyer_model->select_e_category();
       $data['f_category']=  $this->buyer_model->select_f_category();
       $data['g_category']=  $this->buyer_model->select_g_category();
       $data['h_category']=  $this->buyer_model->select_h_category();
       $data['i_category']=  $this->buyer_model->select_i_category();
       $data['j_category']=  $this->buyer_model->select_j_category();
       $data['k_category']=  $this->buyer_model->select_k_category();
       $data['l_category']=  $this->buyer_model->select_l_category();
       $data['m_category']=  $this->buyer_model->select_m_category();
       $data['n_category']=  $this->buyer_model->select_n_category();
       $data['o_category']=  $this->buyer_model->select_o_category();
       $data['p_category']=  $this->buyer_model->select_p_category();
       $data['q_category']=  $this->buyer_model->select_q_category();
       $data['r_category']=  $this->buyer_model->select_r_category();
       $data['s_category']=  $this->buyer_model->select_s_category();
       $data['t_category']=  $this->buyer_model->select_t_category();
       $data['u_category']=  $this->buyer_model->select_u_category();
       $data['v_category']=  $this->buyer_model->select_v_category();
       $data['w_category']=  $this->buyer_model->select_w_category();
       $data['x_category']=  $this->buyer_model->select_x_category();
       $data['y_category']=  $this->buyer_model->select_y_category();
       $data['z_category']=  $this->buyer_model->select_z_category();

       
       $data['sub_category_1']=  $this->buyer_model->select_sub_category_1();
       $data['sub_category_2']=  $this->buyer_model->select_sub_category_2();
       $data['sub_category_3']=  $this->buyer_model->select_sub_category_3();
       $data['sub_category_4']=  $this->buyer_model->select_sub_category_4();
       $data['sub_category_5']=  $this->buyer_model->select_sub_category_5();
       $data['sub_category_6']=  $this->buyer_model->select_sub_category_6();
       $data['sub_category_7']=  $this->buyer_model->select_sub_category_7();
       $data['sub_category_8']=  $this->buyer_model->select_sub_category_8();
       $data['sub_category_9']=  $this->buyer_model->select_sub_category_9();
       $data['sub_category_10']=  $this->buyer_model->select_sub_category_10();
       $data['sub_category_11']=  $this->buyer_model->select_sub_category_11();
       $data['sub_category_12']=  $this->buyer_model->select_sub_category_12();
       $data['sub_category_13']=  $this->buyer_model->select_sub_category_13();
       $data['sub_category_14']=  $this->buyer_model->select_sub_category_14();
       $data['sub_category_15']=  $this->buyer_model->select_sub_category_15();
       $data['sub_category_16']=  $this->buyer_model->select_sub_category_16();
       $data['sub_category_17']=  $this->buyer_model->select_sub_category_17();
       $data['sub_category_18']=  $this->buyer_model->select_sub_category_18();
       $data['sub_category_19']=  $this->buyer_model->select_sub_category_19();
       $data['sub_category_20']=  $this->buyer_model->select_sub_category_20();
       $data['sub_category_21']=  $this->buyer_model->select_sub_category_21();
       $data['sub_category_22']=  $this->buyer_model->select_sub_category_22();
       $data['sub_category_23']=  $this->buyer_model->select_sub_category_23();
       $data['sub_category_24']=  $this->buyer_model->select_sub_category_24();
       $data['sub_category_25']=  $this->buyer_model->select_sub_category_25();
       $data['sub_category_26']=  $this->buyer_model->select_sub_category_26();
       $data['sub_category_27']=  $this->buyer_model->select_sub_category_27();
       $data['sub_category_28']=  $this->buyer_model->select_sub_category_28();
       $data['sub_category_29']=  $this->buyer_model->select_sub_category_29();
       $data['sub_category_30']=  $this->buyer_model->select_sub_category_30();
       $data['sub_category_31']=  $this->buyer_model->select_sub_category_31();
       $data['sub_category_32']=  $this->buyer_model->select_sub_category_32();
//       print_r($data['sub_category_1']);
//       exit();
       $data['select_category']=  $this->home_model->select_category();
       
        $this->load->view('header',$data);
        $this->load->view('buyers_all',$data);
        $this->load->view('footer',$data);
    }


    public function select_buyer($cat_id) {
        $this->load->helper('text');
        $data['logo_info']=$this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info']=$this->db->get('news_feed')->result();
        $data['advertise']=  $this->buyer_model->select_advertise();
        $data['about_info']=$this->db->get('about')->row();
        $data['feature_product_1']= $this->buyer_model->select_feature_product_1();
        $data['advertise']=  $this->buyer_model->select_advertise();
        $data['news_feed']=  $this->buyer_model->select_news_feed();
        $data['sidebar_category']="";

        

        $data['all_product_info']=  $this->buyer_model->select_buyer_by_id($cat_id);
        $total_rows=count($data['all_product_info']);
        $config['base_url'] = base_url().'index.php/buyers/select_buyer/'.$cat_id;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = "5";
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
        $data['select_buyer'] = $this->buyer_model->select_buyer_by_id_pagination($cat_id,$config["per_page"], $data['page']);           
        $data['pagination'] = $this->pagination->create_links();

        $data['select_category']=  $this->home_model->select_category();


        $this->load->view('header',$data);
        $this->load->view('buyers_product',$data);
        $this->load->view('footer',$data);
    }


    public function buyer_detail($reg_id) {
        $this->load->helper('text');
        $data['logo_info']=$this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info']=$this->db->get('news_feed')->result();
        $data['about_info']=$this->db->get('about')->row();
        $data['sidebar_category']="";
        $data['select_buyer_details']=  $this->buyer_model->select_buyer_details_by_id($reg_id);
//        echo '<pre>';
//        print_r($data['select_buyer_details']);die();
        $data['advertise']=  $this->buyer_model->select_advertise();
        
        $data['select_category']=  $this->home_model->select_category();
        
        $this->load->view('header',$data);
        $this->load->view('buyers_details',$data);
        $this->load->view('footer',$data);
    }


    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */