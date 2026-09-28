<?= $this->include('layouts/header') ?>
<div class="card shadow-sm">
    <div class="card-body p-4">
        <h1 class="mb-4">Demo User Profile</h1>
        <?php if ($user): ?>
            <dl class="row mb-0">
                <dt class="col-sm-3">Username</dt>
                <dd class="col-sm-9"><?= esc($user['username']) ?></dd>
                <dt class="col-sm-3">Full Name</dt>
                <dd class="col-sm-9"><?= esc($user['full_name']) ?></dd>
                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9"><?= esc($user['email']) ?></dd>
                <dt class="col-sm-3">Created At</dt>
                <dd class="col-sm-9"><?= esc($user['created_at']) ?></dd>
            </dl><?php else: ?>
            <p class="text-muted mb-0">No demo user record found.</p><?php endif ?>
    </div>
</div>
<?= $this->include('layouts/footer') ?>