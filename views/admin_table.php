<div class="container-fluid">

<a href="/add_task.php" class="btn btn-primary" role="button">Add new task</a>

<a href="/logout.php" class="btn btn-success" role="button">Logout</a>

<table class="table table-bordered">

    <thead>
        <tr>
            <th><a href="?sort=name">Name</a>
            <?php
            if (($values[3] == name) && ($values[4] == 'asc')) echo ('&uArr;');
            elseif (($values[3] == name) && ($values[4] == 'desc')) echo ('&dArr;')
            ?>
            </th>
            <th><a href="?sort=email">Email</a>
            <?php
            if (($values[3] == email) && ($values[4] == 'asc')) echo ('&uArr;');
            elseif (($values[3] == email) && ($values[4] == 'desc')) echo ('&dArr;')
            ?>
            </th>
            <th><a href="?sort=task">Task</a>
            <?php
            if (($values[3] == task) && ($values[4] == 'asc')) echo ('&uArr;');
            elseif (($values[3] == task) && ($values[4] == 'desc')) echo ('&dArr;')
            ?>
            </th>
            <th>Status</th>
            <th>Edit</th>
        </tr>
    </thead>

    <tbody>

    <?php foreach ($values[0] as $user): ?>
        <tr>
            <td><?= $user["name"] ?></td>
            <td><?= $user["email"] ?></td>
            <td><?= $user["task"] ?></td>
            <?php if ($user["status"] == 0) $user["status"] = 'not finished';
            else $user["status"] = 'finished';?>
            <td><?= $user["status"] ?></td>
            <td><a href="/edit.php?task=<?= $user["id"] ?>">Edit this task</a></td>
        </tr>

    <?php endforeach ?>

    <tbody>
</table>

<?php require('pagination.php'); ?>

</div>