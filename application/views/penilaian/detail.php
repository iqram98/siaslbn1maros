<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Nilai Ulangan Harian</h3>
					</div>
					<form role="form">
						<div class="card-body">
							<div class="form-group">
								<h6>Ulangan Tertulis</h6>
								<table class="table table-bordered text-center">
									<thead>
										<tr>
											<th>Tertulis 1</th>
											<th>Tertulis 2</th>
											<th>Tertulis 3</th>
											<th>Rata-rata</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?= $nilai['u_tulis1'] ?></td>
											<td><?= $nilai['u_tulis2'] ?></td>
											<td><?= $nilai['u_tulis3'] ?></td>
											<td><?= $nilai['rata_tulis'] ?></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="form-group">
								<h6>Ulangan Lisan</h6>
								<table class="table table-bordered text-center">
									<thead>
										<tr>
											<th>Lisan 1</th>
											<th>Lisan 2</th>
											<th>Lisan 3</th>
											<th>Rata-rata</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?= $nilai['u_lisan1'] ?></td>
											<td><?= $nilai['u_lisan2'] ?></td>
											<td><?= $nilai['u_lisan3'] ?></td>
											<td><?= $nilai['rata_lisan'] ?></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="form-group">
								<h6>Ulangan Perbuatan</h6>
								<table class="table table-bordered text-center">
									<thead>
										<tr>
											<th>Perbuatan 1</th>
											<th>Perbuatan 2</th>
											<th>Perbuatan 3</th>
											<th>Rata-rata</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?= $nilai['u_perbuatan1'] ?></td>
											<td><?= $nilai['u_perbuatan2'] ?></td>
											<td><?= $nilai['u_perbuatan3'] ?></td>
											<td><?= $nilai['rata_perbuatan'] ?></td>
										</tr>
									</tbody>
								</table>
								<h6>Rata-rata Ulangan Harian : <?= $nilai['rata_ulhar'] ?></h6>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card card-success">
					<div class="card-header">
						<h3 class="card-title">Nilai Tugas</h3>
					</div>
					<div class="card-body">
						<table class="table table-bordered text-center">
							<thead>
								<tr>
									<th>Tugas 1</th>
									<th>Tugas 2</th>
									<th>Tugas 3</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?= $nilai['tugas1'] ?></td>
									<td><?= $nilai['tugas2'] ?></td>
									<td><?= $nilai['tugas3'] ?></td>
								</tr>
							</tbody>
						</table>
						<h6>Rata-rata Tugas : <?= $nilai['rata_tugas'] ?></h6>
					</div>
				</div>
				<div class="card card-warning">
					<div class="card-header">
						<h3 class="card-title">Nilai Ujian Tengah Semester</h3>
					</div>
					<div class="card-body">
						<table class="table table-bordered text-center">
							<thead>
								<tr>
									<th>Tertulis</th>
									<th>Perbuatan</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?= $nilai['uts_t'] ?></td>
									<td><?= $nilai['uts_p'] ?></td>
								</tr>
							</tbody>
						</table>
						<h6>Rata-rata UTS : <?= $nilai['rata_uts'] ?></h6>
					</div>
				</div>
				<div class="card card-danger">
					<div class="card-header">
						<h3 class="card-title">Nilai Ujian Akhir Semester</h3>
					</div>
					<div class="card-body">
						<table class="table table-bordered text-center">
							<thead>
								<tr>
									<th>Tertulis</th>
									<th>Perbuatan</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?= $nilai['uas_t'] ?></td>
									<td><?= $nilai['uas_p'] ?></td>
								</tr>
							</tbody>
						</table>
						<h6>Rata-rata UAS : <?= $nilai['rata_uas'] ?></h6>
						<h6>Nilai Akhir : <?= $nilai['nilai_akhir'] ?></h6>
					</div>
				</div>
				<a href="<?= base_url('nilaisiswa') ?>" type="button" class="btn btn-success float-right mb-5">Kembali</a>
			</div>
		</div>
	</div>
</section>