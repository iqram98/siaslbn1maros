<?php 

/**
 * 
 */
class Admin_model extends CI_Model
{
	
	public function getAllUser()
	{
		return $this->db->get('user')->result_array();
	}

	public function getUser($id)
	{
		return $this->db->get_where('user', ['id' => $id])->row_array();
	}

	public function tambahDataUser()
	{
		$data = [
			'username' => $this->input->post('username', true),
			'email' => $this->input->post('email', true),
			'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
			'id_role' => $this->input->post('level', true)
		];

		$this->db->insert('user', $data);
	}

	public function hapusDataUser($id)
	{

		$role = $this->db->get_where('user', ['id' => $id])->row_array()['id_role'];
		switch ($role) {
			case '3':
				$this->db->delete('guru', ['id_user' => $id]);
				break;
			case '4':
				$this->db->delete('siswa', ['id_user' => $id]);
				break;
		}
		$this->db->delete('user', ['id' => $id]);

	}
}