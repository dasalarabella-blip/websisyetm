<?= $this->include('layouts/header') ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="mb-0">User Accounts</h1>
    <div><span class="badge bg-primary fs-6 me-2"><?= count($users) ?> record(s)</span><a class="btn btn-primary" href="<?= site_url('users/new') ?>">Add User</a></div>
</div>
<?php if (session('success')): ?><div class="alert alert-success"><?= esc(session('success')) ?></div><?php endif ?>
<div class="table-responsive shadow-sm rounded">
    <table class="table table-striped table-hover bg-white mb-0">
        <thead class="table-primary"><tr><th>Avatar</th><th>Username</th><th>Full Name</th><th>Created At</th><th>Action</th></tr></thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <?php $avatar = ! empty($user['avatar']) && is_file(FCPATH . 'uploads/' . $user['avatar']) ? base_url('uploads/' . $user['avatar']) : base_url('uploads/placeholder.svg'); ?>
                <td><img src="<?= esc($avatar) ?>" alt="<?= esc($user['full_name']) ?> avatar" width="48" height="48" class="rounded-circle object-fit-cover"></td>
                <td><?= esc($user['username']) ?></td>
                <td><?= esc($user['full_name']) ?></td>
                <td><?= esc($user['created_at']) ?></td>
                <td><a class="btn btn-sm btn-outline-primary" href="<?= site_url('users/' . $user['id'] . '/edit') ?>">Edit</a></td>
            </tr>
        <?php endforeach ?>
        <?php if (empty($users)): ?>
            <tr><td colspan="5" class="text-center text-muted">No user records found.</td></tr>
        <?php endif ?>
        </tbody>
    </table>
</div>
<?= $this->include('layouts/footer') ?>
