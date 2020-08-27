<?php 

/**
 * 
 */
class Jadwalsiswa extends CI_Controller
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
		$data['page'] = 'jadwal/siswa';

		$data['jadwal'] = $this->Jadwal_model->getAllJadwalSiswa($data['user']['id_rombel']);

		$this->load->view('templates/wrapper', $data);
	}
}