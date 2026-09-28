<?= $this->include('layouts/header') ?>
<?php $isEdit = $user !== null; ?>
<div class="card shadow-sm"><div class="card-body p-4">
    <h1 class="mb-4"><?= esc($title) ?></h1>
    <form method="post" enctype="multipart/form-data" action="<?= $isEdit ? site_url('users/' . $user['id']) : site_url('users') ?>">
        <?= csrf_field() ?>
        <div class="mb-3"><label class="form-label" for="username">Username</label><input class="form-control <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" id="username" name="username" value="<?= esc(old('username', $user['username'] ?? '')) ?>"><div class="invalid-feedback"><?= $validation->getError('username') ?></div></div>
        <div class="mb-3"><label class="form-label" for="full_name">Full Name</label><input class="form-control <?= $validation->hasError('full_name') ? 'is-invalid' : '' ?>" id="full_name" name="full_name" value="<?= esc(old('full_name', $user['full_name'] ?? '')) ?>"><div class="invalid-feedback"><?= $validation->getError('full_name') ?></div></div>
        <?php if ($isEdit): ?>
            <div class="mb-4"><label class="form-label" for="avatar">Profile Picture</label><input class="form-control <?= $validation->hasError('avatar') ? 'is-invalid' : '' ?>" id="avatar" name="avatar" type="file" accept="image/jpeg,image/png"><div class="form-text">JPG or PNG only, maximum size: 2 MB.</div><div class="invalid-feedback"><?= $validation->getError('avatar') ?></div></div>
        <?php endif ?>
        <button class="btn btn-primary" type="submit"><?= $isEdit ? 'Update User' : 'Save User' ?></button><a class="btn btn-outline-secondary ms-2" href="<?= site_url('users') ?>">Cancel</a>
    </form>
</div></div>
<?= $this->include('layouts/footer') ?>
