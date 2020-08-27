<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body col-md-6">
				<form action="" method="post" class="mt-5">
					<div class="form-group">
						<label for="aspek">Aspek</label>
						<textarea class="form-control" id="aspek" name="aspek" rows="5" placeholder="Isi Aspek ..."></textarea>
						<small class="form-text text-danger"><?= form_error('aspek') ?></small>
					</div>
					<div class="form-group">
						<label for="deskripsi">Deskripsi</label>
						<textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" placeholder="Isi Deskripsi ..."></textarea>
						<small class="form-text text-danger"><?= form_error('deskripsi') ?></small>
					</div>
					<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah</button>
				</form>
				<a href="<?= base_url('asesmen/data') ?>/<?= $id_mengajar ?>/<?= $id_siswa ?>" type="button" class="btn btn-success float-right mr-3">Kembali</a>
			</div>
		</div>
	</div>
</section>
  