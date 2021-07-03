<?php
/**
 *
 */
class Pengajuan_model extends CI_Model
{

  function __construct()
  {
    $this->load->database();
  }

  public function cekPengajuanMahasiswa($id_judul){
    $this->db->select('*');
    $this->db->from('pengajuan');
    $this->db->where('id_judul = ',$id_judul);
    $query = $this->db->get();
    return $query;
  }

  public function cekKuotaDosen($data){
    $this->db->select('*');
    $this->db->from('pengajuan');
    $this->db->where('NIP = ',$data);
    $this->db->where('status','diterima');
    $query = $this->db->get();
    return $query;
  }

  public function insertPengajuan($id_judul,$newnip){
    $this->db->set('id_judul',$id_judul);
    $this->db->set('NIP',$newnip);
    $this->db->set('status','menunggu');
    $this->db->insert('pengajuan');
  }

  public function cekStatusPengajauan($id_judul){
    $this->db->select('*');
    $this->db->from('pengajuan');
    $this->db->where('id_judul = ',$id_judul);
    $this->db->where('status','menunggu');
    $this->db->or_where('status','diterima');
    $query = $this->db->get();
    return $query;
  }

  public function detailPengajuan($id_pengajuan){
    $this->db->select('*');
    $this->db->from('pengajuan');
    $this->db->where('id_pengajuan = ',$id_pengajuan);
    $query = $this->db->get();
    return $query;
  }

  public function cekTolakDosen($nip,$id_judul){
    $this->db->select('*');
    $this->db->from('pengajuan');
    $this->db->where('NIP = ',$nip);
    $this->db->where('id_judul = ',$id_judul);
    $this->db->where('status','ditolak');
    $query = $this->db->get();
    return $query;
  }

  public function editNIP($nip,$nownip){
    $this->db->where('NIP = ',$nownip);
    $this->db->set('NIP',$nip);
    $this->db->update('pengajuan');
  }

  public function cekPengajuanDosen($data){
    $this->db->select('*');
    $this->db->from('pengajuan');
    $this->db->where('NIP = ',$data);
    $query = $this->db->get();
    return $query;
  }

  public function editStatus($id_pengajuan,$status){
    $this->db->where('id_pengajuan = ',$id_pengajuan);
    $this->db->set('status',$status);
    $this->db->update('pengajuan');
  }

  public function tolakSisa($nip){
    $this->db->where('NIP = ',$nip);
    $this->db->where('status','menunggu');
    $this->db->set('status','ditolak');
    $this->db->update('pengajuan');
  }

  public function statusAPI($status){
    $this->db->select('*');
    $this->db->from('pengajuan');
    $this->db->where('status',$status);
    $query = $this->db->get();
    return $query;
  }

}
