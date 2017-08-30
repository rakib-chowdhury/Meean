<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Market_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_user_data($reg_id) {
        $this->db->select('*');
        $this->db->from('registration');
        $this->db->where('reg_id', $reg_id);
        $result = $this->db->get();
        return $result->result_array();
    }
    
    public function update_profile_info($data,$reg_id) {
        $this->db->where('reg_id', $reg_id);
        $this->db->update('registration', $data);
        
    }

    public function get_all_product($reg_id) {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('reg_id', $reg_id);
        $result = $this->db->get();
        return $result->result();
    }

    public function get_members_info_by_reg_id($reg_id) {
        $this->db->select('*');
        $this->db->from('reg_members');
        $this->db->where('reg_id', $reg_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_district($div_id) {
        $this->db->select('*');
        $this->db->from('district');
        $this->db->where('div_id', $div_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_all_district() {
        $this->db->select('*');
        $this->db->from('district');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_all_market_product($reg_id) {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->where('reg_id', $reg_id);
        $result = $this->db->get();
        return $result->result();
    }

    public function get_image_table_data($p_id) {
        $this->db->select('*');
        $this->db->from('images');
        $this->db->where('images_table_id', $p_id);
        $this->db->where('images_type', 1);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_image_table_data_market($p_id) {
        $this->db->select('*');
        $this->db->from('images');
        $this->db->where('images_table_id', $p_id);
        $this->db->where('images_type', 4);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_product_details($p_id, $reg_id) {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('images', 'product.product_id = images.images_table_id', 'LEFT');
        $this->db->where('product.product_id', $p_id);
        $this->db->where('product.reg_id', $reg_id);
        $this->db->where('images.images_type', 1);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_market_product_details($p_id, $reg_id) {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->join('images', 'market_place.market_place_id = images.images_table_id', 'LEFT');
        $this->db->join('location', 'market_place.market_place_location = location.location_id', 'LEFT');
        $this->db->where('market_place.market_place_id', $p_id);
        $this->db->where('market_place.reg_id', $reg_id);
        $this->db->where('images.images_type', 4);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_product_details_w_image($p_id, $reg_id) {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('images', 'product.product_id = images.images_table_id', 'LEFT');
        $this->db->where('product.product_id', $p_id);
        $this->db->where('product.reg_id', $reg_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_market_product_details_w_image($p_id, $reg_id) {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->join('images', 'market_place.market_place_id = images.images_table_id', 'LEFT');
        $this->db->where('market_place.market_place_id', $p_id);
        $this->db->where('market_place.reg_id', $reg_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function update_product_status($data, $p_id) {
        $this->db->where('product_id', $p_id);
        $this->db->update('product', $data);
    }

    public function get_all_category() {
        $this->db->select('*');
        $this->db->from('market_category');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_all_category2() {
        $this->db->select('market_category_id as m_cat_id,market_category_name as m_cat_name,');
        $this->db->from('market_category');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_sub_cat_name($id) {
        $this->db->select('*');
        $this->db->from('market_sub_category');
        $this->db->where('market_sub_cat_id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }
    public function check_top_ad($id) {
        $this->db->select('top_ad');
        $this->db->from('market_place');
        $this->db->where('market_place_id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }
    public function check_bump_ad($id) {
        $this->db->select('bump_ad');
        $this->db->from('market_place');
        $this->db->where('market_place_id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }
    

    public function insert_new_product($data) {
        $this->db->insert('product', $data);
        return $this->db->insert_id();
    }

    public function insert_new_market_product($data) {
        $this->db->insert('market_place', $data);
        return $this->db->insert_id();
    }

    public function insert_product_images($data) {
        $this->db->insert('images', $data);
    }

    public function insert_market_place_images($data) {
        $this->db->insert('images', $data);
    }

    public function password_change($data, $reg_id) {
        $this->db->where('login_reg_id', $reg_id);
        $this->db->update('login', $data);
    }

    public function delete_product_sub_images($p_id) {
        $this->db->where('images_table_id', $p_id);
        $this->db->where('images_type', 1);
        $this->db->delete('images');
    }

    public function delete_market_product_sub_images($p_id) {
        $this->db->where('images_table_id', $p_id);
        $this->db->where('images_type', 4);
        $this->db->delete('images');
    }

    public function delete_product_confirm($id) {
        $this->db->delete('product', array('product_id' => $id));
        $this->db->delete('images', array('images_table_id' => $id, 'images_type' => 1));
    }

    public function delete_market_product_confirm($id) {
        $this->db->delete('market_place', array('market_place_id' => $id));
        $this->db->delete('images', array('images_table_id' => $id, 'images_type' => 4));
    }

    public function update_new_product($p_id, $data) {
        $this->db->where('product_id', $p_id);
        $this->db->update('product', $data);
    }

    public function update_new_market_product($p_id, $data) {
        $this->db->where('market_place_id', $p_id);
        $this->db->update('market_place', $data);
    }

    public function get_sub_category($cat_id) {
        $this->db->select('*');
        $this->db->from('market_sub_category');
        $this->db->where('market_category_id', $cat_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_specific_product($p_id) {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_id', $p_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_all_location() {
        $this->db->select('*');
        $this->db->from('location');
        $result = $this->db->get();
        return $result->result_array();
    }
    
    public function image_details($images_table_id) {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->where('market_place_id', $images_table_id);
        $result = $this->db->get();
        return $result->result_array();
    }
    
    public function sub_image_details($images_id) {
        $this->db->select('*');
        $this->db->from('images');
        $this->db->where('images_id', $images_id);
        $result = $this->db->get();
        return $result->result_array();
    }
    
    public function update_main_image($product_id,$product_image) {
        $this->db->set('market_place_image',$product_image);
        $this->db->where('market_place_id',$product_id);
        $this->db->update('market_place');
    }
    
    public function update_sub_image($images_id,$product_image) {
        $this->db->set('images_name',$product_image);
        $this->db->where('images_id',$images_id);
        $this->db->update('images');
    }
    
    public function delete_sub_image($images_id) {
        $this->db->where('images_id', $images_id);
        $this->db->delete('images');
    }
    
    public function insert_promote($data,$market_place_id) {
        $this->db->where('market_place_id',$market_place_id);
        $this->db->update('market_place',$data);
    }
    
//    public function get_market_place_is_block($market_place_id) {
//        $this->db->select('market_place_is_block');
//        $this->db->from('market_place');
//        $this->db->where('market_place_id', $market_place_id);
//        
//        $query=$this->db->get();
//        $result=$query->row();
//        return $result->market_place_is_block;
//    }
//    
//    public function change_market_status_as_unblock($market_place_id) {
//        $this->db->set('market_place_is_block',0);
//        $this->db->where('market_place_id',$market_place_id);
//        $this->db->update('market_place');
//    }
//    
//    public function change_market_status_as_block($market_place_id) {
//        $this->db->set('market_place_is_block',1);
//        $this->db->where('market_place_id',$market_place_id);
//        $this->db->update('market_place');
//    }
    
    public function get_top_ad_settings_info() {
        $this->db->select('*');
        $this->db->from('ad_settings');
        $this->db->where('ad_type',0);
        
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    
    public function get_bump_ad_settings_info() {
        $this->db->select('*');
        $this->db->from('ad_settings');
        $this->db->where('ad_type',1);
        
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

}

?>