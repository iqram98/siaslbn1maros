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
		$this->load->model('sisfo/Siswa_model');
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
		$this->form_validation->set_rules('deskripsi1','Deskripsi', 'required');


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

	public function print($id_mengajar, $id_siswa)
	{
		$user = $this->data['user'];
		$asesmen = $this->Asesmen_model->getAllAsesmen($id_mengajar, $id_siswa);
		$roma = $this->Mengajar_model->getRombelMapelSatu($id_mengajar);
		$rombel = explode(" - ", $roma)[0];
		$mapel = $rombel[1];
		$siswa = $this->Siswa_model->getSiswa($id_siswa);

		$aspek = [];
		$deskripsi = [];

		foreach ($asesmen as $data) {
			array_push($aspek, $data['aspek']);
			array_push($deskripsi, $data['deskripsi']);
		}

		$arr = [];

		for ($i=0; $i < sizeof($deskripsi); $i++) { 
			$aspekIsi = $aspek[$i];

			if (!isset($arr[$aspekIsi])) {
				$arr[$aspekIsi] = [];
				$arr[$aspekIsi]['rowspan'] = 0;
			}

			$arr[$aspekIsi]['printed'] = "no";

			$arr[$aspekIsi]['rowspan'] += 1;
		}

		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [215, 330]]);

		$html = '<body>
		<h3 align="center">PEMBAHASAN HASIL ASESMEN</h3>
		<h3 align="center">MATA PELAJARAN' . $mapel . '</h3>
		<br>
		<table align="center">
			<tr>
				<td>Nama Peserta Didik</td>
				<td>:</td>';
		$html .= '<td>' . $siswa['nama'] . '</td>';
				
		$html .=	'</tr>
			<tr>
				<td>Tempat, tanggal lahir</td>
				<td>:</td>';
		$html .=	'<td>' . $siswa['ttl'] . '</td>';
		$html .=	'</tr>
			<tr>
				<td>Kelas</td>
				<td>:</td>';
		$html .= '<td>' . $rombel . '</td>';
		$html .= '</tr>
			<tr>
				<td>Tanggal Pelaksanaan Asesmen</td>
				<td>:</td>';
		$html .= '<td>' . date("d/m/Y") . '</td>';
		$html .= '</tr>
		</table>
		<br>
		<table class="tableisi" style="text-align: center;" border="1" cellpadding="5" cellspacing="0">
			<tr>
				<td>No</td>
				<td>Aspek/ Kompetensi</td>
				<td>Deskripsi</td>
			</tr>';
			$a = 1;
			for($i=0; $i < sizeof($deskripsi); $i++) {
				$aspekIsi = $aspek[$i];
				$html .= '<tr>';
				if ($arr[$aspekIsi]['printed'] == 'no') {
					$html .= "<td rowspan='" . $arr[$aspekIsi]['rowspan'] . "'>" . $a++."</td>";
					$html .= "<td width='300' rowspan='" . $arr[$aspekIsi]['rowspan'] . "'>" . $aspekIsi."</td>";
					$arr[$aspekIsi]['printed'] = 'yes';
				}
				$html .= '<td width="400">' . $deskripsi[$i] . '</td>';
				$html .= '</tr>';
			}

			$html .= '
		</table>
		<table align="center">
			<tr>
				<td></td>
				<td width="500"></td>
				<td width="200" align="right">Maros, 12 Agustus 2020</td>
			</tr>
			<tr>
				<td width="200">Mengetahui</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Kepala Sekolah</td>
				<td></td>
				<td>Guru Kelas</td>
			</tr>
			<tr>
				<td height="70"></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>MAHYUDDIN, S.Pd. M.Pd.</td>
				<td></td>
				<td>' . strtoupper($user["nama"]) . '</td>
			</tr>
			<tr>
				<td>NIP. xxxxxxxxxxxxx</td>
				<td></td>
				<td>NIP. ' . $user["nip"] . '</td>
			</tr>
		</table>
	</body>';
	$mpdf->WriteHTML($html);
		$mpdf->Output('Daftar_Nilai.pdf', 'I');

	}

	
}