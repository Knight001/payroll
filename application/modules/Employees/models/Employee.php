<?php

class Employee extends CI_Model{

function __construct(){
    parent::__construct();
    $this->table = 'employees';
}
public function get()
{
  $this->db->select('a.employee_id, a.firstname,a.middlename,a.lastname,a.email,a.address,a.birthdate, a.national_id, a.contact_info, a.gender,
  a.position_id, a.schedule_id, TRUNCATE(a.salary, 2) as salary, a.photo, a.created_on, a.pay_day, a.account, a.engagement_date,b.description as position,b.grade, b.rate, CONCAT(c.time_in,"-",c.time_out) as schedule, d.*');
  $this->db->from($this->table.' a');
  $this->db->join('position b','a.position_id=b.id','left');
  $this->db->join('schedules c','a.schedule_id=c.id','left');
  $this->db->join('employee_data d', 'a.employee_id=d.employee_id', 'left');
  $query = $this->db->get();
  return $query->result();
}

public function getPositions()
{
 $query = $this->db->get('position');
 return $query->result();
}

public function getSchedules()
{
 $query = $this->db->get('schedules');
 return $query->result();
}

public function create($data)
{
  $this->db->insert($this->table, $data);
  return $this->db->insert_id();
}

public function update($id, $data)
{
  $this->db->where('employee_id', $id);
 $update = $this->db->update($this->table, $data);
 if($update){
   return true;
 }else {
   return false;
 }
}
public function addkin($data)
{
  $this->db->insert('employee_data', $data);
  return $this->db->insert_id();
}
public function updatekin($id, $data)
{
  $this->db->where('employee_id', $id);
 $update = $this->db->update('employee_data', $data);
 if($update){
   return true;
 }else {
   return false;
 }
}

public function getearnings($id)
{
$this->db->select('id_earn, employee, description, TRUNCATE(amount,2) as amount,is_taxable, date');
$this->db->where('employee', $id);
 $query =$this->db->get('individual_earnings');
 return $query->result();
}

public function createarning($data)
{
  $this->db->insert('individual_earnings', $data);
  return $this->db->insert_id();
}


public function updateearning($id, $data)
{
  $this->db->where('id_earn', $id);
  $query = $this->db->update('individual_earnings', $data);
  if($query){
    return true;
  }else {
    return false;
  }
}
public function getAdvance()
{
  $this->db->select('a.id, a.employee_id,a.description, TRUNCATE(a.amount, 2) as amount, a.date_advance, a.payment_date, a.created, CONCAT(b.firstname," ",b.middlename," ",b.lastname) as employee');
  $this->db->from('advance_payments a');
  $this->db->join('employees b', 'a.employee_id=b.employee_id', 'left');
$query = $this->db->get();
return $query->result();
}

public function getAttendance()
{
  $this->db->select('a.*, CONCAT(b.firstname," ",b.middlename," ",b.lastname) as employee');
  $this->db->from('attendance a');
  $this->db->join('employees b', 'a.employee_id=b.employee_id', 'left');
$query = $this->db->get();
return $query->result();
}
public function createadvance($data)
{
  $this->db->insert('advance_payments', $data);
  return $this->db->insert_id();
}


public function updateadvance($id, $data)
{
  $this->db->where('id', $id);
  $query = $this->db->update('advance_payments', $data);
  if($query){
    return true;
  }else {
    return false;
  }
}

public function createposition($data)
{
  $this->db->insert('position', $data);
  return $this->db->insert_id();
}


public function updateposition($id, $data)
{
  $this->db->where('id', $id);
  $query = $this->db->update('position', $data);
  if($query){
    return true;
  }else {
    return false;
  }
}

public function createschedule($data)
{
  $this->db->insert('schedules', $data);
  return $this->db->insert_id();
}


public function updateschedule($id, $data)
{
  $this->db->where('id', $id);
  $query = $this->db->update('schedules', $data);
  if($query){
    return true;
  }else {
    return false;
  }
}


public function getOvertime()
{
  $this->db->select('a.*, CONCAT(b.firstname," ",b.middlename," ",b.lastname) as employee');
  $this->db->from('overtime a');
  $this->db->join('employees b', 'a.employee_id=b.employee_id','left');
  $query = $this->db->get();
  return $query->result();
}

public function getUnpaidOvertime()
{
  $this->db->select('a.*, CONCAT(b.firstname," ",b.middlename," ",b.lastname) as employee');
  $this->db->from('overtime a');
  $this->db->join('employees b', 'a.employee_id=b.employee_id','left');
  $this->db->where('a.status', 'pending');
  $query = $this->db->get();
  return $query->result();
}


public function createovertime($data)
{
  $this->db->insert('overtime', $data);
  return $this->db->insert_id();
}


public function updateovertime($id, $data)
{
  $this->db->where('id', $id);
  $query = $this->db->update('overtime', $data);
  if($query){
    return true;
  }else {
    return false;
  }
}
public function createattendance($data)
{
  $this->db->insert('attendance', $data);
  return $this->db->insert_id();
}


public function checkday($date, $id)
{
 $this->db->where('date', $date);
 $this->db->where('employee_id', $id);
$query = $this->db->get('attendance');
return $query->row();
}
}
