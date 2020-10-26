<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body col-md-6">
					<?php if ($this->session->flashdata('flash')): ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?= $this->session->flashdata('flash'); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php endif ?>
				<form action="" method="post" class="mt-5">
					<div class="form-group">
						<label for="nama">Nama Lengkap</label>
						<input type="text" class="form-control" id="nama" name="nama" value="<?= $siswa['nama'] ?>">
						<small class="form-text text-danger"><?= form_error('nama') ?></small>
					</div>
					<div class="form-group">
						<label for="nis">Nis</label>
						<input type="text" class="form-control" id="nis" name="nis" value="<?= $siswa['nis'] ?>">
						<small class="form-text text-danger"><?= form_error('nis') ?></small>
					</div>
					<div class="form-group">
						<label for="jk">Jenis Kelamin</label>
						<select class="form-control" id="jk" name="jk">
							<?php foreach ($gender as $jk): ?>
							<?php if ($jk == $siswa['jk']): ?>
							<option value="<?= $jk ?>" selected><?= $jk ?></option>
							<?php else: ?>
							<option value="<?= $jk ?>"><?= $jk ?></option>
							<?php endif ?>
							<?php endforeach ?>
						</select>
						<small class="form-text text-danger"><?= form_error('jk') ?></small>
					</div>
					<div class="form-group">
						<label for="tmpt_lahir">Tempat Lahir</label>
						<input type="text" class="form-control" id="tmpt_lahir" name="tmpt_lahir" value="<?= $tmpt_lahir[0]?>">
						<small class="form-text text-danger"><?= form_error('tmpt_lahir') ?></small>
					</div>
					<div class="form-group">
						<label for="tgl_lahir">Tanggal Lahir</label>
						<input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $tgl_lahir ?>">
						<small class="form-text text-danger"><?= form_error('tgl_lahir') ?></small>
					</div>
					<div class="form-group">
						<label for="id_rombel">Rombel</label>
						<select class="form-control" id="id_rombel" name="id_rombel">
							<?php foreach ($rombel as $rom): ?>
							<?php if ($siswa['id_rombel'] == $rom['id']): ?>
							<option value="<?= $rom['id'] ?>" selected><?= $rom['nama_rombel'] ?></option>
							<?php else: ?>
							<option value="<?= $rom['id'] ?>"><?= $rom['nama_rombel'] ?></option>
							<?php endif ?>
							<?php endforeach ?>
						</select>
						<small class="form-text text-danger"><?= form_error('id_rombel') ?></small>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" class="form-control" id="alamat" name="alamat" value="<?= $siswa['alamat'] ?>">
						<small class="form-text text-danger"><?= form_error('alamat') ?></small>
					</div>
					<div class="form-group">
						<label for="nama_wali">Nama Wali</label>
						<input type="text" class="form-control" id="nama_wali" name="nama_wali" value="<?= $siswa['nama_wali'] ?>">
						<small class="form-text text-danger"><?= form_error('nama_wali') ?></small>
					</div>
					<div class="form-group">
						<label for="hp_wali">No HP/ WA Wali</label>
						<input type="text" class="form-control" id="hp_wali" name="hp_wali" value="<?= $siswa['hp_wali'] ?>">
						<small class="form-text text-danger"><?= form_error('hp_wali') ?></small>
					</div>
					<button type="submit" name="ubah" class="btn btn-primary float-right">Ubah</button>
				</form>
				<a href="<?= base_url('siswa') ?>" type="button" class="btn btn-success float-right mr-3">Kembali</a>
			</div>
		</div>
	</div>
</section>