<?php 

/**
 * 
 */
class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Auth_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['judul'] = 'Halaman Login';

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/footer');		
		} else {
			$this->Auth_model->login();
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');

		$this->session->set_flashdata('flash', 'Anda telah logout!');
		redirect('auth');
	}

}