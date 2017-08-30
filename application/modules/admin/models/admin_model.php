<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function today_viewers_count($today) {
        $this->db->select('*');
        $this->db->from('count_viewers');
        $this->db->where('date(viewers_date)', $today);

        $result = $this->db->get();
        return $result->num_rows();
    }

    public function weekly_viewers_count() {
        $this->db->select('*');
        $this->db->from('count_viewers');
        $this->db->where('date(viewers_date)<', date('Y-m-d', strtotime('+1 week')));

        $result = $this->db->get();
        return $result->num_rows();
    }

    public function monthly_viewers_count($month) {
        $this->db->select('*');
        $this->db->from('count_viewers');
        $this->db->where('DATE_FORMAT(viewers_date,"%Y-%m")', $month);

        $result = $this->db->get();
        return $result->num_rows();
    }

    public function total_viewers_count() {
        $this->db->select('*');
        $this->db->from('count_viewers');

        $result = $this->db->get();
        return $result->num_rows();
    }

    public function get_all_category() {
        $this->db->select('*');
        $this->db->from('category');
        $result = $this->db->get();
        return $result->result();
    }

    public function get_buyer_user_info() {
        $this->db->select('*');
        $this->db->from('registration');
        $this->db->where('type', 3);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_seller_user_info() {
        $this->db->select('*');
        $this->db->from('registration');
        $this->db->where('type', 2);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_market_user_info() {
        $this->db->select('*');
        $this->db->from('registration');
        $this->db->where('type', 4);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_market_sponsor_info() {
        $this->db->select('*');
        $this->db->from('market_sponsor');
        $result = $this->db->get();
        return $result->result_array();
    }
    
    
    public function get_advertise_image($post_name)
    {
        $this->db->select('image');
        $this->db->from('advertise');
        $this->db->where('post_name',$post_name);
        $result = $this->db->get();
        return $result->result();
    }

public function get_advertise($post_name)
    {
        $this->db->select('*');
        $this->db->from('advertise');
        $this->db->where('post_name',$post_name);
        $result = $this->db->get();
        return $result->result();
    }
    

    public function get_all_sub_category() {
        $this->db->select('*');
        $this->db->from('sub_category');
        $result = $this->db->get();
        return $result->result();
    }

    public function get_all_trade() {
        $this->db->select('*');
        $this->db->from('trade');
        $result = $this->db->get();
        return $result->result();
    }

    public function get_product_number() {
        $this->db->select('count(*) as p_count');
        $this->db->from('product');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_market_number() {
        $this->db->select('count(*) as m_count');
        $this->db->from('market_place');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_trade_number() {
        $this->db->select('count(*) as t_count');
        $this->db->from('trade_show');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function update_slider_status($data, $p_id) {
        $this->db->where('id', $p_id);
        $this->db->update('slider', $data);
    }

    public function update_market_slider_status($data, $p_id) {
        $this->db->where('id', $p_id);
        $this->db->update('market_slider', $data);
    }

    public function update_status($contact_id, $data) {

        $this->db->where('contact_id', $contact_id);
        $this->db->update('contact_us', $data);
    }

    public function insert_market_slider_images($data) {
        $this->db->insert('market_slider', $data);
    }

    public function insert_slider_images($data) {
        $this->db->insert('slider', $data);
    }

    public function get_specific_slider($p_id) {
        $this->db->select('*');
        $this->db->from('slider');
        $this->db->where('id', $p_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_specific_market_slider($p_id) {
        $this->db->select('*');
        $this->db->from('market_slider');
        $this->db->where('id', $p_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_all_product() {
        $this->db->select('*');
        $this->db->from('product');
        $result = $this->db->get();
        return $result->result();
    }

    public function update_product_status($data, $p_id) {
        $this->db->where('product_id', $p_id);
        $this->db->update('product', $data);
    }

    public function get_specific_product($p_id) {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_id', $p_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_all_user() {
        $this->db->select('*');
        $this->db->from('registration');
        $this->db->join('login', 'login.login_reg_id = registration.reg_id');
        $this->db->join('reg_members', 'reg_members.reg_id = registration.reg_id','LEFT');
        $result = $this->db->get();
        return $result->result();
    }

    public function get_all_pending_members() {
        $this->db->select('*');
        $this->db->from('registration');
        $this->db->join('login', 'login.login_reg_id = registration.reg_id');
        $this->db->join('reg_members', 'reg_members.reg_id = registration.reg_id','LEFT');
        $this->db->where('reg_members.members_status',0);
        $result = $this->db->get();
        return $result->result();
    }

    public function update_user_status($data, $id) {
        $this->db->where('login_id', $id);
        $this->db->update('login', $data);
    }

    public function get_members_status($id) {
        $this->db->select('members_status');
        $this->db->from('reg_members');
        $this->db->where('id', $id);
        $result = $this->db->get();
        return $result->row('members_status');
    }
    
    public function update_members_status($members_status, $id) {
        $this->db->set('members_status', $members_status);
        $this->db->where('id', $id);
        $this->db->update('reg_members');
    }

    public function get_specific_user($id) {
        $this->db->select('*');
        $this->db->from('login');
        $this->db->where('login_id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_all_company() {
        $this->db->select('*');
        $this->db->from('company');
        $result = $this->db->get();
        return $result->result();
    }

    public function update_company_status($data, $p_id) {
        $this->db->where('company_id', $p_id);
        $this->db->update('company', $data);
    }

    public function get_specific_company($p_id) {
        $this->db->select('*');
        $this->db->from('company');
        $this->db->where('company_id', $p_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    /////////////  Edited By The Mighty Aman SHAHEB////////////////////



    public function update_specific_cat_image($data, $m_id) {
        $this->db->where('market_category_id', $m_id);
        $this->db->update('market_category', $data);
    }

    public function get_specific_market_product($p_id) {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->where('market_place_id', $p_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function update_market_product_status($data, $p_id) {
        $this->db->where('market_place_id', $p_id);
        $this->db->update('market_place', $data);
    }

    public function get_specific_cat($cat_id) {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('cat_id', $cat_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function update_cat_status($data, $cat_id) {
        $this->db->where('cat_id', $cat_id);
        $this->db->update('category', $data);
    }

    public function insert_sponsor($data) {
        $this->db->insert('market_sponsor', $data);
    }

    public function delete_sponsor($id) {
        $this->db->where('sponor_id', $id);
        $this->db->delete('market_sponsor');
    }

    public function delete_trade($id) {
        $this->db->where('id', $id);
        $this->db->delete('trade');
    }

    public function get_all_market_product() {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->join('market_category', 'market_place.market_category_id=market_category.market_category_id');
        $this->db->join('market_sub_category', 'market_place.market_sub_cat_id=market_sub_category.market_sub_cat_id');
        $this->db->join('registration', 'registration.reg_id=market_place.reg_id');
        $result = $this->db->get();
        return $result->result();
    }

    public function password_change($data, $reg_id) {
        $this->db->where('login_reg_id', $reg_id);
        $this->db->update('login', $data);
    }

    public function all_contact_image() {
        $this->db->select('*');
        $this->db->from('contact_us_image');

        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function save_contact_us_info($data) {
        $this->db->insert('contact_us_image', $data);
    }

    public function update_contact_us_info($data1) {
        $this->db->update('contact_us_image', $data1);
    }

    public function update_how_to_sell_first($data) {
        $this->db->update('how_to_sell_first', $data);
    }

    public function insert_how_to_sell_first($data) {
        $this->db->insert('how_to_sell_first', $data);
    }

    public function get_how_to_sell_first() {
        $this->db->select('*');
        $this->db->from('how_to_sell_first');

        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function insert_promote_ad_description($data) {
        $this->db->insert('promote_ad', $data);
    }

    public function update_promote_ad_description($data) {
        $this->db->update('promote_ad', $data);
    }

    public function insert_stay_safe_description($data) {
        $this->db->insert('stay_safe', $data);
    }

    public function update_stay_safe_description($data) {
        $this->db->update('stay_safe', $data);
    }

    public function get_settings_value() {
        $this->db->select('*');
        $this->db->from('ad_settings');

        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function update_fb_link($data) {
        $this->db->set('fb_link', $data);
        $this->db->where('social_link_id', 1);
        $this->db->update('social_link');
    }
    
    public function update_tweet_link($data) {
        $this->db->set('tweet_link', $data);
        $this->db->where('social_link_id', 1);
        $this->db->update('social_link');
    }
    
    public function update_google_link($data) {
        $this->db->set('google_plus_link', $data);
        $this->db->where('social_link_id', 1);
        $this->db->update('social_link');
    }

}

?>