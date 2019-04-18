<div class="row">
    <div class="col-md-4">
        <label>Name:</label>
    </div>
    <div class="col-md-8">
        <label><?= $values['name'] ?></label>
    </div>
</div>

<form action="submit_edition.php" method="post">
    <input type="hidden" name="id" value=<?= $values['id'] ?>>
    <div class="container">
        <textarea class="form-control" rows="2" name="task"><?= $values['task'] ?></textarea>
    </div>

<div class="checkbox">
<label><input name="finished" type="checkbox" checked>Task finished</label>
</div>
<button type="submit" class="btn btn-success">Save</button>
</div>
</form>
