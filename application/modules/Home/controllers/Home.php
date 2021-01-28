<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Login', 'user');		
	}

	public function index()
	{		
		$data['page'] = 'Home';
		$data['section'] = 'Admin Login';
		$data['content_view'] = 'Home/login';
		$this->template->login_template($data);
	}




	public function login()
	{
	
	  $this->form_validation->set_rules('username', 'Username', 'trim|required');
	  $this->form_validation->set_rules('password', 'Password', 'trim|required');
	  if($this->form_validation->run() == FALSE){  
		$response=array('msg'=> validation_errors()); 
		echo json_encode($response); 
		die();
		}else{
		 $username = $this->input->post('username');
		 $password = $this->input->post('password');
		 $getuser = $this->user->login($username);  			
		 if($getuser && $this->bcrypt->check_password($password, $getuser->password)) {
		  // && $getuser->status == '1'
				 $data = array(
				 'userID'  => $getuser->id,
				 'username'    => $getuser->username,			         
				 'created'    => $getuser->created_on,            
				 'status' =>  $getuser->status,
				 'role' => $getuser->role,
				 'logged_in' => true
			  );
			  //Set Session Data
		   
			  $this->session->set_userdata($data);
			  $response=array('msg'=> 'YES'); 
			  echo json_encode($response); 
			  die();
		 }
		 else{
			$response=array('msg'=> 'NO'); 
		echo json_encode($response); 
		die();
		 }
	
	
		}
	}

	public function logout()
    {
   
      $this->session->unset_userdata('logged_in');
      $this->session->unset_userdata('userID');
      $this->session->unset_userdata('username'); 
      $this->session->unset_userdata('created');
	  $this->session->unset_userdata('role');
      $this->session->unset_userdata('status');
      $this->session->sess_destroy();

	  $response=array('msg'=> 'YES'); 
	  echo json_encode($response); 
	  die();

    }

}
