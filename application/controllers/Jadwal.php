<?php 

/**
 * 
 */
class Jadwal extends CI_Controller
{
	var $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Jadwal_model');
		$this->load->model('sisfo/Mengajar_model');
		$this->load->model('sisfo/ThnAjar_model');
		$this->load->model('sisfo/Ruangan_model');
		$this->load->library('form_validation');
		logged_in();
		$this->data['user'] = user();
		$this->data['menus'] = navMenu();
	}

	public function index()
	{
		$data = $this->data;

		$data['judul'] = "Data Jadwal";
		$data['page'] = 'jadwal/index';

		$data['jadwal'] = $this->Jadwal_model->getAllJadwal();

		$this->load->view('templates/wrapper', $data);
	}

	public function tambah()
	{
		$data = $this->data;

		$data['judul'] = "Tambah Jadwal";
		$data['page'] = 'jadwal/tambah';
		$data['thn_ajar'] = $this->ThnAjar_model->getAllThnAjar();
		$data['mengajar'] = $this->Mengajar_model->getAllRombelMapel();
		$data['ruangan'] = $this->Ruangan_model->getAllRuangan();
		$data['hari'] = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

		$this->form_validation->set_rules('id_thn_ajar','Tahun Ajar', 'required');
		$this->form_validation->set_rules('hari','Hari', 'required');
		$this->form_validation->set_rules('jam_mulai','Jam Mulai', 'required');
		$this->form_validation->set_rules('jam_akhir','Jam Akhir', 'required');
		$this->form_validation->set_rules('id_mengajar','Rombel - Mata Pelajaran', 'required');
		$this->form_validation->set_rules('id_ruangan','Ruangan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Jadwal_model->tambahDataJadwal();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('jadwal');
		}
	}

	public function ubah($id)
	{
		$data = $this->data;
		
		$data['judul'] = "Ubah Jadwal";
		$data['page'] = 'jadwal/ubah';

		$data['jadwal'] = $this->Jadwal_model->getJadwal($id);
		$data['thn_ajar'] = $this->ThnAjar_model->getAllThnAjar();
		$data['mengajar'] = $this->Mengajar_model->getAllRombelMapel();
		$data['ruangan'] = $this->Ruangan_model->getAllRuangan();
		$data['hari'] = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
		$jam = explode(" - ", $data['jadwal']['jam']);

		$data['jam_mulai'] = $jam[0];
		$data['jam_akhir'] = $jam[1];

		$this->form_validation->set_rules('id_thn_ajar','Tahun Ajar', 'required');
		$this->form_validation->set_rules('hari','Hari', 'required');
		$this->form_validation->set_rules('jam_mulai','Jam Mulai', 'required');
		$this->form_validation->set_rules('jam_akhir','Jam Akhir', 'required');
		$this->form_validation->set_rules('id_mengajar','Rombel - Mata Pelajaran', 'required');
		$this->form_validation->set_rules('id_ruangan','Ruangan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Jadwal_model->ubahDataJadwal($id);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('jadwal');
		}
	}

	public function hapus($id)
	{
		$this->Jadwal_model->hapusDataJadwal($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('jadwal');
	}
}