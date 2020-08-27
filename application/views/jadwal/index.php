<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<?php if ($this->session->flashdata('flash')): ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			Data Jadwal <strong>Berhasil! </strong><?= $this->session->flashdata('flash'); ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php endif ?>
		<div class="card">
			<div class="card-body">
				<div class="clearfix">
					<a class="btn btn-primary mb-3 float-right" href="<?= base_url() ?>jadwal/tambah">Tambah Jadwal</a>
				</div>
				<table id="table_id" class="table">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Tahun Ajar</th>
							<th scope="col">Hari</th>
							<th scope="col">Jam</th>
							<th scope="col">Mapel</th>
							<th scope="col">Guru</th>
							<th scope="col">Rombel</th>
							<th scope="col">Ruangan</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = '1'; ?>
						<?php foreach ($jadwal as $jad): ?>
						<tr>
							<td><?= $no; ?></td>
							<td><?= $jad['thn_ajar']; ?></td>
							<td><?= $jad['hari']; ?></td>
							<td><?= $jad['jam']; ?></td>
							<td><?= $jad['nama_mapel']; ?></td>
							<td><?= $jad['nama']; ?></td>
							<td><?= $jad['nama_rombel']; ?></td>
							<td><?= $jad['nama_ruangan']; ?></td>
							<td width="200">
								<a href="<?= base_url() ?>jadwal/ubah/<?= $jad['id'] ?>"><span class="badge badge-warning">Edit</span></a>
								<a href="<?= base_url() ?>jadwal/hapus/<?= $jad['id'] ?>" onclick="return confirm('yakin?')"><span class="badge badge-danger">Hapus</span></a>
							</td>
						</tr>
						<?php $no++ ?>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>