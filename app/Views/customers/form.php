<?= $this->include('layouts/header') ?>
<?php $isEdit = $customer !== null; ?>
<div class="card shadow-sm"><div class="card-body p-4">
    <h1 class="mb-4"><?= esc($title) ?></h1>
    <form method="post" action="<?= $isEdit ? site_url('customers/' . $customer['id']) : site_url('customers') ?>">
        <?= csrf_field() ?>
        <div class="mb-3"><label class="form-label" for="full_name">Full Name</label><input class="form-control <?= $validation->hasError('full_name') ? 'is-invalid' : '' ?>" id="full_name" name="full_name" value="<?= esc(old('full_name', $customer['full_name'] ?? '')) ?>"><div class="invalid-feedback"><?= $validation->getError('full_name') ?></div></div>
        <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control <?= $validation->hasError('email') ? 'is-invalid' : '' ?>" id="email" name="email" type="email" value="<?= esc(old('email', $customer['email'] ?? '')) ?>"><div class="invalid-feedback"><?= $validation->getError('email') ?></div></div>
        <div class="mb-4"><label class="form-label" for="phone">Phone</label><input class="form-control <?= $validation->hasError('phone') ? 'is-invalid' : '' ?>" id="phone" name="phone" value="<?= esc(old('phone', $customer['phone'] ?? '')) ?>"><div class="invalid-feedback"><?= $validation->getError('phone') ?></div></div>
        <button class="btn btn-primary" type="submit"><?= $isEdit ? 'Update Customer' : 'Save Customer' ?></button><a class="btn btn-outline-secondary ms-2" href="<?= site_url('customers') ?>">Cancel</a>
    </form>
</div></div>
<?= $this->include('layouts/footer') ?>
