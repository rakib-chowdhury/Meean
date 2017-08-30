<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MX_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->model('home_model');
        $this->load->library("session");///iti
    }


 


    public function index() {

        $count_viewers = $this->home_model->get_counters();
        print_r($count_viewers);die();

        $this->load->helper('text');
        $data['logo_info']=$this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info']=$this->db->get('news_feed')->result();
        // echo "<pre>";
        // print_r($data['logo_info']);
        // die();
        $data['about_info']=$this->db->get('about')->row();
        $data['sidebar_category']="1";


        $data['slider_image']=$this->home_model->select_slider_image();
        $data['news_feed']=  $this->home_model->select_news_feed();
        $data['advertise']= $this->home_model->select_advertise();
        $data['advertise_top_right']= $this->home_model->select_advertise_top_right();
        $data['feature_product_1']=$this->home_model->select_feature_product_1();
        $data['innovative_product_1']=$this->home_model->select_innovative_product();
//        $data['innovative_product_2']=$this->home_model->select_innovative_product_2();
//        $data['innovative_product_3']=$this->home_model->select_innovative_product_3();
        $data['select_category']=  $this->home_model->select_category();
        $data['select_country']= $this->home_model->select_country();
//        echo '<pre>';print_r($data['select_category']);die();
        $this->load->view('header',$data);
        $this->load->view('home_all',$data);
        $this->load->view('footer');
    }

      public function Product_detail($product_id) {
        $this->load->helper('text');
        $data['logo_info']=$this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info']=$this->db->get('news_feed')->result();
        $data['about_info']=$this->db->get('about')->row();
      $data['news_feed']=  $this->home_model->select_news_feed();
        $this->load->view('header',$data);
		
        
        $data['select_sub_images']= $this->home_model->select_sub_images_by_id($product_id);
        $data['product_details']=  $this->home_model->select_product_details_by_id($product_id);
        $data['related_product']=$this->home_model->get_related_product($data['product_details'][0]['cat_id']);
        $this->load->view('product_detail_all',$data);
        $this->load->view('footer');
    }


    public function autocomplete()
    {
        $this->load->helper('text');
        $data['logo_info']=$this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info']=$this->db->get('news_feed')->result();
        $data['about_info']=$this->db->get('about')->row();
        $search_data = $this->input->post('search');
        
        $query = $this->home_model->get_autocomplete($search_data);

        echo json_encode ($query);
    }


 public function contact_us()
    {

         $name= $this->input->post('name');
         $email_address= $this->input->post('email_address');
         $phone= $this->input->post('phone');
         $subject= $this->input->post('subject');
         $description= $this->input->post('description');
         $company_name= $this->input->post('company_name');

         $data_contact = array(
            'name' =>  $name,
            'email' => $email_address,
            'phone' =>  $phone,
            'subject' =>  $subject,
            'description' =>  $description,
            'company_name' =>  $company_name
             );
//insert  into db

        $this->home_model->insert_contact_us_data($data_contact);

            $messag = '<html><body>';
           // $messag. ='<span style="width:30%;">';
            $messag.= '<p><b>Sender name: </b>'.$name.'</p>';
             $messag.= '<p><b>Sender email: </b>'.$email_address.'</p>';
            $messag.= '<p><b>Sender message: </b>'.$description.'</p>';
            $messag.= '</body></html>';


            $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'infiniti.websitewelcome.com',
            'smtp_port' => 465,
            'smtp_user' => 'noreply@geeksntechnology.com',
            'smtp_pass' => '41Rv!HLcIXFv',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
            );

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($email_address,'eeanstar');
            $this->email->to('support@eeanstar.com');
            $base=$this->config->base_url();
            $this->email->subject('eeanstar problem issue');
            $this->email->message($messag);


            $this->email->set_mailtype('html');

            $mail=$this->email->send();
            redirect('home','refresh');

    }




}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */