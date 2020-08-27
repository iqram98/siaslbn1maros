<?php 

/**
 * 
 */
class Jurusan extends CI_Controller
{
	var $data;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Jurusan_model');
		$this->load->library('form_validation');
		logged_in();
		$this->data['user'] = user();
		$this->data['menus'] = navMenu();
	}

	public function index()
	{
		$data = $this->data;

		$data['judul'] = "Data Jurusan";
		$data['page'] = 'jurusan/index';


		$data['jurusan'] = $this->Jurusan_model->getAllJurusan();

		$this->load->view('templates/wrapper', $data);

	}

	public function tambah()
	{
		$data = $this->data;

		$data['judul'] = "Tambah Jurusan";
		$data['page'] = 'jurusan/tambah';

		$this->form_validation->set_rules('nama_jurusan','Nama Jurusan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Jurusan_model->tambahDataJurusan();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('jurusan');
		}
	}

	public function ubah($id)
	{
		$data = $this->data;

		$data['judul'] = "Ubah Data Jurusan";
		$data['page'] = 'jurusan/ubah';

		$data['jurusan'] = $this->Jurusan_model->getJurusan($id);

		$this->form_validation->set_rules('nama_jurusan','Nama Jurusan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Jurusan_model->ubahDataJurusan($id);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('jurusan');
		}
	}

	public function hapus($id)
	{
		$this->Jurusan_model->hapusDataJurusan($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('jurusan');
	}
}