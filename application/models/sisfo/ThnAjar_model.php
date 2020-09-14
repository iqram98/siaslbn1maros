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
		return $this->db->get_where('thn_ajar', ['id' => $id])->row_array()['thn_ajar'];
	}

	public function tambahDataThnAjar()
	{
		$thnAjar = $this->input->post('semester', true) . ' ' . $this->input->post('thn_ajar', true);
		$data = [
			'thn_ajar' => $thnAjar,
		];

		$this->db->insert('thn_ajar', $data);
	}

	public function ubahDataThnAjar($id)
	{
		$thnAjar = $this->input->post('semester', true) . ' ' . $this->input->post('thn_ajar', true);
		$data = [
			'thn_ajar' => $thnAjar,
		];

		$this->db->update('thn_ajar', $data, ['id' => $id]);
	}

	public function hapusDataAjar($id)
	{
		$this->db->delete('thn_ajar', ['id' => $id]);
	}
}