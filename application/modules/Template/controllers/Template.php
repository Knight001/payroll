<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MY_Controller {

  function __construct()
  {
    parent::__construct();
     $this->load->model('Activity_m', 'activity');
     $this->load->library("pagination");


  }

	function login_template($data=NULL)
   {
     $this->load->view('Template/login_v',$data);
   }

	 function admin_template($data=NULL)
    {
      if(!$this->session->userdata('logged_in')){
            
        $this->session->flashdata('error', 'Please login!');            
        redirect('/','refresh');            
        
    }
        $this->load->view('Template/admin_v',$data);
     
      }
  
       
      
     

    function profile_template($data=NULL)
    {
      $this->session->set_userdata ( 'redirect', current_url () . '?'. $this->input->server ( 'QUERY_STRING' ) );
              //Check Login
      if(!$this->session->userdata('logged_in') || $this->session->userdata('account') != 'customer')
      {
      $this->session->set_flashdata('error', 'You are not logged in. Please Log in!');
      redirect('logout');
      }

      $this->load->view('Template/profile_v',$data);
    }
}
