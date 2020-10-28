<?php
/**
 * 
 */
class Penilaian_model extends CI_Model
{

	public function getSiswa()
	{
		$roma = $this->input->get('r');

		$rombel = $this->db->get_where('mengajar', ['id' => $roma])->row_array()['id_rombel'];
	
		$this->db->select('siswa.id, siswa.nama, siswa.nis, siswa.id_rombel, nilai.id as id_nilai, nilai.id_mengajar, nilai.nilai_akhir');
		$this->db->join('nilai', 'siswa.id = nilai.id_siswa', 'left');
		$where = "siswa.id_rombel = $rombel AND (nilai.id_mengajar=$roma OR nilai.id_mengajar IS NULL)";
		$this->db->where($where);

		$siswa = $this->db->get_where('siswa')->result_array();


		return $siswa;
		
	}

	public function getNilai($id)
	{
		$nilai = $this->db->get_where('nilai', ['id' => $id])->row_array();

		return $nilai;
	}

	public function getAllNilaiSiswa($id)
	{
		$this->db->select('mapel.id as id_mapel, mapel.nama_mapel, nilai.*');
		$this->db->join('mengajar', 'mengajar.id = nilai.id_mengajar');
		$this->db->join('mapel', 'mapel.id = mengajar.id_mapel');
		$nilai = $this->db->get_where('nilai', ['id_siswa' => $id])->result_array();

		return $nilai;
	}

	public function getNilaiSiswa($id)
	{

		$nilai = $this->db->get_where('nilai', ['id' => $id])->row_array();

		return $nilai;
	}

	public function printNilai($id)
	{
		$this->db->select('siswa.nama, siswa.nis, nilai.*');
		$this->db->join('siswa', 'siswa.id = nilai.id_siswa', 'left');
		$siswa = $this->db->get_where('nilai', ['id_mengajar' => $id])->result_array();

		return $siswa;

	}

	public function printData($id)
	{
		$this->db->select('thn_ajar.thn_ajar, rombel.nama_rombel, mapel.nama_mapel, jurusan.nama_jurusan');
		$this->db->join('thn_ajar', 'thn_ajar.id = mengajar.id_thn_ajar');
		$this->db->join('rombel', 'rombel.id = mengajar.id_rombel');
		$this->db->join('mapel', 'mapel.id = mengajar.id_mapel');
		$this->db->join('jurusan', 'jurusan.id = rombel.id_jurusan');
		$data = $this->db->get_where('mengajar', ['mengajar.id' => $id])->row_array();
		
		return $data;

	}

	public function tambahNilai($r, $id)
	{
		$data = [
			'u_tulis1' => $this->input->post('u_tulis1'),
			'u_tulis2' => $this->input->post('u_tulis2'),
			'u_tulis3' => $this->input->post('u_tulis3'),
			'rata_tulis' => $this->input->post('rata_tulis'),
			'u_lisan1' => $this->input->post('u_lisan1'),
			'u_lisan2' => $this->input->post('u_lisan2'),
			'u_lisan3' => $this->input->post('u_lisan3'),
			'rata_lisan' => $this->input->post('rata_lisan'),
			'u_perbuatan1' => $this->input->post('u_perbuatan1'),
			'u_perbuatan2' => $this->input->post('u_perbuatan2'),
			'u_perbuatan3' => $this->input->post('u_perbuatan3'),
			'rata_perbuatan' => $this->input->post('rata_perbuatan'),
			'rata_ulhar' => $this->input->post('rata_ulhar'),
			'tugas1' => $this->input->post('tugas1'),
			'tugas2' => $this->input->post('tugas2'),
			'tugas3' => $this->input->post('tugas3'),
			'rata_tugas' => $this->input->post('rata_tugas'),
			'uts_t' => $this->input->post('uts_t'),
			'uts_p' => $this->input->post('uts_p'),
			'rata_uts' => $this->input->post('rata_uts'),
			'uas_t' => $this->input->post('uas_t'),
			'uas_p' => $this->input->post('uas_p'),
			'rata_uas' => $this->input->post('rata_uas'),
			'nilai_akhir' => $this->input->post('nilai_akhir'),
			'nilai_rapor' => $this->input->post('nilai_rapor'),
			'id_mengajar' => $r,
			'id_siswa' => $id
		];

		$this->db->insert('nilai', $data);
	}



