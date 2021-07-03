<?php
class Mahasiswa extends CI_Controller {
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
			$this->load->model('Judul_model');
			$this->load->model('Dosen_model');
			$this->load->model('Pengajuan_model');
	}

	public function home(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url('login'));
		}else {
			if ($this->session->userdata('tipe') == "admin") {
					redirect(base_url('home_admin'));
			}
		}

		$nim = $this->session->userdata('nim');

		$data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswa($nim)->result();
		$data['jumlah_judul'] = $this->Judul_model->cekJudulMahasiswa($nim)->num_rows();
		$data['judul'] = $this->Judul_model->cekJudulMahasiswa($nim)->result();

		$this->load->view('pages/static/header');
		$this->load->view('pages/forms/home',$data);
		$this->load->view('pages/static/footer');
	}

  public function proses_registrasi(){
    $nama = $this->input->post('nama');
    $nim = $this->input->post('nim');
    $alamat = $this->input->post('alamat');
    $no_hp = $this->input->post('no_hp');
    $prodi = $this->input->post('prodi');
    $semester = $this->input->post('semester');
    $golongan = $this->input->post('golongan');
    $password = $this->input->post('password');

    $data = array(
      'nama' => $nama,
      'NIM' => $nim,
      'alamat' => $alamat,
      'no_hp' => $no_hp,
      'prodi' => $prodi,
      'semester' => $semester,
      'golongan' => $golongan,
			'password' => $password
    );

		$cekNim = $this->Mahasiswa_model->cekNim($nim)->num_rows();
		if ($cekNim == 0) {
		  $this->Mahasiswa_model->registerMahasiswa($data,'mahasiswa');
      redirect(base_url('login'));
		}
		else {
			$data['cekNim'] = "ada";
			$this->load->view('pages/static/registrasi',$data);
		}
	}

	public function tambah_judul(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url('login'));
		}else {
			if ($this->session->userdata('tipe') == "admin") {
					redirect(base_url('home_admin'));
			}
		}

		$nim = $this->session->userdata('nim');
		$data['nim'] = $nim;

		$data['jumlah_judul'] = $this->Judul_model->cekJudulMahasiswa($nim)->num_rows();
		if ($data['jumlah_judul']>0) {
			redirect(base_url('profil'));
		}

		$this->load->view('pages/static/header');
		$this->load->view('pages/forms/tambah_judul',$data);
		$this->load->view('pages/static/footer');
	}

	public function proses_tambah_judul(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url('login'));
		}else {
			if ($this->session->userdata('tipe') == "admin") {
					redirect(base_url('home_admin'));
			}
		}
		$judul = $this->input->post('judul');
    $nim = $this->input->post('nim');
    $kategori = $this->input->post('kategori');

		$data = array(
      'judul' => $judul,
      'NIM' => $nim,
      'kategori' => $kategori
    );

		$this->Judul_model->insertJudul($data);
		redirect(base_url('home'));

	}

	public function profil(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url('login'));
		}else {
			if ($this->session->userdata('tipe') == "admin") {
					redirect(base_url('home_admin'));
			}
		}

		$nim = $this->session->userdata('nim');

		$data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswa($nim)->result();
		$data['jumlah_judul'] = $this->Judul_model->cekJudulMahasiswa($nim)->num_rows();
		$data['judul'] = $this->Judul_model->cekJudulMahasiswa($nim)->result();

		$this->load->view('pages/static/header');
		$this->load->view('pages/forms/profil',$data);
		$this->load->view('pages/static/footer');
	}

	public function proses_edit_profil(){
    $nama = $this->input->post('nama');
    $nim = $this->input->post('nim');
    $alamat = $this->input->post('alamat');
    $no_hp = $this->input->post('no_hp');
    $prodi = $this->input->post('prodi');
    $semester = $this->input->post('semester');
    $golongan = $this->input->post('golongan');

		$nimnow = $this->input->post('nimnow');

		if ($this->input->post('nama_judul')) {
			$nama_judul = $this->input->post('nama_judul');
	    $kategori = $this->input->post('kategori');
			$data = array(
	      'nama' => $nama,
	      'NIM' => $nim,
	      'alamat' => $alamat,
	      'no_hp' => $no_hp,
	      'prodi' => $prodi,
	      'semester' => $semester,
	      'golongan' => $golongan
	    );
			$data_judul = array(
				'NIM' => $nim,
				'nama_judul' => $nama_judul,
				'kategori' => $kategori
			);

			$this->Mahasiswa_model->editMahasiswa($data,$nimnow);
			$this->Judul_model->editJudul($data_judul,$nimnow);

			$data_session = array(
				'nim' => $nim,
				'tipe' => "mahasiswa",
				'status' => "login"
			);
			$this->session->set_userdata($data_session);
      redirect(base_url('profil'));
		}else {
			$data = array(
	      'nama' => $nama,
	      'NIM' => $nim,
	      'alamat' => $alamat,
	      'no_hp' => $no_hp,
	      'prodi' => $prodi,
	      'semester' => $semester,
	      'golongan' => $golongan
	    );
			$this->Mahasiswa_model->editMahasiswa($data,$nimnow);
			$data_session = array(
				'nim' => $nim,
				'tipe' => "mahasiswa",
				'status' => "login"
			);
			$this->session->set_userdata($data_session);
      redirect(base_url('profil'));
		}
	}

	public function dosen(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url('login'));
		}else {
			if ($this->session->userdata('tipe') == "admin") {
					redirect(base_url('home_admin'));
			}
		}

		$data['dosen'] = $this->Dosen_model->getAllDosen()->result();

		$this->load->view('pages/static/header');
		$this->load->view('pages/forms/dosen',$data);
		$this->load->view('pages/static/footer');

	}

	public function pemilihan_dosen_pembimbing(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url('login'));
		}else {
			if ($this->session->userdata('tipe') == "admin") {
					redirect(base_url('home_admin'));
			}
		}
		$nim = $this->session->userdata('nim');

		$data['dosen'] = $this->Dosen_model->getAllDosen()->result();
		$data['jumlah_judul'] = $this->Judul_model->cekJudulMahasiswa($nim)->num_rows();
		$get_id_judul = $this->Judul_model->cekJudulMahasiswa($nim)->result();
		foreach ($get_id_judul as $key) {
			$id_judul = $key->id_judul;
		}
		$data['id_judul'] = $id_judul;

		/*
		foreach ($data['dosen'] as $value) {
			$data['pengajuan'] = $this->Pengajuan_model->cekKuotaDosen($value->NIP)->num_rows();
		}
		*/
		$this->load->view('pages/static/header');
		$this->load->view('pages/forms/pemilihan_dosen_token',$data);
		$this->load->view('pages/static/footer');
	}

	public function proses_pengajuan(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url('login'));
		}else {
			if ($this->session->userdata('tipe') == "admin") {
					redirect(base_url('home_admin'));
			}
		}
		$nim = $this->session->userdata('nim');
		$nip = $this->uri->segment(2);
		$newnip = str_replace('%20', ' ', $nip);

		$data = $this->Judul_model->cekJudulMahasiswa($nim)->result();
		foreach ($data as $key) {
			$id_judul = $key->id_judul;
		}

		$this->Pengajuan_model->insertPengajuan($id_judul,$newnip);
		redirect(base_url('pengajuan'));
	}

	public function pengajuan(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url('login'));
		}else {
			if ($this->session->userdata('tipe') == "admin") {
					redirect(base_url('home_admin'));
			}
		}
		$nim = $this->session->userdata('nim');
		$get_id_judul = $this->Judul_model->cekJudulMahasiswa($nim)->result();
		foreach ($get_id_judul as $key) {
			$id_judul = $key->id_judul;
		}

		$data['pengajuan'] = $this->Pengajuan_model->cekPengajuanMahasiswa($id_judul)->result();

		$this->load->view('pages/static/header');
		$this->load->view('pages/forms/pengajuan',$data);
		$this->load->view('pages/static/footer');
	}

	public function detail_pengajuan(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url('login'));
		}else {
			if ($this->session->userdata('tipe') == "admin") {
					redirect(base_url('home_admin'));
			}
		}
		$id_pengajuan = $this->uri->segment(2);
		$nim = $this->session->userdata('nim');

		$data['pengajuan'] = $this->Pengajuan_model->detailPengajuan($id_pengajuan)->result();
		foreach ($data['pengajuan'] as $value) {
			$nip = $value->NIP;
		}
		$data['dosen'] = $this->Dosen_model->getDosen($nip)->result();

		$this->load->view('pages/static/header');
		$this->load->view('pages/forms/detail_pengajuan',$data);
		$this->load->view('pages/static/footer');
	}

}
