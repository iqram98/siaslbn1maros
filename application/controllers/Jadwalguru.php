<?php 

/**
 * 
 */
	use Dompdf\Dompdf;

class Jadwalguru extends CI_Controller
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
		$data['page'] = 'jadwal/guru';

		$data['jadwal'] = $this->Jadwal_model->getAllJadwalGuru($data['user']['id']);

		$this->load->view('templates/wrapper', $data);
	}
	public function printJadwalGuru()
	{

		//get data
		$data = $this->data;
		$datas = $this->Jadwal_model->getAllJadwalGuru($data['user']['id']);
		$html = '<h3 align="center">Jadwal Mengajar</h3>
		<h3 align="center">Semester Ganjil</h3>
		<h3 align="center">Tahun Ajar 2020/2021</h3>
		<br>';
		$html .= '<table align="center" style="text-align: center;" border="1" cellpadding="5" cellspacing="0">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Hari</th>
							<th scope="col">Jam</th>
							<th scope="col">Mapel</th>
							<th scope="col">Rombel</th>
							<th scope="col">Ruangan</th>
						</tr>
					</thead>
					<tbody>';
						$no = '1';
						foreach ($datas as $data) {
						$html .='<tr>
							<td>'.$no++.'</td>
							<td>'.$data['hari'].'</td>
							<td>'.$data['jam'].'</td>
							<td>'.$data['nama_mapel'].'</td>
							<td>'.$data['nama_rombel'].'</td>
							<td>'.$data['nama_ruangan'].'</td>
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
		$dompdf->stream('Jadwal');
	}
}