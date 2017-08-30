<?php


class Support_model extends CI_Model{
    //put your code here
    public function select_news_feed() {
        $this->db->select('*');
        $this->db->from('news_feed');
        $this->db->limit('5');
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        return $query->result_array();
    }

}
