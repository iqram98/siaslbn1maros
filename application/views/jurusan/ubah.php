<div class="container">
	<div class="row ">
		<div class="col-md-6">
			<h3>Ubah Data Jurusan</h3>
			<form action="" method="post" class="mt-5">
				<div class="form-group">
					<label for="nama_jurusan">Nama Jurusan</label>
					<input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" value="<?= $jurusan['nama_jurusan'] ?>">
					<small class="form-text text-danger"><?= form_error('nama_jurusan') ?></small>
				</div>
				<button type="submit" name="ubah" class="btn btn-primary float-right">Ubah</button>
			</form>
			<a href="<?= base_url('jurusan') ?>" type="button" class="btn btn-success float-right mr-3">Kembali</a>
		</div>
	</div>
</div>