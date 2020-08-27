<div class="container">
	<div class="row ">
		<div class="col-md-6">
			<h3>Tambah Mata Pelajaran</h3>
			<form action="" method="post" class="mt-5">
				<div class="form-group">
					<label for="nama_mapel">Nama Mata Pelajaran</label>
					<input type="text" class="form-control" id="nama_mapel" name="nama_mapel">
					<small class="form-text text-danger"><?= form_error('nama_mapel') ?></small>
				</div>
				<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah</button>
			</form>
			<a href="<?= base_url('mapel') ?>" type="button" class="btn btn-success float-right mr-3">Kembali</a>
		</div>
	</div>
</div>