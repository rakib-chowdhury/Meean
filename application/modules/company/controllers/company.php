<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Company extends MX_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library("session");
        $this->load->model('company_model');
        $this->load->model('home/home_model');
    }

    public function index() {
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
        $data['about_info'] = $this->db->get('about')->row();
        $data['feature_product_1'] = $this->company_model->select_feature_product_1();
        $data['innovative_product_1'] = $this->company_model->select_innovative_product_1();
        $data['advertise'] = $this->company_model->select_advertise();
        $data['news_feed'] = $this->company_model->select_news_feed();
        $data['sidebar_category'] = "";

//        $data['select_abcd_product']=  $this->company_model->select_abcd_category();
        $data['a_category'] = $this->company_model->select_a_category();
        $data['b_category'] = $this->company_model->select_b_category();
        $data['c_category'] = $this->company_model->select_c_category();
        $data['d_category'] = $this->company_model->select_d_category();
        $data['e_category'] = $this->company_model->select_e_category();
        $data['f_category'] = $this->company_model->select_f_category();
        $data['g_category'] = $this->company_model->select_g_category();
        $data['h_category'] = $this->company_model->select_h_category();
        $data['i_category'] = $this->company_model->select_i_category();
        $data['j_category'] = $this->company_model->select_j_category();
        $data['k_category'] = $this->company_model->select_k_category();
        $data['l_category'] = $this->company_model->select_l_category();
        $data['m_category'] = $this->company_model->select_m_category();
        $data['n_category'] = $this->company_model->select_n_category();
        $data['o_category'] = $this->company_model->select_o_category();
        $data['p_category'] = $this->company_model->select_p_category();
        $data['q_category'] = $this->company_model->select_q_category();
        $data['r_category'] = $this->company_model->select_r_category();
        $data['s_category'] = $this->company_model->select_s_category();
        $data['t_category'] = $this->company_model->select_t_category();
        $data['u_category'] = $this->company_model->select_u_category();
        $data['v_category'] = $this->company_model->select_v_category();
        $data['w_category'] = $this->company_model->select_w_category();
        $data['x_category'] = $this->company_model->select_x_category();
        $data['y_category'] = $this->company_model->select_y_category();
        $data['z_category'] = $this->company_model->select_z_category();


        $data['sub_category_1'] = $this->company_model->select_sub_category_1();
        $data['sub_category_2'] = $this->company_model->select_sub_category_2();
        $data['sub_category_3'] = $this->company_model->select_sub_category_3();
        $data['sub_category_4'] = $this->company_model->select_sub_category_4();
        $data['sub_category_5'] = $this->company_model->select_sub_category_5();
        $data['sub_category_6'] = $this->company_model->select_sub_category_6();
        $data['sub_category_7'] = $this->company_model->select_sub_category_7();
        $data['sub_category_8'] = $this->company_model->select_sub_category_8();
        $data['sub_category_9'] = $this->company_model->select_sub_category_9();
        $data['sub_category_10'] = $this->company_model->select_sub_category_10();
        $data['sub_category_11'] = $this->company_model->select_sub_category_11();
        $data['sub_category_12'] = $this->company_model->select_sub_category_12();
        $data['sub_category_13'] = $this->company_model->select_sub_category_13();
        $data['sub_category_14'] = $this->company_model->select_sub_category_14();
        $data['sub_category_15'] = $this->company_model->select_sub_category_15();
        $data['sub_category_16'] = $this->company_model->select_sub_category_16();
        $data['sub_category_17'] = $this->company_model->select_sub_category_17();
        $data['sub_category_18'] = $this->company_model->select_sub_category_18();
        $data['sub_category_19'] = $this->company_model->select_sub_category_19();
        $data['sub_category_20'] = $this->company_model->select_sub_category_20();
        $data['sub_category_21'] = $this->company_model->select_sub_category_21();
        $data['sub_category_22'] = $this->company_model->select_sub_category_22();
        $data['sub_category_23'] = $this->company_model->select_sub_category_23();
        $data['sub_category_24'] = $this->company_model->select_sub_category_24();
        $data['sub_category_25'] = $this->company_model->select_sub_category_25();
        $data['sub_category_26'] = $this->company_model->select_sub_category_26();
        $data['sub_category_27'] = $this->company_model->select_sub_category_27();
        $data['sub_category_28'] = $this->company_model->select_sub_category_28();
        $data['sub_category_29'] = $this->company_model->select_sub_category_29();
        $data['sub_category_30'] = $this->company_model->select_sub_category_30();
        $data['sub_category_31'] = $this->company_model->select_sub_category_31();
        $data['sub_category_32'] = $this->company_model->select_sub_category_32();

        $data['select_category']=  $this->home_model->select_category();

        $this->load->view('header', $data);
        $this->load->view('company_all', $data);
        $this->load->view('footer');
    }

    public function all_company() {
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
        $data['about_info'] = $this->db->get('about')->row();
        $data['news_feed'] = $this->company_model->select_news_feed();

        $this->load->view('header', $data);
        $this->load->view('company_view_all');
        $this->load->view('footer');
    }

    public function company_detail() {
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
        $data['about_info'] = $this->db->get('about')->row();
        $data['news_feed'] = $this->company_model->select_news_feed();
        $this->load->view('header', $data);
        $this->load->view('company_detail_all');
        $this->load->view('footer');
    }

    public function select_company($cat_id) {
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $data['advertise'] = $this->company_model->select_advertise();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
        $data['about_info'] = $this->db->get('about')->row();
        $data['sidebar_category'] = "";
        $data['news_feed'] = $this->company_model->select_news_feed();
        $data['select_company'] = $this->company_model->select_company_by_id($cat_id);
//        echo '<pre>';print_r($data['select_company']);
//        exit();
        $data['select_category']=  $this->home_model->select_category();
        
        $this->load->view('header', $data);
        $this->load->view('company_view_all', $data);
        $this->load->view('footer', $data);
    }

    public function contact_company($cat_id, $product_id) {
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
        $data['about_info'] = $this->db->get('about')->row();
        $data['sidebar_category'] = "";
        $data['news_feed'] = $this->company_model->select_news_feed();
        $data['product_name'] = $this->company_model->get_product_details($product_id);
        $data['select_company'] = $this->company_model->select_company_by_id($cat_id);
        //print_r($data['product_name']);
        //exit();
        $data['select_category']=  $this->home_model->select_category();
        
        $this->load->view('header', $data);
        $this->load->view('company_view_all_product', $data);
        $this->load->view('footer', $data);
    }

