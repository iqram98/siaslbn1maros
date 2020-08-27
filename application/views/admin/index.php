<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<?php if ($this->session->flashdata('flash')): ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			Data Admin <strong>Berhasil! </strong><?= $this->session->flashdata('flash'); ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php endif ?>
		<div class="clearfix">
			<a class="btn btn-primary mb-3 float-right" href="<?= base_url() ?>admin/tambah">Tambah Admin</a>
		</div>
		<table id="table_id" class="table table-hover">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Username</th>
					<th scope="col">Email</th>
					<th scope="col">Level User</th>
					<th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = '1'; ?>
				<?php foreach ($users as $user): ?>
				<tr>
					<td><?= $no; ?></td>
					<td><?= $user['username']; ?></td>
					<td><?= $user['email']; ?></td>
					<td>
						<?php 
							switch ($user['id_role']) {
								case '1':
									echo "Super Admin"; 
									break;
								case '2':
									echo "Admin";
									break;
								case '3':
									echo "Guru";
									break;
								case '4':
									echo "Siswa";
									break;
							}
						 ?>
					</td>					
					<td width="200">
						<a href="<?= base_url() ?>admin/hapus/<?= $user['id'] ?>" onclick="return confirm('yakin?')"><span class="badge badge-danger">Hapus</span></a>
					</td>
				</tr>
				<?php $no++ ?>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</section>