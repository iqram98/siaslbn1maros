<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body col-md-6">
				<form action="" method="post" class="mt-5">
					<div class="form-group">
						<label for="aspek">Aspek</label>
						<textarea class="form-control" id="aspek" name="aspek" rows="2" placeholder="Isi Aspek ..."></textarea>
						<small class="form-text text-danger"><?= form_error('aspek') ?></small>
					</div>
					<div id= "div" class="form-group">
						<label for="deskripsi">Deskripsi</label>
						<textarea class="form-control" id="deskripsi" name="deskripsi1" rows="3" placeholder="Isi Deskripsi ..."></textarea>
						<small id="small" class="form-text text-danger"><?= form_error('deskripsi') ?></small>
						<span id="tambah" class="btn btn-secondary">+</span>
					</div>
					<input id="num" type="hidden" name="num" value="1">
					<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah</button>
				</form>
				<a href="<?= base_url('asesmen/data') ?>/<?= $id_mengajar ?>/<?= $id_siswa ?>" type="button" class="btn btn-success float-right mr-3">Kembali</a>
			</div>
		</div>
	</div>
</section>
<script>
	const span = document.querySelector('#tambah');
	let x = 2;
	span.addEventListener('click', function () {
		const div = document.querySelector('#div');
		const small = document.querySelector('#small');
		const input = document.querySelector('#num');
		const textArea = document.createElement('textarea');
		textArea.classList.add('form-control');
		textArea.classList.add('mt-2');
		textArea.setAttribute('id', 'deskripsi' + x);
		textArea.setAttribute('name', 'deskripsi' + x);
		textArea.setAttribute('rows', '3');
		textArea.setAttribute('placeholder', 'Isi Deskripsi ...');
		div.insertBefore(textArea, small);
		input.setAttribute('value', x);

		x++;
	});
</script>
  