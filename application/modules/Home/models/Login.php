<?php

class Login extends CI_MODEL
{

  function __construct()
  {
      parent::__construct();
      $this->table = 'admin';
    }



    public function login($username){
    $this->db->select('a.*, b.role');
    $this->db->from('admin a');
    $this->db->join('roles b', 'a.role = b.id', 'left');
     // $this->db->join('departments d', 'a.department = d.departmentID', 'left');
     $this->db->where('a.username', $username);
    $this->db->limit(1);

    $query = $this->db->get();

    if($query->num_rows() == 1){

    return $query->row();

  }
  else
   {
    log_message('debug', 'query fail in... ', false);
  }
    }



             }
