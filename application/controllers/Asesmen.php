<?php 

/**
 * 
 */
class Asesmen extends CI_Controller
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
		$data['page'] = 'asesmen/index';
		$data['rombelMapel'] = $this->Mengajar_model->getRombelMApel($data['user']['id']);

		$this->load->view('templates/wrapper', $data);
	}

	public function siswa($id)
	{
		$data = $this->data;

		$data['judul'] = "Asesmen";
		$data['page'] = 'asesmen/siswa';
		$data['siswa'] = $this->Asesmen_model->getSiswa($id);
		$data['id_mengajar'] = $this->uri->segment(3);
		$data['roma'] = $this->Mengajar_model->getRombelMapelSatu($data['id_mengajar']);

		$this->load->view('templates/wrapper', $data);
	}

	public function data($id_mengajar, $id_siswa)
	{
		$data = $this->data;

		$data['judul'] = "Asesmen";
		$data['page'] = 'asesmen/data';
		$data['asesmen'] = $this->Asesmen_model->getAllAsesmen($id_mengajar, $id_siswa);
		$data['id_mengajar'] = $this->uri->segment(3);
		$data['id_siswa'] = $this->uri->segment(4);
		$data['roma'] = $this->Mengajar_model->getRombelMapelSatu($data['id_mengajar']);
		$data['siswa'] = $this->Asesmen_model->getNamaSiswa($id_siswa);

		$this->load->view('templates/wrapper', $data);
	}

	public function tambah($id_mengajar, $id_siswa)
	{
		$data = $this->data;

		$data['judul'] = "Tambah Asesmen";
		$data['page'] = 'asesmen/tambah';
		$data['id_mengajar'] = $this->uri->segment(3);
		$data['id_siswa'] = $this->uri->segment(4);

		$this->form_validation->set_rules('aspek','Aspek', 'required');
		$this->form_validation->set_rules('deskripsi','Deskripsi', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Asesmen_model->tambahAsesmen($id_mengajar, $id_siswa);
			$this->session->set_flashdata('flash', 'Ditambah');
			redirect("asesmen/data/" . $id_mengajar . "/" . $id_siswa);
		}
	}

	public function ubah($id_mengajar, $id_siswa, $id)
	{
		$data = $this->data;

		$data['judul'] = "Edit Asesmen";
		$data['page'] = 'asesmen/ubah';
		$data['id_mengajar'] = $this->uri->segment(3);
		$data['id_siswa'] = $this->uri->segment(4);
		$data['asesmen'] = $this->Asesmen_model->getAsesmen($id);

		$this->form_validation->set_rules('aspek','Aspek', 'required');
		$this->form_validation->set_rules('deskripsi','Deskripsi', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Asesmen_model->ubahAsesmen($id);
			$this->session->set_flashdata('flash', 'Diedit');
			redirect("asesmen/data/" . $id_mengajar . "/" . $id_siswa);
		}
	}

	public function hapus($id_mengajar, $id_siswa, $id)
	{
		$this->Asesmen_model->hapusDataAsesmen($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect("asesmen/data/" . $id_mengajar . "/" . $id_siswa);
	}

	
}