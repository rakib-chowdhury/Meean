<?php


class Support extends CI_Controller{
    //put your code here
    
    function __construct() {
        parent::__construct();
        // $this->load->model('db_search');
        $this->load->library("session");
        $this->load->model('support_model');
    }

    
    public function index() {
        $this->load->helper('text');
        $data['contact_info']=$this->db->get('contact_us_image')->row_array();
        $data['logo_info']=$this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info']=$this->db->get('news_feed')->result();
        $data['about_info']=$this->db->get('about')->row();
        $data['member_info']=$this->db->get('membership')->row();
        $data['news_feed']=  $this->support_model->select_news_feed();
        $this->load->view('market_place/market_content/market_header',$data);
        $this->load->view('view_support');
        $this->load->view('market_place/market_content/footer'); 
    }
   
}
