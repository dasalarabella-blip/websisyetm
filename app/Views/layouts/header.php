<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Simple POS') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?= site_url('/') ?>">Simple POS</a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="<?= site_url('/') ?>">Home</a>
            <a class="nav-link" href="<?= site_url('about') ?>">About</a>
            <a class="nav-link" href="<?= site_url('customers') ?>">Customers</a>
            <a class="nav-link" href="<?= site_url('users') ?>">Users</a>
        </div>
    </div>
</nav>
<main class="container py-5">
