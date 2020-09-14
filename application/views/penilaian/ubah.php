<form action="" method="post">
	<div class="container">
		<div class="row ">
			<div class="col-md-6 ">
				<div class="card card-danger">
					<div class="card-header">
						<h3 class="card-title">Ulangan Harian</h3>
					</div>
					<div class="card-body">
						<label>Tertulis</label>
						<div class="row">
							<div class="col-4">
								<input type="text" class="form-control" value="<?= $nilai['u_tulis1'] ?>" name="u_tulis1" placeholder="nilai 1 . . .">
							</div>
							<div class="col-4">
								<input type="text" class="form-control" value="<?= $nilai['u_tulis2'] ?>" name="u_tulis2" placeholder="nilai 2 . . .">
							</div>
							<div class="col-4">
								<input type="text" class="form-control" value="<?= $nilai['u_tulis3'] ?>" name="u_tulis3" placeholder="nilai 3 . . .">
							</div>
						</div>
						<label class="mt-2">Lisan</label>
						<div class="row">
							<div class="col-4">
								<input type="text" class="form-control" value="<?= $nilai['u_lisan1'] ?>" name="u_lisan1" placeholder="nilai 1 . . .">
							</div>
							<div class="col-4">
								<input type="text" class="form-control" value="<?= $nilai['u_lisan2'] ?>" name="u_lisan2" placeholder="nilai 2 . . .">
							</div>
							<div class="col-4">
								<input type="text" class="form-control" value="<?= $nilai['u_lisan3'] ?>" name="u_lisan3" placeholder="nilai 3 . . .">
							</div>
						</div>
						<label class="mt-2">Perbuatan</label>
						<div class="row">
							<div class="col-4">
								<input type="text" class="form-control" value="<?= $nilai['u_perbuatan1'] ?>" name="u_perbuatan1" placeholder="nilai 1 . . .">
							</div>
							<div class="col-4">
								<input type="text" class="form-control" value="<?= $nilai['u_perbuatan2'] ?>" name="u_perbuatan2" placeholder="nilai 2 . . .">
							</div>
							<div class="col-4">
								<input type="text" class="form-control" value="<?= $nilai['u_perbuatan3'] ?>" name="u_perbuatan3" placeholder="nilai 3 . . .">
							</div>
						</div>
					</div>
				</div>
				<div class="card card-info">
					<div class="card-header">
						<h3 class="card-title">Ulangan Tengah Semester</h3>
					</div>
					<div class="form-horizontal">
						<div class="card-body">
							<div class="form-group row">
								<label for="uts_t" class="col-md-8 col-form-label">Tertulis</label>
								<div class="col-md-4">
									<input type="text" class="form-control" id="uts_t" value="<?= $nilai['uts_t'] ?>" name="uts_t" placeholder=". . .">
								</div>
							</div>
							<div class="form-group row">
								<label for="uts_p" class="col-md-8 col-form-label">Perbuatan</label>
								<div class="col-md-4">
									<input type="text" class="form-control" id="uts_p" value="<?= $nilai['uts_p'] ?>" name="uts_p" placeholder=". . .">
								</div>
							</div>
						</div>
					</div>
				</div>
				<button type="submit" name="ubah" class="btn btn-primary float-right">Edit Nilai</button>
				<a href="<?= base_url('penilaian?r='.$r.'&refresh=s') ?>" type="button" class="btn btn-success float-right mr-3">Kembali</a>
			</div>
			<div class="col-md-6">
				<div class="card card-info">
					<div class="card-header">
						<h3 class="card-title">Tugas atau Pekerjaan Rumah</h3>
					</div>
					<div class="form-horizontal">
						<div class="card-body">
							<div class="form-group row">
								<label for="tugas1" class="col-md-8 col-form-label">Tugas 1</label>
								<div class="col-md-4">
									<input type="text" class="form-control" value="<?= $nilai['tugas1'] ?>" name="tugas1" id="tugas1" placeholder=". . .">
								</div>
							</div>
							<div class="form-group row">
								<label for="tugas2" class="col-md-8 col-form-label">Tugas 2</label>
								<div class="col-md-4">
									<input type="text" class="form-control" value="<?= $nilai['tugas2'] ?>" name="tugas2" id="tugas2" placeholder=". . .">
								</div>
							</div>
							<div class="form-group row">
								<label for="tugas3" class="col-md-8 col-form-label">Tugas 3</label>
								<div class="col-md-4">
									<input type="text" class="form-control" value="<?= $nilai['tugas3'] ?>" name="tugas3" id="tugas3" placeholder=". . .">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card card-info">
					<div class="card-header">
						<h3 class="card-title">Ulangan Akhir Semester</h3>
					</div>
					<div class="form-horizontal">
						<div class="card-body">
							<div class="form-group row">
								<label for="uas_t" class="col-md-8 col-form-label">Tertulis</label>
								<div class="col-md-4">
									<input type="text" class="form-control" value="<?= $nilai['uas_t'] ?>" name="uas_t" id="uas_t" placeholder=". . .">
								</div>
							</div>
							<div class="form-group row">
								<label for="uas_p" class="col-md-8 col-form-label">Perbuatan</label>
								<div class="col-md-4">
									<input type="text" class="form-control" value="<?= $nilai['uas_p'] ?>" name="uas_p" id="uas_p" placeholder=". . .">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>