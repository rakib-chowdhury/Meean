<?php

class Market_place_model extends CI_Model
{

    //put your code here
    public function total_viewers_count()
    {
        return $this->db->select('*')
            ->from('count_viewers')
            ->limit(1)
            ->order_by('viewers_id', 'DESC')
            ->get()
            ->row();
    }

    public function viewers_count($data)
    {
        $this->db->insert('count_viewers', $data);
    }

    public function market_category_with_sub_category()
    {
        $this->db->select('mc.*, ms.*');
        $this->db->from('market_category mc');
        $this->db->join('market_sub_category ms', 'mc.market_category_id = ms.market_category_id', 'Left');

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function select_market_location()
    {
        $this->db->select('*');
        $this->db->from('location');

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_market_slider()
    {
        $this->db->select('*');
        $this->db->from('market_slider');
        $this->db->where('status', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function select_market_category()
    {
        $this->db->select('*');
        $this->db->from('market_category');

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function select_market_cat()
    {/////////////iti
        $sql = "SELECT mc.*, count(ms.market_sub_cat_id) as sub_cat_num FROM `market_category` mc left join `market_sub_category` ms on mc.market_category_id=ms.market_category_id group by mc.market_category_id";
        return $this->db->query($sql)->result();
    }

    public function select_ad_by_sub_category($market_category)
    {
        $this->db->select('*');
        $this->db->from('market_category');
        $this->db->join('market_sub_category', 'market_sub_category.market_category_id = market_category.market_category_id');
        $this->db->where('market_sub_category.market_sub_cat_id', $market_category);

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function select_ad_by_category($market_category)
    {
        $this->db->select('*');
        $this->db->from('market_category');
        $this->db->where('market_category_id', $market_category);

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function market_place_description()
    {
        $this->db->select('mp.*, mc.*,lc.*');
        $this->db->from('market_place mp');
        $this->db->join('market_category mc', 'mc.market_category_id = mp.market_category_id');
        $this->db->join('location lc', 'lc.location_id = mp.market_place_location');

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function search($keyword)
    {
        $this->db->select('mp.*, mc.*,lc.*');
        $this->db->from('market_place mp');
        $this->db->join('market_category mc', 'mc.market_category_id = mp.market_category_id');
        $this->db->join('location lc', 'lc.location_id = mp.market_place_location');
        $this->db->like('market_place_name', $keyword);
        $query = $this->db->get();
        return $query->result();
    }

    public function market_place_description_pagination($limit, $start, $keyword)
    {
        $this->db->limit($limit, $start);
        $this->db->select('mp.*, mc.*,lc.*,reg.*');
        $this->db->from('market_place mp');
        $this->db->join('market_category mc', 'mc.market_category_id = mp.market_category_id');
        $this->db->join('location lc', 'lc.location_id = mp.market_place_location');
        $this->db->join('reg_members reg', 'reg.reg_id = mp.reg_id', 'LEFT');
        $this->db->order_by("mp.market_place_id", "DESC");
        $this->db->like('mp.market_place_name', $keyword);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function market_place_description_pagination_all($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('mp.*, mc.*,lc.*,reg.*');
        $this->db->from('market_place mp');
        $this->db->join('market_category mc', 'mc.market_category_id = mp.market_category_id');
        $this->db->join('location lc', 'lc.location_id = mp.market_place_location');
        $this->db->join('reg_members reg', 'reg.reg_id = mp.reg_id', 'LEFT');
        $this->db->order_by("mp.market_place_id", "DESC");
        $this->db->where('market_place_is_block', 0);
        $this->db->where('top_ad', 0);
        $this->db->where('bump_ad', 0);
//        $this->db->where('reg.members_status', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_all_top_product_by_keyword($keyword, $duration)
    {
        $this->db->select('*');
        $this->db->order_by('rand()');
        $this->db->like('market_place.market_place_name', $keyword);
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('location', 'location.location_id = market_place.market_place_location');
        $this->db->join('market_category', 'market_category.market_category_id = market_place.market_category_id');
        $this->db->limit(2);
        $this->db->where('market_place_publish_date BETWEEN DATE_SUB(NOW(), INTERVAL ' . $duration . ' DAY) AND NOW()');
        $this->db->where('top_ad', 1);
        $this->db->where('market_place.market_place_is_block', 0);
        $query = $this->db->get('market_place');
        $result = $query->result_array();
        return $result;
    }

    public function get_all_bump_product_by_keyword($keyword, $duration)
    {
        $this->db->select('*');
        $this->db->order_by('rand()');
        $this->db->like('market_place.market_place_name', $keyword);
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('location', 'location.location_id = market_place.market_place_location');
        $this->db->join('market_category', 'market_category.market_category_id = market_place.market_category_id');
        $this->db->limit(6);
        $this->db->where('market_place_publish_date BETWEEN DATE_SUB(NOW(), INTERVAL ' . $duration . ' DAY) AND NOW()');
        $this->db->where('bump_ad', 1);
        $this->db->where('market_place.market_place_is_block', 0);
        $query = $this->db->get('market_place');
        $result = $query->result_array();
        return $result;
    }

    public function all_bump_settings()
    {
        $this->db->select('*');
        $this->db->from('ad_settings');
        $this->db->where('ad_type', 1);

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function all_top_settings()
    {
        $this->db->select('*');
        $this->db->from('ad_settings');
        $this->db->where('ad_type', 0);

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function get_top_ad_start()
    {
        $this->db->select('top_ad_start');
        $this->db->from('market_place');
        $this->db->where('top_ad', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function get_top_ad_end()
    {
        $this->db->select('top_ad_end');
        $this->db->from('market_place');
        $this->db->where('top_ad', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
//    public function get_duration()
//    {
//        $this->db->select('TIMESTAMPDIFF(DAY,top_ad_start,top_ad_end )',FALSE);
//        $this->db->from('market_place');
//        $this->db->where('top_ad', 1);
//        $query = $this->db->get();
//        $result = $query->result();
//        return $result;
//    }
    public function get_duration()
    {
        $this->db->select('*,TIMESTAMPDIFF(DAY,top_ad_start,top_ad_end )',FALSE);
        $this->db->from('market_place');
        $this->db->where('top_ad', 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_all_top_product($duration)
    {
        $this->db->select('*');
        $this->db->order_by('rand()');
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('location', 'location.location_id = market_place.market_place_location');
        $this->db->join('market_category', 'market_category.market_category_id = market_place.market_category_id');
        $this->db->limit(2);
        $this->db->where('market_place_publish_date BETWEEN DATE_SUB(NOW(), INTERVAL ' . $duration . ' DAY) AND NOW()');
        $this->db->where('top_ad', 1);
        $this->db->where('market_place.market_place_is_block', 0);
        $query = $this->db->get('market_place');
        $result = $query->result_array();
        return $result;
    }

    public function all_top_product($duration)
    {
        $this->db->select('*');
        $this->db->from('market_place');

        $this->db->where('top_ad', 1);
        $this->db->where('market_place_publish_date < DATE_SUB(NOW(), INTERVAL ' . $duration . ' DAY) AND NOW()');
        $this->db->where('market_place.market_place_is_block', 0);

        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function update_top_product($market_place_id)
    {
        $this->db->set('top_ad', 0);
        $this->db->where('market_place_id', $market_place_id);
        $this->db->update('market_place');
    }

    public function all_bump_product($duration)
    {
        $this->db->select('*');
        $this->db->from('market_place');

        $this->db->where('bump_ad', 1);
        $this->db->where('market_place_publish_date < DATE_SUB(NOW(), INTERVAL ' . $duration . ' DAY) AND NOW()');
        $this->db->where('market_place.market_place_is_block', 0);

        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function update_bump_product($market_place_id)
    {
        $this->db->set('bump_ad', 0);
        $this->db->where('market_place_id', $market_place_id);
        $this->db->update('market_place');
    }

    public function get_all_bump_product($duration)
    {
        $this->db->select('*');
        $this->db->order_by('rand()');
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('location', 'location.location_id = market_place.market_place_location');
        $this->db->join('market_category', 'market_category.market_category_id = market_place.market_category_id');
        $this->db->limit(6);
        $this->db->where('market_place_publish_date BETWEEN DATE_SUB(NOW(), INTERVAL ' . $duration . ' DAY) AND NOW()');
        $this->db->where('bump_ad', 1);
        $this->db->where('market_place.market_place_is_block', 0);
        $query = $this->db->get('market_place');
        $result = $query->result_array();
        return $result;
    }

    public function market_place_description_by_search($market_category_id, $location_name, $minimum, $maximum, $district, $upazilla)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('location', 'market_place.market_place_location=location.location_id', 'LEFT');
        $this->db->join('district', 'market_place.market_dist_id=district.dist_id', 'LEFT');
        $this->db->join('upazilla', 'market_place.market_upz_id=upazilla.upz_id', 'LEFT');
        $this->db->join('market_category', 'market_place.market_category_id=market_category.market_category_id', 'LEFT');
        $this->db->join('reg_members', 'market_place.reg_members=market_category.market_category_id', 'LEFT');
        if ($market_category_id != null) {
            $this->db->where('market_place.market_category_id', $market_category_id);
        }
        if ($minimum != null) {
            $this->db->where('market_place.market_place_price >=', $minimum);
        }

        if ($maximum != null) {
            $this->db->where('market_place.market_place_price <=', $maximum);
        }

        if ($location_name != null) {
            $this->db->where('market_place.market_place_location', $location_name);
        }

        if ($district != null) {
            $this->db->where('market_place.market_dist_id', $district);
        }

        if ($upazilla != null) {
            $this->db->where('market_place.market_upz_id', $upazilla);
        }    
        //$this->db->where('reg_members.members_status', 1);
        $this->db->where('market_place.market_place_is_block', 0);
        $this->db->order_by("market_place.market_place_id", "DESC");

//        $where = "mp.market_category_id=$market_category_id OR mp.market_place_location=$location_name";
//        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function market_place_description_by_search2($market_category_id, $location_name, $minimum, $maximum, $district, $upazilla, $view_ads)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('location', 'market_place.market_place_location=location.location_id', 'LEFT');
        $this->db->join('district', 'market_place.market_dist_id=district.dist_id', 'LEFT');
        $this->db->join('upazilla', 'market_place.market_upz_id=upazilla.upz_id', 'LEFT');
        $this->db->join('market_category', 'market_place.market_category_id=market_category.market_category_id', 'LEFT');
        //$this->db->join('reg_members', 'market_place.reg_members=market_category.market_category_id', 'LEFT');
        if ($market_category_id != null) {
            $this->db->where('market_place.market_category_id', $market_category_id);
        }
        if ($minimum != null) {
            $this->db->where('market_place.market_place_price >=', $minimum);
        }

        if ($maximum != null) {
            $this->db->where('market_place.market_place_price <=', $maximum);
        }

        if ($location_name != null) {
            $this->db->where('market_place.market_place_location', $location_name);
        }

        if ($district != null) {
            $this->db->where('market_place.market_dist_id', $district);
        }

        if ($upazilla != null) {
            $this->db->where('market_place.market_upz_id', $upazilla);
        }
        if ($view_ads==1) {
            $this->db->where('reg_members.members_status', 1);
        }
        
        $this->db->where('market_place.market_place_is_block', 0);
        $this->db->order_by("market_place.market_place_id", "DESC");
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_top_product_by_search($market_category_id, $location_name, $minimum, $maximum, $district, $upazilla, $duration)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->order_by('rand()');
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('location', 'location.location_id = market_place.market_place_location');
        $this->db->join('market_category', 'market_category.market_category_id = market_place.market_category_id');
        $this->db->limit(2);
        $this->db->where('market_place_publish_date BETWEEN DATE_SUB(NOW(), INTERVAL ' . $duration . ' DAY) AND NOW()');
        if ($market_category_id != null) {
            $this->db->where('market_place.market_category_id', $market_category_id);
        }
        if ($minimum != null) {
            $this->db->where('market_place.market_place_price >=', $minimum);
        }

        if ($maximum != null) {
            $this->db->where('market_place.market_place_price <=', $maximum);
        }

        if ($location_name != null) {
            $this->db->where('market_place.market_place_location', $location_name);
        }

        if ($district != null) {
            $this->db->where('market_place.market_dist_id', $district);
        }

        if ($upazilla != null) {
            $this->db->where('market_place.market_upz_id', $upazilla);
        }
        $this->db->where('market_place.top_ad', 1);
        $this->db->where('market_place.market_place_is_block', 0);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function get_all_top_product_by_search2($market_category_id, $location_name, $minimum, $maximum, $district, $upazilla, $duration, $view_ads)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->order_by('rand()');
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('location', 'location.location_id = market_place.market_place_location');
        $this->db->join('market_category', 'market_category.market_category_id = market_place.market_category_id');
        $this->db->limit(2);
        if ($view_ads == 1) {
            $this->db->where('reg_members.members_status', 1);
        }
        $this->db->where('market_place.market_place_publish_date BETWEEN DATE_SUB(NOW(), INTERVAL ' . $duration . ' DAY) AND NOW()');
        if ($market_category_id != null) {
            $this->db->where('market_place.market_category_id', $market_category_id);
        }
        if ($minimum != null) {
            $this->db->where('market_place.market_place_price >=', $minimum);
        }

        if ($maximum != null) {
            $this->db->where('market_place.market_place_price <=', $maximum);
        }

        if ($location_name != null) {
            $this->db->where('market_place.market_place_location', $location_name);
        }

        if ($district != null) {
            $this->db->where('market_place.market_dist_id', $district);
        }

        if ($upazilla != null) {
            $this->db->where('market_place.market_upz_id', $upazilla);
        }
        $this->db->where('market_place.top_ad', 1);
        $this->db->where('market_place.market_place_is_block', 0);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function get_all_bump_product_by_search($market_category_id, $location_name, $minimum, $maximum, $district, $upazilla, $duration)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->order_by('rand()');
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('location', 'location.location_id = market_place.market_place_location');
        $this->db->join('market_category', 'market_category.market_category_id = market_place.market_category_id');
        $this->db->limit(6);
        $this->db->where('market_place_publish_date BETWEEN DATE_SUB(NOW(), INTERVAL ' . $duration . ' DAY) AND NOW()');
        if ($market_category_id != null) {
            $this->db->where('market_place.market_category_id', $market_category_id);
        }
        if ($minimum != null) {
            $this->db->where('market_place.market_place_price >=', $minimum);
        }

        if ($maximum != null) {
            $this->db->where('market_place.market_place_price <=', $maximum);
        }

        if ($location_name != null) {
            $this->db->where('market_place.market_place_location', $location_name);
        }

        if ($district != null) {
            $this->db->where('market_place.market_dist_id', $district);
        }

        if ($upazilla != null) {
            $this->db->where('market_place.market_upz_id', $upazilla);
        }
        $this->db->where('market_place.bump_ad', 1);
        $this->db->where('market_place.market_place_is_block', 0);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function get_all_bump_product_by_search2($market_category_id, $location_name, $minimum, $maximum, $district, $upazilla, $duration,$view_add)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->order_by('rand()');
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('location', 'location.location_id = market_place.market_place_location');
        $this->db->join('market_category', 'market_category.market_category_id = market_place.market_category_id');
        $this->db->limit(6);
        $this->db->where('market_place_publish_date BETWEEN DATE_SUB(NOW(), INTERVAL ' . $duration . ' DAY) AND NOW()');
        if ($market_category_id != null) {
            $this->db->where('market_place.market_category_id', $market_category_id);
        }
        if ($minimum != null) {
            $this->db->where('market_place.market_place_price >=', $minimum);
        }

        if ($maximum != null) {
            $this->db->where('market_place.market_place_price <=', $maximum);
        }

        if ($location_name != null) {
            $this->db->where('market_place.market_place_location', $location_name);
        }

        if ($district != null) {
            $this->db->where('market_place.market_dist_id', $district);
        }

        if ($upazilla != null) {
            $this->db->where('market_place.market_upz_id', $upazilla);
        }
        if ($view_add==1) {
            $this->db->where('reg_members.members_status', 1);
        }
        $this->db->where('market_place.bump_ad', 1);
        $this->db->where('market_place.market_place_is_block', 0);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function market_place_description_by_search_pagination($market_category_id, $location_name, $minimum, $maximum, $district, $upazilla, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('location', 'market_place.market_place_location=location.location_id', 'LEFT');
        $this->db->join('district', 'market_place.market_dist_id=district.dist_id', 'LEFT');
        $this->db->join('upazilla', 'market_place.market_upz_id=upazilla.upz_id', 'LEFT');
        $this->db->join('market_category', 'market_place.market_category_id=market_category.market_category_id', 'LEFT');
        if ($market_category_id != null) {
            $this->db->where('market_place.market_category_id', $market_category_id);
        }
//       $this->db->where('mp.market_place_price BETWEEN "'.$minimum. '" and "'.$maximum.'"');
        //$this->db->where('mp.market_place_price>=', $minimum);
        //$this->db->where('mp.market_place_price<=', $maximum);
        if ($minimum != null) {
            $this->db->where('market_place.market_place_price >=', $minimum);
        }

        if ($maximum != null) {
            $this->db->where('market_place.market_place_price <=', $maximum);
        }

        if ($location_name != null) {
            $this->db->where('market_place.market_place_location', $location_name);
        }

        if ($district != null) {
            $this->db->where('market_place.market_dist_id', $district);
        }

        if ($upazilla != null) {
            $this->db->where('market_place.market_upz_id', $upazilla);
        }
//        $this->db->where('mp.market_place_location',$location_name);
        $this->db->where('market_place.market_place_is_block', 0);
        $this->db->order_by("market_place.market_place_id", "DESC");

        $query = $this->db->get();
        return $query->result();
    }
    public function market_place_description_by_search_pagination2($market_category_id, $location_name, $minimum, $maximum, $district, $upazilla, $limit, $start, $view_ads)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('location', 'market_place.market_place_location=location.location_id', 'LEFT');
        $this->db->join('district', 'market_place.market_dist_id=district.dist_id', 'LEFT');
        $this->db->join('upazilla', 'market_place.market_upz_id=upazilla.upz_id', 'LEFT');
        $this->db->join('market_category', 'market_place.market_category_id=market_category.market_category_id', 'LEFT');
        if ($market_category_id != null) {
            $this->db->where('market_place.market_category_id', $market_category_id);
        }
//       $this->db->where('mp.market_place_price BETWEEN "'.$minimum. '" and "'.$maximum.'"');
        //$this->db->where('mp.market_place_price>=', $minimum);
        //$this->db->where('mp.market_place_price<=', $maximum);
        if ($minimum != null) {
            $this->db->where('market_place.market_place_price >=', $minimum);
        }

        if ($maximum != null) {
            $this->db->where('market_place.market_place_price <=', $maximum);
        }

        if ($location_name != null) {
            $this->db->where('market_place.market_place_location', $location_name);
        }

        if ($district != null) {
            $this->db->where('market_place.market_dist_id', $district);
        }

        if ($upazilla != null) {
            $this->db->where('market_place.market_upz_id', $upazilla);
        }
        if ($view_ads == 1) {
            $this->db->where('reg_members.members_status', 1);
        }
//        $this->db->where('mp.market_place_location',$location_name);
        $this->db->where('market_place.market_place_is_block', 0);
        $this->db->order_by("market_place.market_place_id", "DESC");

        $query = $this->db->get();
        return $query->result();
    }

    public function select_all_cat()
    {
        $this->db->select('*');
        $this->db->from('category');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function market_place_filter_by_cat($cat_id)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('market_category', 'market_place.market_category_id= market_category.market_category_id');
        $this->db->join('location', 'market_place.market_place_location=location.location_id');
        $this->db->where('market_place.market_category_id', $cat_id);
        $this->db->where('market_place.market_place_is_block', 0);
        $this->db->order_by("market_place.market_place_id", "DESC");
        $query = $this->db->get();
        return $query->result();
    }

    public function market_place_filter_by_cat_pagination($cat_id, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('market_category', 'market_place.market_category_id= market_category.market_category_id');
        $this->db->join('location', 'market_place.market_place_location=location.location_id');
        $this->db->where('market_place.market_category_id', $cat_id);
        $this->db->where('market_place.market_place_is_block', 0);
        $this->db->order_by("market_place.market_place_id", "DESC");
        $query = $this->db->get();
        return $query->result();
    }
    public function market_place_filter_by_cat_pagination2($cat_id, $limit, $start, $view_ads)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('market_category', 'market_place.market_category_id= market_category.market_category_id');
        $this->db->join('location', 'market_place.market_place_location=location.location_id');
        $this->db->where('market_place.market_category_id', $cat_id);
        $this->db->where('market_place.market_place_is_block', 0);
        $this->db->order_by("market_place.market_place_id", "DESC");
        if($view_ads==1)
        {
            $this->db->where('reg_members.members_status', 1);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_top_product_by_category($cat_id, $duration)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->order_by('rand()');
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('location', 'location.location_id = market_place.market_place_location');
        $this->db->join('market_category', 'market_category.market_category_id = market_place.market_category_id');
        $this->db->limit(2);
        $this->db->where('market_place_publish_date BETWEEN DATE_SUB(NOW(), INTERVAL ' . $duration . ' DAY) AND NOW()');
        $this->db->where('top_ad', 1);
        $this->db->where('market_place.market_category_id', $cat_id);
        $this->db->where('market_place.market_place_is_block', 0);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    public function get_all_top_product_by_category2($cat_id, $duration, $view_ads)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->order_by('rand()');
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('location', 'location.location_id = market_place.market_place_location');
        $this->db->join('market_category', 'market_category.market_category_id = market_place.market_category_id');
        $this->db->limit(2);
        $this->db->where('market_place_publish_date BETWEEN DATE_SUB(NOW(), INTERVAL ' . $duration . ' DAY) AND NOW()');
        $this->db->where('top_ad', 1);
        $this->db->where('market_place.market_category_id', $cat_id);
        $this->db->where('market_place.market_place_is_block', 0);
        if($view_ads==1)
        {
            $this->db->where('reg_members.members_status', 1);
        }
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function get_all_bump_product_by_category($cat_id, $duration)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->order_by('rand()');
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('location', 'location.location_id = market_place.market_place_location');
        $this->db->join('market_category', 'market_category.market_category_id = market_place.market_category_id');
        $this->db->limit(6);
        $this->db->where('market_place_publish_date BETWEEN DATE_SUB(NOW(), INTERVAL ' . $duration . ' DAY) AND NOW()');
        $this->db->where('bump_ad', 1);
        $this->db->where('market_place.market_category_id', $cat_id);
        $this->db->where('market_place.market_place_is_block', 0);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    public function get_all_bump_product_by_category2($cat_id, $duration, $view_ads)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->order_by('rand()');
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('location', 'location.location_id = market_place.market_place_location');
        $this->db->join('market_category', 'market_category.market_category_id = market_place.market_category_id');
        $this->db->limit(6);
        $this->db->where('market_place_publish_date BETWEEN DATE_SUB(NOW(), INTERVAL ' . $duration . ' DAY) AND NOW()');
        $this->db->where('bump_ad', 1);
        $this->db->where('market_place.market_category_id', $cat_id);
        $this->db->where('market_place.market_place_is_block', 0);
        if($view_ads==1)
        {
            $this->db->where('reg_members.members_status', 1);
        }
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function market_place_filter_by_sub_cat($cat_id)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('market_category', 'market_place.market_category_id= market_category.market_category_id');
        $this->db->join('location', 'location.location_id= market_place.market_place_location');
        $this->db->where('market_place.market_sub_cat_id', $cat_id);
        $this->db->where('market_place.market_place_is_block', 0);
        $this->db->order_by("market_place.market_place_id", "DESC");
        $query = $this->db->get();
        return $query->result();
    }

    public function market_place_filter_by_sub_cat_pagination($cat_id, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('market_category', 'market_place.market_category_id= market_category.market_category_id');
        $this->db->join('location', 'location.location_id= market_place.market_place_location');
        $this->db->where('market_place.market_sub_cat_id', $cat_id);
        $this->db->where('market_place.market_place_is_block', 0);
        $this->db->order_by("market_place.market_place_id", "DESC");
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_top_product_by_subcategory($sub_cat_id, $duration)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->order_by('rand()');
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('location', 'location.location_id = market_place.market_place_location');
        $this->db->join('market_category', 'market_category.market_category_id = market_place.market_category_id');
        $this->db->limit(2);
        $this->db->where('market_place_publish_date BETWEEN DATE_SUB(NOW(), INTERVAL ' . $duration . ' DAY) AND NOW()');
        $this->db->where('top_ad', 1);
        $this->db->where('market_place.market_sub_cat_id', $sub_cat_id);
        $this->db->where('market_place.market_place_is_block', 0);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function get_all_bump_product_by_subcategory($sub_cat_id, $duration)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->order_by('rand()');
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('location', 'location.location_id = market_place.market_place_location');
        $this->db->join('market_category', 'market_category.market_category_id = market_place.market_category_id');
        $this->db->limit(6);
        $this->db->where('market_place_publish_date BETWEEN DATE_SUB(NOW(), INTERVAL ' . $duration . ' DAY) AND NOW()');
        $this->db->where('bump_ad', 1);
        $this->db->where('market_place.market_sub_cat_id', $sub_cat_id);
        $this->db->where('market_place.market_place_is_block', 0);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function select_all_sub_cat($cat_id)
    {
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->where('cat_id', $cat_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function select_product($sub_id)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->where("sub_cat_id", $sub_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function select_product_details_by_id($product_id)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->join('location', 'market_place.market_place_location= location.location_id');
        $this->db->where('market_place_id', $product_id);

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function select_feature_product_3()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('is_feature', 1);
        $this->db->limit('6');
        $this->db->order_by("product_id", "RANDOM");
        $query = $this->db->get();
        $result = $query->result();
        $result = $query->result_array();
        return $result;
    }

    public function select_slider_image()
    {
        $this->db->select('*');
        $this->db->from('market_slider');
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        $result = $query->result();
        $result = $query->result_array();
        return $result;
    }

    public function select_news_feed()
    {
        $this->db->select('*');
        $this->db->from('news_feed');
        $this->db->limit('5');
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function select_advertise()
    {
        $this->db->select('*');
        $this->db->from('advertise');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function select_related_product($market_cat_id)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->where('market_category_id', $market_cat_id);
        $this->db->order_by("market_place_id", "RANDOM");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

//// Add By Shifat
    public function select_description_market_place_id($market_place_id)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->join('registration', 'market_place.reg_id = registration.reg_id');

        $this->db->join('location', 'market_place.market_place_location= location.location_id', 'LEFT');
        $this->db->join('district', 'market_place.market_dist_id= district.dist_id', 'LEFT');
        $this->db->where('market_place.market_place_id', $market_place_id);

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function members_details($reg_id)
    {
        $this->db->select('*');
        $this->db->from('reg_members');
        $this->db->join('registration', 'reg_members.reg_id = registration.reg_id');
        $this->db->where('reg_members.reg_id', $reg_id);
        $this->db->where('reg_members.members_status', 1);

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function members_detail_info($reg_id)
    {
        $this->db->select('*');
        $this->db->from('registration');
        $this->db->join('reg_members', 'registration.reg_id = reg_members.reg_id');
//        $this->db->join('location', 'market_place.market_place_location= location.location_id','LEFT'); 
//        $this->db->join('district', 'market_place.market_dist_id= district.dist_id','LEFT'); 
        $this->db->where('registration.reg_id', $reg_id);
        $this->db->where('reg_members.members_status', 1);

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function members_market_place_description($reg_id)
    {
        $this->db->select('mp.*, mc.*,lc.*');
        $this->db->from('market_place mp');
        $this->db->join('market_category mc', 'mc.market_category_id = mp.market_category_id');
        $this->db->join('location lc', 'lc.location_id = mp.market_place_location');
        $this->db->where('reg_id', $reg_id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_members_product($reg_id)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->where('reg_id', $reg_id);
        $result = $this->db->get();
        return $result->result();
    }

    public function member_market_place_description_pagination_all($limit, $start, $reg_id)
    {
        $this->db->limit($limit, $start);
        $this->db->select('mp.*, mc.*,lc.*');
        $this->db->from('market_place mp');
        $this->db->join('market_category mc', 'mc.market_category_id = mp.market_category_id');
        $this->db->join('location lc', 'lc.location_id = mp.market_place_location');
        $this->db->order_by("mp.market_place_id", "DESC");
        $this->db->where('market_place_is_block', 0);
        $this->db->where('reg_id', $reg_id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_all_top_product_by_reg_id($reg_id, $duration)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->order_by('rand()');
        $this->db->join('location', 'location.location_id = market_place.market_place_location');
        $this->db->join('market_category', 'market_category.market_category_id = market_place.market_category_id');
        $this->db->limit(2);
        $this->db->where('market_place_publish_date BETWEEN DATE_SUB(NOW(), INTERVAL ' . $duration . ' DAY) AND NOW()');
        $this->db->where('top_ad', 1);
        $this->db->where('market_place.reg_id', $reg_id);
        $this->db->where('market_place.market_place_is_block', 0);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function get_all_bump_product_by_reg_id($reg_id, $duration)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->order_by('rand()');
        $this->db->join('location', 'location.location_id = market_place.market_place_location');
        $this->db->join('market_category', 'market_category.market_category_id = market_place.market_category_id');
        $this->db->limit(6);
        $this->db->where('market_place_publish_date BETWEEN DATE_SUB(NOW(), INTERVAL ' . $duration . ' DAY) AND NOW()');
        $this->db->where('bump_ad', 1);
        $this->db->where('market_place.reg_id', $reg_id);
        $this->db->where('market_place.market_place_is_block', 0);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function select_product_by_location($location_id)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->join('registration', 'market_place.reg_id = registration.reg_id');
        $this->db->join('location', 'market_place.market_place_location= location.location_id', 'LEFT');
        $this->db->join('market_category', 'market_place.market_category_id= market_category.market_category_id');
        $this->db->where('market_place.market_place_location', $location_id);

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function select_product_by_location_pagination($location_id, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('registration', 'market_place.reg_id = registration.reg_id');
        $this->db->join('location', 'market_place.market_place_location= location.location_id', 'LEFT');
        $this->db->join('market_category', 'market_place.market_category_id= market_category.market_category_id');
        $this->db->where('market_place.market_place_location', $location_id);

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_all_top_product_by_location($location_id, $duration)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->order_by('rand()');
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('location', 'location.location_id = market_place.market_place_location');
        $this->db->join('market_category', 'market_category.market_category_id = market_place.market_category_id');
        $this->db->limit(2);
        $this->db->where('market_place_publish_date BETWEEN DATE_SUB(NOW(), INTERVAL ' . $duration . ' DAY) AND NOW()');
        $this->db->where('top_ad', 1);
        $this->db->where('market_place.market_place_location', $location_id);
        $this->db->where('market_place.market_place_is_block', 0);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function get_all_bump_product_by_location($location_id, $duration)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->order_by('rand()');
        $this->db->join('reg_members', 'reg_members.reg_id = market_place.reg_id', 'LEFT');
        $this->db->join('location', 'location.location_id = market_place.market_place_location');
        $this->db->join('market_category', 'market_category.market_category_id = market_place.market_category_id');
        $this->db->limit(6);
        $this->db->where('market_place_publish_date BETWEEN DATE_SUB(NOW(), INTERVAL ' . $duration . ' DAY) AND NOW()');
        $this->db->where('bump_ad', 1);
        $this->db->where('market_place.market_place_location', $location_id);
        $this->db->where('market_place.market_place_is_block', 0);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function select_sub_images_by_id($market_place_id)
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->join('images', 'market_place.market_place_id= images.images_table_id', 'LEFT');
        $this->db->where('images.images_table_id', $market_place_id);
        $this->db->where('images.images_type', 4);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

///// Edited by aman

    public function get_sponsor()
    {
        $this->db->select('*');
        $this->db->from('market_sponsor');
        $query = $this->db->get();
        return $query->result_array();
    }

//   Add by Kamrul


    public function get_feature_product()
    {
        $this->db->select('*');
        $this->db->from('market_place');
        $this->db->where('is_feature', 1);
        $this->db->where('market_place_is_block', 0);
        $this->db->order_by("market_place_id", "RANDOM");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function insert_contact_us_data($data)
    {
        $this->db->insert('contact_us', $data);
    }

    public function get_counters()
    {
        $this->db->select('*');
        $this->db->from('count_viewers');
        $result = $this->db->get();
        return $result->row_array();
    }
}
