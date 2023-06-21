<?php if ($this->session->userdata['role'] == 'user') : ?>
    <h1>haii saya <?= $this->session->userdata['name'] ?>, role saya <?= $this->session->userdata['role'] ?></h1>
<?php endif; ?>