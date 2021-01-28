<?php

class Deduction extends CI_Model{

function __construct(){
    parent::__construct();
    $this->table = 'deductions';
}

public function get()
{
 $query = $this->db->get($this->table);
 return $query->result();
}

public function add($data)
{
 $this->db->insert($this->table, $data);
 return $this->db->insert_id();
}
public function getsetting($id)
{
    // var_dump($id);
    $this->db->where('id', $id);
  $query = $this->db->get($this->table);
  return $query->row();
//   var_dump($query->row());die;
}

public function checksettings($id)
{
    // var_dump($id);
  $this->db->where('month', (int)date('m'));
  $this->db->where('year', date('Y'));
  $this->db->where('did', $id);
  $query = $this->db->get('settings');
  return $query->row();
//   var_dump($query->row());die;
}
public function createsettings($data)
{
  $this->db->insert('settings', $data);
  return $this->db->insert_id();
}
public function getPayrollSettings($month, $year)
{
  if($month != ""){
    $month1 = $month;
  }else {
    $month1 = date('m');
  }

  if($year != ""){
    $year1 = $year;
  }else {
    $year1 = date('Y');
  }


   $this->db->select('id,description,TRUNCATE(amount, 2) as amount,month,year,date');
    $this->db->where('month', (int)$month1);
    $this->db->where('year', $year1);
    $this->db->where('status', '1');
  $query = $this->db->get('settings');
  return $query->result();

}
public function update($id, $data)
{
  $this->db->where('id', $id);
  $query = $this->db->update($this->table, $data);
  if($query){
    return true;
  }else {
    return false;
  }
}

public function updatesettings($id, $data)
{
  $this->db->where('month', (int)date('m'));
  $this->db->where('year', date('Y'));
  $this->db->where('did', $id);
  $query = $this->db->update('settings', $data);
  if($query){
    return true;
  }else {
    return false;
  }
}
}
