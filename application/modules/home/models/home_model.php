<?php

class Home_model extends CI_Model{
    //put your code here
    public function select_category() {
        $this->db->select('*');
        $this->db->from('category');
//        $this->db->limit('14');
        
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }
	
	
	 public function select_feature_product_1() {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('is_feature',1);
        $this->db->limit('5');
        $this->db->order_by("product_id", "DESC");
        $query=$this->db->get();
        $result=$query->result_array();
        return $result;
    }
    
    public function select_innovative_product(){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('is_innovative',1);
//        $this->db->limit('5');
        $this->db->order_by("product_id", "DESC");
        $query=$this->db->get();
        $result=$query->result_array();
        return $result;
    }

    public function select_product_details_by_id($product_id) {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_id',$product_id);
        
        $query=  $this->db->get();
        $result = $query->result_array();
        return $result;
    }

   public function insert_contact_us_data($data)
 {
        $this->db->insert('contact_us',$data);
 }

    public function get_related_product($cat_id)
{
   $this->db->select('*');
        $this->db->from('product');
        $this->db->where('cat_id',$cat_id);
        $this->db->order_by("product_id", "RANDOM");
        $this->db->limit('2');
        $query=  $this->db->get();
        $result = $query->result_array();
        return $result;
}
	
	public function select_feature_product_2() {
        $this->db->select('*');
        $this->db->from('product');
	$this->db->where('is_feature',1);
        $this->db->limit('6');
        $this->db->order_by("product_id", "ASC");
        $query=$this->db->get();
        $result=$query->result_array();
        return $result;
    }
	
	public function select_feature_product_3() {
        $this->db->select('*');
        $this->db->from('product');
		 $this->db->where('is_feature',1);
        $this->db->limit('6');
        $this->db->order_by("product_id", "RANDOM");
        $query=$this->db->get();
        $result=$query->result();
        $result=$query->result_array();
		 return $result;
    }
	
	public function select_slider_image()
	{
		$this->db->select('*');
        $this->db->from('slider');
		$this->db->where('status',1);
        $this->db->limit('5');
        $this->db->order_by("id", "DESC");
        $query=$this->db->get();
        $result=$query->result();
        $result=$query->result_array();
		 return $result;
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
	
	
    public function select_advertise() {
        $this->db->select('*');
        $this->db->from('advertise');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function select_advertise_top_right() {
        $this->db->select('*');
        $this->db->from('advertise');
        $this->db->where('post_name','Home page top right(1st position)');
        $query = $this->db->get();
        return $query->row();
    }

    public function get_autocomplete($search_data)
    {
        $this->db->select('product_name');
        $this->db->like('product_name', $search_data);
        $this->db->from('product');
        $query = $this->db->get();
        return $query->result();
    }

    
    public function select_country(){
       $this->db->select('*');
        $this->db->from('country_flag');
        
        $query=$this->db->get();
        $result=$query->result();
        return $result;
    }


     public function select_sub_images_by_id($product_id){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('images', 'product.product_id= images.images_table_id','LEFT'); 
        $this->db->where('images.images_table_id',$product_id);
        
        $query=  $this->db->get();
        $result=$query->result_array();
        return $result;
}
    


}
