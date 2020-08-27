<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<table id="table_id" class="table">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Mata Pelajaran</th>
							<th scope="col">Nilai Akhir</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = '1'; ?>
						<?php foreach ($nilai as $nil): ?>
						<tr>
							<td><?= $no; ?></td>
							<td><?= $nil['nama_mapel']; ?></td>
							<td><?php if ($nil['nilai_akhir'] != NULL): ?>
								<?php echo $nil['nilai_akhir'] ?>
								<?php else: ?>
								<?php echo "Belum Ada Nilai" ?>
							<?php endif ?></td>
							<td><?php if ($nil['nilai_akhir'] != NULL): ?>
								<a href="<?= base_url() ?>nilaisiswa/detail/<?= $nil['id'] ?>"><span class="badge badge-primary">Detail</span></a>
								<?php else: ?>
								<span class="badge badge-secondary">Detail</span>
							<?php endif ?></td>
						</tr>
						<?php $no++ ?>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>