<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function __construct()
	{
		parent::__construct();
    }
    
    public function check_login($uname,$pass)
	{
		$this->db->select('*');
		$this->db->from('login');
		$this->db->where('login_email', $uname);
		$this->db->where('login_password', $pass);
		$this->db->where('is_block', '0');
		$result = $this->db->get();
		
		return $result->result_array();
	}

    
         public function get_mail_code()
         {
            $this->load->helper('string');
	    $mail_code=random_string('alnum', 5);
            return $mail_code;
         }

	public function select_news_feed()
	{
		$this->db->select('*');
        $this->db->from('news_feed');
        $this->db->limit('5');
        $this->db->order_by("id", "DESC");
        $query=$this->db->get();
        return $query->result_array();
	}
	
        
        public function save_customer_info($data) {
            
            $this->db->insert('registration',$data);
            $reg_id=  $this->db->insert_id();//which last id inserted that id return 
        return $reg_id;
        }
          public function save_customer_login_info($data_login) {
            
            $this->db->insert('login',$data_login);
        }


        public function check_email_reg($email) {
                
            $this->db->select('*');
            $this->db->from('registration');
            $this->db->where('reg_email', $email);
            
            $query = $this->db->get();
            $result=$query->row();
            return $result;
    }

        
        public function check_email($email) {
                
            $this->db->select('*');
            $this->db->from('registration');
            $this->db->where('email', $email);
            
            $query = $this->db->get();
            $result=$query->row();
            return $result;
    }
    
    public function check_user($user_name) {
                
            $this->db->select('*');
            $this->db->from('registration');
            $this->db->where('user_name', $user_name);
            
            $query = $this->db->get();
            $result=$query->row();
            return $result;
    }

    public function select_category() {
        $this->db->select('*');
        $this->db->from('category');
        
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }

    public function select_country(){
       $this->db->select('*');
        $this->db->from('country_flag');
        
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }
    
    public function select_all_division() {
        $this->db->select('*');
        $this->db->from('location');
        
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }
    
    public function get_district_by_div_id($division_id) {
        $this->db->select('*');
        $this->db->from('district');
        $this->db->join('location','district.div_id = location.location_id');
        $this->db->where('location.location_id',$division_id);
        $query=$this->db->get();
        $result=$query->result_array();
        return $result;
    }
    
    public function get_upazilla_by_dist_id($district_id) {
        $this->db->select('*');
        $this->db->from('upazilla');
        $this->db->join('district','upazilla.dist_id = district.dist_id');
        $this->db->where('district.dist_id',$district_id);
        $query=$this->db->get();
        $result=$query->result_array();
        return $result;
    }


}
?>