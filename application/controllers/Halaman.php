<?php


class Halaman extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->helper('url_helper');
		$this->load->helper('text');
		$this->load->helper('date');
		$this->load->library('pagination');
		$this->load->model('Mahasiswa_model');
		$this->load->model('Admin_model');
	}

	public function login(){
		if($this->session->userdata('status') == "login"){
			if ($this->session->userdata('tipe') == "mahasiswa") {
					redirect(base_url('home'));
			}else if ($this->session->userdata('tipe') == "admin") {
					redirect(base_url('home_admin'));
			}
		}
		$this->load->view('pages/static/login');
	}

	public function proses_login(){
		if($this->session->userdata('status') == "login"){
			if ($this->session->userdata('tipe') == "mahasiswa") {
					redirect(base_url('home'));
			}else if ($this->session->userdata('tipe') == "admin") {
					redirect(base_url('home_admin'));
			}
		}
		$nim = $this->input->post('nim');
    $password = $this->input->post('password');
		$tipe = $this->input->post('tipe');

		$data = array(
      'nim' => $nim,
			'password' => $password
    );

		if ($tipe == 'mahasiswa') {
			$cek = $this->Mahasiswa_model->cek_login($data)->num_rows();
			if($cek > 0){
				$data_session = array(
					'nim' => $nim,
					'tipe' => "mahasiswa",
					'status' => "login"
				);
				$this->session->set_userdata($data_session);
				redirect(base_url('home'));
			}
			else{
				$data['login'] = "salah";
				$this->load->view('pages/static/login',$data);
			}
		}else {
			$cek = $this->Admin_model->cek_login($data)->num_rows();
			if($cek > 0){
				$data_session = array(
					'nip' => $nim,
					'tipe' => "admin",
					'status' => "login"
				);
				$this->session->set_userdata($data_session);
				redirect(base_url('home_admin'));
			}
			else{
				$data['login'] = "salah";
				$this->load->view('pages/static/login',$data);
			}
		}
	}

	public function proses_logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

	public function registrasi()
	{
		$this->load->view('pages/static/registrasi');
	}
}
