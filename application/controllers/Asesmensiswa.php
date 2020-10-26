<?php 

/**
 * 
 */
class Asesmensiswa extends CI_Controller
{
	var $data;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Asesmen_model');
		$this->load->model('sisfo/Mengajar_model');
		$this->load->library('form_validation');
		logged_in();
		$this->data['user'] = user();
		$this->data['menus'] = navMenu();
	}

	public function index()
	{
		$data = $this->data;

		$data['judul'] = "Asesmen";
		$data['page'] = 'asesmen/mapel';
		$data['rombelMapel'] = $this->Mengajar_model->getMApel($data['user']['id_rombel']);

		$this->load->view('templates/wrapper', $data);
	}
	public function listAsesmen($id)
	{
		$data = $this->data;

		$data['judul'] = "Penilaian";
		$data['page'] = 'asesmen/list';
		$data['roma'] = $this->Mengajar_model->getRombelMapelSatu($id);
		$data['asesmen'] = $this->Asesmen_model->getAllAsesmen($id, $data['user']['id']);

		$this->load->view('templates/wrapper', $data);
	}
}