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
						<label for="id_thn_ajar">Tahun Ajar</label>
						<select class="form-control" id="id_thn_ajar" name="id_thn_ajar">
							<?php foreach ($thn_ajar as $thn): ?>
							<?php if ($thn['id'] == $mengajar['id_thn_ajar']): ?>
							<option value="<?= $thn['id'] ?>" selected><?= $thn['thn_ajar'] ?></option>
							<?php else: ?>
							<option value="<?= $thn['id'] ?>"><?= $thn['thn_ajar'] ?></option>
							<?php endif ?>
							<?php endforeach ?>
						</select>
						<small class="form-text text-danger"><?= form_error('id_thn_ajar') ?></small>
					</div>
					<div class="form-group">
						<label for="id_rombel">Mata Pelajaran</label>
						<select class="form-control" id="id_rombel" name="id_rombel">
							<?php foreach ($rombel as $rom): ?>
							<?php if ($rom['id'] == $mengajar['id_rombel']): ?>
							<option value="<?= $rom['id'] ?>" selected><?= $rom['nama_rombel'] ?></option>
							<?php else: ?>
							<option value="<?= $rom['id'] ?>"><?= $rom['nama_rombel'] ?></option>
							<?php endif ?>
							<?php endforeach ?>
						</select>
						<small class="form-text text-danger"><?= form_error('id_rombel') ?></small>
					</div>

					<div class="form-group">
						<label for="id_mapel">Mata Pelajaran</label>
						<select class="form-control" id="id_mapel" name="id_mapel">
							<?php foreach ($mapel as $map): ?>
							<?php if ($map['id'] == $mengajar['id_mapel']): ?>
							<option value="<?= $map['id'] ?>" selected><?= $map['nama_mapel'] ?></option>
							<?php else: ?>
							<option value="<?= $map['id'] ?>"><?= $map['nama_mapel'] ?></option>
							<?php endif ?>
							<?php endforeach ?>
						</select>
						<small class="form-text text-danger"><?= form_error('id_mapel') ?></small>
					</div>
					<div class="form-group">
						<label for="id_guru">Guru</label>
						<select class="form-control" id="id_guru" name="id_guru">
							<?php foreach ($guru as $gur): ?>
							<?php if ($gur['id'] == $mengajar['id_guru']): ?>
							<option value="<?= $gur['id'] ?>" selected><?= $gur['nama'] ?></option>
							<?php else: ?>
							<option value="<?= $gur['id'] ?>"><?= $gur['nama'] ?></option>
							<?php endif ?>
							<?php endforeach ?>
						</select>
						<small class="form-text text-danger"><?= form_error('id_guru') ?></small>
					</div>
					<button type="submit" name="tambah" class="btn btn-primary float-right">Ubah</button>
				</form>
				<a href="<?= base_url('mengajar') ?>" type="button" class="btn btn-success float-right mr-3">Kembali</a>
			</div>
		</div>
	</div>
</section>
