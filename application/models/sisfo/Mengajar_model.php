<?php 

/**
 * 
 */
class Mengajar_model extends CI_Model
{
	public function getRombelMapel($id)
	{
		$mengajar = $this->db->get_where('mengajar', ['id_guru' => $id])->result_array();
		$rombelMapel = [];
		$rombel = [];
		$mapel = [];
		$i = 0;
		foreach ($mengajar as $ngajar) {
			$rombel[] = $this->db->get_where('rombel', ['id' => $ngajar['id_rombel']])->row_array()['nama_rombel'];
			$mapel[] = $this->db->get_where('mapel', ['id' => $ngajar['id_mapel']])->row_array()['nama_mapel'];

			$rombelMapel[$i]['id'] = $ngajar['id'];
			$rombelMapel[$i]['roma'] = $rombel[$i] . ' - ' . $mapel[$i];
			$i++;
		}

		return $rombelMapel;
	}

	public function getMapel($id)
	{
		$mengajar = $this->db->get_where('mengajar', ['id_rombel' => $id])->result_array();
		$rombelMapel =[];
		$mapel = [];
		$i = 0;
		foreach ($mengajar as $ngajar) {
			$mapel[] = $this->db->get_where('mapel', ['id' => $ngajar['id_mapel']])->row_array()['nama_mapel'];

			$rombelMapel[$i]['id'] = $ngajar['id'];
			$rombelMapel[$i]['roma'] = $mapel[$i];
			$i++;
		}

		return $rombelMapel;
	}

	public function getRombelMapelSatu($id)
	{
		$mengajar = $this->db->get_where('mengajar', ['id' => $id])->result_array();

		foreach ($mengajar as $ngajar) {
			$rombel = $this->db->get_where('rombel', ['id' => $ngajar['id_rombel']])->row_array()['nama_rombel'];
			$mapel = $this->db->get_where('mapel', ['id' => $ngajar['id_mapel']])->row_array()['nama_mapel'];

			$rombelMapel = $rombel . ' - ' . $mapel;
		}

		return $rombelMapel;
	}
	
	public function getAllMengajar()
	{
		$this->db->select('mengajar.id, guru.nama, mapel.nama_mapel, rombel.nama_rombel, thn_ajar.thn_ajar');
		$this->db->from('mengajar');
		$this->db->join('guru', 'guru.id = mengajar.id_guru');
		$this->db->join('mapel', 'mapel.id = mengajar.id_mapel');
		$this->db->join('rombel', 'rombel.id = mengajar.id_rombel');
		$this->db->join('thn_ajar', 'thn_ajar.id = mengajar.id_thn_ajar');

		return $this->db->get()->result_array();
	}

	public function getMengajar($id)
	{
		return $this->db->get_where('mengajar', ['id' => $id])->row_array();
	}

	public function getAllRombelMapel()
	{
		$mengajar = $this->db->get('mengajar')->result_array();
		$rombelMapel = [];
		$rombel = [];
		$mapel = [];
		$i = 0;
		foreach ($mengajar as $ngajar) {
			$rombel[] = $this->db->get_where('rombel', ['id' => $ngajar['id_rombel']])->row_array()['nama_rombel'];
			$mapel[] = $this->db->get_where('mapel', ['id' => $ngajar['id_mapel']])->row_array()['nama_mapel'];

			$rombelMapel[$i]['id'] = $ngajar['id'];
			$rombelMapel[$i]['roma'] = $rombel[$i] . ' - ' . $mapel[$i];
			$i++;
		}

		return $rombelMapel;
	}

	public function tambahDataMengajar()
	{

		$id_rombel = $this->input->post('id_rombel', true);
		$id_mapel = $this->input->post('id_mapel', true);
		$siswas = $this->db->get_where('siswa', ['id_rombel' => $id_rombel])->result_array();

		$cek = $this->db->get_where('mengajar', [
					'id_rombel' => $id_rombel,
					'id_mapel' => $id_mapel
				]);

		if ($cek->num_rows() < 1) {
			$data = [
				'id_rombel' => $id_rombel,
				'id_mapel' => $id_mapel,
				'id_guru' => $this->input->post('id_guru', true),
				'id_thn_ajar' => $this->input->post('id_thn_ajar', true)
			];
			$this->db->insert('mengajar', $data);
		} else {
			$this->session->set_flashdata('flash', 'Mapel pada Rombel tersebut sudah terisi!');
			redirect('mengajar/tambah');
		}

		$this->db->select('id');
		$this->db->order_by('id', 'DESC');
		$lastId = $this->db->get('mengajar')->row_array()['id'];

		foreach ($siswas as $siswa) {
			$data = [
				'id_mengajar' => $lastId,
				'id_siswa' => $siswa['id']
			];
			$this->db->insert('nilai', $data);
		}
		
	}

	public function ubahDataMengajar($id)
	{

		$id_rombel = $this->input->post('id_rombel', true);
		$id_mapel = $this->input->post('id_mapel', true);

		$cek = $this->db->get_where('mengajar', [
					'id' => $id,
					'id_rombel' => $id_rombel,
					'id_mapel' => $id_mapel
				]);

		$cek2 = $this->db->get_where('mengajar', [
					'id_rombel' => $id_rombel,
					'id_mapel' => $id_mapel
				]);
		
		if ($cek->num_rows() > 0) {
			$data = [
				'id_rombel' => $id_rombel,
				'id_mapel' => $id_mapel,
				'id_guru' => $this->input->post('id_guru', true),
				'id_thn_ajar' => $this->input->post('id_thn_ajar', true)
			];
			$this->db->update('mengajar', $data, ['id' => $id]);
		} elseif ($cek2->num_rows() < 1) {
			$data = [
				'id_rombel' => $id_rombel,
				'id_mapel' => $id_mapel,
				'id_guru' => $this->input->post('id_guru', true),
				'id_thn_ajar' => $this->input->post('id_thn_ajar', true)
			];
			$this->db->update('mengajar', $data, ['id' => $id]);
		} else {
			$this->session->set_flashdata('flash', 'Mapel pada Rombel tersebut sudah terisi!');
			redirect('mengajar/ubah/'.$id);
		}
		
	}

	public function hapusDataMengajar($id)
	{
		$this->db->delete('mengajar', ['id' => $id]);
	}
}