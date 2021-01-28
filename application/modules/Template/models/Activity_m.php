<?php
/**
 *
 */
class Activity_m extends CI_MODEL
{

  function __construct()
  {
      parent::__construct();
      $this->table = 'urls';     
    }
    
    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function geturls()
    {
      $this->db->where('menu', '1');
      $this->db->where('status', '1');
      $this->db->order_by('ordered');
    $query = $this->db->get($this->table);
    return $query->result();
    }
    public function getchildren($id)
    {
      $this->db->where('position', 'child');
      $this->db->where('parent', $id);
      $this->db->where('status', '1');
    $query = $this->db->get($this->table);
    return $query->result();
    }
    
    public function page($page)
    {
      $this->db->where('link', $page);      
      $query = $this->db->get($this->table);
      return $query->row();
    }

    public function getpagination($controller, $method)
    {
      
      $this->db->where('controller', $controller);  
      $this->db->where('method', $method);    
      $query = $this->db->get($this->table);
      return $query->row();
    }
	
	
 	
    public function getOverStay()
    {    
   $this->db->select('a.item, b.description');
      $this->db->from('sale a');
      $this->db->join('allitems b', 'a.item=b.item_id','left');
      $this->db->where('HOUR(TIMEDIFF(NOW(), a.paymentDate))>', 72);
      $this->db->where('a.payment_status', 'paid');
      $this->db->where('b.status', 'sold');
      $this->db->where('a.storage', '0');
      $query = $this->db->get();
     return $query->result();
    }

    public function ChargeStorage($id)
    {
      $this->db->where('item', $id);
      $this->db->set('storage', '1');
      $update = $this->db->update('sale');
      if($update){
        return true;
      }else{
        return false;
      }
    }
}