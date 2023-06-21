<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">CI App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="">Home</a>
                </li>
                <!-- Akan muncul jika yang login Admin -->
                <?php if ($this->session->userdata['role'] == 'admin') : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('User') ?>">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('Siswa') ?>">Siswa</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="btn btn-danger" href="<?= base_url('Auth/logout') ?>" onclick="return confirm('Apakah anda yakin ingin logout?')">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .btn {
        border-radius: 50px;
    }
</style>