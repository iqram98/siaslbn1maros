<?php 

/**
 * 
 */
class Mapel extends CI_Controller
{
	var $data;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Mapel_model');
		$this->load->library('form_validation');
		logged_in();
		$this->data['user'] = user();
		$this->data['menus'] = navMenu();
	}

	public function index()
	{
		$data = $this->data;

		$data['judul'] = "Data Mata Pelajaran";
		$data['page'] = 'mapel/index';

		$data['mapel'] = $this->Mapel_model->getAllMapel();

		$this->load->view('templates/wrapper', $data);
	}

	public function tambah()
	{
		$data = $this->data;

		$data['judul'] = "Tambah Mata Pelajaran";
		$data['page'] = 'mapel/tambah';

		$this->form_validation->set_rules('nama_mapel','Nama Mata Pelajaran', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Mapel_model->tambahDataMapel();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('mapel');
		}
	}

	public function ubah($id)
	{
		$data = $this->data;

		$data['judul'] = "Ubah Data Mata Pelajaran";
		$data['page'] = 'mapel/ubah';

		$data['mapel'] = $this->Mapel_model->getMapel($id);

		$this->form_validation->set_rules('nama_mapel','Nama Mata Pelajaran', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Mapel_model->ubahDataMapel($id);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('mapel');
		}
	}

	public function hapus($id)
	{
		$this->Mapel_model->hapusDataMapel($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('mapel');
	}
}