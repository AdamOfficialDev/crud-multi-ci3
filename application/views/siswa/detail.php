<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Detail Data Siswa</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <input type="text" <?= $this->session->userdata['nama'] ?> readonly>
            </div>
            <div class="form-group">
                <input type="text" <?= $this->session->userdata['kelas'] ?> readonly>
            </div>
            <div class="form-group">
                <input type="text" <?= $this->session->userdata['jurusan'] ?> readonly>
            </div>
        </div>
    </div>
</div>