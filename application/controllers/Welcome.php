<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
		{
			
			if (!$this->ion_auth->logged_in() )		
				    {
				      redirect('auth/login');
				    }
			else
					{	
						$this->load->model("ekologiya_model");
						$data['users'] = $this ->ekologiya_model->get_users();
						$this->load->view('welcome_message',$data);
					}
		}
	Public function Admin()
		{
			if (!$this->ion_auth->logged_in())		
				    {
				      redirect('auth/login');
				    }
			else
					{					
						$this->load->views('admin/admin',$data);					
					}
		}

	public function create_account()
		{
			$data['message'] = "new account";
			$this->load->view('auth/create_user',$data);
		}
}
