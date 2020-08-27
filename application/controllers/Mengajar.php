<?php 

class Mengajar extends CI_Controller
{
	var $data;
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Mengajar_model');
		$this->load->model('sisfo/ThnAjar_model');
		$this->load->model('sisfo/Guru_model');
		$this->load->model('sisfo/Mapel_model');
		$this->load->model('sisfo/Rombel_model');
		$this->load->library('form_validation');
		logged_in();
		$this->data['user'] = user();
		$this->data['menus'] = navMenu();
	}

	public function index()
	{
		$data = $this->data;

		$data['judul'] = "Data Mengajar";
		$data['page'] = "mengajar/index";
		$data['mengajar'] = $this->Mengajar_model->getAllMengajar();

		$this->load->view('templates/wrapper', $data);

	}

	public function tambah()
	{
		$data = $this->data;

		$data['judul'] = "Tambah Data Mengajar";
		$data['page'] = 'mengajar/tambah';
		$data['thn_ajar'] = $this->ThnAjar_model->getAllThnAjar();
		$data['guru'] = $this->Guru_model->getAllGuru();
		$data['mapel'] = $this->Mapel_model->getAllMapel();
		$data['rombel'] = $this->Rombel_model->getAllRombel();

		$this->form_validation->set_rules('id_thn_ajar','Tahun Ajar', 'required');
		$this->form_validation->set_rules('id_guru','Nama Guru', 'required');
		$this->form_validation->set_rules('id_mapel','Mata Pelajaran', 'required');
		$this->form_validation->set_rules('id_rombel','Rombel', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Mengajar_model->tambahDataMengajar();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('mengajar');
		}
	}

	public function ubah($id)
	{
		$data = $this->data;

		$data['judul'] = "Ubah Data Mengajar";
		$data['page'] = 'mengajar/ubah';
		$data['mengajar'] = $this->Mengajar_model->getMengajar($id);
		$data['thn_ajar'] = $this->ThnAjar_model->getAllThnAjar();
		$data['guru'] = $this->Guru_model->getAllGuru();
		$data['mapel'] = $this->Mapel_model->getAllMapel();
		$data['rombel'] = $this->Rombel_model->getAllRombel();

		$this->form_validation->set_rules('id_thn_ajar','Tahun Ajar', 'required');
		$this->form_validation->set_rules('id_guru','Nama Guru', 'required');
		$this->form_validation->set_rules('id_mapel','Mata Pelajaran', 'required');
		$this->form_validation->set_rules('id_rombel','Rombel', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Mengajar_model->ubahDataMengajar($id);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('mengajar');
		}
	}

	public function hapus($id)
	{
		$this->Mengajar_model->hapusDataMengajar($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('mengajar');
	}
}