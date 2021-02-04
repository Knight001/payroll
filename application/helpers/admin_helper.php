<?php if
(! defined('BASEPATH')) exit('No direct script access allowed');

function getEarnings($id)
{

   $CI =& get_instance();
   $CI->load->database();
   $CI->db->select('id,position, description, TRUNCATE(amount,2) as amount, dateadded');
   $CI->db->where("FIND_IN_SET(".(int)$id.", position)");
//   $CI->db->where_in('position', (int)$id);
   $query = $CI->db->get('earnings');
    return $query->result();

}


function getFilters()
{

   $CI =& get_instance();
   $CI->load->database();
   $CI->db->select('year');
   $CI->db->group_by('year');
   $query = $CI->db->get('payroll');
    return $query->result();

}

function countEmployees()
{

   $CI =& get_instance();
   $CI->load->database();
   $query = $CI->db->get('employees');
  return $query->num_rows();

}
function getEarning($id,$month, $year)
{

   $CI =& get_instance();
   $CI->load->database();
   $CI->db->select('TRUNCATE(SUM(amount), 2) as earned');
   $CI->db->where("FIND_IN_SET(".(int)$id.", position)");
    //$CI->db->where_in('position', (int)$id);
   $CI->db->where('month', (int)$month);
    $CI->db->where('year', $year);
   $query = $CI->db->get('earning_settings');
    return $query->row()->earned;

}

function getAdvance($id,$month, $year)
{
   $CI =& get_instance();
   $CI->load->database();
   $CI->db->select('description, TRUNCATE(amount, 2) as amount');
   $CI->db->where('MONTH(payment_date)', $month);
  $CI->db->where('YEAR(payment_date)', $year);
   $CI->db->where_in('employee_id', (int)$id);
   $query = $CI->db->get('advance_payments');
    return $query->result();
}
function getPayrollAdvance($id,$month, $year)
{
   $CI =& get_instance();
   $CI->load->database();
   $CI->db->select('SUM(TRUNCATE(amount, 2)) as amount');
   $CI->db->where('MONTH(payment_date)', $month);
    $CI->db->where('YEAR(payment_date)', $year);
   $CI->db->where_in('employee_id', (int)$id);
   $query = $CI->db->get('advance_payments');
    return $query->row()->amount;
}


function getIndividualEarning($id)
{

   $CI =& get_instance();
   $CI->load->database();
    $CI->db->select('id_earn, employee, description, TRUNCATE(amount, 2) as amount, is_taxable, month, year, dateadded');
   $CI->db->where('employee', (int)$id);
   $query = $CI->db->get('individual_earning_settings');
    return $query->result();

}

function getCulculateOverTime($id,$month, $year)
{

   $CI =& get_instance();
   $CI->load->database();

    $query = $CI->db->query("SELECT TRUNCATE(SUM(`rate`*`hours`), 2) as overtime
    FROM `overtime`WHERE
    payment_month=".(int)$month." AND payment_year=".$year." AND employee_id=".(int)$id);
     if($query->num_rows() == 1):
    return $query->row()->overtime;
  else:
    return false;
  endif;

}
function getPaye($salary)
{

   $CI =& get_instance();
   $CI->load->database();
   $query = $CI->db->query('SELECT (truncate(rate, 2)/100) as rate, truncate(subtract, 2) as subtract FROM `payee_tax_bands` WHERE '.$salary.' BETWEEN start AND end');
    return $query->row();

}


function getallsellectedpositions($ids)
{
  $CI =& get_instance();
  $CI->load->database();
  $CI->db->select('description');
  $CI->db->where_in('id', $ids);
  $query = $CI->db->get('position');
  if($query->num_rows() > 0) {
  $positions=  $query->result();
  $selected = array();
  foreach($positions as $position){
    $selected[] = $position->description;
  }
  $selected = implode(' , ', $selected);
  return $selected;

  }else{
    return false;
  }
}



function getThisDeduction($id,$employee)
{
  $CI =& get_instance();
  $CI->load->database();
  $CI->db->select('*');
  $CI->db->where('did', $id);
  $CI->db->where('employee', $employee);
  $CI->db->where('month', (int)date('m'));
  $CI->db->where('year', date('Y'));
    $CI->db->limit(1);
  $query = $CI->db->get('settings');
  if($query->num_rows() > 0){
  return $query->row();
  }else {
    return false;
  }
}


function getLastDeduction($id,$employee)
{
  $month = date('m', strtotime('-1 month', time()));
  $CI =& get_instance();
  $CI->load->database();
  $CI->db->select('*');
  $CI->db->where('did', $id);
  $CI->db->where('employee', $employee);
  $CI->db->where('month', (int)$month);
  $CI->db->where('year', date('Y'));
  $CI->db->limit(1);
  $query = $CI->db->get('settings');
  if($query->num_rows() > 0){
  return $query->row();
  }else {
    return false;
  }
}
