<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Logout extends MX_Controller {

    //public $counter=0;
    function __construct() {
        parent::__construct();
        $uname = $this->session->userdata('login_email');
        if ($uname == Null) {
            $this->session->unset_userdata('login_email');
            $this->session->set_userdata('error', 'You need to login first!!!');
            redirect('welcome', 'refresh');
        }
    }

    public function index() {
        $this->load->helper('text');
        $data['logo_info'] = $this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info'] = $this->db->get('news_feed')->result();
        $data['about_info'] = $this->db->get('about')->row();


        $this->session->set_userdata('error', 'You are successfully logout!!!');
        $this->session->unset_userdata('login_email');
        $this->session->unset_userdata('type');
        $this->session->unset_userdata('reg_id');
        $this->session->unset_userdata('logged_in');
        redirect('login', 'refresh');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */