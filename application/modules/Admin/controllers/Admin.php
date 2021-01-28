<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('User','user');
	}

	public function index()
	{		
		$data['page'] = 'Admin';
		$data['section'] = 'Dashboard';
		$data['content_view'] = 'Admin/dashboard';
		$this->template->admin_template($data);
	}


	public function admins()
	{	
		$data['roles'] = $this->user->getRoles();
		$data['users'] = $this->user->get();
		$data['page'] = 'Admin';
		$data['section'] = 'Users';
		$data['content_view'] = 'Admin/admins';
		$this->template->admin_template($data);
	}
	public function adduser() {
		$this->form_validation->set_rules('fname', 'Firstname', 'trim|required');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[admin.username]');
        $this->form_validation->set_rules('role', 'User Role', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');
        if ($this->form_validation->run() == FALSE) {
            $response = array('msg' => validation_errors());
            echo json_encode($response);
            die();
        } else {           
                $password = $this->input->post('password');
                $user_password = $this->bcrypt->hash_password($password);
                $data = array(
                    'firstname' => $this->input->post('fname'),
                    'lastname' => $this->input->post('lname'),
					'username' => $this->input->post('username'),
                    'role' => $this->input->post('role'),
                    'password' => $user_password,
                    'status' => '1',
                    'created_on' => date('Y-m-d H:i:s'),
                   
                );
                $create = $this->user->add($data);
                if ($create) {
                    $response = array('msg' => "YES");
                    echo json_encode($response);
                    die();
                } else {
                    $response = array('msg' => "NO");
                    echo json_encode($response);
                    die();
                }
            }
        
    }

	public function roles()
	{	
		$data['roles'] = $this->user->getRoles();	
		$data['page'] = 'Admin';
		$data['section'] = 'Roles';
		$data['content_view'] = 'Admin/roles';
		$this->template->admin_template($data);
	}

	public function addrole()
	{
		$this->form_validation->set_rules('role', 'Role Name', 'trim|required|is_unique[roles.role]');
		if($this->form_validation->run() == FALSE){
		$response=array('msg'=> validation_errors()); 
		echo json_encode($response); 
		die();
		}else {
			$data = array(
				'role' => $this->input->post('role')
			);
			$add = $this->user->addrole($data);
			if($add){
			$response=array('msg'=> 'YES'); 
			echo json_encode($response); 
			die();
			}else{
			$response=array('msg'=> 'NO'); 
			echo json_encode($response); 
			die();
			}
		}
	}

}
