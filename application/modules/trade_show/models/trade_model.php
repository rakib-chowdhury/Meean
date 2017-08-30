<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trade_model extends CI_Model
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
        public function select_trade_show()
	{
	$this->db->select('*');
        $this->db->from('trade');
        $this->db->limit('6');
        $this->db->order_by("id", "DESC");
        $query=$this->db->get();
        return $query->result_array();
	}
        public function select_trade_info($id)
	{
	$this->db->select('*');
        $this->db->from('trade');
        $this->db->where('id',$id);
        $query=$this->db->get();
        return $query->result_array();
	}
        public function select_trade_detail()
	{
	$this->db->select('*');
        $this->db->from('trade');
        $this->db->limit('1');
        $this->db->order_by("id", "DESC");
        $query=$this->db->get();
        return $query->result_array();
	}
    
}