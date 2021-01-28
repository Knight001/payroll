<?php

class Payroll extends CI_Model{

function __construct(){
    parent::__construct();
    $this->table = 'settings';
}
public function get($month, $year)
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

   $this->db->select('a.employee_id, a.position, TRUNCATE(a.gross,2) as gross,TRUNCATE(a.deductions, 2) as deductions, TRUNCATE(a.net, 2) as net, a.month, a.year, a.created, CONCAT(b.firstname," ",b.middlename," ",b.lastname) as name, TRUNCATE(c.amount, 2) as advance');
   $this->db->from('payroll a');
   $this->db->join('employees b', 'a.employee_id=b.employee_id','left');
   $this->db->join('advance_payments c', 'b.employee_id=c.employee_id','left');
   $this->db->where('a.month', (int)$month1);
   $this->db->where('a.year', $year1);
   $this->db->group_by('a.employee_id');
   $query = $this->db->get();
   return $query->result();
}

public function getpayee()
{
  $this->db->select('id_payee_tax_band,TRUNCATE(rate, 2) as rate,TRUNCATE(start, 2) as start,TRUNCATE(end,2) as end,status,added, TRUNCATE(subtract, 2) as subtract');
 $query = $this->db->get('payee_tax_bands');
 return $query->result();
}

public function getDeductions($month, $year)
{

    $this->db->select('TRUNCATE(SUM(amount), 2) as amount');
     $this->db->where('month', (int)$month);
     $this->db->where('year', $year);
     $this->db->where('status', '1');
   $query = $this->db->get('settings');
   return $query->row()->amount;
}
public function create($data)
{
  $this->db->insert('payroll', $data);
  return $this->db->insert_id();
}
public function addpayee($data)
{
  $this->db->insert('payee_tax_bands', $data);
  return $this->db->insert_id();
}


public function getEmployee($id)
{
  $this->db->select('a.employee_id,a.firstname,a.lastname,a.middlename,a.email,a.address,a.birthdate,a.national_id,a.contact_info,a.gender,a.position_id,a.schedule_id,TRUNCATE(a.salary,2) as salary,a.photo,a.created_on, a.pay_day,a.account,b.description as position,b.rate, b.grade');
  $this->db->from('employees a');
  $this->db->join('position b', 'a.position_id=b.id', 'left');
  $this->db->where('a.employee_id', $id);
  $query = $this->db->get();
  return $query->row();
}

public function getearnings()
{
$this->db->select('id,position, description, TRUNCATE(amount,2) as amount, dateadded');
 $query =$this->db->get('earnings');
 return $query->result();
}

public function check($employee)
{
 $this->db->where('employee_id', $employee);
 $this->db->where('month', date('m'));
 $this->db->where('year', date('Y'));
$query = $this->db->get('payroll');
return $query->row();
}

public function updatepayroll($id, $data)
{
  $this->db->where('pid', $id);
  $query = $this->db->update('payroll', $data);
  if($query){
    return true;
  }else {
    return false;
  }
}

public function checkpayee($start)
{
 $this->db->where('start', $start);
 $this->db->where('month', date('m'));
 $this->db->where('year', date('Y'));
$query = $this->db->get('payee_settings');
return $query->row();
}
public function createpayeesettings($data)
{
  $this->db->insert('payee_settings', $data);
  return $this->db->insert_id();
}

public function updatepayeesettings($id, $data)
{
  $this->db->where('id', $id);
  $query = $this->db->update('payee_settings', $data);
  if($query){
    return true;
  }else {
    return false;
  }
}

public function checkearnings($id)
{
 $this->db->where('earning_id', $id);
 $this->db->where('month', date('m'));
 $this->db->where('year', date('Y'));
$query = $this->db->get('earning_settings');
return $query->row();
}

public function checkindvearnings($id)
{
 $this->db->where('id_earn', $id);
 $this->db->where('month', date('m'));
 $this->db->where('year', date('Y'));
$query = $this->db->get('individual_earning_settings');
return $query->row();
}
public function createarning($data)
{
  $this->db->insert('earnings', $data);
  return $this->db->insert_id();
}

public function createearningsettings($data)
{
  $this->db->insert('earning_settings', $data);
  return $this->db->insert_id();
}
public function createindividualsettings($data)
{
  $this->db->insert('individual_earning_settings', $data);
  return $this->db->insert_id();
}


public function updateearning($id, $data)
{
  $this->db->where('id', $id);
  $query = $this->db->update('earnings', $data);
  if($query){
    return true;
  }else {
    return false;
  }
}

public function getindvidualearnings()
{
$this->db->select('id_earn,employee, description, TRUNCATE(amount,2) as amount, is_taxable, date');
 $query =$this->db->get('individual_earnings');
 return $query->result();
}

public function updateearningsettings($id, $data)
{
  $this->db->where('earning_id', $id);
  $query = $this->db->update('earning_settings', $data);
  if($query){
    return true;
  }else {
    return false;
  }
}
public function updateindvidualsettings($id, $data)
{
  $this->db->where('id_earn', $id);
  $query = $this->db->update('individual_earning_settings', $data);
  if($query){
    return true;
  }else {
    return false;
  }
}


}
