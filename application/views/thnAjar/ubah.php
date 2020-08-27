<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body col-md-6">
				<form action="" method="post" class="mt-5">
					<div class="form-group">
						<label for="thn_ajar">Tahun Ajar</label>
						<input type="text" class="form-control" id="thn_ajar" name="thn_ajar" value="<?= $thn_ajar['thn_ajar'] ?>">
						<small class="form-text text-danger"><?= form_error('thn_ajar') ?></small>
					</div>
					<button type="submit" name="ubah" class="btn btn-primary float-right">Ubah</button>
				</form>
				<a href="<?= base_url('thnAjar') ?>" type="button" class="btn btn-success float-right mr-3">Kembali</a>
			</div>
		</div>
	</div>
</section>