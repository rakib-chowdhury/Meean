<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_model extends CI_Model
{
        public function __construct()
	{
		parent::__construct();
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

        public function select_advertise()
	{
		$this->db->select('*');
        $this->db->from('advertise');
        $query=$this->db->get();
        return $query->result_array();
	}
        
       public function get_mail_code($email)
       {
         $this->db->select('login_mail_code');
         $this->db->from('login');
         $this->db->where('login_email',$email);
         $query=$this->db->get();
        return $query->result_array();
       }


public function get_product_details($product_id)
       {
         $this->db->select('product_name');
         $this->db->from('product');
         $this->db->where('product_id',$product_id);
         $query=$this->db->get();
        return $query->result();
       }

  public function get_user_data($reg_id)
    {
        $this->db->select('*');
        $this->db->from('registration');
        $this->db->where('reg_id', $reg_id);
        $result = $this->db->get();
        return $result->result_array();
    }

        public function select_sub_category_1() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',1);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_2() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',2);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_3() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',3);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_4() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',4);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_5() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',5);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_6() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',6);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_7() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',7);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_8() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',8);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_9() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',9);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_10() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',10);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_11() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',11);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_12() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',12);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_13() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',13);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_14() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',14);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_15() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',15);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_16() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',16);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_17() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',17);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    
    public function select_sub_category_18() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',18);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_19() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',19);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_20() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',20);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }public function select_sub_category_21() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',21);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_22() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',22);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_23() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',23);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_24() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',24);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_25() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',25);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_26() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',26);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_27() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',27);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function select_sub_category_28() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',28);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_29() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',29);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_30() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',30);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_sub_category_31() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',31);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function select_sub_category_32() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id',32);
        
        $query=  $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_a_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "a%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
     public function select_b_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "b%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
     public function select_c_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "c%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
     public function select_d_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "d%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
    public function select_e_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "e%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
    public function select_f_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "f%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
    public function select_g_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "g%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
    public function select_h_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "h%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
    public function select_i_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "i%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
    public function select_j_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "j%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
    public function select_k_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "k%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
     public function select_l_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "l%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
     public function select_m_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "m%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
     public function select_n_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "n%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
     public function select_o_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "o%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
     public function select_p_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "p%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
     public function select_q_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "q%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
     public function select_r_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "r%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
     public function select_s_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "s%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
     public function select_t_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "t%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
     public function select_u_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "u%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
     public function select_v_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "v%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
     public function select_w_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "w%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
     public function select_x_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "x%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
     public function select_y_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "y%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }
    
     public function select_z_category() {
        $query = $this->db->query('SELECT * FROM category WHERE cat_name LIKE "z%" LIMIT 3'); 
        $result = $query->result();
        return $result;
    }


     public function select_company_by_id($cat_id) {
         $this->db->select('reg.*, cat.*,flag.*');
        $this->db->from('registration reg');
        $this->db->join('category cat', 'cat.cat_id = reg.industry_name','Left');
        $this->db->join('country_flag flag', 'flag.country_id = reg.reg_country','Left'); 
        $this->db->where('industry_name',$cat_id);
        
        $query=  $this->db->get();
        $result=$query->result();
        return $result;
    }
	public function select_feature_product_1() {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('is_feature',1);
        $this->db->limit('4');
        $this->db->order_by("product_id", "DESC");
        $query=$this->db->get();
        $result=$query->result_array();
        return $result;
        }
	public function select_innovative_product_1() {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('is_innovative',1);
        $this->db->limit('4');
        $this->db->order_by("product_id", "DESC");
        $query=$this->db->get();
        $result=$query->result_array();
        return $result;
        }




}
?>