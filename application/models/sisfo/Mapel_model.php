<?php 

/**
 * 
 */
class Mapel_model extends CI_Model
{
	
	public function getAllMapel()
	{
		return $this->db->get('mapel')->result_array();
	}

	public function getMapel($id)
	{
		return $this->db->get_where('mapel', ['id' => $id])->row_array();
	}

	public function tambahDataMapel()
	{
		$data = [
			'nama_mapel' => $this->input->post('nama_mapel', true),
		];

		$this->db->insert('mapel', $data);
	}

	public function ubahDataMapel($id)
	{
		$data = [
			'nama_mapel' => $this->input->post('nama_mapel', true),
		];

		$this->db->update('mapel', $data, ['id' => $id]);
	}

	public function hapusDataMapel($id)
	{
		$this->db->delete('mapel', ['id' => $id]);
	}
}