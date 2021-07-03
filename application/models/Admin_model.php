<?php
/**
 *
 */
class Admin_model extends CI_Model
{

  function __construct()
  {
    $this->load->database();
  }

  public function cek_login($data){
    $this->db->select('*');
    $this->db->from('admin');
    $this->db->where('NIP = ',$data['nim']);
    $this->db->where('password = ',$data['password']);
    $query = $this->db->get();
    return $query;
  }

}
