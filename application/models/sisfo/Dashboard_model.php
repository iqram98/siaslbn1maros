<?php 

/**
 * 
 */
class Dashboard_model extends CI_Model
{
	
	public function jumlahSiswa()
	{
		$jumlahSiswa = $this->db->get('siswa')->num_rows();

		return $jumlahSiswa;
	}

	public function jumlahGuru()
	{
		$jumlahGuru = $this->db->get('guru')->num_rows();

		return $jumlahGuru;
	}

	public function statistik()
	{
		$this->db->select('siswa.id as id_siswa, rombel.id, jurusan.nama_jurusan');
		$this->db->from('siswa');
		$this->db->join('rombel', 'rombel.id = siswa.id_rombel');
		$this->db->join('jurusan', 'jurusan.id = rombel.id_jurusan');
		$this->db->like('nama_jurusan', 'tunanetra');
		$tunanetra = $this->db->get('')->num_rows();

		$this->db->select('siswa.id as id_siswa, rombel.id, jurusan.nama_jurusan');
		$this->db->from('siswa');
		$this->db->join('rombel', 'rombel.id = siswa.id_rombel');
		$this->db->join('jurusan', 'jurusan.id = rombel.id_jurusan');
		$this->db->like('nama_jurusan', 'tunarungu');
		$tunarungu = $this->db->get('')->num_rows();

		$this->db->select('siswa.id as id_siswa, rombel.id, jurusan.nama_jurusan');
		$this->db->from('siswa');
		$this->db->join('rombel', 'rombel.id = siswa.id_rombel');
		$this->db->join('jurusan', 'jurusan.id = rombel.id_jurusan');
		$this->db->like('nama_jurusan', 'tunagrahita');
		$tunagrahita = $this->db->get('')->num_rows();

		$this->db->select('siswa.id as id_siswa, rombel.id, jurusan.nama_jurusan');
		$this->db->from('siswa');
		$this->db->join('rombel', 'rombel.id = siswa.id_rombel');
		$this->db->join('jurusan', 'jurusan.id = rombel.id_jurusan');
		$this->db->like('nama_jurusan', 'tunadaksa');
		$tunadaksa = $this->db->get('')->num_rows();

		$this->db->select('siswa.id as id_siswa, rombel.id, jurusan.nama_jurusan');
		$this->db->from('siswa');
		$this->db->join('rombel', 'rombel.id = siswa.id_rombel');
		$this->db->join('jurusan', 'jurusan.id = rombel.id_jurusan');
		$this->db->like('nama_jurusan', 'autis');
		$autis = $this->db->get('')->num_rows();

		$dataJurusan = $tunanetra . "," . $tunarungu . "," . $tunagrahita . "," . $tunadaksa . "," . $autis;

		return $dataJurusan;
	}
}
