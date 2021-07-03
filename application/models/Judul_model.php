<?php
/**
 *
 */
class Judul_model extends CI_Model
{

  function __construct()
  {
    $this->load->database();
  }

  public function cekJudulMahasiswa($nim){
    $this->db->select('*');
    $this->db->from('judul_ta');
    $this->db->where('NIM = ',$nim);
    $query = $this->db->get();
    return $query;
  }

  public function insertJudul($data){
    $this->db->set('nama_judul',$data['judul']);
    $this->db->set('NIM',$data['NIM']);
    $this->db->set('kategori',$data['kategori']);
    $this->db->insert('judul_ta');
  }

  public function editJudul($data,$nimnow){
    $this->db->where('NIM = ',$nimnow);
    $this->db->update('judul_ta',$data);
  }

  public function getJudulMahasiswa($id_judul){
    $this->db->select('*');
    $this->db->from('judul_ta');
    $this->db->where('id_judul = ',$id_judul);
    $query = $this->db->get();
    return $query;
  }

}