	public function editNilai($id)
	{

		$u_tulis1 = !empty($this->input->post('u_tulis1', true)) ? $this->input->post('u_tulis1', true) : NULL;
		$u_tulis2 = !empty($this->input->post('u_tulis2', true)) ? $this->input->post('u_tulis2', true) : NULL;
		$u_tulis3 = !empty($this->input->post('u_tulis3', true)) ? $this->input->post('u_tulis3', true) : NULL;

		/*Rata- Rata Ulangan Tulis*/
		if ($u_tulis1 == NULL && $u_tulis2 != NULL && $u_tulis3 != NULL) {
			$rata_tulis = ($u_tulis2 + $u_tulis3)/ 2;
		} elseif ($u_tulis1 != NULL && $u_tulis2 == NULL && $u_tulis3 != NULL) {
			$rata_tulis = ($u_tulis1 + $u_tulis3)/ 2;
		} elseif ($u_tulis1 != NULL && $u_tulis2 != NULL && $u_tulis3 == NULL) {
			$rata_tulis = ($u_tulis1 + $u_tulis2)/ 2;
		} elseif ($u_tulis1 == NULL && $u_tulis2 == NULL) {
			$rata_tulis = $u_tulis3;
		} elseif ($u_tulis1 == NULL && $u_tulis3 == NULL) {
			$rata_tulis = $u_tulis2;
		} elseif ($u_tulis2 == NULL && $u_tulis3 == NULL) {
			$rata_tulis = $u_tulis1;
		} elseif ($u_tulis1 == NULL && $u_tulis2 == NULL && $u_tulis3 == NULL) {
			$rata_tulis = NULL;
		} else {
			$rata_tulis = ($u_tulis1 + $u_tulis2 + $u_tulis3)/ 3;
		}

		/*~Rata- Rata Ulangan Tulis~*/

		$u_lisan1 = !empty($this->input->post('u_lisan1', true)) ? $this->input->post('u_lisan1', true) : NULL;
		$u_lisan2 = !empty($this->input->post('u_lisan2', true)) ? $this->input->post('u_lisan2', true) : NULL;
		$u_lisan3 = !empty($this->input->post('u_lisan3', true)) ? $this->input->post('u_lisan3', true) : NULL;

		/*Rata- Rata Ulangan Lisan*/
		if ($u_lisan1 == NULL && $u_lisan2 != NULL && $u_lisan3 != NULL) {
			$rata_lisan = ($u_lisan2 + $u_lisan3)/ 2;
		} elseif ($u_lisan1 != NULL && $u_lisan2 == NULL && $u_lisan3 != NULL) {
			$rata_lisan = ($u_lisan1 + $u_lisan3)/ 2;
		} elseif ($u_lisan1 != NULL && $u_lisan2 != NULL && $u_lisan3 == NULL) {
			$rata_lisan = ($u_lisan1 + $u_lisan2)/ 2;
		} elseif ($u_lisan1 == NULL && $u_lisan2 == NULL) {
			$rata_lisan = $u_lisan3;
		} elseif ($u_lisan1 == NULL && $u_lisan3 == NULL) {
			$rata_lisan = $u_lisan2;
		} elseif ($u_lisan2 == NULL && $u_lisan3 == NULL) {
			$rata_lisan = $u_lisan1;
		} elseif ($u_lisan1 == NULL && $u_lisan2 == NULL && $u_lisan3 == NULL) {
			$rata_lisan = NULL;
		} else {
			$rata_lisan = ($u_lisan1 + $u_lisan2 + $u_lisan3)/ 3;
		}

		/*~Rata- Rata Ulangan Lisan~*/

		$u_perbuatan1 = !empty($this->input->post('u_perbuatan1', true)) ? $this->input->post('u_perbuatan1', true) : NULL;
		$u_perbuatan2 = !empty($this->input->post('u_perbuatan2', true)) ? $this->input->post('u_perbuatan2', true) : NULL;
		$u_perbuatan3 = !empty($this->input->post('u_perbuatan3', true)) ? $this->input->post('u_perbuatan3', true) : NULL;

		/*Rata- Rata Ulangan Perbuatan*/
		if ($u_perbuatan1 == NULL && $u_perbuatan2 != NULL && $u_perbuatan3 != NULL) {
			$rata_perbuatan = ($u_perbuatan2 + $u_perbuatan3)/ 2;
		} elseif ($u_perbuatan1 != NULL && $u_perbuatan2 == NULL && $u_perbuatan3 != NULL) {
			$rata_perbuatan = ($u_perbuatan1 + $u_perbuatan3)/ 2;
		} elseif ($u_perbuatan1 != NULL && $u_perbuatan2 != NULL && $u_perbuatan3 == NULL) {
			$rata_perbuatan = ($u_perbuatan1 + $u_perbuatan2)/ 2;
		} elseif ($u_perbuatan1 == NULL && $u_perbuatan2 == NULL) {
			$rata_perbuatan = $u_perbuatan3;
		} elseif ($u_perbuatan1 == NULL && $u_perbuatan3 == NULL) {
			$rata_perbuatan = $u_perbuatan2;
		} elseif ($u_perbuatan2 == NULL && $u_perbuatan3 == NULL) {
			$rata_perbuatan = $u_perbuatan1;
		} elseif ($u_perbuatan1 == NULL && $u_perbuatan2 == NULL && $u_perbuatan3 == NULL) {
			$rata_perbuatan = NULL;
		} else {
			$rata_perbuatan = ($u_perbuatan1 + $u_perbuatan2 + $u_perbuatan3)/ 3;
		}

		/*~Rata- Rata Ulangan Perbuatan~*/

		/*Rata- Rata Ulangan Harian*/
		$rata_ulhar = ($rata_lisan + $rata_tulis + $rata_perbuatan)/ 3;

		$tugas1 = !empty($this->input->post('tugas1', true)) ? $this->input->post('tugas1', true) : NULL;
		$tugas2 = !empty($this->input->post('tugas2', true)) ? $this->input->post('tugas2', true) : NULL;
		$tugas3 = !empty($this->input->post('tugas3', true)) ? $this->input->post('tugas3', true) : NULL;

		/*Rata- Rata Tugas*/
		if ($tugas1 == NULL && $tugas2 != NULL && $tugas3 != NULL) {
			$rata_tugas = ($tugas2 + $tugas3)/ 2;
		} elseif ($tugas1 != NULL && $tugas2 == NULL && $tugas3 != NULL) {
			$rata_tugas = ($tugas1 + $tugas3)/ 2;
		} elseif ($tugas1 != NULL && $tugas2 != NULL && $tugas3 == NULL) {
			$rata_tugas = ($tugas1 + $tugas2)/ 2;
		} elseif ($tugas1 == NULL && $tugas2 == NULL) {
			$rata_tugas = $tugas3;
		} elseif ($tugas1 == NULL && $tugas3 == NULL) {
			$rata_tugas = $tugas2;
		} elseif ($tugas2 == NULL && $tugas3 == NULL) {
			$rata_tugas = $tugas1;
		} elseif ($tugas1 == NULL && $tugas2 == NULL && $tugas3 == NULL) {
			$rata_tugas = NULL;
		} else {
			$rata_tugas = ($tugas1 + $tugas2 + $tugas3)/ 3;
		}

		/*~Rata- Rata Tugas~*/

		$uts_t = !empty($this->input->post('uts_t', true)) ? $this->input->post('uts_t', true) : NULL;
		$uts_p = !empty($this->input->post('uts_p', true)) ? $this->input->post('uts_p', true) : NULL;

		/*Rata- Rata UTS*/
		if ($uts_t == NULL && $uts_p != NULL) {
			$rata_uts = $uts_p;
		} elseif ($uts_t != NULL && $uts_p == NULL) {
			$rata_uts = $uts_t;
		} elseif ($uts_t == NULL && $uts_p == NULL) {
			$rata_uts = NULL;
		} else {
			$rata_uts = ($uts_t + $uts_p)/ 2;
		}

		/*~Rata- Rata UTS~*/

		$uas_t = !empty($this->input->post('uas_t', true)) ? $this->input->post('uas_t', true) : NULL;
		$uas_p = !empty($this->input->post('uas_p', true)) ? $this->input->post('uas_p', true) : NULL;

		/*Rata- Rata UAS*/
		if ($uas_t == NULL && $uas_p != NULL) {
			$rata_uas = $uas_p;
		} elseif ($uas_t != NULL && $uas_p == NULL) {
			$rata_uas = $uas_t;
		} elseif ($uas_t == NULL && $uas_p == NULL) {
			$rata_uas = NULL;
		} else {
			$rata_uas = ($uas_t + $uas_p)/ 2;
		}

		/*~Rata- Rata UAS~*/

		$nilai_akhir = ($rata_ulhar + $rata_tugas + $rata_uts + ($rata_uas*2))/ 5;
		$nilai_rapor = round($nilai_akhir, 0, PHP_ROUND_HALF_UP);


		$data = [
			'u_tulis1' => $u_tulis1,
			'u_tulis2' => $u_tulis2,
			'u_tulis3' => $u_tulis3,
			'rata_tulis' => $rata_tulis,
			'u_lisan1' => $u_lisan1,
			'u_lisan2' => $u_lisan2,
			'u_lisan3' => $u_lisan3,
			'rata_lisan' => $rata_lisan,
			'u_perbuatan1' => $u_perbuatan1,
			'u_perbuatan2' => $u_perbuatan2,
			'u_perbuatan3' => $u_perbuatan3,
			'rata_perbuatan' => $rata_perbuatan,
			'rata_ulhar' => $rata_ulhar,
			'tugas1' => $tugas1,
			'tugas2' => $tugas2,
			'tugas3' => $tugas3,
			'rata_tugas' => $rata_tugas,
			'uts_t' => $uts_t,
			'uts_p' => $uts_p,
			'rata_uts' => $rata_uts,
			'uas_t' => $uas_t,
			'uas_p' => $uas_p,
			'rata_uas' => $rata_uas,
			'nilai_akhir' => $nilai_akhir,
			'nilai_rapor' => $nilai_rapor
		];

		$this->db->update('nilai', $data, ['id' => $id]);

	}

}