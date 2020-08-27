<?php 

/**
 * 
 */
class Admin extends CI_Controller
{
	var $data;
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Admin_model');
		$this->load->library('form_validation');
		logged_in();
		$this->data['user'] = user();
		$this->data['menus'] = navMenu();
	}

	public function index()
	{
		$data = $this->data;
		$data['judul'] = 'Data User';	
		$data['page'] = 'admin/index';

		$data['users'] = $this->Admin_model->getAllUser();

		$this->load->view('templates/wrapper', $data);	
	}

	public function tambah()
	{
		$data = $this->data;
		
		$data['judul'] = "Tambah Admin";
		$data['page'] = 'admin/tambah';

		$this->form_validation->set_rules('username','Username', 'required');
		$this->form_validation->set_rules('email','Email', 'required|valid_email');
		$this->form_validation->set_rules('password','Password', 'required|min_length[6]');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Admin_model->tambahDataUser();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('admin');
		}
	}

	public function hapus($id)
	{
		$this->Admin_model->hapusDataUser($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin');
	}
}