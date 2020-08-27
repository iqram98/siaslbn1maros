<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="clearfix">
			<div class="card">
				<div class="card-body p-0">
					<table class="table">
						<thead>
							<tr>
								<th style="width: 10px">#</th>
								<th>Pilih Mata Pelajaran</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1 ?>
							<?php foreach ($rombelMapel as $roma): ?>
								<tr>
									<td><?= $no ?></td>
									<td><a href="<?= base_url() ?>asesmensiswa/list/<?= $roma['id'] ?>"><?= $roma['roma'] ?></a></td>
								</tr>
							<?php $no++ ?>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>