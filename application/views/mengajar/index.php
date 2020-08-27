<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<?php if ($this->session->flashdata('flash')): ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			Data Mengajar <strong>Berhasil! </strong><?= $this->session->flashdata('flash'); ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php endif ?>
		<div class="card">
			<div class="card-body">
				<div class="clearfix">
					<a class="btn btn-primary mb-3 float-right" href="<?= base_url() ?>mengajar/tambah">Tambah Mengajar</a>
				</div>
				<table id="table_id" class="table">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Tahnu Ajar</th>
							<th scope="col">Nama Guru</th>
							<th scope="col">Mapel</th>
							<th scope="col">Rombel</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = '1'; ?>
						<?php foreach ($mengajar as $ngajar): ?>
						<tr>
							<td><?= $no; ?></td>
							<td><?= $ngajar['thn_ajar']; ?></td>
							<td><?= $ngajar['nama']; ?></td>
							<td><?= $ngajar['nama_mapel']; ?></td>
							<td><?= $ngajar['nama_rombel']; ?></td>
							<td width="200">
								<a href="<?= base_url() ?>mengajar/ubah/<?= $ngajar['id'] ?>"><span class="badge badge-warning">Edit</span></a>
								<a href="<?= base_url() ?>mengajar/hapus/<?= $ngajar['id'] ?>" onclick="return confirm('yakin?')"><span class="badge badge-danger">Hapus</span></a>
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