<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<?php if ($this->session->flashdata('flash')): ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			Data Guru <strong>Berhasil! </strong><?= $this->session->flashdata('flash'); ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php endif ?>
		<div class="card">
			<div class="card-body">
				<div class="clearfix">
					<?php if ($this->session->userdata('level') == '1' || $this->session->userdata('level') == '2'): ?>
					<a class="btn btn-primary mb-3 float-right" href="<?= base_url() ?>guru/tambah">Tambah Guru</a>
					<?php endif ?>
					<a class="btn btn-primary mb-3 mr-3 float-right" href="<?= base_url() ?>guru/printDataGuru">Print Data Guru</a>
				</div>
				<table id="table_id" class="table">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Foto</th>
							<th scope="col">Nama</th>
							<th scope="col">NIP</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody class="align-middle">
						<?php $no = '1'; ?>
						<?php foreach ($guru as $gur): ?>
						<tr>
							<td class="align-middle"><?= $no; ?></td>
							<td class="align-middle"><img src="<?= base_url() ?>assets/img/<?= $gur['image']; ?>" class="img-thumbnail" width=80></td>
							<td class="align-middle"><?= $gur['nama']; ?></td>
							<td class="align-middle"><?= $gur['nip']; ?></td>
								
							<td width="200" class="align-middle">
								<a href="<?= base_url() ?>guru/detail/<?= $gur['id'] ?>"><span class="badge badge-primary">Detail</span></a>
							<?php if ($this->session->userdata('level') == '1' || $this->session->userdata('level') == '2'): ?>
								<a href="<?= base_url() ?>guru/ubah/<?= $gur['id'] ?>"><span class="badge badge-warning">Edit</span></a>
								<a href="<?= base_url() ?>guru/hapus/<?= $gur['id'] ?>" onclick="return confirm('yakin?')"><span class="badge badge-danger">Hapus</span></a>
							<?php endif ?>
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