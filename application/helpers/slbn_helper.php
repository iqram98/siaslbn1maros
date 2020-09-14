<?php

function navMenu()
{
	$ci = get_instance();

	$roleId = $ci->session->userdata('level');
    $ci->db->select('menu.*');
                  
	$ci->db->join('user_access_menu', 'menu.id = user_access_menu.id_menu');
	$ci->db->order_by('urut', 'ASC');
	$menu = $ci->db->get_where('menu', ['user_access_menu.id_role' => $roleId])->result_array();

	return $menu;
}

function logged_in()
{
	$ci = get_instance();

	if (!$ci->session->userdata('username')) {
		$ci->session->set_flashdata('flash', 'Anda belum login!');
		redirect('auth');
	} else {
		$roleId = $ci->session->userdata('level');
		$url = $ci->uri->segment(1);

		$menuId = $ci->db->get_where('menu', ['url' => $url])->row_array()['id'];
		
		$userAccess = $ci->db->get_where('user_access_menu', [
			'id_role' => $roleId,
			'id_menu' => $menuId
		]);

		if ($userAccess->num_rows() < 1) {
			redirect('dashboard');
		}
	}
}

function user()
{
	$ci = get_instance();

	if($ci->session->userdata('level') == 1 || $ci->session->userdata('level') == 2){
		$ci->db->select('username, email, password, image, id_role, id as id_user');
		return $ci->db->get_where('user', ['username' => $ci->session->userdata('username')])->row_array();

	} elseif ($ci->session->userdata('level') == 3) {
		$ci->db->select('guru.*, user.email, user.password, user.image, user.id_role,');
		$ci->db->join('guru', 'guru.id_user = user.id');
		return $ci->db->get_where('user', ['username' => $ci->session->userdata('names')])->row_array();
	} else {
		$ci->db->select('siswa.*, user.email, user.password, user.image, user.id_role,');
		$ci->db->join('siswa', 'siswa.id_user = user.id');
		return $ci->db->get_where('user', ['username' => $ci->session->userdata('names')])->row_array();
	}

}