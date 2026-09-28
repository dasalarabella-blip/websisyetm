<?= $this->include('layouts/header') ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="mb-0">Task List</h1><span class="badge bg-primary fs-6"><?= count($tasks) ?> task(s)</span>
</div>
<div class="table-responsive shadow-sm rounded">
    <table class="table table-striped table-hover bg-white mb-0">
        <thead class="table-primary">
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Task Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= esc($task['title']) ?></td>
                    <td><?= esc(ucfirst($task['status'])) ?></td>
                    <td><?= esc($task['task_date']) ?></td>
                </tr><?php endforeach ?>
            <?php if (empty($tasks)): ?>
                <tr>
                    <td colspan="4" class="text-center text-muted">No tasks found.</td>
                </tr><?php endif ?>
        </tbody>
    </table>
</div>
<?= $this->include('layouts/footer') ?>