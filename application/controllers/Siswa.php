<?php 

/**
 * 
 */
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Reader\Csv;
	use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
	use Dompdf\Dompdf;

class Siswa extends CI_Controller
{
 

	var $data;
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Siswa_model');
		$this->load->model('sisfo/Rombel_model');
		$this->load->library('form_validation');
		logged_in();
		$this->data['user'] = user();
		$this->data['menus'] = navMenu();
	}

	public function index()
	{
		$data = $this->data;

		$data['judul'] = 'Data Siswa';
		$data['page'] = 'siswa/index';

		$data['siswa'] = $this->Siswa_model->getAllSiswa();

		$this->load->view('templates/wrapper', $data);
	}

	public function detail($id)
	{
		$data = $this->data;

		$data['judul'] = 'Detail Data Siswa';
		$data['page'] = 'siswa/detail';

		$data['siswa'] = $this->Siswa_model->getSiswa($id);

		$this->load->view('templates/wrapper', $data);
	}

	public function tambah()
	{
		$data = $this->data;

		$data['judul'] = "Tambah Siswa";
		$data['page'] = 'siswa/tambah';
		$data['rombel'] = $this->Rombel_model->getAllRombel();

		$this->form_validation->set_rules('nama','Nama', 'required');
		$this->form_validation->set_rules('nis','Nis', 'required');
		$this->form_validation->set_rules('jk','Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tmpt_lahir','Tempat Lahir', 'required');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir', 'required');
		$this->form_validation->set_rules('alamat','Alamat', 'required');
		$this->form_validation->set_rules('nama_wali','Nama Wali', 'required');
		$this->form_validation->set_rules('hp_wali','No HP/ WA Wali', 'required');
		$this->form_validation->set_rules('id_rombel','Nama Rombel', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Siswa_model->tambahDataSiswa();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('siswa');
		}
	}

	public function ubah($id)
	{
		$data = $this->data;

		$data['judul'] = "Ubah Data Siswa";
		$data['page'] = 'siswa/ubah';
		$data['siswa'] = $this->Siswa_model->getSiswa($id);
		$data['rombel'] = $this->Rombel_model->getAllRombel();
		$data['gender'] = ['Laki-Laki', 'Perempuan'];
		$data['tmpt_lahir'] = explode(" ", $data['siswa']['ttl']);
		$data['tgl_lahir'] = date("Y-m-d", strtotime($data['tmpt_lahir'][1]));

		$this->form_validation->set_rules('nama','Nama', 'required');
		$this->form_validation->set_rules('nis','Nis', 'required');
		$this->form_validation->set_rules('jk','Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tmpt_lahir','Tempat Lahir', 'required');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir', 'required');
		$this->form_validation->set_rules('alamat','Alamat', 'required');
		$this->form_validation->set_rules('nama_wali','Nama Wali', 'required');
		$this->form_validation->set_rules('hp_wali','No HP/ WA Wali', 'required');
		$this->form_validation->set_rules('id_rombel','Nama Rombel', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Siswa_model->ubahDataSiswa($id);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('siswa');
		}
	}

	public function hapus($id)
	{
		$this->Siswa_model->hapusDataSiswa($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('siswa');
	}

	public function uploadDataSiswa()
	{
		$data = $this->data;
		$rombel = $this->Rombel_model->getAllRombel();

		 
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		 
		if(isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {
		 
		    $arr_file = explode('.', $_FILES['berkas_excel']['name']);
		    $extension = end($arr_file);
		 
		    if('csv' == $extension) {
		        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		    } else {
		        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		    }
		 
		    $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);
		     
		    $sheetData = $spreadsheet->getActiveSheet()->toArray();

		    for($i = 1;$i < count($sheetData);$i++)
			{
		        $this->db->select('id');
				$this->db->order_by('id', 'DESC');
				$this->db->limit('1');
				$lastId = $this->db->get('user')->row_array()['id'];
				$id = $lastId + 1;
				$nis = $this->db->get_where('siswa', ['nis' => $sheetData[$i]['2']])->row_array();

				foreach ($rombel as $rom) {
					if ($rom['nama_rombel'] == $sheetData[$i]['8']) {
						$kelas = $rom['id'];
						continue;
					}
				}


				if ($nis && $sheetData[$i]['2'] === NULL) {
					continue;
				} else {
					$data = [
						'nama' => $sheetData[$i]['1'],
						'nis' => $sheetData[$i]['2'],
						'jk' => $sheetData[$i]['3'],
						'ttl' => $sheetData[$i]['4'],
						'id_rombel' => $kelas,
						'alamat' => $sheetData[$i]['5'],
						'nama_wali' => $sheetData[$i]['6'],
						'hp_wali' => $sheetData[$i]['7'],
						'id_user' => $id
					];

					$data1 = [
						'id' => $id,
						'username' => $sheetData[$i]['2'],
						'image' => 'default1.jpg',
						'password' => password_hash('siswaslbn1', PASSWORD_DEFAULT),
						'id_role' => '4'
					]; 

					$this->db->insert('user', $data1);
					$this->db->insert('siswa', $data);
				}
		    }
			
		    $this->session->set_flashdata('flash', 'Diimport');
			redirect('siswa');
		}
	}
	public function printDataSiswa()
	{
		//Ambil Data
		$this->db->select('siswa.*, rombel.nama_rombel, user.image');
		$this->db->from('siswa');
		$this->db->join('rombel', 'rombel.id = siswa.id_rombel');
		$this->db->join('user', 'user.id = siswa.id_user');
		$datas = $this->db->get()->result_array();

		$html = '<h3 align="center">DATA SISWA SLBN 1 MAROS</h3>
		<br>';
		$html .= '<table style="text-align: center;" border="1" cellpadding="5" cellspacing="0">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Nama</th>
							<th scope="col">NIS</th>
							<th scope="col">Jenis Kelamin</th>
							<th scope="col">TTL</th>
							<th scope="col">Alamat</th>
							<th scope="col">Rombel</th>
						</tr>
					</thead>
					<tbody>';
						$no = '1';
						foreach ($datas as $data) {
						$html .= '<tr>
							<td>'. $no++ .'</td>
							<td>'. $data['nama']  .'</td>
							<td>'. $data['nis'] .'</td>
							<td>'. $data['jk'] .'</td>
							<td>'. $data['ttl'] .'</td>
							<td>'. $data['alamat'] .'</td>
							<td>'. $data['nama_rombel'] .'</td>

						</tr>';

						}
					$html .= '</tbody>
				</table>';
		// instantiate and use the dompdf class
		$dompdf = new Dompdf();
		$dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'landscape');

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream('Data_Siswa');
	}
}