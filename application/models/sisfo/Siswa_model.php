<?php 

/**
 * 
 */
class Siswa_model extends CI_Model
{
	
	public function getAllSiswa()
	{
		$this->db->select('siswa.*, rombel.nama_rombel, user.image');
		$this->db->from('siswa');
		$this->db->join('rombel', 'rombel.id = siswa.id_rombel');
		$this->db->join('user', 'user.id = siswa.id_user');
		return $this->db->get()->result_array();
	}

	public function getSiswa($id)
	{	
		$this->db->select('siswa.*, rombel.nama_rombel, user.image');
		$this->db->join('rombel', 'rombel.id = siswa.id_rombel');
		$this->db->join('user', 'user.id = siswa.id_user');
		return $this->db->get_where('siswa', ['siswa.id' => $id])->row_array();
	}

	public function tambahDataSiswa()
	{
		$this->db->select('id');
		$this->db->order_by('id', 'DESC');
		$this->db->limit('1');
		$lastId = $this->db->get('user')->row_array()['id'];
		$id = $lastId + 1;
		$nis = $this->db->get_where('siswa', ['nis' => $this->input->post('nis', true)])->row_array();

		$ttlBaru = date("d-m-Y", strtotime($this->input->post('tgl_lahir', true)));
		$ttl = $this->input->post('tmpt_lahir', true).' '.$ttlBaru;

		if ($nis) {
			$this->session->set_flashdata('flash', 'NIS sudah terdaftar');
			redirect('siswa/ubah/'.$id);
		} else {
			$data = [
				'nama' => $this->input->post('nama', true),
				'nis' => $this->input->post('nis', true),
				'jk' => $this->input->post('jk', true),
				'ttl' => $ttl,
				'id_rombel' => $this->input->post('id_rombel', true)
			];

			$data1 = [
				'id' => $id,
				'username' => $this->input->post('nis', true),
				'image' => 'default.jpg',
				'password' => password_hash('siswaslbn1', PASSWORD_DEFAULT),
				'id_role' => '4'
			]; 

			$this->db->insert('user', $data1);
			$this->db->insert('siswa', $data);
		}
	}

	public function ubahDataSiswa($id)
	{
		$userId = $this->db->get_where('siswa', ['id' => $id])->row_array()['id_user'];
		$ttlBaru = date("d-m-Y", strtotime($this->input->post('tgl_lahir', true)));
		$ttl = $this->input->post('tmpt_lahir', true).' '.$ttlBaru;
		$nis = $this->db->get_where('guru', ['nis' => $this->input->post('nis', true)])->row_array();

		if ($nis) {
			$this->session->set_flashdata('flash', 'NIS sudah terdaftar');
			redirect('siswa/ubah/'.$id);
		} else {
			$data = [
				'nama' => $this->input->post('nama', true),
				'nis' => $this->input->post('nis', true),
				'jk' => $this->input->post('jk', true),
				'ttl' => $ttl,
				'id_rombel' => $this->input->post('id_rombel', true)
			];
			$data1 = [
				'username' => $this->input->post('nip', true)
			]; 

			$this->db->update('guru', $data, ['id' => $id]);
			$this->db->update('siswa', $data, ['id' => $id]);
		}
	}

	public function hapusDataSiswa($id)
	{
		$idUser = $this->db->get_where('siswa', ['id' => $id])->row_array()['id_user'];

		$this->db->delete('siswa', ['id' => $id]);
		$this->db->delete('user', ['id' => $idUser]);
	}
}