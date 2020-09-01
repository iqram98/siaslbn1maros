<?php 

/**
 * 
 */
class Siswa extends CI_Controller
{
	var $data;
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Siswa_model');
		$this->load->model('sisfo/Rombel_model');
		$this->load->library('form_validation');
		logged_in();
		$this->data['user'] = user();
		$this->data['menus'] = navMenu();
	}

	public function index()
	{
		$data = $this->data;

		$data['judul'] = 'Data Siswa';
		$data['page'] = 'siswa/index';

		$data['siswa'] = $this->Siswa_model->getAllSiswa();

		$this->load->view('templates/wrapper', $data);
	}

	public function detail($id)
	{
		$data = $this->data;

		$data['judul'] = 'Detail Data Siswa';
		$data['page'] = 'siswa/detail';

		$data['siswa'] = $this->Siswa_model->getSiswa($id);

		$this->load->view('templates/wrapper', $data);
	}

	public function tambah()
	{
		$data = $this->data;

		$data['judul'] = "Tambah Siswa";
		$data['page'] = 'siswa/tambah';
		$data['rombel'] = $this->Rombel_model->getAllRombel();

		$this->form_validation->set_rules('nama','Nama', 'required');
		$this->form_validation->set_rules('nis','Nis', 'required|numeric');
		$this->form_validation->set_rules('jk','Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tmpt_lahir','Tempat Lahir', 'required');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir', 'required');
		$this->form_validation->set_rules('nama_wali','Nama Wali', 'required');
		$this->form_validation->set_rules('hp_wali','No HP/ WA Wali', 'required');
		$this->form_validation->set_rules('id_rombel','Nama Rombel', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Siswa_model->tambahDataSiswa();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('siswa');
		}
	}

	public function ubah($id)
	{
		$data = $this->data;

		$data['judul'] = "Ubah Data Siswa";
		$data['page'] = 'siswa/ubah';
		$data['siswa'] = $this->Siswa_model->getSiswa($id);
		$data['rombel'] = $this->Rombel_model->getAllRombel();
		$data['gender'] = ['Laki-Laki', 'Perempuan'];
		$data['tmpt_lahir'] = explode(" ", $data['siswa']['ttl']);
		$data['tgl_lahir'] = date("Y-m-d", strtotime($data['tmpt_lahir'][1]));

		$this->form_validation->set_rules('nama','Nama', 'required');
		$this->form_validation->set_rules('nis','Nis', 'required|numeric');
		$this->form_validation->set_rules('jk','Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tmpt_lahir','Tempat Lahir', 'required');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir', 'required');
		$this->form_validation->set_rules('nama_wali','Nama Wali', 'required');
		$this->form_validation->set_rules('hp_wali','No HP/ WA Wali', 'required');
		$this->form_validation->set_rules('id_rombel','Nama Rombel', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Siswa_model->ubahDataSiswa($id);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('siswa');
		}
	}

	public function hapus($id)
	{
		$this->Siswa_model->hapusDataSiswa($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('siswa');
	}
}