<?php 

/**
 * 
 */
class Ruangan extends CI_Controller
{
	var $data;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Ruangan_model');
		$this->load->library('form_validation');
		logged_in();
		$this->data['user'] = user();
		$this->data['menus'] = navMenu();
	}

	public function index()
	{
		$data = $this->data;

		$data['judul'] = "Data Ruangan";
		$data['page'] = 'ruangan/index';

		$data['ruangan'] = $this->Ruangan_model->getAllRuangan();

		$this->load->view('templates/wrapper', $data);
	}

	public function tambah()
	{
		$data = $this->data;

		$data['judul'] = "Tambah Ruangan";
		$data['page'] = 'ruangan/tambah';

		$this->form_validation->set_rules('nama_ruangan','Nama Ruangan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Ruangan_model->tambahDataRuangan();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('sisfo/ruangan');
		}
	}

	public function ubah($id)
	{
		$data = $this->data;

		$data['judul'] = "Ubah Data Ruangan";
		$data['page'] = 'ruangan/ubah';

		$data['ruangan'] = $this->Ruangan_model->getRuangan($id);

		$this->form_validation->set_rules('nama_ruangan','Nama Ruangan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Ruangan_model->ubahDataRuangan($id);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('sisfo/ruangan');
		}
	}

	public function hapus($id)
	{
		$this->Ruangan_model->hapusDataRuangan($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('sisfo/ruangan');
	}
}