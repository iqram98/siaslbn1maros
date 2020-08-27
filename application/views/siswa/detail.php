<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?= base_url() ?>/assets/img/<?= $siswa['image'] ?>" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center"><?= $siswa['nama'] ?></h3>
                        <p class="text-muted text-center"><?= "Siswa" ?></p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Nama Lengkap</b> <a class="float-right"><?= $siswa['nama'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>NIS</b> <a class="float-right"><?= $siswa['nis'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Jenis Kelamin</b> <a class="float-right"><?= $siswa['jk'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Tempat, Tanggal Lahir</b> <a class="float-right"><?= $siswa['ttl'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Nama Orang Tua/ Wali</b> <a class="float-right"><?= $siswa['nama_wali'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>No HP/ WA Wali</b> <a class="float-right"><?= $siswa['hp_wali'] ?></a>
                            </li>
                        </ul>
                        <a href="<?= base_url('siswa') ?>" type="button" class="btn btn-success float-right mr-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>