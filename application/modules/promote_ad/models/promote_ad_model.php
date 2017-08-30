<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promote_ad_model extends CI_Model
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
    
}