//edited by aman///

    public function contact_with_company() {

        $login_email = $this->session->userdata('login_email');
        $type = $this->session->userdata('type');
        $reg_id = $this->session->userdata('reg_id');

        $mail_validation = 0;

        $mail_code = $this->input->post('mail_code');
        $message = $this->input->post('mail_message');
        $subject = $this->input->post('subject');

        if ($login_email == NULL || $reg_id == NULL || $type == NULL || $type == "" || $type == 1 || $type == 4 || $type == 2 || $login_email == "") {
            $this->session->unset_userdata('login_email');
            $this->session->unset_userdata('type');
            $this->session->unset_userdata('logged_in');
            $this->session->set_userdata('error', 'You need to login first!!!');
            echo '2';
        } else {
            $data['get_user_data'] = $this->company_model->get_user_data($reg_id);
            $u_name = $data['get_user_data'][0]['reg_first_name'] . " " . $data['get_user_data'][0]['reg_last_name']; ////iti
            $this->session->set_userdata('username', $u_name);
            $mail_code_db = $this->company_model->get_mail_code($login_email);
            if ($mail_code == $mail_code_db[0]['login_mail_code']) {

                $messag = '<html><body>';
                // $messag. ='<span style="width:30%;">';
                ;
                $messag.= '<p><b>Sender name: </b>' . $u_name . '</p>';

                $messag.= '<p><b>Sender message: </b>' . $message . '</p>';
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
                $this->email->from($login_email, 'Eeanstar');
                $this->email->to('support@eeanstar.com');
                $base = $this->config->base_url();
                $this->email->subject($subject);
                $this->email->message($messag);


                $this->email->set_mailtype('html');

                $mail = $this->email->send();
                echo '1';
            } else {
                echo '0';
            }
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */