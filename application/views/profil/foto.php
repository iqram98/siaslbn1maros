<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body col-md-6">
				<?php echo form_open_multipart('profil/foto');?>
				<?php if ($this->session->flashdata('flash')): ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<?= $this->session->flashdata('flash'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php endif ?>
				<div class="form-group">
					<img width="200" class="img-thumbnail" src="<?= base_url() ?>assets/img/<?= $user['image'] ?>">
				</div>
				<div class="form-group">
					<div class="custom-file">
						<input name="image" type="file" class="custom-file-input" id="customFile">
						<label class="custom-file-label" for="customFile">Choose file</label>
						<input name="hidden" type="text" hidden value="hidden">
					</div>
				</div>
				<button type="submit" name="submit" class="btn btn-primary float-right">Ubah</button>
			</form>
			<a href="<?= base_url('profil') ?>" type="button" class="btn btn-success float-right mr-3">Kembali</a>
		</div>
	</div>
</div>
</section>