<div class="container col-md-8 mt-4">
    <?= $this->session->flashdata('msg') ?>
    <div class="card">
        <div class="card-header">
            <h3 class="font-italic">Edit Pengguna</h3>
        </div>
        <div class="card-body">
            <form method="post" action="">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">

                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="role">role</label>
                    <select class="form-control" id="role" name="role">
                        <?php foreach ($role as $r) : ?>
                            <option <?= $user['role'] == $r ? 'selected' : '' ?>><?= $r; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
