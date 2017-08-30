<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forget_model extends CI_Model
{
	public function exist_email($email)
	{
		$this->db->select('*');
		$this->db->from('registration');
		$this->db->where('reg_email',$email );
		$result = $this->db->get();	
		return $result->result_array();
	}

	public function update_tmp_password($reg_id)
	{
		$this->load->helper('string');
		$tmp_password=random_string('alnum', 40);
		$data = array(

               'tmp_password' => $tmp_password
            );
                $this->load->library('session');
                
                $newdata = array(
                   'tmp_password'  => $tmp_password
               );

		$this->db->where('login_reg_id', $reg_id);
		$this->db->update('login', $data); 
		$this->session->set_userdata($newdata);
		return $tmp_password;
	}

	public function update_password($tmp_password,$password)
	{

		$data = array(

               'login_password' => $password
            );

		$this->db->where('tmp_password', $tmp_password);
		$this->db->update('login', $data); 
	}


	public function get_email($tmp_password)
	{

		$this->db->select('*');
		$this->db->from('login');
		$this->db->where('tmp_password',$tmp_password );
		$result = $this->db->get();	
		return $result->result_array();
	}



	public function update_password_reset($tmp_password,$password)
	{
		$this->load->helper('string');
		$new_tmp_password=random_string('alnum', 40);

		 $data = array(

               'tmp_password' => $new_tmp_password
            );

		 $this->db->where('tmp_password', $tmp_password);
		$this->db->update('login', $data); 
	}
	
}