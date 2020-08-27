<?php
/**
 * 
 */
class Asesmen_model extends CI_Model
{

	public function getSiswa($id)
	{	
		$rombel = $this->db->get_where('mengajar', ['id' => $id])->row_array()['id_rombel'];
	
		$this->db->select('id, nama, nis');
		$siswa = $this->db->get_where('siswa', ['id_rombel' => $rombel])->result_array();

		return $siswa;	
	}

	public function getNilai($id)
	{
		$nilai = $this->db->get_where('nilai', ['id' => $id])->row_array();

		return $nilai;
	}

	public function getNamaSiswa($id)
	{
		$siswa = $this->db->get_where('siswa', ['id' => $id])->row_array()['nama'];

		return $siswa;
	}

	public function getAllAsesmen($id_mengajar, $id_siswa)
	{
		return $this->db->get_where('asesmen', [
					'id_mengajar' => $id_mengajar, 
					'id_siswa' => $id_siswa 
				])->result_array();
	}

	public function getAsesmen($id)
	{
		return $this->db->get_where('asesmen', ['id' => $id])->row_array();
	}

	public function tambahAsesmen($id_mengajar, $id_siswa)
	{
		$data = [
			'aspek' => $this->input->post('aspek', true),
			'deskripsi' => $this->input->post('deskripsi', true),
			'id_mengajar' => $id_mengajar,
			'id_siswa' => $id_siswa
		];

		$this->db->insert('asesmen', $data);
	}

	public function ubahAsesmen($id)
	{
		$data = [
			'aspek' => $this->input->post('aspek', true),
			'deskripsi' => $this->input->post('deskripsi', true)
		];

		$this->db->update('asesmen', $data, ['id' => $id]);
	}

	public function hapusDataAsesmen($id)
	{
		$this->db->delete('asesmen', ['id' => $id]);
	}
}