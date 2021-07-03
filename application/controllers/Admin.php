<?php
class Admin extends CI_Controller {
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
					$this->load->model('Dosen_model');
					$this->load->model('Judul_model');
					$this->load->model('Pengajuan_model');
			}
	public function home(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url('login'));
		}else {
			if ($this->session->userdata('tipe') == "mahasiswa") {
					redirect(base_url('home'));
			}
		}
		$this->load->view('pages/static/header_admin');
		$this->load->view('pages/forms/admin/home_admin');
		$this->load->view('pages/static/footer');
	}

	public function daftar_dosen(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url('login'));
		}else {
			if ($this->session->userdata('tipe') == "mahasiswa") {
					redirect(base_url('home'));
			}
		}

		$data['dosen'] = $this->Dosen_model->getAllDosen()->result();

		$this->load->view('pages/static/header_admin');
		$this->load->view('pages/forms/admin/daftar_dosen',$data);
		$this->load->view('pages/static/footer');
	}

	public function tambah_dosen(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url('login'));
		}else {
			if ($this->session->userdata('tipe') == "mahasiswa") {
					redirect(base_url('home'));
			}
		}
		$this->load->view('pages/static/header_admin');
		$this->load->view('pages/forms/admin/tambah_dosen');
		$this->load->view('pages/static/footer');
	}

	public function proses_tambah_dosen(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url('login'));
		}else {
			if ($this->session->userdata('tipe') == "mahasiswa") {
					redirect(base_url('home'));
			}
		}
		$nip = $this->input->post('nip');
    $nama = $this->input->post('nama');
		$golongan = $this->input->post('golongan');
		$status = $this->input->post('status');
		$kelamin = $this->input->post('kelamin');
    $no_telpon = $this->input->post('no_telpon');
		$pendidikan = $this->input->post('pendidikan');
		$keahlian = $this->input->post('keahlian');
    $pengalaman = $this->input->post('pengalaman');
		$penelitian = $this->input->post('penelitian');
		$riwayat_bimbingan = $this->input->post('riwayat_bimbingan');
    $kuota = $this->input->post('kuota');

		$data = array(
      'nip' => $nip,
			'nama' => $nama,
			'golongan' => $golongan,
			'status' => $status,
			'kelamin' => $kelamin,
			'no_telpon' => $no_telpon,
			'pendidikan' => $pendidikan,
			'keahlian' => $keahlian,
			'pengalaman' => $pengalaman,
			'penelitian' => $penelitian,
			'riwayat_bimbingan' => $riwayat_bimbingan,
			'kuota' => $kuota
    );

		$cekNip = $this->Dosen_model->cekNip($nip)->num_rows();
		if ($cekNip == 0) {
		  $this->Dosen_model->insertDosen($data);
      redirect(base_url('daftar_dosen'));
		}
		else {
			$data['cekNip'] = "ada";
			$this->load->view('pages/static/header_admin');
			$this->load->view('pages/forms/admin/tambah_dosen',$data);
			$this->load->view('pages/static/footer');
		}
	}

	public function edit_dosen(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url('login'));
		}else {
			if ($this->session->userdata('tipe') == "mahasiswa") {
					redirect(base_url('home'));
			}
		}
		$nip = $this->uri->segment(2);
		$newnip = str_replace('%20', ' ', $nip);

		$data['dosen'] = $this->Dosen_model->getDosen($newnip)->result();

		$this->load->view('pages/static/header_admin');
		$this->load->view('pages/forms/admin/edit_dosen',$data);
		$this->load->view('pages/static/footer');
	}

	public function proses_edit_dosen(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url('login'));
		}else {
			if ($this->session->userdata('tipe') == "mahasiswa") {
					redirect(base_url('home'));
			}
		}
		$nownip = $this->input->post('nownip');
		$nip = $this->input->post('nip');
    $nama = $this->input->post('nama');
		$golongan = $this->input->post('golongan');
		$status = $this->input->post('status');
		$kelamin = $this->input->post('kelamin');
    $no_telpon = $this->input->post('no_telpon');
		$pendidikan = $this->input->post('pendidikan');
		$keahlian = $this->input->post('keahlian');
    $pengalaman = $this->input->post('pengalaman');
		$penelitian = $this->input->post('penelitian');
		$riwayat_bimbingan = $this->input->post('riwayat_bimbingan');
    $kuota = $this->input->post('kuota');

		$data = array(
      'nip' => $nip,
			'nama' => $nama,
			'golongan' => $golongan,
			'status' => $status,
			'kelamin' => $kelamin,
			'no_telpon' => $no_telpon,
			'pendidikan' => $pendidikan,
			'keahlian' => $keahlian,
			'pengalaman' => $pengalaman,
			'penelitian' => $penelitian,
			'riwayat_bimbingan' => $riwayat_bimbingan,
			'kuota' => $kuota
    );

		$this->Dosen_model->updateDosen($data,$nownip);
		$this->Pengajuan_model->editNIP($nip,$nownip);
		redirect(base_url('edit_dosen/'.$nip));
	}

	public function daftar_pengajuan(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url('login'));
		}else {
			if ($this->session->userdata('tipe') == "mahasiswa") {
					redirect(base_url('home'));
			}
		}

		$data['dosen'] = $this->Dosen_model->getAllDosen()->result();

		$this->load->view('pages/static/header_admin');
		$this->load->view('pages/forms/admin/daftar_pengajuan',$data);
		$this->load->view('pages/static/footer');
	}

	public function pengaju(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url('login'));
		}else {
			if ($this->session->userdata('tipe') == "mahasiswa") {
					redirect(base_url('home'));
			}
		}

		$oldnip = $this->uri->segment(2);
		$nip = str_replace('%20', ' ', $oldnip);

		$data['pengajuan'] = $this->Pengajuan_model->cekPengajuanDosen($nip)->result();

		$this->load->view('pages/static/header_admin');
		$this->load->view('pages/forms/admin/pengaju',$data);
		$this->load->view('pages/static/footer');
	}

	public function proses_konfirmasi_aju(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url('login'));
		}else {
			if ($this->session->userdata('tipe') == "mahasiswa") {
					redirect(base_url('home'));
			}
		}
		$data = $this->uri->segment(2);
		$hasil = explode('_',$data);
		$status = $hasil[0];
		$id_pengajuan = $hasil[1];
		$nip = str_replace('%20', ' ', $hasil[2]);

		$this->Pengajuan_model->editStatus($id_pengajuan,$status);

		$cek = $this->Pengajuan_model->cekKuotaDosen($nip)->num_rows();
		$dosen = $this->Dosen_model->getDosen($nip)->result();
		foreach ($dosen as $key) {
			$kuota = $key->kuota;
		}
		$sisa_kuota = $kuota - $cek;
		if ($sisa_kuota <= 0) {
			$this->Pengajuan_model->tolakSisa($nip);
		}

		redirect(base_url('pengaju/'.$nip));

	}

	public function api_jumlah_ta(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url('login'));
		}else {
			if ($this->session->userdata('tipe') == "mahasiswa") {
					redirect(base_url('home'));
			}
		}

		$data['menunggu'] = $this->Pengajuan_model->statusAPI('menunggu')->num_rows();
		$data['diterima'] = $this->Pengajuan_model->statusAPI('diterima')->num_rows();
		$data['ditolak'] = $this->Pengajuan_model->statusAPI('ditolak')->num_rows();

		echo json_encode($data);
	}

}
