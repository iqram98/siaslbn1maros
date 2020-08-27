<?php 

/**
 * 
 */
class Nilaisiswa extends CI_Controller
{
	var $data;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Penilaian_model');
		$this->load->library('form_validation');
		logged_in();
		$this->data['user'] = user();
		$this->data['menus'] = navMenu();
	}

	public function index()
	{
		$data = $this->data;

		$data['judul'] = "Penilaian";
		$data['page'] = 'penilaian/siswa';


		$data['nilai'] = $this->Penilaian_model->getAllNilaiSiswa($data['user']['id']);


		$this->load->view('templates/wrapper', $data);
	}

	public function detail($id)
	{
		$data = $this->data;

		$data['judul'] = "Penilaian";
		$data['page'] = 'penilaian/detail';


		$data['nilai'] = $this->Penilaian_model->getNilaiSiswa($id);


		$this->load->view('templates/wrapper', $data);
	}
}