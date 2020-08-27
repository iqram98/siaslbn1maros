<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body col-md-6">
				<form action="" method="post" class="mt-5">
					<div class="form-group">
						<label for="nama">Nama Lengkap</label>
						<input type="text" class="form-control" id="nama" name="nama">
						<small class="form-text text-danger"><?= form_error('nama') ?></small>
					</div>
					<div class="form-group">
						<label for="nip">NIP</label>
						<input type="text" class="form-control" id="nip" name="nip">
						<small class="form-text text-danger"><?= form_error('nip') ?></small>
					</div>
					<div class="form-group">
						<label for="jk">Jenis Kelamin</label>
						<select class="form-control" id="jk" name="jk">
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
						<small class="form-text text-danger"><?= form_error('jk') ?></small>
					</div>
					<div class="form-group">
						<label for="tmpt_lahir">Tempat Lahir</label>
						<input type="text" class="form-control" id="tmpt_lahir" name="tmpt_lahir">
						<small class="form-text text-danger"><?= form_error('tmpt_lahir') ?></small>
					</div>
					<div class="form-group">
						<label for="tgl_lahir">Tanggal Lahir</label>
						<input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
						<small class="form-text text-danger"><?= form_error('tgl_lahir') ?></small>
					</div>
					<div class="form-group">
						<label for="pendidikan">Pendidikan</label>
						<input type="text" class="form-control" id="pendidikan" name="pendidikan">
						<small class="form-text text-danger"><?= form_error('pendidikan') ?></small>
					</div>
					<div class="form-group">
						<label for="pangkat">Pangkat</label>
						<input type="text" class="form-control" id="pangkat" name="pangkat">
						<small class="form-text text-danger"><?= form_error('pangkat') ?></small>
					</div>
					<div class="form-group">
						<label for="jabatan">Jabatan</label>
						<input type="text" class="form-control" id="jabatan" name="jabatan">
						<small class="form-text text-danger"><?= form_error('jabatan') ?></small>
					</div>
					<div class="form-group">
						<label for="tmt">TMT</label>
						<input type="text" class="form-control" id="tmt" name="tmt">
						<small class="form-text text-danger"><?= form_error('tmt') ?></small>
					</div>
					<div class="form-group">
						<label for="no_hp">No HP/ WA</label>
						<input type="text" class="form-control" id="no_hp" name="no_hp">
						<small class="form-text text-danger"><?= form_error('no_hp') ?></small>
					</div>
					<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah</button>
				</form>
				<a href="<?= base_url('guru') ?>" type="button" class="btn btn-success float-right mr-3">Kembali</a>
			</div>	
		</div>
	</div>
</div>
</section>