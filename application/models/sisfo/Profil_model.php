<?php 
	
/**
 * 
 */
class Profil_model extends CI_Model
{
	
	public function ubahDataGuru($id)
	{
		$ttlBaru = date("d-m-Y", strtotime($this->input->post('tgl_lahir', true)));
		$ttl = $this->input->post('tmpt_lahir', true).' '.$ttlBaru;
		$nip = $this->db->get_where('guru', ['nip' => $this->input->post('nip', true)])->row_array();
		if ($nip) {
			$this->session->set_flashdata('flash', 'NIP sudah terdaftar');
			redirect('profil/ubahguru/');
		} else {
			$data = [
			'nama' => $this->input->post('nama', true),
			'nip' => $this->input->post('nip', true),
			'jk' => $this->input->post('jk', true),
			'ttl' => $ttl,
			'pendidikan' => $this->input->post('pendidikan', true),
			'pangkat' => $this->input->post('pangkat', true),
			'jabatan' => $this->input->post('jabatan', true),
			'tmt' => $this->input->post('tmt', true)
		];

		$this->db->update('guru', $data, ['id' => $id]);
		}
	}

	public function ubahDataSiswa($id)
	{
		$ttlBaru = date("d-m-Y", strtotime($this->input->post('tgl_lahir', true)));
		$ttl = $this->input->post('tmpt_lahir', true).' '.$ttlBaru;
		$this->db->where('nis', $this->input->post('nis', true));
		$this->db->where('id !=', $id);
		$nis = $this->db->get('siswa')->row_array();

		if ($nis) {
			$this->session->set_flashdata('flash', 'NIS sudah terdaftar');
			redirect('profil/ubahsiswa/');
		} else {
			$data = [
				'nama' => $this->input->post('nama', true),
				'nis' => $this->input->post('nis', true),
				'jk' => $this->input->post('jk', true),
				'ttl' => $ttl
			];

			$this->db->update('siswa', $data, ['id' => $id]);
		}
	}

	public function ubahDataAdmin($id)
	{
		$this->db->where('username', $this->input->post('username', true));
		$this->db->where('id !=', $id);
		$nis = $this->db->get('user')->row_array();

		if ($nis) {
			$this->session->set_flashdata('flash', 'Username sudah terdaftar');
			redirect('profil/ubahadmin/');
		} else {
			$data = [
				'username' => $this->input->post('username', true),
				'email' => $this->input->post('email', true)
			];

			$this->db->update('user', $data, ['id' => $id]);
		}

	}

	public function ubahuser($id)
	{
		$user = $this->db->get_where('user', ['id' => $id])->row_array();

		if (password_verify($this->input->post('passwordlama'), $user['password'])) {
			if ($this->input->post('passwordbaru') == $this->input->post('passwordbaru1')) {
				$data = [
					'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT)
				];

				$this->db->update('user', $data, ['id' => $id]);
			} else {
				$this->session->set_flashdata('flash', 'Konfirmasi password tidak sesuai');
				redirect('profil/user');
			}
		} else {
			$this->session->set_flashdata('flash', 'Password lama salah');
			redirect('profil/user');
		}
	}

	public function ubahfoto($id, $old_image)
	{
		$upload_image = $_FILES['image']['name'];

		if ($upload_image) {
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_sizes'] 		= '2048';
			$config['upload_path'] 		= './assets/img/';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('image')) {
				if ($old_image != 'default1.jpg') {
					unlink(FCPATH . 'assets/img/'.$old_image);
				}
				$new_image = $this->upload->data('file_name');

				$this->db->set('image', $new_image);
				$this->db->where('id', $id);
				$this->db->update('user');
			} else {
				echo $this->upload->display_errors();
			}
		}
	}

}
