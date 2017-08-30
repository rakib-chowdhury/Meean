<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forget extends MX_Controller {

	public function index()
	{


		if($this->input->post('recovery_submit'))
		{
			$email=$this->input->post('f_email');
			//echo $email;
			
			$this->load->model('forget_model');
			$info=$this->forget_model->exist_email($email);
			
			if(count($info)!=0)
			{
			$reg_id=$info[0]['reg_id'];
				//echo "here";

				$this->load->helper('html');	
				$this->load->library('email');
				
				 $this->load->library('session');
                
			                $newdata = array(
			                   'email'  => $email
			               );
				 $this->session->set_userdata($newdata);
				//$this->session->set_userdata($email);
				//$config['protocol'] = 'mail';$this->email->initialize($config);

				$tmp_password=$this->forget_model->update_tmp_password($reg_id);
				//echo $tmp_password;	
				   $config = Array(
					'protocol' => 'smtp',
					'smtp_host' => 'infiniti.websitewelcome.com',
					'smtp_port' => 465,
					'smtp_user' => 'noreply@geeksntechnology.com',
					'smtp_pass' => '41Rv!HLcIXFv',
					'mailtype'  => 'html', 
					'charset'   => 'iso-8859-1'
					);

				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");



				$this->email->from('support@meeean.com','meeean.com');
				$this->email->to($email);
				$base=$this->config->base_url();
				$message=heading('Your Email:');
				$message.=$email;
				$message.=br(2);
				$message.=heading('Password Recovery Link:');
				$message.="<a href='".$base."index.php/forget/getlink/".$tmp_password."'>Click Here</a>";
				$message.=br(2);
				$message.="Thank You";
                //$message="<a href='fsdkfjdsfjsdfjdsf'>sdfsdfsdf</a>";
				$this->email->subject('Password Recovery');
				$this->email->message($message);
                $this->email->set_mailtype("html");
				$this->email->send();
                               // echo "<script>alert('Please check your email to update your password');</script>";
				//echo $this->email->print_debugger();
				//redirect('welcome','refresh');
				echo "<script>
				alert('Please check your email to update your password');
				window.location.href='login';
				</script>";

			}



			else
			{
				//echo "";
				echo "<script>
				alert('Email not registered yet!!!');
				window.location.href='login';
				</script>";

			}
		}

		
	}

	public function update_password()
	{
		$data['message_error_password']=NULL;
		if($this->input->post('update'))
		{
			$this->form_validation->set_rules('pas_wrd', 'Password', 'required|matches[con_pas_wrd]');
			$this->form_validation->set_rules('con_pas_wrd', 'Password Confirmation', 'required');


			if($this->form_validation->run() == false)
			{
				$data['message_error_password'] = validation_errors();
				$this->load->view('view_forget_password',$data);
			}

			else
			{
			    $tmp_password= $this->session->userdata('tmp_password');
				$password=md5($this->input->post('pas_wrd'));
				$this->load->model('forget_model');
				$this->forget_model->update_password($tmp_password,$password);
				$this->forget_model->update_password_reset($tmp_password,$password);

				echo "<script>
				alert('Password Update Successfully.Now you can log in through your new password');
				window.location.href='../login';
				</script>";
			}
		}
	}
	public function getlink()
	{
	$tmp_password= $this->session->userdata('tmp_password');
	$this->load->model('forget_model');
	$get_email=$this->forget_model->get_email($tmp_password);
	//	echo $get_email->result_array();
		// $data['email']=$get_email;
	    $data['message_error_password']=NULL;
	    $this->load->view('view_forget_password',$data);
	}
}