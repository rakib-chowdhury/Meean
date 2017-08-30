<?php

class Trade_show extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        // $this->load->model('db_search');
        $this->load->library("session");
        $this->load->model('trade_model');
        $this->load->model('home/home_model');
    }

    public function index($id = NULL) {
        if ($id) {
            $this->load->helper('text');
            $data['logo_info'] = $this->db->get('logo')->row();
            $this->db->limit(5);
            $data['news_feed_info'] = $this->db->get('news_feed')->result();
            $data['about_info'] = $this->db->get('about')->row();
            $data['advertise'] = $this->trade_model->select_advertise();
            $data['trade_info'] = $this->trade_model->select_trade_info($id);

            $data['trade_show'] = $this->trade_model->select_trade_show();
            $data['news_feed'] = $this->trade_model->select_news_feed();
            
            $data['select_category']=  $this->home_model->select_category();
            
            $this->load->view('header', $data);
            $this->load->view('view_trade_show', $data);
            $this->load->view('footer');
        } else {
            $this->load->helper('text');
            $data['logo_info'] = $this->db->get('logo')->row();
            $this->db->limit(5);
            $data['news_feed_info'] = $this->db->get('news_feed')->result();
            $data['about_info'] = $this->db->get('about')->row();
            $data['advertise'] = $this->trade_model->select_advertise();

            $data['trade_show'] = $this->trade_model->select_trade_show();
            $data['news_feed'] = $this->trade_model->select_news_feed();
            
            $data['select_category']=  $this->home_model->select_category();
            
            $this->load->view('header', $data);
            $this->load->view('view_trade_show', $data);
            $this->load->view('footer');
        }
    }

    public function trade_detail() { {
            $this->load->helper('text');
            $data['logo_info'] = $this->db->get('logo')->row();
            $this->db->limit(5);
            $data['news_feed_info'] = $this->db->get('news_feed')->result();
            $data['about_info'] = $this->db->get('about')->row();
            $data['advertise'] = $this->trade_model->select_advertise();
            $data['trade_detail'] = $this->trade_model->select_trade_detail();
            $data['trade_show'] = $this->trade_model->select_trade_show();
            $data['news_feed'] = $this->trade_model->select_news_feed();
            
            $data['select_category']=  $this->home_model->select_category();
            
            $this->load->view('header', $data);
            $this->load->view('view_trade', $data);
            $this->load->view('footer');
        }
    }

}
