<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="clearfix">
			<div class="card">
				<div class="card-body">
					<h5 class="mb-3"><?= $roma ?></h5>
					<table class="table">
						<thead>
							<tr>
								<th style="width: 10px">#</th>
								<th>NIS</th>
								<th>Nama Siswa</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1 ?>
							<?php foreach ($siswa as $sis): ?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $sis['nis'] ?></td>
								<td><?= $sis['nama'] ?></td>
								<td>
									<a href="<?= base_url() ?>asesmen/data/<?= $id_mengajar ?>/<?= $sis['id'] ?>"><span class="badge badge-primary">Asesmen</span></a>
								</td>
							</tr>
							<?php $no++ ?>
							<?php endforeach ?>
							
						</tbody>
					</table>
				</div>
			</div>
			<a href="<?= base_url('asesmen') ?>" type="button" class="btn btn-success float-right mr-3">Kembali</a>
		</div>
	</div>
</section>