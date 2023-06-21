<br><br><br><br>
<div class="container col-md-5">
    <div class="card">
        <div class="card-header">
            <h3 class="font-italic text-center">Register</h3>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama">Username</label>
                    <input type="text" class="form-control" id="nama" name="name" value="<?= set_value('name') ?>" autofocus>
                    <small class="font-italic text-danger"><?= form_error('name') ?></small>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email') ?>">
                    <small class="font-italic text-danger"><?= form_error('email') ?></small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <small class="font-italic text-danger"><?= form_error('password') ?></small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= base_url('Auth') ?>" class="btn btn-link">Have account?</a>
            </form>
        </div>
    </div>
</div>

<style>
    .form-control {
        border-radius: 50px;
    }

    .btn {
        transition: 0.5s;
    }

    .btn:hover {
        border-top-left-radius: 50px;
        border-bottom-right-radius: 50px;
    }
</style>