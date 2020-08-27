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
		$this->data['user'] = user();
		$this->data['menus'] = navMenu();
		$this->load->model('sisfo/Dashboard_model');

	}
	
	function index()
	{
		$data = $this->data;
		$data['judul'] = 'Dashboard';
		$data['page'] = 'dashboard/index';
		$data['jumlahSiswa'] = $this->Dashboard_model->jumlahSiswa();
		$data['jumlahGuru'] = $this->Dashboard_model->jumlahGuru();
		$data['statistik'] = $this->Dashboard_model->statistik();

		$this->load->view('templates/wrapper', $data);
	}
}