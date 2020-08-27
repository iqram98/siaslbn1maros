<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?= base_url() ?>/assets/img/<?= $guru['image'] ?>">
                        </div>
                        <h3 class="profile-username text-center"><?= $guru['nama'] ?></h3>
                        <p class="text-muted text-center"><?= "Guru" ?></p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Nama Lengkap</b> <a class="float-right"><?= $guru['nama'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>NIP</b> <a class="float-right"><?= $guru['nip'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Jenis Kelamin</b> <a class="float-right"><?= $guru['jk'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Tempat, Tanggal Lahir</b> <a class="float-right"><?= $guru['ttl'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Pendidikan</b> <a class="float-right"><?= $guru['pendidikan'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Pangkat</b> <a class="float-right"><?= $guru['pangkat'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Jabatan</b> <a class="float-right"><?= $guru['jabatan'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>TMT</b> <a class="float-right"><?= $guru['tmt'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>No HP/ WA</b> <a class="float-right"><?= $guru['no_hp'] ?></a>
                            </li>
                        </ul>
                        <a href="<?= base_url('guru') ?>" type="button" class="btn btn-success float-right mr-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>