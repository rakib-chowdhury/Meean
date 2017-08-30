<?php

class We_are_hiring extends CI_Controller {
    //put your code here

  function __construct() {
        parent::__construct();
        // $this->load->model('db_search');
        $this->load->library("session");
        $this->load->model('about_model');
    }

    
    public function index() {
        $this->load->helper('text');
        $data['contact_info']=$this->db->get('contact_us_image')->row_array();
        $data['logo_info']=$this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info']=$this->db->get('news_feed')->result();
        $data['logo_info']=$this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info']=$this->db->get('news_feed')->result();
        $data['hiring_info']=$this->db->get('we_are_hiring')->row();
        $data['news_feed']=  $this->about_model->select_news_feed();
        $this->load->view('market_place/market_content/market_header',$data);
        $this->load->view('view_about');
        $this->load->view('market_place/market_content/footer'); 
    }
}
