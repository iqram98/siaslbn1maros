<?php 

/**
 * 
 */
class Rombel_model extends CI_Model
{
	
	public function getAllRombel()
	{
		$this->db->select('rombel.id, rombel.nama_rombel, jurusan.nama_jurusan');
		$this->db->from('rombel');
		$this->db->join('jurusan', 'jurusan.id = rombel.id_jurusan');
		return $this->db->get()->result_array();
	}

	public function getRombel($id)
	{
		return $this->db->get_where('rombel', ['id' => $id])->row_array();
	}

	public function tambahDataRombel()
	{
		$data = [
			'nama_rombel' => $this->input->post('nama_rombel', true),
			'id_jurusan' => $this->input->post('id_jurusan', true),
		];

		$this->db->insert('rombel', $data);
	}

	public function ubahDataRombel($id)
	{
		$data = [
			'nama_rombel' => $this->input->post('nama_rombel', true),
			'id_jurusan' => $this->input->post('id_jurusan', true),	
		];

		$this->db->update('rombel', $data, ['id' => $id]);
	}

	public function hapusDataRombel($id)
	{
		$this->db->delete('rombel', ['id' => $id]);
	}
}