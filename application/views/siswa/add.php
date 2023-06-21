<div class="container col-md-7 mt-4">
    <div class="card">
        <div class="card-header">
            <h3 class="font-italic">Form Tambah Data Siswa</h3>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" autofocus>
                    <small class="text-danger font-italic"><?= form_error('nama') ?></small>
                </div>
                <div class="form-group">
                    <label for="jurusan">Kelas</label>
                    <select class="form-control" id="jurusan" name="kelas">
                        <?php foreach ($kelas as $kls) : ?>
                            <option><?= $kls; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <select class="form-control" id="jurusan" name="jurusan">
                        <?php foreach ($jurusan as $major) : ?>
                            <option><?= $major; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
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