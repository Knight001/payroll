<?php

class User extends CI_Model{

function __construct(){
    parent::__construct();
    $this->table = 'admin';
    $this->table1 = 'roles';  
}

public function get()
{
 $query = $this->db->get($this->table);
 return $query->result();
}
public function getRoles()
{
 $query = $this->db->get($this->table1);
 return $query->result();
}
public function add($data)
{
 $this->db->insert($this->table, $data);
 return $this->db->insert_id();
}

public function addrole($data)
{
 $this->db->insert($this->table1, $data);
 return $this->db->insert_id();
}
}