<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body col-md-6">
				<form action="" method="post" class="mt-5">
					<div class="form-group">
						<label for="nama_jurusan">Nama Jurusan</label>
						<input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan">
						<small class="form-text text-danger"><?= form_error('nama_jurusan') ?></small>
					</div>
					<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah</button>
				</form>
				<a href="<?= base_url('jurusan') ?>" type="button" class="btn btn-success float-right mr-3">Kembali</a>
			</div>
		</div>
	</div>
</section>