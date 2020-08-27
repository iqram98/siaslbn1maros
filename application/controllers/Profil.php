<?php 

/**
 * 
 */
class Profil extends CI_Controller
{
	var $data;
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Profil_model');
		$this->load->model('sisfo/Guru_model');
		$this->load->library('form_validation');
		logged_in();
		$this->data['user'] = user();
		$this->data['menus'] = navMenu();
	}

	public function index()
	{
		$data = $this->data;
		$data['judul'] = 'Profil';
		$data['page'] = 'profil/index';

		$this->load->view('templates/wrapper', $data);	
	}

	public function ubahguru()
	{
		$data = $this->data;
		if ($data['user']['id_role'] != 3) {
			redirect('profil');
		}
		$data['judul'] = 'Profil';
		$data['page'] = 'profil/ubahguru';
		$data['gender'] = ['Laki-Laki', 'Perempuan'];
		$data['tmpt_lahir'] = explode(" ", $data['user']['ttl']);
		$data['tgl_lahir'] = date("Y-m-d", strtotime($data['tmpt_lahir'][1]));

		$this->form_validation->set_rules('nama','Nama', 'required');
		$this->form_validation->set_rules('nip','NIP', 'required|numeric');
		$this->form_validation->set_rules('jk','Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tmpt_lahir','Tempat Lahir', 'required');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir', 'required');
		$this->form_validation->set_rules('pendidikan','Pendidikan', 'required');
		$this->form_validation->set_rules('pangkat','Pangkat', 'required');
		$this->form_validation->set_rules('jabatan','Jabatan', 'required');
		$this->form_validation->set_rules('tmt','TMT', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Profil_model->ubahDataGuru($data['user']['id']);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('profil');
		}
	}

	public function ubahsiswa()
	{
		$data = $this->data;
		if ($data['user']['id_role'] != 4) {
			redirect('profil');
		}

		$data['judul'] = "Ubah Data Siswa";
		$data['page'] = 'profil/ubahsiswa';
		$data['gender'] = ['Laki-Laki', 'Perempuan'];
		$data['tmpt_lahir'] = explode(" ", $data['user']['ttl']);
		$data['tgl_lahir'] = date("Y-m-d", strtotime($data['tmpt_lahir'][1]));

		$this->form_validation->set_rules('nama','Nama', 'required');
		$this->form_validation->set_rules('nis','Nis', 'required|numeric');
		$this->form_validation->set_rules('jk','Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tmpt_lahir','Tempat Lahir', 'required');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Profil_model->ubahDataSiswa($data['user']['id']);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('profil');
		}
	}

	public function ubahadmin()
	{
		$data = $this->data;
		if ($data['user']['id_role'] != 1 && $data['user']['id_role'] != 2) {
			redirect('profil');
		}
		
		$data['judul'] = "Ubah Data Admin";
		$data['page'] = 'profil/ubahadmin';

		$this->form_validation->set_rules('username','Username', 'required');
		$this->form_validation->set_rules('email','Email', 'required|valid_email');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Profil_model->ubahDataAdmin($data['user']['id_user']);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('profil');
		}
	}

	public function user()
	{
		$data = $this->data;
		$data['judul'] = "Ubah Password";
		$data['page'] = 'profil/ubahuser';

		$this->form_validation->set_rules('passwordlama','Password Lama', 'required');
		$this->form_validation->set_rules('passwordbaru','Password Baru', 'required|min_length[6]');
		$this->form_validation->set_rules('passwordbaru1','Konfirmasi Password Baru', 'required|min_length[6]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Profil_model->ubahuser($data['user']['id_user']);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('profil');
		}

	}

	public function foto()
	{
		$data = $this->data;
		$data['judul'] = "Ubah Foto Profil";
		$data['page'] = 'profil/foto';

		$this->form_validation->set_rules('hidden','Hidden', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Profil_model->ubahfoto($data['user']['id_user'], $data['user']['image']);
			redirect('profil');
		}
	}
}