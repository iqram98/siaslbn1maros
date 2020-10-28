<?php
/**
*
*/
use Dompdf\Dompdf;
class Penilaian extends CI_Controller
{
	var $data;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('sisfo/Penilaian_model');
		$this->load->model('sisfo/Siswa_model');
		$this->load->model('sisfo/Mengajar_model');
		$this->load->model('sisfo/Dashboard_model');
		$this->load->library('form_validation');
		logged_in();
		$this->data['user'] = user();
		$this->data['menus'] = navMenu();
		$this->data['statistik'] = $this->Dashboard_model->statistik();

	}
	public function index()
	{
		$data = $this->data;
		$data['judul'] = "Penilaian";
		$data['page'] = 'penilaian/index';
		$data['rombelMapel'] = $this->Mengajar_model->getRombelMApel($data['user']['id']);

		if ($this->input->get('refresh') == "s") {
			$data['siswa'] = $this->Penilaian_model->getSiswa();
			$id = $this->db->get('nilai')->row_array()['id'];
			$data['lastId'] = $id + 1;
			$data['r'] = $this->input->get('r');
		} else {
			$data['siswa'] = [];
		}
		$this->load->view('templates/wrapper', $data);
	}

	public function detailSiswa($r, $id)
	{
		$data = $this->data;

		$data['judul'] = 'Detail Data Siswa';
		$data['page'] = 'penilaian/detailSiswa';
		$data['r'] = $r;

		$data['siswa'] = $this->Siswa_model->getSiswa($id);

		$this->load->view('templates/wrapper', $data);
	}

	public function tambah($r, $id)
	{
		$data = $this->data;
		$data['judul'] = "Penilaian";
		$data['page'] = 'penilaian/tambah';
		$data['r'] = $r;

		$this->form_validation->set_rules('u_tulis1','Nilai', 'numeric');
		$this->form_validation->set_rules('u_tulis2','Nilai', 'numeric');
		$this->form_validation->set_rules('u_tulis3','Nilai', 'numeric');
		$this->form_validation->set_rules('u_lisan1','Nilai', 'numeric');
		$this->form_validation->set_rules('u_lisan2','Nilai', 'numeric');
		$this->form_validation->set_rules('u_lisan3','Nilai', 'numeric');
		$this->form_validation->set_rules('u_perbuatan1','Nilai', 'numeric');
		$this->form_validation->set_rules('u_perbuatan2','Nilai', 'numeric');
		$this->form_validation->set_rules('u_perbuatan3','Nilai', 'numeric');
		$this->form_validation->set_rules('tugas1','Nilai', 'numeric');
		$this->form_validation->set_rules('tugas2','Nilai', 'numeric');
		$this->form_validation->set_rules('tugas3','Nilai', 'numeric');
		$this->form_validation->set_rules('uts_t','Nilai', 'numeric');
		$this->form_validation->set_rules('uts_p','Nilai', 'numeric');
		$this->form_validation->set_rules('uas_t','Nilai', 'numeric');
		$this->form_validation->set_rules('uas_p','Nilai', 'numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Penilaian_model->tambahNilai($r, $id);
			$this->session->set_flashdata('flash', 'Diedit');
			redirect('penilaian?r='.$r.'&refresh=s');
		}
	}

	public function edit($id, $r)
	{
		$data = $this->data;
		$data['judul'] = "Penilaian";
		$data['page'] = 'penilaian/ubah';
		$data['nilai'] = $this->Penilaian_model->getNilai($id);
		$data['r'] = $r;

		$this->form_validation->set_rules('u_tulis1','Nilai', 'numeric');
		$this->form_validation->set_rules('u_tulis2','Nilai', 'numeric');
		$this->form_validation->set_rules('u_tulis3','Nilai', 'numeric');
		$this->form_validation->set_rules('u_lisan1','Nilai', 'numeric');
		$this->form_validation->set_rules('u_lisan2','Nilai', 'numeric');
		$this->form_validation->set_rules('u_lisan3','Nilai', 'numeric');
		$this->form_validation->set_rules('u_perbuatan1','Nilai', 'numeric');
		$this->form_validation->set_rules('u_perbuatan2','Nilai', 'numeric');
		$this->form_validation->set_rules('u_perbuatan3','Nilai', 'numeric');
		$this->form_validation->set_rules('tugas1','Nilai', 'numeric');
		$this->form_validation->set_rules('tugas2','Nilai', 'numeric');
		$this->form_validation->set_rules('tugas3','Nilai', 'numeric');
		$this->form_validation->set_rules('uts_t','Nilai', 'numeric');
		$this->form_validation->set_rules('uts_p','Nilai', 'numeric');
		$this->form_validation->set_rules('uas_t','Nilai', 'numeric');
		$this->form_validation->set_rules('uas_p','Nilai', 'numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/wrapper', $data);
		} else {
			$this->Penilaian_model->editNilai($id);
			$this->session->set_flashdata('flash', 'Diedit');
			redirect('penilaian?r='.$r.'&refresh=s');
		}
	}
	public function printNilai($id_mengajar)
	{
		$user = $this->data['user'];
		$nilais = $this->Penilaian_model->printNilai($id_mengajar);
		$data = $this->Penilaian_model->printdata($id_mengajar);
		$semesters = explode(" ", $data['thn_ajar']);
		$semester = strtoupper($semesters[0]);
		$thn_ajar = $semesters[1];
		$kelas = $data['nama_rombel'];
		$jurusan = $data['nama_jurusan'];

		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [330, 215]]);
		$html = '<body>
		<h3 align="center">DAFTAR NILAI ULANGAN SEMESTER '.$semester.'</h3>
		<table>
				<tr>
						<td width="150">Mata Pelajaran</td>
						<td>:</td>
						<td>'.$data["nama_mapel"].'</td>
				<tr>
						<td>Kelas/ Jurusan</td>
						<td>:</td>
						<td>'. $kelas .'/ '.$jurusan.'</td>
				</tr>
				<tr>
						<td>Tahun Pelajaran</td>
						<td>:</td>
						<td>'. $thn_ajar .'</td>
				</tr>
		</table>
		<br>
		<table class="tableisi" style="text-align: center;" border="1" cellpadding="5" cellspacing="0">
				<tr>
						<td rowspan="3">No</td>
						<td rowspan="3">Nama/ NIS</td>
						<td width="20" colspan="12">Ulangan Harian</td>
						<td width="20" rowspan="3">Rata-rata Ulhar</td>
						<td width="20" colspan="3" rowspan="2">Tugas/ PR</td>
						<td width="20" rowspan="3">Rata-Rata Tugas</td>
						<td width="20" colspan="2" rowspan="2">Ulangan Tengah Semester</td>
						<td width="20" rowspan="3">Rata-Rata UTS</td>
						<td width="20" colspan="2" rowspan="2">Ulangan Akhir Semester</td>
						<td width="20" rowspan="3">Rata-Rata UAS</td>
						<td width="20" rowspan="3">Nilai Akhir</td>
						<td width="20" rowspan="3">Nilai Rapor</td>
				</tr>
				<tr>
						<td width="20" colspan="3">Tulis</td>
						<td width="20" rowspan="2">Rata-Rata</td>
						<td width="20" colspan="3">Lisan</td>
						<td width="20" rowspan="2">Rata-Rata</td>
						<td width="20" colspan="3">Perbuatan</td>
						<td width="20" rowspan="2">Rata-Rata</td>
				</tr>
				<tr>
						<td width="15">1</td>
						<td width="15">2</td>
						<td width="15">3</td>
						<td width="15">1</td>
						<td width="15">2</td>
						<td width="15">3</td>
						<td width="15">1</td>
						<td width="15">2</td>
						<td width="15">3</td>
						<td width="15">1</td>
						<td width="15">2</td>
						<td width="15">3</td>
						<td width="15">T</td>
						<td width="15">P</td>
						<td width="15">T</td>
						<td width="15">P</td>
				</tr>';
				$i = 1;
				foreach ($nilais as $nilai) {
					$html .= '<tr>
								<td>'. $i++ .'</td>
								<td>'. $nilai["nama"] . '/ ' . $nilai["nis"] . '</td>
								<td>'. $nilai["u_tulis1"] .'</td>
								<td>'. $nilai["u_tulis2"] .'</td>
								<td>'. $nilai["u_tulis3"] .'</td>
								<td>'. $nilai["rata_tulis"] .'</td>
								<td>'. $nilai["u_lisan1"] .'</td>
								<td>'. $nilai["u_lisan2"] .'</td>
								<td>'. $nilai["u_lisan3"] .'</td>
								<td>'. $nilai["rata_lisan"] .'</td>
								<td>'. $nilai["u_perbuatan1"] .'</td>
								<td>'. $nilai["u_perbuatan2"] .'</td>
								<td>'. $nilai["u_perbuatan3"] .'</td>
								<td>'. $nilai["rata_perbuatan"] .'</td>
								<td>'. $nilai["rata_ulhar"] .'</td>
								<td>'. $nilai["tugas1"] .'</td>
								<td>'. $nilai["tugas2"] .'</td>
								<td>'. $nilai["tugas3"] .'</td>
								<td>'. $nilai["rata_tugas"] .'</td>
								<td>'. $nilai["uts_t"] .'</td>
								<td>'. $nilai["uts_p"] .'</td>
								<td>'. $nilai["rata_uts"] .'</td>
								<td>'. $nilai["uas_t"] .'</td>
								<td>'. $nilai["uas_p"] .'</td>
								<td>'. $nilai["rata_uas"] .'</td>
								<td>'. $nilai["nilai_akhir"] .'</td>
								<td>'. $nilai["nilai_rapor"] .'</td>';
				}
				
		$html .= '</table>
		<table>
				<tr>
						<td width="200"></td>
						<td></td>
						<td width="500"></td>
						<td width="200" align="right">Maros ........ 2020</td>
				</tr>
				<tr>
						<td></td>
						<td>Mengetahui</td>
						<td></td>
						<td></td>
				</tr>
				<tr>
						<td></td>
						<td>Kepala Sekolah</td>
						<td></td>
						<td>Guru Kelas</td>
				</tr>
				<tr>
						<td></td>
						<td height="70"></td>
						<td></td>
						<td></td>
				</tr>
				<tr>
						<td></td>
						<td>MAHYUDDIN, S.Pd.,M.M.</td>
						<td></td>
						<td>'. strtoupper($user["nama"]) .'</td>
				</tr>
				<tr>
						<td></td>
						<td>NIP. 197202072007011020</td>
						<td></td>
						<td>NIP. ' . $user["nip"] . '</td>
				</tr>
		</table>
</body>';
		$mpdf->WriteHTML($html);
		$mpdf->Output('Daftar_Nilai.pdf', 'I');
	}
	
}