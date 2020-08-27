<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?= base_url() ?>/assets/img/<?= $user['image'] ?>" alt="User profile picture">
                        </div>
                        <?php if ($user['id_role'] == 1 || $user['id_role'] == 2): ?>
                        <h3 class="profile-username text-center"><?= $user['username'] ?></h3>
                        <p class="text-muted text-center"><?= "Admin Sekolah" ?></p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Username</b> <a class="float-right"><?= $user['username'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right"><?= $user['email'] ?></a>
                            </li>
                        </ul>
                        <?php elseif ($user['id_role'] == 3) : ?>
                        <h3 class="profile-username text-center"><?= $user['nama'] ?></h3>
                        <p class="text-muted text-center"><?= "Guru" ?></p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Nama Lengkap</b> <a class="float-right"><?= $user['nama'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>NIP</b> <a class="float-right"><?= $user['nip'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Jenis Kelamin</b> <a class="float-right"><?= $user['jk'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Tempat, Tanggal Lahir</b> <a class="float-right"><?= $user['ttl'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Pendidikan</b> <a class="float-right"><?= $user['pendidikan'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Pangkat</b> <a class="float-right"><?= $user['pangkat'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Jabatan</b> <a class="float-right"><?= $user['jabatan'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>TMT</b> <a class="float-right"><?= $user['tmt'] ?></a>
                            </li>
                        </ul>
                        <?php else: ?>
                        <h3 class="profile-username text-center"><?= $user['nama'] ?></h3>
                        <p class="text-muted text-center"><?= "Siswa" ?></p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Nama Lengkap</b> <a class="float-right"><?= $user['nama'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>NIS</b> <a class="float-right"><?= $user['nis'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Jenis Kelamin</b> <a class="float-right"><?= $user['jk'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Tempat, Tanggal Lahir</b> <a class="float-right"><?= $user['ttl'] ?></a>
                            </li>
                        </ul>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <?php if ($user['id_role'] == 1 || $user['id_role'] == 2): ?>
                            <a href="<?= base_url() ?>profil/ubahadmin/">Edit Profil</a>
                        <?php elseif ($user['id_role'] == 3): ?>
                            <a href="<?= base_url() ?>profil/ubahguru">Edit Profil</a>
                        <?php elseif ($user['id_role'] == 4): ?>
                            <a href="<?= base_url() ?>profil/ubahsiswa">Edit Profil</a>
                        <?php endif ?>
                        <hr>
                        <a href="<?= base_url() ?>profil/user">Ubah Password</a>
                        <hr>
                        <a href="<?= base_url() ?>profil/foto">Ganti Foto Profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>