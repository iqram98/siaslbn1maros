<?php 

/**
 * 
 */
class Auth_model extends CI_Model
{
	public function login()
	{
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);

		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		if ($user) {
			if (password_verify($password, $user['password'])) {
				if ($user['id_role'] == 1 || $user['id_role'] == 2) {
					$data = [
					'username' => $user['username'],
					'level' => $user['id_role']
				];

				$this->session->set_userdata($data);
				redirect('dashboard');
				} elseif ($user['id_role'] == 3) {
					$guru = $this->db->get_where('guru', ['id_user' => $user['id']])->row_array();

					$data = [
					'username' => $guru['nama'],
					'names' => $guru['nip'],
					'level' => $user['id_role']
				];

				$this->session->set_userdata($data);
				redirect('dashboard');
				} elseif ($user['id_role'] == 4) {
					$siswa = $this->db->get_where('siswa', ['id_user' => $user['id']])->row_array();

					$data = [
					'username' => $siswa['nama'],
					'names' => $siswa['nis'],
					'level' => $user['id_role']
				];
				

				$this->session->set_userdata($data);
				redirect('dashboard');
				}
			} else {
				$this->session->set_flashdata('flash', 'Password salah!');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('flash', 'Username belum terdaftar!');
			redirect('auth');
		}
	}
}