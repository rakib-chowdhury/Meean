<?php

class Members extends CI_Controller{
    //put your code here
    
    
    public function index(){
        $this->load->helper('text');
        $data['logo_info']=$this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info']=$this->db->get('news_feed')->result();
        $data['about_info']=$this->db->get('about')->row();
        $this->load->view('header');
        $this->load->view('view_members');
        $this->load->view('footer');
    }
}
