<?php 

/**
 * 
 */
class ThnAjar extends CI_Controller
{
	
	var $data;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/ThnAjar_model');
		$this->load->library('form_validation');
		logged_in();
		$this->data['user'] = user();
		$this->data['menus'] = navMenu();
	}

	public function index()
	{
		$data = $this->data;

		$data['judul'] = "Data Tahun Ajar";
		$data['page'] = 'thnAjar/index';

		$data['thn_ajar'] = $this->ThnAjar_model->getAllThnAjar();

		$this->load->view('templates/wrapper', $data);
	}

	public function tambah()
	{
		$data = $this->data;

		$data['judul'] = "Tambah Tahun Ajar";
		$data['page'] = 'thnAjar/tambah';

		$this->form_validation->set_rules('thn_ajar','Tahun Ajar', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->ThnAjar_model->tambahDataThnAjar();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('thnAjar');
		}
	}

	public function ubah($id)
	{
		$data = $this->data;

		$data['judul'] = "Ubah Data Tahun Ajar";
		$data['page'] = 'thnAjar/ubah';

		$data['thn_ajar'] = $this->ThnAjar_model->getThnAjar($id);

		$this->form_validation->set_rules('thn_ajar','Tahun Ajar', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->ThnAjar_model->ubahDataThnAjar($id);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('thnAjar');
		}
	}

	public function hapus($id)
	{
		$this->ThnAjar_model->hapusDataThnAjar($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('thnAjar');
	}
}