<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<?php if ($this->session->flashdata('flash')): ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			Data Siswa <strong>Berhasil! </strong><?= $this->session->flashdata('flash'); ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php endif ?>
		<div class="clearfix">
			<a class="btn btn-primary mb-3 float-right" href="<?= base_url() ?>siswa/tambah">Tambah Siswa</a>
		</div>
		<div class="card">
			<div class="card-body">
				<table id="table_id" class="table table-hover">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Foto</th>
							<th scope="col">Nama</th>
							<th scope="col">NIS</th>
							<th scope="col">Rombel</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = '1'; ?>
						<?php foreach ($siswa as $sis): ?>
						<tr>
							<td><?= $no; ?></td>
							<td class="align-middle"><img src="<?= base_url() ?>assets/img/<?= $sis['image']; ?>" class="img-thumbnail" width=80></td>
							<td class="align-middle"><?= $sis['nama']; ?></td>
							<td class="align-middle"><?= $sis['nis']; ?></td>
							<td class="align-middle"><?= $sis['nama_rombel']; ?></td>
							<td width="200" class="align-middle">
								<a href="<?= base_url() ?>siswa/detail/<?= $sis['id'] ?>"><span class="badge badge-primary">Detail</span></a>
								<a href="<?= base_url() ?>siswa/ubah/<?= $sis['id'] ?>"><span class="badge badge-warning">Edit</span></a>
								<a href="<?= base_url() ?>siswa/hapus/<?= $sis['id'] ?>" onclick="return confirm('yakin?')"><span class="badge badge-danger">Hapus</span></a>
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