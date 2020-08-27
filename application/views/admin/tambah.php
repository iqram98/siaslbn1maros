<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body col-md-6">
				<form action="" method="post" class="mt-5">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username">
						<small class="form-text text-danger"><?= form_error('username') ?></small>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" id="email" name="email">
						<small class="form-text text-danger"><?= form_error('email') ?></small>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password">
						<small class="form-text text-danger"><?= form_error('password') ?></small>
					</div>
					<div class="form-group">
						<label for="level">Level</label>
						<select class="form-control" id="level" name="level">
							<option value="1">Super Admin</option>
							<option value="2">Admin</option>
						</select>
						<small class="form-text text-danger"><?= form_error('level') ?></small>
					</div>
					<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah</button>
				</form>
				<a href="<?= base_url('admin') ?>" type="button" class="btn btn-success float-right mr-3">Kembali</a>
			</div>
		</div>
	</div>
</section>
  