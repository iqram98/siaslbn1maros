<?php 

/**
 * 
 */
class Rombel extends CI_Controller
{
	var $data;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Rombel_model');
		$this->load->model('sisfo/Jurusan_model');
		$this->load->library('form_validation');
		logged_in();
		$this->data['user'] = user();
		$this->data['menus'] = navMenu();
	}

	public function index()
	{
		$data = $this->data;

		$data['judul'] = "Data Rombel";
		$data['page'] = 'rombel/index';

		$data['rombel'] = $this->Rombel_model->getAllRombel();

		$this->load->view('templates/wrapper', $data);
	}

	public function tambah()
	{
		$data = $this->data;

		$data['judul'] = "Tambah Rombel";
		$data['page'] = 'rombel/tambah';

		$data['jurusan'] = $this->Jurusan_model->getAllJurusan();

		$this->form_validation->set_rules('nama_rombel','Nama Rombel', 'required');
		$this->form_validation->set_rules('id_jurusan','Jurusan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Rombel_model->tambahDataRombel();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('rombel');
		}
	}

	public function ubah($id)
	{
		$data = $this->data;

		$data['judul'] = "Ubah Data Rombel";
		$data['page'] = 'rombel/ubah';

		$data['rombel'] = $this->Rombel_model->getRombel($id);
		$data['jurusan'] = $this->Jurusan_model->getAllJurusan();

		$this->form_validation->set_rules('nama_rombel','Nama Rombel', 'required');
		$this->form_validation->set_rules('id_jurusan','Jurusan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Rombel_model->ubahDataRombel($id);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('rombel');
		}
	}

	public function hapus($id)
	{
		$this->Rombel_model->hapusDataRombel($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('sisfo/rombel');
	}
}