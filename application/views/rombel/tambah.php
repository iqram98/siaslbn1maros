<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body col-md-6">
				<?php var_dump($jurusan) ?>
				<form action="" method="post" class="mt-5">
					<div class="form-group">
						<label for="nama_rombel">Nama Rombel</label>
						<input type="text" class="form-control" id="nama_rombel" name="nama_rombel">
						<small class="form-text text-danger"><?= form_error('nama_rombel') ?></small>
					</div>
					<div class="form-group">
						<label for="id_jurusan">Jurusan</label>
						<select class="form-control" id="id_jurusan" name="id_jurusan">
							<?php foreach ($jurusan as $jurus): ?>
							<option value="<?= $jurus['id']; ?>"><?= $jurus['nama_jurusan']; ?></option>
							<?php endforeach ?>
						</select>
						<small class="form-text text-danger"><?= form_error('nama_jurusan') ?></small>
					</div>
					<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah</button>
				</form>
				<a href="<?= base_url('rombel') ?>" type="button" class="btn btn-success float-right mr-3">Kembali</a>
			</div>
		</div>
	</div>
</section>