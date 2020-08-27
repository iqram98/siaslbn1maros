<?php 

/**
 * 
 */
class Ruangan_model extends CI_Model
{
	
	public function getAllRuangan()
	{
		return $this->db->get('ruangan')->result_array();
	}

	public function getRuangan($id)
	{
		return $this->db->get_where('ruangan', ['id' => $id])->row_array();
	}

	public function tambahDataRuangan()
	{
		$data = [
			'nama_ruangan' => $this->input->post('nama_ruangan', true),
		];

		$this->db->insert('ruangan', $data);
	}

	public function ubahDataRuangan($id)
	{
		$data = [
			'nama_ruangan' => $this->input->post('nama_ruangan', true),
		];

		$this->db->update('ruangan', $data, ['id' => $id]);
	}

	public function hapusDataRuangan($id)
	{
		$this->db->delete('ruangan', ['id' => $id]);
	}
}