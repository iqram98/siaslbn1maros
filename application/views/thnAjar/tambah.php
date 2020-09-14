<div class="container">
	<div class="row ">
		<div class="col-md-6">
			<form action="" method="post" class="mt-5">
				<div class="form-group">
					<label for="semster">Semester</label>
					<select class="form-control" id="semester" name="semester">
							<option value="Ganjil">Ganjil</option>
							<option value="Genap">Genap</option>
						</select>
					<small class="form-text text-danger"><?= form_error('semster') ?></small>
				</div>
				<div class="form-group">
					<label for="thn_ajar">Tahun Ajar</label>
					<input type="text" class="form-control" id="thn_ajar" name="thn_ajar">
					<small class="form-text text-danger"><?= form_error('thn_ajar') ?></small>
				</div>
				<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah</button>
			</form>
			<a href="<?= base_url('thnAjar') ?>" type="button" class="btn btn-success float-right mr-3">Kembali</a>
		</div>
	</div>
</div>