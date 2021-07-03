<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] ='Mahasiswa/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['login']='Halaman/login';
$route['proses_login']='Halaman/proses_login';
$route['logout']='Halaman/proses_logout';
$route['registrasi']='Halaman/registrasi';
$route['proses_registrasi']='Mahasiswa/proses_registrasi';

//Mahasiswa
$route['home']='Mahasiswa/home';
$route['tambah_judul']='Mahasiswa/tambah_judul';
$route['proses_tambah_judul']='Mahasiswa/proses_tambah_judul';
$route['profil']='Mahasiswa/profil';
$route['proses_edit_profil']='Mahasiswa/proses_edit_profil';
$route['dosen']='Mahasiswa/dosen';
$route['pemilihan_dosen_pembimbing']='Mahasiswa/pemilihan_dosen_pembimbing';
$route['proses_pengajuan']='Mahasiswa/proses_pengajuan';
$route['proses_pengajuan/(:any)']='Mahasiswa/proses_pengajuan/$1';
$route['pengajuan']='Mahasiswa/pengajuan';
$route['detail_pengajuan']='Mahasiswa/detail_pengajuan';
$route['detail_pengajuan/(:any)']='Mahasiswa/detail_pengajuan/$1';


//Admin
$route['home_admin']='Admin/home';
$route['daftar_dosen']='Admin/daftar_dosen';
$route['tambah_dosen']='Admin/tambah_dosen';
$route['proses_tambah_dosen']='Admin/proses_tambah_dosen';
$route['edit_dosen']='Admin/edit_dosen';
$route['edit_dosen/(:any)']='Admin/edit_dosen/$1';
$route['proses_edit_dosen']='Admin/proses_edit_dosen';
$route['proses_edit_dosen/(:any)']='Admin/proses_edit_dosen/$1';
$route['daftar_pengajuan']='Admin/daftar_pengajuan';
$route['pengaju']='Admin/pengaju';
$route['pengaju/(:any)']='Admin/pengaju/$1';
$route['proses_konfirmasi_aju']='Admin/proses_konfirmasi_aju';
$route['proses_konfirmasi_aju/(:any)']='Admin/proses_konfirmasi_aju/$1';
$route['api_jumlah_ta']='Admin/api_jumlah_ta';

/*
$route['home']='Halaman/view';
//$route['homes']='Halaman/homes';
//$route['landing'] = 'Konsultasi_control/landing';
$route['konsultasi'] = 'Konsultasi_control/pertanyaan';
$route['cetak/(:any)'] = 'Konsultasi_control/cetak/$1';
$route['hasil_diagnosis/(:any)'] = 'Konsultasi_control/hasil_diagnosis/$1';
//$route['pertanyaan/(:any)'] = 'Konsultasi_control/pertanyaan/$1';
//$route['konsultasi/(:any)'] = 'Konsultasi_control/konsultasi/$1';
$route['tips'] = 'Konsultasi_control/tips';
$route['petunjuk'] = 'Konsultasi_control/petunjuk';
$route['tentang'] = 'Konsultasi_control/tentang';
$route['default_controller'] ='Halaman/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['cek/(:any)']='Konsultasi_control/cek_diag/$1';
*/
