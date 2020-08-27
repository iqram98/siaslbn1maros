<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body col-md-6">
				<form action="" method="post" class="mt-5">
					<div class="form-group">
						<label for="id_thn_ajar"></label>
						<select class="form-control" id="id_thn_ajar" name="id_thn_ajar">
							<option value="" disabled selected>--Pilih Mapel--</option>
							<?php foreach ($thn_ajar as $thn): ?>
							<option value="<?= $thn['id'] ?>"><?= $thn['thn_ajar'] ?></option>
							<?php endforeach ?>
						</select>
						<small class="form-text text-danger"><?= form_error('id_thn_ajar') ?></small>
					</div>
					<div class="form-group">
						<label for="hari">Hari</label>
						<select class="form-control" id="hari" name="hari">
							<option value="" disabled selected>--Pilih Hari--</option>
							<?php foreach ($hari as $har): ?>
							<option value="<?= $har ?>"><?= $har ?></option>
							<?php endforeach ?>
						</select>
						<small class="form-text text-danger"><?= form_error('hari') ?></small>
					</div>
					<div class="form-group">
						<label for="jam_mulai" style="display: block;">Jam</label>
						<input type="time" class="form-control" id="jam_mulai" name="jam_mulai" style="display: inline-block; width: 100px;"> -
						<input type="time" class="form-control" id="jam_akhir" name="jam_akhir" style="display: inline-block; width: 100px;">
						<small class="form-text text-danger"><?= form_error('jam') ?></small>
					</div>
					<div class="form-group">
						<label for="id_mengajar">Rombel-Mapel</label>
						<select class="form-control" id="id_mengajar" name="id_mengajar">
							<option value="" disabled selected>--Pilih Rombel - Mapel--</option>
							<?php foreach ($mengajar as $ngajar): ?>
							<option value="<?= $ngajar['id'] ?>"><?= $ngajar['roma'] ?></option>
							<?php endforeach ?>
						</select>
						<small class="form-text text-danger"><?= form_error('id_mengajar') ?></small>
					</div>
					<div class="form-group">
						<label for="id_ruangan">Ruangan</label>
						<select class="form-control" id="id_ruangan" name="id_ruangan">
							<option value="" disabled selected>--Pilih Ruangan--</option>
							<?php foreach ($ruangan as $ruang): ?>
							<option value="<?= $ruang['id'] ?>"><?= $ruang['nama_ruangan'] ?></option>
							<?php endforeach ?>
						</select>
						<small class="form-text text-danger"><?= form_error('id_ruangan') ?></small>
					</div>
					<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah</button>
				</form>
				<a href="<?= base_url('jadwal') ?>" type="button" class="btn btn-success float-right mr-3">Kembali</a>
			</div>
		</div>
	</div>
</section>