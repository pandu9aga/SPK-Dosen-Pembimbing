<?php
/**
 *
 */
class Dosen_model extends CI_Model
{

  function __construct()
  {
    $this->load->database();
  }

  public function getAllDosen(){
    $this->db->select('*');
    $this->db->from('dosen');
    $query = $this->db->get();
    return $query;
  }

  public function getDosen($nip){
    $this->db->select('*');
    $this->db->from('dosen');
    $this->db->where('NIP = ',$nip);
    $query = $this->db->get();
    return $query;
  }

  public function cekNip($nip){
    $this->db->select('*');
    $this->db->from('dosen');
    $this->db->where('NIP = ',$nip);
    $query = $this->db->get();
    return $query;
  }

  public function insertDosen($data){
    $this->db->set('nama',$data['nama']);
    $this->db->set('NIP',$data['nip']);
    $this->db->set('status',$data['status']);
    $this->db->set('golongan',$data['golongan']);
    $this->db->set('no_telpon',$data['no_telpon']);
    $this->db->set('kelamin',$data['kelamin']);
    $this->db->set('pendidikan',$data['pendidikan']);
    $this->db->set('penelitian',$data['penelitian']);
    $this->db->set('keahlian',$data['keahlian']);
    $this->db->set('pengalaman',$data['pengalaman']);
    $this->db->set('riwayat_bimbingan',$data['riwayat_bimbingan']);
    $this->db->set('kuota',$data['kuota']);
    $this->db->insert('dosen');
  }

  public function updateDosen($data,$nownip){
    $this->db->where('NIP = ',$nownip);
    $this->db->update('dosen',$data);
  }

  public function selectDosen($token,$kategori){
    $this->db->select('*');
    $this->db->from('dosen');
    //$this->db->where('keahlian = ',$kategori);

    foreach ($token as $key => $value) {
      /*if ($key==0) {
        $this->db->like('penelitian',$value);
      }else {
        $this->db->or_like('penelitian',$value);
      }*/
      $this->db->or_like('penelitian',$value);
    }
    foreach ($token as $key => $value) {
      $this->db->or_like('riwayat_bimbingan',$value);
    }

    $query = $this->db->get();
    return $query;
  }

}
