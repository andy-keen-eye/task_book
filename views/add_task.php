<form id="searchform" action="/submit_task.php" method="post">

<div class="form-group">
<input name="name" type="text" class="form-control" placeholder="Enter a name">
<input name="email" type="text" class="form-control" placeholder="Enter an email">
<input name="task" type="text" class="form-control" placeholder="Enter a task">
</div>

<?php
if ($values[0] == 'error')
{
    echo ('<label class="control-label" for="inputError2">
        All fields must be filled
        </label>');
}
if ($values[0] == 'email')
{
    echo ('<label class="control-label" for="inputError2">
        Email is not a valid email address
        </label>');
}
?>

<input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
</form>