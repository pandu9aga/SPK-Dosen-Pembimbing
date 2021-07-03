<?php
/**
 *
 */
class Mahasiswa_model extends CI_Model
{

  function __construct()
  {
    $this->load->database();
  }

  public function cekNim($nim){
    $this->db->select('*');
    $this->db->from('mahasiswa');
    $this->db->where('NIM = ',$nim);
    $query = $this->db->get();
    return $query;
  }

  public function getMahasiswa($nim){
    $this->db->select('*');
    $this->db->from('mahasiswa');
    $this->db->where('NIM = ',$nim);
    $query = $this->db->get();
    return $query;
  }

  public function registerMahasiswa($data,$table){
    $this->db->set('nama',$data['nama']);
    $this->db->set('NIM',$data['NIM']);
    $this->db->set('alamat',$data['alamat']);
    $this->db->set('no_hp',$data['no_hp']);
    $this->db->set('prodi',$data['prodi']);
    $this->db->set('semester',$data['semester']);
    $this->db->set('golongan',$data['golongan']);
    $this->db->set('password',$data['password']);
    $this->db->insert($table);
  }

  public function cek_login($data){
    $this->db->select('*');
    $this->db->from('mahasiswa');
    $this->db->where('NIM = ',$data['nim']);
    $this->db->where('password = ',$data['password']);
    $query = $this->db->get();
    return $query;
  }

  public function editMahasiswa($data,$nimnow){
    $this->db->where('NIM = ',$nimnow);
    $this->db->update('mahasiswa',$data);
  }

}
