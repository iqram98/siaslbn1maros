<?php 

/**
 * 
 */
class ThnAjar_model extends CI_Model
{
	
	public function getAllThnAjar()
	{
		return $this->db->get('thn_ajar')->result_array();
	}

	public function getThnAjar($id)
	{
		return $this->db->get_where('thn_ajar', ['id' => $id])->row_array();
	}

	public function tambahDataThnAjar()
	{
		$data = [
			'thn_ajar' => $this->input->post('thn_ajar', true),
		];

		$this->db->insert('thn_ajar', $data);
	}

	public function ubahDataThnAjar($id)
	{
		$data = [
			'thn_ajar' => $this->input->post('thn_ajar', true),
		];

		$this->db->update('thn_ajar', $data, ['id' => $id]);
	}

	public function hapusDataAjar($id)
	{
		$this->db->delete('thn_ajar', ['id' => $id]);
	}
}