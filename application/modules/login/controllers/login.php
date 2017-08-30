<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller {
 //public $counter=0;
    function __construct() {
        parent::__construct();
        // $this->load->model('db_search');
        $this->load->library("session");
        $this->load->model('login_model');
        $this->load->model('home/home_model');
       
        
    }

    public function index() {
        $this->load->helper('text');
        $data['contact_info']=$this->db->get('contact_us_image')->row_array();
        $data['logo_info']=$this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info']=$this->db->get('news_feed')->result();
        $data['about_info']=$this->db->get('about')->row();
        $data['sidebar_category']="";
        $data['news_feed']=$this->login_model->select_news_feed();  
        
        $data['all_division']=  $this->login_model->select_all_division();
        $data['select_category']=  $this->home_model->select_category();
                
        $this->load->view('market_place/market_content/market_header',$data);
        $this->load->view('login_all',$data);
        $this->load->view('market_place/market_content/footer',$data); 
    }
    
    public function get_district() {
        $division_id = $this->input->post('division_id');
//        $reg_id = $this->input->post('reg_id');
        $all_district = $this->login_model->get_district_by_div_id($division_id);
        
//        print_r($all_district);die();
        echo '<option value="0" >Select Your District</option>';
       foreach ($all_district as $row) 
       {
            echo '<option value="'.$row['dist_id'].'">'.$row['en_dist_name'].'</option>';
       }
    }
    
    public function get_upazilla() {
        $district_id = $this->input->post('district_id');
//        echo $district_id;die();
//        $reg_id = $this->input->post('reg_id');
        $all_upazilla = $this->login_model->get_upazilla_by_dist_id($district_id);
        
//        print_r($all_district);die();
        echo '<option value="0" >Select Your Upazilla</option>';
       foreach ($all_upazilla as $row) 
       {
            echo '<option value="'.$row['upz_id'].'">'.$row['en_upz_name'].'</option>';
       }
    }


      public function logout() {
        $this->session->unset_userdata('login_email');
        $this->session->unset_userdata('login_password');
        $m_data = array();
        $m_data['message']='Logged Out Successfully';
        $this->session->set_userdata($m_data);
        redirect('login');
    }


    public function login_check() {
        $this->load->helper('text');
        $data['logo_info']=$this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info']=$this->db->get('news_feed')->result();
        $data['about_info']=$this->db->get('about')->row();
        if (isset($_POST['login'])) {

            $uname = $this->input->post('login_email');
            $pass = md5($this->input->post('password'));

            $result = $this->login_model->check_login($uname, $pass);
            if (count($result) > 0) {
                $data = array(
                    'login_email' => $result[0]['login_email'],
                    'reg_id' => $result[0]['login_reg_id'],
                    'type' => $result[0]['type'],
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($data);

//  type=1 super admin
//  type=2 seller
//  type=3 buyer



		if ($result[0]['type'] == 1) {
                    redirect('admin', 'refresh');
                } 
                else if($result[0]['type'] == 2){
                    redirect('logout', 'refresh');
                }

                else if($result[0]['type'] == 3){
                    redirect('logout', 'refresh');
                }
                else {
                    redirect('market', 'refresh');
                }
           
            }
            
            else {
                //$data['message'] = $this->session->set_flashdata('message','Enter your valid username and password first');
                $m_data['message']='Email or Password is invalid ';
				$this->session->set_userdata($m_data);
                redirect('login', 'refresh');
            }
        } 
        else {
          //  $data['message_error'] = $this->session->set_flashdata('message_error','Please enter your username and password');
               $m_data['message']='Enter your valid Email and password first';
			$this->session->set_userdata($m_data);
            redirect('login', 'refresh');
        }
    }

    
    
     public function registration() {
        $this->load->helper('text');
        $data['logo_info']=$this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info']=$this->db->get('news_feed')->result();
        $data['about_info']=$this->db->get('about')->row();
        if (isset($_POST['sign_up'])) {
            
            
            $data = array();
           $type=  $this->input->post('type');

           if($type==4){
               
           $data['reg_first_name'] = $this->input->post('reg_first_name');
           $data['reg_last_name'] = $this->input->post('reg_last_name');
                //$data['login_password'] = md5($this->input->post('login_password'));
            $data['reg_email'] = $this->input->post('reg_email');
            $data['reg_phone'] = $this->input->post('reg_phone');
            $data['type']=$this->input->post('type');
            $data['reg_division'] = $this->input->post('division');
            $data['reg_district'] = $this->input->post('district');
            $data['reg_upazilla'] = $this->input->post('upazilla');
            $data['reg_address'] = $this->input->post('reg_address');

               echo "<pre>";print_r($data);die();

            //print_r($data);
            //exit(); 

            $reg_id=$this->login_model->save_customer_info($data);
            
            $pass = md5($this->input->post('login_password'));
            $login_email = $this->input->post('reg_email');
            //$type= $this->input->post('type');
            $data_login = array(
                'login_email' => $login_email,
                'login_password' => $pass,
                'login_reg_id'=>$reg_id,
                'type' => $type,
                'is_block' => 0
            );
             
                          
            $this->login_model->save_customer_login_info($data_login);

            $m_data = array();
        $m_data['message'] = "Registration Successfully";
        $this->session->set_userdata($m_data);
        redirect('login/success_reply/'.$reg_id,'refresh');


            $result = $this->login_model->check_login($login_email, $pass);
            if (count($result) >= 1) {
                $data2 = array(
                    'login_email' => $result[0]['login_email'],
                    'type' => $result[0]['type'],
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($data2);
                if ($result[0]['type'] == 0) {
                    redirect('welcome', 'refresh');
                }
            }

            }
//            $reg_date = date("Y-m-d");
//            $data['reg_date'] = $reg_date;
            else{
                
                
                $reg_email= $this->input->post('reg_email');
                $type= $this->input->post('type1');
                $data = array(
                'reg_email' => $reg_email,
                'type' => $type
            );
                

                $data['logo_info']=$this->db->get('logo')->row();
                $this->db->limit(5);
                $data['news_feed_info']=$this->db->get('news_feed')->result();
                $data['reg_email']=$this->session->set_userdata($data);
                
                $data['select_category']=  $this->login_model->select_category();
                $data['select_country']= $this->login_model->select_country();
            //print_r($data['select_country']);
            //exit();
                $data['news_feed']=$this->login_model->select_news_feed();
                $this->load->view('header',$data);
                $this->load->view('seller_buyer',$data);
                $this->load->view('footer');
                //$this->buyer_seller();
            }
           
            

            //For Image Upload
            
            /*
        $data['profile_img']=  $this->input->post('profile_img');
        $config['upload_path'] = 'assets/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 112;
        $config['max_width'] = 1280;
        $config['max_height'] = 853;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        $error=array();
        $fdata=array();
        if (!$this->upload->do_upload('profile_img')) {
            $error = $this->upload->display_errors();
           // echo $error;
           
        } 
        else {
            $fdata = $this->upload->data();
            $data['profile_img']=$fdata['file_name'];
        }
        
             * 
             */
        //End Image Upload
            
            
            
//            print_r($data_login);
//            exit();
            
        } 
        
        else {
            $this->session->set_userdata('error', 'Sign Up First!!!');
            redirect('login', 'refresh');
        }
    }
    
    public function buyer_seller_reg(){
        $this->load->helper('text');
        $data['about_info']=$this->db->get('about')->row();
        $data_reg['reg_email']=$this->input->post('reg_email');
        
        $data_reg['reg_first_name'] = $this->input->post('reg_first_name');
        $data_reg['reg_last_name'] = $this->input->post('reg_last_name');
        $data_reg['reg_company_name'] = $this->input->post('reg_company_name');
        $data_reg['reg_company_phone'] = $this->input->post('reg_company_phone');
        $data_reg['reg_phone'] = $this->input->post('reg_phone');

        $data_reg['bus_type'] = $this->input->post('bus_type');
        $data_reg['main_market'] = $this->input->post('main_market');
        $data_reg['com_employee'] = $this->input->post('com_employee');
        $data_reg['com_establish'] = $this->input->post('com_establish');
        $data_reg['website'] = $this->input->post('website');
        
        $data_reg['reg_address'] = $this->input->post('reg_address');
        $data_reg['reg_city'] = $this->input->post('reg_city');
        $data_reg['reg_country'] = $this->input->post('reg_country');
        $data_reg['industry_name'] = $this->input->post('industry_name');
        $data_reg['type']=$this->input->post('type');
        
//        print_r($data_reg);die();
        $reg_id=$this->login_model->save_customer_info($data_reg);

$pass = md5($this->input->post('login_password'));
            $login_email = $this->input->post('reg_email');
            $type= $this->input->post('type');

        $mail_code=$this->login_model->get_mail_code();
            $messag = '<html><body>';
            $messag.= '<p><b>User Email: </b>'.$login_email.'</p>';
             $messag.= '<p><b>Mail Code: </b>'.$mail_code.'</p>';
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
            $this->email->from('info@eeanstar.com','Eeanstar');
            $this->email->to($data_reg['reg_email']);
            $base=$this->config->base_url();
            $this->email->subject('Eeanstar login info');
            $this->email->message($messag);
            $this->email->set_mailtype('html');
            $mail=$this->email->send();


        
            $data_login = array(
                'login_email' => $login_email,
                'login_password' => $pass,
                'login_mail_code' => $mail_code,
                'login_reg_id'=>$reg_id,
                'type' => $type,
                'is_block' => 0
            );
        // $data_reg['type'] = $type;
          
        
        $this->login_model->save_customer_login_info($data_login);

        $m_data = array();
		
		
        $m_data['message'] = "Registration Successfully";
        $this->session->set_userdata($m_data);
         $this->session->set_userdata('error','Please check your mail for further details');
        redirect('login','refresh');


    }
	
	
    public function success_reply($reg_id)
    {
//        echo $reg_id;die();
        if($reg_id==0 || $reg_id==NULL || $reg_id=='')
        {
            redirect('login');
        }
        else
        {
            $data['contact_info']=$this->db->get('contact_us_image')->row_array();
            $data['reg_id']=$reg_id;
            $this->load->helper('text');
            $data['logo_info']=$this->db->get('logo')->row();
            $data['news_feed_info']=$this->db->get('news_feed')->result();
            $data['about_info']=$this->db->get('about')->row();
            $data['sidebar_category']="";
            $data['news_feed']=$this->login_model->select_news_feed();  
            
            $data['select_category']=  $this->home_model->select_category();
            $this->load->view('market_place/market_content/market_header',$data);
            $this->load->view('view_success_reply',$data);
//            $this->load->view('market_place/market_content/footer',$data);
        }
    }

    public function insert_membership($reg_id)
    {
//        echo $reg_id;die();
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 0;
        $this->load->library('upload', $config);
        $file_name = 'cover_img';
        if (!$this->upload->do_upload($file_name)) {
            $this->session->set_flashdata('message_error', 'Image not Inserted properly');
            redirect('admin/Login');
        }

         else {
            $upload_data = $this->upload->data();
            $values['cover_img'] = $upload_data['file_name'];
        }

        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 0;
        $this->load->library('upload', $config);
        $file_name = 'profile_img';
        if (!$this->upload->do_upload($file_name)) {
            $this->session->set_flashdata('message_error', 'Image not Inserted properly');
            redirect('admin/login');
        }

         else {
            $upload_data = $this->upload->data();
            $values['profile_img'] = $upload_data['file_name'];
        }
        $values['reg_id'] = $reg_id;
        $values['store_name'] = $this->input->post('store_name');
        $values['home_detail'] = $this->input->post('home_detail');
        $values['home_title'] = $this->input->post('home_title');
        $values['about_us'] = $this->input->post('about_us');
        $values['contact_us'] = $this->input->post('contact_us');
//        print_r($values);die();
        $this->db->insert('reg_members', $values);
        $this->session->set_flashdata('message', 'Data uploaded');
        redirect('login');
    }


    public function email_check_reg() {
           $email=$this->input->post('email');
            $result = $this->login_model->check_email_reg($email);
            
            if($result)
            {
                echo 0;
            }
            
            else{
                echo 1;
            }
        }

    public function email_check() {
        $this->load->helper('text');
        $data['logo_info']=$this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info']=$this->db->get('news_feed')->result();
        $data['about_info']=$this->db->get('about')->row();
        $email = $this->input->post('email');
        $result = $this->login_model->check_email($email);

        if ($result) {
            echo 0;
        } else {
            echo 1;
        }
    }

    public function user_check() {
        $this->load->helper('text');
        $data['logo_info']=$this->db->get('logo')->row();
        $this->db->limit(5);
        $data['news_feed_info']=$this->db->get('news_feed')->result();
        $data['about_info']=$this->db->get('about')->row();
        $user_name = $this->input->post('user_name');
        $result = $this->login_model->check_user($user_name);

        if ($result) {
            echo 0;
        } else {
            echo 1;
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */