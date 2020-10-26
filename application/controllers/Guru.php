<?php 

/**
 * 
 */
class Guru extends CI_Controller
{
	var $data;

	function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Guru_model');
		$this->load->library('form_validation');
		logged_in();
		$this->data['user'] = user();
		$this->data['menus'] = navMenu();
	}

	public function index()
	{
		$data = $this->data;
		$data['judul'] = 'Data Guru';
		$data['page'] = 'guru/index';
		$data['guru'] = $this->Guru_model->getAllGuru();

		$this->load->view('templates/wrapper', $data);
	}

	public function detail($id)
	{
		$data = $this->data;
		$data['judul'] = 'Detail Data Guru';
		$data['page'] = 'guru/detail';
		$data['guru'] = $this->Guru_model->getGuru($id);

		$this->load->view('templates/wrapper', $data);
	}

	public function tambah()
	{
		$data = $this->data;
		$data['judul'] = "Tambah Guru";
		$data['page'] = 'guru/tambah';

		$this->form_validation->set_rules('nama','Nama', 'required');
		$this->form_validation->set_rules('nip','NIP', 'required');
		$this->form_validation->set_rules('jk','Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tmpt_lahir','Tempat Lahir', 'required');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir', 'required');
		$this->form_validation->set_rules('pendidikan','Pendidikan', 'required');
		$this->form_validation->set_rules('pangkat','Pangkat', 'required');
		$this->form_validation->set_rules('jabatan','Jabatan', 'required');
		$this->form_validation->set_rules('tmt','TMT', 'required');
		$this->form_validation->set_rules('no_hp','TMT', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Guru_model->tambahDataGuru();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('guru');
		}
	}

	public function ubah($id)
	{
		$data = $this->data;
		$data['judul'] = "Ubah Data Guru";
		$data['page'] = 'guru/ubah';
		$data['guru'] = $this->Guru_model->getGuru($id);
		$data['gender'] = ['Laki-Laki', 'Perempuan'];
		$data['tmpt_lahir'] = explode(" ", $data['guru']['ttl']);
		$data['tgl_lahir'] = date("Y-m-d", strtotime($data['tmpt_lahir'][1]));

		$this->form_validation->set_rules('nama','Nama', 'required');
		$this->form_validation->set_rules('nip','NIP', 'required');
		$this->form_validation->set_rules('jk','Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tmpt_lahir','Tempat Lahir', 'required');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir', 'required');
		$this->form_validation->set_rules('pendidikan','Pendidikan', 'required');
		$this->form_validation->set_rules('pangkat','Pangkat', 'required');
		$this->form_validation->set_rules('jabatan','Jabatan', 'required');
		$this->form_validation->set_rules('tmt','TMT', 'required');
		$this->form_validation->set_rules('no_hp','No Hp', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Guru_model->ubahDataGuru($id);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('guru');
		}
	}

	public function hapus($id)
	{
		$this->Guru_model->hapusDataGuru($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('guru');
	}
}