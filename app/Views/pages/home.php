<?= $this->include('layouts/header') ?>
<div class="p-5 mb-4 bg-white rounded-3 shadow-sm">
    <h1 class="display-5 fw-bold">Simple POS System</h1>
    <p class="fs-5">A CodeIgniter 4 project that displays customer and staff accounts from the <code>pos_db</code> MySQL database.</p>
    <a class="btn btn-primary btn-lg" href="<?= site_url('customers') ?>">View Customer Accounts</a>
</div>
<?= $this->include('layouts/footer') ?>
