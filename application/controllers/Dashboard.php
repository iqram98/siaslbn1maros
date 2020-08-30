<?php 

/**
 * 
 */
class Dashboard extends CI_Controller
{
	var $data;

	public function __construct()
	{
		parent::__construct();
		logged_in();
		$this->load->model('sisfo/Dashboard_model');
		$this->data['user'] = user();
		$this->data['menus'] = navMenu();
		$this->data['statistik'] = $this->Dashboard_model->statistik();


	}
	
	function index()
	{
		$data = $this->data;
		$data['judul'] = 'Dashboard';
		$data['page'] = 'dashboard/index';
		$data['jumlahSiswa'] = $this->Dashboard_model->jumlahSiswa();
		$data['jumlahGuru'] = $this->Dashboard_model->jumlahGuru();

		$this->load->view('templates/wrapper', $data);
	}
}