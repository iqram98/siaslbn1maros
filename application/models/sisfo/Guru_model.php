<?php 

/**
 * 
 */
class Guru_model extends CI_Model
{
	
	public function getAllGuru()
	{
		$this->db->select('guru.*, user.image');
		$this->db->join('user', 'guru.id_user = user.id');
		return $this->db->get('guru')->result_array();
	}

	public function getGuru($id)
	{	
		$this->db->select('guru.*, user.image');
		$this->db->join('user', 'user.id = guru.id_user');
		return $this->db->get_where('guru', ['guru.id' => $id])->row_array();
	}

	public function tambahDataGuru()
	{
		$this->db->select('id');
		$this->db->order_by('id', 'DESC');
		$this->db->limit('1');
		$lastId = $this->db->get('user')->row_array()['id'];
		$id = $lastId + 1;

		$ttlBaru = date("d-m-Y", strtotime($this->input->post('tgl_lahir', true)));
		$ttl = $this->input->post('tmpt_lahir', true).' '.$ttlBaru;

		$data = [
			'nama' => $this->input->post('nama', true),
			'nip' => $this->input->post('nip', true),
			'jk' => $this->input->post('jk', true),
			'ttl' => $ttl,
			'pendidikan' => $this->input->post('pendidikan', true),
			'pangkat' => $this->input->post('pangkat', true),
			'jabatan' => $this->input->post('jabatan', true),
			'tmt' => $this->input->post('tmt', true),
			'no_hp' => $this->input->post('no_hp', true),
			'id_user' => $id
		];

		$data1 = [
			'id' => $id,
			'username' => $this->input->post('nip', true),
			'image' => 'default.jpg',
			'password' => password_hash('guruslbn1', PASSWORD_DEFAULT),
			'id_role' => '3'
		]; 

		$this->db->insert('user', $data1);
		$this->db->insert('guru', $data);
	}

	public function ubahDataGuru($id)
	{
		$userId = $this->db->get_where('guru', ['id' => $id])->row_array()['id_user'];
		$ttlBaru = date("d-m-Y", strtotime($this->input->post('tgl_lahir', true)));
		$ttl = $this->input->post('tmpt_lahir', true).' '.$ttlBaru;
		$nip = $this->db->get_where('guru', ['nip' => $this->input->post('nip', true)])->row_array();

		if ($nip) {
			$this->session->set_flashdata('flash', 'NIP sudah terdaftar');
			redirect('guru/ubah/'.$id);
		} else {
			$data = [
				'nama' => $this->input->post('nama', true),
				'nip' => $this->input->post('nip', true),
				'jk' => $this->input->post('jk', true),
				'ttl' => $ttl,
				'pendidikan' => $this->input->post('pendidikan', true),
				'pangkat' => $this->input->post('pangkat', true),
				'jabatan' => $this->input->post('jabatan', true),
				'tmt' => $this->input->post('tmt', true),
				'no_hp' => $this->input->post('no_hp', true)
			];

			$data1 = [
				'username' => $this->input->post('nip', true)
			]; 

			$this->db->update('guru', $data, ['id' => $id]);
			$this->db->insert('user', $data1, ['id' => $userId]);

		}
	}

	public function hapusDataGuru($id)
	{
		$idUser = $this->db->get_where('guru', ['id' => $id])->row_array()['id_user'];

		$this->db->delete('guru', ['id' => $id]);
		$this->db->delete('user', ['id' => $idUser]);
	}
}