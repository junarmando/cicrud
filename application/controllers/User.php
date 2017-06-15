<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{			
		$this->show_users();					
	}
		
	public function show_users() {
	
		$this->load->model('user_model');

		$data['users'] = $this->user_model->get_users();
		
		$this->load->view('header');	
		$this->load->view('userlist', $data);
		$this->load->view('footer');	
			
	} 	

	public function edit($id)
	{
		
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->model('user_model');
			
			$data['user'] = $this->user_model->get_user($id);

			$this->load->view('header');	
			$this->load->view('useredit', $data);
			$this->load->view('footer');	
			
		}
		else
		{		
			$this->load->model('user_model');
			
			$data = array(
			   'firstname' => set_value('firstname') ,
			   'lastname' => set_value('lastname') ,
			   'email' => set_value('email') ,
			);	

			$this->user_model->update_user($data, $id);
		
			//$data['user'] = $this->user_model->get_user($id);

			//$this->load->view('useredit', $data);	
			
			redirect(base_url().'user', 'refresh');				
		}			
		
	}	
	
	public function add()
	{
		
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('header');	
			$this->load->view('useradd');
			$this->load->view('footer');	
		}
		else
		{		
			$this->load->model('user_model');
			
			$data = array(
			   'firstname' => set_value('firstname') ,
			   'lastname' => set_value('lastname') ,
			   'email' => set_value('email') ,
			);	

			$this->user_model->insert_user($data);		
			

			redirect(base_url().'user', 'refresh');				
		}			
				
		
	}

	
	public function delete($id)
	{
		
		$this->load->model('user_model');
		
		$this->user_model->delete_user($id);
		
		redirect(base_url().'user', 'refresh');				
		
	}	
	
	
}
