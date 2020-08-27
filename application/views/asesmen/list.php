<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="clearfix">
			<div class="card">
				<div class="card-body">
					<?php if ($this->session->flashdata('flash')): ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data Asesmen <strong>Berhasil! </strong><?= $this->session->flashdata('flash'); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php endif ?>
					<h5 class="mb-3"><?= $roma ?></h5>
		
					<table id="table_id" class="table table-hover">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Aspek</th>
								<th scope="col">Deskripsi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = '1'; ?>
							<?php foreach ($asesmen as $ases): ?>
							<tr>
								<td><?= $no; ?></td>
								<td><?= $ases['aspek']; ?></td>
								<td><?= $ases['deskripsi']; ?></td>
							</tr>
							<?php $no++ ?>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
			<a href="<?= base_url('asesmensiswa') ?>" type="button" class="btn btn-success float-right mr-3">Kembali</a>
		</div>
	</div>
</section>