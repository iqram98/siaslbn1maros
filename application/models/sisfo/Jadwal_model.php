<?php 

/**
 * 
 */
class Jadwal_model extends CI_Model
{
	
	public function getAllJadwal()
	{
		$this->db->select('jadwal.*, mapel.nama_mapel, guru.nama, rombel.nama_rombel, ruangan.nama_ruangan, thn_ajar.thn_ajar');
		$this->db->from('jadwal');
		$this->db->join('mengajar', 'mengajar.id = jadwal.id_mengajar');
		$this->db->join('ruangan', 'ruangan.id = jadwal.id_ruangan');
		$this->db->join('thn_ajar', 'thn_ajar.id = jadwal.id_thn_ajar');
		$this->db->join('guru', 'guru.id = mengajar.id_guru');
		$this->db->join('mapel', 'mapel.id = mengajar.id_mapel');
		$this->db->join('rombel', 'rombel.id = mengajar.id_rombel');
		return $this->db->get()->result_array();
	}

	public function getAllJadwalGuru($id)
	{
		$this->db->select('jadwal.*, mapel.nama_mapel, rombel.nama_rombel, ruangan.nama_ruangan, thn_ajar.thn_ajar, guru.id as id_guru');
		$this->db->from('jadwal');
		$this->db->join('mengajar', 'mengajar.id = jadwal.id_mengajar');
		$this->db->join('ruangan', 'ruangan.id = jadwal.id_ruangan');
		$this->db->join('thn_ajar', 'thn_ajar.id = jadwal.id_thn_ajar');
		$this->db->join('guru', 'guru.id = mengajar.id_guru');
		$this->db->join('mapel', 'mapel.id = mengajar.id_mapel');
		$this->db->join('rombel', 'rombel.id = mengajar.id_rombel');
		$this->db->where('id_guru', $id);
		return $this->db->get()->result_array();
	}

	public function getAllJadwalSiswa($id)
	{
		$this->db->select('jadwal.*, mapel.nama_mapel, guru.nama, ruangan.nama_ruangan, thn_ajar.thn_ajar, rombel.id as id_rombel');
		$this->db->from('jadwal');
		$this->db->join('mengajar', 'mengajar.id = jadwal.id_mengajar');
		$this->db->join('ruangan', 'ruangan.id = jadwal.id_ruangan');
		$this->db->join('thn_ajar', 'thn_ajar.id = jadwal.id_thn_ajar');
		$this->db->join('guru', 'guru.id = mengajar.id_guru');
		$this->db->join('mapel', 'mapel.id = mengajar.id_mapel');
		$this->db->join('rombel', 'rombel.id = mengajar.id_rombel');
		$this->db->where('id_rombel', $id);
		return $this->db->get()->result_array();
	}

	public function getJadwal($id)
	{
		return $this->db->get_where('jadwal', ['id' => $id])->row_array();
	}

	public function tambahDataJadwal()
	{
		$jam = $this->input->post('jam_mulai', true).' - '.$this->input->post('jam_akhir', true);

		$data = [
			'hari' => $this->input->post('hari', true),
			'jam' => $this->input->post('jam', true),
			'jam' => $jam,
			'id_mengajar' => $this->input->post('id_mengajar', true),
			'id_ruangan' => $this->input->post('id_ruangan', true),
			'id_thn_ajar' => $this->input->post('id_thn_ajar', true)
		];

		$this->db->insert('jadwal', $data);
	}

	public function ubahDataJadwal($id)
	{
		$jam = $this->input->post('jam_mulai', true).' - '.$this->input->post('jam_akhir', true);

		$data = [
			'hari' => $this->input->post('hari', true),
			'jam' => $jam,
			'id_mengajar' => $this->input->post('id_mengajar', true),
			'id_ruangan' => $this->input->post('id_ruangan', true),
			'id_thn_ajar' => $this->input->post('id_thn_ajar', true)
		];

		$this->db->update('jadwal', $data, ['id' => $id]);
	}

	public function hapusDataJadwal($id)
	{
		$this->db->delete('jadwal', ['id' => $id]);
	}
}