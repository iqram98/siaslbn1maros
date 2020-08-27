<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body col-md-6">
				<form action="" method="post" class="mt-5">
					<?php if ($this->session->flashdata('flash')): ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?= $this->session->flashdata('flash'); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php endif ?>
					<div class="form-group">
						<label for="passwordlama">Password Lama</label>
						<input type="password" class="form-control" id="passwordlama" name="passwordlama">
						<small class="form-text text-danger"><?= form_error('passwordlama') ?></small>
					</div>
					<div class="form-group">
						<label for="passwordbaru">Password Baru</label>
						<input type="password" class="form-control" id="passwordbaru" name="passwordbaru">
						<small class="form-text text-danger"><?= form_error('passwordbaru') ?></small>
					</div>
					<div class="form-group">
						<label for="passwordbaru1">Konfirmasi Password Baru</label>
						<input type="password" class="form-control" id="passwordbaru1" name="passwordbaru1">
						<small class="form-text text-danger"><?= form_error('passwordbaru1') ?></small>
					</div>
					<button type="submit" name="ubah" class="btn btn-primary float-right">Ubah</button>
				</form>
				<a href="<?= base_url('profil') ?>" type="button" class="btn btn-success float-right mr-3">Kembali</a>
			</div>
		</div>
	</div>
</section>