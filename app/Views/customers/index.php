<?= $this->include('layouts/header') ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="mb-0">Customer Accounts</h1>
    <div><span class="badge bg-primary fs-6 me-2"><?= count($customers) ?> record(s)</span><a class="btn btn-primary" href="<?= site_url('customers/new') ?>">Add Customer</a></div>
</div>
<?php if (session('success')): ?><div class="alert alert-success"><?= esc(session('success')) ?></div><?php endif ?>
<div class="table-responsive shadow-sm rounded">
    <table class="table table-striped table-hover bg-white mb-0">
        <thead class="table-primary"><tr><th>ID</th><th>Full Name</th><th>Email</th><th>Phone</th><th>Action</th></tr></thead>
        <tbody>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= esc($customer['id']) ?></td>
                <td><?= esc($customer['full_name']) ?></td>
                <td><?= esc($customer['email']) ?></td>
                <td><?= esc($customer['phone'] ?: '-') ?></td>
                <td><a class="btn btn-sm btn-outline-primary" href="<?= site_url('customers/' . $customer['id'] . '/edit') ?>">Edit</a></td>
            </tr>
        <?php endforeach ?>
        <?php if (empty($customers)): ?>
            <tr><td colspan="5" class="text-center text-muted">No customer records found.</td></tr>
        <?php endif ?>
        </tbody>
    </table>
</div>
<?= $this->include('layouts/footer') ?>
