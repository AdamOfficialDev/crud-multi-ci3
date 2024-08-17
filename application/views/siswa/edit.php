<div class="container col-md-7 mt-4">
    <div class="card">
        <div class="card-header">
            <h3 class="font-italic">Form Edit Data Siswa</h3>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $siswa['id'] ?>">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $siswa['nama'] ?>" autofocus>
                    <small class="text-danger font-italic"><?= form_error('nama') ?></small>
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select class="form-control" id="kelas" name="kelas">
                        <?php foreach ($kelas as $c) : ?>
                            <option <?= $siswa['kelas'] == $c ? 'selected' : '' ?>><?= $c; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <select class="form-control" id="jurusan" name="jurusan">
                        <?php foreach ($jurusan as $major) : ?>
                            <option <?= $siswa['jurusan'] == $major ? 'selected' : '' ?>><?= $major; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type=" submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
<style>
    .form-control,
    .btn {
        border-radius: 50px;
    }
</style>