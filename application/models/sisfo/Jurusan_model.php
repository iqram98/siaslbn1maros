<?php 

/**
 * 
 */
class Jurusan_model extends CI_Model
{
	
	public function getAllJurusan()
	{
		return $this->db->get('jurusan')->result_array();
	}

	public function getJurusan($id)
	{
		return $this->db->get_where('jurusan', ['id' => $id])->row_array();
	}

	public function tambahDataJurusan()
	{
		$data = [
			'nama_jurusan' => $this->input->post('nama_jurusan', true),
		];

		$this->db->insert('jurusan', $data);
	}

	public function ubahDataJurusan($id)
	{
		$data = [
			'nama_jurusan' => $this->input->post('nama_jurusan', true),
		];

		$this->db->update('jurusan', $data, ['id' => $id]);
	}

	public function hapusDataJurusan($id)
	{
		$this->db->delete('jurusan', ['id' => $id]);
	}
}